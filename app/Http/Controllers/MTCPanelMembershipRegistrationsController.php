<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\MembershipRegistration;
use Carbon\Carbon;

class MTCPanelMembershipRegistrationsController extends Controller
{

    private $view;
    private $folder;
    private $model;
    private $paginate;
    private $privName;

    public function __construct(){
        $this->view = 'mtCPanel.members_registrations';
        $this->route = 'mtCPanel.members_registrations';
        $this->model = new MembershipRegistration;
        $this->folder = '/includes/members_registrations/';
        $this->paginate = 25;
        $this->privName = 'members_registrations';
    }

    // ------------------------------- Main View ----------------------------------------------
    public function index(){
        
        $privName = $this->privName;
        $model = $this->model;
        
        if(auth()->guard('admin')->user()->hasListPriv($privName)){
            $privArray = auth()->guard('admin')->user()->getListPriv($privName);
            $privText = implode(',',$privArray);
            $model = $model->whereRaw('id IN ('.$privText.')');
        }
        
        $data = $model->orderBy('id','desc')->paginate($this->paginate);
        
        return view($this->view.'.index', ['data' => $data]);
    }

    // ------------------------------- Display View ----------------------------------------------
    public function show($id = null){
        $data = $this->model->findOrFail($id);
        return view($this->view.'.display',['data'=>$data]);  
    }

    // ------------------------------- Add View ----------------------------------------------
    public function create(){
        return view($this->view.'.create');
    }

    // ------------------------------- Edit View ----------------------------------------------
    public function edit($id = null){
        $data = $this->model->findOrFail($id);
        return view($this->view.'.edit',['data'=>$data]);        
    }

    // ------------------------------- Add Action ----------------------------------------------
    public function store(Request $request){
        if($request->input('membership_type_id') == 1 || $request->input('membership_type_id') == 3){
            $end_at = Carbon::parse($request->input('start_date'))->addMonth(6)->addDay();
            $end_at->toDateTimeString();
        }
        
        if($request->input('membership_type_id') == 2 || $request->input('membership_type_id') == 4){
            $end_at = Carbon::parse($request->input('start_date'))->addYear()->addDay();
            $end_at->toDateTimeString();
        }
        $rules = [
            'user_id' => 'required|exists:users,id',
            'transaction_id' => 'required|exists:transactions,id',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        // dd($request->all());
        $data = [
            'user_id' => $request->input('user_id'),
            'start_at' => date('Y-m-d', strtotime($request->input('start_at'))),
            'end_at' => date('Y-m-d', strtotime($end_at)),
            'membership_type_id' => $request->input('membership_type_id'),
            'price' => $request->input('price'),
            'is_paid' => $request->input('is_paid'),
            'transaction_id' => $request->input('transaction_id'),
        ];

        $data = $this->model->create( $data );
        return redirect()->route($this->view.'.index')->withInput(['added' => true, 'id' => $data->id]);

    }

    // ------------------------------- Edit Action ----------------------------------------------
    public function update(Request $request, $id = null){
        
        $rules = [
            'title' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        // dd($request->all());
        $data = [
            'id' => $id,
            'user_id' => $request->input('user_id'),
            'start_at' => date('Y-m-d', strtotime($request->input('start_at'))),
            'end_at' => date('Y-m-d', $end_at),
            'membership_type_id' => $request->input('membership_type_id'),
            'price' => $request->input('price'),
            'is_paid' => $request->input('is_paid'),
            'transaction_id' => $request->input('transaction_id'),
        ];

        $this->model->findOrFail( $id )->update( $data );
        return redirect()->route($this->view.'.show',['id'=>$id])->withInput(['updated' => true]);

    }

    // ------------------------------- Delete Action ----------------------------------------------
    public function destroy(Request $request, $id = null){      

        $data = $this->model->findOrFail( $id );
        $data->delete();
        return redirect()->route($this->view.'.index')->withInput(['deleted' => true])->status(200);
    }

    // ------------------------------- Dropzone ----------------------------------------------
    public function dropzone(Request $request){
        $id = $request->input('id');
        $data = $this->model->find($id);
        $response = [];
        if(isset($data->picture)){
            $response = [
                [
                    'name' => $data->picture,
                    'path' => $data->getPicture(),
                    'size' => filesize(public_path($this->folder.$data->picture))
                ]
            ];
        }
        return json_encode($response);
    }

     // ------------------------------- Dropzone ----------------------------------------------
     public function dropzoneRemove(Request $request){
        $id = $request->input('id');
        $file_name = $request->input('name');
        $file = public_path($this->folder.$file_name);
        unlink($file);
        
        $data = $this->model->find($id);
        $data->picture = null;
        $data->save();

       exit;
    }

}

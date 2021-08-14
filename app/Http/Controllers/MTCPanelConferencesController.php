<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Conference;

class MTCPanelConferencesController extends Controller
{

    private $view;
    private $folder;
    private $model;
    private $paginate;
    private $privName;

    public function __construct(){
        $this->view = 'mtCPanel.conferences';
        $this->route = 'mtCPanel.conferences';
        $this->model = new Conference;
        $this->folder = '/includes/conferences/';
        $this->paginate = 25;
        $this->privName = 'conferences';
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
        
        $rules = [
            'title' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        // dd($request->all());
        $data = [
            'title' => $request->input('title'),
            'titleEn' => $request->input('titleEn'),
            'txt' => $request->input('txt'),
            'txtEn' => $request->input('txtEn'),
            'country' => $request->input('country'),
            'countryEn' => $request->input('countryEn'),
            'city' => $request->input('city'),
            'cityEn' => $request->input('cityEn'),
            'address' => $request->input('address'),
            'addressEn' => $request->input('addressEn'),
            'start_at' => $request->input('start_at'),
            'end_at' => $request->input('end_at'),
            'dataEntry' => $request->input('dataEntry'),
            'picture' => $request->input('picture'),
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
            'title' => $request->input('title'),
            'titleEn' => $request->input('titleEn'),
            'txt' => $request->input('txt'),
            'txtEn' => $request->input('txtEn'),
            'country' => $request->input('country'),
            'countryEn' => $request->input('countryEn'),
            'city' => $request->input('city'),
            'cityEn' => $request->input('cityEn'),
            'address' => $request->input('address'),
            'addressEn' => $request->input('addressEn'),
            'start_at' => $request->input('start_at'),
            'end_at' => $request->input('end_at'),
            'dataEntry' => $request->input('dataEntry'),
            'picture' => $request->input('picture'),
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

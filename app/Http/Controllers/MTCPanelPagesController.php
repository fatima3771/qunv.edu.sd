<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Page;

class MTCPanelPagesController extends Controller
{

    private $view;
    private $folder;
    private $model;
    private $paginate;
    private $privName;

    public function __construct(){
        $this->view = 'mtCPanel.pages';
        $this->route = 'mtCPanel.pages';
        $this->model = new Page;
        $this->folder = '/includes/headers/';
        $this->paginate = 100;
        $this->privName = 'pages';
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
        
        $data = $model->orderBy('parent_id','desc')->orderBy('id','desc')->paginate($this->paginate);
        
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
            'parent_id' => $request->input('parent_id'),
            'title' => $request->input('title'),
            'titleEn' => $request->input('titleEn'),
            'link' => $request->input('link'),
            'txt' => $request->input('txt'),
            'txtEn' => $request->input('txtEn'),
            'order' => $request->input('order'),
            'picture' => $request->input('picture'),
            'publish' => $request->input('publish'),

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
        $data = [
            'id' => $id,
            'parent_id' => $request->input('parent_id'),
            'title' => $request->input('title'),
            'titleEn' => $request->input('titleEn'),
            'link' => $request->input('link'),
            'txt' => $request->input('txt'),
            'txtEn' => $request->input('txtEn'),
            'order' => $request->input('order'),
            'picture' => $request->input('picture'),
            'publish' => $request->input('publish'),
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
        
        // $data = $this->model->find($id);
        // $data->picture = null;
        // $data->save();

       exit;
    }

}

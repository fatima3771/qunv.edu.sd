<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Magazine;
use App\MagazineIssue;

class MTCPanelMagazineIssuesController extends Controller
{

    private $view;
    private $folder;
    private $model;
    private $paginate;
    private $privName;
    private $parentModel;
    private $parent_id;

    public function __construct(){
        $this->view = 'mtCPanel.magazines.issues';
        $this->route = 'mtCPanel.magazines.issues';
        $this->model = new MagazineIssue;
        $this->folder = '/includes/magazines/';
        $this->paginate = 25;
        $this->privName = 'magazines';
        $this->parentModel = new Magazine;
   }

    // ------------------------------- Main View ----------------------------------------------
    public function index($parent_id = null){
        $privName = $this->privName;
        $model = $this->model;
        
        if(auth()->guard('admin')->user()->hasListPriv($privName)){
            $privArray = auth()->guard('admin')->user()->getListPriv($privName);
            $privText = implode(',',$privArray);
            $model = $model->whereRaw('id IN ('.$privText.')');
        }
        
        $model = $model->where('magazine_id', $parent_id);
        $parent = $this->parentModel->find($parent_id);
        $data = $model->orderBy('id','desc')->paginate($this->paginate);
        
        return view($this->view.'.index', ['data' => $data, 'parent' => $parent]);
    }

    // ------------------------------- Display View ----------------------------------------------
    public function show($parent_id = null, $id = null){
        $data = $this->model->findOrFail($id);
        return view($this->view.'.display',['data'=>$data]);  
    }

    // ------------------------------- Add View ----------------------------------------------
    public function create($parent_id = null){
        $parent = $this->parentModel->find($parent_id);
        return view($this->view.'.create', ['parent' => $parent]);
    }

    // ------------------------------- Edit View ----------------------------------------------
    public function edit($parent_id = null, $id = null){
        $data = $this->model->findOrFail($id);
        return view($this->view.'.edit',['data'=>$data]);        
    }

    // ------------------------------- Add Action ----------------------------------------------
    public function store(Request $request, $parent_id = null){
        
        $rules = [
            'title' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        $data = $request->all();
        $data['magazine_id'] = $parent_id;

        $data = $this->model->create( $data );
        return redirect()->route($this->view.'.index',['parent_id'=>$parent_id])->withInput(['added' => true, 'id' => $data->id]);

    }

    // ------------------------------- Edit Action ----------------------------------------------
    public function update(Request $request, $parent_id = null, $id = null){
        $rules = [
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        // dd($request->all());
        $data = $request->all();
        // $data['published_at'] = date("Y-m-d",$data['published_at']);

        $this->model->findOrFail( $id )->update( $data );
        return redirect()->route($this->view.'.show',['parent_id'=>$parent_id, 'id'=>$id])->withInput(['updated' => true]);

    }

    // ------------------------------- Delete Action ----------------------------------------------
    public function destroy(Request $request, $parent_id = null, $id = null){
        $data = $this->model->findOrFail( $id );
        $data->delete();
        return redirect()->route($this->view.'.index', ['parent_id'=>$this->parent_id])->withInput(['deleted' => true])->status(200);
    }

    // ------------------------------- Dropzone ----------------------------------------------
    public function dropzone(Request $request){
        $folder = $request->input('folder')."/";
        $id = $request->input('id');
        $data = $this->model->find($id);
        $response = [];
        if(isset($data->picture)){
            $response = [
                [
                    'name' => $data->picture,
                    'path' => $data->getPicture(),
                    'size' => filesize($folder.$data->picture)
                ]
            ];
        }
        return json_encode($response);
    }

     // ------------------------------- Dropzone ----------------------------------------------
     public function dropzoneRemove(Request $request){
        $folder = $request->input('folder')."/";
        $id = $request->input('id');
        $file_name = $request->input('name');
        $file = $folder.$file_name;
        unlink($file);
        $data = $this->model->find($id);
        $data->picture = null;
        $data->save();

       exit;
    }

}

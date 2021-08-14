<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Magazine;
use App\MagazineIssue;
use App\MagazineIssueTopic;

class MTCPanelMagazineIssueTopicsController extends Controller
{

    private $view;
    private $folder;
    private $model;
    private $paginate;
    private $privName;
    private $parentModel;
    private $parent_id;
    private $gParentModel;
    private $gParent_id;

    public function __construct(){
        $this->view = 'mtCPanel.magazines.issues.topics';
        $this->route = 'mtCPanel.magazines.issues.topics';
        $this->model = new MagazineIssueTopic;
        $this->folder = '/includes/magazines/';
        $this->paginate = 25;
        $this->parentModel = new MagazineIssue;
        $this->gPrivName = 'magazines';
        $this->gParentModel = new Magazine;
   }

    // ------------------------------- Main View ----------------------------------------------
    public function index($gParent_id = null, $parent_id = null){

        $privName = $this->privName;
        $model = $this->model;
        
        if(auth()->guard('admin')->user()->hasListPriv($privName)){
            $privArray = auth()->guard('admin')->user()->getListPriv($privName);
            $privText = implode(',',$privArray);
            $model = $model->whereRaw('id IN ('.$privText.')');
        }
        
        $model = $model->where('magazine_issue_id', $parent_id);
        $parent = $this->parentModel->find($parent_id);
        $gParent = $this->gParentModel->find($gParent_id);
        $data = $model->orderBy('id','desc')->paginate($this->paginate);
        return view($this->view.'.index', ['data' => $data, 'parent' => $parent, 'gParent' => $gParent]);
    }

    // ------------------------------- Display View ----------------------------------------------
    public function show($gParent_id = null, $parent_id = null, $id = null){
        $data = $this->model->findOrFail($id);
        $parent = $this->parentModel->find($parent_id);
        $gParent = $this->gParentModel->find($gParent_id);
        return view($this->view.'.display', ['data'=>$data, 'parent' => $parent, 'gParent' => $gParent]);
    }

    // ------------------------------- Add View ----------------------------------------------
    public function create($gParent_id = null, $parent_id = null){
        $parent = $this->parentModel->find($parent_id);
        $gParent = $this->gParentModel->find($gParent_id);
        return view($this->view.'.create', ['parent' => $parent, 'gParent' => $gParent]);
    }

    // ------------------------------- Edit View ----------------------------------------------
    public function edit($gParent_id = null, $parent_id = null, $id = null){
        $data = $this->model->findOrFail($id);
        $parent = $this->parentModel->find($parent_id);
        $gParent = $this->gParentModel->find($gParent_id);
        return view($this->view.'.edit',['data'=>$data, 'parent' => $parent, 'gParent' => $gParent]);        
    }

    // ------------------------------- Add Action ----------------------------------------------
    public function store(Request $request, $gParent_id = null, $parent_id = null){
        $rules = [
            'title' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        $data = $request->all();
        $data['magazine_issue_id'] = $parent_id;
        // dd($data);

        $data = $this->model->create( $data );
        return redirect()->route($this->view.'.index',['gParent_id'=>$gParent_id, 'parent_id'=>$parent_id])->withInput(['added' => true, 'id' => $data->id]);

    }

    // ------------------------------- Edit Action ----------------------------------------------
    public function update(Request $request, $gParent_id = null, $parent_id = null, $id = null){
        $rules = [
            'title' => 'required|max:255',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        $data = $request->all();
        // $data['magazine_issue_id'] = $parent_id;

        $this->model->findOrFail( $id )->update( $data );
        return redirect()->route($this->view.'.show',['gParent_id'=>$gParent_id, 'parent_id'=>$parent_id, 'id'=>$id])->withInput(['updated' => true]);

    }

    // ------------------------------- Delete Action ----------------------------------------------
    public function destroy(Request $request, $gParent_id = null, $parent_id = null, $id = null){
        $data = $this->model->findOrFail( $id );
        $parent = $this->parentModel->find($parent_id);
        $gParent = $this->gParentModel->find($gParent_id);
        $data->delete();
        return redirect()->route($this->view.'.index', ['gParent_id'=>$gParent_id, 'parent_id'=>$parent_id])->withInput(['deleted' => true])->status(200);
    }

    // ------------------------------- Dropzone ----------------------------------------------
    public function dropzone(Request $request){
        $folder = $request->input('folder')."/";
        $id = $request->input('id');
        $data = $this->model->find($id);
        $response = [];
        if(isset($data->pdf)){
            $response = [
                [
                    'name' => $data->pdf,
                    'path' => $data->getPdf(),
                    'size' => filesize($folder.$data->pdf)
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
        $file = public_path($this->folder.$file_name);
        unlink($file);
        
        $data = $this->model->find($id);
        $data->pdf = null;
        $data->save();

       exit;
    }

}

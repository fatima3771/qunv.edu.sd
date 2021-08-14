<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class JTableControllerPages extends Controller
{
//    protected $layout = "main";

// --------------------- Page -------------------------------------------------
public function pagesList($parent_id = null){
    $privName = 'pages';
    $model = new Page;
    if(auth()->guard('admin')->user()->hasListPriv($privName)){
        $privArray = auth()->guard('admin')->user()->getListPriv($privName);
        $privText = implode(',',$privArray);
        $model = $model->whereRaw('ID IN ('.$privText.')');
    }
    $order = explode(" ", request()->input('jtSorting'));
        $data = $model->orderBy('parent_id','asc')->get();
    return view('mtCPanel.pages', ['data' => $data]);
}
public function pagesList2($parent_id = null)
{
    $privName = 'pages';
    $model = new Page;
    if(auth()->guard('admin')->user()->hasListPriv($privName)){
        $privArray = auth()->guard('admin')->user()->getListPriv($privName);
        $privText = implode(',',$privArray);
        $model = $model->whereRaw('ID IN ('.$privText.')');
    }
    $order = explode(" ", request()->input('jtSorting'));
    if(isset($parent_id)) { 
        $data = $model->where('parent_id',$parent_id)
                        ->orderBy($order[0], $order[1])
                        ->take(request()->input('jtPageSize'))
                        ->skip(request()->input('jtStartIndex'))
                        ->get();
        $count = $model->where('parent_id',$parent_id)->count();
    }else{
        $data = $model->orderBy($order[0], $order[1])
                        ->take(request()->input('jtPageSize'))
                        ->skip(request()->input('jtStartIndex'))
                        ->get();
        $count = $model->count();
    }
    $result = array(
        'Result' => 'OK',
        'TotalRecordCount' => $count,
        'Records' => $data//->toArray()
    );
    return $result;
}

public function pagesParentsList($parent_id = null)
{
    if(!isset($parent_id)){
        $data = Page::orderBy('title','ASC')
                        ->get()->toArray();
    }else{
        $data = Page::where('parent_id','=',$parent_id)
                        ->orderBy('title','ASC')
                        ->get()->toArray();
    }
        $rows = array();
            $eil = array();
            $eil["DisplayText"] = "عنوان رئيسي";
            $eil["Value"] = 0;
        $rows[] = $eil;
    foreach($data as $d){
        $eil = array();
        $eil["DisplayText"] = $d['title'];
        $eil["Value"] = $d['id'];
        $rows[] = $eil;
    }   
    $result = array(
        'Result' => 'OK',
        'Options' => $rows //->toArray()
    );
    return json_encode($result);
}

public function pagesDelete()
{
    $id = request()->input('id');
    $data = Page::find($id);
    $childPages = Page::where('parent_id','=',$id)->update(array('parent_id' => 0)); // Set parent id for childs to upper level
    $pagesDelete = Page::where('id','=',$id)->delete(); // Delete Page
    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    return json_encode($jTableResult);
}

public function pagesAdd(){
    if(!isset($parent_id)) $parent_id = request()->input('parent_id');
    
    $data = new Page;
    
    $data->parent_id         = $parent_id;
    $data->title            = request()->input('title');
    $data->titleEn          = request()->input('titleEn');
    $data->subTxt           = request()->input('subTxt');
    $data->subTxtEn         = request()->input('subTxtEn');
    $data->txt              = request()->input('txt');
    $data->txtEn            = request()->input('txtEn');
    $data->link             = request()->input('link');
    $data->order            = request()->input('order');
    $data->picture          = request()->input('picture');
    $data->publish          = request()->input('publish');
    
    $data->save();
    $result = array(
        'Result' => 'OK',
        'Record' => $data //->toArray()
    );
    return $result;
}

public function pagesUpdate(){
    $id = request()->input('id');
    
    $parent_id         = request()->input('parent_id');
    $title            = request()->input('title');
    $titleEn          = request()->input('titleEn');
    $subTxt           = request()->input('subTxt');
    $subTxtEn         = request()->input('subTxtEn');
    $txt              = request()->input('txt');
    $txtEn            = request()->input('txtEn');
    $link             = request()->input('link');
    $order            = request()->input('order');
    $picture          = request()->input('picture');
    $publish          = request()->input('publish');



    Page::where('id','=',$id)->update(array(
        'parent_id'      => $parent_id,
        'title'         => $title,
        'titleEn'       => $titleEn,
        'subTxt'        => $subTxt,
        'subTxtEn'      => $subTxtEn,
        'txt'           => $txt,
        'txtEn'         => $txtEn,
        'link'          => $link,
        'order'         => $order,
        'picture'       => $picture,
        'publish'       => $publish
    ));
    $jTableResult = array();
    $jTableResult['Result'] = "OK";
    return json_encode($jTableResult);
}

public function pagesAttachmentsList(){
    $pageID = request()->input('pageID');
    $privName = 'pagesAttachments';
    $model = new PageAttachment;
    if(auth()->guard('admin')->user()->hasListPriv($privName)){
        $privArray = auth()->guard('admin')->user()->getListPriv($privName);
        $privText = implode(',',$privArray);
        $model = $model->whereRaw('ID IN ('.$privText.')');
    }
    $order = explode(" ", request()->input('jtSorting'));
    if(isset($pageID)) { 
        $data = $model->where('pageID',$pageID)
                        ->orderBy($order[0], $order[1])
                        ->take(request()->input('jtPageSize'))
                        ->skip(request()->input('jtStartIndex'))
                        ->get();
        $count = $model->where('pageID',$pageID)->count();
    }else{
        $data = $model->orderBy($order[0], $order[1])
                        ->take(request()->input('jtPageSize'))
                        ->skip(request()->input('jtStartIndex'))
                        ->get();
        $count = $model->count();
    }
    $result = array(
        'Result' => 'OK',
        'TotalRecordCount' => $count,
        'Records' => $data//->toArray()
    );
    return $result;    
}

public function pagesAttachmentsAdd(){

}

public function pagesAttachmentsUpdate(){

}

public function pagesAttachmentsDelete(){

}

}

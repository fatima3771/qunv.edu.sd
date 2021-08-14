<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;

class MTCPanelMembersController extends Controller
{

    private $view;
    private $folder;
    private $model;
    private $paginate;
    private $privName;

    public function __construct(){
        $this->view = 'mtCPanel.members';
        $this->route = 'mtCPanel.members';
        $this->model = new User;
        $this->folder = '/includes/members/';
        $this->paginate = 25;
        $this->privName = 'members';
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
        
        $model = $model->whereRaw('is_member',1);
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
            'name' => 'required|max:255',
            'nameEn' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'DOB' => 'required|date',
            'phone_no' => 'required|string',
            'national_no' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        // dd($request->all());
        $data = [
            'name' => $request->input('name'),
            'nameEn' => strtoupper($request->input('nameEn')),
            'email' => $request->input('email'),
            'gender' => $request->input('gender'),
            'DOB' => $request->input('DOB'),
            'phone_no' => str_replace(' ','',$request->input('phone_no')),
            'whatsapp_no' => str_replace(' ','',$request->input('whatsapp_no')),
            'national_no' => $request->input('national_no'),
            'address' => $request->input('address'),
            'picture' => $request->input('picture'),
            'confirmed' => $request->input('confirmed'),
        ];

        $data = $this->model->create( $data );
        return redirect()->route($this->view.'.index')->withInput(['added' => true, 'id' => $data->id]);

    }

    // ------------------------------- Edit Action ----------------------------------------------
    public function update(Request $request, $id = null){

        $name =                         $request->input('name');
        $nameEn =                       strtoupper($request->input('nameEn'));
        $email =                        $request->input('email');
        $gender =                       $request->input('gender');
        $DOB =                          date("Y-m-d", strtotime($request->input('DOB')));
        $phone_no =                     str_replace(' ','',$request->input('phone_no'));
        $whatsapp_no =                  str_replace(' ','',$request->input('whatsapp_no'));
        $national_no =                  $request->input('national_no');
        $address =                      $request->input('address');
        $picture =                      $request->input('picture');
        $academic_degree_id =           $request->input('academic_degree_id');
        $university_id =                $request->input('university_id');
        $other_university =             $request->input('other_university');
        $level =                        $request->input('level');
        $graduation_year =              $request->input('graduation_year');
        $job =                          $request->input('job');
        $company =                      $request->input('company');
        $registration_record_type_id =  $request->input('registration_record_type_id');
        $record_no =                    $request->input('record_no');
        $record_date =                  date("Y-m-d", strtotime($request->input('record_date')));
        $confirmed =                    $request->input('confirmed');

        
        $rules = [
            'name' => 'required|max:255',
            'nameEn' => 'required|max:255',
            'email' => 'required|email|max:255',
            'DOB' => 'required|date',
            'phone_no' => 'required|string',
            'national_no' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();
        // dd($request->all());
        $data = [
            'id' => $id,
            'name' =>           $name,
            'nameEn' =>         $nameEn,
            'email' =>          $email,
            'gender' =>         $gender,
            'DOB' =>            $DOB,
            'phone_no' =>       $phone_no,
            'whatsapp_no' =>    $whatsapp_no,
            'national_no' =>    $national_no,
            'address' =>        $address,
            'picture' =>        $picture,
            'confirmed' =>      $confirmed,
        ];

        $user = User::find($id);

        $academicData = [
            'academic_degree_id' => $academic_degree_id,
            'university_id' =>      $university_id,
            'level' =>              $level,
            'graduation_year' =>    $graduation_year,
        ];

        $jobData = [
            'job' =>           $job,
            'company' =>       $company,
        ];

        $registrationRecordData = [
            'registration_record_type_id' =>    $registration_record_type_id,
            'record_no' =>                      $record_no,
            'record_date' =>                    $record_date,
        ];

        $this->model->findOrFail( $id )->update( $data );
        $this->model->findOrFail( $id )->academics()->where('user_id',$id)->first()->update( $academicData );
        
        // $jobs = $this->model->findOrFail( $id )->jobs();
        // $registrationRecords = $this->model->findOrFail( $id )->registrationRecords();
        
        // if($user->is_graduate == 1){
        //     if(isset($jobs)){ 
        //         $jobs->where('user_id',$id)->first()->update( $jobData );
        //     }else{
        //         $jobs->create( $jobData );
        //     }
        //     if(isset($registrationRecords)){
        //         $registrationRecords->where('user_id',$id)->first()->update( $registrationRecordData );
        //     }else{
        //         $registrationRecords->create( $registrationRecordData );
        //     }
        // }
        
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

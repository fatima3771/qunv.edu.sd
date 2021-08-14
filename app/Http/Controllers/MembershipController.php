<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\StudentMembershipRegistrationRequest;

use Validator;
use Auth;
use Session;

use App\User;
use App\UserAcademic;
use App\UserJob;
use App\UserRegistrationRecord;
use App\University;

class MembershipController extends Controller
{

    use RegistersUsers;


    // ------------------ Login Form ---------------------------------------
    public function showLogin() {
        return view('auth.login');
    }
    
    // ------------------ Login Action ---------------------------------------
    public function doLogin(Request $request) {
        $rules = [
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ];

        $validator = Validator::make($request->all(), $rules)->validate();

        if(auth()->guard('user')->attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])){
            $user = User::where('email',$request->input('email'))->first();
            auth()->guard('user')->login($user);
            return redirect()->intended('/userAccount');
        }
        return back()->with('errorLogin',true);
    }

    // ------------------ Student Membership Registration Form ---------------------------------------
    public function studentsRegistration() {
        return view('site.membership_registration_students');
    }

    // ------------------ Graduate Membership Registration Form ---------------------------------------
    public function graduatesRegistration() {
        return view('site.membership_registration_graduates');
    }

    // ------------------ Membership Registration Action ---------------------------------------

    /**
     * Make a Membership Registration.
     *
     * @param  Request  $request
     * @return Response
     */
    public function membershipRegistration(Request $request) {

        $is_graduate =                  $request->input('is_graduate');
        $name =                         $request->input('name');
        $nameEn =                       strtoupper($request->input('nameEn'));
        $email =                        $request->input('email');
        $password =                     bcrypt($request->input('password'));
        $gender =                       $request->input('gender');
        $DOB =                          date("Y-m-d", strtotime($request->input('DOB')));
        $phone_no =                     str_replace(' ','',$request->input('phone_no'));
        $whatsapp_no =                  str_replace(' ','',$request->input('whatsapp_no'));
        $national_no =                  $request->input('national_no');
        $address =                      $request->input('address');
        $academic_degree_id =           $request->input('academic_degree_id');
        $university_id =                $request->input('university_id');
        $other_university =             $request->input('other_university');
        $level =                        $request->input('level');
        $graduation_year =              $request->input('graduation_year');
        $job =                          $request->input('job');
        $company =                      $request->input('company');
        $registration_record_type_id =  $request->input('registration_record_type_id');
        $record_no =                    $request->input('record_no');
        $record_date =                  $request->input('record_date');


        $messages = [
            'required' => 'عفواً، هذا الحقل مطلوب',
            'unique' => 'هذا البريد الإلكتروني موجود مسبقاً في سجلاتنا، اختر بريد إلكتروني آخر، أو قم بتسجيل الدخول.',
            'email.confirmed' => 'البريد الإلكتروني والتأكيد الذي أدخلته غير متطابقين.',
            'password.confirmed' => 'كلمة المرور والتأكيد الذي أدخلته غير متطابقين.',
            'g-recaptcha-response.recaptcha' => 'يجب عليك تحديد زر reCaptcha.',
        ];
        
        if($is_graduate == 1){
            $rules = [
                'name' => 'required|max:255',
                'nameEn' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'email-confirm' => 'required|same:email',
                'password' => 'required|string|min:6',
                'password-confirm' => 'required|same:password',
                'DOB' => 'required|date',
                'phone_no' => 'required|string',
                'national_no' => 'required|string',
                'academic_degree_id' => 'required',
                'university_id' => 'required',
                'gender' => 'required',
                'job' => 'required',
                'company' => 'required',
                'registration_record_type_id' => 'required',
                'record_no' => 'required',
                'record_date' => 'required',
                'confirmRegulations' => 'required',
                'confirmCorrectData' => 'required',
                'g-recaptcha-response' => 'required|recaptcha'
            ];
        }else{
            $rules = [
                'name' => 'required|max:255',
                'nameEn' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'email-confirm' => 'required|same:email',
                'password' => 'required|string|min:6',
                'password-confirm' => 'required|same:password',
                'DOB' => 'required|date',
                'phone_no' => 'required|string',
                'national_no' => 'required|string',
                'academic_degree_id' => 'required',
                'university_id' => 'required',
                'level' => 'required',
                'gender' => 'required',
                'confirmRegulations' => 'required',
                'confirmCorrectData' => 'required',
                'g-recaptcha-response' => 'required|recaptcha'
            ];            
        }


        $validator = Validator::make($request->all(), $rules, $messages)->validate();

            if($university_id == 'other'){
                $university = University::create([
                    'title' => $other_university
                ]);
                $university_id = $university->id;
            }
                        
            $user = User::create([
                'name' => $name,
                'nameEn' => $nameEn,
                'email' => $email,
                'password' => $password,
                'gender' => $gender,
                'DOB' => $DOB,
                'phone_no' => $phone_no,
                'whatsapp_no' => $whatsapp_no,
                'national_no' => $national_no,
                'address' => $address,
                'is_graduate' => $is_graduate,
                'is_member' => 1
            ]);

            if($is_graduate == 1){
                UserAcademic::create([
                    'user_id' => $user->id,
                    'academic_degree_id' => $academic_degree_id,
                    'university_id' => $university_id,
                    'graduation_year' => $graduation_year
                ]);

                UserJob::create([
                    'user_id' => $user->id,
                    'job' => $job,
                    'company' => $company,
                ]);

                UserRegistrationRecord::create([
                    'user_id' => $user->id,
                    'registration_record_type_id' => $registration_record_type_id,
                    'record_no' => $record_no,
                    'record_date' => $record_date,
                ]);
            }else{
                UserAcademic::create([
                    'user_id' => $user->id,
                    'academic_degree_id' => $academic_degree_id,
                    'university_id' => $university_id,
                    'level' => $level
                ]);    
            }

            auth()->guard('user')->login($user);
            return redirect()->intended('/userAccount');

        }
        
}

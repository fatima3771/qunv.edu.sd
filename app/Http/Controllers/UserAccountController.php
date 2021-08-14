<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAccountController extends Controller
{
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth:user');
        }

        public function home(){
            return view('userAccount.dashboard');
        }

        public function showPayment(){
            return view('userAccount.payment');
        }

        public function showMemberCards(){
            $user = auth()->guard('user')->user();
            return view('userAccount.cards', ['user' => $user]);
        }

        public function showConnectCards(){
            $user = auth()->guard('user')->user();
            return view('userAccount.connect', ['user' => $user]);
        }

        public function showWithYou(){
            $user = auth()->guard('user')->user();
            return view('userAccount.with_you', ['user' => $user]);
        }

        public function showCertificate(){
            $user = auth()->guard('user')->user();
            return view('userAccount.certificates', ['user' => $user]);
        }
}

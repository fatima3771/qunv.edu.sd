<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminMemberController extends Controller
{
    public function show(){
        return view('mtCPanel.members', ['members' => User::where('is_member',1)->paginate(50)]);
    }
}

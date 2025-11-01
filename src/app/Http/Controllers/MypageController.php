<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function showProfile()
    {

        return view('update_profile');
    }

    public function updateProfile() {}


    public function showMypage()
    {

        return view('mypage');
    }
}

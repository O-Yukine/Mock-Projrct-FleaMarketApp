<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class MypageController extends Controller
{
    public function showProfile()
    {

        return view('update_profile');
    }

    public function updateProfile(ProfileRequest $request) {}


    public function showMypage()
    {

        return view('mypage');
    }
}

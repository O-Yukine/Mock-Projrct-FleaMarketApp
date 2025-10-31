<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Request $request)
    {
        return view('products');


        ///?tab=mylistの表示（いいねした商品のみ）
        // $tab = $request->query('tab');

    }

    public function showDetail()
    {

        return view('detail');
    }
}

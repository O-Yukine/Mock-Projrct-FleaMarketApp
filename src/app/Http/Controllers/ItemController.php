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


    public function showOrder()
    {

        return view('order');
    }

    public function completeOrder()
    {

        return redirect('/');
    }

    public function showShippingAddress()
    {

        return view('update_address');
    }

    public function updateShippingAddress()
    {

        return redirect('/');
    }

    public function showSellForm()
    {

        return view('sell_item');
    }
}

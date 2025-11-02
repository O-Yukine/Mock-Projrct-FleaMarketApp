<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;

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

        return view('purchase');
    }

    public function completeOrder(Purchaserequest $request)
    {

        return redirect('/');
    }

    public function showShippingAddress()
    {

        return view('update_address');
    }

    public function updateShippingAddress(AddressRequest $request)
    {

        return redirect('/');
    }

    public function showSellForm()
    {

        return view('sell_item');
    }
}

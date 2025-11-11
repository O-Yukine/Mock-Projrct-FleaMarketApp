<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use App\Models\Product;
use App\Models\User;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function showOrder($item_id)
    {
        $product = Product::find($item_id);
        $user = User::with('profile')->find(auth()->id());

        $shipping_address = session('shipping_address');

        return view('purchase', compact('product', 'user', 'shipping_address'));
    }

    public function completeOrder(Purchaserequest $request, $item_id)
    {
        Purchase::create([
            'user_id' => auth()->id(),
            'product_id' => $item_id,
            'payment_method' => $request->payment_method,
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building
        ]);

        return redirect('/');
    }

    public function showShippingAddress($item_id)
    {
        $profile = auth()->user()->profile;

        return view('update_address', compact('item_id', 'profile'));
    }

    public function updateShippingAddress(AddressRequest $request, $item_id)
    {
        $shipping_address = [
            'post_code' => $request->post_code,
            'address' => $request->address,
            'building' => $request->building
        ];

        return redirect("/purchase/{$item_id}")->with('shipping_address', $shipping_address);
    }
}

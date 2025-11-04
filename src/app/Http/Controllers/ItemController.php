<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;

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
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell_item', compact('categories', 'conditions'));
    }

    public function sellItem(ExhibitionRequest $request)
    {
        $filename = $request->file('product_image')->getClientOriginalName();
        $request->file('product_image')->storeAs('public/product_images', $filename);

        $product = Product::create([
            'product_image' => $filename,
            'condition_id' => $request->condition_id,
            'user_id' => auth()->id(),
            'name' => $request->name,
            'brand' => $request->brand,
            'content' => $request->content,
            'price' => $request->price
        ]);

        $product->categories()->sync($request->categories);

        return redirect('/');
    }
}

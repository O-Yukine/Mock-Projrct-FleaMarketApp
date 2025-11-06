<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ExhibitionRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Models\User;
use App\Models\Purchase;
use App\Models\Comment;

class ItemController extends Controller
{
    public function index(Request $request)
    {

        // if (auth()->check()) {
        //     return redirect('/?tab=mylist');
        // }

        $tab = $request->query('tab');

        if ($tab === 'mylist') {
            if (auth()->check()) {
                $products = auth()->user()->likes()->with('purchases')->get();
            } else {
                $products = collect();
            }
        } else {
            if (auth()->check()) {
                $products = Product::with('purchases')->where('user_id', '<>', auth()->id())->get();
            } else {
                $products = Product::with('purchases')->get();
            }
        }

        return view('products', compact('products', 'tab'));


        // $tab = $request->query('tab');
        // $user = auth()->user();

        // if ($tab == 'mylist') {
        //     $products = $user->likes()->get();
        // } else {
        //     if ($tab == '') {
        //         $products = Product::with('purchases')->get();
        //     }
        // }


    }

    public function showDetail($item_id)
    {
        $product = Product::with(['categories', 'condition', 'comments', 'likedBy'])->findOrFail($item_id);

        return view('detail', compact('product'));
    }

    public function makeComment(Request $request, $item_id)
    {
        Comment::create([
            'product_id' => $item_id,
            'user_id' => auth()->id(),
            'comment' => $request->comment
        ]);

        return redirect("/item/{$item_id}");
    }

    public function likeItem($item_id)
    {
        $user = auth()->user();

        $user->likes()->toggle($item_id);

        // if (!$user->likes()->where($user->id, 'user_id')->exist()) {
        //     $user->likes()->attach($item_id);
        // } else {
        //     $user->likes()->detach($item_id);
        // }

        return redirect("/item/{$item_id}");
    }



    public function showOrder($item_id)
    {
        $product = Product::find($item_id);
        $user = User::with('profile')->find(auth()->id());

        return view('purchase', compact('product', 'user'));
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

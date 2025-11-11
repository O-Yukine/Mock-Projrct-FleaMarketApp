<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikeController extends Controller
{

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
}

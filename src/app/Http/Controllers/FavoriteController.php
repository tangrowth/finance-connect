<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FavoriteController extends Controller
{
    public function show(){
        $user = Auth::user();
        $user_id = Auth::id();
        $post_ids = Favorite::where('user_id', $user_id)->pluck('post_id');;
        $posts = Post::whereIn('id', $post_ids)->get();
        return view('post.favorites', compact('posts', 'user'));
    }

    public function on(Request $request){
        $id = $request->post_id;
        $form = $request->all();
        Favorite::create($form);
        return redirect()->back();
    }

    public function off(Request $request)
    {
        $id = $request->id;
        Favorite::find($id)->delete();
        return redirect()->back();
    }
}

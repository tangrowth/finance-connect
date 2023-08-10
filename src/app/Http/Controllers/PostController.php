<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Type;
use App\Models\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $user = Auth::user();
        $posts = Post::latest()->take(8)->get();
        $ways = Way::all();
        $types = Type::all();
        if(is_null($user->way_id)){
            $message = 'まだ金融の方法が決まっていないようですね。金融方法診断を受けてみませんか？';
            return view('index', compact('message', 'user', 'posts', 'ways', 'types'));
        } else {
            return view('index', compact('user', 'posts', 'ways', 'types'));
        }
    }
}

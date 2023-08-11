<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Favorite;
use App\Models\Post;
use App\Models\Type;
use App\Models\Way;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $user = Auth::user();
        $types = Type::all();
        if($user->type_id == null || $user->target == null){
            return view('user.type', compact('types'));
        }
        $latestPosts = Post::latest()->take(4)->get();
        $sameWayPosts = Post::latest()->where('way_id', $user->way_id)->take(4)->get();
        $ways = Way::all();
        if(is_null($user->way_id)){
            $message = 'まだ金融の方法が決まっていないようですね。金融方法診断を受けてみませんか？';
            return view('index', compact('message', 'user', 'latestPosts', 'sameWayPosts', 'ways', 'types'));
        } else {
            return view('index', compact('user','latestPosts', 'sameWayPosts', 'ways', 'types'));
        }
    }

    public function add(){
        $user = Auth::user();
        $ways = Way::all();
        return view('post.add', compact('user', 'ways'));
    }

    public function submit(PostRequest $request){
        $form = $request->all();
        Post::create($form);
        return redirect('/');
    }

    public function review(){
        $user = Auth::user();
        $posts = Post::where('user_id', $user->id)->get();
        return view('user.review', compact('user', 'posts'));
    }

    public function show(){
        $posts = Post::latest()->paginate(16);
        $user = Auth::user();
        $ways = Way::all();
        return view('post.show', compact('posts', 'user', 'ways'));
    }

    public function search(Request $request)
    {
        $ways = Way::all();
        $user = Auth::user();
        $word = $request->word;
        $way_id = $request->way_id;
        $query = Post::latest();
        if (!empty($word)) {
            $query->where('content', 'like', "%{$word}%");
        }
        if (!empty($way_id)) {
            $query->where('way_id', $way_id);
        }
        $posts = $query->paginate(16);
        return view('post.show', compact('posts', 'user', 'ways'));
    }

    public function detail($id){
        $post = Post::find($id);
        $user = Auth::user();
        $favorite = Favorite::where('user_id', $user->id)->where('post_id', $id)->first();
        $favorites = Favorite::where('post_id', $id)->get();
        $count = count($favorites);
        if($favorite == null) {
            return view ('post.detail', compact('post', 'user', 'count'));
        } else {
            return view ('post.detail', compact('post', 'user', 'favorite', 'count'));
        }
    }
}

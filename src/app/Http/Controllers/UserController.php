<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\User;
use App\Models\Way;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function type(){
        $types = Type::all();
        return view('user.type', compact('types'));
    }

    public function setting(Request $request){
        $form = $request->all();
        unset($form['_token']);
        $user_id = Auth::id();
        User::where('id', $user_id)->update($form);
        return redirect('/');
    }

    public function check(){
        return view('user.check');
    }

    public function judge(Request $request){
        $user = Auth::user();
        $answers = $request->input('answers');
        $counts = array_count_values($answers);
        $maxCount = max($counts);
        $result = array_search($maxCount, $counts);
        $way = Way::where('id', $result)->first();
        $latestPosts = Post::where('way_id', $result)->latest()->take(4)->get();
        $difficultyPosts = Post::where('way_id', $result)->orderBy('difficulty', 'desc')->take(4)->get();
        return view('user.result', compact('way', 'latestPosts','difficultyPosts', 'user'));
    }

}

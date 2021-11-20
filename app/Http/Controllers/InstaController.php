<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstaController extends Controller
{
    public function home() {
        if(Auth::check()) {
            $user = User::where('id', Auth::id())->first();
            $posts = Post::orderBy('created_at', 'desc')->get();
            return view('insta.home', ['posts' => $posts]);
        }
        return view('insta.login');
    }

    public function login() {
        return view('insta.login');
    }

    public function register() {
        return view('insta.register');
    }

    public function like($post_id, $user_id) {
        $postLike = PostLike::where(['user_id' => $post_id, 'post_id' => $user_id]);
        if($postLike->count() == 0) {
            $postLike = new PostLike();
            $postLike->user_id = $user_id;
            $postLike->post_id = $post_id;
            $postLike->save();
            return json_encode(['like' => true]);
        }
        $postLike->delete();
        return json_encode(['like' => false]);
    }

    public function comment(Request $request) {
//        dd($request->user_id);
        $postComment = new PostComment();
        $postComment->comment = $request->comment;
        $postComment->user_id = $request->user_id;
        $postComment->post_id = $request->post_id;
        $postComment->save();
        return redirect()->back();
    }

    public function perfilUser($perfil) {
        $user = User::where(['user' => $perfil]);
        if ($user->count() == 0) {
            return redirect()->route('home');
        }
        return view('insta.user', ['user' => $user->first()]);
    }

    public function imgUser(Request $request) {
        $user = User::findOrFail($request->user);

        if($request->hasFile('img') && $request->file('img')->isValid()) {
            $requestImg = $request->img;
            $extension = $requestImg->extension();
            $imgName = md5($requestImg->getClientOriginalName()
                . strtotime('now')) . '.' . $extension;

            $requestImg->move(public_path('img/user_img'), $imgName);
            $user->user_img = $imgName;
        }
        $user->save();

        return redirect()->back();
    }

    public function publication(Request $request) {
        $post = new Post();
        $post->descript = $request->descript;
        $post->user_id = $request->user_id;

        if($request->hasFile('img') && $request->file('img')->isValid()) {
            $requestImg = $request->img;
            $extension = $requestImg->extension();
            $imgName = md5($requestImg->getClientOriginalName()
                    . strtotime('now')) . '.' . $extension;

            $requestImg->move(public_path('img/user_img'), $imgName);
            $post->img = $imgName;
        }
        $post->save();

        return redirect()->back();
    }

}

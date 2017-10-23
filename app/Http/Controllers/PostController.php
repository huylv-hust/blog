<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    public function getCreate()
    {
        $route = route('post.create');
        $category = ['' => ''] + Category::getAllCategory();
        return view('post/create', compact('route', 'category'));
    }

    public function postCreate(PostRequest $request, Post $post)
    {
        $data = $request->all();
        //save
        if ($post->create($data)) {
            redirect(route('post.list'));
        } else {
            redirect(route('post.create'));
        }
    }

    public function getEdit($id)
    {
        $post = Post::findorFail($id);
        $category = ['' => ''] + Category::getAllCategory();
        $route = route('post.edit', ['id' => $id]);
        return view('post/create', compact('post', 'category', 'route'));
    }

    public function postEdit(PostRequest $request, Post $post, $id)
    {
        $data = $request->all();
        //save
        $post = Post::findorFail($id);
        if ($post->update($data)) {
            return redirect($request->session()->get('post_list'));
        } else {
            return redirect(route('post.edit', ['id' => $id]));
        }
    }

    public function getList(Request $request, Post $post)
    {
        $result = $post->getData($request);
        $route = route('post.list');
        $request->session()->put('post_list', $request->fullUrl());
        return view('post/list', compact('result', 'route'));
    }

    public function postDelete(Request $request)
    {
        $post = Post::findorFail($request->id);
        if ($post->delete()) {
            $request->session()->flash('success', 'レコーダの削除を完了しました。');
        }
        $request->session()->flash('error', 'レコーダの削除を完了できません。');
        return redirect()->back();
    }

}
<?php

namespace Modules\Post\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Modules\Post\Http\Requests\PostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, Post $post)
    {
        $result = $post->getData($request);
        $route = route('post.list');
        $request->session()->put('post_list', $request->fullUrl());
        $title = 'All Posts';
        return view('post::index', compact('result', 'route', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $route = route('post.create');
        $category = Category::getAllCategory();
        $title = 'New Post';
        return view('post::create', compact('route', 'category', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, Post $post)
    {
        $data = $request->all();
        //save
        if ($post->create($data)) {
            return redirect(route('post.list'));
        }
        return redirect(route('post.create'));
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findorFail($id);
        $category = Category::getAllCategory();
        $route = route('post.edit', ['id' => $id]);
        $title = 'Edit Post';
        return view('post::create', compact('post', 'category', 'route', 'title'));
    }

    /**
     * Update the specified resource in storage.
     * @param PostRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PostRequest $request, $id)
    {
        $data = $request->all();
        //save
        $post = Post::findorFail($id);
        if ($post->update($data)) {
            return redirect($request->session()->get('post_list'));
        }
        return redirect(route('post.edit', ['id' => $id]));
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        $post = Post::findorFail($request->id);
        if ($post->delete()) {
            $request->session()->flash('success', 'レコーダの削除を完了しました。');
        } else {
            $request->session()->flash('error', 'レコーダの削除を完了できません。');
        }
        return redirect()->back();
    }
}
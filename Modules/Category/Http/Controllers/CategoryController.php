<?php

namespace Modules\Category\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request, Category $category)
    {
        $result = $category->getData($request);
        $route = route('category.list');
        $request->session()->put('category_list', $request->fullUrl());
        $title = 'All Categories';
        return view('category::index', compact('result', 'route', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('category::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('category::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Category $category, Request $request)
    {
        $id = $request->id;
        $request->session()->flash('error', '最低一つレコードを選んでください。');
        if (!empty($id)) {
            $result = $category->deleteData($id = $request->id);
            if ($result) {
                $request->session()->flash('success', '完了しました。');
            } else {
                $request->session()->flash('error', '失敗しました。');
            }
        }
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Request $request)
    {
        $id = $request->id;
        $status = $request->status;
        $request->session()->flash('error', '最低一つレコードを選んでください。');
        if (!empty($id)) {
            $result = Category::whereIn('id', $id)->update(['status' => $status]);
            if ($result) {
                $request->session()->flash('success', '完了しました。');
            } else {
                $request->session()->flash('error', '失敗しました。');
            }
        }
        return redirect()->back();
    }
}

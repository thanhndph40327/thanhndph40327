<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $view;
    public function __construct()
    {
        $this->view = [];
    }
    public function index()
    {
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('category.index', $this->view);
    }
    public function create()
    {
        //
        
       
        return view('category.create', $this->view);
    }
    public function store(Request $request)
    {
        //
        $validate = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],

            ],
            [
                'name.required' => 'Trường tên không được bỏ trống',
                'name.string' => 'Tên bắt buộc là chuỗi',
                'name.max' => 'Trường tên không được vượt quá 255 ký tự',
             


            ]
        );
        //        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}

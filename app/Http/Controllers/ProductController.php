<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $view;
    public function __construct()
    {
        $this->view = [];
    }

    public function index()
    {
        //
        // Khởi tạo model
        $objPro = new Product();
        $this->view['listPro'] = $objPro->loadDataWithPager();
        // Truy vân + logic
//        $objCate = new Category();
//        $listCate = $objCate->loadAllCate();
//        $arrayCate = [];
//        foreach ($listCate as $value){
//            $arrayCate[$value->id] = $value->name;
//        }
//        $this->view['listCate'] =  $arrayCate;
            ///
//        dd( $this->view['listCate']);
        return view('product.index', $this->view);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('product.create', $this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate(
            [
               'name'=> ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'min:1'],
                'quantity' => ['required', 'integer', 'min:1'],
                'image' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
                'category_id' => ['required', 'exists:categories,id']
            ],
            [
              'name.required'=>'Trường tên không được bỏ trống',
              'name.string'=>'Tên bắt buộc là chuỗi',
              'name.max'=>'Trường tên không được vượt quá 255 ký tự',
                // Lab 6
                'price.required'=>'Trường giá không được bỏ trống',
                'price.interger'=>'Trường giá phải là số nguyên',
                'price.min'=>'Trường giá ít nhất 1 kí tự',

                'quantity.required'=>'Trường số lượng không được bỏ trống',
                'quantity.integer'=>'Trường giá phải là số nguyên',
                'quantity.min'=>'Trường giá ít nhất 1 kí tự',

                'image.required'=>'Trường ảnh không được bỏ trống',
                'image.image'=>'Trường ảnh là 1 tệp ảnh hợp lệ',
                'image.mimes:jpg,jpeg,png'=>'Trường ảnh phải có định dạng là jpg, jpeg, png',
                'image.max'=>'Trường ảnh không được vượt quá 2048 kí tự',
                
            ]
        );
//        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
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

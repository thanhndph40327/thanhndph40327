<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $view;
    public function __construct(){
        $this->view = [] ;

    }
    public function index(){
        $objCate = new Category();
        $this->view['listCate'] = $objCate->loadAllCate();
        return view('category.index' , $this->view );
}
}
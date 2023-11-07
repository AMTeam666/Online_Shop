<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Market\ProductCategory;
use App\Http\Requests\Market\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductCategory::orderBy("id","desc")->paginate(10);
        return view("admin.market.category.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.market.category.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $inputs = $request->all();

        $category = ProductCategory::create($inputs);
        return redirect()->route('admin.category.index')->with('swal-success','دسته بندی جدید شما با موفقیت ساخته شد');   

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
        return view("admin.market.category.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, ProductCategory $category)
    {
        $inputs = $request->all();
        $category->update($inputs);
        return redirect()->route('admin.category.index')->with('swal-success','دسته بندی جدید شما با موفقیت ویرایش شد');   

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductCategory $category)
    {
        $result = $category->delete();
        return redirect()->route('admin.category.index')->with('swal-success', ' دسته بندی شما با موفقیت حذف شد');    }
}

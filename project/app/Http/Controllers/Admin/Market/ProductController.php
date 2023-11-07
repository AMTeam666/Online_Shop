<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Admin\Market\Brand;
use App\Http\Controllers\Controller;
use App\Models\Admin\Market\Product;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Market\ProductRequest;
use App\Models\Admin\Market\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view("admin.market.product.index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productsCategories = ProductCategory::all();
        $brands = Brand::all();
        return view("admin.market.product.create", compact("productsCategories", "brands"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('product_image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $result = $imageService->save($request->file('product_image'));

            if($result === false)
            {
                return redirect()->route('admin.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['product_image'] = $result;
        }
        $brand = Product::create($inputs);
        return redirect()->route('admin.product.index')->with('swal-success','محصول جدید شما با موفقیت ساخته شد');   
    
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
    public function edit(Product $product)
    {
        return view('admin.market.product.edit', compact('product'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('product_image'))
        {
            if(!empty($product->product_image))
            {
                $imageService->deleteDirectoryAndFiles($product->product_image);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
            $imageService->setImageName('product_image');
            $result = $imageService->save($request->file('product_image'));
            if($result === false)
            {
                return redirect()->route('admin.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['product_image'] = $result;
        }

        $product->update($inputs);
        return redirect()->route('admin.product.index')->with('swal-success', 'محصول شما با موفقیت ویرایش شد');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $result = $product->delete();
        return redirect()->route('admin.product.index')->with('swal-success', ' محصول شما با موفقیت حذف شد');
       }
}

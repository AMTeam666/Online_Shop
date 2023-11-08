<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Admin\Market\Brand;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy("id","desc")->paginate(10);
        return view("admin.market.brand.index", compact("brands"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.market.brand.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request, ImageService $imageService)
    {
        
        $inputs = $request->all();
        if($request->hasFile('logo'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $result = $imageService->save($request->file('logo'));

            if($result === false)
            {
                return redirect()->route('admin.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }

            $inputs['logo'] = $result;
        }
        $brand = Brand::create($inputs);
        return redirect()->route('admin.brand.index')->with('swal-success','برند جدید شما با موفقیت ساخته شد');   
    
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
    public function edit(Brand $brand)
    {
        return view("admin.market.brand.edit", compact("brand"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, Brand $brand , ImageService $imageService)
    {
        $inputs = $request->all();
        if($request->hasFile('logo'))
        {
            if(!empty($brand->logo))
            {
                $imageService->deleteDirectoryAndFiles($brand->logo);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'brand');
            $imageService->setImageName('logo');
            $result = $imageService->save($request->file('logo'));
            if($result === false)
            {
                return redirect()->route('admin.brand.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }

        $brand->update($inputs);
        return redirect()->route('admin.brand.index')->with('swal-success', 'برند شما با موفقیت ویرایش شد');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $result = $brand->delete();
        return redirect()->route('admin.brand.index')->with('swal-success', ' برند شما با موفقیت حذف شد');
    }

}

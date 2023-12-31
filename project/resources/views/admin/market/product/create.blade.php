@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کالا</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">کالا </a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کالا
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.product.store') }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">نام کالا</label>
                                    <input type="text" name="product_name" class="form-control form-control-sm" value="{{ old('product_name') }}">
                                </div>
                                @error('product_name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تصویر </label>
                                    <input type="file" name="product_image" class="form-control form-control-sm">
                                </div>
                                @error('product_image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">قیمت</label>
                                    <input type="text" name="price" class="form-control form-control-sm" value="{{ old('price') }}">
                                </div>
                                @error('price')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">تعداد موجود</label>
                                    <input type="text" name="stock" class="form-control form-control-sm" value="{{ old('stock') }}">
                                </div>
                                @error('stock')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب دسته</label>
                                    <select name="category_id" id="" class="form-control form-control-sm">
                                        <option value="">دسته را انتخاب کنید</option>
                                        @foreach ($productsCategories as $productCategory)
                                            <option value="{{ $productCategory->id }}" @if(old('category_id') == $productCategory->id) selected @endif>{{ $productCategory->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('category_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب برند</label>
                                    <select name="brand_id" id="" class="form-control form-control-sm">
                                        <option value="">برند را انتخاب کنید</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id) selected @endif>{{ $brand->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('brand_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">جنسیت</label>
                                    <input type="text" name="gender" class="form-control form-control-sm" value="{{ old('gender') }}">
                                </div>
                                @error('gender')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">رنج سنی</label>
                                    <input type="text" name="age_range" class="form-control form-control-sm" value="{{ old('age_range') }}">
                                </div>
                                @error('age_range')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="description" id="body"  class="form-control form-control-sm" rows="6">{{ old('description ') }}</textarea>
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>



                            {{-- <section class="col-12 border-top border-bottom py-3 mb-3">

                                <section class="row">

                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_key[]" class="form-control form-control-sm" placeholder="ویژگی ...">
                                        </div>
                                    </section>

                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_value[]" class="form-control form-control-sm" placeholder="مقدار ...">
                                        </div>
                                    </section>

                                </section>

                                <section>
                                    <button type="button" id="btn_copy" class="btn btn-success btn-sm">افزودن</button>
                                </section> --}}



                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="stock_status"> وضعیت</label>
                                    <select name="stock_status" id="stock_status" class="form-control form-control-sm">
                                        <option value="0" @if(old('stock_status') == 0) selected @endif>غیر فعال</option>
                                        <option value="1" @if(old('stock_status') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('ststock_statusatus')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>


                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection

@section('script')


    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>


    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val() !== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function ( event ){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

    <script>
        $(function (){
            $('#btn_copy').on('click', function (){
                var ele = $(this).parent().prev().clone(true)
                $(this).before(ele)
            })
        })
    </script>

@endsection




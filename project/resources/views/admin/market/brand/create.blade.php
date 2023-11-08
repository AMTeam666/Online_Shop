@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد برند</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">برند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  ایجاد بررند  </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد برند
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.brand.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

            <section>
                <form action="{{ route('admin.market.brand.store') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label>نام فارسی برند</label>
                                <input type="text" name="persian_name" class="form-control form-control-sm">
                            </div>
                            @error('persian_name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label>نام اصلی برند</label>
                                <input type="text" name="original_name" class="form-control form-control-sm">
                            </div>
                            @error('original_name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">لوگو برند</label>
                                <input type="file" name="logo" class="form-control form-control-sm">
                            </div>
                            @error('logo')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control form-control-sm " rows="6" > {{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status"> وضعیت</label>
                                <select name="status" id="status" class="form-control form-control-sm">
                                    <option value="0" @if(old('status') == 0) selected @endif>غیر فعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12">
                            <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                        </section>

                    </section>
                </form>
            </section>


            </section>
        </section>
    </section>

@endsection
@section('script')

    <script >
        $(document).ready(function (){
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0){
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد کنید',
                tags : true,
                data : default_data
            })

            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function (event){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource);
                }
            })
        })
    </script>
@endsection


@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">ویترین </a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  ایجاد دسته بندی  </li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد دسته بندی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

            <section>
                <form action="{{ route('admin.market.category.store') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6 section-name-create-category">
                            <div class="form-group div-name-create-category" >
                                <label class="label-name-create-category">نام دسته بندی جدید</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm input-name-create-category" 
                                style="text-align: center;" placeholder="نمونه : ماشین ها" onfocus="this.placeholder = ''" onblur="this.placeholder = 'نمونه : ماشین ها'">
                            </div>
                            @error('name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 my-2 section-description-create-category">
                            <div class="form-group div-description-create-category">
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control form-control-sm textarea-description-create-category" > {{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        

                        


                        <section class="col-12 section-button-submit-create-category">
                            <button type="submit" class="btn btn-primary btn-sm button-submit-create-category">ثبت</button>
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

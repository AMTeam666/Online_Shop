@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection


@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  دسته بندی  </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        دسته بندی ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.category.create') }}" class="btn btn-info btn-sm button-create-category"><span class="button-create-category-plus"> + </span>ایجاد دسته بندی</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جست و جو .." class="form-control form-control-sm form-text">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="number-list-header-table-admin-page">#</th>
                                <th class="name-header-table-admin-page">نام دسته بندی</th>
                                <th class="slug-header-table-admin-page">اسلاگ</th>
                                <th>توضیحات</th>
                                <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات کلی </th>
                            </tr>
                        </thead>
                        <tbody>

                           @foreach($productCategories as $key => $productCategory)
                             <tr>
                                <th>{{ $key += 1 }}</th>
                                <td class="name-column-table-admin-page">{{ $productCategory->name }}</td>
                                <td class="slug-column-table-admin-page">{{ $productCategory->slug }}</td>
                                 <td class="description-column-table-admin-page">{{ $productCategory->description }}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.category.edit', $productCategory->id) }}" class="btn btn-primary btn-sm button-edit-object-admin-page"><i class="fa fa-edit"></i> ویراش</a>
                                    <form class="d-inline" action="{{ route('admin.market.category.destroy', $productCategory->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm delete button-delete-object-admin-page" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                                    </form>
                                </td>
                             </tr>
                           @endforeach
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>


@endsection
@section('script')

    <script type="text/javascript">
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('دسته با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('دسته با موفقیت غیر فعال شد')

                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی رخ داده است')

                    }
                },
                error : function (){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')

                }
            })

            function successToast(message){

                var successToastTag = '    <section class="toast" data-delay="3000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message +'</strong>\n' +
                    '<button type="button" class="mr-2  close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag)
                $('.toast').toast('show').delay(3000).queue(function (){
                    $(this).remove()
                })
            }
            function errorToast(message){

                var errorToastTag = '    <section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message +'</strong>\n' +
                    '<button type="button" class="mr-2  close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag)
                $('.toast').toast('show').delay(3000).queue(function (){
                    $(this).remove()
                })
            }
        }
    </script>

    <script type="text/javascript">
        function showMenu(id){
            var element = $("#" + id + '-show')
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.show_in_menu){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('نمایش دسته  با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('نمایش  با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>

    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection


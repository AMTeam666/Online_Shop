@extends('admin.layouts.master')

@section('head-tag')
    <title>برند</title>
@endsection


@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">  برندها  </li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        برندها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.brand.create') }}" class="btn btn-info btn-sm button-create-category"><span class="button-create-category-plus"> + </span>ایجاد برند جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" placeholder="جست و جو .." class="form-control form-control-sm form-text">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="number-list-header-table-admin-page">#</th>
                                <th class="name-header-table-admin-page">نام برند</th>
                                <th class="slug-header-table-admin-page">اسلاگ</th>
                                <th class="logo-brand-header-table-admin-page">لوگو</th>
                                <th>توضیحات</th>

                                <th class="max-width-16-rem text-center total-options-header-table-admin-page"><i class="fa fa-cogs"></i> تنظیمات کلی </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($brands as $key => $brand)

                            <tr>
                                <th>{{ $key += 1 }}</th>
                                <td class="name-column-table-admin-page">{{ $brand->name }}</td>
                                <td class="slug-column-table-admin-page">{{ $brand->slug }}</td>
                                <td>
                                    <img src="{{ asset($brand->logo) }}" alt="" width="50" height="50">
                                </td>
                                <td class="description-column-table-admin-page">{{ $brand->description }}</td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.market.brand.edit', $brand->id) }}" class="btn btn-primary btn-sm button-edit-object-admin-page"><i class="fa fa-edit"></i> ویراش</a>
                                    <form class="d-inline" action="{{ route('admin.market.brand.destroy', $brand->id) }}" method="post">
                                        @csrf
                                        {{ method_field('delete') }}
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
                            successToast('برند با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('برند با موفقیت غیر فعال شد')

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



    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection


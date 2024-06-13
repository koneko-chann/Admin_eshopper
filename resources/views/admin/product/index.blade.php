<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Sản phẩm</title>
@endsection

@section('css')
    <style>
        img {
            height: 150px;
            width: 100px;
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function actionDelete(event) {
            event.preventDefault();
            let urlRequest = $(this).data('url');
            let that = $(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: urlRequest,
                        success: function (data) {
                            if (data.code === 200) {
                                that.parent().parent().remove();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        },
                        error: function () {
                            Swal.fire({
                                title: "Error!",
                                text: "There was an error deleting the file.",
                                icon: "error"
                            });
                        }
                    });
                }
            });
        }

        $(function () {
            $(document).on('click', '.action_delete', actionDelete);
        });

        $('.hidden').click(function(e){
            e.preventDefault();
            let urlRequest = $(this).data('url');
            let that = $(this);
            $.ajax({
                type: 'POST',
                url: urlRequest,
                data: {
                    _token: "{{ csrf_token() }}",
                    id: $(this).data('id')
                },
                success: function(data){
                    console.log(data); // Check what data is returned
                    if(data.code === 200){
                        if(data.hidden == true){
                            that.html('<span class="fa fa-eye-slash"></span>');
                        } else {
                            that.html('<span class="fa fa-eye"></span>');
                        }
                    }
                },
                error: function(){
                    Swal.fire({
                        title: "Error!",
                        text: "There was an error updating the status.",
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Product','key'=>'List'])
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ẩn</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{number_format($product->price)}}</td>
                                    <td><img src="{{$product->feature_image_path}}" alt=""/></td>
                                    <td>{{optional($product->category)->name}}</td>
                                    <td>
                                        <button type="button" class="hidden" data-url="{{route('product.hide')}}" data-id="{{$product['id']}}">
                                            <span class="fa{{ $product->status == true ? ' fa-eye' : ' fa-eye-slash' }}"></span>
                                        </button>
                                    </td>
                                    <td>
                                        <a href="{{route('product.edit',['id'=>$product->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href="{{route('product.delete',['id'=>$product->id])}}"
                                           data-url="{{route('product.delete',['id'=>$product['id']])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$products->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Them san pham</title>
@endsection('title')
@section('css')
    <style>
    img{
        height: 150px;
        width: 100px;

    }
    </style>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <script>
       function actionDelete(event){
           event.preventDefault();
           let urlRequest=$(this).data('url');
           let that=$(this);
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
                       type:'GET',
                       url:urlRequest,
                       success:function (data){
if(data.code === 200){
that.parent().parent().remove();
    Swal.fire({
        title: "Deleted!",
        text: "Your file has been deleted.",
        icon: "success"
    });
}
                       },
                       error:function () {

                       }
                   })
               }
           });
       }
       $(function (){
           $(document).on('click','.action_delete',actionDelete);
       })
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
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                           @foreach($products as $product)

                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>{{$product->name}}</td>
                                    <td>{{number_format($product->price)}}</td>
                                    <td><img src="{{'/test/public'.$product->feature_image_path}}" alt=""/></td>
                                    <td>{{optional($product->category)->name}}</td>
                                    <td>
                                        <a href="{{route('product.edit',['id'=>$product->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href="{{route('product.delete',['id'=>$product->id])}}" data-url="{{route('product.delete',['id'=>$product['id']])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>

                                </tr>
                      @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{$products->links()}}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



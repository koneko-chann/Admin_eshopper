<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection('title')
@section('css')
    <style>
    img{
        width: 150px;
        height: 100px;
        object-fit: cover;
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

                        }
                    })
                }
            });
        }

        $(function () {
            $(document).on('click', '.action_delete', actionDelete);
        })
    </script>
@endsection
@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Slider','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
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
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mo ta</th>
                                <th scope="col">Hinh anh</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)

                                <tr>
                                    <th scope="row">{{$slider['id']}}</th>
                                    <td>{{$slider['name']}}</td>
                                    <td>{{$slider['description']}}</td>
                                    <td><img src="{{'/test/public'.$slider['image_path']}}"></td>
                                    <td>
                                        <a href="{{route('slider.edit',['id'=>$slider['id']])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{route('slider.delete',['id'=>$slider['id']])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{$sliders->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



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
        @include('partial.content-header',['name'=>'Users','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('users.create')}}" class="btn btn-success float-right m-2">Add</a>
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
                                <th scope="col">Tên </th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)

                                <tr>
                                    <th scope="row"></th>
                                    <td>{{$user['name']}}</td>
                                    <td>{{$user['email']}}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{route('users.edit',['id'=>$user['id']])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{route('users.delete',['id'=>$user['id']])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

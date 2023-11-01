<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Them san pham</title>
@endsection('title')


@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'category','key'=>'List'])

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
                           {{-- @foreach($categories as $category)--}}

                                <tr>
                                    <th scope="row"></th>
                                    <td>Ip4</td>
                                    <td>240</td>
                                    <td><img src="" alt=""/></td>
                                    <td></td>
                                    <td>
                                        <a href=""
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                          {{--  @endforeach--}}

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



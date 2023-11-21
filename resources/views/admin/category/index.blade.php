<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection('title')


@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'category','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @can('category_add')

                        <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
                        @endcan
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
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)

                                <tr>
                                    <th scope="row">{{$category->id}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @can('category_edit')
                                        <a href="{{route('categories.edit',['id'=> $category->id] )}}"
                                           class="btn btn-default">Edit</a>
                                        @endcan
                                            @can('category_delete')
                                        <a href="{{route('categories.delete',['id'=> $category->id])}}"
                                           class="btn btn-danger">Delete</a>
                                                @endcan
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {{$categories->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



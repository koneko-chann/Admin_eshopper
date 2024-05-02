@extends('layouts.admin')
@section('title')
    <title>Nhập kho sản phẩm</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partial.content-header', ['name' => 'Nhập kho sản phẩm', 'key' => 'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('import.create',['warehouse_id'=>$warehouse_id])}}" class="btn btn-success float-right m-2">Nhập kho</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Mã phiếu</th>
                                <th scope="col">Nhà kho</th>
                                <th scope="col">Ngày nhập</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($imports as $import)
                                <tr>
                                    <th scope="row"></th>
                                    <td>{{$import->id}}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <a href=""
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
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

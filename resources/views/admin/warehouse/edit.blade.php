@extends('layouts.admin')
@section('title')
    <title>Chỉnh sửa nhà kho</title>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partial.content-header', ['name' => 'Nhà kho', 'key' => 'Chỉnh sửa'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('warehouse.update', ['id' => $warehouse->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Tên nhà kho</label>
                                <input type="text"
                                       class="form-control"
                                       name="name"
                                       placeholder="Nhập tên nhà kho"
                                       value="{{$warehouse->name}}">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text"
                                       class="form-control"
                                       name="address"
                                       placeholder="Nhập địa chỉ"
                                       value="{{$warehouse->address}}">
                            </div>
                                
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text"
                                       class="form-control"
                                       name="manager_phone"
                                       placeholder="Nhập số điện thoại"
                                       value="{{$warehouse->manager_phone}}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"
                                       class="form-control"
                                       name="email"
                                       placeholder="Nhập email"
                                       value="{{$warehouse->email}}">
                            </div>
                            <div class="form-group">
                                <label>Note</label>
                                <input type="text"
                                       class="form-control"
                                       name="note"
                                       placeholder="Note"
                                       value="{{$warehouse->note}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


                                
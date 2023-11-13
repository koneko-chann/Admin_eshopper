
@extends('layouts.admin')

@section('title')
    <title>Thêm menu</title>
@endsection('title')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-selection__choice{
            background-color: #0e5b44 !important;
        }
    </style>
@endsection('css')
@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Users','key'=>'Add'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">  <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label >Tên </label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên user">
                            </div>
                            <div class="mb-3">
                                <label >Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Nhập email ">
                            </div>
                            <div class="mb-3">
                                <label >Password</label>
                                <input name="password" type="text" class="form-control" placeholder="Nhập password" >
                            </div>
                            <div class="mb-3">
                                <label >Vai trof</label>
                                <select name="role_id[]" class="form-control select2_init" multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option value="{{$role['id']}}">{{$role['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2_init').select2({
            'placeholder':'Chọn vai trò'
        })
    </script>
@endsection

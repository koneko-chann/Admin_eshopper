
@extends('layouts.admin')

@section('title')
    <title>Thêm menu</title>
@endsection('title')
@section('content')

    <div class="content-wrapper">
@include('partial.content-header',['name'=>'Menu','key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-6">  <form action="{{route('menus.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label >Tên menu</label>
            <input name="name" type="text" class="form-control" placeholder="Nhập tên menu">

        </div>
        <div class="mb-3">
            <label>Chọn menu cha</label></br>
            <select class="form-control" aria-label="Default select example" name="parent_id">
            <option  value="0">Vui lòng chọn</option>
{!! $optionSelect !!}
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



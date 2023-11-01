
@extends('layouts.admin')

@section('title')
    <title>Thêm danh mục</title>
@endsection('title')
@section('content')

    <div class="content-wrapper">
@include('partial.content-header',['name'=>'category','key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
<div class="col-md-6">  <form action="{{route('categories.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label >Tên danh mục</label>
            <input name="name" type="text" class="form-control" placeholder="Nhập tên danh mục">

        </div>
        <div class="mb-3">
            <label>Chọn danh mục cha</label></br>
            <select class="form-control" aria-label="Default select example" name="parent_id">
            <option  value="0">Vui lòng chọn</option>
                {!! $htmlOption !!}
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



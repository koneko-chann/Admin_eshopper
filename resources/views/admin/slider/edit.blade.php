
@extends('layouts.admin')

@section('title')
    <title>Thêm menu</title>
@endsection('title')
@section('css')
<style>
img{
    width: 150px;
    height: 100px;
}

</style>
    @endsection

@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Slider','key'=>'Edit'])
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
                    <div class="col-md-6">  <form action="{{route('slider.update',['id'=>$slider['id']])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label >Tên slider</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên slider" value="{{$slider['name']}}">

                            </div>
                            <div class="mb-3">
                                <label >Mô tả</label>
                                <input name="description" type="text" class="form-control" placeholder="Nhập moo ta " value="{{$slider['description']}}">

                            </div>
                            <div class="mb-3">
                                <label >Anh</label>
                                <input name="image_path" type="file" class="form-control-file" >
<img src="{{'/test/public'.$slider['image_path']}}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



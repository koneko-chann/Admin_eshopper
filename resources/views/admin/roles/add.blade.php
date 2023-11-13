
@extends('layouts.admin')

@section('title')
    <title>Thêm menu</title>
@endsection('title')
@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Roles','key'=>'Add'])
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
                    <div class="col-md-12">  <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label >Tên vai trò</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên slider">

                            </div>
                            <div class="mb-3">
                                <label >Mô tả</label>
                                <textarea name="display_name" rows="4" class="form-control" >
{{old('display_name')}}
                                    </textarea>

                            </div>
<div class="col-md-12 flex">
<div class="w-3/4 flex-grow-1">

    <div class="card text-black bg-white w-100 flex-grow-1" >
        <div class="card-header bg-cyan">
            <label for="">
                <input type="checkbox" value="">
            </label>
            Module san pham
        </div>
       <div class="d-flex flex-row">
           @for($i=1;$i<4;$i++)
               <div class="card-body  ">
                   <h5 class="card-title">
                       <label for="">
                           <input type="checkbox" value="">
                       </label>
                       Thêm sản phẩm
                   </h5>
               </div>
           @endfor
       </div>
    </div>
</div>
</div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



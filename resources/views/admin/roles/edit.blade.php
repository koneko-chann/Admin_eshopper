
@extends('layouts.admin')

@section('title')
    <title>Thêm menu</title>
@endsection('title')
@section('js')
<script>
    $('.checkbox_wrapper').on('click',function (){
        $(this).parents('.card').find('.checkbox_children').prop('checked',$(this).prop('checked'))
    })
    $('.checkall').on('click',function (){
        $(this).parents().find('.checkbox_children').prop('checked',$(this).prop('checked'));
        $(this).parents().find('.checkbox_wrapper').prop('checked',$(this).prop('checked'))
    })
</script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Roles','key'=>'Edit'])
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
                    <div class="col-md-12">  <form action="{{route('roles.update',['id'=>$role['id']])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label >Tên vai trò</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên slider" value="{{$role['name']}}">

                            </div>
                            <div class="mb-3">
                                <label >Mô tả</label>
                                <textarea name="display_name" rows="4" class="form-control" >
{{$role['display_name']}}
                                    </textarea>

                            </div>
<div class="col-md-12 flex">
<div class="w-3/4 flex-grow-1">
    <div class="col-md-12">
        <div class="row">
            <label>
                Check all
            </label>
            <input type="checkbox" class="checkall">
        </div>
    </div>
@foreach($permissionsParent as $permission)
    <div class="card text-black bg-white w-100 flex-grow-1" >
        <div class="card-header bg-cyan">
            <label for="">
                <input type="checkbox" value="" class="checkbox_wrapper">
            </label>
            Module {{$permission['name']}}
        </div>
       <div class="d-flex flex-row">
           @foreach($permission->PermissionChildren as $PermissionChildrenItem)
               <div class="card-body  ">
                   <h5 class="card-title">
                       <label for="">
                           <input type="checkbox" class="checkbox_children" name="permission_id[]"
                                  {{$permissionsChecked->contains($PermissionChildrenItem)? 'checked' :' '}}
                                  value="{{$PermissionChildrenItem->id}}">
                       </label>
                       {{ $PermissionChildrenItem->name}}
                   </h5>
               </div>
           @endforeach
       </div>
    </div>
    @endforeach
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



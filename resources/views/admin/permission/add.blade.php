
@extends('layouts.admin')

@section('title')
    <title>Thêm menu</title>
@endsection('title')
@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Permission','key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">  <form action="{{route('permissions.store')}}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label>Chọn ten module</label><br>
                                <select class="form-control" aria-label="Default select example" name="module_parent">
                                    @foreach(config('permissions.table_module') as $table_module_item)
                                    <option  value="{{$table_module_item}}">{{$table_module_item}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                @foreach(config('permissions.children_module') as $children)
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" value="{{$children}}" name="module_children[]">
                                        {{$children}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



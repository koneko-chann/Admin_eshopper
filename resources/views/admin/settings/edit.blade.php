
@extends('layouts.admin')

@section('title')
    <title>Thêm setting</title>
@endsection('title')
@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Setting','key'=>'Edit'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">  <form action="{{route('settings.update',['id'=>$settings['id']])}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label >Config key</label>
                                <input name="config_key" type="text" class="form-control" placeholder="Nhập config key" value="{{$settings['config_key']}}">

                            </div>
                            @if(request()->type==='Text')
                                <div class="mb-3">
                                    <label>Config Value</label></br>
                                    <input name="config_value" type="text" class="form-control" placeholder="Nhập config value"  value="{{$settings['config_value']}}">

                                </div>
                            @elseif(request()->type==='TextArea')
                                <div class="mb-3">
                                    <label>Config Value</label></br>
                                    <textarea name="config_value" class="form-control" placeholder="Nhập config value" rows="5"  >{{$settings['config_value']}}</textarea>
                                </div>
                            @endif
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



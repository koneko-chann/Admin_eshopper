@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection('title')


@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Home','key'=>'Home'])


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        Trang chủ
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection



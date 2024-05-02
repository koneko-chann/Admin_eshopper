@extends('layouts.admin')
@section('title')
<title>Flash Sale</title>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__choice{
        background-color: #0a0e14 !important;
    }
    img{
        height: 200px;
        width: 100px;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partial.content-header',['name'=>'Flash sale','key'=>'List'])
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
                <div class="col-md-12">
                    <a href="{{route('flashsales.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                @if (session('message'))
                    <div class="alert alert-danger">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="col-md-12">
                    <table class="table">
                        @csrf

                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Banner</th>
                            <th scope="col">Active</th>
                            <th scope="col">Bắt đầu</th>
                            <th scope="col">Kết thúc</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flashsales as $flashsale)
                            <tr data-id="{{$flashsale->id}}">
                                <th scope="row"></th>
                                <td>{{$flashsale->title}}</td>
                                <td><img src="{{'/test/public'.$flashsale->banner_path}}" alt="lll" width="50px" height="50px"/></td>
                                <td >

                                    <div class="form-check form-switch" style="margin-left:25%;">
                                       <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" @if($flashsale->active == 1) checked @endif>
                                    </div>
                                </td>
                                <td>{{$flashsale->start_at}}</td>
                                <td>{{$flashsale->end_at}}</td>
                                <td>
                                    <a href="{{route('flashsales.edit',['id'=>$flashsale->id])}}"
                                       class="btn btn-default">Edit</a>
                                    <a href=""
                                       data-url="{{route('flashsales.delete',['id'=>$flashsale->id])}}"
                                       class="btn btn-danger action_delete">Delete</a>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{$flashsales->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    
        function actionDelete(event) {
            event.preventDefault();
            let urlRequest = $(this).data('url');
            let that = $(this);
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'GET',
                        url: urlRequest,
                        success: function (data) {
                            if (data.code === 200) {
                                that.parent().parent().remove();
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        },
                        error: function () {

                        }
                    })
                }
            });
        }

        $(function () {
            $(document).on('click', '.action_delete', actionDelete);
        })
    //make switch active or not active user by click to switch button in table user list page admin, using ajax
    $(document).ready(function (){
    $(document).on('click','#flexSwitchCheckChecked',function (){
        let active = $(this).prop('checked');
        let id = $(this).closest('tr').attr('data-id');
        $.ajax({
            url: "{{route('flashsales.active')}}",
            method: 'POST',
            data: {active: active, id: id,_token: '{{csrf_token()}}' }
        });
    });
});

</script>
@endsection

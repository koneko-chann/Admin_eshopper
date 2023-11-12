<!-- resources/views/child.blade.php -->

@extends('layouts.admin')

@section('title')
    <title>Settings</title>
@endsection('title')
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
                                    text: "Your setting has been deleted.",
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
    </script>
@endsection

@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Settings','key'=>'List'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="dropdown float-right mb-1">
                            <button class="btn btn-secondary dropdown-toggle bg-success" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Add Settings
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{route('settings.create').'?type=Text'}}">Text</a></li>
                                <li><a class="dropdown-item" href="{{route('settings.create').'?type=TextArea'}}">Text area</a></li>

                            </ul>
                        </div>
                    </div>
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settings as $setting)

                                <tr>
                                    <th scope="row">{{$setting['id']}}</th>
                                    <td>{{$setting['config_key']}}</td>
                                    <td>{{$setting['config_value']}}</td>
                                    <td>
                                        <a href="{{route('settings.edit',['id'=>$setting['id']]).'?type='.$setting['type']}}"
                                           class="btn btn-default">Edit</a>
                                        <a href=""
                                           data-url="{{route('settings.delete',['id'=>$setting['id']])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
{{$settings->links()}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection



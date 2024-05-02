@extends('layouts.admin')
@section('title')
    <title>Nhà kho</title>
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
                    type: 'DELETE',
                    data:{_token:'{{csrf_token()}}'},
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
</script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partial.content-header', ['name' => 'Nhà kho', 'key' => 'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{route('warehouse.create')}}" class="btn btn-success float-right m-2">Thêm nhà kho</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên nhà kho</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warehouses as $warehouse)
                                <tr>
                                    <th scope="row">{{$warehouse->id}}</th>
                                    <td>{{$warehouse->name}}</td>
                                    <td>{{$warehouse->address}}</td>
                                    <td>{{$warehouse->manager_phone}}</td>
                                    <td>{{$warehouse->email}}</td>
                                    <td>
                                        <a href="{{route('warehouse.edit', ['id' => $warehouse->id])}}"
                                           class="btn btn-default">Edit</a>
                                        <a href="{{route('import.index',['warehouse_id' => $warehouse->id])}}"
                                           class="btn btn-default">Import</a>
                                           <a href=""
                                           class="btn btn-default">Export</a>
                                        <a href=""
                                           data-url="{{route('warehouse.delete', ['id' => $warehouse->id])}}"
                                           class="btn btn-danger action_delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

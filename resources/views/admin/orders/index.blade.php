@extends('layouts.admin')
@section('title')
<title>Order Management</title>
@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-selection__choice {
        background-color: #0a0e14 !important;
    }
    img {
        height: 200px;
        width: 100px;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partial.content-header',['name'=>'Order','key'=>'List'])
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
                            <th scope="col">User ID</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment Method</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr data-id="{{$order->id}}">
                                <th scope="row">{{$order->id}}</th>
                                <td>{{$order->user_id}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>
                                    <select class="form-control status-select" data-id="{{$order->id}}">
                                        <option value="0" @if($order->status == 0) selected @endif>Processing</option>
                                        <option value="1" @if($order->status == 1) selected @endif>Delivering</option>
                                        <option value="2" @if($order->status == 2) selected @endif>Done</option>
                                    </select>
                                </td>
                                <td>{{$order->payment_method}}</td>
                                
                                <td>
                                    {{-- <a href="{{route('orders.edit',['id'=>$order->id])}}"
                                       class="btn btn-default">Edit</a>
                                    <a href=""
                                       data-url="{{route('orders.delete',['id'=>$order->id])}}"
                                       class="btn btn-danger action_delete">Delete</a> --}}
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{$orders->links()}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function (){
        $(document).on('change', '.status-select', function (){
            let status = $(this).val();
            let id = $(this).data('id');
            $.ajax({
                url: "{{route('orders.changeStatus')}}",
                method: 'POST',
                data: {status: status, id: id, _token: '{{csrf_token()}}' },
                success: function(data) {
                    Swal.fire({
                        title: "Updated!",
                        text: "Order status has been updated.",
                        icon: "success"
                    });
                },
                error: function() {
                    Swal.fire({
                        title: "Error!",
                        text: "There was an error updating the order status.",
                        icon: "error"
                    });
                }
            });
        });
    });
</script>
@endsection

@extends('layouts.admin')
@section('title')
    <title>Tồn kho</title>

@endsection
@section('js')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script> 
    <script>
        $(document).ready(function() {
            var table=  $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('inventory.getInventory') }}",
                    data: function(d) {
                        d.category_id = $('#filter-category').val();
                    }
                },
                
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category_name',
                        name: 'category_name'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'store_quantity',
                        name: 'store_quantity'
                    },
                    {
                        data: 'warehouse_quantity',
                        name: 'warehouse_quantity'
                    },
                    {
                        data: 'total_quantity',
                        name: 'total_quantity'
                    },
                    {
                        data: 'last_import_date',
                        name: 'last_import_date'
                    },
                    {
                        data: 'last_imported_by',
                        name: 'last_imported_by'
                    },
                ]
            });
            $('#filter-category').on('change', function() {
                table.draw();
            });
        });
    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        @include('partial.content-header', ['name' => 'Tồn kho', 'key' => 'Danh sách'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                {{-- <div class="form-group">
                                    <select class="form-control" id="filter">
                                        <option value="0">Lọc theo danh mục</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="inventory-table">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Store Quantity</th>
                                                    <th>Warehouse Quantity</th>
                                                    <th>Total Quantity</th>
                                                    <th>Last Import Date</th>
                                                    <th>Last Imported By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($inventory as $product)
                                                    <tr>
                                                        <td>{{ $product->id }}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->category_name }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>{{ $product->store_quantity }}</td>
                                                        <td>{{ $product->warehouse_quantity }}</td>
                                                        <td>{{ $product->total_quantity }}</td>
                                                        <td>{{ $product->last_import_date }}</td>
                                                        <td>{{ $product->last_imported_by }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div> --}}
                                <div>
                                    <label for="filter-category">Filter by Category:</label>
                                    <select id="filter-category">
                                        <option value="">All</option>
                                        <!-- Add options dynamically from the database or statically here -->
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <table class="table table-bordered data-table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Store Quantity</th>
                                            <th>Warehouse Quantity</th>
                                            <th>Total Quantity</th>
                                            <th>Last Import Date</th>
                                            <th>Last Imported By</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


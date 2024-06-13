@extends('layouts.admin')
@section('title')
    <title>Nhập kho sản phẩm</title>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function (){
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',']
        });
        $(".select2_init").select2({
            allowClear: true,
            closeOnSelect: false
        })
    })
    $('.store_or_warehouse').change(function(){
        var supplier_id = $(this).val(); // Get supplier_id from selected option
            var url = window.location.pathname; // Get current URL
            var urlParts = url.split('/'); // Split the URL into parts
            var warehouse_id = urlParts[urlParts.indexOf('import') + 1]; // Get the part after 'import'
          

            var ajaxUrl = '/test/public/admin/warehouse/import/'+warehouse_id+'/getProductsSupplierWarehouse/' + supplier_id ; // Construct the URL

            products = $.ajax({
                url: ajaxUrl,
                type: "GET",
                dataType: "json",
                success:function(data){
                    console.log(data);
                    $('#product_id').html('');
                    $.each(data, function(key, value){
              if(value.quantity>0){
                
                $('#product_id').append('<option value="'+value.id+'">'+value.id+'-'+value.name+'-'+value.price+'</option>');
              }
               else{
                $('#product_id').append('<option value="'+value.id+'" disabled>'+value.id+'-'+value.name+'-'+value.price+'</option>');
               }
              });
                }
            })
            console.table(products);
        })
        $(document).ready(function() {
            $('.prv').on('change', function() {
                // Initially hide all sections
                $('.p1, .p2, .p3').hide();
                if (this.value == '0') {
                    $('.import-data').html(`<th scope="col">ID</th>
                                                <th scope="col">Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Quantity</th>`);
                    // Show and populate the first select for stores or warehouses
                    $('.p1').show().find('select').html(`
    <option value="">Chọn cửa hàng hoặc kho hệ thống</option>
    @foreach ($store_or_warehouse as $store)
        <option value="{{ $store->id }}">
            {{ $store->warehouse_id ? 'Kho - '.$store->name : ($store->store_id ? 'Cửa hàng - '.$store->name : '') }}
        </option>
    @endforeach
`);
                } else if (this.value == '1') {
                    $.each(globalData, function(key, value){
              if(value.quantity>0){
                $('#product_id').append('<option value="'+value.id+'">'+value.id+'-'+value.name+'-'+value.price+'</option>');
              }
               else{
                $('#product_id').append('<option value="'+value.id+'" disabled>'+value.id+'-'+value.name+'-'+value.price+'</option>');
               }
              });
                    $('.import-data').html(`<th scope="col">ID</th>
                                                <th scope="col">Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Import Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Total cost</th>`);
                    // Show and populate the second select for providers
                    let html = '';
                    $.ajax({
                            url: "{{ route('supplier.get') }}",
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                console.table(data);
                               html='<option value="">Chọn nhà cung cấp</option>';
                                $.each(data, function(key, value) {
                                    html+='<option value="' + value.id + '">' + value.name + '</option>';
                                });
                                $('.p2').show().find('select').html(html);
                                
                            }
                        });
                        
                } else if (this.value == '2') {
                    $.each(globalData, function(key, value){
              if(value.quantity>0){
                $('#product_id').append('<option value="'+value.id+'">'+value.id+'-'+value.name+'-'+value.price+'</option>');
              }
               else{
                $('#product_id').append('<option value="'+value.id+'" disabled>'+value.id+'-'+value.name+'-'+value.price+'</option>');
               }
              });
                    $('.import-data').html(`<th scope="col">ID</th>
                                                <th scope="col">Product Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Import Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Discount</th>
                                                <th scope="col">Total cost</th>`);
                    // Show and populate the third div for adding provider information
                    $('.p3').show().html(`
                <input type="text" class="form-control" name="supplier_name" placeholder="Nhập tên nhà cung cấp" required>
                <input type="text" class="form-control" name="supplier_phone" placeholder="Nhập số điện thoại" required>
                <input type="text" class="form-control" name="supplier_email" placeholder="Nhập email" required>
                <input type="text" class="form-control" name="supplier_address" placeholder="Nhập địa chỉ" required>
                <button type="button" class="btn btn-primary mt-3" id="add_provider">Thêm nhà cung cấp</button>`);
                
                }
            });
        });
        $(document).on('click', '#add_provider', function() {
            var supplier_name = $('input[name="supplier_name"]').val();
            var supplier_phone = $('input[name="supplier_phone"]').val();
            var supplier_email = $('input[name="supplier_email"]').val();
            var supplier_address = $('input[name="supplier_address"]').val();
            $.ajax({
                url: "{{ route('supplier.store') }}",
                type: "POST",
                data: {
                    supplier_name: supplier_name,
                    supplier_phone: supplier_phone,
                    supplier_email: supplier_email,
                    supplier_address: supplier_address,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    if (data.code == 200) {
                        $('.p3').html('<p class="text-success">Thêm nhà cung cấp thành công</p>');
                        $.ajax({
                            url: "{{ route('supplier.get') }}",
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('.old_provider').html('');
                                $.each(data.data, function(key, value) {
                                    $('.old_provider').append('<option value="' + value.id + '">' + value.name + '</option>');
                                });
                            }
                        });
                    } else {
                        $('.p3').html('<p class="text-danger">Thêm nhà cung cấp thất bại</p>');
                    }
                }
            });
        });
        var globalData=null;
        $(document).ready(function(){
            console.log('ready');
          $.ajax({
            url: "{{route('product.get')}}",
            type: "GET",
            dataType: "json",
            success:function(data){
                globalData=data.data;
              $.each(data.data, function(key, value){
              if(value.quantity>0){
                $('#product_id').append('<option value="'+value.id+'">'+value.id+'-'+value.name+'-'+value.price+'</option>');
              }
               else{
                $('#product_id').append('<option value="'+value.id+'" disabled>'+value.id+'-'+value.name+'-'+value.price+'</option>');
               }
              });
            }
          });
        })
        $(document).ready(function(){
    $('#product_id').on('change', function(){
        var id=$(this).val();
        console.log(id);
        var exist_id=[];
        $('tbody tr').each(function(){
            exist_id.push($(this).data('id').toString());
        })
        console.log(exist_id);
       if(exist_id.length>0){
        $.each(exist_id,function(key,value){
            if(id.indexOf(value.toString())===-1){
                $('tbody tr[data-id="'+value+'"]').remove();
            }
        })
       }
        if(id.length>0){
            $.each(id,function(key,value){
                $.each(globalData,function(key1,value1){
                    if(value.toString()==value1.id.toString() && exist_id.indexOf(value1.id.toString())===-1 && $('.prv:checked').val()!='0'){
                        var html='<tr data-id="'+value1.id+'">';
                        html+='<td>'+value1.id+'</td>';
                        html+='<td><img src="'+value1.feature_image_path+'" alt="" width="50" height="50"></td>';
                        html+='<td>'+value1.name+'</td>';
                        html+='<td ><input type="text" class="form-control import-price" required></td>';
                        html+='<td><input type="text" class="form-control quantity" required></td>';
                        html+='<td><input type="text" class="form-control discount" name="discount" value="0" required></td>';
                        html+='<td><input type="text" name="total-cost" value="" disabled></td>'
                        html+='</tr>';
                        $('tbody').append(html);
                        exist_id.push(value1.id);
                    }
                    else if(value.toString()==value1.id.toString() && exist_id.indexOf(value1.id.toString())===-1 && $('.prv:checked').val()=='0'){
                        var html='<tr data-id="'+value1.id+'">';
                        html+='<td>'+value1.id+'</td>';
                        html+='<td><img src="'+value1.feature_image_path+'" alt="" width="50" height="50"></td>';
                        html+='<td>'+value1.name+'</td>';
                        html+='<td><input type="number" class="form-control quantity" min="1" max="'+value1.quantity+'" required></td>';
                        html+='</tr>';
                        $('tbody').append(html);
                        exist_id.push(value1.id);
                    }
                })
            })
        }
        else{
            $('tbody').html('');
        }
    })
});
$(document).on('change','.quantity, .import-price, .discount',function(){
    var quantity=$(this).closest('tr').find('.quantity').val();
    var import_price=$(this).closest('tr').find('.import-price').val();
    var discount=$(this).closest('tr').find('.discount').val();
    var total_cost=(quantity*import_price)*(1-discount/100);
    $(this).closest('tr').find('input[name="total-cost"]').val(total_cost);
})
    </script>
@endsection

@section('content')
    {{-- create the add screen for the import warehouse --}}
    <div class="content-wrapper">
        @include('partial.content-header', ['name' => 'Nhập kho sản phẩm', 'key' => 'Thêm'])
        <a href="{{route('import.getProductsSupplierWarehouse',['supplier_id'=>1,'warehouse_id'=>1])}}" class="btn btn-primary float-right">Test</a>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h2>Nếu có sản phẩm mới, vui lòng thêm ở mục <a href="{{route('product.create')}}">Sản phẩm</a> trước</h2>

                        {{-- create the form to add the import warehouse --}}
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Người cung cấp</label>
                                <br>
                                <input class="prv" type="radio" name="provider" value="0">Lấy về từ cửa hàng và kho
                                hàng hệ thống
                                <input class="prv" type="radio" name="provider" value="1">Nhà cung cấp cũ
                                <input class="prv" type="radio" name="provider" value="2">Nhà cung cấp mới
                                <div class="p1">
                                    <select class="form-control store_or_warehouse" name="store_or_warehouse">
                                    </select>
                                </div>
                                <div class="p2">
                                    <select class="form-control old_provider" name="old_provider_id">
                                    </select>
                                </div>
                                <div class="form-group provider-info p3">
                                </div>
                                <div class="mb-3">
                                    <label>Chọn sản phẩm </label><br>
                                    <select class="form-control select2_init" aria-label="Default select example" id="product_id" name="product_id[]" multiple  @required(true)>
                                    </select>
                                </div>
                
                                <div class="col-md-12">
                                    <table class="table" >
                                        <thead>
                                            <tr class="import-data">
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Nhập kho</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        @endsection

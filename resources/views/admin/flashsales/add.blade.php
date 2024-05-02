@extends('layouts.admin')
@section('title')
    <title>Thêm flash sale</title>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partial.content-header',['name'=>'Product','key'=>'Add'])
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
    <form action="{{route('flashsales.store')}}" method="post" enctype="multipart/form-data">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                        @csrf
                        <div class="mb-3">
                            <label >Tên flash sale</label>
                            <input name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}" placeholder="Nhập tên flash sale" required>
                        </div>
                        <div class="mb-3">
                            <label >Banner</label>
                            <input name="banner" type="file" class="form-control banner @error('title') is-invalid @enderror" value="{{old('banner')}}" >
                            <img id="previewImage" src="" alt="Image Preview" width="100" height="200"/>
                        </div>
                        <div class="mb-3">
                            <label>Chọn sản phẩm </label><br>
                            <select class="form-control select2_init" aria-label="Default select example" id="product_id" name="product_id[]" multiple  @required(true)>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label >Bắt đầu</label>
                            <input name="start_at" id="start" type="datetime-local" class="form-control @error('title') is-invalid @enderror" value="{{old('start_at')}}" @required(true)>
                        </div>
                        <div class="mb-3">
                            <label >Kết thúc</label>
                            <input name="end_at" id="end" type="datetime-local" class="form-control @error('title') is-invalid @enderror" value="{{old('end_at')}}" @required(true)>
                        </div>
                        <div class="col-md-12">
                            <table class="table" >
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Base Price</th>
                                        <th scope="col">Discount</th>
                                        <th scope="col">Discount Type</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Pirce after discount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-md-12">
                </div>
            </div>


        </div>
    </div>
    </form>
</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
//     $(document).on('change','tbody',function() {
//     $('.select2').select2();
// });
// onload file image
$(document).ready(function() {
    $('.banner').change(function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewImage').attr('src', e.target.result);
        }
        reader.readAsDataURL(this.files[0]);
    });
});
$('#start, #end').on('change', function() {
    var start = new Date($('#start').val());
    var end =new Date($('#end').val());
    var now = new Date();
    if(end <= now){
        alert('Kết thúc phải lớn hơn thời gian hiện tại');
        $('#end').val('');
    }
    else if (start && end && start >= end) {
        alert('Bắt đầu phải nhỏ hơn kết thúc');
        $('#end').val('');
    }
});
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
</script>
    <script>
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
                    if(value.toString()==value1.id.toString() && exist_id.indexOf(value1.id.toString())===-1){
                        var html='<tr data-id="'+value1.id+'">';
                        html+='<td>'+value1.id+'</td>';
                        html+='<td><img src="/test/public'+value1.feature_image_path+'" alt="" width="50" height="50"></td>';
                        html+='<td>'+value1.name+'</td>';
                        html+='<td class="original-price">'+Number(value1.price).toLocaleString('vi-VN').replace(/\./g, ',')+'</td>';
                        html+='<td><input type="text" class="form-control discount" name="discount[]" value="" required></td>';
                        html+='<td><select class="form-control select2 discount-type" name="discount_type[]" required>';
                        html+='<option value="flat">Flat</option>';
                        html+='<option value="percent">Percent</option>';
                        html+='</select></td>';
                        html+='<td><input type="number" name="quantity[]" min="1" max="'+value1.quantity+'" value="1"></td>'
                        html+='<td ><input name="price_after_discount[]" type="text" class="price-after-discount" style=" border: none;background: transparent;" readonly value=""></td>'
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
    // Khi .discount hoặc .discount-type thay đổi
    $(document).on('change', '.discount, .discount-type', function() {
    console.log('change');
    // Lấy giá trị discount và discount type
    var discount = parseFloat($(this).closest('tr').find('.discount').val());
    var discountType = $(this).closest('tr').find('.discount-type').val();

    // Lấy giá ban đầu và chuyển đổi sang số
    var originalPrice = parseFloat($(this).closest('tr').find('.original-price').text().replace(/\,/g, ''));

    // Tính toán giá sau khi giảm giá
    var priceAfterDiscount;
    if (discountType === 'flat') {
        priceAfterDiscount = Math.max(originalPrice - discount, 0);
    } else if (discountType === 'percent') {
        priceAfterDiscount = Math.max(originalPrice - (originalPrice * (discount / 100)), 0);
    }
    // Cập nhật giá sau khi giảm giá
    $(this).closest('tr').find('.price-after-discount').val(priceAfterDiscount.toLocaleString('vi-VN').replace(/\./g, ','));
});


    
    </script>
@endsection
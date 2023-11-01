
@extends('layouts.admin')

@section('title')
    <title>Thêm san pham</title>
@endsection('title')
@section('css')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

    <div class="content-wrapper">
        @include('partial.content-header',['name'=>'Product','key'=>'Add'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">  <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label >Tên sản phẩm</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên sanrn phẩm">
                                <label >Giá sản phẩm</label>
                                <input name="price" type="text" class="form-control" placeholder="Nhập giá sản phẩm">
                                <label >Ảnh đại dện</label>
                                <input name="image_path" type="file" class="form-control" >
                                <label >Ảnh chi tiết</label>
                                <input multiple name="feature_image_path" type="file" class="form-control" >
                            </div>
                            <div class="mb-3">
                                <label>Chọn danh mục </label></br>
                                <select class="form-control select2_init" aria-label="Default select example" name="category">
                                    <option  value="0">Vui lòng chọn</option>
                                    {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phaamr</label>
                                <select class="form-control tags_select_choose" multiple="multiple">

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nhập nội dung</label>
                                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(function (){
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });
        $(".select2_init").select2({

            allowClear: true

        })
    })
</script>
@endsection



@extends('layouts.admin')

@section('title')
    <title>Thêm san pham</title>
@endsection('title')
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
        @include('partial.content-header',['name'=>'Product','key'=>'Edit'])
        <form action="{{route('product.update',['id'=>$product->id])}}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="mb-3">
                                <label >Tên sản phẩm</label>
                                <input name="name" type="text" class="form-control" placeholder="Nhập tên sản phẩm"
                                       value="{{$product->name}}">
                                <label >Giá sản phẩm</label>
                                <input name="price" type="text" class="form-control" placeholder="Nhập giá sản phẩm" value="{{$product->price}}">
                                <label >Ảnh đại dện</label>
                                <input name="feature_image_path" type="file" class="form-control-file"  >
                                <div   class="col-md-12">
                                    <img src="{{'/test/public'.$product->feature_image_path}}">
                                </div>
                                <label >Ảnh chi tiết</label>
                                <input multiple name="image_path[]" type="file" class="form-control-file" >
                                <div class="col-md-12">
                                    <div class="row">
                                        @foreach($product->productImages as $productImageItem)
                                        <div class="col-md-3">
                                            <img src="{{'/test/public'.$productImageItem->image_path}}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Chọn danh mục </label><br>
                                <select class="form-control select2_init" aria-label="Default select example" name="category_id">
                                    <option  value="0">Vui lòng chọn</option>
                                   {!! $htmlOption !!}
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nhập tags cho sản phaamr</label>
                                <select name = "tags[]" class="form-control tags_select_choose" multiple="multiple">
@foreach($product->tags as $tagsItem)
    <option value="{{$tagsItem->name}}" selected>{{$tagsItem['name']}}</option>
@endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Nhập nội dung</label>
                                <textarea name="content" class="form-control tinymce_editor_init" id="exampleFormControlTextarea1" rows="8" >{{$product->content}}</textarea>
                            </div>
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
        $(function (){
            $(".tags_select_choose").select2({
                tags: true,
                tokenSeparators: [',']
            });
            $(".select2_init").select2({

                allowClear: true

            })
        })
    </script>
    <script src="https://cdn.tiny.cloud/1/01gqvodz2c0gvup83fecsap0fffx5om3wdsyehc6xupu7lz7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        let editor_config = {
            path_absolute : "/",
            selector: 'textarea.tinymce_editor_init',
            relative_urls: false,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table directionality",
                "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                let cmsURL = editor_config.path_absolute + 'filemanager?editor=' + meta.fieldname;
                if (meta.filetype == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.openUrl({
                    url : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no",
                    onMessage: (api, message) => {
                        callback(message.content);
                    }
                });
            }
        };

        tinymce.init(editor_config);
    </script>
@endsection


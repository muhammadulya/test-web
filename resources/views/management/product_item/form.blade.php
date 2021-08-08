@extends('_template_management.master')

@php
    $pagetitle          = 'Produk Item'; 
    $nav_product_item   = 'active';
    $icon               = asset('/assets/images/no-image.png');

    if (isset($data)) {
        $pagetitle .= ' (Edit Data)';
        $link       = route('management.product_item.update');
    } else {
        $pagetitle .= ' (Tambah Data)';
        $link       = route('management.product_item.store');
        $data       = null;
    }
@endphp

@section('title', $pagetitle)
@section('css-upper')
    @include('_page_builder.css.select2')
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            @include('_template_management.message')

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="float-right">
                            <a href="{{ route('management.product_item.index') }}" class="btn btn-md btn-outline-dark btn-rounded">Back</a>
                        </div>
                        <h4 class="font-weight-bold text-dark pt-2">{{ $pagetitle }}</h4>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h5 class="header-title">Form Details</h5><hr>

                            <form action="{{ $link }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @if ($data) 
                                    @method('PATCH')
                                    <input type="hidden" class="form-control col-md-12 col-xs-12" name="product_id" value="{{ $data->id }}">
                                @endif

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="name">Nama produk *</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <input type="text" class="form-control col-md-12 col-xs-12" name="name" value="{{ isset($data->name) ? $data->name : old('name') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="category">Kategori *</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <select class="select2 form-control" id="category" name="category" required>
                                            <option selected disabled>- Pilih salah satu -</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if (isset($data) && $category->id == $data->category_id) selected @endif >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="description">Description</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <textarea name="description" id="description" class="form-control col-md-12 col-xs-12">{{ isset($data->description) ? $data->description : old('description') }}</textarea>
                                    </div>
                                </div>

                                @php
                                    if (isset($data)) {
                                        // CHECK IMAGES
                                        $images = json_decode($data->images);
                                    }
                                @endphp

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left">Gambar *</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <button type="button" class="btn btn-sm btn-success btn-block" onclick="add_image()">Tambah gambar</button>
                                    </div>
                                </div>

                                <div class="form-group row drop_images">
                                    @if (isset($data))
                                        @foreach ($images as $key_img =>$img)
                                            <label class="col-md-3 col-sm-3 col-xs-12 input-left count_image" for="images" id="label_image_{{ $key_img }}"></label>
                                            <div class="col-md-6 col-sm-6 col-xs-10" id="preview_image_{{ $key_img }}">
                                                <div class="text-center">
                                                    <img src="{{ env('API_URL') . '/uploads/images/product_item/' . $img }}" width="50" id="icon-preview">
                                                </div>
                                            </div>

                                            <div class="col-md-1 col-sm-1 col-xs-2 mb-2" id="div_button_images_{{ $key_img }}">
                                                <button type="button" class="btn btn-sm btn-danger" title="delete" onclick="delete_image({{ $key_img }})"><i class="mdi mdi-delete fw-800"></i></button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                @php
                                    if (isset($data)) {
                                        // COLORS
                                        $colors = json_decode($data->colors);
                                    }
                                @endphp
                                
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left">Warna *</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <button type="button" class="btn btn-sm btn-success btn-block" onclick="add_color()">Tambah warna</button>
                                    </div>
                                </div>

                                <div class="form-group row drop_color">
                                    @if (isset($data) && isset($colors[0]))
                                        @foreach ($colors as $key_color => $color)
                                            <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="colors" id="label_colors_{{ $key_color }}"></label>
                                            <div class="col-md-6 col-sm-6 col-xs-10 mb-2" id="div_input_colors_{{ $key_color }}">
                                                <input type="text" class="form-control col-md-12 col-xs-12 count_colors" name="colors[]" value="{{ isset($data->colors) ? $color : old('colors') }}" required>
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-2 mb-2" id="div_button_colors_{{ $key_color }}">
                                                <button type="button" class="btn btn-sm btn-danger" title="delete" onclick="delete_color({{ $key_color }})"><i class="mdi mdi-delete fw-800"></i></button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                @php
                                    if (isset($data)) {
                                        $size_and_price = json_decode($data->size_and_price);
                                    }
                                @endphp

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left">Ukuran & Harga *</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <button type="button" class="btn btn-sm btn-success btn-block" onclick="add_size_and_price()">Tambah ukuran & harga</button>
                                    </div>
                                </div>
                                
                                <div class="form-group row drop_size_and_price">
                                    @if (isset($data) && isset($size_and_price[0]))
                                        @foreach ($size_and_price as $key_detail => $detail)
                                            <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="sizes" id="label_sizes_{{ $key_detail }}"></label>
                                            <div class="col-md-2 col-sm-2 col-xs-12 mb-2" id="div_input_size_{{ $key_detail }}">
                                                <input type="text" class="form-control col-md-12 col-xs-12 count_size" id="sizes" name="sizes[]" value="{{ $detail->size }}" required>
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-10 mb-2" id="div_input_price_{{ $key_detail }}">
                                                <input type="text" class="form-control col-md-12 col-xs-12" id="prices" name="prices[]" value="{{ $detail->price }}" required>
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-2 mb-2" id="div_button_size_and_price_{{ $key_detail }}">
                                                <button type="button" class="btn btn-sm btn-danger" title="delete" onclick="delete_size_and_price({{ $key_detail }})"><i class="mdi mdi-delete fw-800"></i></button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="status">status</label>
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-success {{ isset($data->status) && $data->status == '1' ? 'active' : '' }}">
                                                <input type="radio" name="status" value="1" {{ isset($data->status) && $data->status == '1' ? 'checked' : '' }}>Active
                                            </label>
                                            <label class="btn btn-outline-dark {{ isset($data->status) && $data->status == '0' ? 'active' : '' }}">
                                                <input type="radio" name="status" value="0" {{ isset($data->status) && $data->status == '0' ? 'checked' : '' }}>Non-active
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <div class="col-md-3 col-sm-3 col-xs-12"></div>
                                    <div class="col-md-7 col-sm-7 col-xs-12 text-right">
                                        <button class="col-auto btn btn-success btn-block" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection

@section('css')
    <style>
        #icon-preview {
            max-width: 200px;
            max-height: 200px;
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('script')
    {{-- PARSLEY JS & VALIDATION --}}
    @include('_page_builder.js.form_validation')
    {{-- SELECT2 --}}
    @include('_page_builder.js.select2')

    <script>
        function read_url(input, target_id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#' + target_id).attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        // COLOR
        function delete_color(id) {
            $("#label_colors_" + id).remove();
            $("#div_input_colors_" + id).remove();
            $("#div_button_colors_" + id).remove();
        }

        // COLOR
        function add_color() {
            var count   = $('.count_colors').length;
            var html    = `
                <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="colors" id="label_colors_` + count + `"></label>
                <div class="col-md-6 col-sm-6 col-xs-10 mb-2" id="div_input_colors_` + count + `">
                    <input type="text" class="form-control col-md-12 col-xs-12 count_colors" name="colors[]" value="" required>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2 mb-2" id="div_button_colors_` + count + `">
                    <button type="button" class="btn btn-sm btn-danger" title="delete" onclick="delete_color(` + count + `)"><i class="mdi mdi-delete fw-800"></i></button>
                </div>
            `;

            $('.drop_color').append(html);
        }

        // SIZE AND PRICE
        function delete_size_and_price(id) {
            $("#label_sizes_" + id).remove();
            $("#div_input_size_" + id).remove();
            $("#div_input_price_" + id).remove();
            $("#div_button_size_and_price_" + id).remove();
        }

        // SIZE AND PRICE
        function add_size_and_price() {
            var count   = $('.count_size').length;
            var html    = `
                <label class="col-md-3 col-sm-3 col-xs-12 input-left" for="sizes" id="label_sizes_` + count + `"></label>
                <div class="col-md-2 col-sm-2 col-xs-12 mb-2" id="div_input_size_` + count + `">
                    <input type="text" class="form-control col-md-12 col-xs-12 count_size" id="sizes" name="sizes[]" value="" required>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-10 mb-2" id="div_input_price_` + count + `">
                    <input type="text" class="form-control col-md-12 col-xs-12" id="prices" name="prices[]" value="" required>
                </div>
                <div class="col-md-1 col-sm-1 col-xs-2 mb-2" id="div_button_size_and_price_` + count + `">
                    <button type="button" class="btn btn-sm btn-danger" title="delete" onclick="delete_size_and_price(` + count + `)"><i class="mdi mdi-delete fw-800"></i></button>
                </div>
            `;

            $('.drop_size_and_price').append(html);
        }

        // IMAGE
        function delete_image(id) {
            $("#label_image_" + id).remove();
            $("#preview_image_" + id).remove();
            $("#div_button_images_" + id).remove();
        }

        // IMAGE
        function add_image() {
            var count   = $('.count_image').length;
            var html    = `
                <label class="col-md-3 col-sm-3 col-xs-12 input-left count_image" for="images"></label>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="text-center">
                        <img src="{{ $icon }}" width="50" id="icon-preview">
                    </div>
                    <input type="file" class="form-control col-md-12 col-xs-12" name="images[]" accept=".jpg, .jpeg, .png">
                </div>
            `;

            $('.drop_images').append(html);
        }
    </script>
@endsection
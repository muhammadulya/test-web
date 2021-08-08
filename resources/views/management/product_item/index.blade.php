@extends('_template_management.master')

@php
    $nav_product_item   = 'active';
    $pagetitle          = 'Produk Item';
    $icon               = asset('/assets/images/no-image.png');
@endphp

@section('title', $pagetitle)
@section('css-upper')
    {{-- DATATABLES & RESPONSIVE DATATABLES--}}
    @include('_page_builder.css.datatables')
@endsection
@section('script-head') @endsection

@section('content')
<div class="page-content-wrapper">
    <div class="container-fluid">            
        @include('_template_management.message')

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <a href="{{ route('management.product_item.create') }}" class="btn btn-md btn-outline-dark btn-rounded">Tambah Data</a>
                    </div>
                    <h4 class="font-weight-bold text-dark pt-2">{{ $pagetitle }}</h4>
                </div>
            </div>

            <div class="col-sm-4 mb-2">
                <label for="category">Filter</label>
                <select class="select2 form-control" id="category" name="category" onchange="filter_data()">
                    <option selected disabled>- Pilih salah satu -</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-4 mb-2">
                <label for="keyword">Cari</label>
                <input type="text" name="keyword" id="keyword" class="form-control col-md-12 col-xs-12">
            </div>
            
            <div class="col-sm-1 mb-2">
                <label for="keyword">&nbsp;</label><br>
                <button type="button" class="btn btn-sm btn-info" onclick="search_data()">Cari</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable" class="table border-0 dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Gambar</th>
                                    <th>Warna</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($data[0]))
                                    @php
                                        $no      = 1;
                                        $perpage = 10;
                                        if (isset($_GET['page'])) {
                                            $no = ($_GET['page'] - 1) * $perpage + $no;
                                        }
                                    @endphp

                                    @foreach ($data as $item)
                                        @php
                                            // IMAGES
                                            $images = json_decode($item->images);

                                            // COLORS
                                            $color_collection   = '';
                                            $colors             = json_decode($item->colors);
                                            if (isset($colors[0])) {
                                                foreach ($colors as $key => $color) {
                                                    if ($key == 0) {
                                                        $color_collection .= $color;
                                                    } else {
                                                        $color_collection .= ', ' . $color;
                                                    }
                                                }
                                            }
                                        @endphp
                                        
                                        <tr class="text-center">
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td>{{ $item->description }}</td>
                                            @if (isset($images[0]))
                                                <td><img src="{{ env('API_URL') . '/uploads/images/product_item/' . $images[0] }}" width="50"></td>
                                            @else
                                                <td><img src="{{ $icon }}" width="50"></td>
                                            @endif
                                            <td>{{ $color_collection }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-success">
                                                        {{ ucwords('aktif') }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-danger">
                                                        {{ ucwords('non-aktif') }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('management.product_item.edit', $item->id) }}" class="btn btn-sm btn-success" title="edit"><i class="mdi mdi-pencil fw-800"></i></a>&nbsp;

                                                <form action="{{ route('management.product_item.delete') }}" method="POST" onsubmit="return confirm('Are you sure to delete this item : {{ $item->name }} ?')"  style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger" title="delete"><i class="mdi mdi-delete fw-800"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="8">
                                            <h2 class="text-center mt-4">DATA TIDAK TERSEDIA</h2>
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    {{-- REQUIRED, RESPONSIVE, AND INIT DATATABLES --}}
    @include('_page_builder.js.datatables')

    <script>
        function filter_data() {
            var category    = $('#category').val();
            var url         = "{{ route('management.product_item.index') }}" + "?category=" + category;
            window.location.replace(url);
        }

        function search_data() {
            var keyword = $('#keyword').val();
            var url     = "{{ route('management.product_item.index') }}" + "?keyword=" + keyword;
            window.location.replace(url);
        }
    </script>
@endsection
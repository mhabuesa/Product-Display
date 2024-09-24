@extends('layouts.backend')
@push('title')
    <title>Dashboard - Chishti Food Agro</title>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
        <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/slick-carousel/slick.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/slick-carousel/slick-theme.css">
    <link rel="stylesheet" id="css-main" href="{{ asset('assets') }}/css/oneui.min-5.9.css">
@endpush
@section('content')

<div class="bg-body-light mt-4">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Dashboard
                </h1>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="row">

        <div class="col-md-6">
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                All Brands
              </h3>
            </div>
            <div class="block-content">
              <div class="js-slider text-center" data-autoplay="true" data-dots="true" data-arrows="true" data-slides-to-show="3">
                @foreach ($brands as $brand)
                <div class="py-3">
                    <a class="text-dark" href=" {{ route('brands.products', $brand->id) }}">
                        <img class="img-avatar" src="{{ $brand->image }}" alt="">
                        <div class="mt-2 fw-semibold">{{ $brand->name }}</div>
                    </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="block block-rounded">
            <div class="block-header block-header-default">
              <h3 class="block-title">
                All Groups
              </h3>
            </div>
            <div class="block-content">
              <div class="js-slider text-center" data-autoplay="true" data-dots="true" data-arrows="true" data-slides-to-show="3">
                @foreach ($groups as $group)
                <div class="py-3">
                    <a class="text-dark" href=" {{ route('groups.products', $group->id) }}">
                        <img class="img-avatar" src="{{ $group->image }}" alt="">
                        <div class="mt-2 fw-semibold">{{ $group->name }}</div>
                    </a>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        All Products
                    </h3>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <table class="table table-bordered table-striped table-vcenter" id="productsTable">
                        <thead>
                            <tr>
                                <th class="text-center">SL</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Group</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                                <tr>
                                    <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                    <td class="fs-sm">
                                        <img src="{{asset($product->thumbnail_image)}}" width="50px" alt="">
                                    </td>
                                    <td class="fw-semibold fs-sm">{{ $product->name }}</td>
                                    <td class="fw-semibold fs-sm">{{ $product->brand->name }}</td>
                                    <td class="fw-semibold fs-sm">{{ $product->group->name }}</td>
                                    <td class="fw-semibold fs-sm">{{ $product->price}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

      </div>
</div>

@endsection

@push('script')
    <script src="{{ asset('assets') }}/js/plugins/datatables/dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-jszip/jszip.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-pdfmake/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons-pdfmake/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/js/plugins/datatables-buttons/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/be_tables_datatables.min.js"></script>

    <script>
        $('#productsTable').DataTable();
    </script>
    <script src="assets/js/plugins/slick-carousel/slick.min.js"></script>
    <script>One.helpersOnLoad(['jq-slick']);</script>
@endpush

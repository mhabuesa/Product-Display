@extends('layouts.frontend')
@section('content')
            <!-- ========== MAIN CONTENT ========== -->
            <main id="content" role="main">
                <!-- breadcrumb -->
                <div class="bg-gray-13 bg-md-transparent">
                    <div class="container">
                        <!-- breadcrumb -->
                        <div class="my-md-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('index')}}">Home</a></li>
                                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="{{route('show.group', $product->group->slug)}}">{{$product->group->name}}</a></li>
                                    <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">{{$product->name}}</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- End breadcrumb -->
                    </div>
                </div>
                <!-- End breadcrumb -->
                <div class="container">
                    <!-- Single Product Body -->
                    <div class="mb-xl-14 mb-6">
                        <div class="row">
                            <div class="col-md-5 mb-4 mb-md-0">
                                <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle" data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4" data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4" data-nav-for="#sliderSyncingThumb">

                                    @foreach ( $galleries as $gallery )
                                    <div class="js-slide">
                                        <img class="img-fluid w-100" src="{{asset($gallery->gallery_image)}}" alt="Image Description">
                                    </div>
                                    @endforeach

                                </div>

                                <div id="sliderSyncingThumb" class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off" data-infinite="true" data-slides-show="5" data-is-thumbs="true" data-nav-for="#sliderSyncingNav">

                                    @foreach ( $galleries as $gallery )
                                    <div class="js-slide" style="cursor: pointer;">
                                        <img class="img-fluid" src="{{asset($gallery->gallery_image)}}" alt="Image Description">
                                    </div>
                                    @endforeach

                                </div>
                            </div>
                            <div class="col-md-7 mb-md-6 mb-lg-0">
                                <div class="mb-2">
                                    <div class="border-bottom mb-2 pb-md-1 pb-3">
                                        <h2 class="font-size-25 text-lh-1dot2">{{$product->name}}</h2>
                                    </div>
                                    <div class="mb-2">
                                        <ul class="font-size-14 pl-3 ml-1 text-gray-110">
                                            <li><strong>Brand:</strong> {{$product->brand->name}}</li>
                                            <li><strong>Group:</strong> {{$product->group->name}}</li>
                                            <li><strong>Material:</strong> {{$product->material}}</li>
                                            <li><strong>Dose:</strong> {{$product->dose}}</li>
                                            <li><strong>Functionality:</strong> {{$product->functionality}}</li>
                                            <li><strong>Availability: <span class="text-green">{{$product->inventory->count() == 0 ? 'Out of Stock' : 'In Stock'}}</span></strong></li>
                                        </ul>
                                        <div>
                                            <strong class="text-gray-110 d-block">Size:</strong>
                                            @foreach ( $sizes as $size )
                                                <button type="button"
                                                    class="size_id btn_choose btn btn-sm btn-secondary text-white"
                                                    data-id="{{ $size->size->id }}"
                                                    data-product_id="{{ $product->id }}">
                                                    {{ $size->size->size }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="d-flex align-items-baseline" id="price">
                                            @php
                                                $inventory = $product->inventory->first();
                                            @endphp
                                            @if($inventory)
                                                <ins class="font-size-36 text-decoration-none">
                                                    &#2547; {{ $inventory->price }}
                                                </ins>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Product Body -->

                    <!-- Related products -->
                    <div class="mb-6">
                        <div class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                            <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
                        </div>
                        <ul class="row list-unstyled products-group no-gutters">

                            @foreach ($groupProducts as $product )
                            <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                                <div class="product-item__outer h-100">
                                    <div class="product-item__inner px-xl-4 p-3">
                                        <div class="product-item__body pb-xl-2">
                                            <div class="mb-2"><a href="product-categories-7-column-full-width.html" class="font-size-12 text-gray-5">{{$product->group->name}}</a></div>
                                            <h5 class="mb-1 product-item__title"><a href="{{route('product.show', $product->slug )}}" class="text-blue font-weight-bold">{{$product->name}}</a></h5>
                                            <div class="mb-2">
                                                <a href="{{route('product.show', $product->slug )}}" class="d-block text-center"><img class="img-fluid" src="{{asset($product->thumbnail_image)}}" alt="Image Description"></a>
                                            </div>
                                            <div class="flex-center-between mb-1">
                                                <div class="prodcut-price">
                                                    @php
                                                        $inventory = $product->inventory->first();
                                                    @endphp
                                                    @if($inventory)
                                                        <div class="text-gray-100">&#2547;{{$inventory->price}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- End Related products -->
                    <!-- Brand Carousel -->
                    <div class="mb-8">
                        <div class="py-2 border-top border-bottom">
                            <div class="js-slick-carousel u-slick my-1" data-slides-show="5" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y" data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9" data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right" data-responsive='[{
                                    "breakpoint": 992,
                                    "settings": {
                                        "slidesToShow": 2
                                    }
                                }, {
                                    "breakpoint": 768,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                }, {
                                    "breakpoint": 554,
                                    "settings": {
                                        "slidesToShow": 1
                                    }
                                }]'>

                                @foreach ($brands as $brand)
                                <div class="js-slide">
                                    <a href="{{route('show.brand', $brand->slug)}}" class="link-hover__brand">
                                        <img class="img-fluid m-auto max-height-50" src="{{asset($brand->image)}}" alt="Image Description">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- End Brand Carousel -->
                </div>
            </main>
            <!-- ========== END MAIN CONTENT ========== -->
@endsection

@push('script')

<script>
    $(document).on('click', '.size_id', function() {
        var size_id = $(this).data('id');
        var product_id = $(this).data('product_id'); // Fetch product_id from the clicked button

        if (size_id) {
            $.ajax({
                url: '/getPrice',  // Ensure this matches your route
                type: 'POST',
                data: {
                    'size_id': size_id,
                    'product_id': product_id,
                    '_token': $('meta[name="csrf-token"]').attr('content') // CSRF token
                },
                success: function(response) {
                    if (response.error) {
                        alert(response.error); // Handle error in response
                    } else {
                        $('#price').html('<ins class="font-size-36 text-decoration-none">&#2547; ' + response + '</ins>');
                    }
                },
                error: function() {
                    alert('Failed to fetch the price. Please try again.');
                }
            });
        } else {
            alert('Size ID not found');
        }
    });
</script>



<script>
    $(document).ready(function() {
        $('.btn_choose').on('click', function() {
            $('.btn_choose').removeClass('activate');
            $(this).addClass('activate');
        });
    });
</script>
@endpush

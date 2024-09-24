@extends('layouts.frontend')
@section('content')
    <!-- ========== MAIN CONTENT ========== -->
    <main id="content" role="main">
        <!-- Slider Section -->
        <div class="mb-5">
            <div class="bg-img-hero" style="background-image: url({{ asset('frontend') }}/img/1920X714/img1.jpg);">
                <div class="container">

                    <div
                        class="d-flex justify-content-between  flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0 pt-4">
                        <h4 class="section-title section-title__full mb-0 pb-2 font-size-20">Brands</h4>
                    </div>

                    <div class="mb-4 position-relative">
                        <div class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                            data-arrows-classes="u-slick__arrow u-slick__arrow--flat u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-inner u-slick__arrow-inner--left ml-lg-2 ml-xl-n3"
                            data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-inner u-slick__arrow-inner--right mr-lg-2 mr-xl-n3"
                            data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                            data-slides-show="7" data-slides-scroll="1"
                            data-responsive='[{
                          "breakpoint": 1400,
                          "settings": {
                            "slidesToShow": 5
                          }
                        }, {
                            "breakpoint": 1200,
                            "settings": {
                              "slidesToShow": 3
                            }
                        }, {
                          "breakpoint": 992,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 768,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }, {
                          "breakpoint": 554,
                          "settings": {
                            "slidesToShow": 2
                          }
                        }]'>

                            @foreach ($brands as $brand)
                                <div class="js-slide products-group">
                                    <div class="product-item mx-1 remove-divider">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner bg-white px-wd-3 p-2 p-md-3">
                                                <div class="product-item__body pb-xl-2">
                                                    <h5 class="mb-1 product-item__title"><a
                                                            href="{{ route('show.brand', $brand->slug) }}"
                                                            class="text-blue font-weight-bold">{{ $brand->name }}</a></h5>
                                                    <div class="mb-2">
                                                        <a href="{{ route('show.brand', $brand->slug) }}"
                                                            class="d-block text-center brand_image">
                                                            <img class="img-fluid" src="{{ asset($brand->image) }}" alt="Brand Image" title="Brand Image">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="product-item__footer">
                                                    <div class="border-top pt-2 text-center">
                                                        <a href="{{ route('show.brand', $brand->slug) }}"
                                                            class="text-gray-6 font-size-13"><i
                                                                class="fa fa-eye mr-1 font-size-15"></i> See All Products</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Section -->

        <div class="container">
            <!-- Categories Carousel -->
            <div
                class="d-flex justify-content-between  flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                <h4 class="section-title section-title__full mb-0 pb-2 font-size-20">Groups</h4>
            </div>
            <div class="mb-5">
                <div class="position-relative">
                    <div class="js-slick-carousel u-slick u-slick--gutters-0 position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                        data-arrows-classes="d-none d-xl-block u-slick__arrow-normal u-slick__arrow-centered--y rounded-circle text-black font-size-30 z-index-2"
                        data-arrow-left-classes="fa fa-angle-left u-slick__arrow-inner--left left-n16"
                        data-arrow-right-classes="fa fa-angle-right u-slick__arrow-inner--right right-n20"
                        data-pagi-classes="d-xl-none text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                        data-slides-show="10" data-slides-scroll="1"
                        data-responsive='[{
                      "breakpoint": 1400,
                      "settings": {
                        "slidesToShow": 8
                      }
                    }, {
                        "breakpoint": 1200,
                        "settings": {
                          "slidesToShow": 6
                        }
                    }, {
                      "breakpoint": 992,
                      "settings": {
                        "slidesToShow": 5
                      }
                    }, {
                      "breakpoint": 768,
                      "settings": {
                        "slidesToShow": 3
                      }
                    }, {
                      "breakpoint": 554,
                      "settings": {
                        "slidesToShow": 2
                      }
                    }]'>

                        @foreach ($groups as $group)
                            <div class="js-slide">
                                <a href="{{ route('show.group', $group->slug) }}"
                                    class="d-block text-center bg-on-hover width-122 mx-auto">
                                    <div class="bg pt-1 rounded-circle-top width-122 height-75 group_image">
                                        <img src="{{ asset($group->image) }}" alt="">
                                    </div>
                                    <div class="bg-white px-2 pt-2 width-122">
                                        <h6 class="font-weight-semi-bold font-size-14 text-gray-90 mb-0 text-lh-1dot2">{{ $group->name }}</h6>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Categories Carousel -->


        </div>


        <div class="container">
            <!-- Laptops & Computers -->
            <div class="mb-6">
                <!-- Nav nav-pills -->
                <div class="position-relative text-center z-index-2">
                    <div
                        class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                        <h3 class="section-title mb-0 pb-2 font-size-22">All Products</h3>
                    </div>
                </div>
                <!-- End Nav Pills -->
                <div class="row">
                    <div class="col-md pl-md-0">
                        <!-- Tab Content -->
                        <div class="tab-content" id="Qpills-tabContent">
                            <div class="tab-pane fade pt-2 show active" id="Qpills-one-example1" role="tabpanel"
                                aria-labelledby="Qpills-one-example1-tab">
                                <ul class="row list-unstyled products-group no-gutters mb-0">

                                    @foreach ($products as $product)
                                    <li class="col-6 col-md-4 col-wd-2 product-item border">
                                        <div class="product-item__outer h-100">
                                            <div class="product-item__inner bg-white p-3">
                                                <div class="product-item__body pb-xl-2">
                                                    <div class="mb-2 justify-content-between d-flex">
                                                        <a href="{{route('show.brand', $product->brand->slug)}}" class="font-size-12 text-gray-5">{{$product->brand->name}}</a>
                                                        <a href="{{route('show.group', $product->group->slug)}}" class="font-size-12 text-gray-5">{{$product->group->name}}</a>
                                                    </div>
                                                    <h5 class="mb-1 product-item__title"><a
                                                            href="{{route('product.show', $product->slug)}}"
                                                            class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
                                                    <div class="mb-2">
                                                        <a href="{{route('product.show', $product->slug)}}"
                                                            class="d-block text-center"><img class="img-fluid"
                                                                src="{{ asset($product->thumbnail_image) }}"
                                                                alt="Image Description"></a>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Laptops & Computers -->
        </div>


    </main>
    <!-- ========== END MAIN CONTENT ========== -->
@endsection

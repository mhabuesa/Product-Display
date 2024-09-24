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
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Search</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="row mb-8">
                <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                    <div class="mb-8">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Latest Products</h3>
                        </div>
                        <ul class="list-unstyled">

                            @foreach ($latests as $product )

                            <li class="mb-4">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{route('product.show', $product->slug)}}" class="d-block width-75">
                                            <img class="img-fluid" src="{{asset($product->thumbnail_image)}}" alt="Image Description">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <h3 class="text-lh-1dot2 font-size-14 mb-0"><a href="{{route('product.show', $product->slug)}}">{{$product->name}}</a></h3>
                                        <div class="font-weight-bold">

                                            @php
                                                $inventory = $product->inventory->first();
                                            @endphp
                                            @if($inventory)
                                                <ins class="font-size-15 text-red text-decoration-none d-block">&#2547; {{ $inventory->price }}</ins>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </li>

                            @endforeach

                        </ul>
                    </div>
                </div>

                <div class="col-xl-9 col-wd-9gdot5">
                    <!-- Shop-control-bar Title -->
                    <div class="d-block d-md-flex flex-center-between mb-3">
                        <h3 class="font-size-25 mb-2 mb-md-0">Search</h3>
                    </div>
                    <!-- End shop-control-bar Title -->

                    <!-- Shop Body -->
                    <!-- Tab Content -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel" aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                            <ul class="row list-unstyled products-group no-gutters">

                                @forelse ($products as $product )
                                <li class="col-6 col-md-3 col-wd-2gdot4 product-item remove-divider-md-lg remove-divider-xl border">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2 justify-content-between d-flex">
                                                    <a href="{{route('show.brand' , $product->brand->slug)}}" class="font-size-12 text-gray-5">{{$product->brand->name}}</a>
                                                    <a href="{{route('show.group' , $product->group->slug)}}" class="font-size-12 text-gray-5">{{$product->group->name}}</a>
                                                </div>
                                                <h5 class="mb-1 product-item__title"><a href="{{route('product.show' , $product->slug)}}" class="text-blue font-weight-bold">{{$product->name}}</a></h5>
                                                <div class="mb-2">
                                                    <a href="{{route('product.show' , $product->slug)}}" class="d-block text-center"><img class="img-fluid" src="{{asset($product->thumbnail_image)}}" alt="Image Description"></a>
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
                                </li>

                                @empty

                                    <li class="mb-4"></li>
                                        <div class="row">
                                            <div class="col-auto">
                                                <h2 class="text-lh-1dot2 font-size-20 mb-0">No Products Found</h2>
                                            </div>

                                        </div>
                                    </li>
                                @endforelse

                            </ul>
                        </div>

                    </div>
                    <!-- End Tab Content -->
                    <!-- End Shop Body -->
                </div>
            </div>
        </div>
    </main>
    <!-- ========== END MAIN CONTENT ========== -->

@endsection

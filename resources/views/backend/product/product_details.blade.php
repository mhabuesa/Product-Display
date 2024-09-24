@extends('layouts.backend')
@push('title')
    <title>Product Details - Chishti Food Agro</title>
@endpush
@section('content')
    <div class="bg-body-light mt-4">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        Product Details
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Product Details
                        </h3>
                    </div>
                    <div class="block-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="block-content">
                                    <div class="row">
                                        @foreach ($galleries as $gallery)
                                            <img class="col-lg-5" src="{{ asset($gallery->gallery_image) }}" width="50" alt="" >
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mt-3">
                                    <h3>Product Name: {{ $product->name }}</h3>
                                    <p>Description: {{ $product->description }}</p>
                                    <p>Price: {{ $product->price }}</p>
                                    <p>Brand: {{ $product->brand->name }}</p>
                                    <p>Group: {{ $product->group->name }}</p>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

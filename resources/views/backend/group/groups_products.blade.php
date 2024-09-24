@extends('layouts.backend')
@push('title')
    <title>{{ $group->name }} Brand Products - Chishti Food Agro</title>
@endpush
@section('content')
    <div class="bg-body-light mt-4">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        {{ $group->name }}
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Products</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            @foreach ($products as $product )
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <img class="mx-auto d-block" src="{{asset($product->thumbnail_image)}}" alt="" width="100" >
                        <h3 class="text-center mb-0"><a href="{{ route('products.details', $product->id) }}">{{ $product->name }}</a></h3>
                        <span class="text-center mx-auto d-block mt-1">Price: {{ $product->price }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

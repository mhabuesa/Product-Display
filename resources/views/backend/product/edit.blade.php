@extends('layouts.backend')
@push('title')
    <title>Edit Product - Chishti Food Agro</title>
@endpush
@push('style')
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-bs5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/js/plugins/datatables-buttons-bs5/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/js/plugins/datatables-responsive-bs5/css/responsive.bootstrap5.min.css">
@endpush

@section('content')
    <div class="bg-body-light mt-4">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
                <div class="flex-grow-1">
                    <h1 class="h3 fw-bold mb-1">
                        Products
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Products</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            Edit
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Edit Product</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter name" value="{{ $product->name }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="brand" class="form-label">Brand</label>
                                        <select name="brand_id" id="brand" class="form-select">
                                            <option value="">Select brand</option>
                                            @foreach ($brands as $brand)
                                                <option {{ $brand->id == $product->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="group" class="form-label">Group</label>
                                        <select name="group_id" id="group" class="form-select">
                                            <option value="">Select group</option>
                                            @foreach ($groups as $group)
                                                <option {{ $group->id == $product->group_id ? 'selected' : '' }} value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('group_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="material" class="form-label">Material</label>
                                        <input type="text" name="material" id="material" class="form-control" placeholder="Enter material" value="{{ $product->material }}">
                                        @error('material')
                                            <span class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <label for="dose" class="form-label">Dose</label>
                                        <input type="text" name="dose" id="dose" class="form-control" placeholder="Enter dose" value="{{ $product->dose }}">
                                        @error('dose')
                                            <span class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                     <div class="mb-3">
                                        <label for="functionality" class="form-label">Functionality</label>
                                        <input type="text" name="functionality" id="functionality" class="form-control" placeholder="Enter Functionality" value="{{ $product->functionality }}">
                                        @error('functionality')
                                            <span class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label for="thumb_image" class="form-label">Thumbnail Image</label>
                                <div class="">
                                    <label class="upload__btn bg-dark">
                                        <p class="m-0">Upload image</p>
                                        <input type="file" class="upload__inputfile" name="thumbnail_image"
                                            id="thumb_image"
                                            onchange="document.getElementById('thumbnail_image').src = window.URL.createObjectURL(this.files[0])">
                                    </label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <img src="{{ asset($product->thumbnail_image) }}" id="thumbnail_image" alt="" width="150">
                            </div>

                            <div class="mb-3">
                                <label for="thumb_image" class="form-label">Current Gallery Image</label>
                                <div class="row">
                                    @foreach ($galleries as $gallery)
                                        <div class="gal_image col-lg-3 col-md-4 col-xs-12 text-center">
                                            <img src="{{ asset($gallery->gallery_image) }}" alt="" width="200">
                                            <p class="mt-2">
                                                <a href="{{ route('products.gallery.remove', $gallery->id) }}" class="btn btn-danger btn-sm">Remove</a>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="prev_image" class="form-label">Gallery Image</label>
                                <div class="upload__box">
                                    <div class="upload__btn-box">
                                        <label class="upload__btn bg-primary" for="prev_image">
                                            <p class="m-0">Upload images</p>
                                            <input type="file" multiple="" name="gallery_image[]" id="prev_image"
                                                data-max_length="20" class="upload__inputfile">
                                        </label>
                                    </div>
                                    @error('gallery_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="upload__img-wrap"></div>
                                </div>
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <label for="status" class="form-label">Active</label>
                                <input type="checkbox" {{ $product->status ? 'checked' : '' }} name="status" id="status" class="form-check-input">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary w-50 m-auto" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <!-- Image Upload JS -->
    <script>
        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
    </script>
@endpush

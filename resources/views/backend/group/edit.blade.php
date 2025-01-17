@extends('layouts.backend')
@push('title')
    <title>Group Edit - Chishti Food Agro</title>
@endpush
@section('content')
<div class="bg-body-light mt-4">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
            <div class="flex-grow-1">
                <h1 class="h3 fw-bold mb-1">
                    Group edit
                </h1>
            </div>
            <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">
                        <a class="link-fx" href="javascript:void(0)">Group</a>
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
        <div class="col-lg-4 m-auto">
            <div class="block block-rounded">
                <div class="block-header block-header-default d-flex justify-content-between">
                    <h3 class="block-title">Edit Group</h3>
                    <a href="{{ route('groups.index') }}" class="btn btn-dark btn-sm" type="submit">Back to list</a>
                </div>
                <div class="block-content block-content-full overflow-x-auto">
                    <form action="{{ route('groups.update' , $group->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" value="{{ $group->name }}">
                            @error('name')
                                <span class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Enter description">{{$group->description}}</textarea>
                            @error('name')
                                <span class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" name="image" id="image"
                                onchange="document.getElementById('image_preview').src = window.URL.createObjectURL(this.files[0])">
                        </div>

                        <div class="mb-3">
                            @if ($group->image)
                                <img src="{{ asset($group->image) }}" id="image_preview" alt="" width="100">
                                @else
                                <img src="https://placehold.co/100" id="image_preview" alt="" width="100">
                            @endif
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

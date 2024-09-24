@extends('layouts.backend')
@push('title')
    <title>Brand - Chishti Food Agro</title>
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
                        Brands
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Brands</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">
                            List
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add Brand</h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Enter name">
                                @error('name')
                                    <span class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Enter description"></textarea>
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
                                <img src="https://placehold.co/100" id="image_preview" alt="" width="100">
                            </div>
                            <div class="mb-3 form-check form-switch">
                                <label for="status" class="form-label">Active</label>
                                <input type="checkbox" name="status" id="status" class="form-check-input">
                            </div>
                            <div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            brand List
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="brandsTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $brand->name }}</td>
                                        <td class="fw-semibold fs-sm">{{ $brand->description }}</td>
                                        <td class="fs-sm">
                                            <img src="{{asset($brand->image)}}" width="50px" alt="">
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                    {{ $brand->status == 1 ? 'checked' : '' }} name="status"
                                                    data-id="{{ $brand->id }}" data-status="{{ $brand->status }}"
                                                    onchange="updateBrandStatus(this)">
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a class="border-0 btn btn-sm" href="{{route('brands.edit', $brand->id)}}"><i
                                                    class="fa fa-pencil text-secondary fa-xl"></i></a>
                                                    <button class="border-0 btn btn-sm " href="#" onclick="deleteBrand(this)"
                                                    data-id="{{ $brand->id }}"><i
                                                        class="far fa-trash-can text-danger fa-xl"></i></button>
                                        </td>
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
        $('#brandsTable').DataTable();
        function deleteBrand(button) {
    const id = $(button).data('id');
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {

            let url = "{{ route('brands.destroy', ':id') }}";
            url = url.replace(':id', id);
            let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: url,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    if (data.success) {
                        showToast(data.message, "success");
                        $(button).closest('tr').remove();
                    } else {
                        showToast(data.message, "error");
                    }
                },
                error: function(xhr) {
                    showToast("An error occurred: " + xhr.responseJSON.message, "error");
                }
            });

        }
    });
}


        function updateBrandStatus(element) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, update it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    updateBrandStatusAjax(element);
                } else {
                    element.checked = !element.checked;
                }
            })
        }

        function updateBrandStatusAjax(element) {
            const id = $(element).data('id');
            let url = "{{ route('brands.status.update', ':id') }}";
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    if (data.success) {
                        showToast(data.message, "success");
                    } else {
                        showToast(data.message, "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.log('xhr.responseText, status, error', xhr.responseText, status, error);
                    showToast('Something went wrong', "error");
                }
            });
        }
    </script>
@endpush
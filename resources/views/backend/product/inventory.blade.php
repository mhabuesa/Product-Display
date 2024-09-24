@extends('layouts.backend')
@push('title')
    <title>Product Inventory - Chishti Food Agro</title>
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
                        Inventory - <span class="text-success">{{ $product->name }}</span
                    </h1>
                </div>
                <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">
                            <a class="link-fx" href="javascript:void(0)">Inventory</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Product Inventory
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <table class="table table-bordered table-striped table-vcenter" id="inventoryTable">
                            <thead>
                                <tr>
                                    <th class="text-center">SL</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                    <th>Quentity</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($inventories as $key => $inventory)
                                    <tr>
                                        <td class="text-center fs-sm">{{ $key + 1 }}</td>
                                        <td class="fw-semibold fs-sm">{{ $inventory->size->size }}</td>
                                        <td class="fw-semibold fs-sm">{{ $inventory->price}}</td>
                                        <td class="fw-semibold fs-sm">{{ $inventory->quantity }}</td>

                                        <td class="text-center">
                                            <button class="border-0 btn btn-sm " onclick="deleteInventory(this)"data-id="{{ $inventory->id }}">
                                                <i class="far fa-trash-can text-danger fa-xl"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-4">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">
                            Product Inventory
                        </h3>
                    </div>
                    <div class="block-content block-content-full overflow-x-auto">
                        <form action="{{ route('products.inventory.store' , $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="Functionality" class="form-label">Add Variation</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th class="th_10">
                                                <div class="text">Action</div>
                                            </th>
                                        </tr>
                                    </thead>



                                 <tbody>
                                  <tr id="row">
                                      <td style="width: 100px">
                                          <select class="form-control" name="size_id[]" id="">
                                              <option>Select Size</option>

                                          @foreach ($sizes as $size)
                                              <option value="{{$size->id}}">{{$size->size}}</option>
                                          @endforeach
                                          </select>
                                      </td>
                                      <td> <input type="number" class="form-control" name="price[]"></td>
                                      <td> <input type="number" class="form-control" name="quantity[]"></td>
                                      <td>
                                          <button class="btn btn-danger del"
                                              id="DeleteRow"
                                              type="button">
                                              <i class="fa fa-trash"></i>
                                          </button>
                                      </td>
                                  </tr>
                                 </tbody>

                                      <tfoot id="newinput"></tfoot>

                                </table>
                                <div class="plus d-flex justify-content-end mt-2">
                                  <button id="rowAdder" type="button" class="btn btn-dark">
                                      <span class="fa fa-plus ">
                                      </span>
                                  </button>
                                </div>

                              </div>

                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary w-50" type="submit">Submit</button>
                            </div>
                        </form>
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
        $('#inventoryTable').DataTable();
        function deleteInventory(button) {
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

                let url = "{{ route('products.inventory.delete', ':id') }}";
                url = url.replace(':id', id);
                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: url,
                    type: 'get',
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


    </script>


    <script type="text/javascript">
        $("#rowAdder").click(function () {
            newRowAdd =
                '<tr id="row"><td><select class="form-control" name="size_id[]" id="">'+
                            '<option>Select Size</option>'+
                            '@foreach ($sizes as $size)'+
                            '<option value="{{$size->id}}">{{$size->size}}</option>'+
                            '@endforeach'+
                            '</select></td>'+
                            '<td><input type="number" class="form-control" name="price[]"></td>'+
                            '<td><input type="number" class="form-control" name="quantity[]"></td>'+
                            '<td><button class="btn btn-danger del"  id="DeleteRow" type="button">'+
                            '<i class="fa fa-trash"></i></button></td> </tr>';

            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function () {
            $(this).parents("#row").remove();
        })
    </script>


@endpush

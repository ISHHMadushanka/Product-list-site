@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Our Product List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" name="name" type="text"
                                    placeholder="Enter the Product name" required>
                            </div>
                            <div class="form-group mt-5">
                                <input class="form-control" name="price" type="text"
                                    placeholder="Enter the Product Price" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-12 mt-5 mb-5">
                <div>
                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $key => $item)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    @if ($item->done == 0)
                                     <span class="badge bg-warning">Inactive</span>
                                    @else
                                    <span class="badge bg-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('product.delete', $item->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    <a href="{{ route('product.done', $item->id) }}" class="btn btn-success"><i class="fa-solid fa-circle-check"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-info"><i class="fas fa-pencil" onclick="itemEditModal({{ $item->id }})"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="itemEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="itemEditLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="itemEditLabel">Main Item Edit</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="itemEditContent">

            </div>
          </div>
        </div>
      </div>

@endsection

@push('css')
    <style>
        .page-title {
            padding-top: 5vh;
            font-size: 3rem;
            color: #81867e;
        }
    </style>
@endpush

@push('js')
<script>
    function itemEditModal(item_id){
        var data = {
            item_id: item_id,
        };
        $.ajax({
            url: "{{ route('product.edit') }}",
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            dataType: '',
            data: data,
            success: function (response) {
                $('#itemEdit').modal('show');
                $('#itemEditContent').html(response);
            }
        });
    }
</script>
@endpush

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="page-title">Our Banner List</h1>
            </div>
            <div class="col-lg-12 mt-5">
                <form role="form" action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <input class="form-control" name="title" type="text"
                                    placeholder="Enter the Banner Title" required>
                            </div>
                            {{-- <div class="form-group mt-5">
                                <input class="form-control" name="price" type="text"
                                    placeholder="Enter the Product Price">
                            </div> --}}
                            <div class="form-group mt-5">
                                <input class="form-control dropify" name="images" type="file"
                                    accept="image/jpeg, image/png, image/jpg" required>
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
                                {{-- <th scope="col">Price</th> --}}
                                <th scope="col">Image</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $key => $banner)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $banner->title }}</td>
                                {{-- <td>{{ $banner->price }}</td> --}}
                                <td><img src="{{ config('images.access_path') }}/{{ $banner->images->name ?? 'None' }}" alt="img" width="100px" height="80px"></td>
                                <td>
                                    @if ($banner->status == 0)
                                     <span class="badge bg-warning">Inactive</span>
                                    @else
                                    <span class="badge bg-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('banner.delete', $banner->id) }}" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                    @if ($banner->status == 0)
                                    <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-success"><i class="fa-solid fa-circle-check"></i>Inactive</a>
                                    @else
                                    <a href="{{ route('banner.status', $banner->id) }}" class="btn btn-warning"><i class="fa-solid fa-circle-check"></i>Active</a>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

        .dropify-message p{
            font-size: 2rem;
            color: rgb(119, 59, 59);
        }

        .dropify-render img{
            margin: auto;
        }

    </style>
@endpush


@push('js')
<script>
    $('.dropify').dropify();
</script>
@endpush

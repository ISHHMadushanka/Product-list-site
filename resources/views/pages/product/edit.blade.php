<form action="{{ route('product.update', $item->id) }}" method="post" enctype="multipart/form">
    @csrf
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                <input class="form-control" name="name" value="{{ $item->name }}" placeholder="type="text"
                    placeholder="Enter the Product name" required>
            </div>
            <div class="form-group mt-5">
                <input class="form-control" name="price" type="text"
                    placeholder="Enter the Product Price" required>
            </div>
        </div>
        <div class="col-lg-4">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>

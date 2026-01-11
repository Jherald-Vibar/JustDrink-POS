@extends('layouts.admin')

@section('title', 'Create Product')
@section('content-header', 'Create Product')

@section('content')

<div class="card">
    <div class="card-body" style="background-color:#729F9D ">
        <!-- Log on to codeastro.com for more projects -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group" >
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" style="background-color:#F0F0F0 "
                    placeholder="Enter product name" value="{{ old('name') }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" class="form-control @error('category') is-invalid @enderror" id="category" style="background-color:#F0F0F0">
                    <option value="">Select category</option>
                    <option value="Milktea" {{ old('category') == 'milktea' ? 'selected' : '' }}>Milktea</option>
                    <option value="Iced Coffee" {{ old('category') == 'iced_coffee' ? 'selected' : '' }}>Iced Coffee</option>
                    <option value="Hot Coffee" {{ old('category') == 'hot_coffee' ? 'selected' : '' }}>Hot Coffee</option>
                    <option value="Smoothie" {{ old('category') == 'smoothie' ? 'selected' : '' }}>Smoothie</option>
                    <option value="Tea" {{ old('category') == 'tea' ? 'selected' : '' }}>Tea</option>
                </select>
                @error('category')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="barcode">Product Slug</label>
                <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror"
                    id="barcode" placeholder=" (slug)" value="{{ old('barcode') }}">
                @error('barcode')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Product Image</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Choose File</label>
                </div>
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                    placeholder="Enter price" value="{{ old('price') }}">
                @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
                    id="quantity" placeholder="Quantity" value="{{ old('quantity', 100) }}">
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                    <option value="1" {{ old('status') === 1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{ old('status') === 0 ? 'selected' : ''}}>Inactive</option>
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <button class="btn btn-success btn-block btn-lg" type="submit">Submit</button>
        </form><!-- Log on to codeastro.com for more projects -->
    </div>
</div>

@endsection

@section('js')
<script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<script>
    $(document).ready(function () {
        bsCustomFileInput.init();

        // Listen for changes to the name field and update the slug field
        $('#name').on('input', function () {
            var name = $(this).val();
            var slug = name.toLowerCase()
                          .replace(/[^\w ]+/g, '')  // Remove special characters
                          .replace(/ +/g, '-');     // Replace spaces with hyphens
            $('#barcode').val(slug);     // Update the slug field (barcode)
        });
    });
</script>
@endsection

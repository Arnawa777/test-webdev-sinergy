{{-- ambil dari halaman layouts/main --}}
@extends('layouts.main')


@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom"
        style="padding: 30px 0px 20px 0px">
        <h2>Ubah Product</h2>
    </div>

    <div class="col-lg-8">
        {{-- otomatis ke update karena menggunakan resource --}}
        <form method="post" action="/products/{{ $product->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            {{-- Title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $product->title) }}" autofocus>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Price --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}" step="1">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Discount Percentage --}}
            <div class="mb-3">
                <label for="discountPercentage" class="form-label">Discount Percentage</label>
                <input type="number" class="form-control @error('discountPercentage') is-invalid @enderror"
                    id="discountPercentage" name="discountPercentage"
                    value="{{ old('discountPercentage', $product->discountPercentage) }}" step="0.01">
                @error('discountPercentage')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Rating --}}
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <input type="number" class="form-control @error('rating') is-invalid @enderror" id="rating"
                    name="rating" value="{{ old('rating', $product->rating) }}" step="0.01">
                @error('rating')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Stock --}}
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock"
                    name="stock" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Brand --}}
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand"
                    name="brand" value="{{ old('brand', $product->brand) }}">
                @error('brand')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <input type="text" class="form-control @error('category') is-invalid @enderror" id="category"
                    name="category" value="{{ old('category', $product->category) }}">
                @error('category')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Thumbnail --}}
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="text" class="form-control @error('thumbnail') is-invalid @enderror" id="thumbnail"
                    name="thumbnail" value="{{ old('thumbnail', $product->thumbnail) }}">
                @error('thumbnail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Images --}}
            <div class="mb-3">
                <label for="images" class="form-label">Images</label>
                <textarea class="form-control @error('images') is-invalid @enderror" name="images">{{ old('images', $product->images) }}</textarea>
                @error('images')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror





                {{-- Button Action --}}
                <div class="footer-submit-right">
                    <button name="action" value="cancel" id="btn-cancel">Batal</button>
                    <button type="submit" name="action" value="update" id="btn-reply">Ubah</button>
                </div>

        </form>
    </div>
@endsection

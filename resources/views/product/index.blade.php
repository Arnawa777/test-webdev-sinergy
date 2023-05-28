{{-- ambil dari halaman layouts/main --}}
@extends('layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 border-bottom"
        style="padding: 30px 0px 20px 0px">
        <h2>List Product</h2>
    </div>
    <div class="col-lg-10">
        <div style="float: right">
            <form action="products">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}" id="deleteInput">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>

    <div class="table col-lg-10">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('fail'))
            <div class="alert alert-danger" role="alert">
                {{ session('fail') }}
            </div>
        @endif

        @if ($products->count())
            <table class="table table-sm text-nowrap">
                <thead>
                    <tr>
                        <th scope="col" style="width: 3%;">#</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Percentage</th>
                        <th scope="col">Rating</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Category</th>
                        <th scope="col" style="width:  10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            {{-- Loop number with pagination --}}
                            <td>{{ $products->firstItem() + $loop->index }}</td>
                            {{-- <td>
                                @foreach (explode(',', $product->images) as $image)
                                    <img class="index-img" src="{{ image }}" alt="product-img">
                                @endforeach

                            </td> --}}
                            <td>
                                @if ($product->thumbnail)
                                    <img class="index-img" src="{{ $product->thumbnail }}" alt="product-img">
                                @else
                                    <img class="index-img-empty"
                                        src="https://us.123rf.com/450wm/pavelstasevich/pavelstasevich1811/pavelstasevich181101027/112815900-no-image-available-icon-flat-vector.jpg?ver=6"
                                        alt="no-img">
                                @endif
                            </td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discountPercentage }}</td>
                            <td>{{ $product->rating }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->category }}</td>
                            <td class="actionButton" style="flex">
                                <form action="/products/{{ $product->id }}">
                                    <button class="badge bg-info border-0"><i class="fa-solid fa-eye"></i></button>
                                </form>

                                <a href="products/{{ $product->id }}/edit" class="badge bg-warning"><i
                                        class="fa-solid fa-pen-to-square"></i></a>

                            </td>
                        </tr>
                        {{-- <tr class="spacer"><td></td></tr> --}}
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center fs-4">404</p>
            <p class="text-center fs-4">Data tidak ditemukan</p>
        @endif
        <div class="d-flex justify-content-start">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT POST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="post_id">

                    <div class="form-group">
                        <label for="name" class="control-label">Title</label>
                        <input type="text" class="form-control" id="title-edit">
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-title-edit"></div>
                    </div>


                    <div class="form-group">
                        <label class="control-label">Content</label>
                        <textarea class="form-control" id="content-edit" rows="4"></textarea>
                        <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-content-edit"></div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                    <button type="button" class="btn btn-primary" id="update">UPDATE</button>
                </div>
            </div>
        </div>
    </div>


@endsection

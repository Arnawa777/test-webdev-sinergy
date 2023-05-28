{{-- ambil dari halaman layouts/main --}}
@extends('layouts.main')


@section('container')
    <link rel="stylesheet" href="{{ URL::to('/') }}/css/events.css">

    <div class="col-lg-9 my-3" id="land-event">
        <div class="row" style="padding: 0px 10px">
            <div class="col-md-12" id="title">
                <h3 class="mb-3">{{ $product->title }}</h3>
            </div>

            {{-- Button --}}
            <div class="col-sm-12" style="padding-bottom: 10px">
                <a href="/products" class="btn btn-info border-0">
                    <span data-feather="arrow-left"></span> Back to All Products
                </a>
                <a href="/products/{{ $product->id }}/edit" class="btn btn-warning border-0">
                    <span data-feather="edit"></span> Edit
                </a>
            </div>

            {{-- Left Side --}}
            <div class="col-sm-3">
                <div class="row" id="main-row">
                    <div>
                        @if ($product->thumbnail)
                            <img class="main-cover" src="{{ $product->thumbnail }}">
                        @else
                            <img class="main-cover" src="" alt="no-img">
                        @endif
                    </div>
                    <div>
                        <div class="border-bottom" style="margin-bottom:10px;">
                            <h5>Product Detail</h5>
                        </div>

                        <p>Price: {{ $product->price }}</p>
                        <p>Discount Percentage: {{ $product->discountPercentage }}</p>
                        <p>Rating: {{ $product->rating }}</p>
                        <p>Stock: {{ $product->stock }}</p>
                        <p>Brand: {{ $product->brand }}</p>
                        <p>Category: {{ $product->category }}</p>
                    </div>


                    <!--// close of Data Chara div //-->

                    <div>
                        {{-- Event --}}
                        <div class="row" id="main-row">

                        </div>
                        <!--// close of Evennt div //-->
                    </div>
                </div>
            </div>
            <!--// close of Left Side div //-->

            {{-- Main Side --}}
            <div class="col-sm-9">

                {{-- Description --}}
                <div class="row" id="main-row">
                    <div class="col-12">
                        <div class="border-bottom" style="margin-bottom:10px;">
                            <h5>Deskripsi</h5>
                        </div>
                        @if (is_null($product->description))
                            <p> Karakter ini belum memiliki deskripsi... </p>
                        @else
                            <article>
                                {!! $product->description !!}
                            </article>
                        @endif
                    </div>
                </div>

                {{-- Image --}}
                <div class="row" id="main-row">
                    <div class="col-12">
                        <div class="border-bottom" style="margin-bottom:10px;">
                            <h5 style="float: left;">Images</h5>
                            <div style="clear: both;"></div>
                        </div>
                    </div>

                    <div class="row" style="margin-left: 10px;">
                        @foreach (explode(',', $product->images) as $image)
                            <img class="show-multi-img" src="{{ $image }}" alt="product-img">
                        @endforeach
                    </div>
                    <!--// close of Data Chara div //-->
                </div>
                <!--// close of Images div //-->


            </div>
        </div>
    @endsection

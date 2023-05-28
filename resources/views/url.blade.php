{{-- ambil dari halaman layouts/main --}}
@extends('layouts.main')

{{-- isi dari layouts/main --}}
@section('container')
    <div class="col-lg-12">
        <div style="width:75%; margin:auto;">
            <div>
                <div class="col-lg-12">
                    <h1 class="mb-3 text-center" style="padding-top: 20px">{{ $title }}</h1>
                    <form action="/fetch" method="POST">
                        @csrf
                        <div class="input-group mb-3" style="justify-content: center">
                            <input type="text" class="form-control" placeholder="Url" name="fetch"
                                value="{{ old('fetch') }}" id="fetch">
                            <button class="btn btn-primary" type="submit">Fetch</button>
                        </div>
                    </form>
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('failed') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

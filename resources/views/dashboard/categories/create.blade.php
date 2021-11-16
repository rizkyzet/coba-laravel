@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Category</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="col-lg-6">
        <form action="/dashboard/categories" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="name">Nama Category</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name') }}" onchange="generateSlug('name','slug','/dashboard/categories/checkSlug')">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="slug">Slug</label>
                <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror"
                    value="{{ old('slug') }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-primary" type="submit">Store</button>
        </form>
    </div>



    @include('dashboard.layouts.script')
@endsection

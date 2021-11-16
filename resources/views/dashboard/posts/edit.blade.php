@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit post</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/posts/{{ $post->slug }}" class="mb-5"
            enctype="multipart/form-data">
            @method('put')
            @csrf
            <input type="hidden" name="oldImage" value="{{ $post->image }}">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $post->title) }}" @error('title') autofocus @enderror>
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    value="{{ old('slug', $post->slug) }}" @error('slug') autofocus @enderror>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id"
                    @error('category_id') autofocus @enderror>
                    @foreach ($categories as $category)
                        {{-- @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif --}}
                        <option value="{{ $category->id }}"
                            {{ old('category_id' . $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Post image</label>
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}"
                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"
                    onchange="previewImage(this)">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" @error('body')
                    autofocus @enderror>
                <trix-editor input="body" class="form-control @error('body') is-invalid @enderror"></trix-editor>
                @error('body')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Edit Post</button>
        </form>
    </div>


    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');
        const token = document.querySelector('input[name="_token"]');

        function loading() {
            const elLoading = document.createElement('small');
            elLoading.innerHTML = 'loading...';
            // slug.parentNode.insertBefore(elLoading, slug.nextElementSibling);
            slug.parentNode.appendChild(elLoading);
        }

        function removeloading() {
            slug.parentNode.removeChild(slug.nextElementSibling);
        }

        title.addEventListener('change', function() {

            slug.setAttribute('disabled', 'true');
            loading();

            // fetch('/dashboard/posts/checkSlug?title=' + title.value)
            //     .then(response => response.json())
            //     .then(data => {
            //         slug.value = data.slug;
            //     });

            fetch('/dashboard/posts/checkSlug', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        _token: token.value,
                        title: title.value
                    })
                }).then(response => response.json())
                .then(data => {
                    slug.removeAttribute('disabled');
                    removeloading();
                    slug.value = data.slug

                })
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        });

        function previewImage(tes) {
            console.log(tes);
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(OFREvent) {
                imgPreview.src = OFREvent.target.result
            }
        }
    </script>
@endsection

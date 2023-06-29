@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Your Product</h1>
    </div>
    <div class="col-lg-8">
        <form action="/dashboard/products" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required autofocus value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="slug" class="form-label">Slug</label>
              <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" readonly value="{{ old('slug') }}">
                @error('slug')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
              <label for="category_id" class="form-label">Category</label>
              <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                @if (old('category_id') == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
              </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="imgPreview()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="container">
                <div class="form-group">
                  <label for="rangeInput">Total Stock: <span id="rangeValueDisplay">{{ old('stock') }}</span></label>
                  <input type="range" class="form-range" id="rangeInput" min="0" max="100" step="1">
                  <input type="hidden" id="rangeValue" name="stock" value="{{ old('stock') }}">
                  @error('stock')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" required autofocus value="{{ old('price') }}">
                  @error('price')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
              </div>

            <div class="mb-3">
                <label for="desc" class="form-label">Desc</label>
                @error('desc')

                    <p class="text-danger">{{ $message }}</p>

                @enderror
                <input id="desc" type="hidden" name="desc" value="{{ old('desc') }}">
                <trix-editor input="desc"></trix-editor>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
          </form>
    </div>

    <script>
        const title = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response=>response.json())
            .then(data=>slug.value = data.slug)
        });
        title.addEventListener('trix-file-accept', function(e){
            e.preventDefault();
        });

        function imgPreview(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        var rangeInput = document.getElementById('rangeInput');
  var rangeValueInput = document.getElementById('rangeValue');
  var rangeValueDisplay = document.getElementById('rangeValueDisplay');

  rangeInput.addEventListener('input', function() {
    var value = rangeInput.value;
    rangeValueInput.value = value;
    rangeValueDisplay.innerText = value;
  });

    </script>
@endsection

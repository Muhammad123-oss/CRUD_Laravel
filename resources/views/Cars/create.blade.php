@extends('working_layout.app')

@section('content')
    <div class="container">
        <div class="position-relative top-0 start-50 my-5">
            <h1 class="fs-1">
                Cars
            </h1>
        </div>
        <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <form method="POST" action="/cars" enctype="multipart/form-data">
                {{-- Its neccessary to add CSRF token in order to avoid CSRF attack.
                     when we add @csrf it automatically create a hidden input field having 
                     value attribute set as an unique token. For details inspect form on web to see.--}}
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Brand Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Brand name..." >
                </div>
                <div class="mb-3">
                  <label for="founded" class="form-label">Founded</label>
                  <input type="number" class="form-control" id="founded" name="founded" placeholder="Founded..." >
                </div>
                <div class="mb-3">
                    <label for="description">Description Here</label>
                    <textarea class="form-control" id="description" name="description" placeholder="Description Here..." ></textarea>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Car Image</label>
                    <input class="form-control" name="image_path" type="file" id="formFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
    {{-- If there is an error while submiting/validating a form then these errors will be displayed--}}
    @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
    @endif
    </div>
@endsection
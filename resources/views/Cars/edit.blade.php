@extends('working_layout.app')

@section('content')
    <div class="container">
        <div class="position-relative top-0 start-50 my-5">
            <h1 class="fs-1">
                Update Details
            </h1>
        </div>
        <div class="row">
        <div class="mx-auto col-10 col-md-8 col-lg-6">
            <form method="POST" action="/cars/{{ $car->id }}">
                {{-- Its neccessary to add CSRF token in order to avoid CSRF attack.
                     when we add @csrf it automatically create a hidden input field having 
                     value attribute set as an unique token. For details inspect form on web to see.--}}
                @csrf

                {{-- Here we are using method to send data using PUT. Bcz update route can't take 
                    POST method. And in php we have GET and POST option that's why we use @csrf method() to 
                    send data as a PUT request --}}
                @method('PUT')
                <div class="mb-3">
                  <label for="brand_name" class="form-label">Brand Name</label>
                  <input type="text" value="{{ $car->name }}" class="form-control" id="brand_name" name="brand_name" placeholder="Brand name..."  disabled>
                </div>
                <div class="mb-3">
                  <label for="founded" class="form-label">Founded</label>
                  <input type="text" class="form-control" value="{{ $car->founded }}" id="founded" name="founded" placeholder="Founded..." >
                </div>
                <div class="mb-3">
                    <label for="description">Description Here</label>
                    <textarea class="form-control" id="description"  name="description" placeholder="Description Here..." >{{ $car->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
        </div>
    </div>
    </div>
@endsection
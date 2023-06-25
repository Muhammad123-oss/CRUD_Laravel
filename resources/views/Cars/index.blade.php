@extends('working_layout.app')

@section('content')
<div class="container">
    <div class="position-relative top-0 start-50 my-5">
        <h1 class="fs-1">
            Cars
        </h1>
    </div>
    <div class="mb-3">
        <a href="/cars/create" class="fst-italic">Add a New Car</a>
    </div>
    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3 d-flex justify-content-between">
        @foreach ($cars as $car)
        <div class="card col" style="width: 18rem;">
            <img src="{{ asset('images/'.$car->name.'_pic.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><a href="/cars/{{ $car->id }}"> {{ $car->name }}</a></h5>
              <p class="card-text">{{ $car->description }}</p>
              <p class="fs-6 fw-bold">Founded year: {{ $car->founded }}</p>
              <a href="/cars/{{ $car->id }}/edit" class="btn btn-primary">Edit</a>
              {{-- It neccessary to send METHOD type while deleting, as update and delete both has same 
                routes. So, to differentiate them we require METHOD type to be passed. Like here we send DELETE --}}
              <form action="/cars/{{ $car->id }}" method="POST" class="my-2">
                @csrf
                @method('delete');
                <button class="btn btn-primary">Delete</button>
              </form>
            </div>
          </div>
        @endforeach
    </div>
</div>
@endsection
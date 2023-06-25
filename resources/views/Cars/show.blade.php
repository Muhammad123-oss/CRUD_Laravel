@extends('working_layout.app')
@section('content')

<div class="container">
    <h1 class="text-center my-5">{{ $car->name }}</h1>
    {{-- $car->cars_model here we calling cars_model() present inside car model. --}}
    {{-- $car->cars_model equivalent to: select * from cars_models where cars_models.car_id=$car->id --}}
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">ModelName</th>
            <th scope="col">EngineName</th>
            <th scope="col">ProductionDate</th>
          </tr>
        </thead>
        {{-- Way to define a variable in blade template --}}
        @php
            $count=0
        @endphp
        
        
        <tbody>
        @forelse ($car->cars_model as $model)
              @forelse ($car->engines as $engine)
              @if ($engine['model_id']==$model['id'])
              <tr>
                <th scope="row">{{ $count=$count+1 }}</th>
                <td>{{ $model['model_name'] }}</td>
                <td>{{ $engine['engine_name'] }}</td>
                <td>{{ $car->car_production_date->created_at }}</td>
              </tr>
              @endif
              @empty
                  <td>No Engine Found</td>
              @endforelse
        @empty
            <p>No Record Found</p>
        @endforelse
    </tbody>
      </table>
      {{-- @forelse ($car->products as $product)
          <p>Testing Many To Many Relationship:{{ $product['name'] }}</p>
      @empty
          <p>No record found</p>
      @endforelse --}}

</div>
@endsection
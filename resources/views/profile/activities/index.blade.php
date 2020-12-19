@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row justify-content-start">
    
    @foreach($userActivity as $item)
      <div class="col-md-3 my-3">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <p class="card-id p-0 m-0">{{ $item->activity_name }}</p>
          </div>
          <div class="card-body">
            <h5 class="card-title m-0 p-0">{{ $item->activity_duration }}</h5>         
          </div>              
          <div class="card-footer">
           <p>{{ $item->activity_description }}</p> 
          </div>
          <a href="{{ route('show',$item->id) }}" class="btn btn-danger">{{ __('Edit') }}</a>
        </div>
      </div>  
      @endforeach    
  </div>

</div>

@endsection
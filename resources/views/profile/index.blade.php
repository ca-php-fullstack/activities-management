@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @foreach($userActivity as $item)
                        <div class="col-md-3 my-3">
                            <div class="card">
                            <div class="card-header bg-dark text-white">
                                <p class="card-id p-0 m-0">{{ $item->activity_name }}</p>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title m-0 p-0">{{ $item->activity_duration }}</h5> 
                                <p>{{ $item->activity_description }}</p>         
                            </div>              
                            <div class="card-footer">
                            
                            <a href="{{ route('edit',$item->id) }}" class="btn btn-primary px-4">{{ __('Edit') }}</a>
                            <a href="{{ route('destroy', $item->id) }}" class="btn btn-danger"
                                onclick="event.preventDefault();
                                    if(confirm('Are you sure?')){
                                        document.getElementById('form-delete-{{$item->id}}').submit()
                                    }">
                                    {{ __('Delete') }}
                                </a>
                            <form action="{{ route('destroy',$item->id) }}" id="{{ 'form-delete-'.$item->id }}" method="post" style="display:none">
                                @csrf
                                @method('delete')
                            </form>
                            </div>
                            
                            </div>
                        </div>  
                    @endforeach  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

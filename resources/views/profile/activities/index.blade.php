@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card border-0 shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white text-uppercase d-flex flex-wrap justify-content-between">
                    <h2 class="text-warning mb-0">{{ __('Activities') }}</h2>
                    @if($userActivity->count() >= 1)
                    <a href="{{ route('report') }}" class="btn btn-primary">New Report</a>
                    @endif
                </div>
                    <div class="card-body">                   
                        <div class="row">

                            @if($userActivity->count() > 0)

                                @foreach($userActivity as $item)
                                    <div class="col-sm-6 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="m-0 text-success">{{ $item->activity_name }}</h4>
                                            </div>
                                                <div class="card-body">
                                                    <p class="text-dark">{{ __('Activity start date:') }} <small class="text-secondary">{{ $item->activity_start_date }}</small></p>
                                                    <p class="text-dark">{{ __('Activity end date:') }} <small class="text-secondary">{{ $item->activity_end_date }}</small></p>
                                                    <p class="text-dark">{{ __('Activity duration:') }} <small class="card-text text-secondary">{{ $item->activity_duration }}</small></p>
                                                    <p class="text-dark my-2">{{ __('Activity description:') }}</p>
                                                    <span class="text-secondary">{{ $item->activity_description }}</span>
                                                        <div class="mt-3 border-top pt-4">
                                                            <a href="{{ route('edit',$item->id) }}" class="btn btn-dark">{{ __('Edit') }}</a>
                                                            <a href="{{ route('destroy', $item->id) }}" class="btn btn-danger"
                                                                onclick="event.preventDefault();
                                                                    if(confirm('Are you sure?')){
                                                                        document.getElementById('form-delete-{{$item->id}}').submit()
                                                                    }">
                                                                    {{ __('Delete') }}
                                                            </a>
                                                        </div>
                                                    <form action="{{ route('destroy',$item->id) }}" id="{{ 'form-delete-'.$item->id }}" method="post" style="display:none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                        </div>
                                    </div>
                                @endforeach 
                        
                            @else

                            <div class="col-sm-12">
                                <h4 class="m-0 text-danger">You have no activities</h4>
                            </div>
                            
                            @endif
                        
                        </div>                   
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection
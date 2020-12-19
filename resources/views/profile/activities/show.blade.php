@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $userActivity->activity_name }}</h5>
                    <p class="card-text">{{ $userActivity->activity_duration }}</p>
                    <span>{{ $userActivity->activity_description }}</span>
                    
                    <a href="{{ route('edit') }}" class="btn btn-dark px-3">{{ __('Edit') }}</a>
                    <a href="{{ route('destroy') }}" class="btn btn-danger"
                        onclick="event.preventDefault();
                            if(confirm('Are you sure?')){
                                document.getElementById('form-delete-{{$userActivity->id}}').submit()
                            }">
                            {{ __('Delete') }}
                    </a>
                    <form action="{{ route('destroy',$userActivity->id) }}" id="{{ 'form-delete-'.$userActivity->id }}" method="post" style="display:none">
                        @csrf
                        @method('delete')
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
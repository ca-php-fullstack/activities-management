@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">{{ __('Create Activity') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('update',$userActivity->id) }}" id="{{ 'form-update-'.$userActivity->id }}">
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <label for="activity_name">{{ __('Activity Name') }}</label>
                                <input type="text" class="form-control" id="activity_name" name="activity_name">

                                @error('activity_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="activity_duration">{{ __('Activity Duration') }}</label>
                                <input type="number" class="form-control" id="activity_duration" name="activity_duration">

                                @error('activity_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="activity_description">{{ __('Activity Description') }}</label>
                                <textarea class="form-control" id="activity_description" name="activity_description" rows="3"></textarea>

                                @error('activity_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <button type="submit" class="btn btn-primary"
                                onclick="event.preventDefault();
                                    if(confirm('Are you sure?')){
                                        document.getElementById('form-update-{{$userActivity->id}}')
                                        .submit()
                                    }">{{ __('Submit') }}
                            </button>
                            <a href="{{ route('activities') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                        </form>  
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
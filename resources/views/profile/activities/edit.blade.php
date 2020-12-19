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
                                <input type="text" id="activity_name" name="activity_name" class="form-control @error('activity_name') is-invalid @enderror" value="{{ $userActivity->activity_name }}">

                                @error('activity_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Current Activity Start Date:') }} <span class="text-primary">{{ $userActivity->activity_start_date }}</span></label>
                                <input type="datetime-local" step="1" id="activity_start_date" name="activity_start_date" class="form-control @error('activity_start_date') is-invalid @enderror" value="{{ $userActivity->activity_start_date }}">
                                
                                @error('activity_start_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>
                            <div class="form-group">
                                <label for="">{{ __('Current Activity End Date:') }} <span class="text-primary">{{ $userActivity->activity_end_date }}</span></label>
                                <input type="datetime-local" step="1" id="activity_end_date" name="activity_end_date" class="form-control @error('activity_end_date') is-invalid @enderror" value="{{ $userActivity->activity_end_date }}">

                                @error('activity_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="activity_description">{{ __('Activity Description') }}</label>
                                <textarea id="activity_description" name="activity_description" class="form-control @error('activity_description') is-invalid @enderror" rows="3">{{ $userActivity->activity_description }}</textarea>

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
                            <a href="{{ route('profile') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                        </form>  
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
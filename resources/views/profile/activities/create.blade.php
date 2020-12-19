@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-secondary text-white">{{ __('Create Activity') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="activity_name">{{ __('Activity Name') }}</label>
                                <input type="text" id="activity_name" name="activity_name" class="form-control @error('activity_name') is-invalid @enderror" value="{{ old('activity_name') }}">
                                @error('activity_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="activity_duration">{{ __('Activity Duration') }}</label>
                                <input type="number" id="activity_duration" name="activity_duration" class="form-control @error('activity_duration') is-invalid @enderror" value="{{ old('activity_duration') }}">
                                @error('activity_duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="activity_description">{{ __('Activity Description') }}</label>
                                <textarea id="activity_description" name="activity_description" class="form-control @error('activity_description') is-invalid @enderror" rows="3">{{ old('activity_description') }}</textarea>
                                @error('activity_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary text-white">{{ __('Submit') }}</button>
                            <a href="{{ route('activities') }}" class="btn btn-danger">{{ __('Cancel') }}</a>
                        </form>  
                    </div>              
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
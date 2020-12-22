@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card border-0 shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white text-uppercase d-flex flex-wrap justify-content-between">
                    <h2 class="text-warning mb-0">{{ __('Find Report') }}</h2>
                </div>
                <div class="card-body"> 
                    <form action="{{ route('show') }}" method="post"> 
                        @csrf                
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="date-from">{{ __('Date From') }}</label>
                                        <input type="date" class="form-control" name="date_from" id="date_from">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="date-to">{{ __('Date To') }}</label>
                                        <input type="date" class="form-control" name="date_to" id="date_to">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-dark px-4">Find</button>     
                    </form> 
                </div>
                <div class="col-md-4">
                    <x-alert />
                </div>                
            </div>            
        </div>
    </div>
</div>

@endsection
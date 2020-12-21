@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card border-0 shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white text-uppercase d-flex flex-wrap justify-content-between">
                    <h2 class="text-warning mb-0">{{ __('Report') }}</h2>
                    <div class="d-flex justify-content-center col-md-6 p-0">
                        <input type="email" name="" id="" class="form-control mr-4 col-md-10" placeholder="E-Mail recipient for activity report">
                        <a href="" class="btn btn-secondary">{{ __('Send') }}</a>
                    </div>
                </div>
                <div class="card-body"> 
                    <form action="" method="get">                 
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="date-from">{{ __('Date From') }}</label>
                                        <input type="date" step="1" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="card">
                                    <div class="card-header">
                                        <label for="date-to">{{ __('Date To') }}</label>
                                        <input type="date" step="1" class="form-control" name="" id="">
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <button type="submit" class="btn btn-dark px-4">Find Report</button>     
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
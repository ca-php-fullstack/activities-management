@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card border-0 shadow mb-5 bg-white rounded">
                <div class="card-header bg-dark text-white text-uppercase d-flex flex-wrap justify-content-between">
                    <h2 class="text-warning mb-0">{{ __('Find Report') }}</h2>
                    <div class="d-flex justify-content-center col-md-6 p-0">
                        <input type="email" name="email" id="email" class="form-control" placeholder="E-Mail recipient for activity report">
                        <a href="" class="btn btn-secondary">{{ __('Send') }}</a>
                    </div>
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
                <div class="card-body"> 
                    <div class="table-responsive-md">
                        <form action="{{ route('reportStore') }}" method="POST">
                            @csrf
                        <table class="table table-striped shadow">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Activity Name</th>
                                    <th scope="col">Start Date</th>
                                    <th scope="col">End Date</th>
                                    <th scope="col">Duration</th>
                                    <th scope="col">Description</th>
                                </tr>
                            </thead>
                                <tbody>                               
                                    
                                    @foreach( $userActivity as $item)
                           
                                        <tr>
                                            <td name="activity_name_report" id="activity_name_report">{{ $item->activity_name }}</td>
                                            <td name="activity_start_date_report" id="activity_start_date_report">{{ $item->activity_start_date }}</td>
                                            <td name="activity_end_date_report" id="activity_end_date_report">{{ $item->activity_end_date }}</td>
                                            <td name="activity_duration_report" id="activity_duration_report">{{ $item->activity_duration }}</td>
                                            <td name="activity_description_report" id="activity_description_report" class="table-data">{{ $item->activity_description }}</td>
                                        </tr>
            
                                    @endforeach              
                                       
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Generate</button>
                        </form>
                        </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
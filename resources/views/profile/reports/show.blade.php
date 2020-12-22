@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
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

@endsection
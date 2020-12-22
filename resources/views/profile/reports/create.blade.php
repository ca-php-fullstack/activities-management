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
                            <td>
                                <input class="form-control" type="text" name="activity_name_report" id="activity_name_report" readonly value="{{ $item->activity_name }}">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="activity_start_date_report" id="activity_start_date_report" readonly value="{{$item->activity_start_date }}">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="activity_end_date_report" id="activity_end_date_report" readonly value="{{$item->activity_end_date }}">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="activity_duration_report" id="activity_duration_report" readonly value="{{$item->activity_duration }}">
                            </td>
                            <td>
                                <input class="form-control" type="text" name="activity_description_report" id="activity_description_report" readonly value="{{$item->activity_description }}">
                            </td>
                        </tr>

                    @endforeach              
                       
                </tbody>
            </table>
            <div class="row justify-content-center">
            <div class="col-md-4">
                <input type="email" class="form-control" name="email_report" id="email_report" placeholder="Enter E-mail address">
                <button type="submit" class="btn btn-primary">Generate</button>
            </div>
            </div>
        </form>
        </div>
</div>
        </div>
    </div>
</div>

@endsection
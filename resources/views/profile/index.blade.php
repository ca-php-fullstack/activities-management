@extends('layouts.app')

@section('content')

<div class="container">
<div class="card">
    <h4 class="card-header">Dashboard</h4>
    <div class="card-body">
      <h5 class="card-title">{{ auth()->user()->username }}</h5>
      <a href="{{ route('activities') }}" class="btn btn-dark">My Activities</a>
    </div>
  </div>
</div>

@endsection
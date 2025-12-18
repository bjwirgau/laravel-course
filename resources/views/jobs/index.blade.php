@extends('layout')

@section('content')
  <h1>Available Jobs</h1>
  <ul>
    @forelse ($jobs as $job)
      <li>{{$loop->index}} - {{$job}}</li>
    @empty
      <li>No jobs available at the moment.</li>
    @endforelse
  </ul>
@endsection
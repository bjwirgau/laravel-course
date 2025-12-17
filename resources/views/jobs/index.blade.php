<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Listings</title>
</head>
<body>
  <h1>{{$title}}</h1>
  <ul>
    @forelse ($jobs as $job)
      {{-- @if($job == 'Data Scientist')
        @continue
      @endif --}}
      <li>{{$loop->index}} - {{$job}}</li>
      {{-- <li>{{$loop->iteration}} - {{$job}}</li> --}}
      {{-- <li>{{$loop->remaining}} - {{$job}}</li> --}}
      {{-- <li>{{$loop->count}} - {{$job}}</li> --}}
      {{-- <li>{{$loop->first}} - {{$job}}</li> --}}
      {{-- <li>{{$loop->last}} - {{$job}}</li> --}}
      {{-- <li>{{$loop->even}} - {{$job}}</li>
      <li>{{$loop->odd}} - {{$job}}</li> --}}
    @empty
      <li>No jobs available at the moment.</li>
    @endforelse
  </ul>
</body>
</html>
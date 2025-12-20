<x-layout>
  <h1>Available Jobs</h1>
  <ul>
    @forelse ($jobs as $job)
      <li>{{$job->title}} - {{$job->description}}</li>
    @empty
      <li>No jobs available at the moment.</li>
    @endforelse
  </ul>
</x-layout>
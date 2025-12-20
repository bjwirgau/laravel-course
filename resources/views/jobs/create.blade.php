<x-layout>
  <x-slot name="title">Workopia | Create Job</x-slot>
  <h1>Create New Job</h1>
  <form action="/jobs" method="POST">
    @csrf
    <input class="bg-white" type="text" name="title" placeholder="Job Title">
    <input class="bg-white" type="text" name="description" placeholder="Job Description">
    <button type="submit">Create Job</button>
  </form>
</x-layout>
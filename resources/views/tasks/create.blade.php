@extends('layouts.app')

@section('content')
<h1 class="h3 mb-3">New Task</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="card">
  @csrf
  <div class="card-body">
    @include('tasks.partials._form', ['task' => null])
  </div>
  <div class="card-footer d-flex gap-2">
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
  </div>
</form>
@endsection

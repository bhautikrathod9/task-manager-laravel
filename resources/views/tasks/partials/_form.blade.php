@php
  $isEdit = isset($task) && $task;
@endphp

<div class="mb-3">
  <label for="title" class="form-label">Title</label>
  <input type="text" class="form-control" id="title" name="title"
         value="{{ old('title', $isEdit ? $task->title : '') }}" required maxlength="255">
</div>

<div class="mb-3">
  <label for="description" class="form-label">Description</label>
  <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $isEdit ? $task->description : '') }}</textarea>
</div>

<div class="form-check mb-3">
  <input class="form-check-input" type="checkbox" id="status" name="status"
         {{ old('status', $isEdit ? $task->status : false) ? 'checked' : '' }}>
  <label class="form-check-label" for="status">
    Mark as Completed
  </label>
</div>

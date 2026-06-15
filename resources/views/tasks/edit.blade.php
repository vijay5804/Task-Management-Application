<x-app-layout>
    <div class="container mt-4">

        <h2>Edit Task</h2>

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $task->title) }}">

                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>

                <textarea name="description"
                          class="form-control"
                          rows="4">{{ old('description', $task->description) }}</textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>

                <select name="status" class="form-select">

                    <option value="pending"
                        {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="in_progress"
                        {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>
                        In Progress
                    </option>

                    <option value="completed"
                        {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>

                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Due Date</label>

                <input type="date"
                       name="due_date"
                       class="form-control"
                       value="{{ old('due_date', $task->due_date) }}">

                @error('due_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>

                <select name="category_id" class="form-select">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}"
                            {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Update Task
            </button>

            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</x-app-layout>
<x-app-layout>
    <div class="container mt-4">

        <h2>Create New Task</h2>

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Title</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title') }}">

                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Description</label>

                <textarea name="description"
                          class="form-control">{{ old('description') }}</textarea>

                @error('description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option value="pending">Pending</option>

                    <option value="in_progress">In Progress</option>

                    <option value="completed">Completed</option>

                </select>

                @error('status')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Due Date</label>

                <input type="date"
                       name="due_date"
                       class="form-control"
                       value="{{ old('due_date') }}">

                @error('due_date')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Category</label>

                <select name="category_id" class="form-control">

                    @foreach($categories as $category)

                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>

                    @endforeach

                </select>

                @error('category_id')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success">
                Save Task
            </button>

            <a href="{{ route('tasks.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </form>

    </div>
</x-app-layout>
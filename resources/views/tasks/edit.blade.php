<x-app-layout>

    <div class="container py-4">

        <div class="form-card">

            <div class="mb-4">
                <h1 class="text-white fw-bold mb-1 title-text">
                    Edit Task
                </h1>

                <p class="text-secondary mb-0">
                    Update your task details.
                </p>
            </div>


            <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="mb-4">

                    <label class="form-label text-light d-block mb-2">
                        Title
                    </label>

                    <input type="text" name="title" class="form-control custom-input"
                        value="{{ old('title', $task->title) }}" placeholder="Enter task title">

                    @error('title')
                        <small class="error-text">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="mb-4">

                    <label class="form-label text-light d-block mb-2">
                        Description
                    </label>

                    <textarea name="description" rows="2.5" class="form-control custom-input" placeholder="Task description">{{ old('description', $task->description) }}</textarea>

                    @error('description')
                        <small class="error-text">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="mb-4">

                    <label class="form-label text-light d-block mb-2">
                        Status
                    </label>

                    <select name="status" class="form-select custom-input">

                        <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="in_progress"
                            {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>
                            In Progress
                        </option>

                        <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                    </select>

                    @error('status')
                        <small class="error-text">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="mb-4">

                    <label class="form-label text-light d-block mb-2">
                        Due Date
                    </label>

                    <input type="date" name="due_date" class="form-control custom-input"
                        value="{{ old('due_date', $task->due_date) }}">

                    @error('due_date')
                        <small class="error-text">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="mb-4">

                    <label class="form-label text-light d-block mb-2">
                        Category
                    </label>

                    <select name="category_id" class="form-select custom-input">

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $task->category_id) == $category->id ? 'selected' : '' }}>

                                {{ $category->name }}

                            </option>
                        @endforeach

                    </select>

                    @error('category_id')
                        <small class="error-text">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="d-flex gap-3">

                    <button type="submit" class="btn-save">
                        Update Task
                    </button>

                    <a href="{{ route('tasks.index') }}" class="btn-cancel">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>


    <style>
        

        .form-card {
            max-width: 800px;
            margin: auto;
            background: #f1f2f4;
            border: 1px solid #334155;
            border-radius: 24px;
            padding: 15px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .3);
        }

        .custom-input {
            width: 100%;
            background: #0f172a;
            border: 1px solid #475569;
            color: white;
            border-radius: 14px;
            padding: 14px;
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(1);
            cursor: pointer;
        }

        .custom-input:focus {
            background: #0f172a;
            color: white;
            border-color: #3b82f6;
            box-shadow: none;
        }

        .btn-save {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 600;
        }

        .btn-save:hover {
            background: #1d4ed8;
        }

        .btn-cancel {
            background: #475569;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 600;
        }

        .btn-cancel:hover {
            background: #334155;
            color: white;
        }

        .title-text {
            color: #1752dc;
        }

        .error-text {
            color: #ef4444;
            font-size: 14px;
            display: block;
            margin-top: 6px;
        }
    </style>

</x-app-layout>

<x-app-layout>

    <div class="container py-5">

        <div class="form-card">

            <div class="mb-4">

                <h1 class="edit-title fw-bold mb-1">
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

                    <label class="form-label text-light">
                        Title
                    </label>

                    <input type="text" name="title" class="form-control custom-input"
                        value="{{ old('title', $task->title) }}">

                    @error('title')
                        <small class="error-text">
                            {{ $message }}
                        </small>
                    @enderror


                </div>


                <div class="mb-4">

                    <label class="form-label text-light">
                        Description
                    </label>

                    <textarea name="description" rows="4" class="form-control custom-input">{{ old('description', $task->description) }}</textarea>

                    

                </div>


                <div class="mb-4">

                    <label class="form-label text-light">
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

                  

                </div>


                <div class="mb-4">

                    <label class="form-label text-light">
                        Due Date
                    </label>

                    <input type="date" name="due_date" class="form-control custom-input"
                        value="{{ old('due_date', $task->due_date) }}">

                  

                </div>


                <div class="mb-4">

                    <label class="form-label text-light">
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

                   

                </div>


                <div class="d-flex gap-3">

                    <button type="submit" class="btn-update">
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
            background: #f2f4f6;
            border: 1px solid #334155;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .3);
        }

        .edit-title {
            color: #60a5fa;
        }

        .custom-input {
            background: #334155;
            border: 1px solid #475569;
            color: white;
            border-radius: 14px;
            padding: 14px;
        }

        .custom-input:focus {
            background: #334155;
            color: white;
            border-color: #3b82f6;
            box-shadow: none;
        }

        .btn-update {
            background: #10b981;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 600;
        }

        .btn-update:hover {
            background: #059669;
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

        .error-text {
            color: #ef4444 !important;
            font-size: 14px;
            display: block;
            margin-top: 6px;
        }
    </style>

</x-app-layout>

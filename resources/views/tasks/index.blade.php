<x-app-layout>

    <div class="container-fluid py-5 page-content px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="header-section">

            <h1 class="fw-bold text-light mb-0">
                My Tasks
            </h1>

            <a href="{{ route('tasks.create') }}" class="btn-add">
                + Add New Task
            </a>

        </div>


        @if ($tasks->count())

            <div class="task-container">

                <div class="task-header">

                    <div>TITLE</div>
                    <div>CATEGORY</div>
                    <div>STATUS</div>
                    <div>DUE DATE</div>
                    <div>ACTIONS</div>

                </div>


                @foreach ($tasks as $task)
                    <div class="task-item">

                        <div class="task-info">

                            <h5>{{ $task->title }}</h5>

                            <p>
                                {{ \Illuminate\Support\Str::limit($task->description, 50) }}
                            </p>

                        </div>


                        <div class="task-category">

                            {{ $task->category->name }}

                        </div>


                        <div>

                            @if ($task->status == 'pending')
                                <span class="status pending">
                                    Pending
                                </span>
                            @elseif($task->status == 'in_progress')
                                <span class="status progress">
                                    In Progress
                                </span>
                            @else
                                <span class="status completed">
                                    Completed
                                </span>
                            @endif

                        </div>


                        <div class="task-date">

                            {{ \Carbon\Carbon::parse($task->due_date)->format('M d, Y') }}

                        </div>


                        <div class="task-actions">

                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn-edit">

                                ✏ Edit

                            </a>


                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                onsubmit="return confirm('Delete this task?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn-delete">

                                    🗑 Delete

                                </button>

                            </form>

                        </div>

                    </div>
                @endforeach

            </div>
        @else
            <div class="task-container text-center p-5">

                <h4 class="text-light">
                    No tasks found
                </h4>

                <p class="text-secondary">
                    Create your first task!
                </p>

            </div>

        @endif

    </div>


    <style>
        .page-content {
            background: #0f172a;
        }

        h1,p,h4 {
            color: white !important;
        }

        .alert-success {
            background-color: #dcfce7 !important;
            color: #15803d !important;
            border-color: #22c55e !important;
        }


        .task-container {
            background: #1e293b;
            border-radius: 24px;
        }

        .task-header {
            display: grid;
            grid-template-columns: 3fr 1fr 1fr 1fr 1.3fr;
            padding: 25px;
            color: #94a3b8;
            font-size: 14px;
            font-weight: 600;
            border-bottom: 1px solid #334155;
        }

        .task-item {
            display: grid;
            grid-template-columns: 3fr 0.8fr 1fr 1fr 1.3fr;
            gap: 20px;
            align-items: center;
            padding: 25px;
            border-bottom: 1px solid #334155;
        }

        .task-item:hover {
            background: #273549;
        }

        .task-info h5 {
            color: white;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .task-info p {
            color: #94a3b8;
        }

        .task-category,
        .task-date {
            color: white;
        }

        .task-actions {
            display: flex;
            gap: 12px;
        }

        .status {
            padding: 10px 18px;
            border-radius: 30px;
            font-weight: 600;

        }

        .pending {
            background: #fff3cd;
            color: #8a5a00;
        }

        .progress {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .completed {
            background: #dcfce7;
            color: #15803d;
        }

        .header-section {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .btn-add {
            margin-left: auto;
            padding: 12px 24px;
            border: 1px solid #475569;
            color: rgb(14, 10, 10);
            border-radius: 18px;
            background: #f8f9fa;
        }

        .btn-add:hover {
            background: rgb(12, 12, 12);
            color: rgb(213, 12, 12);
        }

        .btn-edit,
        .btn-delete {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 42px;
            min-width: 100px;
            padding: 0 18px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
        }

        .btn-edit {
            background: #2563eb;
            color: white;
            text-decoration: none;
            border: none;
        }

        .btn-edit:hover {
            background: #1d4ed8;
            color: white;
        }

        .btn-delete {
            background: #dc2626;
            color: white;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #b91c1c;
        }
    </style>

</x-app-layout>

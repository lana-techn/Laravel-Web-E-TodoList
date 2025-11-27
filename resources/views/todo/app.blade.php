<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 20px;
        }

        .navbar {
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .container {
            max-width: 900px;
        }

        .page-header {
            text-align: center;
            color: white;
            margin-bottom: 2rem;
            animation: slideDown 0.6s ease-out;
        }

        .page-header h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .page-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            margin-bottom: 2rem;
            backdrop-filter: blur(10px);
            animation: fadeInUp 0.6s ease-out;
        }

        .card-body {
            padding: 2rem;
        }

        .alert {
            border-radius: 15px;
            border: none;
            margin-bottom: 1.5rem;
            animation: slideDown 0.4s ease-out;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            color: #155724;
            border-left: 5px solid #28a745;
        }

        .alert-danger {
            background: rgba(220, 53, 69, 0.1);
            color: #721c24;
            border-left: 5px solid #dc3545;
        }

        .input-group {
            margin-bottom: 1.5rem;
            gap: 10px;
        }

        .form-control {
            border-radius: 12px;
            border: 2px solid #e0e0e0;
            padding: 12px 16px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn {
            border-radius: 12px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
            color: white;
        }

        .btn-secondary {
            background: #f5f5f5;
            color: #333;
            border: 2px solid #e0e0e0;
        }

        .btn-secondary:hover {
            background: #e0e0e0;
            transform: translateY(-2px);
        }

        .btn-danger {
            background: #dc3545;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(220, 53, 69, 0.3);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 0.9rem;
        }

        .todo-list {
            list-style: none;
            margin-bottom: 2rem;
        }

        .todo-item {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 5px solid #667eea;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .todo-item:hover {
            transform: translateX(5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .todo-item.completed {
            border-left-color: #28a745;
            opacity: 0.7;
        }

        .task-text {
            flex: 1;
            font-size: 1.1rem;
            color: #333;
        }

        .task-text del {
            color: #999;
            text-decoration: line-through;
        }

        .btn-group {
            display: flex;
            gap: 8px;
        }

        .edit-input {
            width: 60%;
            margin-right: 1rem;
        }

        .collapse {
            background: #f9f9f9;
            border-radius: 15px;
            padding: 1.5rem;
            margin-top: 1rem;
            animation: slideDown 0.3s ease-out;
        }

        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }

        .page-link {
            border-radius: 10px;
            border: none;
            margin: 0 4px;
            color: #667eea;
            background: white;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        .page-link.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }

        .search-section {
            background: rgba(255, 255, 255, 0.1);
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }

        .stats {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            justify-content: center;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
            min-width: 150px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .stat-card .number {
            font-size: 2rem;
            font-weight: 800;
            color: #667eea;
        }

        .stat-card .label {
            color: #666;
            font-size: 0.9rem;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .todo-item {
            animation: fadeInUp 0.5s ease-out;
        }

        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .todo-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .btn-group {
                width: 100%;
                margin-top: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- 00. Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <div class="navbar-brand">
                <i class="fas fa-check-circle"></i> Todo List
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Page Header -->
        <div class="page-header">
            <h1>My To-Do List</h1>
            <p>Stay organized and track your tasks efficiently</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Add New Task Card -->
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fas fa-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="fas fa-exclamation-circle"></i> <strong>Error!</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <h5 class="mb-3"><i class="fas fa-plus-circle"></i> Add New Task</h5>
                        <form id="todo-form" action="{{ route('todo.post') }}" method="post">
                            @csrf
                            <div class="input-group">
                                <input type="text" class="form-control" name="task" id="todo-input"
                                    placeholder="What needs to be done?" value="{{ old('task') }}" required>
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-plus"></i> Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tasks List Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Search Section -->
                        <div class="search-section">
                            <form id="search-form" action="{{ route('todo') }}" method="get">
                                <div class="input-group">
                                    <i class="fas fa-search form-control-icon"></i>
                                    <input type="text" class="form-control" name="search"
                                        value="{{ request('search') }}" placeholder="Search tasks...">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fas fa-search"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Tasks List -->
                        <h5 class="mb-3"><i class="fas fa-list-check"></i> Your Tasks</h5>
                        <ul class="todo-list" id="todo-list">
                            @forelse ($data as $item)
                                <!-- 04. Display Data -->
                                <li class="todo-item {{ $item->is_done == '1' ? 'completed' : '' }}">
                                    <span class="task-text">
                                        @if ($item->is_done == '1')
                                            <i class="fas fa-check-circle" style="color: #28a745; margin-right: 10px;"></i>
                                            <del>{{ $item->task }}</del>
                                        @else
                                            <i class="fas fa-circle" style="color: #ddd; margin-right: 10px;"></i>
                                            {{ $item->task }}
                                        @endif
                                    </span>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $loop->index }}"
                                            aria-expanded="false" title="Edit">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this task?')"
                                            style="display: inline;">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" title="Delete">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </li>

                                <!-- 05. Update Data -->
                                <li class="collapse" id="collapse-{{ $loop->index }}">
                                    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label class="form-label"><i class="fas fa-file-alt"></i> Task Description</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="task"
                                                    value="{{ $item->task }}">
                                                <button class="btn btn-primary" type="submit">
                                                    <i class="fas fa-save"></i> Update
                                                </button>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"><i class="fas fa-tasks"></i> Status</label>
                                            <div class="d-flex gap-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="0" name="is_done"
                                                        id="pending-{{ $loop->index }}"
                                                        {{ $item->is_done == '0' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="pending-{{ $loop->index }}">
                                                        <i class="fas fa-hourglass"></i> Pending
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" value="1" name="is_done"
                                                        id="completed-{{ $loop->index }}"
                                                        {{ $item->is_done == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="completed-{{ $loop->index }}">
                                                        <i class="fas fa-check"></i> Completed
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            @empty
                                <li class="todo-item text-center" style="border-left: none; justify-content: center;">
                                    <i class="fas fa-inbox" style="font-size: 3rem; color: #ddd; margin-right: 1rem;"></i>
                                    <div>
                                        <p style="margin: 0; color: #999;">No tasks found</p>
                                        <small style="color: #bbb;">Start by adding a new task above</small>
                                    </div>
                                </li>
                            @endforelse
                        </ul>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add smooth transitions
        document.querySelectorAll('.todo-item').forEach(item => {
            item.addEventListener('click', function(e) {
                if (!e.target.closest('button') && !e.target.closest('form')) {
                    // Optional: Add ripple effect or other interactions
                }
            });
        });

        // Auto-dismiss alerts after 5 seconds
        document.querySelectorAll('.alert').forEach(alert => {
            setTimeout(() => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            }, 5000);
        });
    </script>
</body>

</html>

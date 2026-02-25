<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="bg-secondary text-white p-3 round-md">

        <h2>The All Users from Database</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>

                        <a href="{{-- route('users.show', $user) --}}" class="btn btn-info btn-sm">View no Acvive</a>

                        <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- route('users.destroy', $user->id)  -->
                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete
                            </button>
                        </form>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- Pagination -->
@if ($users->hasPages())
    <div class="px-6 py-5 border-t border-gray-200 dark:border-gray-700">
        {{-- $users->links() --}}
        <div class="text-muted">
            Показано {{ $users->firstItem() }} - {{ $users->lastItem() }} из {{ $users->total() }}
        </div>
        <div>
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

        <!-- или если хочешь именно tailwind-стиль -->
        {{ $users->links('pagination::tailwind') }}
    </div>
@endif


</body>
</html>

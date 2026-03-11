<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script>--}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>


{{-- **************************************************** --}}
<div class="container mx-auto px-4 py-8 max-w-7xl">

    <div class="bg-secondary text-gray-500 p-3 round-md">

        <h2>The All Users from Database</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Фильтры -->
        <div class="mb-5 flex-row space-x-3">
            <form method="GET" action="{{ route('users.index') }}" id="filters-form"
                  class="bg-green-900 dark:bg-gray-800 shadow rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-5 gap-6">

                    <!-- Имя -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Имя
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ request('name') }}"
                               placeholder="Введите имя..."
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                               bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Slug -->
                    <div>
                        <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Slug
                        </label>
                        <input type="text"
                               name="slug"
                               id="slug"
                               value="{{ request('slug') }}"
                               placeholder="Введите slug..."
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white
                               dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Email
                        </label>
                        <input type="text"
                               name="email"
                               id="email"
                               value="{{ request('email') }}"
                               placeholder="Введите email..."
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                               bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- Дата регистрации: от -->
                    <div>
                        <label for="date_from" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Дата от
                        </label>
                        <input type="date"
                               name="date_from"
                               id="date_from"
                               value="{{ request('date_from') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                               bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>

                    <!-- Дата регистрации: до -->
                    <div>
                        <label for="date_to" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Дата до
                        </label>
                        <input type="date"
                               name="date_to"
                               id="date_to"
                               value="{{ request('date_to') }}"
                               class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                               bg-white dark:bg-gray-700 text-gray-900 dark:text-white">
                    </div>

                </div>

                <div class="mt-6 flex flex-wrap items-center gap-4">

                    <!-- Статус -->
                    <div>
                        <label for="active" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                            Статус
                        </label>
                        <select name="active"
                                id="active"
                                class="px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Все</option>
                            <option value="1" {{ request('active') === '1' ? 'selected' : '' }}>Активен</option>
                            <option value="0" {{ request('active') === '0' ? 'selected' : '' }}>Не активен</option>
                        </select>
                    </div>

                    <!-- Кнопки -->
                    <div class="flex gap-3">
                        <button type="submit"
                                class="px-5 py-2 bg-indigo-600 hover:bg-indigo-700 text-red-800 font-medium rounded-lg transition">
                            Apply
                        </button>

                        @if(request()->hasAny(['name', 'slug', 'email', 'date_from', 'date_to', 'active']))
                            <a href="{{ route('users.index') }}"
                               class="px-3 py-3 bg-gray-500 dark:bg-gray-600
                                font-medium rounded-xl transition border-red-500 border-dashed">
                                Clear
                            </a>
                        @endif
                    </div>

                </div>
            </form>
        </div>


        {{-- Card --}}
        <div
            class="bg-white dark:bg-gray-800 shadow-xl rounded-xl overflow-hidden border border-gray-200 dark:border-gray-700">

            {{-- Tables --}}
            <div class="overflow-x-auto">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Email</th>
                        <th>Phones</th>
                        <th>Date Of Register</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->slug }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->phones as $phone)
                                    {{ $phone->phoneBrand->name . ': ' }} {{ $phone->number }}<br>
                                @endforeach
                            </td>
                            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            <td>{!! $user->getActiveTag() !!}  </td>
                            <td>

                                <a href="{{-- route('users.show', $user) --}}" class="btn btn-info btn-sm">View no
                                    Acvive</a>

                                <a href="{{-- route('users.edit', $user) --}}" class="btn btn-warning btn-sm">Edit</a>

                                <a href="{{ route('users.show', $user) }}"
                                   class="text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 transition"
                                   title="Редактировать">

                                </a>


                                <!-- route('users.destroy', $user->id)  -->
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete
                                    </button>
                                </form>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-16 text-center text-gray-500 dark:text-gray-400">
                                <div class="text-6xl mb-4">😔</div>
                                <p class="text-lg">Пользователи пока отсутствуют</p>
                                <a href="{{ route('users.create') }}"
                                   class="mt-4 inline-block text-indigo-600 dark:text-indigo-400 hover:underline">
                                    Добавить первого пользователя →
                                </a>
                            </td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
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

        </div>

    </div>


</div>

</body>
</html>

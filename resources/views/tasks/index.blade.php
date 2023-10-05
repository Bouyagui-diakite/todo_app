<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All tasks</title>
    @vite('resources/css/app.css')
</head>

<body>
    @include('components.layout')
    @include('sweetalert::alert')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container max-w-7xl mx-auto mt-8">
            <div class="mb-4">
                <h1 class="scandia-web text-3xl font-bold text-center decoration-gray-400"> Tout les taches</h1>
                <div class="flex justify-end">
                    <a href="{{ route('tasks.create') }}"
                        class="px-4 py-2 rounded-md bg-sky-500 text-sky-100 hover:bg-sky-600">Creer une tache</a>
                </div>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">

                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Title</th>
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Description</th>
                                   
                                    <th
                                        class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                        Created_At</th>
                                    <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                                        colspan="3">
                                        Action</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                {{ $task->id }}
                                            </div>

                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="text-sm leading-5 text-gray-900">{{ $task->title }}
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <p>{{ $task->description }}</p>
                                        </td>
                                      

                                        <td
                                            class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <span>{{ $task->created_at->format('d/m/Y') }}</span>
                                        </td>

                                        <td
                                            class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                            <a href="{{ route('tasks.edit', ['task' => $task]) }}"
                                                class="text-indigo-600 hover:text-indigo-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                        <td
                                            class="text-sm font-medium leading-5 text-center whitespace-no-wrap border-b border-gray-200 ">
                                            <a href="{{ route('tasks.show', ['task' => $task]) }}"
                                                class="text-gray-600 hover:text-gray-900">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                </svg>
                                            </a>

                                        </td>

                                        </td>
                                        <td
                                            class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6 text-red-600 hover:text-red-800" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            </di>

        </div>
    </div>
    <div class="mx-auto m-10 mt-10 w-4/5">
        {{ $tasks->links() }}
    </div>
</body>

</html>

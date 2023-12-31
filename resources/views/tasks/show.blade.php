<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Single task</title>
	@vite('resources/css/app.css')
</head>
<body>
    <div>
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

                <div class="mb-4">
                    <h1 class="fira-code text-3xl font-bold  decoration-gray-400"> Task {{ $task->id }}</h1>
                </div>

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form method="POST" action="#">
                        <!-- Title -->
                        <div>
                            <h3 class="text-2xl font-semibold">{{ $task->title }}</h3>
                            <div class="flex items-center mb-4 space-x-2">
                                <span class="text-xs text-gray-500"> {{ $task->created_at->format('d/m/Y') }}</span><span
                                    class="text-xs text-gray-500">Created by
                                    {{ $task->user->name }}</span>
                            </div>
                            <p class="text-base text-gray-700">{{ $task->description }}</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

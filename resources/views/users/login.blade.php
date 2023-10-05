<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log In</title>
    @vite('resources/css/app.css')
</head>


<body>
    <!-- Create Post -->
    <div>
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">
                <div class="mb-4">
                    <h1 class="fira-code text-3xl font-bold text-center  decoration-gray-400">
                       Log In to create tasks
                    </h1>
                </div>

                <div class="pb-8">
                    @if ($errors->any())
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            Something went wrong
                        </div>
                        <ul class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    @endif
                </div>
                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">

                    <form action="/users/authenticate" method="POST">
                        @csrf
                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="title">
                                Email
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="email" />

                        </div>

                        <div class="mt-4">
                            <label class="block text-sm font-bold text-gray-700" for="title">
                                Password
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="password" name="password" />

                            <div class="flex items-center justify-start mt-4 gap-x-2">
                                <button type="submit"
                                    class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                    Sign In
                                </button>
                                <div class="mt-8">
                                    <p>
                                       Don't have account?
                                        <a href="/register">Register</a>
                                    </p>
                                </div>
                            </div>
                    </form>

                </div>
            </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">

                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>

                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <ul class="flex  space-x-6 mr-6 text-lg">
                        @auth
                            <li >
                                <span class="font-bold uppercase">
                                   {{ auth()->user()->name }} </span>
                            </li>

                            <li>
                                <form class="inline" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-red-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                        <i class="fa-solid fa-door-closed "></i>Se deconnecter


                                    </button>
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="/register" class="hover:text-laravel  px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-900 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300"><i class="fa-solid fa-user-plus"></i>
                                    Inscription</a>
                            </li>
                            <li>
                                <a href="/login" class="hover:text-laravel px-6 py-2 text-sm font-semibold rounded-md shadow-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300"><i
                                        class="fa-solid fa-arrow-right-to-bracket"></i>
                                    Connexion
                                      </a>
                            </li>
                        @endauth
                    </ul>
                </div>
            </nav>
</body>

</html>

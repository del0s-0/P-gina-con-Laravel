<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name')) — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="m-0 flex min-h-screen flex-col bg-[#eef2f7] font-sans text-gray-800 antialiased">
    <nav id="navbar" class="group bg-gray-900 text-gray-50 md:flex md:items-center md:justify-between md:pr-7">
        <div class="flex items-center justify-between px-7 py-[0.8rem] md:pr-0">
            <a href="{{ route('home') }}" class="pr-2.5 text-[1.2rem] font-bold tracking-wide no-underline">
                {{ config('app.name') }}
            </a>

            <button
                type="button"
                class="navbar-toggle flex h-[42px] w-[42px] flex-col items-center justify-center gap-[5px] rounded-lg border border-gray-700 bg-transparent p-0 md:hidden"
                aria-label="Abrir menú"
                aria-expanded="false"
                aria-controls="navbar-menu"
            >
                <span class="block h-0.5 w-5 bg-gray-50 transition duration-200 group-[.is-open]:translate-y-[7px] group-[.is-open]:rotate-45"></span>
                <span class="block h-0.5 w-5 bg-gray-50 transition duration-200 group-[.is-open]:opacity-0"></span>
                <span class="block h-0.5 w-5 bg-gray-50 transition duration-200 group-[.is-open]:-translate-y-[7px] group-[.is-open]:-rotate-45"></span>
            </button>
        </div>

        <div
            id="navbar-menu"
            class="hidden flex-col items-stretch gap-4 border-t border-gray-800 px-7 pb-4 group-[.is-open]:flex md:flex md:flex-1 md:flex-row md:items-center md:justify-between md:gap-6 md:border-0 md:p-0"
        >
            <div class="flex flex-col items-start gap-3 md:flex-row md:items-center md:gap-4">
                <a
                    href="{{ route('home') }}"
                    class="w-full text-[0.95rem] no-underline md:w-auto {{ request()->routeIs('home') ? 'text-white' : 'text-gray-300 hover:text-white' }}"
                >
                    Inicio
                </a>
                <a
                    href="{{ route('home') }}"
                    class="w-full text-[0.95rem] no-underline md:w-auto {{ request()->routeIs('home') ? 'text-white' : 'text-gray-300 hover:text-white' }}"
                >
                    Configuración
                </a>
                @auth
                    <a
                        href="{{ route('dashboard') }}"
                        class="w-full text-[0.95rem] no-underline md:w-auto {{ request()->routeIs('dashboard') ? 'text-white' : 'text-gray-300 hover:text-white' }}"
                    >
                        Dashboard
                    </a>
                @endauth
            </div>
            @auth 

            <div class="flex flex-col items-start gap-3 md:flex-row md:items-center md:gap-4">
                <a
                    href="{{ route('users') }}"
                    class="w-full text-[0.95rem] no-underline md:w-auto {{ request()->routeIs('users') ? 'text-white' : 'text-gray-300 hover:text-white' }}"
                >
                    Usuarios
                </a>
            </div>
            @endauth

            <div class="flex flex-col items-start gap-3 md:flex-row md:items-center md:gap-4">
                @auth
                    <div class="text-left leading-tight md:text-right">
                        <strong class="block text-[0.9rem] font-semibold">{{ auth()->user()->name }}</strong>
                        <span class="text-xs text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <form method="POST" action="{{ route('logout') }}" class="w-full md:w-auto">
                        @csrf
                        <button
                            type="submit"
                            class="inline-block w-full cursor-pointer rounded-lg border-0 bg-blue-600 px-[0.85rem] py-[0.4rem] text-center text-[0.9rem] text-white hover:bg-blue-700 md:w-auto"
                        >
                            Salir
                        </button>
                    </form>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="w-full text-[0.95rem] no-underline md:w-auto {{ request()->routeIs('login') ? 'text-white' : 'text-gray-300 hover:text-white' }}"
                    >
                        Login
                    </a>
                    <a
                        href="{{ route('register') }}"
                        class="inline-block w-full rounded-lg bg-blue-600 px-[0.85rem] py-[0.4rem] text-center text-[0.9rem] text-white no-underline hover:bg-blue-700 md:w-auto"
                    >
                        Registro
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex flex-1 items-center justify-center px-4 py-10">
        <div class="w-full max-w-md rounded-[14px] bg-white px-7 py-8 text-center shadow-[0_12px_32px_rgba(17,24,39,0.08)]">
            @yield('content')
        </div>
    </main> 

    <footer class="bg-gray-900 px-4 py-4 text-center text-[0.85rem] text-gray-400">
        <p class="m-0">&copy; {{ date('Y') }} {{ config('app.name') }} — Todos los derechos reservados.</p>
    </footer>
</body>
</html>

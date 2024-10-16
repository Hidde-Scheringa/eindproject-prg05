<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <header>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <main>
                        <div class="text-center mt-6">
                            <h2 class="text-gray-600">Welkom bij je dashboard! Hier kun je je spellen beheren.</h2>
                        </div>

                        <div class="overflow-x-auto mt-4">
                            <table class="min-w-full border-collapse border border-gray-200">
                                <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Naam</th>
{{--                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Speeltijd</th>--}}
                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Uitgever</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Cover Afbeelding</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($games as $game)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border border-gray-300 px-4 py-2">{{$game->name}}</td>
{{--                                        <td class="border border-gray-300 px-4 py-2">{{$game->playtime}} uur</td>--}}
                                        <td class="border border-gray-300 px-4 py-2">{{$game->publisher}}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <a href="{{route('games.show', $game->id)}}">
                                                <div class="w-32 h-48 overflow-hidden">
                                                    <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover" />
                                                </div>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </main>

    </body>
</html>

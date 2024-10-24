<x-html-head/>
<body>
<div class="bg-gray-800 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold">Game Dashboard</h1>
        <div class="flex space-x-4">
            <form action="/profile" method="GET" class="inline">
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-200">Profiel</button>
            </form>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-500 transition duration-200">Uitloggen</button>
            </form>
        </div>
    </div>
</div>

<div class="text-center mt-6">
    <h2 class="text-gray-600">Welkom bij je dashboard! Hier kun je je spellen beheren.</h2>
    <form class="max-w-lg mx-auto my-10">
        @csrf
        <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-4-4m0-7a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="search" name="search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
            <button type="submit" class="absolute right-2.5 bottom-2.5 bg-blue-600 text-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>
    <a href="{{ route('games.create') }}">Create game</a>
</div>

<div class="overflow-x-auto mt-4">
    <table class="min-w-full border-collapse border border-gray-200">
        <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Naam</th>
{{--            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Speeltijd</th>--}}
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Uitgever</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Cover Afbeelding</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Genres</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Schrijf een review.</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($games as $game)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2">{{$game->name}}</td>
{{--                <td class="border border-gray-300 px-4 py-2">{{$game->playtime}} uur</td>--}}
                <td class="border border-gray-300 px-4 py-2">{{$game->publisher}}</td>
                <td class="border border-gray-300 px-4 py-2">
                   <a href="{{route('games.show', $game->id)}}">
                        <div class="w-32 h-48 overflow-hidden">
                            <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover" />
                        </div>
                   </a>
                </td>
                <td>
                    @foreach($game->genres as $genre)
                        {{ $genre->name }}
                    @endforeach
                </td>
                <td class="border border-gray-300 px-4 py-2">
                    <a href="{{route('review', $game->id)}}">
                        Create review
                    </a>
                </td>
                @endforeach
            </tr>

        </tbody>
    </table>
</div>
</body>
</html>

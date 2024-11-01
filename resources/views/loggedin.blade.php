<x-html-head/>
<body class="bg-gray-100">
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

<div class="container mx-auto py-10">
    <h2 class="text-2xl font-semibold text-center text-gray-700 mb-6">Welkom bij je dashboard! Hier kun je jouw spellen beheren.</h2>

    <x-filtre-system/>

    <div class="flex justify-center space-x-4 mb-8">
        <div class="mb-4">
            <a href="{{ route('games.index') }}">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                    Alle Games
                </button>
            </a>
        </div>

        @foreach($genres as $genre)
            <a href="{{ route('games.genrefilter', ['genre_id' => $genre->id]) }}">
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">{{ $genre->name }}</button>
            </a>
        @endforeach
        <a href="{{ route('games.create') }}">
            <button type="button" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition duration-200">Create game</button>
        </a>
    </div>



    <!-- Games Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($games as $game)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <a href="{{ route('games.show', $game->id) }}">
                    <div class="w-full h-85">
                        <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover">
                    </div>
                </a>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $game->name }}</h3>
                    <p class="text-gray-600 mt-1">Uitgever: {{ $game->publisher }}</p>
                    <div class="mt-2 text-sm text-gray-500">
                        Genre:
                        @foreach($game->genres as $genre)
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2">{{ $genre->name }}</span>
                        @endforeach
                    </div>
                    <a href="{{ route('review', $game->id) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-200">
                        Schrijf een review
                    </a>
                    @if ($game->user_id === auth()->id() && $userCanEdit)
                        <a href="{{ route('games.edit', $game->id) }}" class="mt-2 inline-block bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition duration-200">
                            Edit deze game
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>

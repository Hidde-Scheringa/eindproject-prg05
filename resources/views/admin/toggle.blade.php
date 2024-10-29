<x-html-head />
<body class="bg-gray-100">
<div class="bg-gray-800 text-white py-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-bold">Admin Toggle Dashboard</h1>
        <div class="flex space-x-4">
            <a href="{{ route('dashboard') }}" class="inline-block bg-gray-700 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                Admin Dashboard
            </a>
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




<body class="bg-gray-100">
<main class="container mx-auto px-4">
    <div class="text-center mt-6">
        <h2 class="text-lg text-gray-600 font-semibold">Publiceer de gemaakte posts</h2>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border-collapse border border-gray-200 bg-white shadow-lg rounded-lg">
            <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2 text-left text-gray-700 font-semibold">Naam</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-gray-700 font-semibold">Uitgever</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-gray-700 font-semibold">Cover Afbeelding</th>
                <th class="border border-gray-300 px-4 py-2 text-left text-gray-700 font-semibold">Actie</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($games as $game)
                <tr class="hover:bg-gray-50 transition duration-200">
                    <td class="border border-gray-300 px-4 py-2">{{ $game->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $game->publisher }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('games.show', $game->id) }}">
                            <div class="w-32 h-48 overflow-hidden">
                                <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover rounded-md shadow-md" />
                            </div>
                        </a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2 flex items-center space-x-2">
                        <form action="{{ route('admin.post-manager', $game->id) }}" method="post" class="inline">
                            @csrf
                            <button type="submit" class="{{ $game->verified ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} text-white px-4 py-2 rounded transition duration-200">
                                {{ $game->verified ? 'Unpublish' : 'Publish' }}
                            </button>
                        </form>
                        <form action="{{ route('admin-games.destroy', $game->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded transition duration-200">
                                Verwijder
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</main>
</body>

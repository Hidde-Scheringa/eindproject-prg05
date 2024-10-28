<x-html-head/>
<h1 class="text-3xl font-bold text-center mt-6">Admin Toggle Dashboard</h1>
<body class="bg-gray-100">
<main class="container mx-auto px-4">
    <div class="text-center mt-6">
        <h2 class="text-lg text-gray-600">Publiceer de gemaakte posts</h2>
    </div>

    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border-collapse border border-gray-200 bg-white shadow-lg">
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
                                <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover" />
                            </div>
                        </a>
                    </td>
                    <td class="border border-gray-300 px-4 py-2">
                        <form action="{{ route('admin.post-manager', $game->id) }}" method="post">
                            @csrf
                            <button type="submit" class="{{ $game->verified ? 'bg-red-500 hover:bg-red-600' : 'bg-green-500 hover:bg-green-600' }} text-white px-4 py-2 rounded transition duration-200">
                                {{ $game->verified ? 'Unpublish' : 'Publish' }}
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

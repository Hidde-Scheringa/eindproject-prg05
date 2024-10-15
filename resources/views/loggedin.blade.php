<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
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
</div>

<div class="overflow-x-auto mt-4">
    <table class="min-w-full border-collapse border border-gray-200">
        <thead>
        <tr class="bg-gray-100">
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Naam</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Speeltijd</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Uitgever</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">Cover Afbeelding</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-gray-700">ID</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($games as $game)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2">{{$game->name}}</td>
                <td class="border border-gray-300 px-4 py-2">{{$game->playtime}} uur</td>
                <td class="border border-gray-300 px-4 py-2">{{$game->publisher}}</td>
                <td class="border border-gray-300 px-4 py-2">
                    <div class="w-32 h-48 overflow-hidden">
                        <img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }}" class="w-full h-full object-cover" />
                    </div>
                </td>
                <td class="border border-gray-300 px-4 py-2">{{$game->id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

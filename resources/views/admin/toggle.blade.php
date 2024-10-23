<x-html-head/>
<h1>Admin toggle dashboard</h1>
<body>
    <main>
        <div class="text-center mt-6">
            <h2 class="text-gray-600">Publish de gemaakte posts</h2>
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
                        <td>
                            <form action="{{route('admin.post-manager', $game->id)}}" method="post" >
                                @csrf
                                <button type="submit">
                                    {{$game->verified ? 'Unpublish': 'Publish'}}
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

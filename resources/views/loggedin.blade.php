<h1>Je bent ingelogged en ziet dit geheime bericht</h1>
<x-logout-and-profilesetting>

</x-logout-and-profilesetting>

@foreach ($games as $game)
    <tr>
        <td>{{$game->name}}</td>
        <td>{{$game->playtime}} uur</td>
        <td>{{$game->publisher}}</td>
        <td><img src="{{ $game->cover_image }}" alt="Cover Image of {{ $game->name }} " style="width: 150px; height: 200px; object-fit: cover;" /></td>
        <td>{{$game->id}}</td>


    </tr>
@endforeach


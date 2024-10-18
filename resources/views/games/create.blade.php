<form action="{{route('games.store')}}" method="post">
    @csrf
    <div>
{{--        <label for="name">name</label>--}}
{{--        <input type="text" id="name" name="name"/>--}}
        <x-input-label name="name">Name</x-input-label>
        <x-text-input name="name" id="name"/>
    </div>
    <div>
        <label for="publisher">Publisher</label>
        <x-text-input name="publisher" id="publisher"/>
    </div>
{{--    <div>--}}
{{--        <x-input-label for="playtime">playtime</x-input-label>--}}
{{--        <x-text-input type="number" id="playtime"></x-text-input>--}}
{{--    </div>--}}
    <div>
        <label for="cover_image">Cover art</label>
        <x-text-input name="cover_image" id="cover_image"/>
    </div>
    <x-primary-button type="submit">create</x-primary-button>
</form>

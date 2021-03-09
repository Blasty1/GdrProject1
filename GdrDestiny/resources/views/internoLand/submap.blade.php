@extends('layouts.appInterno')
@section('content')
<img src="/img/imgHomeInterna/maps/{{ $map->name }}.png" alt="" id='mappa' >
<div id='subIcons'>
    @foreach ($mapchilds as $submap)

        <a href="{{ route('bottommap',[$map->id,$submap->id]) }}"><img src="/img/imgHomeInterna/home/Icone/map_&_chat/iconasottochatcittà.png" class='map' alt="" id='Map-{{$submap->id}}'></a>
    
    @endforeach

    
    @foreach ($chats as $chat)
        @if($chat->visibility === 'no')

            <a href=""><img src="/img/imgHomeInterna/home/Icone/map_&_chat/iconachat.png" alt="" id='Chat-{{$chat->id}}'></a>

        @else 

            <a href=""><img src="/img/imgHomeInterna/home/Icone/map_&_chat/iconainvisibile.png" alt="" id='Chat-hidden-{{$chat->id}}'></a>

        @endif
        
    
    @endforeach

</div>


@endsection
@extends('./layouts/appIscrizione')
@section('content')
<form action="{{route('register',['razza' => $RazzaId,'emisfero' => $EmisferoId,'sesso' => $Sesso,'token' => $token])}}" method="POST"
    id="form1">
    @csrf
    <div class="DivPrincipale">
        <img class='sfondo' src="/img/imgHomeEsterna/imgIscrizione/Fase1.png" alt="">
        <input type="text" name="name" class='inputTextRegistrazione' id='firstChild'>
        <input type="text" name="cognome" class='inputTextRegistrazione' id='secondChild'>
        <input type="text" name="email" class='inputTextRegistrazione' id='thirdChild'>
        <select name="nazionalità" id="fourthChild" class='inputTextRegistrazione'>
            @foreach($statiOptions as $state)
            <option value="{{ $state }}">{{ $state }}</option>
            @endforeach
        </select>
    <input type="hidden" name="token" value="{{ $token }}">
        <button type="submit" id='entra' form="form1"><span><img src="/img/imgHomeEsterna/imgIscrizione/siclick.png"
                    alt=""></span></button>
    </div>
</form>
@endsection

@section('modal')
<script>
@if(!$errors->any())
new Finestra('{{ json_encode($textModal) }}',true, 'Accetta le condizioni')
@else
new Finestra('{{  json_encode($errors->all()) }}')
@endif
</script>
@endsection
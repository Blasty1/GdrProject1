<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/loginWelcome2.css">
    <script src="/js/HomeEsterna/poupUp.js"></script>
</head>

<body>
    <section>
        <img id='sfondo' src="/img/imgHomeEsterna/sfondo.png" alt="">
        <div class="ContainerCentrale">
            <div class="circonferenzaBlu">
                <img src="/img/imgHomeEsterna/circonferenza.png" alt="">
            </div>
            <div class="loginButton">
                <a href="{{route('login')}}" id='loginText'><img  src="/img/imgHomeEsterna/login.png" alt=""></a> 
            </div>
            <img id='PersonaggioCentrale' src="/img/imgHomeEsterna/centralpg.png" alt="">

        </div>
        <div class="title">
            <img src="/img/imgHomeEsterna/titleHome.png" alt="">
        </div>
        <div class="SezioniHome titoloSinistra">
            <img src="/img/imgHomeEsterna/sxsimbolo.png" class='symbol_alti' alt="">
           <a href="{{route('registrati1')}}"><img src="/img/imgHomeEsterna/iscrizione.png"></a>
        </div>
        <div class="SezioniHome titoloDestra">
            <img src="/img/imgHomeEsterna/dxtsimbolo.png" class='symbol_alti' alt="">
            <a href="{{ route('ambientazione') }}"><img src="/img/imgHomeEsterna/ambientazione.png" alt=""></a>
        </div>
        <div class="ContainerSinistra">
           <a href="{{ route('regolamento') }}"><img src="/img/imgHomeEsterna/regolamento.png" alt="" class='symbol_bassi'></a> 
            <img src="/img/imgHomeEsterna/sxpg.png" alt="" class='personaggi'>
        </div>
        
        <div class="ContainerDestra">
            <a href=""> <img src="/img/imgHomeEsterna/credits.png" alt="" class='symbol_bassi'></a>
            <img src="/img/imgHomeEsterna/dxpg.png" alt="" class='personaggi'>
        </div>
    </section>
</body>

</html>
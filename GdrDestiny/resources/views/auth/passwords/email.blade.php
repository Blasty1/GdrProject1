<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/loginWelcome2.css">
    <link rel="stylesheet" href="/css/modal/modal.css">
    
    <script src="/js/HomeEsterna/modal.js"></script>


<body>
    <section>

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <img id='sfondo' src="/img/imgHomeEsterna/sfondo.png" alt="">
            <div class="ContainerCentrale login">
                <div class="circonferenzaBlu login">
                    <img src="/img/imgHomeEsterna/login/loginprovarw.png" id='sferaRossa' alt="">
                    <div class="loginImages">
                        <img src="/img/imgHomeEsterna/imgResetPassword/email.png" alt=""><input type="email" name="email" class="LoginInput name">
                        <button type='submit'><img src="/img/imgHomeEsterna/login/loginconferma.png" alt="" class='buttonLogin'></button>
                    </div>
                </div>


            </div>
        </form>
    </section>
    <script>
@if($errors->any())

new Finestra("{{ json_encode($errors->all()) }}",null, 'Errore Durante il recupero password')
@elseif(session('status'))

new Finestra("{{ json_encode('Email Inviata, controlla la tua posta.') }}", 'no', 'Richiesta inoltrata con successo')
@endif
</script>
</body>

</html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaInterna/home.css">
    <script src="/js/HomeEsterna/modal.js"></script>
    <script src="/js/HomeInterna/home.js"></script>
</head>

<body>
    <section>
        <div class="menuTop">
            <ul class='listMenu'>
                <li><a href="#" ><img data-number=1 src="/img/imgHomeInterna/home/archivi.png" alt=""></a></li>
                <li><a href="#" ><img data-number=2 src="/img/imgHomeInterna/home/presenti.png" alt=""></a></li>
                <li><a href="#" ><img data-number=3 src="/img/imgHomeInterna/home/rimnet.png" alt=""></a></li>
                <li id='ghost'><img src="/img/imgHomeInterna/home/ghost.png" alt=""></li>
                <li><a href="#" ><img data-number=4 src="/img/imgHomeInterna/home/schedapg.png" alt=""></a></li>
                <li><a href="#" ><img data-number=5 src="/img/imgHomeInterna/home/rymzody.png" alt=""></a></li>
                <li><a href="#" ><img data-number=6 src="/img/imgHomeInterna/home/rymzody.png" alt=""></a></li>

            </ul>
        </div>
        <div class="contenitoreMappa">
        <div class="mappaDiv">
        @yield('content')
        <img src="/img/imgHomeInterna/home/messaggioff.png" id='messaggi' alt="">
        </div>   

        </div>
    </section>

</body>
<script>
changeGhostHome();
</script>
</html>
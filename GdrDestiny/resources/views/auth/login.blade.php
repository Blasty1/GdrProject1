<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/SitoFacciaEsterna/login.css">
</head>

<body>
<section>


    <form method="POST" action="{{ route('login') }}">
        @csrf
    </form>
</section>
</body>

</html>
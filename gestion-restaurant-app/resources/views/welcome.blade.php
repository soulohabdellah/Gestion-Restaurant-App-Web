<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

      
    </head>
    <body class="antialiased">
    @if(DB::connection()->getDatabaseName())
    <p>Connexion à la base de données réussie.</p>
    @else
    <p>La connexion à la base de données a échoué.</p>
    @endif

    </body>
</html>

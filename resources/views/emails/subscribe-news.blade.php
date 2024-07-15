<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Subscribe Email</title>

        <style>

            h1 {
                color: blueviolet;
                font-size: large;
                text-align: center
            }

        </style>

    </head>

    <body>
        
        <h1>{{ config('app.name') }}</h1>

        <h2>Thank you for subscribing!</h2>
        <p>We have successfully received your subscription request with the email: {{ $email }}</p>

    </body>

</html>
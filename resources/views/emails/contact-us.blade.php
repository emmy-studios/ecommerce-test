<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Contact Us Email</title>

        <style>

            h1 {
                color: blueviolet;
                font-size: large;
                text-align: center
            }

        </style>

    </head>

    <body>
        
        <h1>Contact Us Message</h1>
        <br>
        <br>
        
        <p><strong>Name: </strong>{{ $data['name'] }}</p>
        <p><strong>Email: </strong>{{ $data['email'] }}</p>
        <p><strong>Message: </strong>{{ $data['message'] }}</p>

    </body>

</html>
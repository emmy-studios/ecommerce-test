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

            h2, h3 {
                font-size: xx-large;
                text-align: center
            }
            span {
                font-size: large;
            }

        </style>

    </head>

    <body>
        
        <h1>{{ $data['website_name'] }}</h1>

        <h2>New Order Made!</h2>

        <p>
            The user <span>{{ $data['first_name'] }} {{ $data['last_name'] }}</span> has made a new order.
        </p>

        <h3>Order Resume</h3>
        <p>
            <span>Username: </span> {{ $data['username'] }}
        </p>
        <p>
            <span>First Name: </span> {{ $data['first_name'] }}
        </p>
        <p>
            <span>Last Name: </span> {{ $data['last_name'] }}
        </p>
        <p>
            <span>Customer Email: </span> {{ $data['email'] }}
        </p>
        <p>
            <span>Customer Phone: </span> {{ $data['user_phone'] }}
        </p>
        <p>
            <span>Order Code: </span> {{ $data['order_code'] }}
        </p>
        <p>
            <span>Order Sub Total: </span> ${{ $data['order_subtotal'] }}
        </p>
        <p>
            <span>Order Total: </span> ${{ $data['total'] }}
        </p>

        <p>
            Please, check the admin dashboard or the database record to verifyed and continue the process.
        </p>

    </body>

</html>
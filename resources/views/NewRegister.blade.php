<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .is-invalid
            {
                border: 2px solid #f00;
            }
        </style>
    </head>
    <body>
        <div>
            <form action="/api/register" method="POST">
                <br>
                Name : <input id="name" type="text" name = "name" class="@if(isset($message['name'])) is-invalid @endif"><br>
                Email : <input id="email" type="text" name = "email" class="@if(isset($message['email'])) is-invalid @endif"><br>
                Password : <input id="password" type="password" name = "password" class="@if(isset($message['password'])) is-invalid @endif"><br>
                @if($errors)
                    @foreach ($message as $messageValue)
                        <div class="alert alert-danger"><?=$messageValue[0];?></div>
                    @endforeach
                 @endif
                <input type = "submit" value = "submit" />
            </form>
        </div>
    </body>
</html>

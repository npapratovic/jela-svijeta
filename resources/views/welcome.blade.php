<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div>
                     <h3>Primjeri API endpointa:</h3>  
                </div>

                <div >
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/meals">get_meals: http://localhost:8000/api/v1/meals</a> <br />
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/categories">get_categories: http://localhost:8000/api/v1/categories</a> <br />
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/tags">get_tags: http://localhost:8000/api/v1/tags</a> <br />
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/ingredients">get_ingredients: http://localhost:8000/api/v1/ingredients</a> <br /> 
                 
                
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/meals?id=2">get_meal_by_id: http://localhost:8000/api/v1/meals?id=2</a> <br />
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/meals?limit=3">per_page = 3: http://localhost:8000/api/v1/meals?limit=3</a> <br />
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/meals?limit=3&page=2">3 po stranici, druga stranica: http://localhost:8000/api/v1/meals?limit=3&page=2</a> <br />
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/meals?category_id=2">category: http://localhost:8000/api/v1/meals?category_id=2</a> <br /> 
                    <a style="font-weight: 700; font-size: 14px; text-decoration: none;" href="http://localhost:8000/api/v1/meals?language_id=2">language_id: http://localhost:8000/api/v1/meals?language_id=2</a> <br /> 
                </div>
            </div>
        </div>
    </body>
</html>

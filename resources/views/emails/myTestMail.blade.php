<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ $details['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-top: 40px;
        }

        h2 {
            color: #333;
            margin-top: 20px;
        }

        h3 {
            color: #777;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
            margin-top: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        li span {
            font-weight: bold;
            margin-right: 5px;
        }

        .thank-you {
            text-align: center;
            margin-top: 40px;
            color: #777;
        }
    </style>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <h3>{{ $details['body'] }}</h3>

    <h2>Produse</h2>
    <ul>
        @foreach ($cartItems as $product)
        <li>
            <span>{{ $product['Denumire'] }}</span>
            <span>{{ $product['Pret'] }} lei</span>
        </li>
        @endforeach
    </ul>

    <div class="thank-you">
        Multumim!
    </div>
</body>

</html>

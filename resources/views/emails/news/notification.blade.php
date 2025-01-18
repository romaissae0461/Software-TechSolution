<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->titre }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #2c3e50;
        }
        .content {
            margin: 20px 0;
        }
        .footer {
            background-color: #2c3e50;
            color: #fff;
            padding: 10px;
            text-align: center;
            font-size: 12px;
            border-radius: 8px;
        }
        .footer a {
            color: #ecf0f1;
            text-decoration: none;
        }
        
        .date {
            font-size: 14px;
            color: #95a5a6;
        }
        .views {
            font-size: 14px;
            color: #95a5a6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $news->titre }}</h1>
        <div class="content">
            <p>{{ $news->contenu }}</p>
        </div>
        
        <div class="footer">
            <p>For more updates, visit <a href="{{ url('/') }}">our website</a></p>
        </div>
    </div>
</body>
</html>

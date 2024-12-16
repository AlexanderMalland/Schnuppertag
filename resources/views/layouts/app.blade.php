<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Job Management')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }
        .header {
            padding: 20px;
            background: #34495e;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header .home-btn {
            text-decoration:none;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
            padding: 5px 15px;
            background-color: #2c3e50;
            border-radius: 5px;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            text-align: center;
            background: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }
        .btn {
            padding: 10px 20px;
            background: #34495e;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            margin: 5px;
        }
        .btn:hover {
            background: #2c3e50;
        }
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #34495e;
            color: white;
        }
        html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }
    .container {
        flex: 1;
    }
    footer {
        background: #34495e;
        color: white;
        text-align: center;
        padding: 20px;
    }
    </style>
</head>
<body>
    <div class="header">
        <a href="/" class="home-btn">Home</a>
        <span>Job Management System</span>
    </div>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        <p>&copy; 2024 Job Management System</p>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard </title>
    <link rel="icon" type="image/png"
        href="https://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Drive-Forms-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <style>
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 300px;
            background-color: rgb(3 36 64);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 30px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 1);
        }

        .sidebar h1 {
            color: #ECF0F1;
            text-align: center;
            margin-bottom: 40px;
            font-size: 30px;
        }

        .sidebar a {
            text-decoration: none;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            color: #ECF0F1;
        }

        .sidebar a button {
            display: flex;
            gap: 10px;
            align-items: center;
            width: 200px;
            padding: 15px;
            margin: 12px;
            background-color: #3498DB;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
            transition: 0.5s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 1);
        }

        .sidebar a button i {
            margin-right: 10px;
        }

        .sidebar a button:hover {
            transform: scale(1.05);
            color: rgba(0, 0, 0, 0.452);

        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <h1>DASHBOARD</h1><br><br>

        <a href="{{ url('/users') }}">
            <button><i class="fas fa-user"></i><span>USERS</span></button>
        </a>

        <a href="{{ url('/businesses') }}">
            <button><i class="fas fa-briefcase"></i><span>BUSINESSES</span></button>
        </a>

        <a href="{{ url('/locations') }}">
            <button><i class="fas fa-map-marker-alt"></i><span>LOCATIONS</span></button>
        </a>

       
    </div>

</body>

</html>

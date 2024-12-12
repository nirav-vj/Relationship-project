@include('dashboard')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Index</title>
    <link rel="icon" type="image/png"
        href="https://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Drive-Forms-icon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e0e0ee;


        }

        .container {
            width: 75%;
            margin-left: 16%;

        }

        .logo {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
            z-index: -1;

        }

        .logo a {
            display: inline-block;
            padding: 5px;
            border: 2px dashed black;
            text-align: center;
            color: black;
            margin-right: 3px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
            z-index: -1;

        }

        th,
        td {
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        td {
            background-color: rgba(255, 255, 255, 0.8);
            border-bottom: 1px solid rgba(0, 0, 0, 0.274);
            height: 60px;

        }

        td a {
            color: black;
            font-size: 18px;
            margin: 0 10px;
            text-decoration: none;
        }

        td a:hover {
            color: red;
        }

        /* Action column icons */
        .action-icons {
            display: flex;
            justify-content: center;
        }

        .action-icons a {
            margin: 10px 20px;
            transition: color 0.3s ease;
        }

        .container tr:nth-child(even) {
            background-color: #cacaca;
        }


        /* Responsive design */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            th,
            td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div
            style="background-color: #ffffff;width: 74.3%;height: 7%;position: fixed; border-radius: 15px;top:34px ;display:flex;z-index: +1;">
            <h3
                style="font: italic small-caps bold 35px/1.2 Georgia, serif;justify-content: center;
                        text-align: center;margin: auto;">
                Users
            </h3>
        </div>
        <div style="margin-top: 125px;">


            <div class="logo" style=" display: flex;gap: 10px;">
                <div>
                    <a href="/user/create"><i class="fa-solid fa-plus"></i></a>
                </div>
                <div>
                    <a href="/user/trash">Go-To-Bin</a>
                </div>
            </div> 



            <table style="margin-top: 30px;">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th colspan="2">Action</th>
                </tr>
                <tbody >
                    <?php $i = 1; ?>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $user->user_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="action-icons">
                                <a href="{{ url('/user/edit/') }}/{{ $user->id }}"><i
                                        class="fa-regular fa-pen-to-square" style="color: blue;"></i></a>
                                <a href="{{ url('/user/delete/') }}/{{ $user->id }}"><i class="fa-solid fa-trash"
                                        style="color: red;"></i></a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

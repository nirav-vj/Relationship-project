@include('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Business Index</title>
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
            padding: 20px;
            background-color: #e0e0ee;
            margin-left: 15%;
        }

        .container {
            width: 90%;
            margin: auto;
        }

        .logo {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 30px;
            z-index: -1;
        }

        .logo a {
            display: inline-block;
            padding: 5px;
            border: 2px dashed black;
            text-align: center;
            color: black;
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
            border-bottom: 1px solid rgba(0, 0, 0, 0.171);
            height: 60px;

        }

        td a {
            color: black;
            font-size: 20px;
            text-decoration: none;
        }

        td a:hover {
            color: red;
        }


        .action-icons a {
            margin: 27px;   
            transition: color 0.3s ease;
        }

        .container tr:nth-child(even) {
            background-color: #cacaca;
        }



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
            style="background-color: #ffffff;width: 74.3%;height: 7%;position: fixed; border-radius: 15px;top:30px ;display:flex;z-index: +1;">
            <h3
                style="font: italic small-caps bold 35px/1.2 Georgia, serif;justify-content: center;
                        text-align: center;margin: auto auto;">
                Bin Box
            </h3>
        </div>

        <div style="margin-top: 100px;">

            <div class="logo" style=" display: flex;gap: 10px;">
                <div>
                    <a href="/businesses">Businesses</a>
                </div>
                
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>File</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th style="flex-wrap: wrap ;">location Name</th>
                        <th>Address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($businesss as $business)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                <img src="{{ $business->file }}" alt="no image"
                                    style="height: 60px; width: 60px; object-fit: cover; border-radius: 50%;">
                            </td>
                            <td>{{ $business->business_name }}</td>
                            <td>{{ $business->email }}</td>
                            <td>{{ $business->user->user_name }}</td>
                            <td>
                                @foreach ($business->locations as $location)
                                    {{ $location->location_name }},
                                @endforeach
                            </td>
                            <td>{{ $business->address }}</td>
                            <td class="action-icons" >
                                <a href="{{ url('/business/restore/') }}/{{ $business->id }}"><i
                                        class="fa-solid fa-arrows-rotate" style="color: blue;"></i></a>
                                <a href="{{ url('/business/force-delete/') }}/{{ $business->id }}"><i
                                        class="fa-solid fa-trash" style="color: red;"></i></a>
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

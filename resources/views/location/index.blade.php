    @include('dashboard')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Location Index</title>
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
                margin: auto;
                margin-left: 20.3%;

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
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background-color: white;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1);
                z-index: -1;
                margin-left: 3px;

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
                margin: 20px;
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
                style="position: fixed;height: 7%;width: 74.5%;background-color: white;border-radius: 15px;z-index: +1;margin-top: 25px;margin-left: 2.5px">
                <h1
                    style="font: italic small-caps bold 30px/35px Georgia, serif;justify-content: center;text-align: center;margin-top: 13px;">
                    Locations
                </h1>
            </div>

            <div style="margin-top: 125px;">

                <div class="logo" style=" display: flex;gap: 13px;">
                    <div>
                        <a href="/location/create"><i class="fa-solid fa-plus"></i></a>
                    </div>
                    <div>
                        <a href="/location/trash">Go-To-Bin</a>
                    </div>
                </div>


                <table style="margin-top: 30px;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Business-Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($locations as $location)
                            <tr>
                                <td>{{ $i }}</td>

                                <td>{{ $location->location_name }}</td>
                                
                                @if ($location->business->count() > 0)
                                    @foreach ($location->business as $business)
                                        <td>{{ $business->business_name ?? "" }}</td>
                                    @endforeach
                                @else
                                    <td></td>
                                @endif
                                <td>{{ $location->email }}</td>
                                <td>{{ $location->address }}</td>
                                <td class="action-icons">
                                    <a href="{{ url('/location/edit/') }}/{{ $location->id }}"><i
                                            class="fa-regular fa-pen-to-square" style="color: blue;"></i></a>
                                    <a href="{{ url('/location/delete/') }}/{{ $location->id }}"><i
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

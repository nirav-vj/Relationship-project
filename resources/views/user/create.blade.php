@include('dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <link rel="icon" type="image/png"
        href="https://icons.iconarchive.com/icons/alecive/flatwoken/512/Apps-Google-Drive-Forms-icon.png">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            font-family: 'Georgia', serif;
            background-color: #e0e0ee;
        }

        .container {
            position: fixed;
            width: 90%;
            max-width: 400px;
            background-color: #f5f5fa;
            border-radius: 25px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            margin-left: 10%;
        }

        .container form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            font-weight: bold;
            font-size: 16px;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 2px solid #333;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s ease;
        }



        .form-group span {
            color: red;
            font-size: 14px;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #007bff;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            .submit-btn {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="{{ url('/user') }}" enctype="multipart/form-data" method="post">
            @csrf
            <div>
                <h1 style="font: italic small-caps bold 35px/1.2 Georgia, serif;border-bottom: 2px solid black">Create
                    New User </h1><br><br>
            </div>
            <div class="form-group">
                <label for="name" class="user_name"> Name : </label>
                <span>
                    @error('user_name')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" name="user_name">
            </div>

            <div class="form-group">
                <label for="email" class="user_name"> Email : </label>
                <span>
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" name="email">
            </div>

            <div class="form-group">
                <label for="password" class="user_name"> Password : </label>
                <span>
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
                <input type="password" name="password">
            </div>

            <button type="submit" class="submit-btn">Submit</button>
        </form>
    </div>
</body>

</html>

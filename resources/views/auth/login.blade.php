<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #1a73e8;
            border: none;
            border-radius: 6px;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background: #0f5ccb;
        }
        .error {
            background: #ffdddd;
            padding: 10px;
            border-left: 4px solid #ff5555;
            margin-bottom: 15px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

    <div class="login-box">

        <h2>Login</h2>

        @if ($errors->any())
            <div class="error">
                <strong>Email atau password salah</strong>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit">Masuk</button>
        </form>

    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Government Login - JobQuest Virtual Job Fair</title>
    <link href="https://fonts.googleapis.com/css?family=Inter:400,600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background: #f2f6fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .login-container img {
            max-width: 140px;
            margin-bottom: 20px;
        }
        .login-container h2 {
            margin-bottom: 10px;
            color: #004785; /* JobQuest Blue */
        }
        .login-container p {
            margin-bottom: 30px;
            color: #555;
        }
        .form-group {
            text-align: left;
            margin-bottom: 20px;
        }
        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #333;
        }
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .btn-login {
            width: 100%;
            padding: 12px;
            background-color: #2eb85c; /* JobQuest green */
            color: #fff;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-login:hover {
            background-color: #28a94f;
        }
        .error-msg {
            color: red;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{ asset('images/jobquest-logo.png') }}" alt="JobQuest Logo">
        <h2>Government Login</h2>
        <p>Login as DOLE or PESO representative</p>

        @if(session('error'))
            <div class="error-msg">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('government.login.submit') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input id="email" type="email" name="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Job Fair Platform</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: #fdf7f3;
            color: #333;
        }

        .header {
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            background-color: transparent;
        }

        .header img {
            height: 60px;
        }

        .header h2 {
            margin: 0;
            font-size: 1.8rem;
            color: #1d4ed8; /* JobQuest Blue */
            text-align: right;
            flex: 1;
        }

        .container {
            padding: 2rem;
            text-align: center;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #16a34a; /* JobQuest Green */
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        a.button {
            display: inline-block;
            background-color: #f97316; /* JobQuest Orange */
            color: white;
            padding: 0.75rem 1.5rem;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #ea580c;
        }

        @media (max-width: 640px) {
            .header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }

            .header h2 {
                margin-top: 1rem;
                text-align: left;
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{ asset('images/jobquest-logo.png') }}" alt="JobQuest Logo">
        <h2>Welcome to JobQuest Virtual Job Fair</h2>
    </div>

    <div class="container">
        <h1>Start Your Career Journey</h1>
        <p>Connect with top employers, explore opportunities, and build your future — all in one virtual space.</p>
        <a href="{{ route('login') }}" class="button">Get Started</a>
    </div>

</body>
</html>

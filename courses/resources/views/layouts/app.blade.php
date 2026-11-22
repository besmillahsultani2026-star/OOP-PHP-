<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Student Authentication')</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 40px 16px;
        }

        .container {
            max-width: 440px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 8px;
        }

        label {
            display: block;
            margin-top: 16px;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border: 1px solid #aaa;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #1769aa;
            color: white;
            border: 0;
            border-radius: 4px;
            cursor: pointer;
        }

        .errors {
            background: #fff0f0;
            color: #a10000;
            padding: 12px;
        }

        .success {
            background: #eaf8ed;
            color: #17652a;
            padding: 12px;
        }
    </style>
</head>
<body>
    <main class="container">
        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
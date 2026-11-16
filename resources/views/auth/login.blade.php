<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #FFF9F5;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #493941;
        }

        .layout {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .visual {
            background: #F3DDE3;
            padding: 65px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand {
            font-family: 'DM Serif Display', serif;
            font-size: 38px;
            color: #684653;
        }

        .brand small {
            display: block;
            font: 10px 'Plus Jakarta Sans';
            letter-spacing: 3px;
        }

        .visual h1 {
            font: 58px 'DM Serif Display', serif;
            font-weight: 400;
            line-height: 1.15;
            color: #684653;
        }

        .visual p {
            font-size: 12px;
            line-height: 2;
            color: #806F75;
        }

        .form-side {
            display: grid;
            place-items: center;
            padding: 40px;
        }

        .form-box {
            width: 100%;
            max-width: 390px;
        }

        h2 {
            font: 42px 'DM Serif Display', serif;
            font-weight: 400;
            color: #684653;
            margin: 0 0 12px;
        }

        .subtitle {
            font-size: 12px;
            color: #8C7B81;
            margin-bottom: 35px;
        }

        label {
            display: block;
            font-size: 11px;
            margin-bottom: 9px;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #E7D8DE;
            background: white;
            border-radius: 5px;
            font: 12px 'Plus Jakarta Sans';
            margin-bottom: 20px;
            outline: none;
        }

        input:focus {
            border-color: #D98FA6;
        }

        button {
            width: 100%;
            padding: 16px;
            border: 0;
            border-radius: 5px;
            background: #684653;
            color: white;
            font: 12px 'Plus Jakarta Sans';
            cursor: pointer;
        }

        button:hover {
            background: #BD718B;
        }

        .error {
            color: #B94C66;
            font-size: 11px;
            margin: -12px 0 15px;
        }

        .bottom {
            margin-top: 25px;
            text-align: center;
            font-size: 11px;
            color: #8C7B81;
        }

        .bottom a {
            color: #BD718B;
        }

        .back {
            display: block;
            margin-top: 25px;
            text-align: center;
            color: #8C7B81;
            font-size: 11px;
            text-decoration: none;
        }

        @media(max-width: 750px) {
            .layout {
                grid-template-columns: 1fr;
            }

            .visual {
                display: none;
            }

            .form-side {
                min-height: 100vh;
                padding: 25px;
            }
        }
    </style>
</head>

<body>
    <div class="layout">
        <section class="visual">
            <a href="/" class="brand" style="text-decoration:none">
                SABITA
                <small>SAHABAT IBU & BALITA</small>
            </a>

            <div>
                <h1>Merawat dengan cinta,<br>tumbuh dengan bahagia.</h1>
                <p>Selamat datang kembali di ruang kesehatan ibu dan anak.</p>
            </div>

            <p>© {{ date('Y') }} SABITA</p>
        </section>

        <section class="form-side">
            <div class="form-box">
                <h2>Selamat datang.</h2>
                <p class="subtitle">Masuk untuk melanjutkan perjalanan bersama SABITA.</p>

                @if ($errors->any())
                    <div class="error">{{ $errors->first() }}</div>
                @endif

                <form action="{{ route('login.post') }}" method="POST">
                    @csrf

                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                        required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Masukkan password" required>

                    <button type="submit">Masuk</button>
                </form>

                <div class="bottom">
                    Belum memiliki akun?
                    <a href="{{ route('register') }}">Daftar sekarang</a>
                </div>

                <a href="/" class="back">Kembali ke homepage</a>
            </div>
        </section>
    </div>
</body>

</html>

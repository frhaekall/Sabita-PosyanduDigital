<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar | SABITA</title>

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
            font: 38px 'DM Serif Display', serif;
            color: #684653;
        }

        .brand small {
            display: block;
            font: 10px 'Plus Jakarta Sans';
            letter-spacing: 3px;
        }

        .visual h1 {
            font: 58px 'DM Serif Display', serif;
            color: #684653;
            font-weight: 400;
            line-height: 1.15;
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
            color: #684653;
            font-weight: 400;
            margin: 0 0 12px;
        }

        .subtitle {
            font-size: 12px;
            color: #8C7B81;
            margin-bottom: 30px;
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
            margin-bottom: 18px;
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
            margin: -10px 0 15px;
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
                <h1>Awal yang sehat,<br>masa depan yang indah.</h1>
                <p>Mulai perjalanan kesehatan ibu dan buah hati bersama kami.</p>
            </div>

            <p>© {{ date('Y') }} SABITA</p>
        </section>

        <section class="form-side">
            <div class="form-box">
                <h2>Buat akun.</h2>
                <p class="subtitle">Daftar sebagai ibu untuk menggunakan layanan SABITA.</p>

                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf

                    <label>Nama lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Nama lengkap ibu"
                        required>

                    <label>Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com"
                        required>

                    <label>Password</label>
                    <input type="password" name="password" placeholder="Minimal 8 karakter" required>

                    <label>Konfirmasi password</label>
                    <input type="password" name="password_confirmation" placeholder="Ulangi password" required>

                    <button type="submit">Buat akun SABITA</button>
                </form>

                <div class="bottom">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}">Masuk</a>
                </div>

                <a href="/" class="back">Kembali ke homepage</a>
            </div>
        </section>
    </div>
</body>

</html>

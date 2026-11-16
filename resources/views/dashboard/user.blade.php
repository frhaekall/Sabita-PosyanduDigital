<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Ibu | SABITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --plum: #684653;
            --rose: #BD718B;
            --rose-soft: #F4E3E8;
            --cream: #FFF9F5;
            --paper: #FFFEFC;
            --muted: #99858C;
            --line: #EDE0E2;
            --sage: #899579;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--plum);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 400;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button,
        input,
        select,
        textarea {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* HEADER */

        .topbar {
            min-height: 82px;
            padding: 0 8%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--line);
            background: rgba(255, 249, 245, .96);
        }

        .brand {
            font: 30px 'DM Serif Display', serif;
            color: var(--plum);
            letter-spacing: -.5px;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .header-name {
            font-size: 12px;
            color: var(--muted);
        }

        .logout {
            padding: 10px 20px;
            background: var(--plum);
            color: white;
            border: 0;
            border-radius: 5px;
            font-size: 12px;
            cursor: pointer;
            transition: .2s ease;
        }

        .logout:hover {
            background: #523542;
        }

        /* PAGE */

        .container {
            max-width: 1250px;
            margin: auto;
            padding: 45px 35px 75px;
        }

        .welcome-label {
            color: var(--rose);
            font-size: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            min-height: 285px;
            padding: 42px 45px;
            border-radius: 13px;
            background: #F2E3E5;
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 620px;
        }

        .hero h1 {
            font: 43px 'DM Serif Display', serif;
            font-weight: 400;
            line-height: 1.17;
            margin: 0 0 14px;
        }

        .hero h1 span {
            color: #A65E77;
        }

        .hero p {
            max-width: 450px;
            color: #856D76;
            font-size: 12px;
            line-height: 1.9;
            margin: 0;
        }

        .hero-date {
            margin-top: 24px;
            display: inline-block;
            padding: 9px 13px;
            border: 1px solid rgba(166, 94, 119, .25);
            border-radius: 4px;
            color: #986477;
            font-size: 10px;
        }

        .hero-art {
            position: absolute;
            width: 245px;
            height: 245px;
            right: 90px;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            background: #E6C5CE;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-art::before {
            content: '';
            position: absolute;
            width: 165px;
            height: 190px;
            background: #D6A4B4;
            border-radius: 48% 48% 43% 43%;
            transform: rotate(-12deg);
        }

        .hero-art::after {
            content: '♡';
            position: relative;
            z-index: 2;
            color: #FFF9F5;
            font: 100px 'DM Serif Display', serif;
            transform: rotate(-10deg);
        }

        .hero-decoration {
            position: absolute;
            width: 65px;
            height: 65px;
            border: 1px solid rgba(166, 94, 119, .35);
            border-radius: 50%;
            right: 285px;
            top: 25px;
        }

        .hero-decoration.small {
            width: 15px;
            height: 15px;
            background: #C58A9D;
            border: 0;
            right: 65px;
            top: auto;
            bottom: 35px;
        }

        /* SUMMARY */

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1.5fr;
            gap: 15px;
            margin-bottom: 43px;
        }

        .summary-card {
            min-height: 115px;
            padding: 20px 22px;
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .summary-label {
            color: var(--muted);
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .summary-number {
            font: 34px 'DM Serif Display', serif;
        }

        .summary-note {
            color: var(--muted);
            font-size: 10px;
        }

        .summary-card.sage {
            background: #E9EDE5;
            border-color: #E0E7D9;
        }

        .summary-card.sage .summary-label {
            color: #73816A;
        }

        .summary-card.sage p {
            color: #68745F;
            font-size: 11px;
            line-height: 1.8;
            margin: 7px 0 0;
        }

        /* SECTION */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 19px;
        }

        .section-kicker {
            color: var(--rose);
            font-size: 10px;
            letter-spacing: 1.8px;
            margin-bottom: 7px;
        }

        .section-heading h2 {
            font: 29px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0;
        }

        .section-caption {
            color: var(--muted);
            font-size: 11px;
        }

        /* MENU */

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
        }

        .menu-card {
            min-height: 155px;
            padding: 23px 24px;
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 9px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: .2s ease;
            color: var(--plum);
        }

        a.menu-card {
            cursor: pointer;
        }

        a.menu-card:hover {
            border-color: #D6A4B4;
            transform: translateY(-3px);
            box-shadow: 0 9px 25px rgba(104, 70, 83, .06);
        }

        a.menu-card:focus-visible {
            outline: 2px solid var(--rose);
            outline-offset: 3px;
        }

        .menu-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .menu-number {
            color: #C58A9D;
            font: 22px 'DM Serif Display', serif;
        }

        .menu-card h3 {
            font: 23px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 15px 0 6px;
        }

        .menu-card p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.7;
            margin: 0;
        }

        .menu-arrow {
            color: var(--rose);
            font-size: 17px;
            transition: transform .2s ease;
        }

        a.menu-card:hover .menu-arrow {
            transform: translate(3px, -3px);
        }

        /* BOTTOM */

        .bottom-grid {
            display: grid;
            grid-template-columns: 1.2fr .8fr;
            gap: 15px;
            margin-top: 40px;
        }

        .info-panel {
            border-radius: 9px;
            padding: 25px;
            min-height: 175px;
            background: #F1E7E4;
        }

        .info-panel.education {
            background: #E9EDE5;
            display: block;
            transition: .2s ease;
            cursor: pointer;
        }

        .info-panel.education:hover {
            transform: translateY(-3px);
            box-shadow: 0 9px 25px rgba(104, 70, 83, .06);
            background: #E2E9DC;
        }

        .info-panel.education:focus-visible {
            outline: 2px solid var(--sage);
            outline-offset: 3px;
        }

        .info-label {
            font-size: 10px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #A65E77;
            margin-bottom: 13px;
        }

        .education .info-label {
            color: #78856F;
        }

        .info-panel h3 {
            font: 23px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 9px;
        }

        .info-panel p {
            color: #856D76;
            font-size: 11px;
            line-height: 1.9;
            margin: 0;
        }

        .education p {
            color: #6F7967;
        }

        .education-link {
            display: inline-block;
            margin-top: 17px;
            color: #68775D;
            font-size: 11px;
        }

        /* FOOTER */

        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            color: var(--muted);
            font-size: 10px;
        }

        /* RESPONSIVE */

        @media(max-width: 800px) {
            .hero-art {
                right: -55px;
                opacity: .35;
            }

            .summary-grid {
                grid-template-columns: 1fr 1fr;
            }

            .summary-card.sage {
                grid-column: 1 / -1;
            }
        }

        @media(max-width: 550px) {
            .topbar {
                min-height: 70px;
                padding: 0 6%;
            }

            .brand {
                font-size: 27px;
            }

            .header-name {
                display: none;
            }

            .container {
                padding: 30px 6% 55px;
            }

            .hero {
                padding: 30px 23px;
                min-height: 270px;
            }

            .hero h1 {
                font-size: 35px;
            }

            .hero-art {
                width: 155px;
                height: 155px;
                right: -65px;
            }

            .hero-art::before {
                width: 110px;
                height: 125px;
            }

            .hero-art::after {
                font-size: 65px;
            }

            .summary-grid {
                gap: 9px;
            }

            .summary-card {
                padding: 15px;
                min-height: 105px;
            }

            .summary-number {
                font-size: 28px;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }

            .menu-card {
                min-height: 140px;
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
                gap: 8px;
            }

            .footer {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    @php
        $jumlahKehamilan = auth()->user()->pregnancies()->count();
    @endphp

    <header class="topbar">
        <a href="{{ route('dashboard') }}" class="brand">SABITA</a>

        <div class="header-right">
            <span class="header-name">{{ auth()->user()->name }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout" type="submit">Keluar</button>
            </form>
        </div>
    </header>

    <main class="container">

        <div class="welcome-label">RUANG KESEHATAN IBU DAN ANAK</div>

        <section class="hero">
            <div class="hero-content">
                <h1>
                    Halo, <span>{{ auth()->user()->name }}.</span><br>
                    Selamat datang di SABITA.
                </h1>

                <p>
                    Temani perjalanan kesehatan ibu dan buah hati melalui
                    informasi, pencatatan, serta layanan Posyandu dalam satu tempat.
                </p>

                <div class="hero-date">
                    {{ date('d.m.Y') }} &nbsp;·&nbsp; Ruang kesehatan keluarga
                </div>
            </div>

            <div class="hero-decoration"></div>
            <div class="hero-decoration small"></div>
            <div class="hero-art"></div>
        </section>

        <section class="summary-grid">

            <div class="summary-card">
                <span class="summary-label">Data Kehamilan</span>
                <span class="summary-number">{{ $jumlahKehamilan }}</span>
                <span class="summary-note">Catatan kehamilan tersimpan</span>
            </div>

            <div class="summary-card">
                <span class="summary-label">Layanan SABITA</span>
                <span class="summary-number">06</span>
                <span class="summary-note">Fitur layanan keluarga</span>
            </div>

            <div class="summary-card sage">
                <span class="summary-label">Ruang untuk Ibu</span>
                <p>
                    Jaga kesehatan selama kehamilan, perhatikan kebutuhan nutrisi,
                    dan ikuti pemeriksaan rutin sesuai anjuran tenaga kesehatan.
                </p>
            </div>

        </section>

        <section>

            <div class="section-heading">
                <div>
                    <div class="section-kicker">JELAJAHI LAYANAN</div>
                    <h2>Ruang Kesehatan Saya</h2>
                </div>

                <span class="section-caption">Semua kebutuhan dalam satu ruang.</span>
            </div>

            <div class="menu-grid">

                <a href="{{ route('pregnancies.index') }}" class="menu-card">
                    <div class="menu-top">
                        <span class="menu-number">01</span>
                        <span class="menu-arrow">↗</span>
                    </div>
                    <div>
                        <h3>Data Kehamilan</h3>
                        <p>Catat identitas ibu, HPHT, HPL, dan informasi kehamilan.</p>
                    </div>
                </a>

                <a href="{{ route('children.index') }}" class="menu-card">
                    <div class="menu-top">
                        <span class="menu-number">02</span>
                        <span class="menu-arrow">↗</span>
                    </div>
                    <div>
                        <h3>Data Bayi & Anak</h3>
                        <p>Simpan informasi identitas dan data dasar buah hati.</p>
                    </div>
                </a>

                <a href="{{ route('schedules.index') }}" class="menu-card">
                    <div class="menu-top">
                        <span class="menu-number">03</span>
                        <span class="menu-arrow">↗</span>
                    </div>
                    <div>
                        <h3>Jadwal Posyandu</h3>
                        <p>Lihat informasi jadwal kegiatan Posyandu di wilayahmu.</p>
                    </div>
                </a>

                <a href="{{ route('registrations.index') }}" class="menu-card">
                    <div class="menu-top">
                        <span class="menu-number">04</span>
                        <span class="menu-arrow">↗</span>
                    </div>
                    <div>
                        <h3>Pendaftaran Saya</h3>
                        <p>Pantau status pendaftaran dan daftarkan layanan Posyandu.</p>
                    </div>
                </a>

                <a href="{{ route('examinations.parent-index') }}" class="menu-card">
                    <div class="menu-top">
                        <span class="menu-number">05</span>
                        <span class="menu-arrow">↗</span>
                    </div>
                    <div>
                        <h3>Riwayat Pemeriksaan</h3>
                        <p>Pantau catatan pemeriksaan dan hasil layanan kesehatan.</p>
                    </div>
                </a>

                <a href="{{ route('educations.index') }}" class="menu-card">
                    <div class="menu-top">
                        <span class="menu-number">06</span>
                        <span class="menu-arrow">↗</span>
                    </div>
                    <div>
                        <h3>Edukasi Kesehatan</h3>
                        <p>Baca artikel seputar kehamilan, nutrisi, imunisasi, dan tumbuh kembang anak.</p>
                    </div>
                </a>

            </div>

        </section>

        <section class="bottom-grid">

            <div class="info-panel">
                <div class="info-label">Pengingat untuk Ibu</div>
                <h3>Jangan lewatkan pemeriksaan rutin.</h3>
                <p>
                    Pemeriksaan kehamilan secara berkala membantu memantau
                    kondisi ibu dan perkembangan janin. Konsultasikan jadwal
                    pemeriksaan dengan tenaga kesehatan.
                </p>
            </div>

            <a href="{{ route('educations.index') }}" class="info-panel education">
                <div class="info-label">RUANG EDUKASI SABITA</div>
                <h3>Belajar dan bertumbuh bersama.</h3>
                <p>
                    Temukan berbagai informasi kesehatan ibu dan anak,
                    mulai dari kehamilan, nutrisi, imunisasi, hingga
                    tumbuh kembang buah hati.
                </p>
                <span class="education-link">Jelajahi artikel edukasi &nbsp; ↗</span>
            </a>

        </section>

        <footer class="footer">
            <span>SABITA · Sistem Informasi Kesehatan Ibu dan Anak</span>
            <span>Ruang kesehatan keluarga</span>
        </footer>

    </main>

</body>

</html>

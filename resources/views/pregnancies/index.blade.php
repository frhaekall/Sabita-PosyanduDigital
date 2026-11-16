<!DOCTYPE html>

<html lang="id">

<head>


    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Data Ibu Hamil | SABITA</title>


    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons\@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {

            --rose: #D98FA6;

            --rose-dark: #B96F89;

            --rose-light: #F8E9E8;

            --ivory: #FFF9F5;

            --plum: #684653;

            --text: #4C3740;

            --muted: #9B8790;

            --border: #F0E2E5;

            --sage: #A9AD91;

            --shadow: 0 8px 30px rgba(104, 70, 83, .045);

        }

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }

        body {

            background: var(--ivory);

            font-family: 'Plus Jakarta Sans', sans-serif;

            color: var(--text);

        }

        a {

            text-decoration: none;

            color: inherit;

        }

        button {

            font-family: inherit;

        }

        .layout {
            display: flex;
            min-height: 100vh;
            align-items: stretch;
        }

        .sidebar {
            width: 255px;
            min-width: 255px;
            min-height: 100vh;
            position: sticky;
            top: 0;
            align-self: flex-start;
            background: #FFFDFC;
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .main {
            flex: 1;
            min-width: 0;
            max-width: none;
            margin: 0;
        }

        /* SIDEBAR */

        .sidebar {

            width: 255px;

            background: #FFFDFC;

            border-right: 1px solid var(--border);

            padding: 30px 20px;

            display: flex;

            flex-direction: column;

            flex-shrink: 0;

        }

        .brand {

            display: flex;

            align-items: center;

            gap: 12px;

            padding: 0 10px;

            margin-bottom: 42px;

        }

        .brand-icon {

            width: 43px;

            height: 43px;

            border-radius: 14px;

            background: var(--rose-light);

            color: var(--rose-dark);

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 22px;

        }

        .brand-name {

            font: 27px 'DM Serif Display', serif;

            color: var(--plum);

            line-height: 1;

        }

        .brand-sub {

            font-size: 9px;

            letter-spacing: 2px;

            color: var(--muted);

            margin-top: 5px;

        }

        .nav-label {

            font-size: 10px;

            letter-spacing: 1.5px;

            color: #B6A3AB;

            padding: 0 12px;

            margin-bottom: 13px;

        }

        .nav-menu {

            display: flex;

            flex-direction: column;

            gap: 5px;

        }

        .nav-item {

            display: flex;

            align-items: center;

            gap: 13px;

            padding: 13px 14px;

            border-radius: 12px;

            font-size: 12px;

            color: #897681;

            transition: .2s;

        }

        .nav-item i {

            font-size: 17px;

            width: 20px;

            flex-shrink: 0;

        }

        .nav-item:hover {

            background: #FFF2F3;

            color: var(--rose-dark);

        }

        .nav-item.active {

            background: #F8E8EC;

            color: #A85875;

        }

        .sidebar-bottom {

            margin-top: auto;

            padding-top: 25px;

        }

        .profile-mini {

            border-top: 1px solid var(--border);

            padding: 20px 5px 0;

            display: flex;

            align-items: center;

            gap: 11px;

        }

        .avatar {

            width: 38px;

            height: 38px;

            border-radius: 50%;

            background: #F3D8E1;

            color: #A85875;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            flex-shrink: 0;

        }

        .profile-name {

            font-size: 11px;

            color: var(--plum);

            overflow-wrap: anywhere;

        }

        .profile-role {

            font-size: 10px;

            color: var(--muted);

            margin-top: 4px;

        }

        /* MAIN */

        .main {

            flex: 1;

            min-width: 0;

            padding: 35px 45px;

        }

        .topbar {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

            margin-bottom: 35px;

        }

        .breadcrumb {

            font-size: 11px;

            color: var(--muted);

            display: flex;

            align-items: center;

            gap: 9px;

            flex-wrap: wrap;

        }

        .breadcrumb a {

            color: var(--muted);

        }

        .breadcrumb a:hover {

            color: var(--rose-dark);

        }

        .breadcrumb span:last-child {

            color: var(--rose-dark);

        }

        .top-right {

            display: flex;

            align-items: center;

            gap: 18px;

        }

        .date-label {

            font-size: 11px;

            color: #96828C;

            white-space: nowrap;

        }

        .logout-btn {

            display: flex;

            align-items: center;

            gap: 8px;

            border: 1px solid var(--border);

            background: white;

            color: var(--plum);

            padding: 10px 15px;

            border-radius: 10px;

            font-size: 11px;

            cursor: pointer;

            transition: .2s;

        }

        .logout-btn:hover {

            background: var(--rose-light);

            border-color: #E8CBD4;

        }

        /* HERO */

        .hero {

            position: relative;

            overflow: hidden;

            min-height: 245px;

            border-radius: 22px;

            padding: 35px 38px;

            background: linear-gradient(115deg, #F8E7EB 0%, #FFF0E7 100%);

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 28px;

        }

        .hero-content {

            position: relative;

            z-index: 2;

            max-width: 590px;

        }

        .eyebrow {

            font-size: 10px;

            letter-spacing: 2px;

            color: #A65E77;

            text-transform: uppercase;

            margin-bottom: 13px;

        }

        .hero h1 {

            font: 38px 'DM Serif Display', serif;

            font-weight: 400;

            line-height: 1.15;

            margin: 0 0 13px;

            color: var(--plum);

        }

        .hero p {

            max-width: 470px;

            color: #856D76;

            font-size: 12px;

            line-height: 1.9;

            margin: 0;

        }

        .hero-art {

            position: absolute;

            right: 55px;

            top: 50%;

            transform: translateY(-50%);

            width: 175px;

            height: 175px;

            border-radius: 50%;

            background: #E7C7D0;

            display: flex;

            align-items: center;

            justify-content: center;

        }

        .hero-art::before {

            content: '';

            position: absolute;

            width: 125px;

            height: 150px;

            border-radius: 48% 48% 42% 42%;

            background: #D9AAB9;

            transform: rotate(-13deg);

        }

        .hero-art::after {

            content: '♡';

            position: relative;

            z-index: 2;

            font: 75px 'DM Serif Display', serif;

            color: #FFF8F4;

            transform: rotate(-10deg);

        }

        .hero-circle {

            position: absolute;

            width: 65px;

            height: 65px;

            border: 1px solid rgba(166, 94, 119, .35);

            border-radius: 50%;

            right: 225px;

            top: 25px;

        }

        .hero-dot {

            position: absolute;

            width: 13px;

            height: 13px;

            border-radius: 50%;

            background: #C58A9D;

            right: 40%;

            bottom: 35px;

        }

        /* NOTIFICATION */

        .notice {

            background: #EDF1E8;

            color: #68745F;

            border: 1px solid #E0E7D9;

            border-radius: 10px;

            padding: 14px 17px;

            font-size: 11px;

            margin-bottom: 20px;

        }

        /* SUMMARY */

        .summary-grid {

            display: grid;

            grid-template-columns: 1fr 1fr 1.5fr;

            gap: 15px;

            margin-bottom: 38px;

        }

        .summary-card {

            min-height: 112px;

            padding: 20px 22px;

            background: #FFFEFC;

            border: 1px solid var(--border);

            border-radius: 12px;

            display: flex;

            flex-direction: column;

            justify-content: space-between;

            box-shadow: var(--shadow);

        }

        .summary-label {

            color: var(--muted);

            font-size: 10px;

            letter-spacing: 1px;

            text-transform: uppercase;

        }

        .summary-number {

            font: 32px 'DM Serif Display', serif;

            color: var(--plum);

        }

        .summary-note {

            font-size: 10px;

            color: var(--muted);

        }

        .privacy-card {

            background: #E9EDE4;

            border-color: #E0E7D9;

        }

        .privacy-card .summary-label {

            color: #73816A;

        }

        .privacy-card p {

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

            gap: 15px;

            margin-bottom: 19px;

        }

        .section-kicker {

            font-size: 10px;

            letter-spacing: 1.8px;

            color: var(--rose);

            margin-bottom: 7px;

        }

        .section-heading h2 {

            font: 29px 'DM Serif Display', serif;

            font-weight: 400;

            margin: 0;

            color: var(--plum);

        }

        .add-button {

            display: inline-flex;

            align-items: center;

            gap: 9px;

            padding: 12px 18px;

            background: var(--plum);

            color: white;

            border-radius: 10px;

            font-size: 11px;

            transition: .2s;

            white-space: nowrap;

        }

        .add-button:hover {

            background: #805667;

            color: white;

            transform: translateY(-2px);

        }

        /* PREGNANCY CARD */

        .pregnancy-list {

            display: grid;

            gap: 13px;

        }

        .pregnancy-card {

            background: #FFFEFC;

            border: 1px solid var(--border);

            border-radius: 14px;

            padding: 24px 25px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 25px;

            box-shadow: var(--shadow);

            transition: .2s;

        }

        .pregnancy-card:hover {

            border-color: #E7CBD4;

        }

        .pregnancy-name {

            font: 24px 'DM Serif Display', serif;

            color: var(--plum);

            margin-bottom: 8px;

        }

        .pregnancy-meta {

            color: var(--muted);

            font-size: 10px;

            line-height: 1.9;

            overflow-wrap: anywhere;

        }

        .pregnancy-details {

            display: flex;

            gap: 30px;

            flex-wrap: wrap;

        }

        .detail-label {

            display: block;

            color: var(--muted);

            font-size: 9px;

            text-transform: uppercase;

            letter-spacing: 1px;

            margin-bottom: 7px;

        }

        .detail-value {

            font-size: 12px;

            color: var(--plum);

            white-space: nowrap;

        }

        /* EMPTY */

        .empty-panel {

            position: relative;

            overflow: hidden;

            min-height: 280px;

            background: #FFFEFC;

            border: 1px solid var(--border);

            border-radius: 14px;

            display: flex;

            align-items: center;

            justify-content: center;

            text-align: center;

            padding: 35px 20px;

        }

        .empty-panel::before {

            content: '';

            position: absolute;

            width: 190px;

            height: 190px;

            border-radius: 50%;

            background: #FBF0F1;

            top: -110px;

            left: -65px;

        }

        .empty-panel::after {

            content: '';

            position: absolute;

            width: 150px;

            height: 150px;

            border-radius: 50%;

            background: #F8EFEB;

            bottom: -95px;

            right: -35px;

        }

        .empty-content {

            position: relative;

            z-index: 1;

            max-width: 420px;

        }

        .empty-illustration {

            width: 76px;

            height: 76px;

            border-radius: 50%;

            background: #F6E7EA;

            margin: 0 auto 20px;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--rose);

            font: 42px 'DM Serif Display', serif;

        }

        .empty-content h3 {

            font: 25px 'DM Serif Display', serif;

            font-weight: 400;

            color: var(--plum);

            margin: 0 0 9px;

        }

        .empty-content p {

            color: var(--muted);

            font-size: 11px;

            line-height: 1.9;

            margin: 0 0 20px;

        }

        .empty-action {

            display: inline-block;

            padding: 11px 17px;

            border: 1px solid #D7A4B3;

            color: #A65E77;

            border-radius: 9px;

            font-size: 11px;

            transition: .2s;

        }

        .empty-action:hover {

            background: var(--rose-light);

            color: var(--plum);

        }

        /* PAGINATION */

        .pagination {

            margin-top: 22px;

        }

        .pagination nav {

            display: flex;

            justify-content: center;

        }

        .pagination svg {

            width: 16px;

            height: 16px;

        }

        .pagination a,

        .pagination span {

            font-size: 12px;

        }

        .back-link {

            display: inline-flex;

            align-items: center;

            gap: 7px;

            margin-top: 30px;

            color: var(--muted);

            font-size: 11px;

        }

        .back-link:hover {

            color: var(--rose-dark);

        }

        .footer {

            text-align: center;

            padding: 35px 0 10px;

            color: #B4A2AA;

            font-size: 10px;

            line-height: 1.8;

        }

        /* RESPONSIVE */

        @media(max-width:1100px) {

            .sidebar {

                width: 220px;

            }

            .main {

                padding: 30px;

            }

            .hero-art {

                right: 25px;

                opacity: .7;

            }

            .summary-grid {

                grid-template-columns: 1fr 1fr;

            }

            .privacy-card {

                grid-column: 1/-1;

            }

        }

        @media(max-width:800px) {

            .layout {

                display: block;

            }

            .sidebar {
                display: flex;
                position: relative;
                width: 100%;
                min-width: 0;
                min-height: auto;

                padding: 17px 20px;

                border-right: 0;

                border-bottom: 1px solid var(--border);

            }

            .brand {

                margin-bottom: 18px;

            }

            .nav-label,

            .sidebar-bottom {

                display: none;

            }

            .nav-menu {

                flex-direction: row;

                overflow-x: auto;

                padding-bottom: 5px;

            }

            .nav-item {

                white-space: nowrap;

                padding: 10px 13px;

            }

            .main {

                padding: 25px 20px;

            }

            .hero-art {

                right: -55px;

                opacity: .35;

            }

            .hero-content {

                max-width: 100%;

            }

            .pregnancy-card {

                align-items: flex-start;

                flex-direction: column;

            }

            .pregnancy-details {

                gap: 20px;

            }

        }

        @media(max-width:550px) {

            .main {

                padding: 25px 6%;

            }

            .topbar {

                align-items: flex-start;

            }

            .date-label {

                display: none;

            }

            .hero {

                padding: 30px 24px;

                min-height: 235px;

            }

            .hero h1 {

                font-size: 32px;

            }

            .hero-art {

                width: 145px;

                height: 145px;

                right: -65px;

            }

            .hero-art::before {

                width: 105px;

                height: 125px;

            }

            .hero-art::after {

                font-size: 60px;

            }

            .summary-grid {

                gap: 9px;

            }

            .summary-card {

                padding: 15px;

                min-height: 100px;

            }

            .summary-number {

                font-size: 27px;

            }

            .section-heading {

                align-items: flex-start;

                flex-direction: column;

            }

            .pregnancy-details {

                gap: 17px;

            }

        }
    </style>

</head>

<body>

    <div class="layout">

        <!-- SIDEBAR SABITA -->

        <aside class="sidebar">

            <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
                class="brand">

                <div class="brand-icon">

                    <i class="bi bi-flower1"></i>

                </div>

                <div>

                    <div class="brand-name">SABITA</div>

                    <div class="brand-sub">POSYANDU DIGITAL</div>

                </div>

            </a>

            <div class="nav-label">MENU UTAMA</div>

            <nav class="nav-menu">

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="nav-item">

                        <i class="bi bi-grid"></i>

                        Dashboard

                    </a>

                    <a href="{{ route('pregnancies.index') }}" class="nav-item active">

                        <i class="bi bi-person-hearts"></i>

                        Data Ibu Hamil

                    </a>

                    <a href="{{ route('children.index') }}" class="nav-item">

                        <i class="bi bi-person-bounding-box"></i>

                        Data Bayi & Anak

                    </a>

                    <a href="{{ route('admin.schedules.index') }}" class="nav-item">

                        <i class="bi bi-calendar-event"></i>

                        Jadwal Posyandu

                    </a>

                    <a href="{{ route('admin.registrations.index') }}" class="nav-item">

                        <i class="bi bi-clipboard2-check"></i>

                        Pendaftaran

                    </a>

                    <a href="#pemeriksaan" class="nav-item">

                        <i class="bi bi-heart-pulse"></i>

                        Pemeriksaan

                    </a>

                    <a href="#edukasi" class="nav-item">

                        <i class="bi bi-book"></i>

                        Edukasi

                    </a>

                    <a href="#laporan" class="nav-item">

                        <i class="bi bi-file-earmark-bar-graph"></i>

                        Laporan

                    </a>
                @else
                    <a href="{{ route('user.dashboard') }}" class="nav-item">

                        <i class="bi bi-grid"></i>

                        Dashboard

                    </a>

                    <a href="{{ route('pregnancies.index') }}" class="nav-item active">

                        <i class="bi bi-person-hearts"></i>

                        Data Kehamilan

                    </a>

                    <a href="{{ route('children.index') }}" class="nav-item">

                        <i class="bi bi-person-bounding-box"></i>

                        Data Bayi & Anak

                    </a>

                    <a href="{{ route('schedules.index') }}" class="nav-item">

                        <i class="bi bi-calendar-event"></i>

                        Jadwal Posyandu

                    </a>
                @endif

            </nav>

            <div class="sidebar-bottom">

                <div class="profile-mini">

                    <div class="avatar">

                        <i class="bi bi-person"></i>

                    </div>

                    <div>

                        <div class="profile-name">{{ auth()->user()->name }}</div>

                        <div class="profile-role">


                            {{ auth()->user()->role === 'admin' ? 'Administrator SABITA' : 'Pengguna SABITA' }}

                        </div>

                    </div>

                </div>

            </div>

        </aside>

        <!-- MAIN CONTENT -->

        <main class="main">

            <!-- TOPBAR -->

            <div class="topbar">

                <div class="breadcrumb">

                    <a
                        href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">SABITA</a>

                    /

                    <span>Data Ibu Hamil</span>

                </div>

                <div class="top-right">

                    <div class="date-label">

                        <i class="bi bi-calendar3"></i>

                        {{ now()->translatedFormat('l, d F Y') }}

                    </div>

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button type="submit" class="logout-btn">

                            <i class="bi bi-box-arrow-right"></i>

                            Keluar

                        </button>

                    </form>

                </div>

            </div>

            <!-- HERO -->

            <section class="hero">

                <div class="hero-content">

                    <div class="eyebrow">Ruang Kesehatan Ibu · SABITA</div>

                    <h1>Setiap perjalanan<br>kehamilan berarti.</h1>

                    <p>

                        Catat dan pantau informasi kehamilan dalam satu ruang.

                        Data yang tersimpan membantu memudahkan pemantauan

                        kesehatan ibu selama masa kehamilan.

                    </p>

                </div>

                <div class="hero-circle"></div>

                <div class="hero-dot"></div>

                <div class="hero-art"></div>

            </section>

            @if (session('success'))
                <div class="notice">

                    <i class="bi bi-check-circle"></i>

                    {{ session('success') }}

                </div>
            @endif

            <!-- SUMMARY -->

            <section class="summary-grid">

                <div class="summary-card">

                    <span class="summary-label">Total Data Tercatat</span>

                    <span class="summary-number">{{ $pregnancies->total() }}</span>

                    <span class="summary-note">Data ibu hamil</span>

                </div>

                <div class="summary-card">

                    <span class="summary-label">Status Pendaftaran</span>

                    <span class="summary-number" style="font-size:24px;">

                        {{ $pregnancies->total() > 0 ? 'Terdaftar' : 'Belum ada' }}

                    </span>

                    <span class="summary-note">Informasi kehamilan</span>

                </div>

                <div class="summary-card privacy-card">

                    <span class="summary-label">Privasi Data</span>

                    <p>

                        Informasi pribadi ibu dijaga dan hanya digunakan untuk

                        keperluan pencatatan serta pelayanan kesehatan di SABITA.

                    </p>

                </div>

            </section>

            <!-- DATA KEHAMILAN -->

            <section>

                <div class="section-heading">

                    <div>

                        <div class="section-kicker">CATATAN KESEHATAN</div>

                        <h2>Data Kehamilan</h2>

                    </div>

                    @if (auth()->user()->role === 'user')
                        <a href="{{ route('pregnancies.create') }}" class="add-button">

                            <i class="bi bi-plus-lg"></i>

                            Tambah Data Kehamilan

                        </a>
                    @endif

                </div>

                @if ($pregnancies->count())

                    <div class="pregnancy-list">

                        @foreach ($pregnancies as $pregnancy)
                            <article class="pregnancy-card">

                                <div>

                                    <div class="pregnancy-name">

                                        {{ $pregnancy->nama_ibu }}

                                    </div>

                                    <div class="pregnancy-meta">

                                        NIK
                                        ••••••••••••{{ substr($pregnancy->nik, -4) }}<br>

                                        {{ $pregnancy->alamat }}

                                        @if (auth()->user()->role === 'admin')
                                            <br>

                                            Akun:
                                            {{ $pregnancy->user->name ?? '-' }}
                                        @endif

                                    </div>

                                </div>

                                <div class="pregnancy-details">

                                    <div>

                                        <span class="detail-label">HPHT</span>

                                        <span class="detail-value">


                                            {{ $pregnancy->tanggal_hpht?->format('d M Y') ?? 'Belum diisi' }}

                                        </span>

                                    </div>

                                    <div>

                                        <span class="detail-label">Perkiraan
                                            Lahir</span>

                                        <span class="detail-value">


                                            {{ $pregnancy->tanggal_hpl?->format('d M Y') ?? 'Belum diisi' }}

                                        </span>

                                    </div>

                                    <div>

                                        <span class="detail-label">Golongan
                                            Darah</span>

                                        <span class="detail-value">


                                            {{ $pregnancy->golongan_darah ?? '-' }}

                                        </span>

                                    </div>

                                </div>

                            </article>
                        @endforeach

                    </div>

                    <div class="pagination">

                        {{ $pregnancies->links() }}

                    </div>
                @else
                    <div class="empty-panel">

                        <div class="empty-content">

                            <div class="empty-illustration">♡</div>

                            <h3>Belum ada catatan kehamilan</h3>

                            <p>

                                Mulai lengkapi informasi kehamilan agar perjalanan

                                kesehatan ibu dapat tercatat dengan lebih teratur.

                            </p>

                            @if (auth()->user()->role === 'user')
                                <a href="{{ route('pregnancies.create') }}" class="empty-action">

                                    Tambahkan Data Kehamilan

                                </a>
                            @else
                                <span style="font-size:11px;color:#9B8790;">

                                    Data ibu hamil belum tersedia.

                                </span>
                            @endif

                        </div>

                    </div>


                @endif

            </section>

            <a class="back-link"
                href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">

                <i class="bi bi-arrow-left"></i>

                Kembali ke Dashboard

            </a>

            <footer class="footer">

                SABITA · Sistem Informasi Posyandu Digital<br>

                © {{ date('Y') }} SABITA

            </footer>

        </main>

    </div>

</body>

</html>

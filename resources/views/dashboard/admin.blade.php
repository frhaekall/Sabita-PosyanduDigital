<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --rose: #D98FA6;
            --rose-dark: #B96F89;
            --rose-light: #F8E9E8;
            --ivory: #FFF9F5;
            --white: #FFFFFF;
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

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 255px;
            min-width: 255px;
            height: 100vh;
            position: sticky;
            top: 0;
            align-self: flex-start;
            background: #FFFDFC;
            border-right: 1px solid var(--border);
            padding: 30px 20px 22px;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            overflow-y: auto;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 42px;
            min-width: 0;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            min-width: 43px;
            border-radius: 14px;
            background: var(--rose-light);
            color: var(--rose-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand-copy {
            min-width: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand-name {
            font-family: 'DM Serif Display', serif;
            font-size: 27px;
            font-weight: 400;
            color: var(--plum);
            line-height: 1.05;
            white-space: nowrap;
        }

        .brand-sub {
            display: block;
            font-size: 9px;
            font-weight: 500;
            letter-spacing: 1.7px;
            line-height: 1.5;
            color: var(--muted);
            margin-top: 5px;
            white-space: nowrap;
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
            position: relative;
            z-index: 5;
            display: flex;
            align-items: center;
            gap: 13px;
            width: 100%;
            padding: 13px 14px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            color: #897681;
            text-decoration: none;
            cursor: pointer;
            pointer-events: auto;
            transition: background .2s, color .2s;
        }

        .nav-item i {
            font-size: 17px;
            width: 20px;
            min-width: 20px;
            text-align: center;
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
            min-width: 0;
        }

        .avatar {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 50%;
            background: #F3D8E1;
            color: #A85875;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .profile-info {
            min-width: 0;
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
            gap: 20px;
            margin-bottom: 40px;
        }

        .breadcrumb {
            font-size: 11px;
            color: var(--muted);
        }

        .breadcrumb span {
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
            font-family: inherit;
            font-size: 11px;
            cursor: pointer;
            transition: .2s;
            white-space: nowrap;
        }

        .logout-btn:hover {
            background: var(--rose-light);
            border-color: #E8CBD4;
        }

        /* WELCOME */
        .welcome {
            background: linear-gradient(115deg, #F8E7EB 0%, #FFF0E7 100%);
            border-radius: 22px;
            padding: 35px 38px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
            margin-bottom: 35px;
        }

        .welcome::after {
            content: "";
            width: 220px;
            height: 220px;
            background: rgba(255, 255, 255, .3);
            border-radius: 50%;
            position: absolute;
            right: 70px;
            top: -100px;
        }

        .welcome-content {
            position: relative;
            z-index: 1;
        }

        .welcome-label {
            font-size: 10px;
            letter-spacing: 2px;
            color: #B16C83;
            margin-bottom: 13px;
        }

        .welcome h1 {
            font: 35px 'DM Serif Display', serif;
            font-weight: 400;
            color: var(--plum);
            margin-bottom: 12px;
        }

        .welcome p {
            font-size: 12px;
            line-height: 1.8;
            color: #92717F;
            max-width: 460px;
        }

        .welcome-icon {
            position: relative;
            z-index: 1;
            width: 105px;
            height: 105px;
            min-width: 105px;
            border-radius: 30px;
            background: rgba(255, 255, 255, .55);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #C47F97;
            font-size: 48px;
            transform: rotate(-7deg);
        }

        /* STATISTICS */
        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .section-heading h2 {
            font: 24px 'DM Serif Display', serif;
            font-weight: 400;
            color: var(--plum);
        }

        .section-heading p {
            font-size: 11px;
            color: var(--muted);
            margin-top: 5px;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 17px;
            padding: 22px;
            box-shadow: var(--shadow);
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 42px;
            height: 42px;
            min-width: 42px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .pink {
            background: #F9E8EE;
            color: #C06F8C;
        }

        .peach {
            background: #FCEBDD;
            color: #CA8951;
        }

        .sage {
            background: #EEF0E5;
            color: #92996C;
        }

        .lavender {
            background: #F0EAF7;
            color: #947CB5;
        }

        .stat-caption {
            font-size: 10px;
            color: #A18E97;
        }

        .stat-number {
            font: 32px 'DM Serif Display', serif;
            color: var(--plum);
            margin-bottom: 7px;
        }

        .stat-description {
            font-size: 10px;
            color: #AA98A0;
        }

        /* CONTENT */
        .content-grid {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 20px;
        }

        .panel {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 25px;
            box-shadow: var(--shadow);
            min-width: 0;
        }

        .panel-title {
            font: 21px 'DM Serif Display', serif;
            font-weight: 400;
            color: var(--plum);
            margin-bottom: 6px;
        }

        .panel-subtitle {
            font-size: 10px;
            color: var(--muted);
            margin-bottom: 25px;
        }

        .quick-menu {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .quick-item {
            position: relative;
            display: flex;
            align-items: center;
            gap: 10px;
            min-height: 48px;
            padding: 11px 12px;
            border: 1px solid transparent;
            border-radius: 10px;
            background: transparent;
            cursor: pointer;
            text-decoration: none;
            transition: .2s ease;
        }

        .quick-item:hover {
            background: #FFF2F5;
            border-color: #EACBD5;
        }

        .quick-item i {
            font-size: 21px;
            color: var(--rose-dark);
            flex-shrink: 0;
        }

        .quick-item span {
            font-size: 11px;
            color: var(--plum);
        }

        .quick-item:hover {
            background: #FFF2F5;
            border-color: #EACBD5;
        }

        .quick-item i {
            font-size: 21px;
            color: var(--rose-dark);
            flex-shrink: 0;
        }

        .quick-item span {
            font-size: 11px;
            color: var(--plum);
        }

        .activity-empty {
            text-align: center;
            padding: 20px 0;
        }

        .activity-empty i {
            font-size: 35px;
            color: #D8B8C4;
            display: block;
            margin-bottom: 12px;
        }

        .activity-empty p {
            font-size: 11px;
            color: var(--muted);
            line-height: 1.8;
        }

        .footer {
            text-align: center;
            padding: 35px 0 10px;
            color: #B4A2AA;
            font-size: 10px;
        }

        /* RESPONSIVE */
        @media (max-width:1100px) {
            .sidebar {
                width: 225px;
                min-width: 225px;
                padding-left: 15px;
                padding-right: 15px;
            }

            .main {
                padding: 30px;
            }

            .stat-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width:800px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-width: 0;
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
                gap: 5px;
            }

            .nav-item {
                width: auto;
                white-space: nowrap;
                flex-shrink: 0;
                padding: 10px 13px;
            }

            .main {
                padding: 25px 20px;
            }

            .welcome {
                padding: 28px;
            }

            .welcome h1 {
                font-size: 29px;
            }

            .welcome-icon {
                width: 75px;
                height: 75px;
                min-width: 75px;
                font-size: 35px;
            }
        }

        @media (max-width:480px) {
            .stat-grid {
                gap: 10px;
            }

            .stat-card {
                padding: 16px;
            }

            .stat-number {
                font-size: 27px;
            }

            .welcome-icon {
                display: none;
            }

            .topbar {
                align-items: flex-start;
            }

            .date-label {
                display: none;
            }

            .quick-menu {
                grid-template-columns: 1fr;
            }

            .panel {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <a href="{{ route('admin.dashboard') }}" class="brand">
                <div class="brand-icon">
                    <i class="bi bi-flower1"></i>
                </div>

                <div class="brand-copy">
                    <div class="brand-name">SABITA</div>
                    <span class="brand-sub">POSYANDU DIGITAL</span>
                </div>
            </a>

            <div class="nav-label">MENU UTAMA</div>

            <nav class="nav-menu">

                <a href="{{ route('admin.dashboard') }}" class="nav-item active">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('pregnancies.index') }}" class="nav-item">
                    <i class="bi bi-person-hearts"></i>
                    <span>Data Ibu Hamil</span>
                </a>

                <a href="{{ route('children.index') }}" class="nav-item">
                    <i class="bi bi-person-bounding-box"></i>
                    <span>Data Bayi &amp; Anak</span>
                </a>

                <a href="{{ route('admin.schedules.index') }}" class="nav-item">
                    <i class="bi bi-calendar-event"></i>
                    <span>Jadwal Posyandu</span>
                </a>

                <!-- LINK PENDAFTARAN ADMIN -->
                <a href="{{ route('admin.registrations.index') }}" class="nav-item">
                    <i class="bi bi-clipboard2-check"></i>
                    <span>Pendaftaran</span>
                </a>

                <a href="{{ route('admin.examinations.index') }}" class="nav-item">
                    <i class="bi bi-heart-pulse"></i>
                    <span>Pemeriksaan</span>
                </a>

                <a href="{{ route('admin.educations.index') }}" class="nav-item">
                    <i class="bi bi-book"></i>
                    <span>Edukasi</span>
                </a>

                <a href="{{ route('admin.reports.index') }}" class="nav-item">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    <span>Laporan</span>
                </a>

            </nav>

            <div class="sidebar-bottom">
                <div class="profile-mini">
                    <div class="avatar">
                        <i class="bi bi-person"></i>
                    </div>

                    <div class="profile-info">
                        <div class="profile-name">{{ auth()->user()->name }}</div>
                        <div class="profile-role">Administrator SABITA</div>
                    </div>
                </div>
            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="main">

            <div class="topbar">
                <div class="breadcrumb">
                    SABITA / <span>Dashboard Admin</span>
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

            <!-- WELCOME -->
            <section class="welcome">
                <div class="welcome-content">
                    <div class="welcome-label">ADMINISTRATOR</div>

                    <h1>Selamat datang, {{ auth()->user()->name }}.</h1>

                    <p>
                        Pantau dan kelola kegiatan Posyandu dalam satu tempat.
                        Bersama, kita mendukung kesehatan ibu dan tumbuh kembang anak.
                    </p>
                </div>

                <div class="welcome-icon">
                    <i class="bi bi-flower2"></i>
                </div>
            </section>

            <!-- STATISTICS -->
            <div class="section-heading">
                <div>
                    <h2>Ringkasan Posyandu</h2>
                    <p>Gambaran umum pengelolaan SABITA hari ini.</p>
                </div>
            </div>

            <section class="stat-grid">

                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon pink">
                            <i class="bi bi-person-hearts"></i>
                        </div>
                        <span class="stat-caption">DATA IBU</span>
                    </div>

                    <div class="stat-number">{{ $totalIbu }}</div>
                    <div class="stat-description">Ibu hamil terdaftar</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon peach">
                            <i class="bi bi-person-bounding-box"></i>
                        </div>
                        <span class="stat-caption">DATA ANAK</span>
                    </div>

                    <div class="stat-number">{{ $totalAnak }}</div>
                    <div class="stat-description">Bayi dan anak terdaftar</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon sage">
                            <i class="bi bi-calendar-heart"></i>
                        </div>
                        <span class="stat-caption">KEGIATAN</span>
                    </div>

                    <div class="stat-number">{{ $totalJadwal }}</div>
                    <div class="stat-description">Jadwal Posyandu aktif</div>
                </div>

                <div class="stat-card">
                    <div class="stat-top">
                        <div class="stat-icon lavender">
                            <i class="bi bi-clipboard2-check"></i>
                        </div>
                        <span class="stat-caption">LAYANAN</span>
                    </div>

                    <div class="stat-number">{{ $totalPendaftaran }}</div>
                    <div class="stat-description">Pendaftaran layanan</div>
                </div>

            </section>

            <!-- QUICK ACTION & ACTIVITY -->
            <section class="content-grid">

                <div class="panel">
                    <h3 class="panel-title">Menu Pengelolaan</h3>
                    <p class="panel-subtitle">
                        Akses cepat ke fitur utama SABITA.
                    </p>

                    <div class="quick-menu">
                        <a href="{{ route('admin.schedules.create') }}" class="quick-item">
                            <i class="bi bi-calendar-plus"></i>
                            <span>Tambah Jadwal Posyandu</span>
                        </a>

                        <a href="{{ route('pregnancies.index') }}" class="quick-item">
                            <i class="bi bi-person-plus"></i>
                            <span>Lihat Data Ibu Hamil</span>
                        </a>

                        <a href="{{ route('children.index') }}" class="quick-item">
                            <i class="bi bi-person-bounding-box"></i>
                            <span>Lihat Data Anak</span>
                        </a>

                        <a href="{{ route('admin.schedules.index') }}" class="quick-item">
                            <i class="bi bi-calendar-plus"></i>
                            <span>Kelola Jadwal Posyandu</span>
                        </a>

                        <!-- AKSES ANTREAN PENDAFTARAN -->
                        <a href="{{ route('admin.registrations.index') }}" class="quick-item">
                            <i class="bi bi-clipboard2-check"></i>
                            <span>Lihat Pendaftaran Layanan</span>
                        </a>

                        <a href="{{ route('admin.examinations.index') }}" class="quick-item">
                            <i class="bi bi-heart-pulse"></i>
                            <span>Input Pemeriksaan</span>
                        </a>

                        <a href="{{ route('admin.reports.index') }}" class="quick-item">
                            <i class="bi bi-file-earmark-pdf"></i>
                            <span>Lihat Laporan</span>
                        </a>

                    </div>
                </div>

                <div class="panel">
                    <h3 class="panel-title">Aktivitas Terbaru</h3>
                    <p class="panel-subtitle">
                        Aktivitas yang tercatat dalam sistem.
                    </p>

                    @if ($aktivitas->isEmpty())

                        <div class="activity-empty">
                            <i class="bi bi-journal-heart"></i>
                            <p>Belum ada aktivitas yang tercatat.</p>
                        </div>
                    @else
                        <div style="display:flex;flex-direction:column;gap:14px">

                            @foreach ($aktivitas as $item)
                                <div
                                    style="display:flex;align-items:center;gap:12px;padding-bottom:12px;border-bottom:1px solid var(--border)">

                                    <div class="stat-icon pink">
                                        <i class="bi bi-journal-heart"></i>
                                    </div>

                                    <div style="flex:1;min-width:0">

                                        <div style="font-size:11px;color:var(--plum)">
                                            {{ $item['nama'] }}
                                        </div>

                                        <div style="font-size:10px;color:var(--muted);margin-top:5px">
                                            {{ $item['jenis'] }}
                                        </div>

                                        <div style="font-size:10px;color:var(--muted);margin-top:4px">
                                            {{ $item['waktu']->diffForHumans() }}
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>

                    @endif
                </div>

            </section>

            <footer class="footer">
                SABITA · Sistem Informasi Posyandu Digital
                <br>
                <span style="display:inline-block;margin-top:6px">
                    © {{ date('Y') }} SABITA
                </span>
            </footer>

        </main>
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laporan | SABITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
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
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 255px;
            min-width: 255px;
            background: #FFFDFC;
            border-right: 1px solid var(--border);
            padding: 30px 20px 22px;
            display: flex;
            flex-direction: column;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 0 10px;
            margin-bottom: 40px;
        }

        .brand-icon {
            width: 46px;
            height: 46px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            background: var(--rose-light);
            color: var(--rose-dark);
            font-size: 23px;
        }

        .brand-name {
            font-family: 'DM Serif Display', serif;
            font-size: 27px;
            color: var(--plum);
            line-height: 1;
        }

        .brand-sub {
            font-size: 9px;
            letter-spacing: 2.5px;
            color: var(--muted);
            margin-top: 7px;
        }

        .nav-label {
            padding: 0 13px;
            margin-bottom: 15px;
            color: #B39EA6;
            font-size: 10px;
            letter-spacing: 2px;
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
            width: 100%;
            padding: 15px 14px;
            border-radius: 13px;
            color: #897681;
            font-size: 12px;
            transition: .2s;
        }

        .nav-item i {
            font-size: 17px;
        }

        .nav-item:hover,
        .nav-item.active {
            background: #F8E8EC;
            color: var(--rose-dark);
        }

        .sidebar-bottom {
            margin-top: auto;
            border-top: 1px solid var(--border);
            padding: 22px 5px 0;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #F5DDE4;
            color: var(--rose-dark);
            font-size: 18px;
        }

        .profile-name {
            font-size: 11px;
            color: var(--plum);
        }

        .profile-role {
            font-size: 10px;
            color: var(--muted);
            margin-top: 5px;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 32px 45px 45px;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-bottom: 45px;
        }

        .breadcrumb {
            font-size: 11px;
            color: var(--muted);
        }

        .breadcrumb span {
            color: var(--rose-dark);
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .date-text {
            font-size: 11px;
            color: var(--muted);
        }

        .logout {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border: 1px solid var(--border);
            border-radius: 10px;
            color: var(--plum);
            background: white;
            font-size: 11px;
        }

        .page-title {
            font-family: 'DM Serif Display', serif;
            font-size: 39px;
            font-weight: 400;
            color: var(--plum);
        }

        .page-description {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
            margin-top: 9px;
        }

        .filter-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 23px;
            margin-top: 30px;
            box-shadow: var(--shadow);
        }

        .filter-title {
            font-family: 'DM Serif Display', serif;
            color: var(--plum);
            font-size: 21px;
            font-weight: 400;
            margin-bottom: 17px;
        }

        .filter-form {
            display: flex;
            align-items: end;
            flex-wrap: wrap;
            gap: 14px;
        }

        .form-group {
            flex: 1;
            min-width: 180px;
        }

        .form-group label {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            height: 43px;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 0 12px;
            font-family: inherit;
            font-size: 11px;
            color: var(--text);
            outline: none;
        }

        .form-group input:focus {
            border-color: var(--rose);
        }

        .btn {
            height: 43px;
            padding: 0 17px;
            border: none;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-family: inherit;
            font-size: 11px;
            cursor: pointer;
            transition: .2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: var(--plum);
            color: white;
        }

        .btn-soft {
            background: var(--rose-light);
            color: var(--rose-dark);
        }

        .btn-export {
            background: #EAF0E4;
            color: #6F8061;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-top: 25px;
        }

        .summary-card {
            padding: 22px;
            border-radius: 15px;
            background: white;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        .summary-card .label {
            color: var(--muted);
            font-size: 10px;
            letter-spacing: .5px;
        }

        .summary-card .number {
            font-family: 'DM Serif Display', serif;
            color: var(--plum);
            font-size: 35px;
            margin-top: 12px;
        }

        .summary-card .caption {
            color: var(--muted);
            font-size: 10px;
            margin-top: 5px;
        }

        .section {
            margin-top: 38px;
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 15px;
            margin-bottom: 17px;
        }

        .section-kicker {
            color: var(--rose-dark);
            font-size: 9px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 7px;
        }

        .section-title {
            color: var(--plum);
            font-family: 'DM Serif Display', serif;
            font-size: 25px;
            font-weight: 400;
        }

        .table-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background: #FCF3F3;
            color: #927C85;
            text-align: left;
            padding: 15px 17px;
            font-size: 10px;
            font-weight: 500;
            white-space: nowrap;
        }

        td {
            padding: 15px 17px;
            border-top: 1px solid #F5EAEC;
            color: #6F5B64;
            font-size: 11px;
            vertical-align: middle;
        }

        .empty {
            text-align: center;
            color: var(--muted);
            padding: 25px;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 30px;
            font-size: 9px;
        }

        .status-menunggu {
            color: #A17B3F;
            background: #F8F0DD;
        }

        .status-disetujui {
            color: #69845F;
            background: #EAF1E5;
        }

        .status-ditolak {
            color: #B86C78;
            background: #F9E9EB;
        }

        .stats-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .stat-mini {
            background: #FFF9F7;
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 17px;
        }

        .stat-mini span {
            display: block;
            color: var(--muted);
            font-size: 10px;
        }

        .stat-mini strong {
            display: block;
            font-family: 'DM Serif Display', serif;
            font-size: 25px;
            font-weight: 400;
            color: var(--plum);
            margin-top: 8px;
        }

        .measurement-summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        .measurement-box {
            padding: 17px;
            background: #F0F1E9;
            border-radius: 12px;
        }

        .measurement-box span {
            color: #7F856F;
            font-size: 10px;
        }

        .measurement-box strong {
            display: block;
            font-family: 'DM Serif Display', serif;
            font-size: 25px;
            font-weight: 400;
            color: var(--plum);
            margin-top: 8px;
        }

        .footer {
            text-align: center;
            color: #B09BA4;
            font-size: 10px;
            margin-top: 50px;
            line-height: 2;
        }

        .error-text {
            color: #B85F70;
            font-size: 10px;
            margin-top: 6px;
        }

        @media(max-width: 1100px) {
            .summary-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .main {
                padding: 30px;
            }
        }

        @media(max-width: 800px) {
            .layout {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-width: 0;
                padding: 17px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .nav-menu {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
            }

            .sidebar-bottom {
                display: none;
            }

            .main {
                padding: 25px 18px;
            }

            .topbar {
                margin-bottom: 30px;
            }

            .date-text {
                display: none;
            }
        }

        @media(max-width: 480px) {
            .summary-grid {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .summary-card {
                padding: 16px;
            }

            .summary-card .number {
                font-size: 29px;
            }

            .filter-form {
                display: grid;
                grid-template-columns: 1fr 1fr;
            }

            .form-group {
                min-width: 0;
            }

            .filter-form .btn {
                width: 100%;
            }

            .stats-row,
            .measurement-summary {
                grid-template-columns: 1fr;
            }

            .page-title {
                font-size: 32px;
            }

            .logout {
                padding: 10px;
            }
        }

        @media print {
            @page {
                size: A4 landscape;
                margin: 12mm;
            }

            body {
                background: white;
                color: #333;
                font-family: Arial, sans-serif;
            }

            .sidebar,
            .topbar,
            .filter-card,
            .no-print,
            .footer {
                display: none !important;
            }

            .layout {
                display: block;
            }

            .main {
                padding: 0;
            }

            .page-title {
                font-size: 25px;
                color: #333;
            }

            .page-description {
                margin-bottom: 15px;
            }

            .summary-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 8px;
                margin-top: 15px;
            }

            .summary-card,
            .table-card {
                box-shadow: none;
                break-inside: avoid;
            }

            .section {
                margin-top: 20px;
            }

            .section-title {
                font-size: 19px;
            }

            table {
                min-width: 0;
            }

            th,
            td {
                padding: 8px;
                font-size: 9px;
            }

            .table-wrap {
                overflow: visible;
            }

            .table-card {
                overflow: visible;
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

                <div>
                    <div class="brand-name">SABITA</div>
                    <div class="brand-sub">POSYANDU DIGITAL</div>
                </div>
            </a>

            <div class="nav-label">MENU UTAMA</div>

            <nav class="nav-menu">

                <a href="{{ route('admin.dashboard') }}" class="nav-item">
                    <i class="bi bi-grid"></i>
                    Dashboard
                </a>

                <a href="{{ route('pregnancies.index') }}" class="nav-item">
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
                    <i class="bi bi-clipboard-check"></i>
                    Pendaftaran
                </a>

                <a href="{{ route('admin.examinations.index') }}" class="nav-item">
                    <i class="bi bi-heart-pulse"></i>
                    Pemeriksaan
                </a>

                <a href="{{ route('admin.educations.index') }}" class="nav-item">
                    <i class="bi bi-book"></i>
                    Edukasi
                </a>

                <a href="{{ route('admin.reports.index') }}" class="nav-item active">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    Laporan
                </a>

            </nav>

            <div class="sidebar-bottom">
                <div class="admin-profile">
                    <div class="profile-icon">
                        <i class="bi bi-person"></i>
                    </div>

                    <div>
                        <div class="profile-name">Admin SABITA</div>
                        <div class="profile-role">Administrator SABITA</div>
                    </div>
                </div>
            </div>

        </aside>

        <!-- MAIN -->
        <main class="main">

            <div class="topbar">
                <div class="breadcrumb">
                    SABITA &nbsp; / &nbsp; <span>Laporan</span>
                </div>

                <div class="top-actions">
                    <div class="date-text">
                        <i class="bi bi-calendar3"></i>
                        {{ now()->format('l, d F Y') }}
                    </div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="logout" type="submit">
                            <i class="bi bi-box-arrow-right"></i>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>

            <div class="page-heading">
                <div class="section-kicker">Pusat informasi SABITA</div>

                <h1 class="page-title">Laporan & Rekapitulasi</h1>

                <p class="page-description">
                    Pantau dan rekap data ibu hamil, anak, pendaftaran Posyandu,
                    serta hasil pemeriksaan dalam satu halaman.
                </p>
            </div>

            <!-- FILTER -->
            <section class="filter-card no-print">

                <h2 class="filter-title">Filter Periode Laporan</h2>

                <form action="{{ route('admin.reports.index') }}" method="GET" class="filter-form">

                    <div class="form-group">
                        <label for="start_date">Tanggal Mulai</label>
                        <input type="date" name="start_date" id="start_date" value="{{ $startDate }}">
                        @error('start_date')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="end_date">Tanggal Selesai</label>
                        <input type="date" name="end_date" id="end_date" value="{{ $endDate }}">
                        @error('end_date')
                            <div class="error-text">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-funnel"></i>
                        Terapkan
                    </button>

                    <a href="{{ route('admin.reports.index') }}" class="btn btn-soft">
                        <i class="bi bi-arrow-counterclockwise"></i>
                        Reset
                    </a>

                </form>

                <div style="display:flex;gap:10px;flex-wrap:wrap;margin-top:18px">

                    <a href="{{ route('admin.reports.export', request()->only('start_date', 'end_date')) }}"
                        class="btn btn-export">
                        <i class="bi bi-file-earmark-excel"></i>
                        Ekspor Excel
                    </a>

                    <button type="button" onclick="window.print()" class="btn btn-primary">
                        <i class="bi bi-file-earmark-pdf"></i>
                        Cetak / Simpan PDF
                    </button>

                </div>

            </section>

            <!-- RINGKASAN -->
            <section class="summary-grid">

                <div class="summary-card">
                    <div class="label">TOTAL IBU HAMIL</div>
                    <div class="number">{{ number_format($totalPregnancies) }}</div>
                    <div class="caption">Data ibu hamil tercatat</div>
                </div>

                <div class="summary-card">
                    <div class="label">TOTAL BAYI & ANAK</div>
                    <div class="number">{{ number_format($totalChildren) }}</div>
                    <div class="caption">Data anak tercatat</div>
                </div>

                <div class="summary-card">
                    <div class="label">TOTAL PENDAFTARAN</div>
                    <div class="number">{{ number_format($totalRegistrations) }}</div>
                    <div class="caption">Pendaftaran layanan Posyandu</div>
                </div>

                <div class="summary-card">
                    <div class="label">TOTAL PEMERIKSAAN</div>
                    <div class="number">{{ number_format($totalExaminations) }}</div>
                    <div class="caption">Pemeriksaan anak tercatat</div>
                </div>

            </section>

            <!-- STATUS PENDAFTARAN -->
            <section class="section">

                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Statistik layanan</div>
                        <h2 class="section-title">Status Pendaftaran</h2>
                    </div>
                </div>

                <div class="stats-row">

                    <div class="stat-mini">
                        <span>Menunggu</span>
                        <strong>{{ number_format($waitingRegistrations) }}</strong>
                    </div>

                    <div class="stat-mini">
                        <span>Disetujui</span>
                        <strong>{{ number_format($approvedRegistrations) }}</strong>
                    </div>

                    <div class="stat-mini">
                        <span>Ditolak</span>
                        <strong>{{ number_format($rejectedRegistrations) }}</strong>
                    </div>

                </div>

            </section>

            <!-- REKAP PEMERIKSAAN -->
            <section class="section">

                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Pemantauan pertumbuhan</div>
                        <h2 class="section-title">Rata-rata Hasil Pemeriksaan</h2>
                    </div>
                </div>

                <div class="measurement-summary">

                    <div class="measurement-box">
                        <span>Rata-rata Berat Badan</span>
                        <strong>
                            {{ $averageWeight !== null ? number_format($averageWeight, 2, ',', '.') . ' kg' : '-' }}
                        </strong>
                    </div>

                    <div class="measurement-box">
                        <span>Rata-rata Tinggi Badan</span>
                        <strong>
                            {{ $averageHeight !== null ? number_format($averageHeight, 2, ',', '.') . ' cm' : '-' }}
                        </strong>
                    </div>

                    <div class="measurement-box">
                        <span>Rata-rata Lingkar Kepala</span>
                        <strong>
                            {{ $averageHead !== null ? number_format($averageHead, 2, ',', '.') . ' cm' : '-' }}
                        </strong>
                    </div>

                </div>

            </section>

            <!-- TABEL IBU HAMIL -->
            <section class="section">

                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Rekapitulasi data</div>
                        <h2 class="section-title">Data Ibu Hamil</h2>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Ibu</th>
                                    <th>NIK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Golongan Darah</th>
                                    <th>HPL</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($pregnancies as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_ibu }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>{{ $item->golongan_darah ?: '-' }}</td>
                                        <td>{{ $item->tanggal_hpl ?: '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="empty">
                                            Belum ada data ibu hamil pada periode ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

            <!-- TABEL ANAK -->
            <section class="section">

                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Rekapitulasi data</div>
                        <h2 class="section-title">Data Bayi & Anak</h2>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Anak</th>
                                    <th>NIK</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nama Ibu</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($children as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama_anak }}</td>
                                        <td>{{ $item->nik ?: '-' }}</td>
                                        <td>{{ $item->tanggal_lahir }}</td>
                                        <td>
                                            {{ $item->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                        </td>
                                        <td>{{ $item->nama_ibu ?: '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="empty">
                                            Belum ada data anak pada periode ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

            <!-- TABEL PENDAFTARAN -->
            <section class="section">

                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Rekapitulasi layanan</div>
                        <h2 class="section-title">Pendaftaran Posyandu</h2>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Orang Tua</th>
                                    <th>Nama Anak</th>
                                    <th>Kegiatan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($registrations as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user?->name ?? '-' }}</td>
                                        <td>{{ $item->child?->nama_anak ?? '-' }}</td>
                                        <td>{{ $item->schedule?->nama_kegiatan ?? '-' }}</td>
                                        <td>{{ $item->schedule?->tanggal ?? '-' }}</td>
                                        <td>
                                            <span class="status status-{{ $item->status }}">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="empty">
                                            Belum ada pendaftaran pada periode ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

            <!-- TABEL PEMERIKSAAN -->
            <section class="section">

                <div class="section-heading">
                    <div>
                        <div class="section-kicker">Rekapitulasi kesehatan</div>
                        <h2 class="section-title">Hasil Pemeriksaan Anak</h2>
                    </div>
                </div>

                <div class="table-card">
                    <div class="table-wrap">
                        <table>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Nama Anak</th>
                                    <th>Berat Badan</th>
                                    <th>Tinggi Badan</th>
                                    <th>Lingkar Kepala</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($examinations as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->tanggal_pemeriksaan }}</td>
                                        <td>{{ $item->registration?->child?->nama_anak ?? '-' }}</td>
                                        <td>{{ $item->berat_badan }} kg</td>
                                        <td>{{ $item->tinggi_badan }} cm</td>
                                        <td>
                                            {{ $item->lingkar_kepala !== null ? $item->lingkar_kepala . ' cm' : '-' }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="empty">
                                            Belum ada pemeriksaan pada periode ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </section>

            <footer class="footer">
                SABITA · Sistem Informasi Posyandu Digital<br>
                © {{ date('Y') }} SABITA
            </footer>

        </main>

    </div>

</body>

</html>

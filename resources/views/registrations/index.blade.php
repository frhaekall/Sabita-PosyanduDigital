<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pendaftaran Saya | SABITA</title>

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
            --cream: #FFF9F5;
            --paper: #FFFEFC;
            --muted: #99858C;
            --line: #EDE0E2;
            --sage: #899579;
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

        .back-link {
            font-size: 11px;
            color: var(--muted);
            transition: .2s;
        }

        .back-link:hover {
            color: var(--rose);
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
            padding: 35px 40px;
            background: #F2E3E5;
            border-radius: 13px;
            margin-bottom: 28px;
        }

        .hero h1 {
            font: 38px 'DM Serif Display', serif;
            font-weight: 400;
            line-height: 1.2;
            margin: 0 0 12px;
        }

        .hero p {
            color: #856D76;
            font-size: 12px;
            line-height: 1.9;
            margin: 0;
        }

        /* SECTION */

        .section-heading {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 15px;
            margin-bottom: 20px;
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

        /* BUTTON */

        .button-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 5px;
            background: var(--plum);
            color: white;
            font-size: 11px;
            transition: .2s;
            white-space: nowrap;
        }

        .button-primary:hover {
            background: #523542;
            transform: translateY(-1px);
        }

        /* TABLE */

        .table-panel {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 10px;
            overflow: hidden;
        }

        .table-header {
            padding: 22px 25px;
            border-bottom: 1px solid var(--line);
        }

        .table-header h3 {
            font: 23px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 6px;
        }

        .table-header p {
            font-size: 11px;
            color: var(--muted);
            margin: 0;
            line-height: 1.8;
        }

        .table-scroll {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        thead {
            background: #FBF4F3;
        }

        th {
            padding: 16px 20px;
            text-align: left;
            color: #A18B93;
            font-size: 9px;
            letter-spacing: 1px;
            font-weight: 500;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 19px 20px;
            border-top: 1px solid #F1E7E8;
            color: #806B74;
            font-size: 11px;
            line-height: 1.8;
            vertical-align: middle;
        }

        tbody tr {
            transition: background .2s;
        }

        tbody tr:hover {
            background: #FFFAF8;
        }

        .child-name {
            color: var(--plum);
            font-size: 12px;
            font-weight: 500;
        }

        .activity-name {
            color: var(--plum);
            font-weight: 500;
            min-width: 180px;
        }

        .date-text {
            white-space: nowrap;
        }

        .location-text {
            min-width: 140px;
        }

        /* STATUS */

        .status {
            display: inline-flex;
            align-items: center;
            padding: 6px 10px;
            border-radius: 30px;
            font-size: 9px;
            font-weight: 500;
            white-space: nowrap;
        }

        .status.menunggu {
            background: #F8EBD7;
            color: #A47A43;
        }

        .status.disetujui {
            background: #E8EDE4;
            color: #728267;
        }

        .status.ditolak {
            background: #F5E1E4;
            color: #AE667A;
        }

        .admin-note {
            min-width: 150px;
            max-width: 250px;
        }

        /* EMPTY */

        .empty-state {
            padding: 55px 25px;
            text-align: center;
        }

        .empty-icon {
            width: 58px;
            height: 58px;
            margin: 0 auto 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #F4E3E8;
            border-radius: 50%;
            color: var(--rose);
            font: 28px 'DM Serif Display', serif;
        }

        .empty-state h3 {
            font: 25px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 9px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
            margin: 0 0 20px;
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
            .container {
                padding: 35px 22px 60px;
            }

            .hero {
                padding: 30px;
            }

            .section-heading {
                align-items: flex-start;
                flex-direction: column;
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

            .container {
                padding: 30px 6% 55px;
            }

            .hero {
                padding: 25px 22px;
            }

            .hero h1 {
                font-size: 32px;
            }

            .section-heading h2 {
                font-size: 27px;
            }

            .button-primary {
                padding: 11px 14px;
            }

            .table-header {
                padding: 20px;
            }

            th,
            td {
                padding: 15px;
            }

            .footer {
                flex-direction: column;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <a href="{{ route('dashboard') }}" class="brand">SABITA</a>

        <a href="{{ route('dashboard') }}" class="back-link">
            Kembali ke Dashboard
        </a>
    </header>

    <main class="container">

        <div class="welcome-label">
            LAYANAN KESEHATAN KELUARGA
        </div>

        <section class="hero">
            <h1>Pendaftaran Saya</h1>
            <p>
                Pantau pendaftaran layanan Posyandu untuk anak Anda.
            </p>
        </section>

        <section>

            <div class="section-heading">
                <div>
                    <div class="section-kicker">RIWAYAT LAYANAN</div>
                    <h2>Daftar Pendaftaran</h2>
                </div>

                <a href="{{ route('registrations.create') }}" class="button-primary">
                    + Daftar Layanan
                </a>
            </div>

            <div class="table-panel">

                <div class="table-header">
                    <h3>Pendaftaran Posyandu</h3>
                    <p>Daftar pendaftaran yang dikirim dari akun Anda.</p>
                </div>

                @if ($registrations->count())

                    <div class="table-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th>Anak</th>
                                    <th>Kegiatan</th>
                                    <th>Jadwal</th>
                                    <th>Lokasi</th>
                                    <th>Status</th>
                                    <th>Catatan Admin</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($registrations as $registration)
                                    <tr>
                                        <td>
                                            <span class="child-name">
                                                {{ $registration->child->nama_anak }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="activity-name">
                                                {{ $registration->schedule->nama_kegiatan }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="date-text">
                                                {{ $registration->schedule->tanggal->format('d M Y') }}
                                            </span>
                                            <br>
                                            {{ substr($registration->schedule->jam_mulai, 0, 5) }}
                                        </td>

                                        <td>
                                            <span class="location-text">
                                                {{ $registration->schedule->lokasi }}
                                            </span>
                                        </td>

                                        <td>
                                            @if ($registration->status === 'menunggu')
                                                <span class="status menunggu">Menunggu</span>
                                            @elseif($registration->status === 'disetujui')
                                                <span class="status disetujui">Disetujui</span>
                                            @else
                                                <span class="status ditolak">Ditolak</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="admin-note">
                                                {{ $registration->catatan_admin ?: '—' }}
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @else
                    <div class="empty-state">
                        <div class="empty-icon">♡</div>

                        <h3>Belum ada pendaftaran</h3>

                        <p>
                            Anda belum mendaftarkan layanan Posyandu.<br>
                            Silakan pilih jadwal dan daftarkan anak Anda.
                        </p>

                        <a href="{{ route('registrations.create') }}" class="button-primary">
                            + Daftar Layanan
                        </a>
                    </div>

                @endif

            </div>

        </section>

        <footer class="footer">
            <span>SABITA · Sistem Informasi Kesehatan Ibu dan Anak</span>
            <span>Ruang kesehatan keluarga</span>
        </footer>

    </main>

</body>

</html>

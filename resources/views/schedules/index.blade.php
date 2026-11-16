<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Posyandu | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --plum: #684653;
            --rose: #BD718B;
            --cream: #FFF9F5;
            --paper: #FFFEFC;
            --muted: #99858C;
            --line: #EDE0E2;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: var(--plum);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
        }

        .container-page {
            max-width: 1150px;
            margin: auto;
            padding: 35px 25px 60px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .brand {
            font: 28px 'DM Serif Display', serif;
            color: var(--plum);
            text-decoration: none;
        }

        .back {
            padding: 10px 16px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: white;
            color: var(--plum);
            text-decoration: none;
        }

        .back:hover {
            background: #F4E3E8;
        }

        .kicker {
            color: var(--rose);
            letter-spacing: 2px;
            font-size: 10px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h1 {
            font: 38px 'DM Serif Display', serif;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .subtitle {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .schedule-card {
            background: var(--paper);
            border: 1px solid var(--line);
            border-radius: 13px;
            padding: 25px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            gap: 25px;
            align-items: center;
            transition: .2s;
        }

        .schedule-card:hover {
            border-color: #D6A4B4;
            box-shadow: 0 8px 25px rgba(104, 70, 83, .05);
        }

        .schedule-title {
            font: 25px 'DM Serif Display', serif;
            margin-bottom: 10px;
        }

        .schedule-info {
            color: var(--muted);
            line-height: 2;
            font-size: 12px;
        }

        .schedule-info i {
            color: var(--rose);
            width: 20px;
        }

        .service-badge {
            display: inline-block;
            background: #F4E3E8;
            color: #A65E77;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 10px;
            margin-bottom: 12px;
        }

        .btn-register {
            display: inline-block;
            background: var(--plum);
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            white-space: nowrap;
        }

        .btn-register:hover {
            background: #80586B;
            color: white;
        }

        .empty {
            background: white;
            border: 1px dashed var(--line);
            padding: 55px 25px;
            text-align: center;
            border-radius: 13px;
            color: var(--muted);
        }

        .empty i {
            font-size: 35px;
            color: #D6A4B4;
            display: block;
            margin-bottom: 15px;
        }

        .empty h3 {
            font: 25px 'DM Serif Display', serif;
            color: var(--plum);
        }

        .footer {
            margin-top: 45px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
            color: var(--muted);
            font-size: 10px;
        }

        @media(max-width:650px) {
            .container-page {
                padding: 25px 16px;
            }

            h1 {
                font-size: 31px;
            }

            .schedule-card {
                align-items: flex-start;
                flex-direction: column;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container-page">

        <div class="topbar">
            <a href="{{ route('dashboard') }}" class="brand">SABITA</a>
            <a href="{{ route('dashboard') }}" class="back">
                <i class="bi bi-arrow-left me-1"></i> Dashboard
            </a>
        </div>

        <div class="kicker">LAYANAN POSYANDU</div>
        <h1>Jadwal Posyandu</h1>
        <p class="subtitle">
            Temukan kegiatan Posyandu yang tersedia dan daftarkan anak
            untuk mengikuti layanan kesehatan.
        </p>

        @if ($schedules->count())
            @foreach ($schedules as $schedule)
                <div class="schedule-card">
                    <div>
                        <span class="service-badge">
                            {{ $schedule->jenis_layanan }}
                        </span>

                        <div class="schedule-title">
                            {{ $schedule->nama_kegiatan }}
                        </div>

                        <div class="schedule-info">
                            <div>
                                <i class="bi bi-calendar3"></i>
                                {{ $schedule->tanggal->format('d F Y') }}
                            </div>

                            <div>
                                <i class="bi bi-clock"></i>
                                {{ substr($schedule->jam_mulai, 0, 5) }}
                                @if ($schedule->jam_selesai)
                                    – {{ substr($schedule->jam_selesai, 0, 5) }}
                                @endif
                            </div>

                            <div>
                                <i class="bi bi-geo-alt"></i>
                                {{ $schedule->lokasi }}
                            </div>

                            <div>
                                <i class="bi bi-people"></i>
                                Kuota {{ $schedule->kuota }} peserta
                            </div>

                            @if ($schedule->deskripsi)
                                <div class="mt-2">
                                    {{ $schedule->deskripsi }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div>
                        <a href="{{ route('registrations.create') }}" class="btn-register">
                            Daftarkan Anak <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="empty">
                <i class="bi bi-calendar-heart"></i>
                <h3>Belum ada jadwal Posyandu</h3>
                <p class="mb-0">
                    Jadwal kegiatan Posyandu yang tersedia akan muncul di halaman ini.
                </p>
            </div>
        @endif

        <div class="footer">
            SABITA · Sistem Informasi Kesehatan Ibu dan Anak
        </div>

    </div>
</body>

</html>

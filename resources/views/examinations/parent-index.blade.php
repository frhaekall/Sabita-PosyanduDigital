<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemeriksaan Anak Saya | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --pink: #b96e86;
            --pink-dark: #96536a;
            --pink-light: #f8e9ed;
            --cream: #fffaf6;
            --paper: #ffffff;
            --plum: #513746;
            --muted: #927f88;
            --sage: #87977a;
            --border: #f0e4e6;
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

        .topbar {
            background: rgba(255, 255, 255, .92);
            border-bottom: 1px solid var(--border);
            padding: 17px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .brand {
            color: var(--pink-dark);
            font-family: 'DM Serif Display', serif;
            font-size: 27px;
            letter-spacing: 2px;
            line-height: 1.1;
        }

        .brand small {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 9px;
            letter-spacing: 2.5px;
            color: var(--muted);
            margin-top: 4px;
        }

        .back-link {
            color: var(--pink-dark);
            text-decoration: none;
            padding: 10px 15px;
            border: 1px solid var(--border);
            border-radius: 30px;
            background: white;
        }

        .back-link:hover {
            background: var(--pink-light);
            color: var(--pink-dark);
        }

        .container-main {
            max-width: 1120px;
            margin: 45px auto;
            padding: 0 22px;
        }

        .eyebrow {
            color: var(--pink);
            letter-spacing: 2px;
            font-size: 10px;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        h1 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(30px, 5vw, 43px);
            font-weight: 400;
            margin-bottom: 10px;
        }

        .description {
            color: var(--muted);
            line-height: 1.8;
            margin-bottom: 28px;
        }

        .content-card {
            background: var(--paper);
            border: 1px solid var(--border);
            border-radius: 19px;
            padding: 24px;
            box-shadow: 0 12px 35px rgba(91, 52, 69, .045);
        }

        .section-title {
            font-family: 'DM Serif Display', serif;
            font-size: 23px;
            font-weight: 400;
            margin-bottom: 5px;
        }

        .table {
            vertical-align: middle;
            margin-top: 20px;
        }

        .table thead th {
            background: #fcf3f5;
            color: var(--pink-dark);
            border-bottom: 1px solid var(--border);
            font-size: 10px;
            letter-spacing: .7px;
            font-weight: 600;
            padding: 15px 12px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px 12px;
            border-color: #f4eaed;
            color: var(--plum);
        }

        .badge-soft {
            display: inline-block;
            background: #edf2e9;
            color: #647653;
            border-radius: 20px;
            padding: 6px 11px;
            font-size: 10px;
        }

        .empty-state {
            text-align: center;
            padding: 55px 15px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--pink-light);
            color: var(--pink-dark);
            font-size: 25px;
            margin: 0 auto 18px;
        }

        .empty-state h3 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 25px;
        }

        .empty-state p {
            color: var(--muted);
            line-height: 1.8;
        }

        .footer-note {
            color: var(--muted);
            font-size: 11px;
            margin-top: 20px;
        }

        @media (max-width: 650px) {
            .topbar {
                padding: 15px 20px;
            }

            .container-main {
                margin-top: 30px;
                padding: 0 15px;
            }

            .content-card {
                padding: 17px;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <div class="brand">
            SABITA
            <small>POSYANDU DIGITAL</small>
        </div>

        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i>
            Kembali
        </a>
    </header>

    <main class="container-main">

        <div class="eyebrow">Catatan kesehatan anak</div>

        <h1>Pemeriksaan Anak Saya</h1>

        <p class="description">
            Lihat riwayat hasil pemeriksaan anak yang telah dicatat oleh petugas Posyandu.
        </p>

        <section class="content-card">

            <div class="section-title">Riwayat Pemeriksaan</div>

            <p class="text-secondary mb-0">
                Data pemeriksaan berdasarkan pendaftaran layanan milik akun Anda.
            </p>

            @if ($pemeriksaan->isEmpty())

                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-clipboard2-heart"></i>
                    </div>

                    <h3>Belum Ada Hasil Pemeriksaan</h3>

                    <p>
                        Hasil pemeriksaan anak akan muncul di halaman ini
                        setelah petugas Posyandu memasukkan data pemeriksaan.
                    </p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NAMA ANAK</th>
                                <th>KEGIATAN</th>
                                <th>TANGGAL</th>
                                <th>BERAT BADAN</th>
                                <th>TINGGI BADAN</th>
                                <th>LINGKAR KEPALA</th>
                                <th>CATATAN</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pemeriksaan as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>

                                    <td>
                                        {{ $item->registration?->child?->nama_anak ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->registration?->schedule?->nama_kegiatan ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->tanggal_pemeriksaan?->format('d M Y') ?? '-' }}
                                    </td>

                                    <td>
                                        {{ $item->berat_badan !== null ? $item->berat_badan . ' kg' : '-' }}
                                    </td>

                                    <td>
                                        {{ $item->tinggi_badan !== null ? $item->tinggi_badan . ' cm' : '-' }}
                                    </td>

                                    <td>
                                        {{ $item->lingkar_kepala !== null ? $item->lingkar_kepala . ' cm' : '-' }}
                                    </td>

                                    <td>
                                        {{ $item->catatan ?: '-' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif

            <div class="footer-note">
                <i class="bi bi-shield-check me-1"></i>
                Informasi ini hanya dapat dilihat oleh pemilik akun yang bersangkutan.
            </div>

        </section>

    </main>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Detail Pemeriksaan | SABITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --pink: #D98FA6;
            --pink-soft: #F8E9E8;
            --ivory: #FFF9F5;
            --plum: #684653;
            --sage: #A9AD91;
            --text: #493941;
            --muted: #8C7B81;
            --border: #F0E2E5;
            --white: #FFFFFF;
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
            text-decoration: none;
            color: inherit;
        }

        .container {
            width: min(1100px, calc(100% - 50px));
            margin: auto;
        }

        .topbar {
            background: rgba(255, 255, 255, .75);
            border-bottom: 1px solid var(--border);
        }

        .topbar-inner {
            min-height: 85px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .brand {
            font-family: 'DM Serif Display', serif;
            font-size: 31px;
            color: var(--plum);
        }

        .brand small {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 9px;
            letter-spacing: 3px;
            color: var(--muted);
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px 18px;
            border-radius: 8px;
            font-family: inherit;
            font-size: 12px;
            cursor: pointer;
            border: none;
            transition: .2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-back {
            border: 1px solid var(--border);
            color: var(--plum);
            background: white;
        }

        .btn-edit {
            background: var(--plum);
            color: white;
        }

        .btn-delete {
            background: #FCEBED;
            color: #B85F70;
        }

        main {
            padding: 45px 0 80px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 30px;
        }

        .breadcrumb a {
            color: var(--pink);
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .eyebrow {
            color: var(--pink);
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        h1 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(34px, 5vw, 46px);
            font-weight: 400;
            color: var(--plum);
        }

        .subtitle {
            color: var(--muted);
            font-size: 12px;
            margin-top: 10px;
            line-height: 1.8;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1.4fr .8fr;
            gap: 22px;
        }

        .card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(104, 70, 83, .035);
        }

        .card-title {
            font-family: 'DM Serif Display', serif;
            font-size: 23px;
            font-weight: 400;
            color: var(--plum);
            margin-bottom: 25px;
        }

        .info-list {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px 20px;
        }

        .info-label {
            color: var(--muted);
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .info-value {
            color: var(--text);
            font-size: 13px;
            line-height: 1.7;
            overflow-wrap: anywhere;
        }

        .measurement-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-bottom: 25px;
        }

        .measurement {
            background: var(--pink-soft);
            border-radius: 12px;
            padding: 18px 12px;
            text-align: center;
        }

        .measurement span {
            display: block;
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 10px;
        }

        .measurement strong {
            font-family: 'DM Serif Display', serif;
            color: var(--plum);
            font-size: 27px;
            font-weight: 400;
        }

        .measurement small {
            font-size: 10px;
            color: var(--muted);
        }

        .note-box {
            background: #F0F1E9;
            border-radius: 12px;
            padding: 18px;
            margin-top: 15px;
        }

        .note-box p {
            font-size: 12px;
            line-height: 1.9;
            color: #6F7761;
            margin-top: 8px;
            white-space: pre-line;
        }

        .patient-box {
            background: linear-gradient(135deg, #F8E9E8, #FFF1E8);
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .patient-box h3 {
            font-family: 'DM Serif Display', serif;
            font-size: 24px;
            font-weight: 400;
            color: var(--plum);
            margin-bottom: 8px;
        }

        .patient-box p {
            color: var(--muted);
            font-size: 11px;
            line-height: 1.8;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 22px 0;
        }

        .action-area {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
        }

        .empty-note {
            color: var(--muted);
            font-size: 12px;
            font-style: italic;
        }

        @media(max-width: 768px) {
            .content-grid {
                grid-template-columns: 1fr;
            }

            .info-list {
                grid-template-columns: 1fr 1fr;
            }

            .measurement-grid {
                grid-template-columns: 1fr;
            }

            .topbar-inner {
                padding: 15px 0;
                align-items: flex-start;
            }

            .brand {
                font-size: 26px;
            }

            .btn {
                padding: 10px 12px;
                font-size: 10px;
            }
        }

        @media(max-width: 420px) {
            .container {
                width: calc(100% - 30px);
            }

            .info-list {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <div class="container topbar-inner">

            <a href="{{ route('admin.dashboard') }}" class="brand">
                SABITA
                <small>POSYANDU DIGITAL</small>
            </a>

            <div class="top-actions">
                <a href="{{ route('admin.examinations.index') }}" class="btn btn-back">
                    <i class="bi bi-arrow-left"></i>
                    Kembali
                </a>
            </div>

        </div>
    </header>

    <main>
        <div class="container">

            <div class="breadcrumb">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                <i class="bi bi-chevron-right"></i>
                <a href="{{ route('admin.examinations.index') }}">Pemeriksaan</a>
                <i class="bi bi-chevron-right"></i>
                <span>Detail Pemeriksaan</span>
            </div>

            <div class="page-heading">
                <div class="eyebrow">Catatan kesehatan anak</div>
                <h1>Detail Pemeriksaan</h1>
                <p class="subtitle">
                    Informasi lengkap hasil pemeriksaan dan pengukuran tumbuh kembang anak.
                </p>
            </div>

            <div class="content-grid">

                <!-- INFORMASI PEMERIKSAAN -->
                <section class="card">

                    <h2 class="card-title">Hasil Pengukuran</h2>

                    <div class="measurement-grid">

                        <div class="measurement">
                            <span>Berat Badan</span>
                            <strong>{{ number_format((float) $examination->berat_badan, 2, ',', '.') }}</strong>
                            <small>kg</small>
                        </div>

                        <div class="measurement">
                            <span>Tinggi Badan</span>
                            <strong>{{ number_format((float) $examination->tinggi_badan, 2, ',', '.') }}</strong>
                            <small>cm</small>
                        </div>

                        <div class="measurement">
                            <span>Lingkar Kepala</span>

                            @if ($examination->lingkar_kepala !== null)
                                <strong>{{ number_format((float) $examination->lingkar_kepala, 2, ',', '.') }}</strong>
                                <small>cm</small>
                            @else
                                <strong>-</strong>
                                <small>Belum diukur</small>
                            @endif
                        </div>

                    </div>

                    <hr class="divider">

                    <div class="info-list">

                        <div>
                            <div class="info-label">Tanggal Pemeriksaan</div>
                            <div class="info-value">
                                {{ $examination->tanggal_pemeriksaan?->translatedFormat('d F Y') ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <div class="info-label">ID Pemeriksaan</div>
                            <div class="info-value">#{{ $examination->id }}</div>
                        </div>

                        <div>
                            <div class="info-label">Dibuat Pada</div>
                            <div class="info-value">
                                {{ $examination->created_at?->translatedFormat('d F Y, H:i') ?? '-' }}
                            </div>
                        </div>

                        <div>
                            <div class="info-label">Terakhir Diperbarui</div>
                            <div class="info-value">
                                {{ $examination->updated_at?->translatedFormat('d F Y, H:i') ?? '-' }}
                            </div>
                        </div>

                    </div>

                    <div class="note-box">
                        <div class="info-label">
                            <i class="bi bi-journal-text"></i>
                            Catatan Pemeriksaan
                        </div>

                        <p>{{ $examination->catatan ?: 'Belum ada catatan pemeriksaan.' }}</p>
                    </div>

                </section>

                <!-- INFORMASI ANAK DAN PENDAFTAR -->
                <aside>

                    <section class="card">

                        <h2 class="card-title">Informasi Anak</h2>

                        <div class="patient-box">
                            <h3>
                                {{ $examination->registration?->child?->nama_anak ?? 'Nama anak tidak tersedia' }}
                            </h3>

                            <p>
                                Data anak yang terhubung dengan pemeriksaan ini.
                            </p>
                        </div>

                        <div class="info-list">

                            <div>
                                <div class="info-label">Jenis Kelamin</div>
                                <div class="info-value">
                                    @php
                                        $gender = $examination->registration?->child?->jenis_kelamin;
                                    @endphp

                                    {{ $gender === 'L' ? 'Laki-laki' : ($gender === 'P' ? 'Perempuan' : '-') }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">Tanggal Lahir</div>
                                <div class="info-value">
                                    {{ $examination->registration?->child?->tanggal_lahir?->translatedFormat('d F Y') ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">Nama Orang Tua</div>
                                <div class="info-value">
                                    {{ $examination->registration?->user?->name ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">Nama Kegiatan</div>
                                <div class="info-value">
                                    {{ $examination->registration?->schedule?->nama_kegiatan ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">Lokasi Posyandu</div>
                                <div class="info-value">
                                    {{ $examination->registration?->schedule?->lokasi ?? '-' }}
                                </div>
                            </div>

                        </div>

                        <div class="action-area">

                            <a href="{{ route('admin.examinations.edit', $examination) }}" class="btn btn-edit">
                                <i class="bi bi-pencil-square"></i>
                                Edit Pemeriksaan
                            </a>

                            <form action="{{ route('admin.examinations.destroy', $examination) }}" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus data pemeriksaan ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-delete">
                                    <i class="bi bi-trash"></i>
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </section>

                </aside>

            </div>

        </div>
    </main>

</body>

</html>

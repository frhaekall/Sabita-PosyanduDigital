<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #fbf5f1;
            color: #49313c;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .topbar {
            background: rgba(255, 255, 255, .96);
            border-bottom: 1px solid #f0e2e5;
            padding: 17px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            font-family: 'DM Serif Display', serif;
            color: #a64f70;
            font-size: 27px;
            letter-spacing: 2px;
            font-weight: 400;
            line-height: 1.1;
        }

        .brand small {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 9px;
            letter-spacing: 2.5px;
            color: #987b85;
            font-weight: 500;
            margin-top: 4px;
        }

        .topbar a {
            color: #8e536b;
            text-decoration: none;
            font-size: 13px;
        }

        .topbar a:hover {
            color: #a64f70;
        }

        .container {
            max-width: 850px;
            margin: 42px auto;
            padding: 0 20px;
        }

        .eyebrow {
            color: #b16b83;
            font-size: 11px;
            letter-spacing: 2px;
            margin-bottom: 9px;
        }

        h1 {
            font: 38px 'DM Serif Display', serif;
            color: #573847;
            margin-bottom: 8px;
        }

        .intro {
            color: #917b83;
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 25px;
        }

        .panel {
            background: #fff;
            border: 1px solid #f0e3e6;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 12px 35px rgba(91, 54, 69, .05);
        }

        .notice {
            background: #fbf1f4;
            color: #87566a;
            border: 1px solid #f1dce4;
            padding: 14px 16px;
            border-radius: 11px;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 24px;
        }

        .notice strong {
            font-weight: 600;
        }

        .field {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 9px;
            color: #654655;
        }

        select {
            width: 100%;
            padding: 14px;
            border: 1px solid #eadde1;
            border-radius: 10px;
            background: #fffdfd;
            color: #49313c;
            font: 13px 'Plus Jakarta Sans', sans-serif;
            outline: none;
            transition: .2s;
        }

        select:focus {
            border-color: #bd8197;
            box-shadow: 0 0 0 3px #f8edf1;
        }

        select option:disabled {
            color: #b7a7ae;
        }

        .schedule-info {
            background: #faf5f3;
            border: 1px solid #f0e5e4;
            border-radius: 12px;
            padding: 16px;
            margin-top: 12px;
            color: #876e77;
            font-size: 12px;
            line-height: 1.8;
        }

        .schedule-info .info-title {
            color: #654655;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .schedule-info ul {
            padding-left: 18px;
        }

        .error {
            color: #b33c58;
            font-size: 12px;
            margin-top: 7px;
        }

        .alert {
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 18px;
            font-size: 12px;
            background: #fff0f0;
            color: #a33d4b;
            line-height: 1.8;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 10px;
            padding: 13px 20px;
            font: 500 12px 'Plus Jakarta Sans', sans-serif;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .primary {
            background: #a85d79;
            color: white;
        }

        .primary:hover {
            background: #914966;
            color: white;
        }

        .secondary {
            background: #f5edef;
            color: #86596c;
        }

        .secondary:hover {
            background: #eee1e7;
            color: #86596c;
        }

        .empty {
            background: #faf5f3;
            padding: 18px;
            border-radius: 10px;
            color: #927b83;
            font-size: 13px;
            line-height: 1.8;
        }

        .empty a {
            margin-top: 14px;
        }

        .footer {
            text-align: center;
            padding: 25px 20px;
            color: #aa929c;
            font-size: 11px;
        }

        @media(max-width:600px) {
            .topbar {
                padding: 16px 5%;
            }

            .brand {
                font-size: 19px;
            }

            .container {
                margin: 30px auto;
            }

            .panel {
                padding: 20px;
            }

            h1 {
                font-size: 31px;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                text-align: center;
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

        <a href="{{ route('registrations.index') }}">Riwayat Pendaftaran ↗</a>
    </header>

    <main class="container">

        <div class="eyebrow">LAYANAN KESEHATAN KELUARGA</div>

        <h1>Daftarkan Anak</h1>

        <p class="intro">
            Pilih anak dan jadwal layanan Posyandu yang ingin diikuti.
            Pendaftaran akan diperiksa oleh admin.
        </p>

        <section class="panel">

            <div class="notice">
                Pendaftaran hanya dapat dilakukan untuk anak yang terdaftar pada akun Anda.
                Setelah dikirim, status pendaftaran menjadi
                <strong>Menunggu</strong> sampai admin memprosesnya.
            </div>

            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                        <div>• {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @if ($anak->isEmpty())

                <div class="empty">
                    Anda belum memiliki data anak.
                    Tambahkan data anak terlebih dahulu melalui halaman Data Bayi & Anak.

                    <div>
                        <a class="btn primary" href="{{ route('children.index') }}">
                            Buka Data Anak
                        </a>
                    </div>
                </div>
            @elseif ($jadwal->isEmpty())
                <div class="empty">
                    Saat ini belum ada jadwal Posyandu mendatang yang tersedia.
                    Silakan periksa kembali nanti.

                    <div style="margin-top:14px">
                        <a class="btn secondary" href="{{ route('registrations.index') }}">
                            Kembali
                        </a>
                    </div>
                </div>
            @else
                <form method="POST" action="{{ route('registrations.store') }}">
                    @csrf

                    <div class="field">

                        <label for="child_id">Pilih Anak</label>

                        <select name="child_id" id="child_id" required>
                            <option value="">-- Pilih anak --</option>

                            @foreach ($anak as $item)
                                <option value="{{ $item->id }}" @selected(old('child_id') == $item->id)>
                                    {{ $item->nama_anak }}
                                </option>
                            @endforeach
                        </select>

                        @error('child_id')
                            <div class="error">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="field">

                        <label for="schedule_id">Pilih Jadwal Posyandu</label>

                        <select name="schedule_id" id="schedule_id" required>

                            <option value="">-- Pilih jadwal --</option>

                            @foreach ($jadwal as $item)
                                @php
                                    $jumlahTerdaftar = \App\Models\PosyanduRegistration::where('schedule_id', $item->id)
                                        ->whereIn('status', ['menunggu', 'disetujui'])
                                        ->count();

                                    $sisaKuota = max(0, $item->kuota - $jumlahTerdaftar);

                                    $penuh = $sisaKuota <= 0;
                                @endphp

                                <option value="{{ $item->id }}" @selected(old('schedule_id') == $item->id && !$penuh)
                                    @disabled($penuh)>
                                    {{ $item->nama_kegiatan }}
                                    — {{ $item->tanggal->format('d M Y') }}
                                    ({{ substr($item->jam_mulai, 0, 5) }})
                                    {{ $penuh ? '— KUOTA PENUH' : '— Sisa ' . $sisaKuota . ' peserta' }}
                                </option>
                            @endforeach

                        </select>

                        @error('schedule_id')
                            <div class="error">{{ $message }}</div>
                        @enderror

                        <div class="schedule-info">

                            <div class="info-title">Informasi Pendaftaran</div>

                            <ul>
                                <li>Jadwal yang kuotanya penuh tidak dapat dipilih.</li>
                                <li>Pendaftaran menunggu persetujuan admin.</li>
                                <li>Pastikan anak dan jadwal yang dipilih sudah benar.</li>
                            </ul>

                        </div>

                    </div>

                    <div class="actions">

                        <button type="submit" class="btn primary">
                            Kirim Pendaftaran →
                        </button>

                        <a href="{{ route('registrations.index') }}" class="btn secondary">
                            Kembali
                        </a>

                    </div>

                </form>

            @endif

        </section>

    </main>

    <footer class="footer">
        SABITA · Sistem Informasi Posyandu Digital
    </footer>

</body>

</html>

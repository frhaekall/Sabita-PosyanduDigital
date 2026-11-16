<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($schedule) && $schedule->exists ? 'Edit Jadwal' : 'Tambah Jadwal' }} | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #FFF9F5;
            color: #4C3740;
            font-family: 'Plus Jakarta Sans', sans-serif;
            padding: 35px 20px;
        }

        .container {
            max-width: 850px;
            margin: auto;
        }

        .back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #B96F89;
            text-decoration: none;
            font-size: 12px;
            margin-bottom: 25px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading small {
            color: #B96F89;
            letter-spacing: 2px;
            font-size: 10px;
            text-transform: uppercase;
        }

        h1 {
            font: 32px 'DM Serif Display', serif;
            font-weight: 400;
            color: #684653;
            margin: 10px 0;
        }

        .heading p {
            color: #9B8790;
            font-size: 12px;
            line-height: 1.8;
        }

        .card {
            background: #fff;
            border: 1px solid #F0E2E5;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 8px 30px rgba(104, 70, 83, .045);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field.full {
            grid-column: 1/-1;
        }

        label {
            font-size: 12px;
            color: #684653;
        }

        input,
        select,
        textarea {
            width: 100%;
            border: 1px solid #EADDE2;
            background: #FFFCFA;
            border-radius: 10px;
            padding: 12px 13px;
            font: 12px 'Plus Jakarta Sans', sans-serif;
            color: #4C3740;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #D98FA6;
            box-shadow: 0 0 0 3px #F8E9E8;
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .error {
            color: #C2415D;
            font-size: 11px;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #F0E2E5;
        }

        .btn {
            border: 0;
            border-radius: 10px;
            padding: 12px 18px;
            font: 12px 'Plus Jakarta Sans', sans-serif;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-cancel {
            background: #F8E9E8;
            color: #684653;
        }

        .btn-save {
            background: #B96F89;
            color: white;
        }

        .btn-save:hover {
            background: #A85875;
        }

        @media(max-width:600px) {
            body {
                padding: 22px 14px;
            }

            .card {
                padding: 20px;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <a href="{{ route('admin.schedules.index') }}" class="back">
            <i class="bi bi-arrow-left"></i> Kembali ke Jadwal Posyandu
        </a>

        @php
            $isEdit = isset($schedule) && $schedule->exists;
        @endphp

        <div class="heading">
            <small>Manajemen Kegiatan SABITA</small>
            <h1>{{ $isEdit ? 'Edit Jadwal Posyandu' : 'Tambah Jadwal Posyandu' }}</h1>
            <p>Lengkapi informasi kegiatan Posyandu dengan benar.</p>
        </div>

        <div class="card">
            <form action="{{ $isEdit ? route('admin.schedules.update', $schedule) : route('admin.schedules.store') }}"
                method="POST">
                @csrf
                @if ($isEdit)
                    @method('PUT')
                @endif

                <div class="grid">

                    <div class="field full">
                        <label for="nama_kegiatan">Nama Kegiatan *</label>
                        <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                            value="{{ old('nama_kegiatan', $schedule->nama_kegiatan ?? '') }}"
                            placeholder="Contoh: Posyandu Balita Bulanan" required>
                        @error('nama_kegiatan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="jenis_layanan">Jenis Layanan *</label>
                        <select id="jenis_layanan" name="jenis_layanan" required>
                            <option value="">Pilih jenis layanan</option>
                            @foreach (['Posyandu Balita', 'Pemeriksaan Ibu Hamil', 'Imunisasi', 'Penimbangan', 'Pengukuran Tinggi Badan', 'Vitamin', 'Lainnya'] as $layanan)
                                <option value="{{ $layanan }}"
                                    {{ old('jenis_layanan', $schedule->jenis_layanan ?? '') == $layanan ? 'selected' : '' }}>
                                    {{ $layanan }}
                                </option>
                            @endforeach
                        </select>
                        @error('jenis_layanan')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="tanggal">Tanggal Kegiatan *</label>
                        <input type="date" id="tanggal" name="tanggal" min="{{ date('Y-m-d') }}"
                            value="{{ old('tanggal', isset($schedule) && $schedule->tanggal ? $schedule->tanggal->format('Y-m-d') : date('Y-m-d')) }}"
                            required>
                        @error('tanggal')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="jam_mulai">Jam Mulai *</label>
                        <input type="time" id="jam_mulai" name="jam_mulai"
                            value="{{ old('jam_mulai', isset($schedule) && $schedule->jam_mulai ? substr($schedule->jam_mulai, 0, 5) : '08:00') }}"
                            required>
                        @error('jam_mulai')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="time" id="jam_selesai" name="jam_selesai"
                            value="{{ old('jam_selesai', isset($schedule) && $schedule->jam_selesai ? substr($schedule->jam_selesai, 0, 5) : '12:00') }}">
                        @error('jam_selesai')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="lokasi">Lokasi Kegiatan *</label>
                        <input type="text" id="lokasi" name="lokasi"
                            value="{{ old('lokasi', $schedule->lokasi ?? '') }}"
                            placeholder="Contoh: Posyandu Melati, Balai RW 03" required>
                        @error('lokasi')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field">
                        <label for="kuota">Kuota Peserta *</label>
                        <input type="number" id="kuota" name="kuota" min="1"
                            value="{{ old('kuota', $schedule->kuota ?? 30) }}" required>
                        @error('kuota')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field full">
                        <label for="deskripsi">Deskripsi / Informasi Tambahan</label>
                        <textarea id="deskripsi" name="deskripsi"
                            placeholder="Tuliskan informasi kegiatan, persyaratan, atau yang perlu dibawa peserta...">{{ old('deskripsi', $schedule->deskripsi ?? '') }}</textarea>
                        @error('deskripsi')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="actions">
                    <a href="{{ route('admin.schedules.index') }}" class="btn btn-cancel">Batal</a>
                    <button type="submit" class="btn btn-save">
                        <i class="bi bi-check2-circle"></i>
                        {{ $isEdit ? 'Simpan Perubahan' : 'Simpan Jadwal' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>


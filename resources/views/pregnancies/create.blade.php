<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Kehamilan | SABITA</title>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #FFF9F5;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #684653;
        }

        .topbar {
            padding: 30px 8%;
            border-bottom: 1px solid #EADDE0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font: 30px 'DM Serif Display', serif;
            color: #684653;
            text-decoration: none;
        }

        .logout {
            padding: 10px 20px;
            background: #684653;
            color: white;
            border: 0;
            border-radius: 5px;
            cursor: pointer;
            font-family: inherit;
        }

        main {
            max-width: 1000px;
            margin: auto;
            padding: 50px 25px 70px;
        }

        .eyebrow {
            color: #BD718B;
            font-size: 12px;
            letter-spacing: 1.5px;
        }

        h1 {
            font: 42px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 12px 0;
        }

        .subtitle {
            color: #8C7B81;
            font-size: 13px;
            line-height: 1.8;
            margin-bottom: 32px;
        }

        .form-card {
            background: #FFFEFC;
            border: 1px solid #EADDE0;
            border-radius: 8px;
            padding: 32px;
        }

        .section-title {
            font: 24px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 5px;
        }

        .section-description {
            color: #9A858D;
            font-size: 11px;
            margin-bottom: 22px;
        }

        .form-section {
            padding-bottom: 27px;
            margin-bottom: 27px;
            border-bottom: 1px solid #F1E8E9;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 12px;
            margin-bottom: 8px;
            color: #684653;
        }

        .required {
            color: #BD718B;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #EADDE0;
            border-radius: 5px;
            background: #FFFEFC;
            color: #684653;
            font-family: inherit;
            font-size: 12px;
            outline: none;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #BD718B;
            box-shadow: 0 0 0 3px rgba(189, 113, 139, .10);
        }

        textarea {
            resize: vertical;
        }

        .error {
            color: #B5475B;
            font-size: 11px;
            margin-top: 6px;
        }

        .alert {
            background: #FBEDEE;
            color: #9C4656;
            border-radius: 5px;
            padding: 13px 16px;
            font-size: 12px;
            margin-bottom: 22px;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .cancel {
            color: #8C7B81;
            text-decoration: none;
            font-size: 12px;
        }

        .save {
            border: 0;
            border-radius: 5px;
            padding: 13px 21px;
            background: #BD718B;
            color: white;
            font-family: inherit;
            font-size: 12px;
            cursor: pointer;
        }

        .save:hover {
            background: #A95F79;
        }

        @media(max-width: 600px) {
            .topbar {
                padding: 22px 6%;
            }

            main {
                padding: 35px 6%;
            }

            h1 {
                font-size: 34px;
            }

            .form-card {
                padding: 22px 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>
    <header class="topbar">
        <a href="/" class="brand">SABITA</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout" type="submit">Keluar</button>
        </form>
    </header>

    <main>
        <p class="eyebrow">PENDAFTARAN · SABITA</p>
        <h1>Data Kehamilan</h1>
        <p class="subtitle">
            Lengkapi informasi ibu dan kehamilan dengan benar untuk membantu pencatatan layanan Posyandu.
        </p>

        <div class="form-card">
            @if ($errors->any())
                <div class="alert">
                    Ada beberapa data yang perlu diperiksa:
                    <ul style="margin:8px 0 0;padding-left:18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pregnancies.store') }}" method="POST">
                @csrf

                <section class="form-section">
                    <h2 class="section-title">Identitas Ibu</h2>
                    <p class="section-description">Isi informasi identitas dan kontak ibu hamil.</p>

                    <div class="form-grid">
                        <div class="field">
                            <label>NIK <span class="required">*</span></label>
                            <input type="text" name="nik" value="{{ old('nik') }}" maxlength="16"
                                minlength="16" inputmode="numeric" placeholder="16 digit NIK" required>
                            @error('nik')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Nama Lengkap Ibu <span class="required">*</span></label>
                            <input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}"
                                placeholder="Nama lengkap ibu" required>
                            @error('nama_ibu')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Tanggal Lahir <span class="required">*</span></label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                                max="{{ date('Y-m-d', strtotime('-1 day')) }}" required>
                            @error('tanggal_lahir')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Nomor HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                placeholder="Contoh: 081234567890">
                            @error('no_hp')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field full">
                            <label>Alamat Lengkap <span class="required">*</span></label>
                            <textarea name="alamat" rows="3" placeholder="Alamat tempat tinggal" required>{{ old('alamat') }}</textarea>
                            @error('alamat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Nama Suami</label>
                            <input type="text" name="nama_suami" value="{{ old('nama_suami') }}"
                                placeholder="Nama suami">
                            @error('nama_suami')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Golongan Darah</label>
                            <select name="golongan_darah">
                                <option value="">Pilih golongan darah</option>
                                @foreach (['A', 'B', 'AB', 'O'] as $golongan)
                                    <option value="{{ $golongan }}" @selected(old('golongan_darah') === $golongan)>
                                        {{ $golongan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('golongan_darah')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </section>

                <section class="form-section">
                    <h2 class="section-title">Informasi Kehamilan</h2>
                    <p class="section-description">Isi tanggal penting kehamilan jika sudah diketahui.</p>

                    <div class="form-grid">
                        <div class="field">
                            <label>Tanggal HPHT</label>
                            <input type="date" name="tanggal_hpht" value="{{ old('tanggal_hpht') }}"
                                max="{{ date('Y-m-d') }}">
                            @error('tanggal_hpht')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field">
                            <label>Perkiraan Hari Lahir (HPL)</label>
                            <input type="date" name="tanggal_hpl" value="{{ old('tanggal_hpl') }}">
                            @error('tanggal_hpl')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </section>

                <div class="form-actions">
                    <a href="{{ route('pregnancies.index') }}" class="cancel">Kembali</a>
                    <button type="submit" class="save">Simpan Data Kehamilan</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>

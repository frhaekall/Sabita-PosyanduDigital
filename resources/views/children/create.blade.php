<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data Anak | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #FFF9F5;
            color: #684653;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .topbar {
            height: 78px;
            padding: 0 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #EDE0E2;
        }

        .brand {
            font: 30px 'DM Serif Display', serif;
            color: #684653;
            text-decoration: none;
        }

        .logout {
            background: #684653;
            color: white;
            border: 0;
            border-radius: 5px;
            padding: 11px 20px;
            font: 12px 'Plus Jakarta Sans';
            cursor: pointer;
        }

        main {
            max-width: 1000px;
            margin: auto;
            padding: 45px 30px 80px;
        }

        .breadcrumb {
            font-size: 11px;
            color: #99858C;
            margin-bottom: 35px;
        }

        .breadcrumb a {
            color: #BD718B;
            text-decoration: none;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: 2px;
            color: #BD718B;
            margin-bottom: 12px;
        }

        h1 {
            font: 42px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 12px;
        }

        .description {
            color: #99858C;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .form-layout {
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 22px;
            align-items: start;
        }

        .side-note {
            background: #E9EDE5;
            padding: 25px;
            border-radius: 9px;
        }

        .side-note .number {
            font: 38px 'DM Serif Display', serif;
            color: #899579;
            margin-bottom: 18px;
        }

        .side-note h3 {
            font: 23px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 12px;
        }

        .side-note p {
            font-size: 11px;
            line-height: 1.9;
            color: #6F7967;
            margin: 0;
        }

        .form-card {
            background: #FFFEFC;
            border: 1px solid #EDE0E2;
            border-radius: 10px;
            padding: 30px;
        }

        .form-card h2 {
            font: 25px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 8px;
        }

        .form-caption {
            color: #99858C;
            font-size: 11px;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 11px;
        }

        label span {
            color: #BD718B;
        }

        input,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #E8DADD;
            border-radius: 5px;
            background: #FFFEFC;
            color: #684653;
            font: 12px 'Plus Jakarta Sans', sans-serif;
            outline: none;
        }

        input:focus,
        select:focus {
            border-color: #BD718B;
            box-shadow: 0 0 0 3px rgba(189, 113, 139, .10);
        }

        .error {
            color: #B34F65;
            font-size: 10px;
        }

        .alert {
            background: #F9E8E9;
            color: #A64F62;
            border: 1px solid #F0D2D7;
            padding: 14px 16px;
            border-radius: 5px;
            font-size: 12px;
            margin-bottom: 20px;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #EDE0E2;
        }

        .back {
            color: #99858C;
            font-size: 11px;
            text-decoration: none;
        }

        .submit {
            padding: 13px 23px;
            background: #684653;
            color: white;
            border: 0;
            border-radius: 5px;
            font: 11px 'Plus Jakarta Sans';
            cursor: pointer;
        }

        @media(max-width:750px) {
            main {
                padding: 30px 6% 60px;
            }

            .form-layout {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 22px;
            }
        }

        @media(max-width:500px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            h1 {
                font-size: 34px;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .submit {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <header class="topbar">
        <a href="/" class="brand">SABITA</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="logout">Keluar</button>
        </form>
    </header>

    <main>
        <div class="breadcrumb">
            <a href="{{ route('user.dashboard') }}">Dashboard</a>
            &nbsp; / &nbsp;
            <a href="{{ route('children.index') }}">Data Bayi & Anak</a>
            &nbsp; / &nbsp; Tambah
        </div>

        <div class="eyebrow">IDENTITAS BUAH HATI · SABITA</div>
        <h1>Catat buah hati.</h1>
        <p class="description">
            Lengkapi informasi dasar bayi atau anak untuk membuat catatan kesehatan.
        </p>

        @if ($errors->any())
            <div class="alert">
                <strong>Periksa kembali data yang diisi.</strong>
                <ul style="margin:8px 0 0;padding-left:18px">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-layout">
            <aside class="side-note">
                <div class="number">02</div>
                <h3>Data buah hati</h3>
                <p>
                    Masukkan informasi sesuai identitas anak.
                    Data ini akan terhubung dengan akun ibu
                    dan digunakan untuk pencatatan layanan Posyandu.
                </p>
            </aside>

            <section class="form-card">
                <h2>Identitas Anak</h2>
                <div class="form-caption">
                    Kolom bertanda <span style="color:#BD718B">*</span> wajib diisi.
                </div>

                <form action="{{ route('children.store') }}" method="POST">
                    @csrf

                    <div class="form-grid">
                        <div class="field full">
                            <label for="nama_anak">Nama lengkap anak <span>*</span></label>
                            <input type="text" id="nama_anak" name="nama_anak" value="{{ old('nama_anak') }}"
                                maxlength="100" placeholder="Nama lengkap buah hati" required>
                            @error('nama_anak')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="nik">NIK anak</label>
                            <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                                maxlength="16" inputmode="numeric" pattern="[0-9]{16}"
                                placeholder="16 digit NIK (opsional)">
                            @error('nik')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="jenis_kelamin">Jenis kelamin <span>*</span></label>
                            <select id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">Pilih jenis kelamin</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                                </option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                                </option>
                            </select>
                            @error('jenis_kelamin')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="tanggal_lahir">Tanggal lahir <span>*</span></label>
                            <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}" max="{{ date('Y-m-d') }}" required>
                            @error('tanggal_lahir')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}" maxlength="100" placeholder="Kota kelahiran">
                            @error('tempat_lahir')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="nama_ayah">Nama ayah</label>
                            <input type="text" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah') }}"
                                maxlength="100" placeholder="Nama ayah">
                            @error('nama_ayah')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="field">
                            <label for="nama_ibu">Nama ibu</label>
                            <input type="text" id="nama_ibu" name="nama_ibu"
                                value="{{ old('nama_ibu', auth()->user()->name) }}" maxlength="100"
                                placeholder="Nama ibu">
                            @error('nama_ibu')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-footer">
                        <a href="{{ route('children.index') }}" class="back">
                            Kembali ke Data Anak
                        </a>

                        <button type="submit" class="submit">
                            Simpan Data Anak
                        </button>
                    </div>
                </form>
            </section>
        </div>
    </main>

</body>

</html>

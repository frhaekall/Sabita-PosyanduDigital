<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Bayi & Anak | SABITA</title>

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

        a {
            text-decoration: none;
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
            max-width: 1250px;
            margin: auto;
            padding: 45px 35px 75px;
        }

        .breadcrumb {
            font-size: 11px;
            color: #99858C;
            margin-bottom: 35px;
        }

        .breadcrumb a {
            color: #BD718B;
        }

        .eyebrow {
            font-size: 10px;
            letter-spacing: 2px;
            color: #BD718B;
            margin-bottom: 12px;
        }

        h1 {
            font: 43px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 12px;
        }

        .description {
            color: #99858C;
            font-size: 12px;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .section-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .section-head h2 {
            font: 27px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0;
        }

        .add-button {
            background: #684653;
            color: white;
            padding: 13px 20px;
            border-radius: 5px;
            font-size: 11px;
        }

        .alert {
            background: #E9EDE5;
            color: #68745F;
            border: 1px solid #DCE5D5;
            padding: 14px 18px;
            border-radius: 6px;
            font-size: 12px;
            margin-bottom: 22px;
        }

        .children-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .child-card {
            background: #FFFEFC;
            border: 1px solid #EDE0E2;
            border-radius: 9px;
            padding: 25px;
        }

        .child-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .child-number {
            font: 24px 'DM Serif Display', serif;
            color: #BD718B;
        }

        .gender {
            background: #F4E3E8;
            color: #A65E77;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
        }

        .child-card h3 {
            font: 25px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 18px 0 7px;
        }

        .child-card p {
            color: #99858C;
            font-size: 11px;
            line-height: 1.8;
            margin: 0;
        }

        .child-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            padding-top: 20px;
            margin-top: 20px;
            border-top: 1px solid #EDE0E2;
        }

        .info-label {
            font-size: 9px;
            color: #BD718B;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .info-value {
            font-size: 11px;
            color: #684653;
        }

        .empty {
            background: #FFFEFC;
            border: 1px solid #EDE0E2;
            border-radius: 10px;
            padding: 75px 25px;
            text-align: center;
        }

        .empty-number {
            font: 45px 'DM Serif Display', serif;
            color: #D6A4B4;
        }

        .empty h2 {
            font: 27px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 15px 0 10px;
        }

        .empty p {
            color: #99858C;
            font-size: 12px;
            line-height: 1.8;
        }

        .empty a {
            display: inline-block;
            color: #BD718B;
            font-size: 12px;
            margin-top: 15px;
        }

        .back {
            display: inline-block;
            margin-top: 30px;
            color: #BD718B;
            font-size: 11px;
        }

        @media(max-width:700px) {
            main {
                padding: 30px 6% 60px;
            }

            .children-grid {
                grid-template-columns: 1fr;
            }

            .section-head {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 35px;
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
        <div class="breadcrumb">
            <a
                href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}">Dashboard</a>
            &nbsp; / &nbsp; Data Bayi & Anak
        </div>

        <div class="eyebrow">RUANG KESEHATAN KELUARGA · SABITA</div>
        <h1>Data Bayi & Anak</h1>
        <p class="description">Simpan dan pantau informasi identitas serta data dasar buah hati.</p>

        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif

        <div class="section-head">
            <h2>Daftar Buah Hati</h2>
            @if (auth()->user()->role === 'user')
                <a href="{{ route('children.create') }}" class="add-button">＋ Tambah Data Anak</a>
            @endif
        </div>

        @if ($children->count())
            <div class="children-grid">
                @foreach ($children as $child)
                    <article class="child-card">
                        <div class="child-top">
                            <span class="child-number">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="gender">{{ $child->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                        </div>

                        <h3>{{ $child->nama_anak }}</h3>
                        <p>
                            {{ $child->tempat_lahir ?: 'Tempat lahir belum diisi' }}
                            @if ($child->tempat_lahir)
                                ·
                            @endif
                            {{ $child->tanggal_lahir->translatedFormat('d F Y') }}
                        </p>

                        <div class="child-info">
                            <div>
                                <div class="info-label">NIK</div>
                                <div class="info-value">
                                    {{ $child->nik ? '••••••••••••' . substr($child->nik, -4) : 'Belum diisi' }}</div>
                            </div>
                            <div>
                                <div class="info-label">NAMA IBU</div>
                                <div class="info-value">
                                    {{ $child->nama_ibu ?: $child->user->name ?? auth()->user()->name }}
                                </div>
                            </div>
                            @if (auth()->user()->role === 'admin')
                                <div>
                                    <div class="info-label">AKUN ORANG TUA</div>
                                    <div class="info-value">{{ $child->user->name ?? '-' }}</div>
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty">
                <div class="empty-number">01</div>
                <h2>Belum Ada Data Buah Hati</h2>
                <p>
                    Data bayi dan anak yang didaftarkan akan muncul di sini.<br>
                    Orang tua dapat menambahkan data buah hati melalui akun masing-masing.
                </p>
                @if (auth()->user()->role === 'user')
                    <a href="{{ route('children.create') }}">Tambah data anak pertama</a>
                @else
                    <p>Belum ada data anak yang didaftarkan orang tua.</p>
                @endif
            </div>
        @endif

        <a href="{{ auth()->user()->role === 'admin' ? route('admin.dashboard') : route('user.dashboard') }}"
            class="back">
            Kembali ke Dashboard
        </a>
    </main>
</body>

</html>

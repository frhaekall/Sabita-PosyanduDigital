<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Edukasi | SABITA</title>

    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            --shadow: 0 8px 30px rgba(104, 70, 83, .045);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--ivory);
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
            font-size: 13px;
        }

        a {
            text-decoration: none;
            color: inherit;
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
            flex-shrink: 0;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 10px;
            margin-bottom: 42px;
            min-width: 0;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            min-width: 43px;
            border-radius: 14px;
            background: var(--rose-light);
            color: var(--rose-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .brand-copy {
            min-width: 0;
        }

        .brand-name {
            font: 27px 'DM Serif Display', serif;
            color: var(--plum);
            line-height: 1.05;
            white-space: nowrap;
        }

        .brand-sub {
            display: block;
            font-size: 9px;
            font-weight: 500;
            letter-spacing: 1.7px;
            color: var(--muted);
            margin-top: 5px;
            white-space: nowrap;
        }

        .nav-label {
            font-size: 10px;
            letter-spacing: 1.5px;
            color: #B6A3AB;
            padding: 0 12px;
            margin-bottom: 13px;
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
            padding: 13px 14px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 500;
            color: #897681;
            transition: .2s;
        }

        .nav-item i {
            font-size: 17px;
            width: 20px;
            min-width: 20px;
            text-align: center;
        }

        .nav-item:hover {
            background: #FFF2F3;
            color: var(--rose-dark);
        }

        .nav-item.active {
            background: #F8E8EC;
            color: #A85875;
        }

        .sidebar-bottom {
            margin-top: auto;
            padding-top: 25px;
        }

        .profile-mini {
            border-top: 1px solid var(--border);
            padding: 20px 5px 0;
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 50%;
            background: #F3D8E1;
            color: #A85875;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .profile-info {
            min-width: 0;
        }

        .profile-name {
            font-size: 11px;
            color: var(--plum);
            overflow-wrap: anywhere;
        }

        .profile-role {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px;
        }

        .main {
            flex: 1;
            min-width: 0;
            padding: 35px 45px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 35px;
        }

        .breadcrumb {
            font-size: 11px;
            color: var(--muted);
        }

        .breadcrumb span {
            color: var(--rose-dark);
        }

        .top-right {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .date-label {
            font-size: 11px;
            color: #96828C;
            white-space: nowrap;
        }

        .logout-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid var(--border);
            background: white;
            color: var(--plum);
            padding: 10px 15px;
            border-radius: 10px;
            font-family: inherit;
            font-size: 11px;
            cursor: pointer;
            white-space: nowrap;
        }

        .logout-btn:hover {
            background: var(--rose-light);
            border-color: #E8CBD4;
        }

        .page-heading {
            margin-bottom: 27px;
        }

        .page-heading h1 {
            font: 35px 'DM Serif Display', serif;
            font-weight: 400;
            color: var(--plum);
            margin-bottom: 8px;
        }

        .page-heading p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.8;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--rose-dark);
            font-size: 11px;
            margin-bottom: 20px;
        }

        .back-link:hover {
            color: var(--plum);
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 30px;
            box-shadow: var(--shadow);
        }

        .form-label {
            color: var(--plum);
            font-size: 11px;
            margin-bottom: 9px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 11px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 12px;
            color: var(--text);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--rose);
            box-shadow: 0 0 0 3px #D98FA620;
        }

        textarea.form-control {
            min-height: 130px;
            line-height: 1.8;
        }

        .hint {
            color: var(--muted);
            font-size: 10px;
            margin-top: 7px;
        }

        .current-image {
            width: 190px;
            height: 130px;
            object-fit: cover;
            border-radius: 13px;
            border: 1px solid var(--border);
            padding: 4px;
            background: white;
        }

        .no-image {
            width: 190px;
            height: 110px;
            border-radius: 13px;
            background: #F8E8EC;
            color: var(--rose-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            font-size: 11px;
        }

        .btn-save {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--rose-dark);
            color: white;
            border: 0;
            border-radius: 11px;
            padding: 12px 20px;
            font-family: inherit;
            font-size: 11px;
        }

        .btn-save:hover {
            background: var(--plum);
            color: white;
        }

        .btn-cancel {
            display: inline-flex;
            align-items: center;
            padding: 12px 19px;
            border-radius: 11px;
            background: #F8E8EC;
            color: var(--rose-dark);
            font-size: 11px;
        }

        .btn-cancel:hover {
            background: #F2DDE4;
            color: var(--plum);
        }

        .footer {
            text-align: center;
            padding: 35px 0 10px;
            color: #B4A2AA;
            font-size: 10px;
        }

        @media(max-width: 1100px) {
            .sidebar {
                width: 225px;
                min-width: 225px;
                padding-left: 15px;
                padding-right: 15px;
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
                padding: 17px 20px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .brand {
                margin-bottom: 18px;
            }

            .nav-label,
            .sidebar-bottom {
                display: none;
            }

            .nav-menu {
                flex-direction: row;
                overflow-x: auto;
                padding-bottom: 5px;
            }

            .nav-item {
                width: auto;
                white-space: nowrap;
                flex-shrink: 0;
                padding: 10px 13px;
            }

            .main {
                padding: 25px 20px;
            }
        }

        @media(max-width: 560px) {
            .topbar {
                align-items: flex-start;
            }

            .date-label {
                display: none;
            }

            .main {
                padding: 22px 16px;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="layout">

        <aside class="sidebar">
            <a href="{{ route('admin.dashboard') }}" class="brand">
                <div class="brand-icon"><i class="bi bi-flower1"></i></div>
                <div class="brand-copy">
                    <div class="brand-name">SABITA</div>
                    <span class="brand-sub">POSYANDU DIGITAL</span>
                </div>
            </a>

            <div class="nav-label">MENU UTAMA</div>

            <nav class="nav-menu">
                <a href="{{ route('admin.dashboard') }}" class="nav-item">
                    <i class="bi bi-grid"></i><span>Dashboard</span>
                </a>
                <a href="{{ route('pregnancies.index') }}" class="nav-item">
                    <i class="bi bi-person-hearts"></i><span>Data Ibu Hamil</span>
                </a>
                <a href="{{ route('children.index') }}" class="nav-item">
                    <i class="bi bi-person-bounding-box"></i><span>Data Bayi &amp; Anak</span>
                </a>
                <a href="{{ route('admin.schedules.index') }}" class="nav-item">
                    <i class="bi bi-calendar-event"></i><span>Jadwal Posyandu</span>
                </a>
                <a href="{{ route('admin.registrations.index') }}" class="nav-item">
                    <i class="bi bi-clipboard2-check"></i><span>Pendaftaran</span>
                </a>
                <a href="{{ route('admin.examinations.index') }}" class="nav-item">
                    <i class="bi bi-heart-pulse"></i><span>Pemeriksaan</span>
                </a>
                <a href="{{ route('admin.educations.index') }}" class="nav-item active">
                    <i class="bi bi-book"></i><span>Edukasi</span>
                </a>
                <a href="#laporan" class="nav-item">
                    <i class="bi bi-file-earmark-bar-graph"></i><span>Laporan</span>
                </a>
            </nav>

            <div class="sidebar-bottom">
                <div class="profile-mini">
                    <div class="avatar"><i class="bi bi-person"></i></div>
                    <div class="profile-info">
                        <div class="profile-name">{{ auth()->user()->name }}</div>
                        <div class="profile-role">Administrator SABITA</div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="main">
            <div class="topbar">
                <div class="breadcrumb">SABITA / <span>Edit Artikel Edukasi</span></div>
                <div class="top-right">
                    <div class="date-label">
                        <i class="bi bi-calendar3"></i>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>

            <a href="{{ route('admin.educations.index') }}" class="back-link">
                <i class="bi bi-arrow-left"></i> Kembali ke daftar edukasi
            </a>

            <div class="page-heading">
                <h1>Edit Artikel Edukasi</h1>
                <p>Perbarui materi kesehatan yang telah tersimpan.</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.educations.update', $education) }}" method="POST"
                enctype="multipart/form-data" class="form-card">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label">Judul Artikel *</label>
                    <input type="text" name="judul" class="form-control"
                        value="{{ old('judul', $education->judul) }}" maxlength="200" required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Kategori *</label>
                    <select name="kategori" class="form-select" required>
                        @foreach (['Gizi Seimbang', 'Tumbuh Kembang', 'Imunisasi', 'Kesehatan Ibu', 'Kehamilan', 'Hidup Bersih', 'Kesehatan Anak', 'Lainnya'] as $kategori)
                            <option value="{{ $kategori }}" @selected(old('kategori', $education->kategori) === $kategori)>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Ringkasan Artikel</label>
                    <textarea name="ringkasan" class="form-control" rows="3" maxlength="500">{{ old('ringkasan', $education->ringkasan) }}</textarea>
                    <div class="hint">Maksimal 500 karakter.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Isi Artikel *</label>
                    <textarea name="isi" class="form-control" rows="12" required>{{ old('isi', $education->isi) }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label d-block">Gambar Saat Ini</label>

                    @if ($education->gambar)
                        <img src="{{ asset('storage/' . $education->gambar) }}" class="current-image"
                            alt="{{ $education->judul }}">
                    @else
                        <div class="no-image">
                            <i class="bi bi-image"></i> Belum ada gambar
                        </div>
                    @endif

                    <label class="form-label d-block mt-3">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="form-control" accept=".jpg,.jpeg,.png,.webp">
                    <div class="hint">Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.</div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status Artikel *</label>
                    <select name="status" class="form-select" required>
                        <option value="published" @selected(old('status', $education->status) === 'published')>
                            Dipublikasikan
                        </option>
                        <option value="draft" @selected(old('status', $education->status) === 'draft')>
                            Draft
                        </option>
                    </select>
                </div>

                <div class="d-flex flex-wrap justify-content-end gap-2 pt-3">
                    <a href="{{ route('admin.educations.index') }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-save">
                        <i class="bi bi-check-circle"></i> Simpan Perubahan
                    </button>
                </div>
            </form>

            <footer class="footer">
                SABITA · Sistem Informasi Posyandu Digital
                <br><span class="d-inline-block mt-2">© {{ date('Y') }} SABITA</span>
            </footer>
        </main>
    </div>
</body>

</html>

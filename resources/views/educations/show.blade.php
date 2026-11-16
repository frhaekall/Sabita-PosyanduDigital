<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $education->judul }} | SABITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --rose: #A45D76;
            --rose-dark: #754458;
            --blush: #F3E3E7;
            --cream: #FBF7F1;
            --paper: #FFFEFC;
            --plum: #3D3038;
            --muted: #91818A;
            --line: #EDE3E3;
            --sage: #E9EDE5;
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

        a {
            text-decoration: none;
        }

        .topbar {
            height: 76px;
            padding: 0 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--paper);
            border-bottom: 1px solid var(--line);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--rose-dark);
        }

        .brand-mark {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: var(--blush);
            color: var(--rose);
            font-size: 19px;
        }

        .brand-name {
            font: 25px 'DM Serif Display', serif;
            line-height: 1;
        }

        .brand-caption {
            margin-top: 5px;
            color: var(--muted);
            font-size: 8px;
            letter-spacing: 1.6px;
        }

        .back-link {
            color: var(--rose-dark);
            font-size: 11px;
        }

        .back-link:hover {
            color: var(--rose);
        }

        .article-header {
            max-width: 850px;
            margin: auto;
            padding: 68px 25px 35px;
            text-align: center;
        }

        .breadcrumb {
            display: flex;
            justify-content: center;
            gap: 9px;
            align-items: center;
            color: #AA9BA2;
            font-size: 10px;
            margin-bottom: 30px;
        }

        .breadcrumb a {
            color: var(--rose);
        }

        .category {
            display: inline-block;
            background: var(--blush);
            color: var(--rose-dark);
            border-radius: 30px;
            padding: 8px 15px;
            font-size: 9px;
            letter-spacing: 1px;
            margin-bottom: 21px;
        }

        h1 {
            color: var(--rose-dark);
            font: clamp(36px, 5vw, 55px)/1.17 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 auto 22px;
            max-width: 790px;
        }

        .article-meta {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 18px;
            color: var(--muted);
            font-size: 10px;
        }

        .meta-divider {
            width: 4px;
            height: 4px;
            background: #CDA8B5;
            border-radius: 50%;
        }

        .cover-wrap {
            max-width: 1050px;
            padding: 0 25px;
            margin: 0 auto 55px;
        }

        .article-cover {
            display: block;
            width: 100%;
            max-height: 510px;
            aspect-ratio: 16 / 8;
            object-fit: cover;
            border-radius: 3px;
        }

        .cover-placeholder {
            width: 100%;
            height: 350px;
            display: grid;
            place-items: center;
            background: var(--blush);
            color: var(--rose);
            font-size: 75px;
        }

        .article-layout {
            max-width: 1050px;
            margin: auto;
            padding: 0 25px 85px;
            display: grid;
            grid-template-columns: minmax(0, 690px) 220px;
            gap: 75px;
            align-items: start;
        }

        .article-main {
            min-width: 0;
        }

        .article-summary {
            color: var(--rose-dark);
            font: 22px/1.65 'DM Serif Display', serif;
            font-weight: 400;
            padding: 0 0 27px 23px;
            border-left: 2px solid #C98CA2;
            margin-bottom: 35px;
        }

        .article-content {
            color: #62535A;
            font-size: 13px;
            line-height: 2.15;
            overflow-wrap: anywhere;
        }

        .article-content p {
            margin: 0 0 23px;
        }

        .article-content h2,
        .article-content h3 {
            color: var(--rose-dark);
            font: 29px/1.3 'DM Serif Display', serif;
            font-weight: 400;
            margin: 38px 0 15px;
        }

        .article-content ul,
        .article-content ol {
            padding-left: 24px;
            margin: 0 0 25px;
        }

        .article-content li {
            padding-left: 5px;
            margin-bottom: 9px;
        }

        .article-aside {
            position: sticky;
            top: 30px;
        }

        .aside-card {
            border-top: 1px solid #DCC9CF;
            padding-top: 18px;
            margin-bottom: 27px;
        }

        .aside-label {
            color: var(--rose);
            font-size: 9px;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .aside-text {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.9;
        }

        .aside-link {
            display: inline-flex;
            gap: 8px;
            align-items: center;
            color: var(--rose-dark);
            font-size: 10px;
            margin-top: 10px;
        }

        .article-end {
            border-top: 1px solid var(--line);
            margin-top: 48px;
            padding-top: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .end-note {
            color: var(--muted);
            font: 17px 'DM Serif Display', serif;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 12px 17px;
            background: var(--rose-dark);
            color: white;
            font-size: 10px;
            transition: .2s;
        }

        .back-button:hover {
            background: var(--rose);
            color: white;
        }

        footer {
            border-top: 1px solid var(--line);
            background: var(--paper);
            padding: 24px;
            text-align: center;
            color: var(--muted);
            font-size: 10px;
        }

        @media (max-width: 850px) {
            .article-layout {
                grid-template-columns: 1fr;
                gap: 35px;
                max-width: 760px;
            }

            .article-aside {
                position: static;
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 20px;
            }

            .cover-wrap {
                margin-bottom: 40px;
            }
        }

        @media (max-width: 576px) {
            .topbar {
                height: 66px;
                padding: 0 18px;
            }

            .article-header {
                padding: 43px 20px 27px;
            }

            h1 {
                font-size: 37px;
            }

            .breadcrumb {
                margin-bottom: 23px;
            }

            .cover-wrap {
                padding: 0 15px;
                margin-bottom: 35px;
            }

            .article-cover {
                aspect-ratio: 4 / 3;
            }

            .cover-placeholder {
                height: 230px;
            }

            .article-layout {
                padding: 0 21px 55px;
            }

            .article-summary {
                font-size: 19px;
            }

            .article-content {
                font-size: 12px;
            }

            .article-aside {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .article-end {
                align-items: flex-start;
                flex-direction: column;
            }

            .brand-name {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <nav class="topbar">
        <a href="{{ route('user.dashboard') }}" class="brand">
            <span class="brand-mark"><i class="bi bi-heart-pulse"></i></span>
            <span>
                <span class="brand-name d-block">SABITA</span>
                <span class="brand-caption d-block">POSYANDU DIGITAL</span>
            </span>
        </a>

        <a href="{{ route('educations.index') }}" class="back-link">
            <i class="bi bi-arrow-left me-1"></i> Semua artikel
        </a>
    </nav>

    <header class="article-header">
        <div class="breadcrumb">
            <a href="{{ route('user.dashboard') }}">Beranda</a>
            <span>/</span>
            <a href="{{ route('educations.index') }}">Edukasi</a>
            <span>/</span>
            <span>Artikel</span>
        </div>

        <span class="category">{{ $education->kategori }}</span>

        <h1>{{ $education->judul }}</h1>

        <div class="article-meta">
            <span><i class="bi bi-calendar3 me-1"></i>
                {{ $education->published_at?->format('d F Y') ?? '-' }}
            </span>
            <span class="meta-divider"></span>
            <span><i class="bi bi-book me-1"></i> Bacaan SABITA</span>
        </div>
    </header>

    <div class="cover-wrap">
        @if ($education->gambar)
            <img src="{{ asset('storage/' . $education->gambar) }}" alt="{{ $education->judul }}" class="article-cover">
        @else
            <div class="cover-placeholder">
                <i class="bi bi-flower1"></i>
            </div>
        @endif
    </div>

    <main class="article-layout">
        <article class="article-main">
            @if ($education->ringkasan)
                <div class="article-summary">
                    {{ $education->ringkasan }}
                </div>
            @endif

            <div class="article-content">
                {!! nl2br(e($education->isi)) !!}
            </div>

            <div class="article-end">
                <span class="end-note">Sehat bersama, tumbuh bersama.</span>
                <a href="{{ route('educations.index') }}" class="back-button">
                    <i class="bi bi-arrow-left"></i>
                    Kembali ke edukasi
                </a>
            </div>
        </article>

        <aside class="article-aside">
            <div class="aside-card">
                <div class="aside-label">TENTANG SABITA</div>
                <div class="aside-text">
                    SABITA hadir untuk mendukung keluarga mendapatkan informasi kesehatan ibu dan anak.
                </div>
            </div>

            <div class="aside-card">
                <div class="aside-label">LANJUTKAN MEMBACA</div>
                <div class="aside-text">
                    Temukan bacaan kesehatan lainnya di ruang edukasi SABITA.
                </div>
                <a href="{{ route('educations.index') }}" class="aside-link">
                    Jelajahi artikel <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </aside>
    </main>

    <footer>SABITA · Sistem Informasi Posyandu Digital © 2026</footer>

</body>

</html>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ruang Edukasi | SABITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

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
            background: rgba(255, 254, 252, .94);
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

        .nav-back {
            color: var(--rose-dark);
            font-size: 12px;
        }

        .nav-back:hover {
            color: var(--rose);
        }

        .page {
            max-width: 1160px;
            padding: 65px 28px 85px;
            margin: auto;
        }

        .intro {
            text-align: center;
            max-width: 680px;
            margin: 0 auto 48px;
        }

        .eyebrow {
            color: var(--rose);
            letter-spacing: 3px;
            font-size: 9px;
            margin-bottom: 15px;
        }

        .intro h1 {
            color: var(--rose-dark);
            font: 48px/1.15 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 15px;
        }

        .intro p {
            max-width: 560px;
            margin: auto;
            color: var(--muted);
            line-height: 2;
            font-size: 12px;
        }

        .section-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 19px;
        }

        .section-heading h2 {
            color: var(--rose-dark);
            font: 27px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0;
        }

        .article-total {
            color: var(--muted);
            font-size: 10px;
        }

        .featured {
            display: grid;
            grid-template-columns: 1.12fr .88fr;
            min-height: 340px;
            background: var(--paper);
            border: 1px solid var(--line);
            margin-bottom: 58px;
            overflow: hidden;
        }

        .featured-visual {
            min-height: 340px;
            background: var(--blush);
            overflow: hidden;
        }

        .featured-visual img {
            width: 100%;
            height: 100%;
            min-height: 340px;
            object-fit: cover;
            display: block;
            transition: transform .5s ease;
        }

        .featured:hover .featured-visual img {
            transform: scale(1.035);
        }

        .visual-empty {
            height: 100%;
            min-height: 340px;
            display: grid;
            place-items: center;
            color: var(--rose);
            font-size: 65px;
        }

        .featured-copy {
            padding: 43px 42px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }

        .eyebrow-small {
            color: var(--rose);
            letter-spacing: 2px;
            font-size: 9px;
            margin-bottom: 18px;
        }

        .category {
            color: var(--rose);
            background: var(--blush);
            border-radius: 30px;
            padding: 7px 12px;
            font-size: 9px;
            margin-bottom: 17px;
        }

        .featured h3 {
            color: var(--rose-dark);
            font: 36px/1.22 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 15px;
        }

        .featured p {
            color: var(--muted);
            line-height: 2;
            font-size: 11px;
            margin: 0 0 22px;
        }

        .meta {
            color: var(--muted);
            font-size: 10px;
            margin-bottom: 22px;
        }

        .read-link {
            color: var(--rose-dark);
            border-bottom: 1px solid #C99BAA;
            padding-bottom: 7px;
            font-size: 11px;
            display: inline-flex;
            align-items: center;
            gap: 18px;
        }

        .read-link i {
            transition: transform .2s;
        }

        .read-link:hover {
            color: var(--rose);
        }

        .read-link:hover i {
            transform: translateX(4px);
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 30px 24px;
        }

        .article-card {
            color: inherit;
            display: block;
            min-width: 0;
        }

        .card-image {
            width: 100%;
            height: 205px;
            object-fit: cover;
            display: block;
            background: var(--blush);
            transition: transform .45s ease;
        }

        .image-frame {
            overflow: hidden;
            position: relative;
            background: var(--blush);
        }

        .image-fallback {
            height: 205px;
            display: grid;
            place-items: center;
            color: var(--rose);
            font-size: 43px;
        }

        .article-card:hover .card-image {
            transform: scale(1.04);
        }

        .card-copy {
            padding: 17px 2px 0;
        }

        .card-category {
            color: var(--rose);
            font-size: 9px;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .card-title {
            color: var(--rose-dark);
            font: 24px/1.3 'DM Serif Display', serif;
            font-weight: 400;
            margin: 0 0 9px;
        }

        .card-summary {
            color: var(--muted);
            font-size: 10px;
            line-height: 1.9;
            margin: 0 0 13px;
        }

        .card-date {
            color: #A99BA1;
            font-size: 9px;
        }

        .empty-state {
            padding: 65px 20px;
            text-align: center;
            border: 1px solid var(--line);
            background: var(--paper);
        }

        .empty-state i {
            color: #C58A9D;
            font-size: 42px;
        }

        .empty-state h3 {
            color: var(--rose-dark);
            font: 29px 'DM Serif Display', serif;
            font-weight: 400;
            margin: 15px 0 8px;
        }

        .empty-state p {
            color: var(--muted);
            font-size: 11px;
        }

        .pagination {
            margin-top: 45px;
        }

        .pagination .page-link {
            color: var(--rose-dark);
            border-color: var(--line);
            background: var(--paper);
            font-size: 11px;
        }

        .pagination .active .page-link {
            background: var(--rose);
            border-color: var(--rose);
            color: white;
        }

        footer {
            border-top: 1px solid var(--line);
            padding: 24px;
            text-align: center;
            color: var(--muted);
            font-size: 10px;
            background: var(--paper);
        }

        @media (max-width: 850px) {
            .featured {
                grid-template-columns: 1fr 1fr;
            }

            .featured-copy {
                padding: 28px;
            }

            .featured h3 {
                font-size: 30px;
            }

            .article-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .topbar {
                height: 66px;
                padding: 0 18px;
            }

            .page {
                padding: 43px 19px 60px;
            }

            .intro {
                margin-bottom: 35px;
            }

            .intro h1 {
                font-size: 37px;
            }

            .featured {
                grid-template-columns: 1fr;
            }

            .featured-visual,
            .featured-visual img {
                min-height: 230px;
                height: 230px;
            }

            .visual-empty {
                min-height: 230px;
            }

            .featured-copy {
                padding: 26px 23px 30px;
            }

            .featured h3 {
                font-size: 31px;
            }

            .article-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .card-image,
            .image-fallback {
                height: 225px;
            }

            .section-heading h2 {
                font-size: 24px;
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
        <a href="{{ route('user.dashboard') }}" class="nav-back">
            <i class="bi bi-arrow-left me-1"></i> Dashboard
        </a>
    </nav>

    <main class="page">
        <header class="intro">
            <div class="eyebrow">SABITA JOURNAL · KNOWLEDGE & CARE</div>
            <h1>Ruang Edukasi</h1>
            <p>
                Ruang untuk mengenal kesehatan ibu dan anak lebih dekat.
                Temukan bacaan pilihan untuk menemani setiap tahap tumbuh kembang keluarga.
            </p>
        </header>

        @if ($educations->count())
            @php
                $featured = $educations->first();
                $otherEducations = $educations->skip(1);
            @endphp

            <section>
                <div class="section-heading">
                    <h2>Pilihan untuk dibaca</h2>
                    <span class="article-total">{{ $educations->total() }} artikel</span>
                </div>

                <a href="{{ route('educations.show', $featured) }}" class="featured text-decoration-none">
                    <div class="featured-visual">
                        @if ($featured->gambar)
                            <img src="{{ asset('storage/' . $featured->gambar) }}" alt="{{ $featured->judul }}">
                        @else
                            <div class="visual-empty"><i class="bi bi-flower1"></i></div>
                        @endif
                    </div>

                    <div class="featured-copy">
                        <div class="eyebrow-small">ARTIKEL PILIHAN</div>
                        <span class="category">{{ $featured->kategori }}</span>
                        <h3>{{ $featured->judul }}</h3>
                        <p>
                            {{ $featured->ringkasan ?: \Illuminate\Support\Str::limit(strip_tags($featured->isi), 150) }}
                        </p>
                        <div class="meta">
                            <i class="bi bi-calendar3 me-1"></i>
                            {{ $featured->published_at?->format('d F Y') ?? '-' }}
                        </div>
                        <span class="read-link">
                            Baca artikel <i class="bi bi-arrow-right"></i>
                        </span>
                    </div>
                </a>
            </section>

            @if ($otherEducations->count())
                <section>
                    <div class="section-heading">
                        <h2>Bacaan lainnya</h2>
                        <span class="article-total">Jelajahi artikel</span>
                    </div>

                    <div class="article-grid">
                        @foreach ($otherEducations as $education)
                            <a href="{{ route('educations.show', $education) }}" class="article-card">
                                <div class="image-frame">
                                    @if ($education->gambar)
                                        <img src="{{ asset('storage/' . $education->gambar) }}"
                                            alt="{{ $education->judul }}" class="card-image">
                                    @else
                                        <div class="image-fallback"><i class="bi bi-journal-richtext"></i></div>
                                    @endif
                                </div>

                                <div class="card-copy">
                                    <div class="card-category">{{ $education->kategori }}</div>
                                    <h3 class="card-title">{{ $education->judul }}</h3>
                                    <p class="card-summary">
                                        {{ $education->ringkasan ?: \Illuminate\Support\Str::limit(strip_tags($education->isi), 115) }}
                                    </p>
                                    <div class="card-date">
                                        <i class="bi bi-calendar3 me-1"></i>
                                        {{ $education->published_at?->format('d F Y') ?? '-' }}
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </section>
            @endif

            <div class="d-flex justify-content-center">
                {{ $educations->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="bi bi-journal-bookmark"></i>
                <h3>Belum Ada Artikel</h3>
                <p>Artikel edukasi kesehatan belum tersedia. Silakan kunjungi kembali nanti.</p>
            </div>
        @endif
    </main>

    <footer>SABITA · Sistem Informasi Posyandu Digital © 2026</footer>

</body>

</html>

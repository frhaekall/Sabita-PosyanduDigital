<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SABITA — Sahabat Ibu & Balita</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --pink: #D98FA6;
            --pink-dark: #B96F89;
            --pink-soft: #F8E9E8;
            --ivory: #FFF9F5;
            --paper: #FFFEFC;
            --plum: #684653;
            --text: #493941;
            --muted: #8C7B81;
            --sage: #A9AD91;
            --border: #EEDFE3;
            --shadow: 0 15px 45px rgba(104, 70, 83, .07);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px;
        }

        body {
            background: var(--ivory);
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        button {
            font-family: inherit;
        }

        .container {
            width: min(1180px, calc(100% - 60px));
            margin: auto;
        }

        /* NAVIGATION */

        .navbar {
            border-bottom: 1px solid #EDE0E1;
            background: rgba(255, 249, 245, .96);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(15px);
        }

        .nav-inner {
            min-height: 85px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            font-family: 'DM Serif Display', serif;
            font-size: 34px;
            color: var(--plum);
            letter-spacing: 1px;
            line-height: 1;
        }

        .brand small {
            display: block;
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 9px;
            letter-spacing: 3px;
            color: var(--muted);
            margin-top: 7px;
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 30px;
            font-size: 12px;
            color: #79656F;
        }

        .nav-menu a {
            transition: color .25s ease;
        }

        .nav-menu a:hover {
            color: var(--pink-dark);
        }

        .nav-button {
            padding: 13px 23px;
            background: var(--plum);
            color: white;
            font-size: 12px;
            border-radius: 7px;
            transition: .25s ease;
            white-space: nowrap;
        }

        .nav-button:hover {
            background: var(--pink-dark);
            transform: translateY(-2px);
        }

        /* HERO */

        .hero {
            padding: 85px 0 100px;
            overflow: hidden;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 60px;
        }

        .eyebrow {
            color: var(--pink-dark);
            font-size: 10px;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 25px;
        }

        h1 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: clamp(52px, 6vw, 78px);
            line-height: 1.08;
            color: var(--plum);
        }

        h1 em {
            color: var(--pink);
            font-weight: 400;
        }

        .hero-text {
            margin-top: 25px;
            max-width: 460px;
            font-size: 13px;
            line-height: 2;
            color: var(--muted);
        }

        .hero-actions {
            display: flex;
            gap: 15px;
            margin-top: 32px;
            flex-wrap: wrap;
        }

        .btn-primary,
        .btn-outline {
            display: inline-block;
            padding: 15px 24px;
            font-size: 12px;
            border-radius: 7px;
            transition: .25s ease;
        }

        .btn-primary {
            background: var(--plum);
            color: white;
        }

        .btn-primary:hover {
            background: var(--pink-dark);
            transform: translateY(-3px);
        }

        .btn-outline {
            border: 1px solid #DCC8D0;
            color: var(--plum);
        }

        .btn-outline:hover {
            background: var(--pink-soft);
            transform: translateY(-3px);
        }

        /* HERO IMAGE */

        .hero-image {
            position: relative;
            height: 470px;
        }

        .image-frame {
            position: absolute;
            right: 30px;
            top: 0;
            width: 370px;
            height: 440px;
            overflow: hidden;
            border-radius: 190px 190px 8px 8px;
            background: #E8C6CE;
        }

        .image-frame img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            animation: gentleFloat 5s ease-in-out infinite;
        }

        .image-decoration {
            position: absolute;
            width: 380px;
            height: 440px;
            right: 10px;
            top: 20px;
            border: 1px solid #D9A9B8;
            border-radius: 190px 190px 8px 8px;
        }

        .image-label {
            position: absolute;
            left: 0;
            bottom: 35px;
            background: white;
            padding: 20px 25px;
            box-shadow: 0 10px 30px #68465312;
            z-index: 2;
        }

        .image-label h3 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 21px;
            color: var(--plum);
        }

        .image-label p {
            font-size: 10px;
            color: var(--muted);
            margin-top: 5px;
        }

        .hero-copy>* {
            opacity: 0;
            animation: slideFromLeft .85s cubic-bezier(.22, 1, .36, 1) forwards;
        }

        .hero-copy .eyebrow {
            animation-delay: .15s;
        }

        .hero-copy h1 {
            animation-delay: .3s;
        }

        .hero-copy .hero-text {
            animation-delay: .48s;
        }

        .hero-copy .hero-actions {
            animation-delay: .65s;
        }

        .hero-image-enter {
            opacity: 0;
            animation: slideFromRight 1.1s cubic-bezier(.22, 1, .36, 1) .25s forwards;
        }

        .image-label-enter {
            opacity: 0;
            animation: slideFromBottom .8s cubic-bezier(.22, 1, .36, 1) 1s forwards;
        }

        @keyframes slideFromLeft {
            from {
                opacity: 0;
                transform: translateX(-65px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideFromRight {
            from {
                opacity: 0;
                transform: translateX(75px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideFromBottom {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gentleFloat {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-9px);
            }
        }

        /* INTRO */

        .intro {
            background: var(--plum);
            padding: 27px 0;
            color: white;
        }

        .intro-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .intro h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 25px;
            font-weight: 400;
        }

        .intro p {
            font-size: 11px;
            color: #E9D8DF;
        }

        /* SERVICES */

        .services {
            padding: 105px 0;
        }

        .section-header {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 60px;
        }

        .section-label {
            font-size: 10px;
            letter-spacing: 3px;
            color: var(--pink-dark);
            text-transform: uppercase;
        }

        .section-header h2 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 48px;
            color: var(--plum);
            line-height: 1.2;
            margin-top: 18px;
        }

        .section-header p {
            font-size: 12px;
            line-height: 2;
            color: var(--muted);
            margin-top: 17px;
        }

        .service-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 35px;
        }

        .service {
            border-top: 1px solid #E5D4DB;
            padding-top: 25px;
            transition: transform .3s ease;
        }

        .service:hover {
            transform: translateY(-5px);
        }

        .service-number {
            font-family: 'DM Serif Display', serif;
            font-size: 22px;
            color: #D9A5B5;
        }

        .service h3 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 25px;
            color: var(--plum);
            margin-top: 25px;
        }

        .service p {
            font-size: 12px;
            color: var(--muted);
            line-height: 2;
            margin-top: 15px;
        }

        .service a {
            display: inline-block;
            margin-top: 23px;
            font-size: 11px;
            color: var(--pink-dark);
        }

        .service a:hover {
            text-decoration: underline;
        }

        /* ABOUT */

        .about {
            background: var(--pink-soft);
            padding: 90px 0;
        }

        .about-grid {
            display: grid;
            grid-template-columns: .8fr 1.2fr;
            gap: 80px;
            align-items: center;
        }

        .about-visual {
            position: relative;
            width: 100%;
            max-width: 420px;
            height: 430px;
            margin: auto;
        }

        .about-visual::before {
            content: "";
            position: absolute;
            width: 85%;
            height: 90%;
            left: -15px;
            top: 20px;
            border: 1px solid #D9A9B8;
            border-radius: 190px 190px 12px 12px;
        }

        .about-visual img {
            position: relative;
            width: 90%;
            height: 100%;
            object-fit: cover;
            border-radius: 190px 190px 12px 12px;
            display: block;
            margin-left: auto;
            box-shadow: 0 20px 50px rgba(104, 70, 83, .12);
        }

        .about-photo-label {
            position: absolute;
            left: 0;
            bottom: 25px;
            z-index: 2;
            padding: 20px 24px;
            background: #FFFEFC;
            box-shadow: 0 10px 30px rgba(104, 70, 83, .10);
        }

        .about-photo-label span {
            font-size: 9px;
            letter-spacing: 2px;
            color: #B96F89;
        }

        .about-photo-label p {
            margin-top: 7px;
            font-family: 'DM Serif Display', serif;
            font-size: 19px;
            color: #684653;
        }

        @media(max-width: 768px) {
            .about-visual {
                max-width: 330px;
                height: 350px;
            }
        }

        .about h2 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 48px;
            color: var(--plum);
            line-height: 1.15;
            margin-top: 17px;
        }

        .about p {
            font-size: 12px;
            line-height: 2;
            color: #806F75;
            margin-top: 20px;
        }

        /* FAQ HORIZONTAL SLIDER */

        .faq-section {
            padding: 105px 0;
            background:
                radial-gradient(circle at 10% 20%, #F8E5E9 0, transparent 30%),
                radial-gradient(circle at 90% 80%, #FCEBDD 0, transparent 30%),
                #FFF9F5;
            overflow: hidden;
        }

        .faq-heading {
            text-align: center;
            margin-bottom: 50px;
        }

        .faq-label {
            color: #BD718B;
            font-size: 10px;
            letter-spacing: 3px;
        }

        .faq-heading h2 {
            font-family: 'DM Serif Display', serif;
            font-size: clamp(40px, 5vw, 58px);
            font-weight: 400;
            line-height: 1.15;
            color: var(--plum);
            margin-top: 18px;
        }

        .faq-heading h2 em {
            color: var(--pink);
            font-weight: 400;
        }

        .faq-heading p {
            font-size: 12px;
            color: var(--muted);
            margin-top: 18px;
        }

        .faq-slider {
            display: flex;
            align-items: center;
            gap: 22px;
            max-width: 1050px;
            margin: auto;
        }

        .faq-window {
            width: 100%;
            min-width: 0;
            overflow: hidden;
            border-radius: 28px;
            box-shadow: 0 20px 55px rgba(104, 70, 83, .10);
            touch-action: pan-y;
            cursor: grab;
        }

        .faq-window.dragging {
            cursor: grabbing;
        }

        .faq-track {
            display: flex;
            width: 100%;
            transition: transform .7s cubic-bezier(.22, 1, .36, 1);
            will-change: transform;
        }

        .faq-card {
            position: relative;
            flex: 0 0 100%;
            min-width: 100%;
            min-height: 350px;
            padding: 65px 75px 55px;
            overflow: hidden;
            background: linear-gradient(125deg, #F8E5E9, #FFF0E7);
            display: flex;
            flex-direction: column;
            justify-content: center;
            user-select: none;
        }

        .faq-card:nth-child(even) {
            background: linear-gradient(125deg, #F3E8EF, #FCEBDD);
        }

        .faq-number {
            position: absolute;
            top: 35px;
            left: 75px;
            font-size: 10px;
            letter-spacing: 2px;
            color: #B96F89;
        }

        .faq-card-icon {
            width: 55px;
            height: 55px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .75);
            color: #C06F8C;
            display: grid;
            place-items: center;
            font-size: 28px;
            margin-bottom: 25px;
        }

        .faq-card h3 {
            position: relative;
            z-index: 1;
            font-family: 'DM Serif Display', serif;
            font-size: clamp(25px, 3vw, 37px);
            font-weight: 400;
            line-height: 1.3;
            color: var(--plum);
            max-width: 700px;
        }

        .faq-card p {
            position: relative;
            z-index: 1;
            max-width: 680px;
            margin-top: 18px;
            font-size: 13px;
            line-height: 2;
            color: #806F75;
        }

        .faq-card-decoration {
            position: absolute;
            right: 25px;
            bottom: -35px;
            font-family: 'DM Serif Display', serif;
            font-size: 110px;
            color: rgba(255, 255, 255, .42);
            pointer-events: none;
        }

        .faq-arrow {
            flex-shrink: 0;
            width: 48px;
            height: 48px;
            border: 1px solid #E8CDD5;
            border-radius: 50%;
            background: white;
            color: #A85875;
            font-size: 20px;
            cursor: pointer;
            transition: .25s ease;
        }

        .faq-arrow:hover {
            background: var(--plum);
            color: white;
            border-color: var(--plum);
            transform: scale(1.08);
        }

        .faq-bottom {
            max-width: 1050px;
            margin: 25px auto 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-dots {
            display: flex;
            gap: 9px;
            align-items: center;
        }

        .faq-dot {
            width: 8px;
            height: 8px;
            padding: 0;
            border: 0;
            border-radius: 20px;
            background: #E7CCD4;
            cursor: pointer;
            transition: .3s ease;
        }

        .faq-dot.active {
            width: 28px;
            background: #B96F89;
        }

        .faq-counter {
            font-size: 11px;
            letter-spacing: 2px;
            color: #A58D97;
        }

        .faq-contact {
            max-width: 1050px;
            margin: 55px auto 0;
            padding: 32px;
            border-radius: 20px;
            text-align: center;
            background: white;
            border: 1px solid #F0E2E5;
        }

        .faq-contact span {
            font-size: 9px;
            letter-spacing: 2px;
            color: #BD718B;
        }

        .faq-contact p {
            font-family: 'DM Serif Display', serif;
            font-size: 23px;
            color: var(--plum);
            margin: 12px 0 17px;
        }

        .faq-contact a {
            display: inline-block;
            color: var(--pink-dark);
            font-size: 12px;
            border-bottom: 1px solid var(--pink);
            padding-bottom: 5px;
        }

        /* CTA */

        .cta {
            padding: 100px 0;
            text-align: center;
        }

        .cta h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 50px;
            font-weight: 400;
            color: var(--plum);
            margin-top: 18px;
        }

        .cta p {
            max-width: 500px;
            margin: 20px auto 30px;
            font-size: 12px;
            line-height: 2;
            color: var(--muted);
        }

        /* FOOTER */

        footer {
            padding: 30px 0;
            border-top: 1px solid #EDE0E1;
        }

        .footer-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        footer p {
            font-size: 10px;
            color: var(--muted);
        }

        /* RESPONSIVE */

        @media(max-width: 900px) {
            .about-grid {
                gap: 40px;
            }

            .faq-slider {
                gap: 12px;
            }

            .faq-card {
                padding-left: 45px;
                padding-right: 45px;
            }

            .faq-number {
                left: 45px;
            }
        }

        @media(max-width: 768px) {
            .container {
                width: calc(100% - 35px);
            }

            .nav-inner {
                min-height: 70px;
            }

            .nav-menu {
                display: none;
            }

            .hero {
                padding: 60px 0;
            }

            .hero-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            h1 {
                font-size: 55px;
            }

            .hero-image {
                height: 390px;
            }

            .image-frame {
                width: 280px;
                height: 360px;
                right: 20px;
            }

            .image-decoration {
                width: 280px;
                height: 360px;
                right: 5px;
            }

            .image-label {
                bottom: 10px;
                padding: 16px 18px;
            }

            .image-label h3 {
                font-size: 18px;
            }

            .intro-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .section-header h2,
            .about h2 {
                font-size: 38px;
            }

            .service-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .about-art {
                width: 250px;
                height: 250px;
                font-size: 35px;
                margin: auto;
            }

            .cta h2 {
                font-size: 38px;
            }

            .footer-inner {
                flex-direction: column;
                text-align: center;
            }

            .faq-section {
                padding: 75px 0;
            }

            .faq-slider {
                gap: 8px;
            }

            .faq-arrow {
                width: 36px;
                height: 36px;
                font-size: 16px;
            }

            .faq-card {
                min-height: 370px;
                padding: 60px 28px 35px;
            }

            .faq-number {
                left: 28px;
                top: 25px;
            }

            .faq-card h3 {
                font-size: 27px;
            }

            .faq-card p {
                font-size: 12px;
            }

            .faq-card-decoration {
                font-size: 75px;
            }

            .faq-contact {
                padding: 25px 18px;
            }
        }

        @media(max-width: 480px) {
            .faq-heading h2 {
                font-size: 39px;
            }

            .faq-slider {
                gap: 6px;
            }

            .faq-arrow {
                width: 32px;
                height: 32px;
                min-width: 32px;
                font-size: 14px;
            }

            .faq-card {
                min-height: 390px;
                padding-left: 22px;
                padding-right: 22px;
            }

            .faq-number {
                left: 22px;
            }

            .faq-bottom {
                padding-left: 5px;
                padding-right: 5px;
            }

            .faq-contact p {
                font-size: 20px;
            }
        }

        @media(prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                scroll-behavior: auto !important;
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>

    <!-- NAVIGATION -->
    <header class="navbar">
        <div class="container nav-inner">

            <a href="/" class="brand">
                SABITA
                <small>SAHABAT IBU HAMIL & BALITA</small>
            </a>

            <nav class="nav-menu">
                <a href="#beranda">Beranda</a>
                <a href="#layanan">Layanan</a>
                <a href="#tentang">Tentang</a>
                <a href="#edukasi">Edukasi</a>
                <a href="#faq">FAQ</a>
            </nav>

            <a href="{{ route('login') }}" class="nav-button">
                Masuk / Daftar
            </a>

        </div>
    </header>

    <!-- HERO -->
    <section class="hero" id="beranda">
        <div class="container hero-grid">

            <div class="hero-copy">

                <div class="eyebrow">
                    Sahabat perjalanan ibu hamil dan balita
                </div>

                <h1>
                    Merawat dengan cinta,<br>
                    tumbuh dengan <em>bahagia.</em>
                </h1>

                <p class="hero-text">
                    Temukan jadwal Posyandu, pantau tumbuh kembang buah hati,
                    dan dapatkan informasi kesehatan ibu dan anak dalam satu
                    ruang yang hangat dan mudah digunakan.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('register') }}" class="btn-primary">
                        Jelajahi SABITA
                    </a>

                    <a href="#tentang" class="btn-outline">
                        Kenali kami
                    </a>
                </div>

            </div>

            <div class="hero-image hero-image-enter">

                <div class="image-decoration"></div>

                <div class="image-frame">
                    <img src="{{ asset('images/sabita-hero.jpg') }}" alt="Ibu dan anak">
                </div>

                <div class="image-label image-label-enter">
                    <h3>Setiap tumbuh adalah cerita.</h3>
                    <p>Temani perjalanan kecil yang berarti.</p>
                </div>

            </div>

        </div>
    </section>

    <!-- INTRO -->
    <section class="intro">
        <div class="container intro-inner">
            <h2>Sehat ibu hamil, bahagia anak.</h2>
            <p>Merawat hari ini untuk masa depan yang lebih baik.</p>
        </div>
    </section>

    <!-- SERVICES -->
    <section class="services" id="layanan">
        <div class="container">

            <div class="section-header">
                <div class="section-label">Layanan SABITA</div>

                <h2>Perhatian kecil,<br>manfaat yang besar.</h2>

                <p>
                    Semua kebutuhan informasi dan pemantauan kesehatan keluarga
                    hadir dalam satu platform.
                </p>
            </div>

            <div class="service-grid">

                <article class="service">
                    <div class="service-number">01</div>
                    <h3>Data Ibu & Anak</h3>
                    <p>
                        Simpan profil ibu hamil dan anak untuk membantu
                        pemantauan kesehatan serta perkembangan.
                    </p>
                    <a href="{{ route('login') }}">Kenali layanan →</a>
                </article>

                <article class="service">
                    <div class="service-number">02</div>
                    <h3>Jadwal Posyandu</h3>
                    <p>
                        Ketahui jadwal kegiatan Posyandu dan daftarkan
                        pemeriksaan anak dengan lebih praktis.
                    </p>
                    <a href="{{ route('login') }}">Lihat jadwal →</a>
                </article>

                <article class="service" id="edukasi">
                    <div class="service-number">03</div>
                    <h3>Edukasi Kesehatan</h3>
                    <p>
                        Baca informasi seputar kehamilan, imunisasi,
                        gizi, dan tumbuh kembang anak.
                    </p>
                    <a href="{{ route('login') }}">Baca edukasi →</a>
                </article>

            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section class="about" id="tentang">
        <div class="container about-grid">

            <div class="about-visual">
                <img src="{{ asset('images/tentang-sabita.jpg') }}" alt="Ibu bersama anak">
                <div class="about-photo-label">
                    <span>GROW WITH LOVE</span>
                    <p>Setiap tumbuh adalah cerita.</p>
                </div>
            </div>

            <div>
                <div class="section-label">Tentang SABITA</div>

                <h2>Lebih dekat dengan kesehatan keluarga.</h2>

                <p>
                    SABITA merupakan platform Posyandu Digital yang dirancang
                    untuk membantu ibu dan keluarga mendapatkan informasi
                    kesehatan, memantau tumbuh kembang anak, serta mengakses
                    layanan Posyandu dengan lebih mudah.
                </p>

                <p>
                    Kami percaya bahwa setiap anak berhak mendapatkan awal
                    kehidupan yang sehat dan setiap ibu berhak mendapatkan
                    informasi yang mudah dipahami.
                </p>
            </div>

        </div>
    </section>

    <!-- FAQ: SATU SECTION, SLIDER HORIZONTAL -->
    <section class="faq-section" id="faq">
        <div class="container">

            <div class="faq-heading">
                <span class="faq-label">FREQUENTLY ASKED QUESTIONS</span>
                <h2>Ada yang ingin<br>kamu <em>ketahui?</em></h2>
                <p>Geser kotak pertanyaan dan temukan jawaban seputar SABITA.</p>
            </div>

            <div class="faq-slider">

                <button class="faq-arrow" id="faqPrev" type="button" aria-label="Pertanyaan sebelumnya">
                    <i class="bi bi-arrow-left"></i>
                </button>

                <div class="faq-window" id="faqWindow">
                    <div class="faq-track" id="faqTrack">

                        <article class="faq-card">
                            <span class="faq-number">01 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-heart"></i></div>
                            <h3>Apa itu SABITA?</h3>
                            <p>
                                SABITA (Sahabat Ibu & Balita) merupakan platform
                                Posyandu Digital yang membantu masyarakat memperoleh
                                informasi kesehatan ibu dan anak, melihat jadwal
                                Posyandu, serta mengakses layanan pendaftaran dan
                                pemantauan pemeriksaan.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">02 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-people"></i></div>
                            <h3>Siapa saja yang bisa menggunakan SABITA?</h3>
                            <p>
                                SABITA dapat digunakan oleh masyarakat, khususnya
                                ibu hamil, orang tua, dan keluarga yang ingin
                                memperoleh informasi serta memanfaatkan layanan
                                Posyandu. Tersedia juga akses administrator untuk
                                pengelolaan data.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">03 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-person-plus"></i></div>
                            <h3>Bagaimana cara membuat akun SABITA?</h3>
                            <p>
                                Pilih tombol Masuk / Daftar pada halaman utama,
                                kemudian pilih pendaftaran akun. Lengkapi informasi
                                yang diminta dan ikuti petunjuk hingga akun berhasil
                                dibuat.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">04 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-heart-pulse"></i></div>
                            <h3>Bagaimana cara mendaftarkan data ibu hamil?</h3>
                            <p>
                                Masuk ke akun SABITA, buka menu Data Ibu Hamil,
                                kemudian lengkapi formulir identitas dan informasi
                                kehamilan sesuai data yang diminta.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">05 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-person-hearts"></i></div>
                            <h3>Bagaimana cara menambahkan data bayi dan anak?</h3>
                            <p>
                                Setelah masuk, buka menu Data Bayi & Anak, pilih
                                tambah data anak, lalu isi identitas anak sesuai
                                formulir yang tersedia.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">06 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-calendar-heart"></i></div>
                            <h3>Bagaimana cara melihat jadwal Posyandu?</h3>
                            <p>
                                Pilih menu Jadwal Posyandu untuk melihat informasi
                                kegiatan, tanggal, waktu, lokasi, dan jenis layanan
                                yang tersedia.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">07 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-clipboard2-check"></i></div>
                            <h3>Bagaimana cara mendaftarkan anak ke layanan Posyandu?</h3>
                            <p>
                                Masuk ke akun, buka menu Pendaftaran, pilih anak
                                yang akan mengikuti kegiatan, kemudian pilih jadwal
                                Posyandu yang tersedia dan kirim pendaftaran.
                                Status pendaftaran dapat dipantau melalui akun.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                        <article class="faq-card">
                            <span class="faq-number">08 / 08</span>
                            <div class="faq-card-icon"><i class="bi bi-clipboard2-pulse"></i></div>
                            <h3>Apakah hasil pemeriksaan anak bisa dilihat kembali?</h3>
                            <p>
                                Ya. Setelah pemeriksaan dicatat oleh petugas,
                                orang tua dapat melihat kembali hasil pemeriksaan
                                melalui menu Pemeriksaan Saya pada akun SABITA.
                            </p>
                            <span class="faq-card-decoration">SABITA</span>
                        </article>

                    </div>
                </div>

                <button class="faq-arrow" id="faqNext" type="button" aria-label="Pertanyaan berikutnya">
                    <i class="bi bi-arrow-right"></i>
                </button>

            </div>

            <div class="faq-bottom">
                <div class="faq-dots" id="faqDots"></div>
                <span class="faq-counter" id="faqCounter">01 — 08</span>
            </div>

            <div class="faq-contact">
                <span>MASIH INGIN TAHU LEBIH BANYAK?</span>
                <p>Mulai perjalanan kesehatan keluarga bersama SABITA.</p>
                <a href="{{ route('register') }}">Mulai gunakan SABITA ↗</a>
            </div>

        </div>
    </section>

    <!-- CTA -->
    <section class="cta">
        <div class="container">

            <div class="section-label">Mulai bersama SABITA</div>

            <h2>Temani tumbuhnya<br>generasi yang sehat.</h2>

            <p>
                Jadikan perjalanan kesehatan ibu dan anak lebih teratur,
                mudah dipantau, dan penuh perhatian.
            </p>

        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container footer-inner">

            <a href="/" class="brand">
                SABITA
                <small>SAHABAT IBU & BALITA</small>
            </a>

            <p>© {{ date('Y') }} SABITA — Sahabat Ibu dan Balita</p>

        </div>
    </footer>

    <!-- FAQ SLIDER JAVASCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const track = document.getElementById('faqTrack');
            const windowSlider = document.getElementById('faqWindow');
            const prevButton = document.getElementById('faqPrev');
            const nextButton = document.getElementById('faqNext');
            const dotsContainer = document.getElementById('faqDots');
            const counter = document.getElementById('faqCounter');

            if (!track || !windowSlider || !prevButton || !nextButton) {
                return;
            }

            const cards = Array.from(track.querySelectorAll('.faq-card'));
            const total = cards.length;

            let currentIndex = 0;
            let startX = 0;
            let currentX = 0;
            let isDragging = false;

            // Buat titik navigasi otomatis sesuai jumlah kartu
            cards.forEach(function(_, index) {
                const dot = document.createElement('button');

                dot.type = 'button';
                dot.className = 'faq-dot';
                dot.setAttribute('aria-label', 'Lihat pertanyaan ' + (index + 1));

                dot.addEventListener('click', function() {
                    goToSlide(index);
                });

                dotsContainer.appendChild(dot);
            });

            const dots = Array.from(dotsContainer.querySelectorAll('.faq-dot'));

            function updateSlider() {
                track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';

                dots.forEach(function(dot, index) {
                    dot.classList.toggle('active', index === currentIndex);
                    dot.setAttribute('aria-current', index === currentIndex ? 'true' : 'false');
                });

                counter.textContent =
                    String(currentIndex + 1).padStart(2, '0') +
                    ' — ' +
                    String(total).padStart(2, '0');

                prevButton.disabled = currentIndex === 0;
                nextButton.disabled = currentIndex === total - 1;

                prevButton.style.opacity = currentIndex === 0 ? '.45' : '1';
                nextButton.style.opacity = currentIndex === total - 1 ? '.45' : '1';
            }

            function goToSlide(index) {
                currentIndex = Math.max(0, Math.min(index, total - 1));
                updateSlider();
            }

            function nextSlide() {
                if (currentIndex < total - 1) {
                    goToSlide(currentIndex + 1);
                }
            }

            function previousSlide() {
                if (currentIndex > 0) {
                    goToSlide(currentIndex - 1);
                }
            }

            nextButton.addEventListener('click', nextSlide);
            prevButton.addEventListener('click', previousSlide);

            // Geser menggunakan mouse atau sentuhan layar
            windowSlider.addEventListener('pointerdown', function(event) {
                if (event.pointerType === 'mouse' && event.button !== 0) return;

                startX = event.clientX;
                currentX = startX;
                isDragging = true;

                windowSlider.classList.add('dragging');
            });

            windowSlider.addEventListener('pointermove', function(event) {
                if (!isDragging) return;
                currentX = event.clientX;
            });

            function finishDrag() {
                if (!isDragging) return;

                const distance = currentX - startX;
                const threshold = 45;

                if (distance < -threshold) {
                    nextSlide();
                } else if (distance > threshold) {
                    previousSlide();
                }

                isDragging = false;
                windowSlider.classList.remove('dragging');
            }

            windowSlider.addEventListener('pointerup', finishDrag);
            windowSlider.addEventListener('pointercancel', finishDrag);
            windowSlider.addEventListener('pointerleave', finishDrag);

            // Navigasi dengan keyboard saat slider difokuskan
            windowSlider.setAttribute('tabindex', '0');

            windowSlider.addEventListener('keydown', function(event) {
                if (event.key === 'ArrowRight') {
                    nextSlide();
                }

                if (event.key === 'ArrowLeft') {
                    previousSlide();
                }
            });

            updateSlider();

        });
    </script>

</body>

</html>

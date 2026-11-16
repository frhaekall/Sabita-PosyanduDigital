<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard Admin') | SABITA</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --plum: #684653;
            --rose: #BD718B;
            --rose-soft: #F4E3E8;
            --cream: #FFF9F5;
            --paper: #FFFEFC;
            --text: #4C3740;
            --muted: #9B8790;
            --border: #F0E2E5;
            --sage: #A9AD91;
            --shadow: 0 8px 30px rgba(104, 70, 83, .045);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: var(--cream);
            color: var(--text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
        }

        a {
            text-decoration: none;
        }

        .admin-shell {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* SIDEBAR */
        .admin-sidebar {
            width: 255px;
            min-width: 255px;
            min-height: 100vh;
            padding: 25px 17px 18px;
            background: var(--paper);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
        }

        .admin-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 2px 10px 27px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 24px;
        }

        .admin-brand-icon {
            width: 43px;
            height: 43px;
            border-radius: 15px;
            background: var(--rose-soft);
            color: var(--rose);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .admin-brand-name {
            font-family: 'DM Serif Display', serif;
            color: var(--plum);
            font-size: 23px;
            line-height: 1.1;
        }

        .admin-brand-caption {
            margin-top: 4px;
            color: var(--muted);
            font-size: 9px;
            letter-spacing: 1.2px;
        }

        .admin-nav-label {
            padding: 0 11px;
            margin: 0 0 10px;
            color: #B5A5AC;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .admin-nav {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .admin-nav-link {
            min-height: 43px;
            padding: 0 12px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-radius: 11px;
            color: #806D76;
            font-size: 12px;
            font-weight: 500;
            transition: .2s ease;
        }

        .admin-nav-link i {
            width: 19px;
            font-size: 16px;
            text-align: center;
        }

        .admin-nav-link:hover {
            background: #FBF1F2;
            color: var(--plum);
        }

        .admin-nav-link.active {
            background: var(--rose-soft);
            color: var(--plum);
        }

        .admin-sidebar-bottom {
            margin-top: auto;
            padding: 17px 10px 0;
            border-top: 1px solid var(--border);
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 0;
        }

        .admin-avatar {
            width: 36px;
            height: 36px;
            flex-shrink: 0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--rose-soft);
            color: var(--plum);
            font-size: 15px;
        }

        .admin-profile-info {
            min-width: 0;
        }

        .admin-profile-name {
            color: var(--plum);
            font-size: 11px;
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .admin-profile-role {
            margin-top: 3px;
            color: var(--muted);
            font-size: 10px;
        }

        /* MAIN CONTENT */
        .admin-main {
            flex: 1;
            min-width: 0;
            padding: 27px 32px 40px;
        }

        .admin-topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 27px;
        }

        .admin-page-heading {
            margin: 0;
            color: var(--plum);
            font-family: 'DM Serif Display', serif;
            font-size: 27px;
            font-weight: 400;
        }

        .admin-page-subtitle {
            margin: 5px 0 0;
            color: var(--muted);
            font-size: 11px;
        }

        .admin-topbar-date {
            color: var(--muted);
            font-size: 11px;
            white-space: nowrap;
        }

        .admin-content {
            width: 100%;
            min-width: 0;
        }

        .admin-alert {
            padding: 12px 15px;
            margin-bottom: 18px;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: var(--paper);
            color: var(--plum);
        }

        .admin-alert.success {
            background: #F1F5ED;
            border-color: #E0E8D8;
            color: #687650;
        }

        .admin-alert.error {
            background: #FFF0F0;
            border-color: #F3DADA;
            color: #A34F5B;
        }

        @media (max-width: 900px) {
            .admin-sidebar {
                width: 225px;
                min-width: 225px;
            }

            .admin-main {
                padding: 24px 20px 35px;
            }
        }

        @media (max-width: 700px) {
            .admin-shell {
                display: block;
            }

            .admin-sidebar {
                width: 100%;
                min-width: 0;
                min-height: auto;
                padding: 14px 13px;
                border-right: 0;
                border-bottom: 1px solid var(--border);
            }

            .admin-brand {
                padding: 0 5px 13px;
                margin-bottom: 13px;
            }

            .admin-brand-icon {
                width: 37px;
                height: 37px;
            }

            .admin-brand-name {
                font-size: 20px;
            }

            .admin-nav-label,
            .admin-sidebar-bottom {
                display: none;
            }

            .admin-nav {
                flex-direction: row;
                overflow-x: auto;
                padding-bottom: 4px;
                gap: 6px;
            }

            .admin-nav-link {
                min-height: 38px;
                flex: 0 0 auto;
                padding: 0 11px;
                white-space: nowrap;
                font-size: 11px;
            }

            .admin-nav-link i {
                font-size: 14px;
            }

            .admin-main {
                padding: 22px 15px 30px;
            }

            .admin-page-heading {
                font-size: 23px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <div class="admin-shell">

        <aside class="admin-sidebar">

            <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                <div class="admin-brand-icon">
                    <i class="bi bi-flower1"></i>
                </div>
                <div>
                    <div class="admin-brand-name">SABITA</div>
                    <div class="admin-brand-caption">POSYANDU DIGITAL</div>
                </div>
            </a>

            <div class="admin-nav-label">Menu Utama</div>

            <nav class="admin-nav">

                <a href="{{ route('admin.dashboard') }}"
                    class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>

                @if (Route::has('pregnancies.index'))
                    <a href="{{ route('pregnancies.index') }}"
                        class="admin-nav-link {{ request()->routeIs('pregnancies.*') ? 'active' : '' }}">
                        <i class="bi bi-heart-pulse"></i>
                        <span>Data Ibu Hamil</span>
                    </a>
                @endif

                @if (Route::has('children.index'))
                    <a href="{{ route('children.index') }}"
                        class="admin-nav-link {{ request()->routeIs('children.*') ? 'active' : '' }}">
                        <i class="bi bi-person-hearts"></i>
                        <span>Data Bayi & Anak</span>
                    </a>
                @endif

                @if (Route::has('admin.schedules.index'))
                    <a href="{{ route('admin.schedules.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.schedules.*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-heart"></i>
                        <span>Jadwal Posyandu</span>
                    </a>
                @endif

                @if (Route::has('admin.registrations.index'))
                    <a href="{{ route('admin.registrations.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.registrations.*') ? 'active' : '' }}">
                        <i class="bi bi-clipboard2-check"></i>
                        <span>Pendaftaran</span>
                    </a>
                @endif

                @if (Route::has('admin.examinations.index'))
                    <a href="{{ route('admin.examinations.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.examinations.*') ? 'active' : '' }}">
                        <i class="bi bi-activity"></i>
                        <span>Pemeriksaan</span>
                    </a>
                @endif

                @if (Route::has('admin.educations.index'))
                    <a href="{{ route('admin.educations.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.educations.*') ? 'active' : '' }}">
                        <i class="bi bi-book-half"></i>
                        <span>Edukasi</span>
                    </a>
                @endif

                @if (Route::has('admin.reports.index'))
                    <a href="{{ route('admin.reports.index') }}"
                        class="admin-nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-bar-graph"></i>
                        <span>Laporan</span>
                    </a>
                @endif

            </nav>

            <div class="admin-sidebar-bottom">
                <div class="admin-profile">
                    <div class="admin-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="admin-profile-info">
                        <div class="admin-profile-name">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </div>
                        <div class="admin-profile-role">Administrator SABITA</div>
                    </div>
                </div>
            </div>

        </aside>

        <main class="admin-main">

            <header class="admin-topbar">
                <div>
                    <h1 class="admin-page-heading">@yield('page-title', 'Dashboard')</h1>
                    <p class="admin-page-subtitle">@yield('page-subtitle', 'Selamat datang di panel administrasi SABITA.')</p>
                </div>

                <div class="admin-topbar-date">
                    <i class="bi bi-calendar3"></i>
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </header>

            @if (session('success'))
                <div class="admin-alert success">
                    <i class="bi bi-check-circle me-1"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="admin-alert error">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="admin-alert error">
                    <div class="mb-1">Periksa kembali data yang dimasukkan:</div>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <section class="admin-content">
                @yield('content')
            </section>

        </main>
    </div>

    @stack('scripts')
</body>

</html>

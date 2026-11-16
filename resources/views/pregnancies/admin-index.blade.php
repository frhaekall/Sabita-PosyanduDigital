@extends('layouts.admin')

@section('title', 'Data Ibu Hamil')
@section('page-title', 'Data Ibu Hamil')
@section('page-subtitle', 'Kelola dan pantau informasi kesehatan ibu hamil yang terdaftar di SABITA.')

@push('styles')
    <style>
        .preg-admin {
            color: #4C3740;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .preg-admin .hero {
            position: relative;
            overflow: hidden;
            min-height: 220px;
            padding: 32px 35px;
            margin-bottom: 25px;
            border-radius: 20px;
            background: linear-gradient(115deg, #F8E7EB, #FFF0E7);
            display: flex;
            align-items: center;
        }

        .preg-admin .hero-content {
            position: relative;
            z-index: 2;
            max-width: 580px;
        }

        .preg-admin .eyebrow {
            font-size: 10px;
            letter-spacing: 2px;
            color: #A65E77;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .preg-admin .hero h2 {
            font: 36px 'DM Serif Display', serif;
            font-weight: 400;
            color: #684653;
            margin: 0 0 12px;
            line-height: 1.2;
        }

        .preg-admin .hero p {
            color: #856D76;
            font-size: 12px;
            line-height: 1.9;
            margin: 0;
            max-width: 470px;
        }

        .preg-admin .hero-art {
            position: absolute;
            right: 55px;
            top: 50%;
            transform: translateY(-50%);
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #E7C7D0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFF8F4;
            font: 75px 'DM Serif Display', serif;
        }

        .preg-admin .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1.5fr;
            gap: 15px;
            margin-bottom: 32px;
        }

        .preg-admin .summary-card {
            min-height: 112px;
            padding: 20px 22px;
            background: #FFFEFC;
            border: 1px solid #F0E2E5;
            border-radius: 14px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            box-shadow: 0 8px 30px rgba(104, 70, 83, .045);
        }

        .preg-admin .summary-label {
            color: #9B8790;
            font-size: 10px;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .preg-admin .summary-number {
            font: 32px 'DM Serif Display', serif;
            color: #684653;
        }

        .preg-admin .privacy-card {
            background: #E9EDE4;
            border-color: #E0E7D9;
        }

        .preg-admin .privacy-card .summary-label,
        .preg-admin .privacy-card p {
            color: #68745F;
        }

        .preg-admin .privacy-card p {
            font-size: 11px;
            line-height: 1.8;
            margin: 7px 0 0;
        }

        .preg-admin .section-heading {
            margin-bottom: 18px;
        }

        .preg-admin .section-kicker {
            font-size: 10px;
            letter-spacing: 1.8px;
            color: #D98FA6;
            margin-bottom: 7px;
        }

        .preg-admin .section-heading h2 {
            font: 29px 'DM Serif Display', serif;
            font-weight: 400;
            color: #684653;
            margin: 0;
        }

        .preg-admin .pregnancy-list {
            display: grid;
            gap: 13px;
        }

        .preg-admin .pregnancy-card {
            background: #FFFEFC;
            border: 1px solid #F0E2E5;
            border-radius: 14px;
            padding: 23px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            box-shadow: 0 8px 30px rgba(104, 70, 83, .045);
        }

        .preg-admin .pregnancy-name {
            font: 24px 'DM Serif Display', serif;
            color: #684653;
            margin-bottom: 8px;
        }

        .preg-admin .pregnancy-meta {
            color: #9B8790;
            font-size: 10px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .preg-admin .pregnancy-details {
            display: flex;
            gap: 25px;
            flex-wrap: wrap;
        }

        .preg-admin .detail-label {
            display: block;
            color: #9B8790;
            font-size: 9px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 7px;
        }

        .preg-admin .detail-value {
            font-size: 12px;
            color: #684653;
            white-space: nowrap;
        }

        .preg-admin .empty-panel {
            min-height: 250px;
            background: #FFFEFC;
            border: 1px solid #F0E2E5;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 30px;
        }

        .preg-admin .empty-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: #F6E7EA;
            margin: 0 auto 17px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #D98FA6;
            font-size: 34px;
        }

        .preg-admin .empty-panel h3 {
            font: 24px 'DM Serif Display', serif;
            color: #684653;
            margin: 0 0 8px;
        }

        .preg-admin .empty-panel p {
            color: #9B8790;
            font-size: 11px;
            line-height: 1.8;
            margin: 0;
        }

        .preg-admin .pagination {
            margin-top: 22px;
        }

        .preg-admin .pagination nav {
            display: flex;
            justify-content: center;
        }

        .preg-admin .pagination svg {
            width: 16px;
            height: 16px;
        }

        .preg-admin .pagination a,
        .preg-admin .pagination span {
            font-size: 12px;
        }

        @media(max-width: 850px) {
            .preg-admin .summary-grid {
                grid-template-columns: 1fr 1fr;
            }

            .preg-admin .privacy-card {
                grid-column: 1 / -1;
            }

            .preg-admin .pregnancy-card {
                align-items: flex-start;
                flex-direction: column;
            }
        }

        @media(max-width: 550px) {
            .preg-admin .hero {
                padding: 27px 23px;
            }

            .preg-admin .hero h2 {
                font-size: 30px;
            }

            .preg-admin .hero-art {
                right: -65px;
                opacity: .35;
            }

            .preg-admin .summary-grid {
                gap: 9px;
            }

            .preg-admin .summary-card {
                padding: 15px;
            }

            .preg-admin .summary-number {
                font-size: 27px;
            }

            .preg-admin .pregnancy-details {
                gap: 17px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="preg-admin">

        <section class="hero">
            <div class="hero-content">
                <div class="eyebrow">Ruang Kesehatan Ibu · SABITA</div>
                <h2>Setiap perjalanan<br>kehamilan berarti.</h2>
                <p>
                    Pantau informasi kehamilan ibu yang terdaftar dalam
                    sistem SABITA untuk mendukung pencatatan pelayanan kesehatan.
                </p>
            </div>

            <div class="hero-art">♡</div>
        </section>

        <section class="summary-grid">
            <div class="summary-card">
                <span class="summary-label">Total Data Tercatat</span>
                <span class="summary-number">{{ $pregnancies->total() }}</span>
                <span style="font-size:10px;color:#9B8790;">Data ibu hamil</span>
            </div>

            <div class="summary-card">
                <span class="summary-label">Status Pendaftaran</span>
                <span class="summary-number" style="font-size:24px;">
                    {{ $pregnancies->total() > 0 ? 'Terdaftar' : 'Belum ada' }}
                </span>
                <span style="font-size:10px;color:#9B8790;">Informasi kehamilan</span>
            </div>

            <div class="summary-card privacy-card">
                <span class="summary-label">Privasi Data</span>
                <p>
                    Informasi pribadi ibu dijaga dan hanya digunakan untuk
                    keperluan pencatatan serta pelayanan kesehatan di SABITA.
                </p>
            </div>
        </section>

        <section>
            <div class="section-heading">
                <div>
                    <div class="section-kicker">CATATAN KESEHATAN</div>
                    <h2>Data Kehamilan</h2>
                </div>
            </div>

            @if ($pregnancies->count())
                <div class="pregnancy-list">
                    @foreach ($pregnancies as $pregnancy)
                        <article class="pregnancy-card">
                            <div>
                                <div class="pregnancy-name">
                                    {{ $pregnancy->nama_ibu }}
                                </div>

                                <div class="pregnancy-meta">
                                    NIK ••••••••••••{{ substr($pregnancy->nik, -4) }}<br>
                                    {{ $pregnancy->alamat }}<br>
                                    Akun: {{ $pregnancy->user->name ?? '-' }}
                                </div>
                            </div>

                            <div class="pregnancy-details">
                                <div>
                                    <span class="detail-label">HPHT</span>
                                    <span class="detail-value">
                                        {{ $pregnancy->tanggal_hpht?->format('d M Y') ?? 'Belum diisi' }}
                                    </span>
                                </div>

                                <div>
                                    <span class="detail-label">Perkiraan Lahir</span>
                                    <span class="detail-value">
                                        {{ $pregnancy->tanggal_hpl?->format('d M Y') ?? 'Belum diisi' }}
                                    </span>
                                </div>

                                <div>
                                    <span class="detail-label">Golongan Darah</span>
                                    <span class="detail-value">
                                        {{ $pregnancy->golongan_darah ?? '-' }}
                                    </span>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $pregnancies->links() }}
                </div>
            @else
                <div class="empty-panel">
                    <div>
                        <div class="empty-icon">♡</div>
                        <h3>Belum ada catatan kehamilan</h3>
                        <p>Data ibu hamil belum tersedia.</p>
                    </div>
                </div>
            @endif
        </section>

    </div>
@endsection

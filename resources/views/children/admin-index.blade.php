@extends('layouts.admin')

@section('title', 'Data Bayi & Anak | SABITA')
@section('page-title', 'Data Bayi & Anak')
@section('page-subtitle', 'Seluruh data bayi dan anak yang didaftarkan oleh orang tua.')

@section('content')
    <div class="children-admin">

        <style>
            .children-admin {
                color: #684653;
            }

            .children-admin .page-intro {
                background: #FFF9F5;
                border: 1px solid #F0E2E5;
                border-radius: 16px;
                padding: 25px;
                margin-bottom: 24px;
            }

            .children-admin .eyebrow {
                color: #BD718B;
                font-size: 10px;
                letter-spacing: 2px;
                margin-bottom: 9px;
            }

            .children-admin .intro-title {
                font: 29px 'DM Serif Display', serif;
                margin: 0 0 8px;
                color: #684653;
            }

            .children-admin .intro-text {
                color: #99858C;
                font-size: 12px;
                line-height: 1.8;
                margin: 0;
            }

            .children-admin .summary {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
                margin-bottom: 25px;
            }

            .children-admin .summary-card {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                padding: 20px;
            }

            .children-admin .summary-label {
                color: #99858C;
                font-size: 11px;
                margin-bottom: 9px;
            }

            .children-admin .summary-number {
                font: 32px 'DM Serif Display', serif;
                color: #BD718B;
            }

            .children-admin .section-title {
                font: 25px 'DM Serif Display', serif;
                color: #684653;
                margin: 0 0 18px;
            }

            .children-admin .children-grid {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
            }

            .children-admin .child-card {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                padding: 23px;
            }

            .children-admin .child-top {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                gap: 10px;
            }

            .children-admin .child-number {
                font: 24px 'DM Serif Display', serif;
                color: #BD718B;
            }

            .children-admin .gender {
                background: #F4E3E8;
                color: #A65E77;
                padding: 7px 11px;
                border-radius: 20px;
                font-size: 10px;
                white-space: nowrap;
            }

            .children-admin .child-name {
                font: 24px 'DM Serif Display', serif;
                color: #684653;
                margin: 17px 0 6px;
            }

            .children-admin .birth {
                color: #99858C;
                font-size: 11px;
                line-height: 1.8;
            }

            .children-admin .child-info {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 16px;
                padding-top: 18px;
                margin-top: 18px;
                border-top: 1px solid #F0E2E5;
            }

            .children-admin .info-label {
                color: #BD718B;
                font-size: 9px;
                letter-spacing: 1px;
                margin-bottom: 7px;
            }

            .children-admin .info-value {
                color: #684653;
                font-size: 11px;
                overflow-wrap: anywhere;
            }

            .children-admin .empty {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                padding: 65px 20px;
                text-align: center;
            }

            .children-admin .empty-number {
                font: 43px 'DM Serif Display', serif;
                color: #D6A4B4;
            }

            .children-admin .empty h3 {
                font: 25px 'DM Serif Display', serif;
                color: #684653;
                margin: 12px 0 8px;
            }

            .children-admin .empty p {
                color: #99858C;
                font-size: 12px;
                margin: 0;
            }

            .children-admin .notice {
                background: #F8F1F1;
                border: 1px solid #F0E2E5;
                color: #806B73;
                padding: 14px 17px;
                border-radius: 9px;
                font-size: 11px;
                line-height: 1.8;
                margin-bottom: 22px;
            }

            @media (max-width: 700px) {

                .children-admin .summary,
                .children-admin .children-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>

        <div class="page-intro">
            <div class="eyebrow">RUANG KESEHATAN KELUARGA · SABITA</div>
            <h2 class="intro-title">Data Bayi & Anak</h2>
            <p class="intro-text">
                Kelola pemantauan data bayi dan anak yang telah didaftarkan
                oleh orang tua melalui akun masing-masing.
            </p>
        </div>

        <div class="summary">
            <div class="summary-card">
                <div class="summary-label">Total Data Anak</div>
                <div class="summary-number">{{ $children->count() }}</div>
            </div>

            <div class="summary-card">
                <div class="summary-label">Anak Laki-laki</div>
                <div class="summary-number">
                    {{ $children->where('jenis_kelamin', 'L')->count() }}
                </div>
            </div>
        </div>

        <div class="notice">
            <i class="bi bi-info-circle me-1"></i>
            Data pada halaman ini berasal dari pendaftaran orang tua.
            Admin hanya dapat melihat data dan tidak mendaftarkan anak atas nama orang tua.
        </div>

        <h3 class="section-title">Daftar Buah Hati</h3>

        @if ($children->count())
            <div class="children-grid">
                @foreach ($children as $child)
                    <article class="child-card">
                        <div class="child-top">
                            <span class="child-number">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <span class="gender">
                                {{ $child->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                            </span>
                        </div>

                        <h4 class="child-name">{{ $child->nama_anak }}</h4>

                        <div class="birth">
                            {{ $child->tempat_lahir ?: 'Tempat lahir belum diisi' }}
                            @if ($child->tempat_lahir)
                                ·
                            @endif
                            {{ $child->tanggal_lahir?->translatedFormat('d F Y') ?? '-' }}
                        </div>

                        <div class="child-info">
                            <div>
                                <div class="info-label">NIK</div>
                                <div class="info-value">
                                    {{ $child->nik ? '••••••••••••' . substr($child->nik, -4) : 'Belum diisi' }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">NAMA IBU</div>
                                <div class="info-value">
                                    {{ $child->nama_ibu ?: $child->user->name ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">AKUN ORANG TUA</div>
                                <div class="info-value">
                                    {{ $child->user->name ?? '-' }}
                                </div>
                            </div>

                            <div>
                                <div class="info-label">NAMA AYAH</div>
                                <div class="info-value">
                                    {{ $child->nama_ayah ?: '-' }}
                                </div>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="empty">
                <div class="empty-number">01</div>
                <h3>Belum Ada Data Buah Hati</h3>
                <p>Data bayi dan anak yang didaftarkan orang tua akan muncul di sini.</p>
            </div>
        @endif

    </div>
@endsection

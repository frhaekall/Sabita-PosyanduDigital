@extends('layouts.admin')

@section('title', 'Jadwal Posyandu | SABITA')
@section('page-title', 'Jadwal Posyandu')
@section('page-subtitle', 'Kelola jadwal kegiatan dan layanan Posyandu.')

@section('content')

    <div class="schedule-admin">

        <style>
            .schedule-admin {
                color: #684653;
            }

            .schedule-admin .schedule-hero {
                background: #FFF9F5;
                border: 1px solid #F0E2E5;
                border-radius: 15px;
                padding: 25px;
                margin-bottom: 22px;
            }

            .schedule-admin .eyebrow {
                color: #BD718B;
                font-size: 10px;
                letter-spacing: 2px;
                margin-bottom: 9px;
            }

            .schedule-admin .hero-title {
                font: 28px 'DM Serif Display', serif;
                color: #684653;
                margin: 0 0 8px;
            }

            .schedule-admin .hero-description {
                color: #99858C;
                font-size: 12px;
                line-height: 1.8;
                margin: 0;
            }

            .schedule-admin .summary-card {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                padding: 20px;
                margin-bottom: 24px;
            }

            .schedule-admin .summary-label {
                color: #99858C;
                font-size: 11px;
                margin-bottom: 8px;
            }

            .schedule-admin .summary-number {
                font: 32px 'DM Serif Display', serif;
                color: #BD718B;
            }

            .schedule-admin .section-heading {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 15px;
                flex-wrap: wrap;
                margin-bottom: 18px;
            }

            .schedule-admin .section-title {
                font: 25px 'DM Serif Display', serif;
                color: #684653;
                margin: 0;
            }

            .schedule-admin .add-button {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: #684653;
                color: #fff;
                border-radius: 8px;
                padding: 11px 17px;
                font-size: 11px;
                text-decoration: none;
                transition: .2s ease;
            }

            .schedule-admin .add-button:hover {
                background: #895C70;
                color: #fff;
                transform: translateY(-1px);
            }

            .schedule-admin .table-card {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                overflow: hidden;
            }

            .schedule-admin .table {
                margin: 0;
                min-width: 850px;
                vertical-align: middle;
            }

            .schedule-admin .table thead th {
                background: #FAF1F2;
                color: #896B77;
                border-bottom: 1px solid #F0E2E5;
                padding: 15px 14px;
                font-size: 10px;
                font-weight: 500;
                letter-spacing: .5px;
                white-space: nowrap;
            }

            .schedule-admin .table tbody td {
                color: #684653;
                border-color: #F3E9EB;
                padding: 15px 14px;
                font-size: 11px;
            }

            .schedule-admin .activity-name {
                font-size: 12px;
                color: #684653;
                margin-bottom: 4px;
            }

            .schedule-admin .activity-type {
                color: #A77D8C;
                font-size: 10px;
            }

            .schedule-admin .date-text {
                white-space: nowrap;
                color: #806B73;
            }

            .schedule-admin .quota {
                display: inline-block;
                background: #F4E3E8;
                color: #A65E77;
                padding: 6px 10px;
                border-radius: 20px;
                font-size: 10px;
                white-space: nowrap;
            }

            .schedule-admin .action-group {
                display: flex;
                gap: 7px;
                align-items: center;
            }

            .schedule-admin .action-btn {
                width: 33px;
                height: 33px;
                display: inline-flex;
                justify-content: center;
                align-items: center;
                border-radius: 7px;
                border: 1px solid #EDE0E2;
                background: #FFFEFC;
                color: #A66B80;
                text-decoration: none;
                font-size: 13px;
                cursor: pointer;
            }

            .schedule-admin .action-btn:hover {
                background: #F4E3E8;
                color: #684653;
            }

            .schedule-admin .delete-btn {
                color: #B66C6C;
            }

            .schedule-admin .delete-btn:hover {
                background: #F9E8E6;
                color: #A84F4F;
            }

            .schedule-admin .empty-state {
                text-align: center;
                padding: 65px 20px;
                background: #FFFEFC;
            }

            .schedule-admin .empty-icon {
                width: 60px;
                height: 60px;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0 auto 15px;
                background: #F4E3E8;
                color: #BD718B;
                border-radius: 50%;
                font-size: 24px;
            }

            .schedule-admin .empty-title {
                font: 24px 'DM Serif Display', serif;
                color: #684653;
                margin-bottom: 8px;
            }

            .schedule-admin .empty-description {
                font-size: 11px;
                color: #99858C;
                margin-bottom: 18px;
            }

            .schedule-admin .alert {
                font-size: 12px;
                border-radius: 9px;
            }

            @media (max-width: 650px) {
                .schedule-admin .schedule-hero {
                    padding: 20px;
                }

                .schedule-admin .section-heading {
                    align-items: flex-start;
                    flex-direction: column;
                }
            }
        </style>

        {{-- HERO --}}
        <div class="schedule-hero">
            <div class="eyebrow">LAYANAN KESEHATAN KELUARGA · SABITA</div>

            <h2 class="hero-title">Pengelolaan Jadwal Posyandu</h2>

            <p class="hero-description">
                Tambahkan dan kelola informasi kegiatan Posyandu agar
                masyarakat dapat mengetahui jadwal layanan yang tersedia.
            </p>
        </div>

        {{-- ALERT --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- SUMMARY --}}
        <div class="summary-card">
            <div class="summary-label">Total Jadwal Terdaftar</div>
            <div class="summary-number">{{ $schedules->count() }}</div>
        </div>

        {{-- DAFTAR JADWAL --}}
        <div class="section-heading">
            <h3 class="section-title">Daftar Kegiatan</h3>

            <a href="{{ route('admin.schedules.create') }}" class="add-button">
                <i class="bi bi-plus-lg"></i>
                Tambah Jadwal
            </a>
        </div>

        <div class="table-card">

            @if ($schedules->count() > 0)

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="55">NO.</th>
                                <th>KEGIATAN</th>
                                <th>TANGGAL</th>
                                <th>WAKTU</th>
                                <th>LOKASI</th>
                                <th>KUOTA</th>
                                <th width="105">AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <div class="activity-name">
                                            {{ $schedule->nama_kegiatan }}
                                        </div>

                                        <div class="activity-type">
                                            {{ $schedule->jenis_layanan }}
                                        </div>
                                    </td>

                                    <td>
                                        <span class="date-text">
                                            {{ $schedule->tanggal?->translatedFormat('d M Y') ?? '-' }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $schedule->jam_mulai ? substr($schedule->jam_mulai, 0, 5) : '-' }}

                                        @if ($schedule->jam_selesai)
                                            - {{ substr($schedule->jam_selesai, 0, 5) }}
                                        @endif
                                    </td>

                                    <td>{{ $schedule->lokasi }}</td>

                                    <td>
                                        <span class="quota">
                                            {{ $schedule->kuota }} peserta
                                        </span>
                                    </td>

                                    <td>
                                        <div class="action-group">

                                            <a href="{{ route('admin.schedules.edit', $schedule->id) }}" class="action-btn"
                                                title="Edit jadwal">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('admin.schedules.destroy', $schedule->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="action-btn delete-btn" title="Hapus jadwal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-calendar-heart"></i>
                    </div>

                    <h4 class="empty-title">Belum Ada Jadwal Posyandu</h4>

                    <p class="empty-description">
                        Belum ada kegiatan yang ditambahkan.
                        Silakan buat jadwal Posyandu pertama.
                    </p>

                    <a href="{{ route('admin.schedules.create') }}" class="add-button">
                        <i class="bi bi-plus-lg"></i>
                        Tambah Jadwal Pertama
                    </a>
                </div>

            @endif

        </div>

    </div>

@endsection

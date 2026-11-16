@extends('layouts.admin')

@section('title', 'Pendaftaran Layanan | SABITA')
@section('page-title', 'Pendaftaran Layanan')
@section('page-subtitle', 'Periksa dan proses pengajuan layanan Posyandu dari orang tua.')

@section('content')

    <div class="registration-admin">

        <style>
            .registration-admin {
                color: #684653;
            }

            .registration-admin .intro-panel {
                background: #FFF9F5;
                border: 1px solid #F0E2E5;
                border-radius: 15px;
                padding: 24px;
                margin-bottom: 22px;
            }

            .registration-admin .eyebrow {
                color: #BD718B;
                font-size: 10px;
                letter-spacing: 2px;
                margin-bottom: 9px;
            }

            .registration-admin .intro-title {
                font: 28px 'DM Serif Display', serif;
                color: #684653;
                margin: 0 0 8px;
            }

            .registration-admin .intro-text {
                color: #99858C;
                font-size: 12px;
                line-height: 1.8;
                margin: 0;
            }

            .registration-admin .stats-grid {
                display: grid;
                grid-template-columns: repeat(3, minmax(0, 1fr));
                gap: 15px;
                margin-bottom: 25px;
            }

            .registration-admin .stat-card {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                padding: 19px;
            }

            .registration-admin .stat-label {
                color: #99858C;
                font-size: 11px;
            }

            .registration-admin .stat-number {
                font: 32px 'DM Serif Display', serif;
                color: #684653;
                margin-top: 9px;
            }

            .registration-admin .stat-note {
                color: #99858C;
                font-size: 10px;
                margin-top: 4px;
            }

            .registration-admin .section-heading {
                display: flex;
                justify-content: space-between;
                align-items: center;
                gap: 12px;
                flex-wrap: wrap;
                margin: 28px 0 15px;
            }

            .registration-admin .section-title {
                font: 25px 'DM Serif Display', serif;
                color: #684653;
                margin: 0;
            }

            .registration-admin .section-count {
                color: #99858C;
                font-size: 11px;
            }

            .registration-admin .table-card {
                background: #FFFEFC;
                border: 1px solid #F0E2E5;
                border-radius: 13px;
                overflow: hidden;
            }

            .registration-admin .table {
                min-width: 1100px;
                margin: 0;
                vertical-align: top;
            }

            .registration-admin .table thead th {
                background: #FAF1F2;
                color: #896B77;
                border-bottom: 1px solid #F0E2E5;
                padding: 15px 13px;
                font-size: 10px;
                font-weight: 500;
                letter-spacing: .6px;
                white-space: nowrap;
            }

            .registration-admin .table tbody td {
                color: #684653;
                border-color: #F3E9EB;
                padding: 16px 13px;
                font-size: 11px;
                line-height: 1.7;
            }

            .registration-admin .primary-text {
                color: #684653;
                font-size: 12px;
            }

            .registration-admin .secondary-text {
                color: #99858C;
                font-size: 10px;
                margin-top: 4px;
                overflow-wrap: anywhere;
            }

            .registration-admin .status {
                display: inline-flex;
                align-items: center;
                gap: 5px;
                padding: 6px 10px;
                border-radius: 20px;
                font-size: 10px;
                white-space: nowrap;
            }

            .registration-admin .status.menunggu {
                background: #FBF3E4;
                color: #A77C3E;
            }

            .registration-admin .status.disetujui {
                background: #EDF4EC;
                color: #63836B;
            }

            .registration-admin .status.ditolak {
                background: #F9ECEE;
                color: #AD6470;
            }

            .registration-admin .action-cell {
                min-width: 230px;
            }

            .registration-admin .note-input {
                display: block;
                width: 100%;
                min-height: 65px;
                padding: 10px;
                border: 1px solid #EDE0E2;
                border-radius: 8px;
                background: white;
                color: #684653;
                font-family: inherit;
                font-size: 11px;
                resize: vertical;
                outline: none;
                margin-bottom: 9px;
            }

            .registration-admin .note-input:focus {
                border-color: #BD718B;
                box-shadow: 0 0 0 3px rgba(217, 143, 166, .12);
            }

            .registration-admin .action-buttons {
                display: flex;
                gap: 7px;
                flex-wrap: wrap;
            }

            .registration-admin .action-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                border: 0;
                border-radius: 7px;
                padding: 9px 11px;
                font-family: inherit;
                font-size: 10px;
                cursor: pointer;
                transition: .2s;
            }

            .registration-admin .approve-btn {
                background: #EDF4EC;
                color: #63836B;
            }

            .registration-admin .approve-btn:hover {
                background: #DDEBDD;
            }

            .registration-admin .reject-btn {
                background: #F9ECEE;
                color: #AD6470;
            }

            .registration-admin .reject-btn:hover {
                background: #F3DDE1;
            }

            .registration-admin .processed-note {
                color: #99858C;
                font-size: 10px;
            }

            .registration-admin .alert {
                font-size: 12px;
                border-radius: 9px;
            }

            .registration-admin .empty-state {
                text-align: center;
                padding: 65px 20px;
            }

            .registration-admin .empty-icon {
                width: 62px;
                height: 62px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 16px;
                border-radius: 50%;
                background: #F4E3E8;
                color: #BD718B;
                font-size: 25px;
            }

            .registration-admin .empty-title {
                font: 24px 'DM Serif Display', serif;
                color: #684653;
                margin-bottom: 8px;
            }

            .registration-admin .empty-text {
                color: #99858C;
                font-size: 11px;
            }

            @media(max-width: 750px) {
                .registration-admin .stats-grid {
                    grid-template-columns: 1fr;
                }

                .registration-admin .intro-panel {
                    padding: 19px;
                }
            }
        </style>

        {{-- INTRO --}}
        <div class="intro-panel">
            <div class="eyebrow">PENGELOLAAN LAYANAN · SABITA</div>

            <h2 class="intro-title">Pendaftaran Layanan</h2>

            <p class="intro-text">
                Periksa pengajuan layanan yang dikirim orang tua,
                lihat informasi anak dan jadwal, lalu tentukan persetujuannya.
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
                <i class="bi bi-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <div>Periksa kembali data yang dimasukkan:</div>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- STATISTIK --}}
        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-label">Total Pendaftaran</div>
                <div class="stat-number">{{ $pendaftaran->count() }}</div>
                <div class="stat-note">Seluruh pengajuan layanan</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Menunggu Persetujuan</div>
                <div class="stat-number">
                    {{ $pendaftaran->where('status', 'menunggu')->count() }}
                </div>
                <div class="stat-note">Pengajuan belum diproses</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Telah Disetujui</div>
                <div class="stat-number">
                    {{ $pendaftaran->where('status', 'disetujui')->count() }}
                </div>
                <div class="stat-note">Pengajuan yang diterima</div>
            </div>

        </div>

        {{-- DAFTAR --}}
        <div class="section-heading">
            <h3 class="section-title">Daftar Pengajuan</h3>

            <span class="section-count">
                {{ $pendaftaran->count() }} data ditemukan
            </span>
        </div>

        <div class="table-card">

            @if ($pendaftaran->isEmpty())

                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-clipboard2-heart"></i>
                    </div>

                    <h4 class="empty-title">Belum Ada Pendaftaran</h4>

                    <p class="empty-text">
                        Pengajuan layanan dari orang tua akan ditampilkan di sini.
                    </p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ORANG TUA</th>
                                <th>ANAK</th>
                                <th>KEGIATAN</th>
                                <th>JADWAL</th>
                                <th>STATUS</th>
                                <th>TINDAKAN ADMIN</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pendaftaran as $item)
                                <tr>
                                    {{-- ORANG TUA --}}
                                    <td>
                                        <div class="primary-text">
                                            {{ $item->user->name ?? 'Pengguna tidak ditemukan' }}
                                        </div>

                                        <div class="secondary-text">
                                            {{ $item->user->email ?? '-' }}
                                        </div>

                                        <div class="secondary-text">
                                            Diajukan
                                            {{ $item->created_at?->format('d/m/Y H:i') ?? '-' }}
                                        </div>
                                    </td>

                                    {{-- ANAK --}}
                                    <td>
                                        <div class="primary-text">
                                            {{ $item->child->nama_anak ?? 'Data anak tidak ditemukan' }}
                                        </div>

                                        <div class="secondary-text">
                                            @if ($item->child && $item->child->tanggal_lahir)
                                                Lahir:
                                                {{ $item->child->tanggal_lahir->translatedFormat('d M Y') }}
                                            @endif
                                        </div>

                                        <div class="secondary-text">
                                            @if ($item->child)
                                                Jenis kelamin:
                                                {{ $item->child->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                            @endif
                                        </div>
                                    </td>

                                    {{-- KEGIATAN --}}
                                    <td>
                                        <div class="primary-text">
                                            {{ $item->schedule->nama_kegiatan ?? 'Jadwal tidak ditemukan' }}
                                        </div>

                                        <div class="secondary-text">
                                            {{ $item->schedule->jenis_layanan ?? '-' }}
                                        </div>
                                    </td>

                                    {{-- JADWAL --}}
                                    <td>
                                        @if ($item->schedule)
                                            <div>
                                                {{ $item->schedule->tanggal?->translatedFormat('d M Y') ?? '-' }}
                                            </div>

                                            <div class="secondary-text">
                                                {{ $item->schedule->jam_mulai ? substr($item->schedule->jam_mulai, 0, 5) : '-' }}

                                                @if ($item->schedule->jam_selesai)
                                                    – {{ substr($item->schedule->jam_selesai, 0, 5) }}
                                                @endif
                                            </div>

                                            <div class="secondary-text">
                                                <i class="bi bi-geo-alt"></i>
                                                {{ $item->schedule->lokasi }}
                                            </div>
                                        @else
                                            -
                                        @endif
                                    </td>

                                    {{-- STATUS --}}
                                    <td>
                                        <span class="status {{ $item->status }}">
                                            @if ($item->status === 'menunggu')
                                                <i class="bi bi-clock"></i>
                                            @elseif ($item->status === 'disetujui')
                                                <i class="bi bi-check-circle"></i>
                                            @else
                                                <i class="bi bi-x-circle"></i>
                                            @endif

                                            {{ ucfirst($item->status) }}
                                        </span>

                                        @if ($item->catatan_admin)
                                            <div class="secondary-text" style="max-width:180px;margin-top:9px">
                                                Catatan: {{ $item->catatan_admin }}
                                            </div>
                                        @endif
                                    </td>

                                    {{-- TINDAKAN --}}
                                    <td class="action-cell">

                                        @if ($item->status === 'menunggu')
                                            <form method="POST"
                                                action="{{ route('admin.registrations.update-status', $item->id) }}">

                                                @csrf
                                                @method('PATCH')

                                                <textarea class="note-input" name="catatan_admin" maxlength="1000" placeholder="Catatan admin (opsional)">{{ old('catatan_admin') }}</textarea>

                                                <div class="action-buttons">

                                                    <button type="submit" name="status" value="disetujui"
                                                        class="action-btn approve-btn"
                                                        onclick="return confirm('Yakin ingin menyetujui pendaftaran ini?')">

                                                        <i class="bi bi-check-lg"></i>
                                                        Setujui
                                                    </button>

                                                    <button type="submit" name="status" value="ditolak"
                                                        class="action-btn reject-btn"
                                                        onclick="return confirm('Yakin ingin menolak pendaftaran ini?')">

                                                        <i class="bi bi-x-lg"></i>
                                                        Tolak
                                                    </button>

                                                </div>
                                            </form>
                                        @else
                                            <div class="processed-note">
                                                <i class="bi bi-check2-circle"></i>
                                                Pendaftaran sudah diproses.
                                            </div>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif

        </div>

    </div>

@endsection

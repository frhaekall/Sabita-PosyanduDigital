@extends('layouts.admin')

@section('title', 'Pemeriksaan Anak')
@section('page-title', 'Pemeriksaan Anak')
@section('page-subtitle', 'Kelola hasil pemeriksaan anak dari pendaftaran Posyandu yang telah disetujui.')

@push('styles')
    <style>
        .exam-page {
            --exam-bg: #fff8f5;
            --exam-surface: #ffffff;
            --exam-rose: #c47d91;
            --exam-rose-dark: #92566d;
            --exam-plum: #513347;
            --exam-text: #493b43;
            --exam-muted: #978792;
            --exam-border: #f0e3e9;
            --exam-soft: #f9edf2;
            --exam-green: #658b76;
            --exam-shadow: 0 12px 35px rgba(81, 51, 71, .06);

            color: var(--exam-text);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
        }

        .exam-page,
        .exam-page * {
            box-sizing: border-box;
        }

        .exam-stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 17px;
            margin-bottom: 25px;
        }

        .exam-stat {
            background: var(--exam-surface);
            border: 1px solid var(--exam-border);
            border-radius: 18px;
            padding: 22px;
            box-shadow: var(--exam-shadow);
        }

        .exam-stat-label {
            color: var(--exam-muted);
            font-size: 12px;
        }

        .exam-stat-number {
            font-family: 'DM Serif Display', serif;
            font-size: 31px;
            color: var(--exam-plum);
            margin-top: 8px;
        }

        .exam-panel {
            background: white;
            border: 1px solid var(--exam-border);
            border-radius: 20px;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: var(--exam-shadow);
        }

        .exam-panel-header {
            padding: 22px 25px;
            border-bottom: 1px solid var(--exam-border);
        }

        .exam-panel-title {
            font-family: 'DM Serif Display', serif;
            font-size: 23px;
            color: var(--exam-plum);
        }

        .exam-panel-desc {
            color: var(--exam-muted);
            margin-top: 6px;
            font-size: 12px;
            line-height: 1.7;
        }

        .exam-table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .exam-table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        .exam-table th {
            text-align: left;
            padding: 15px 20px;
            color: var(--exam-muted);
            background: #fffafc;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: .7px;
            font-weight: 600;
        }

        .exam-table td {
            padding: 17px 20px;
            border-top: 1px solid #f5edf1;
            vertical-align: middle;
        }

        .exam-name {
            color: var(--exam-plum);
            font-weight: 500;
        }

        .exam-secondary {
            font-size: 11px;
            color: var(--exam-muted);
            margin-top: 5px;
        }

        .exam-actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .exam-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            border: 0;
            border-radius: 10px;
            padding: 11px 15px;
            text-decoration: none;
            font-family: inherit;
            font-size: 12px;
            cursor: pointer;
            transition: .2s ease;
            white-space: nowrap;
        }

        .exam-btn-primary {
            background: var(--exam-rose);
            color: white;
        }

        .exam-btn-primary:hover {
            background: var(--exam-rose-dark);
            color: white;
        }

        .exam-btn-soft {
            background: var(--exam-soft);
            color: var(--exam-rose-dark);
        }

        .exam-btn-soft:hover {
            background: #f1dfe6;
            color: var(--exam-plum);
        }

        .exam-btn-danger {
            background: #fff0ed;
            color: #b76558;
        }

        .exam-btn-danger:hover {
            background: #fce0db;
            color: #994b41;
        }

        .exam-btn-sm {
            padding: 9px 12px;
            border-radius: 9px;
            font-size: 11px;
        }

        .exam-empty {
            padding: 40px 20px !important;
            text-align: center;
            color: var(--exam-muted);
            white-space: normal;
        }

        .exam-empty i {
            font-size: 32px;
            display: block;
            color: var(--exam-rose);
            margin-bottom: 12px;
        }

        .exam-empty-text {
            font-size: 12px;
            line-height: 1.7;
        }

        @media(max-width: 700px) {
            .exam-stats {
                grid-template-columns: 1fr;
            }

            .exam-panel-header {
                padding: 18px;
            }

            .exam-panel-title {
                font-size: 21px;
            }
        }
    </style>
@endpush

@section('content')

    <div class="exam-page">

        {{-- STATISTIK --}}
        <div class="exam-stats">

            <div class="exam-stat">
                <div class="exam-stat-label">Total Pemeriksaan</div>
                <div class="exam-stat-number">
                    {{ $pemeriksaan->count() }}
                </div>
            </div>

            <div class="exam-stat">
                <div class="exam-stat-label">Menunggu Pemeriksaan</div>
                <div class="exam-stat-number">
                    {{ $pendaftaranBelumDiperiksa->count() }}
                </div>
            </div>

            <div class="exam-stat">
                <div class="exam-stat-label">Sudah Diperiksa</div>
                <div class="exam-stat-number">
                    {{ $pemeriksaan->count() }}
                </div>
            </div>

        </div>


        {{-- ANTREAN PEMERIKSAAN --}}
        <div class="exam-panel">

            <div class="exam-panel-header">
                <div class="exam-panel-title">Antrean Pemeriksaan</div>

                <div class="exam-panel-desc">
                    Pendaftaran yang disetujui admin dan belum memiliki hasil pemeriksaan.
                </div>
            </div>

            <div class="exam-table-wrap">
                <table class="exam-table">

                    <thead>
                        <tr>
                            <th>Anak</th>
                            <th>Orang Tua</th>
                            <th>Jadwal</th>
                            <th>Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($pendaftaranBelumDiperiksa as $item)
                            <tr>
                                <td>
                                    <div class="exam-name">
                                        {{ $item->child->nama_anak }}
                                    </div>

                                    <div class="exam-secondary">
                                        {{ $item->child->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}
                                    </div>
                                </td>

                                <td>
                                    <div class="exam-name">
                                        {{ $item->user->name }}
                                    </div>

                                    <div class="exam-secondary">
                                        {{ $item->user->email }}
                                    </div>
                                </td>

                                <td>
                                    <div class="exam-name">
                                        {{ $item->schedule->nama_kegiatan }}
                                    </div>

                                    <div class="exam-secondary">
                                        {{ $item->schedule->tanggal->format('d M Y') }}
                                    </div>
                                </td>

                                <td>
                                    {{ $item->schedule->lokasi }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.examinations.create', $item->id) }}"
                                        class="exam-btn exam-btn-primary exam-btn-sm">

                                        <i class="bi bi-clipboard2-pulse"></i>
                                        Input Pemeriksaan

                                    </a>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" class="exam-empty">

                                    <i class="bi bi-check2-circle"></i>

                                    <div class="exam-empty-text">
                                        Tidak ada antrean pemeriksaan saat ini.
                                    </div>

                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>


        {{-- RIWAYAT PEMERIKSAAN --}}
        <div class="exam-panel">

            <div class="exam-panel-header">
                <div class="exam-panel-title">Riwayat Pemeriksaan</div>

                <div class="exam-panel-desc">
                    Daftar hasil pemeriksaan anak yang telah dicatat.
                </div>
            </div>

            <div class="exam-table-wrap">
                <table class="exam-table">

                    <thead>
                        <tr>
                            <th>Anak</th>
                            <th>Tanggal</th>
                            <th>Berat</th>
                            <th>Tinggi</th>
                            <th>Lingkar Kepala</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($pemeriksaan as $item)
                            <tr>
                                <td>
                                    <div class="exam-name">
                                        {{ $item->registration->child->nama_anak }}
                                    </div>

                                    <div class="exam-secondary">
                                        {{ $item->registration->user->name }}
                                    </div>
                                </td>

                                <td>
                                    {{ $item->tanggal_pemeriksaan->format('d M Y') }}
                                </td>

                                <td>
                                    {{ $item->berat_badan }} kg
                                </td>

                                <td>
                                    {{ $item->tinggi_badan }} cm
                                </td>

                                <td>
                                    {{ $item->lingkar_kepala ? $item->lingkar_kepala . ' cm' : '—' }}
                                </td>

                                <td>
                                    <div class="exam-actions">

                                        <a href="{{ route('admin.examinations.show', $item->id) }}"
                                            class="exam-btn exam-btn-soft exam-btn-sm">

                                            <i class="bi bi-eye"></i>
                                            Detail

                                        </a>

                                        <a href="{{ route('admin.examinations.edit', $item->id) }}"
                                            class="exam-btn exam-btn-soft exam-btn-sm">

                                            <i class="bi bi-pencil"></i>
                                            Edit

                                        </a>

                                        <form action="{{ route('admin.examinations.destroy', $item->id) }}" method="POST"
                                            onsubmit="return confirm('Hapus hasil pemeriksaan ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="exam-btn exam-btn-danger exam-btn-sm">

                                                <i class="bi bi-trash"></i>
                                                Hapus

                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="exam-empty">

                                    <i class="bi bi-clipboard2-heart"></i>

                                    <div class="exam-empty-text">
                                        Belum ada hasil pemeriksaan.
                                    </div>

                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>
            </div>

        </div>

    </div>

@endsection

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input Pemeriksaan Anak | SABITA</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --pink: #d98a9d;
            --pink-dark: #b96d83;
            --pink-soft: #f8e8ed;
            --ivory: #fffaf7;
            --plum: #563747;
            --muted: #9b8793;
            --border: #f0dfe5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--ivory);
            color: var(--plum);
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 13px;
        }

        .page {
            max-width: 1050px;
            margin: auto;
            padding: 35px 24px 55px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .brand {
            color: var(--pink-dark);
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        h1 {
            font-family: 'DM Serif Display', serif;
            font-weight: 400;
            font-size: 36px;
            margin: 10px 0;
        }

        .subtitle {
            color: var(--muted);
            line-height: 1.8;
        }

        .back-btn {
            border: 1px solid var(--border);
            background: white;
            color: var(--plum);
            padding: 10px 15px;
            border-radius: 12px;
            text-decoration: none;
            white-space: nowrap;
        }

        .back-btn:hover {
            background: var(--pink-soft);
            color: var(--plum);
        }

        .section-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 8px 30px rgba(86, 55, 71, .035);
        }

        .section-title {
            font-family: 'DM Serif Display', serif;
            font-size: 23px;
            font-weight: 400;
            margin-bottom: 5px;
        }

        .section-desc {
            color: var(--muted);
            margin-bottom: 22px;
            line-height: 1.7;
        }

        .identity {
            background: #fff7f9;
            border: 1px solid var(--border);
            border-radius: 15px;
            padding: 18px;
        }

        .identity-label {
            color: var(--muted);
            font-size: 11px;
            margin-bottom: 6px;
        }

        .identity-value {
            font-size: 13px;
            color: var(--plum);
            overflow-wrap: anywhere;
        }

        .form-label {
            color: var(--plum);
            margin-bottom: 8px;
            font-size: 12px;
        }

        .form-control,
        .form-select {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 13px;
            color: var(--plum);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--pink);
            box-shadow: 0 0 0 3px rgba(217, 138, 157, .13);
        }

        .input-group-text {
            background: var(--pink-soft);
            border: 1px solid var(--border);
            color: var(--pink-dark);
            border-radius: 0 12px 12px 0;
            padding: 0 14px;
        }

        textarea.form-control {
            min-height: 110px;
            resize: vertical;
        }

        .alert {
            border-radius: 13px;
            border: none;
        }

        .alert-danger {
            background: #fff0f0;
            color: #a34f58;
        }

        .btn-save {
            background: var(--pink-dark);
            color: white;
            border: none;
            border-radius: 12px;
            padding: 13px 22px;
            font-family: inherit;
        }

        .btn-save:hover {
            background: #a85c73;
            color: white;
        }

        .btn-cancel {
            background: white;
            border: 1px solid var(--border);
            color: var(--plum);
            border-radius: 12px;
            padding: 13px 22px;
            text-decoration: none;
        }

        .btn-cancel:hover {
            background: var(--pink-soft);
            color: var(--plum);
        }

        .required {
            color: var(--pink-dark);
        }

        @media (max-width: 576px) {
            .page {
                padding: 25px 15px 40px;
            }

            h1 {
                font-size: 29px;
            }

            .section-card {
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="page">

        <div class="topbar">
            <div>
                <div class="brand">SABITA · Layanan Kesehatan Anak</div>
                <h1>Input Pemeriksaan</h1>
                <div class="subtitle">
                    Catat hasil pemeriksaan anak berdasarkan pendaftaran Posyandu.
                </div>
            </div>

            <a href="{{ route('admin.examinations.index') }}" class="back-btn">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <div class="mb-2">
                    <i class="bi bi-exclamation-circle me-1"></i>
                    Periksa kembali data pemeriksaan:
                </div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- IDENTITAS ANAK --}}
        <div class="section-card">
            <div class="section-title">Informasi Anak</div>
            <div class="section-desc">
                Pastikan pemeriksaan dilakukan untuk anak yang sesuai.
            </div>

            <div class="identity">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="identity-label">Nama Anak</div>
                        <div class="identity-value">
                            {{ $registration->child->nama_anak }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="identity-label">Nama Orang Tua</div>
                        <div class="identity-value">
                            {{ $registration->user->name ?? '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="identity-label">Kegiatan Posyandu</div>
                        <div class="identity-value">
                            {{ $registration->schedule->nama_kegiatan }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="identity-label">Tanggal Kegiatan</div>
                        <div class="identity-value">
                            {{ $registration->schedule->tanggal?->format('d/m/Y') ?? '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="identity-label">Lokasi</div>
                        <div class="identity-value">
                            {{ $registration->schedule->lokasi ?? '-' }}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="identity-label">Status Pendaftaran</div>
                        <div class="identity-value">
                            <span class="badge rounded-pill px-3 py-2" style="background:#e9f5ed;color:#538263;">
                                Disetujui
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FORM PEMERIKSAAN --}}
        <form action="{{ route('admin.examinations.store') }}" method="POST">
            @csrf

            <input type="hidden" name="registration_id" value="{{ $registration->id }}">

            <div class="section-card">
                <div class="section-title">Hasil Pemeriksaan</div>
                <div class="section-desc">
                    Masukkan hasil pengukuran anak sesuai hasil pemeriksaan di Posyandu.
                </div>

                <div class="row g-4">

                    <div class="col-md-6">
                        <label for="tanggal_pemeriksaan" class="form-label">
                            Tanggal Pemeriksaan <span class="required">*</span>
                        </label>

                        <input type="date" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan"
                            class="form-control @error('tanggal_pemeriksaan') is-invalid @enderror"
                            value="{{ old('tanggal_pemeriksaan', now()->format('Y-m-d')) }}"
                            max="{{ now()->format('Y-m-d') }}" required>

                        @error('tanggal_pemeriksaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="berat_badan" class="form-label">
                            Berat Badan <span class="required">*</span>
                        </label>

                        <div class="input-group">
                            <input type="number" step="0.01" min="0.1" max="300" id="berat_badan"
                                name="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror"
                                value="{{ old('berat_badan') }}" placeholder="Contoh: 12.50" required>
                            <span class="input-group-text">kg</span>
                        </div>

                        @error('berat_badan')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="tinggi_badan" class="form-label">
                            Tinggi Badan <span class="required">*</span>
                        </label>

                        <div class="input-group">
                            <input type="number" step="0.01" min="1" max="250" id="tinggi_badan"
                                name="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror"
                                value="{{ old('tinggi_badan') }}" placeholder="Contoh: 85.50" required>
                            <span class="input-group-text">cm</span>
                        </div>

                        @error('tinggi_badan')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="lingkar_kepala" class="form-label">
                            Lingkar Kepala
                        </label>

                        <div class="input-group">
                            <input type="number" step="0.01" min="1" max="100" id="lingkar_kepala"
                                name="lingkar_kepala"
                                class="form-control @error('lingkar_kepala') is-invalid @enderror"
                                value="{{ old('lingkar_kepala') }}" placeholder="Contoh: 45.00">
                            <span class="input-group-text">cm</span>
                        </div>

                        @error('lingkar_kepala')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12">
                        <label for="catatan" class="form-label">
                            Catatan Pemeriksaan
                        </label>

                        <textarea id="catatan" name="catatan" class="form-control @error('catatan') is-invalid @enderror"
                            placeholder="Catatan tambahan hasil pemeriksaan, jika ada..." maxlength="2000">{{ old('catatan') }}</textarea>

                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="d-flex flex-wrap justify-content-end gap-2">
                <a href="{{ route('admin.examinations.index') }}" class="btn-cancel">
                    Batal
                </a>

                <button type="submit" class="btn-save">
                    <i class="bi bi-check2-circle me-1"></i>
                    Simpan Pemeriksaan
                </button>
            </div>
        </form>

    </div>
</body>

</html>

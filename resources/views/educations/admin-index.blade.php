@extends('layouts.admin')

@section('title', 'Kelola Edukasi')
@section('page-title', 'Ruang Edukasi')
@section('page-subtitle', 'Kelola artikel kesehatan yang dapat dibaca oleh orang tua dan masyarakat.')

@push('styles')
    <style>
        .education-admin {
            --ea-rose: #BD718B;
            --ea-plum: #684653;
            --ea-muted: #9B8790;
            --ea-border: #F0E2E5;
        }

        .education-admin .ea-toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .education-admin .ea-count {
            color: var(--ea-muted);
            font-size: 11px;
        }

        .education-admin .ea-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border-radius: 11px;
            background: var(--ea-rose);
            color: white;
            font-size: 11px;
            text-decoration: none;
            transition: .2s;
        }

        .education-admin .ea-add:hover {
            background: var(--ea-plum);
            color: white;
        }

        .education-admin .ea-card {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 19px;
            margin-bottom: 13px;
            background: white;
            border: 1px solid var(--ea-border);
            border-radius: 17px;
            box-shadow: 0 8px 30px rgba(104, 70, 83, .045);
        }

        .education-admin .ea-image,
        .education-admin .ea-placeholder {
            width: 115px;
            height: 100px;
            flex-shrink: 0;
            border-radius: 12px;
        }

        .education-admin .ea-image {
            object-fit: cover;
        }

        .education-admin .ea-placeholder {
            display: grid;
            place-items: center;
            background: #F8E8EC;
            color: var(--ea-rose);
            font-size: 30px;
        }

        .education-admin .ea-info {
            flex: 1;
            min-width: 0;
        }

        .education-admin .ea-category {
            display: inline-block;
            padding: 5px 10px;
            margin-bottom: 8px;
            border-radius: 30px;
            background: #F8E8EC;
            color: var(--ea-rose);
            font-size: 10px;
        }

        .education-admin .ea-title {
            margin-bottom: 6px;
            color: var(--ea-plum);
            font: 21px 'DM Serif Display', serif;
        }

        .education-admin .ea-description {
            margin: 0;
            color: var(--ea-muted);
            font-size: 11px;
            line-height: 1.7;
        }

        .education-admin .ea-status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 30px;
            font-size: 10px;
        }

        .education-admin .ea-published {
            background: #EDF4E9;
            color: #55754D;
        }

        .education-admin .ea-draft {
            background: #FBF1DE;
            color: #9A713A;
        }

        .education-admin .ea-actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .education-admin .ea-actions form {
            margin: 0;
        }

        .education-admin .ea-action {
            display: grid;
            place-items: center;
            width: 35px;
            height: 35px;
            border: 1px solid var(--ea-border);
            border-radius: 9px;
            background: white;
            color: var(--ea-rose);
            cursor: pointer;
        }

        .education-admin .ea-action:hover {
            background: #F8E9E8;
        }

        .education-admin .ea-empty {
            padding: 65px 20px;
            border: 1px dashed #E5C8D3;
            border-radius: 18px;
            background: white;
            text-align: center;
        }

        .education-admin .ea-empty>i {
            color: #D8B8C4;
            font-size: 42px;
        }

        .education-admin .ea-empty h3 {
            margin-top: 15px;
            color: var(--ea-plum);
            font: 25px 'DM Serif Display', serif;
        }

        .education-admin .ea-empty p {
            color: var(--ea-muted);
            font-size: 11px;
        }

        .education-admin .pagination {
            margin-top: 22px;
        }

        .education-admin .page-link {
            color: var(--ea-rose);
            border-color: var(--ea-border);
        }

        .education-admin .page-item.active .page-link {
            background: var(--ea-rose);
            border-color: var(--ea-rose);
            color: white;
        }

        @media(max-width: 560px) {
            .education-admin .ea-toolbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .education-admin .ea-card {
                flex-wrap: wrap;
            }

            .education-admin .ea-info {
                flex-basis: calc(100% - 135px);
            }

            .education-admin .ea-actions {
                width: 100%;
                justify-content: flex-end;
            }
        }
    </style>
@endpush

@section('content')
    <div class="education-admin">

        <div class="ea-toolbar">
            <div class="ea-count">
                <i class="bi bi-journal-text me-1"></i>
                {{ $educations->total() }} artikel tersimpan
            </div>

            <a href="{{ route('admin.educations.create') }}" class="ea-add">
                <i class="bi bi-plus-circle"></i>
                Tambah Artikel
            </a>
        </div>

        @forelse ($educations as $education)
            <article class="ea-card">

                @if ($education->gambar)
                    <img src="{{ asset('storage/' . $education->gambar) }}" class="ea-image" alt="{{ $education->judul }}">
                @else
                    <div class="ea-placeholder">
                        <i class="bi bi-book-heart"></i>
                    </div>
                @endif

                <div class="ea-info">
                    <span class="ea-category">{{ $education->kategori }}</span>

                    <h3 class="ea-title">{{ $education->judul }}</h3>

                    <p class="ea-description">
                        {{ $education->ringkasan ?: \Illuminate\Support\Str::limit(strip_tags($education->isi), 120) }}
                    </p>

                    <div class="mt-2 d-flex align-items-center gap-2 flex-wrap">
                        <span class="ea-status {{ $education->status === 'published' ? 'ea-published' : 'ea-draft' }}">
                            {{ $education->status === 'published' ? 'Dipublikasikan' : 'Draft' }}
                        </span>

                        <span style="font-size:10px;color:var(--ea-muted)">
                            {{ $education->created_at?->format('d M Y') }}
                        </span>
                    </div>
                </div>

                <div class="ea-actions">
                    <a href="{{ route('admin.educations.edit', $education) }}" class="ea-action" title="Edit artikel">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ route('admin.educations.destroy', $education) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="ea-action" title="Hapus artikel">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>

            </article>
        @empty
            <div class="ea-empty">
                <i class="bi bi-journal-heart"></i>
                <h3>Belum Ada Artikel Edukasi</h3>
                <p class="mt-2">
                    Mulai tambahkan informasi kesehatan untuk orang tua dan masyarakat.
                </p>

                <a href="{{ route('admin.educations.create') }}" class="ea-add mt-3">
                    <i class="bi bi-plus-circle"></i>
                    Buat Artikel Pertama
                </a>
            </div>
        @endforelse

        <div class="d-flex justify-content-center">
            {{ $educations->links() }}
        </div>

        <footer class="text-center pt-4 pb-2" style="color:#B4A2AA;font-size:10px">
            SABITA · Sistem Informasi Posyandu Digital
            <br>
            <span class="d-inline-block mt-2">© {{ date('Y') }} SABITA</span>
        </footer>

    </div>
@endsection

@extends('layout.main')

@section('judul')
    Halaman Home
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button type="button" class="btn btn-primary" onclick="window.location='/mhs/tambah'">
                    Tambah
                </button>

                <button type="button" class="btn btn-info" onclick="window.location='/mhs/datasoft'">
                    Tampil Data Soft Delete
                </button>
            </h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (session('msg'))
                <p>
                    {{ session('msg') }}
                </p>
            @endif

            <form method="get">
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">
                        Cari Data
                    </label>

                    <div class="col-sm-10">
                        <input type="text" name="cari" id="cari" class="form-control" placeholder="Cari Data"
                            autofocus="true" value="{{ $cari }}">
                    </div>
                </div>
            </form>

            <table class="table table-responsive-sm table-bordered table-striped">
                <thead>
                    <th>NO</th>
                    <th>@sortablelink('mhsnim', 'NIM')</th>
                    <th>@sortablelink('mhsnama', 'NAMA')</th>
                    <th>@sortablelink('mhstelp', 'TELP')</th>
                    <th>@sortablelink('mhsalamat', 'ALAMAT')</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $nomor = 1 + ($dataMhs->currentPage() - 1) * $dataMhs->perPage();
                    @endphp

                    @foreach ($dataMhs as $d)
                        <tr>
                            <td> {{ $nomor++ }}</td>
                            <td> {{ $d->mhsnim }}</td>
                            <td>{{ $d->mhsnama }}</td>
                            <td>{{ $d->mhstelp }}</td>
                            <td>{{ $d->mhsalamat }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn btn-warning"
                                    onclick="window.location='/mhs/edit/{{ $d->mhsnim }}'">
                                    Edit
                                </button>

                                <form action="/mhs/hapus/{{ $d->mhsnim }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn btn-danger " type="submit">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class="mt-3">


                {!! $dataMhs->appends(Request::except('page'))->render() !!}
            </div>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
@endsection

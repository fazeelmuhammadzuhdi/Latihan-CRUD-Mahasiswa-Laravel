@extends('layout.main')

@section('judul')
    Form Hapus Data Dan Restore
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-sm btn btn-dark" type="button" onclick="window.location='/mhs/index'">
                    &laquo; Kembali
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
            <table class="table table-sm table-bordered table-striped">
                <thead>
                    <th>No</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>TELP</th>
                    <th>ALAMAT</th>
                    <th>Aksi</th>
                </thead>
                <tbody>

                    @foreach ($dataMhs as $d)
                        <tr>
                            <td> {{ $loop->iteration }}</td>
                            <td> {{ $d->mhsnim }}</td>
                            <td>{{ $d->mhsnama }}</td>
                            <td>{{ $d->mhstelp }}</td>
                            <td>{{ $d->mhsalamat }}</td>
                            <td>

                                <button class="btn btn-primary" type="button"
                                    onclick="restore('{{ $d->mhsnim }}')">Restore</button>
                                <form action="/mhs/forceDelete/{{ $d->mhsnim }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button class=" btn btn-danger" type="submit">
                                        Hapus
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

            <script>
                function restore(nim) {
                    pesan = confirm('Yakin Data Di Kembalikan?')
                    if (pesan) {

                        window.location = '/mhs/restore/' + nim
                    }
                }
            </script>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
@endsection

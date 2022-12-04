@extends('layout.main')

@section('judul')
    Form Tambah Mahasiswa
@endsection

@section('isi')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <button class="btn btn-sm btn btn-outline-primary" type="button" onclick="window.location='/mhs/index'">
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
                <div class="alert alert-success">
                    <ul>
                        {{ session('msg') }}
                    </ul>
                </div>
            @endif


            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}

            <form class="form-group" action="{{ url('/mhs/simpan') }}" method="POST">
                @csrf

                <table class="table table-sm table-striped">
                    <tr>
                        <td>NIM :</td>
                        <td>
                            <input type="text" name="nim" id="nim"
                                class="form-control @error('nim') is-invalid @enderror" autofocus="true"
                                value="{{ old('nim') }}">

                            @error('nim')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>

                    </tr>
                    <tr>
                        <td>Nama Mahasiswa :</td>
                        <td>
                            <input type="text" name="nama" id="nama"
                                class="form-control form-control-sm @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}">

                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Telp :</td>
                        <td>
                            <input type="text" name="telp" id="telp"
                                class="form-control form-control-sm @error('telp') is-invalid @enderror"
                                value="{{ old('telp') }}">

                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <textarea name="alamat" cols="50" rows="5" class="form-control form-control-sm">{{ old('alamat') }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-success" type="submit">
                                Simpan
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
@endsection

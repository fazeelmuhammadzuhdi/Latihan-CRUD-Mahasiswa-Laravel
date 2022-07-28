@extends('layout.main')

@section('judul')
    Form Edit
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
            <form action="{{ url('/mhs/update') }}" method="POST">
                @csrf
                @method('PUT')
                <table style="windows:70%;">
                    <tr>
                        <td>NIM :</td>
                        <td>
                            <input type="text" name="nim" id="nim" value="{{ $nim }}" readonly
                                style="cursor: not-allowed">
                        </td>
                    </tr>
                    <tr>
                        <td>Nama Mahasiswa :</td>
                        <td>
                            <input type="text" name="nama" id="nama" value="{{ $nama }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Telp :</td>
                        <td>
                            <input type="text" name="telp" id="telp" value="{{ $telp }}">
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <textarea name="alamat" cols="50" rows="5">{{ $alamat }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button class="btn btn-success" type="submit">
                                Update
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

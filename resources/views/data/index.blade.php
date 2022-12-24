@extends('layout.main')

@section('judul')
    Halaman Home
@endsection

@section('isi')
    <div class="container">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th width="15%">Aksii</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('after-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            isiData()
        })

        function isiData() {
            $('#table1').DataTable({
                serverside: true,
                responseive: true,
                ajax: {
                    url: "{{ route('data') }}"
                },
                columns: [{
                        "data": null,
                        "sortable": false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1
                        }
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'telp',
                        name: 'telp'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
                ]
            })
        }
    </script>
@endpush

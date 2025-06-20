@extends('dashboard.layout.main')

@section('content')
    <div class="row p-2">
        <div class="col">
            <a href="{{ route('documents.create') }}" class="btn btn-primary float-end mb-3">
                <i class="fas fa-plus me-2"></i>Tambah
            </a>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @elseif (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <table class="table table-striped w-100" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Slug</th>
                            <th>Jenis</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $index => $document)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $document->judul }}</td>
                                <td>{{ $document->slug }}</td>
                                <td>
                                    @switch($document->jenis)
                                        @case(1)
                                            <span class="badge bg-info">Pusat Audit Mutu</span>
                                        @break

                                        @case(2)
                                            <span class="badge bg-success">Pusat Pengembangan
                                                Standart Mutu Akademik</span>
                                        @break

                                        @case(3)
                                            <span class="badge bg-primary">Pusat Pengembangan
                                                Standart Mutu Non Akademik</span>
                                        @break
                                    @endswitch
                                </td>
                                <td>
                                    @if ($document->gambar)
                                        <img src="{{ asset('storage/' . $document->gambar) }}" alt="" width="80"
                                            class="img-thumbnail">
                                    @else
                                        <small class="text-muted">Tidak ada</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('documents.edit', $document->id) }}"
                                        class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('documents.destroy', $document->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin hapus dokumen ini?')">Delete</button>
                                    </form>

                                    <a href="{{ route('documents.show', $document->id) }}"
                                        class="btn btn-info btn-sm">Lihat</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                autoWidth: false,
                scrollX: true,
                language: {
                    search: "",
                    searchPlaceholder: "Search...",
                    decimal: ",",
                    thousands: ".",
                    paginate: {
                        previous: "<i class='fa fa-chevron-left'></i>",
                        next: "<i class='fa fa-chevron-right'></i>"
                    }
                }
            });

            $('.dataTables_filter input[type="search"]').css({
                marginBottom: "10px"
            });
        });
    </script>
@endsection

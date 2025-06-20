@extends('dashboard.layout.main')

@section('content')
    <div class="row p-2">
        <div class="col">
            <a href="{{ route('berita.create') }}" class="btn btn-primary float-end mb-3">
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
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beritas as $index => $berita)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->slug }}</td>
                                <td>
                                    @if ($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="" width="80"
                                            class="img-thumbnail">
                                    @else
                                        <small class="text-muted">Tidak ada</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Yakin hapus berita ini?')">Delete</button>
                                    </form>
                                    <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-info">Lihat</a>
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

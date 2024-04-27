@extends('admin.template.template-admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        {{-- alert untuk menampilkan notifikasi jika berhasil ditambahkan --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                        Video
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                        aria-selected="false">
                        Bank Soal
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    <div class="table-responsive text-nowrap p-3">
                        <div class="d-inline-block mb-3">
                            <a href="/admin/course/create" class="btn btn-primary d-flex align-items-center">Tambah</a>
                        </div>
                        <table id="myTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Isi</th>
                                    <th>Video</th>
                                    <th>PDF</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $item)
                                    {{-- <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $item['amount_question'] }}</td>
                  <td>{{ $item['duration'] }} menit</td>
                  <td class="d-flex gap-2">            
                    <form action="/admin/exam/{{ $item['id'] }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    
                    <a class="btn btn-warning" href="/admin/exam/{{ $item['id'] }}/edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-success" href="/admin/exam/" role="button"><i class="fa-solid fa-circle-info"></i></a>
                  </td>
                </tr> --}}
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <div class="table-responsive text-nowrap p-3">
                        <div class="d-inline-block mb-3">
                            <a href="/admin/course/create" class="btn btn-primary d-flex align-items-center">Tambah</a>
                        </div>
                        <table id="myTable1" class="table table-hover w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tipe</th>
                                    <th>Isi</th>
                                    <th>Video</th>
                                    <th>PDF</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($data as $item) --}}
                                    {{-- <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $item['amount_question'] }}</td>
                  <td>{{ $item['duration'] }} menit</td>
                  <td class="d-flex gap-2">            
                    <form action="/admin/exam/{{ $item['id'] }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                    </form>
                    
                    <a class="btn btn-warning" href="/admin/exam/{{ $item['id'] }}/edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a class="btn btn-success" href="/admin/exam/" role="button"><i class="fa-solid fa-circle-info"></i></a>
                  </td>
                </tr> --}}
                                {{-- @endforeach --}}

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <script>
        let table = new DataTable('#myTable');
        let table1 = new DataTable('#myTable1');
    </script>
@endsection

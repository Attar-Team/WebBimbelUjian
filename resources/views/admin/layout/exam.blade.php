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


                  <div class="card " >
                    <div class="table-responsive text-nowrap p-3">
                    <div class="d-inline-block mb-3">
                    <a href="/admin/exam/create"  class="btn btn-primary d-flex align-items-center">Tambah</a>
                    </div>
                      <table id="myTable" class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Banyak Soal</th>
                            <th>Durasi</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($data as $item)
                          <tr>
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
                          </tr>
                          @endforeach
                          
                        </tbody>
                       
                      </table>
                    </div>
                  </div>
                </div>
    
                <script>
                  let table = new DataTable('#myTable');
                </script>
@endsection
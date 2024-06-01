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
                    </div>
                      <table id="myTable" class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>No Telepon</th>
                            <th>Image</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($users as $user)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['role'] }}</td>
                            <td>{{ $user['no_telp'] }}</td>
                            <td>
                                <img src="{{ $user['image'] }}" alt="">
                            </td>
                            <td class="d-flex gap-2">            
                              <form action="/admin/user/{{ $user['id'] }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Apakah yakin untuk menghapus')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                              </form>
                              
                              <a class="btn btn-warning" href="/admin/user/{{ $user['id'] }}/edit" role="button"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a class="btn btn-success" href="/admin/user/" role="button"><i class="fa-solid fa-circle-info"></i></a>
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
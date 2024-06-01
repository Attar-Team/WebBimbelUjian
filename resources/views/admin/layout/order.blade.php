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
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Bayar</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($orders as $order)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order['date'] }}</td>
                            <td>{{ $order['status'] }}</td>
                            <td>{{ $order['gross_amount'] }}</td>
                            <td class="d-flex gap-2">            
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
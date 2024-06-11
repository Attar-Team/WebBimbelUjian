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
                        <table id="myTable" class="table table-hover">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Bayar</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                              @foreach ($reports as $report)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $report->user->name }}</td>
                                <td>{{ $report['date'] }}</td>
                                <td>{{ $report['status'] }}</td>
                                <td>{{ $report['gross_amount'] }}</td>
                                
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
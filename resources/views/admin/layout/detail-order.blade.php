@extends('admin.template.template-admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xxl">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <p class="col-sm-3 r">Nama</p>
                        <p class="col-sm-2">{{ $order->user->name }}</p>
                    </div>

                    <div class="row mb-2">
                        <p class="col-sm-3 r">Tanggal</p>
                        <p class="col-sm-2">{{ $order->date }}</p>
                    </div>

                    <div class="row mb-2">
                        <p class="col-sm-3 r">Status</p>
                        <p class="col-sm-2">{{ $order->status }}</p>
                    </div>

                    <div class="row mb-2">
                        <p class="col-sm-3 r">Jumlah Total</p>
                        <p class="col-sm-2">{{ $order->gross_amount }}</p>
                    </div>

                   

                    <div class="row">
                        <p class="col-sm-3 r">Tipe pembayaran</p>
                        <p class="col-sm-2">{{ $order->transaction->payment_type }}</p>
                    </div>
                </div>

                

                <div class="table-responsive text-nowrap p-3">
  
                      <table id="myTable" class="table table-hover">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>diskon</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                          @foreach ($order->order_details as $item)
                          {{-- @dd($item->package) --}}
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->package->name }}</td>
                            <td>{{ $item->package->price }}</td>
                            <td>{{ $item->package->discount }}</td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                       
                      </table>
                    </div>
            </div>
        </div>

    </div>
@endsection

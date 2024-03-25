@extends('admin.template.template-admin')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
          <div class="card-body">
            <form method="post" action="/admin/exam">
              @csrf
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="basic-default-name" placeholder="John Doe" />
                  @error('name')
                  <small style="color: red">* {{ $message }}</small>
              @enderror
                </div>

              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-company">Duration</label>
                <div class="col-sm-2">
                    <input class="form-control" name="duration"  value="{{ old('duration') }}" type="time" id="html5-time-input" />
                    @error('duration')
                    <small style="color: red">* {{ $message }}</small>
                @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-email">Banyak Soal</label>
                <div class="col-sm-2">
                  <div class="input-group input-group-merge">
                    <input
                      type="number"
                      name="amount_question"
                      id="basic-default-email"
                      value="{{ old('amount_question') }}"
                      class="form-control"
                      placeholder="50"
                      aria-label="john.doe"
                      aria-describedby="basic-default-email2"
                    />
                    @error('amount_question')
                    <small style="color: red">* {{ $message }}</small>
                @enderror
                  </div>
                 
                </div>
              </div>
              
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label" for="basic-default-message">Acak soal</label>
                <div class="col-sm-10">
                  <div class="form-check form-switch mb-2">
                    <input class="form-check-input" name="is_random" type="checkbox" id="flexSwitchCheckDefault" />
                  </div>
                </div>
              </div>
              <div class="row justify-content-end">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</div>
@endsection

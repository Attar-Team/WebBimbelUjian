@extends('admin.template.template-admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <form method="post" action="/admin/package/create" enctype="multipart/form-data">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-body">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    id="basic-default-name" placeholder="John Doe" />
                                @error('name')
                                    <small style="color: red">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-3 w-100">
                            <div class="w-100">
                                <label for="exampleFormControlSelect1" class="form-label">Kategori</label>
                                <select class="form-select" name="type" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="BUMN">BUMN</option>
                                    <option value="CPNS">CPNS</option>
                                </select>
                            </div>
                            <div class="w-100">
                                <label for="exampleFormControlSelect1" class="form-label">Tipe</label>
                                <select class="form-select" name="category" id="exampleFormControlSelect1"
                                    aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="try-out">Try Out</option>
                                    <option value="kursus">Kursus</option>
                                </select>
                            </div>

                        </div>

                        <div class="d-flex gap-3 mb-3 w-100">
                            <div class="w-100">
                                <label class="form-label" for="basic-icon-default-company">Harga</label>
                                <div class="input-group input-group-merge">

                                    <input type="text" name="price" onkeyup="rupiah(this)"
                                        id="basic-icon-default-company" placeholder="50.000" class="form-control" />
                                </div>
                            </div>
                            <div class="w-100">
                                <label class="form-label" for="basic-icon-default-company">Diskon</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" name="discount" onkeyup="rupiah(this)"
                                        id="basic-icon-default-company" placeholder="50.000" class="form-control" />
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea name="description" id="mytextarea" cols="102" rows="8">{{ old('question') }}</textarea>
                                @error('question')
                                    <small style="color: red">* {{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto</label>
                            <input class="form-control" name="file" type="file" id="formFile" />
                          </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                        <div class="nav-align-top mb-4">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-top-home" aria-controls="navs-top-home" aria-selected="true">
                                        Ujian
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-top-profile" aria-controls="navs-top-profile"
                                        aria-selected="false">
                                        Video
                                    </button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                        data-bs-target="#navs-top-messages" aria-controls="navs-top-messages"
                                        aria-selected="false">
                                        Bank Soal
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content px-1 py-3">
                                <div class="tab-pane fade show active" id="navs-top-home" role="tabpanel">
                                    <table id="myTable" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Banyak Soal</th>
                                                <th>Pengaturan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($exam as $item)
                                                <tr>
                                                    <td>{{ $item['name'] }}</td>
                                                    <td>{{ $item['amount_question'] }}</td>
                                                    <td>
                                                        <div class="d-flex gap-3 mb-3">
                                                            <label class=" col-form-label"
                                                                for="basic-default-name">Akses</label>
                                                            <div class="">
                                                                <input type="number" class="form-control"
                                                                    value="1" id="akses{{ $item['id'] }}" name="acces[]"
                                                                    placeholder="1" />
                                                            </div>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" name="is_review[]"
                                                                value="{{ $item['id'] }}" id="pembahasan{{ $item['id'] }}">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Pembahasan
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="question[]"
                                                                value="{{ $item['id'] }}"
                                                                onchange="check('{{ $loop->iteration }}','{{ $item['id'] }}','{{ $item['name'] }}')"
                                                                id="{{ $item['id'] }}">
                                                            <label class="form-check-label" for="flexCheckDefault">
                                                                Tambah
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="tab-pane fade" id="navs-top-profile" role="tabpanel">
                                    <table id="TableVideo" class="table table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Review</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($course as $item)
                                                @if ($item->type == 'videos')
                                                    <tr>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['content'] }}</td>
                                                        <td>
                                                            {{-- <input type="hidden" name="" value="{{$item['url']}}" id="asd"> --}}
                                                            <button type="button"
                                                                onclick="previewVideo('{{ $item['url'] }}')"
                                                                id="preview-video" class="btn btn-info">Preview</button>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                name="video[]"
                                                                    value="{{ $item['id'] }}"
                                                                    onchange="checkVideo('{{ $loop->iteration }}','{{ $item->id }}','{{ $item->name }}','{{ $item->url }}')"
                                                                    id="checkboxVideo{{ $item['id'] }}">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Tambah
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="tab-pane fade" id="navs-top-messages" role="tabpanel">
                                    <table id="TablePdf" class="table table-hover w-100">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Deskripsi</th>
                                                <th>Review</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($course as $item)
                                                @if ($item->type == 'file pdf')
                                                    <tr>
                                                        <td>{{ $item['name'] }}</td>
                                                        <td>{{ $item['content'] }}</td>
                                                        <td><button type="button"
                                                                onclick="previewPdf('{{ $item['url'] }}')"
                                                                class="btn btn-info">Preview</button>
                                                        </td>
                                                        <td>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                value="{{ $item['id'] }}" name="pdf[]"
                                                                    onchange="checkFile('{{ $loop->iteration }}','{{ $item->id }}','{{ $item->name }}','{{ $item->url }}')"
                                                                    id="checkboxFile{{ $item['id'] }}"
                                                                    >
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Tambah
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Preview</h5>
                    </div>
                    <div class="card-body">
                        <div class="wraper-preview"></div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Preview Item</h5>
                    </div>
                    <div class="card-body">
                        <div class="card m-3 p-3" style="background-color: #f9f9f9">
                            <h5>Ujian</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Pembahasan</th>
                                        <th>Jumlah akses</th>
                                    </tr>
                                </thead>
                                <tbody class="wraper-list">

                                </tbody>

                            </table>
                        </div>
                        <div class="card m-3 p-3" style="background-color: #f9f9f9">
                            <h5>Video</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Video</th>
                                    </tr>
                                </thead>
                                <tbody class="wraper-list-video">

                                </tbody>

                            </table>
                        </div>
                        <div class="card m-3 p-3" style="background-color: #f9f9f9">
                            <h5>Video</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Pdf</th>
                                    </tr>
                                </thead>
                                <tbody class="wraper-list-file">
                                    {{-- <tr>
                                        <td><embed src="/show-pdf/ievrY6I8LLpLpdDqqLHgSljp3xPhmrysHBaTHEXl.pdf" width="550px" height="500px" type="text/pdf"></td>
                                    </tr> --}}
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-info w-100">Kirim</button>
    </form>

        

    </div>


    <script>
        let table = new DataTable('#myTable');
        let tableVideo = new DataTable('#TableVideo');
        let tablePdf = new DataTable('#TablePdf');
    </script>


    <script type="text/javascript">
        var resultUjian = [];
        var resultVideo = [];
        var resultFile = [];

        function previewVideo(id) {
            var wraper = $(".wraper-preview");
            $(wraper).children().remove();
            $(wraper).append(
                '<iframe width="550" height="355"src="https://www.youtube.com/embed/' + id +
                '?si=2AOD3eqaeraqngEP"title="YouTube video player" frameborder="0"allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'
            )
        }

        function previewPdf(id) {
            var wraper = $(".wraper-preview");
            $(wraper).children().remove();
            var fileName = id.split('/').pop();
            $(wraper).append(
                '<embed src="/show-pdf/' + fileName + '" width="550px" height="500px" type="text/pdf">'
            )
        }

        function check(no, id, name) {
            if ($(":input[type=checkbox][id=" + id + "]:checked").val() != undefined) {
                var jumlah_akses = $('#akses' + id + '').val();
                var pembahasan = "-";
                if ($(":input[type=checkbox][id=pembahasan" + id + "]:checked").val() != undefined) {
                    pembahasan = "✔"
                }
                var arr = [name, jumlah_akses, pembahasan, no];
                resultUjian.push(arr);
                tampilUjian();
            } else {
                resultUjian = resultUjian.filter(function(item) {
                    return item[3] != no;
                });
                tampilUjian();
            }

        }

        function tampilUjian() {
            var wraperTotal = $(".wraper-list");
            $(wraperTotal).children().remove();
            var no = 1;
            for (var i = 0; i < resultUjian.length; i++) {
                $(wraperTotal).append(
                    ' <tr><td>' + no + '</td><td>' + resultUjian[i][0] +
                    '</td><td style="font-weight: bolder;font-size:23px;">' + resultUjian[i][2] + '</td><td>' +
                    resultUjian[i]
                    [1] + '</td></tr>'
                );
                no++
            }

        }

        function checkVideo(no, id, name, url) {
            if ($(":input[type=checkbox][id=checkboxVideo" + id + "]:checked").val() != undefined) {
                var arr = [no, name, url];
                resultVideo.push(arr);
                tampilVideo();
            } else {
                resultVideo = resultVideo.filter(function(item) {
                    return item[0] != no;
                });
                tampilVideo();
            }
        }

        function tampilVideo() {
            var wraperTotal = $(".wraper-list-video");
            $(wraperTotal).children().remove();
            var no = 1;
            for (var i = 0; i < resultVideo.length; i++) {
                $(wraperTotal).append(
                    ' <tr><td>' + no + '</td><td>' + resultVideo[i][1] +
                    '</td><td><iframe width="560" height="315" src="https://www.youtube.com/embed/'+ resultVideo[i][2] +'?si=Y4ypGZqQSFM97EXN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></td></tr>'
                );
                no++
            }
        }

        function checkFile(no, id, name, url) {
            if ($(":input[type=checkbox][id=checkboxFile" + id + "]:checked").val() != undefined) {
                var arr = [no, name, url];
                resultFile.push(arr);
                tampilFile();
            } else {
                resultFile = resultFile.filter(function(item) {
                    return item[0] != no;
                });
                tampilFile();
            }
        }

        function tampilFile() {
            var wraperTotal = $(".wraper-list-file");
            $(wraperTotal).children().remove();
            var no = 1;
            for (var i = 0; i < resultFile.length; i++) {
                var fileName = resultFile[i][2].split('/').pop();
                console.log(fileName);
                $(wraperTotal).append(
                    ' <tr><td>' + no + '</td><td>' + resultFile[i][1] +
                    '</td><td><embed src="/show-pdf/' + fileName + '" width="550px" height="500px" type="text/pdf"></td></tr>'
                );
                no++
            }
        }
    </script>
@endsection

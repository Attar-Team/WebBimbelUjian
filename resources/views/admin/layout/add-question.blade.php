@extends('admin.template.template-admin')
@section('content')
{{-- @php
 dd(old('content_answer'));   
@endphp --}}
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="nav-align-top mb-4">
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-home" aria-controls="navs-pills-top-home" aria-selected="true">
                        Manual
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                        data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                        aria-selected="false">
                        Export
                    </button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="navs-pills-top-home" role="tabpanel">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="post" action="/admin/question">
                                    @csrf
                                    <input type="hidden" name="exam_id" value="{{ $data['id'] }}">
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Soal</label>
                                        <div class="col-sm-10">
                                            <textarea name="question" id="mytextarea" cols="80" rows="8">{{ old('question') }}</textarea>
                                            @error('question')
                                                <small style="color: red">* {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- <div class="row mb-3 border py-3 rounded" style="background-color: #f2f2f2">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Opsi 1</label>
                                        <div class="col">
                                            <textarea name="content_answer[1]" id="mytextarea" cols="80" rows="8"></textarea>
                                        </div>

                                        <div class="col-md">
                                            <small class="text-light fw-semibold">Jawaban benar</small>
                                            <div class="form-check mt-3">
                                                <input name="is_correct" class="form-check-input" type="radio"
                                                    value="1" id="defaultRadio1" />
                                                <label class="form-check-label" for="defaultRadio1"> Benar </label>
                                            </div>

                                        </div>
                                    </div> --}}

                                    <div class="inp-group" id="inp-group">

                                        @forelse (old('content_answer') ?? [] as $item)
                                        {{-- @dd($item); --}}
                                        <div class="row mb-3 border py-3 rounded box-option" style="background-color: #f2f2f2">
                                            <label class="col-sm-2 col-form-label" for="basic-default-company">Opsi {{ $loop->iteration }}</label>
                                            <div class="col">
                                                <textarea name="content_answer[{{$loop->iteration}}]" id="mytextarea" cols="80" rows="8">
                                                    {!! $item !!}
                                                </textarea>
                                                @error($item)
                                                <small style="color: red">* {{ $message }}</small>
                                            @enderror
                                             
                                            </div>
    
                                            <div class="col-md">
                                                <small class="text-light fw-semibold">Jawaban benar</small>
                                                <div class="form-check mt-3">
                                                    <input name="is_correct" class="form-check-input" type="radio"
                                                        value="1" id="defaultRadio1" />
                                                    <label class="form-check-label" for="defaultRadio1"> Benar </label>
                                                </div>
    
                                            </div>
                                        </div>
                                        @empty
                                                   <div class="row mb-3 border py-3 rounded box-option"  style="background-color: #f2f2f2">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Opsi 1</label>
                                        <div class="col">
                                            <textarea name="content_answer[1]" id="mytextarea" cols="80" rows="8"></textarea>
                                        </div>

                                        <div class="col-md">
                                            <small class="text-light fw-semibold">Jawaban benar</small>
                                            <div class="form-check mt-3">
                                                <input name="is_correct" class="form-check-input" type="radio"
                                                    value="1" id="defaultRadio1" />
                                                <label class="form-check-label" for="defaultRadio1"> Benar </label>
                                            </div>

                                        </div>
                                    </div>
                                        @endforelse
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Review</label>
                                        <div class="col-sm-10">
                                            <textarea name="review" id="mytextarea" cols="80" rows="8">{{ old('review') }}</textarea>
                                            @error('review')
                                            <small style="color: red">* {{ $message }}</small>
                                        @enderror
                                        </div>
                                    </div>

                                    <button class="btn btn-info add-inp" id="p" type="button">tambah</button>

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
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <form action="/admin/question/import" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="exam_id" value="{{ $data['id'] }}">
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label form-label">Pilih file excel</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="file" name="excel" id="fileUpload" />
                            </div>
                        </div>

                        <button class="btn btn-info" type="submit">Upload</button>
                        <button class="btn btn-success" id="btn_preview" type="button">Preview</button>
                    </form>

                    <div class="preview container my-5 border p-3 rounded">
                        <div class="question" id="preview">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var max_field = 5;
            var wraper = $(".inp-group");
            var addButton = $(".add-inp");
            var x = $(".box-option").length;
            console.log(x);
            $(addButton).click(function(e) {
                e.preventDefault();
                if (x < max_field) {
                    x++
                    $(wraper).append(
                        '<div class="row mb-3 border py-3 rounded" style="background-color: #f2f2f2"><label class="col-sm-2 col-form-label" for="basic-default-company">Opsi '+x+'</label><div class="col"><textarea id="mytextarea'+x+'" name="content_answer['+x+']"  cols="80" rows="8"></textarea></div><div class="col-md"><small class="text-light fw-semibold">Jawaban benar</small><div class="form-check mt-3"><input name="is_correct" class="form-check-input" type="radio" value="'+x+'" id="defaultRadio1" /><label class="form-check-label" for="defaultRadio1"> Benar </label></div></div><a id="" class="btn btn-danger mx-2 remove-field" style="color: #fff;width: 100px">Hapus</a></div>'
                        )

                         // Memanggil sceditor.create() setelah elemen textarea ditambahkan
            sceditor.create(document.getElementById("mytextarea" + x), {
                format: 'xhtml',
                style: 'minified/themes/content/default.min.css'
            });
                }

            });
            $(wraper).on("click", ".remove-field", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

        })

        </script>


             <script type="text/javascript">

        $(document).ready(function(){
  $("#btn_preview").click(function(){
    $("#preview").children().remove();
    var file_data = $("#fileUpload").prop("files")[0];   
    var form_data = new FormData();
    form_data.append("excel", file_data);
    $.ajax({
        url: "/api/preview-excel",
        method: "POST",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        success: function(response) {
           // Ketika respons diterima dengan sukses
            // Anda dapat mengonversi respons menjadi objek JavaScript dan melakukan operasi apa pun yang Anda inginkan
            var data = response;
            
            // Lakukan iterasi melalui setiap objek dalam array
            response.forEach(function(item, i) {
                var question = item.question;
                var options = item.opsi;
                var answer = item.jawaban;
                var review = item.review;
                var no = i+1;
                // Buat elemen HTML untuk menampilkan data
                var questionElement = "<div class='question'>" +no+". "+ question + "</div>";
                var optionsElement = "<ul class='mb-0'>";
                for (var key in options) {
                    optionsElement += "<li>" + options[key] + "</li>";
                }
                optionsElement += "</ul>";
                var answerElement = "<div class='answer mb-2'>Jawaban: " + answer + "</div>";

                var reviewElement = "<div class='answer mb-2'>Jawaban: " + review + "</div>";
                
                // Gabungkan semua elemen menjadi satu untuk ditampilkan di dalam HTML
                var html = questionElement + optionsElement + answerElement + reviewElement;
                
                // Masukkan elemen HTML ke dalam container di dalam halaman Anda
                $('#preview').append(html);
            });
    },
    error: function(xhr, status, error) {
            // Jika ada kesalahan saat melakukan AJAX
            console.error(xhr.statusText);
        }
});
  });
});
    </script>

@endsection

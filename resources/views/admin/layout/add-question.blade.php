@extends('admin.template.template-admin')
@section('content')
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
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label" for="basic-default-name">Soal</label>
                                        <div class="col-sm-10">
                                            <textarea name="opsi" id="mytextarea" cols="80" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3 border py-3 rounded" style="background-color: #f2f2f2">
                                        <label class="col-sm-2 col-form-label" for="basic-default-company">Opsi 1</label>
                                        <div class="col">
                                            <textarea name="content_answer[]" id="mytextarea" cols="80" rows="8"></textarea>
                                        </div>

                                        <div class="col-md">
                                            <small class="text-light fw-semibold">Jawaban benar</small>
                                            <div class="form-check mt-3">
                                                <input name="is_correct" class="form-check-input" type="radio"
                                                    value="" id="defaultRadio1" />
                                                <label class="form-check-label" for="defaultRadio1"> Benar </label>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="inp-group" id="inp-group">

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
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label form-label">Pilih file excel</label>
                            <div class="col-sm-4">
                                <input class="form-control" type="file" id="formFile" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var max_field = 5;
            var wraper = $(".inp-group");
            var addButton = $(".add-inp");
            var x = 1;
            $(addButton).click(function(e) {
                e.preventDefault();
                if (x < max_field) {
                    x++

                    $(wraper).append(
                        '<div class="row mb-3 border py-3 rounded" style="background-color: #f2f2f2"><label class="col-sm-2 col-form-label" for="basic-default-company">Opsi '+x+'</label><div class="col"><textarea id="mytextarea'+x+'" name="content_answer[]"  cols="80" rows="8"></textarea></div><div class="col-md"><small class="text-light fw-semibold">Jawaban benar</small><div class="form-check mt-3"><input name="is_correct" class="form-check-input" type="radio" value="" id="defaultRadio1" /><label class="form-check-label" for="defaultRadio1"> Benar </label></div></div><a id="" class="btn btn-danger mx-2 remove-field" style="color: #fff;width: 100px">Hapus</a></div>'
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
@endsection

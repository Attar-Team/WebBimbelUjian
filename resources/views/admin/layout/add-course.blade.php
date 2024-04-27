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
                    <div class="col-xxl">
                        <form action="/admin/course/video" method="post">
                            @csrf
                            <div class="col-xxl">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" class="form-control w-100"
                                                 placeholder="Masukan Nama" />
                                            </div>
                                        </div>
                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">Url
                                                    Youtube</label>
                                                <div class="col-sm-10 d-flex gap-3">
                                                    <input type="text" name="url_video" class="form-control w-100"
                                                        id="urlVideo"
                                                        placeholder="https://www.youtube.com/watch?v=xxxxxxx" />

                                                    <button type="button" class="btn btn-primary"
                                                        id="check">Preview</button>

                                                </div>
                                            </div>


                                            <div class="preview-yt"></div>

                                            <div class="row mb-3">
                                                <label class="col-sm-2 col-form-label" for="basic-default-name">
                                                    Keterangan</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="content" class="form-control" id="urlVideo"
                                                        placeholder="Masukan keterangan" />
                                                </div>
                                            </div>


                                            <div class="row justify-content-end">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
                <div class="tab-pane fade" id="navs-pills-top-profile" role="tabpanel">
                    <form action="/admin/course/bank-question" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-100" name="name"
                                    placeholder="Masukan Nama" />
                            </div>
                        </div>
                      
                        <div class="row mb-3">
                            <label for="" class="col-sm-2 col-form-label">Masukan File PDF</label>
                            <div class="col-sm-10">
                                 <input class="form-control" type="file" name="file"/>
                            </div>    
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control w-100" name="content"
                                    placeholder="Masukan Keterangan" />
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

    <script text="script/javascript">
        $(document).ready(function() {
            var wraper = $(".preview-yt");
            $("#check").click(function(e) {
                e.preventDefault();
                $(wraper).children().remove();
                var videoUrl = $("#urlVideo").val();
                var youtubeCode = videoUrl.match(/[?&]v=([^&]+)/)[1];
                var finalUrl = "https://www.youtube.com/embed/" + youtubeCode + "?si=kqml2tAY1RCp0DnQ"
                if (videoUrl.match(/watch\?v=([a-zA-Z0-9\-_]+)/)) {
                    $(wraper).append(
                        '<div class="row mb-3"><label class="col-sm-2 col-form-label" for="basic-default-name">Preview</label><div class="col-sm-10"><iframe width="660" height="365" src="' +
                        finalUrl +
                        '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe></div></div>'
                    )

                } else {
                    alert('Not Valid');
                }
            });
        });
    </script>
@endsection

@extends('admin.template.template-admin')
@section('content')
    {{-- @php
 dd(old('content_answer'));   
@endphp --}}
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="nav-align-top mb-4">

            @if ($data->type == 'videos')
                <form action="/admin/course/video/update/{{$data->id}}" method="post">
                    @csrf
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" value="{{$data->name}}" class="form-control w-100"
                                            placeholder="Masukan Nama" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Url
                                        Youtube</label>
                                    <div class="col-sm-10 d-flex gap-3">
                                        <input type="text" name="url_video" class="form-control w-100" value="https://www.youtube.com/watch?v={{$data->url}}" id="urlVideo"
                                            placeholder="https://www.youtube.com/watch?v=xxxxxxx" />

                                        <button type="button" class="btn btn-primary" id="check">Preview</button>

                                    </div>
                                </div>


                                <div class="preview-yt"></div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">
                                        Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="content" value="{{$data->content}}" class="form-control" id="urlVideo"
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
            @else
                <form action="/admin/course/bank-question/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                    <div class="col-xxl">
                        <div class="card mb-4">
                            <div class="card-body">
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control w-100" value="{{$data->name}}" name="name"
                                            placeholder="Masukan Nama" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">File</label>
                                    <div class="col-sm-10">
                                        <a target="blank" href="{{asset("storage/$data->url")}}">Klik untuk melihat file</a>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="" class="col-sm-2 col-form-label">Masukan File PDF</label>
                                    <div class="col-sm-10">
                                        <input type="hidden" name="file_asli" value="{{$data->url}}">
                                        <input class="form-control" type="file" name="file" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{$data->content}}" class="form-control w-100" name="content"
                                            placeholder="Masukan Keterangan" />
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
            @endif

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

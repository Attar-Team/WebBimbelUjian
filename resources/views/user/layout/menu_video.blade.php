@extends('template.header')
@section('title', 'BumnMuda. | Video')
@section('content')
    <div class="containers">
        {{-- <div class="sidebarngambang">

    </div> --}}
        <div class="sidebars">
            <h1>Materi Kursus Bumn</h1>
            <div class="sidemenus">
                <?php
                $no = 1;
                ?>
                @foreach ($package_details as $package_detail)
                    <?php
                    $course = $package_detail->course->name ?? '';
                    ?>
                    @if ($course != '')
                        @if ($package_detail->course->type == 'videos')
                            <button type="button" style="border: none;background-color: #fff; width: 100%"
                                onclick="playVideo('{{ $package_detail->course->url }}',this)">
                                <div class="satu_menu" id="asd">
                                    <div class="menu_kiri">
                                        <div class="nomer">
                                            <p>{{ $no++ }}</p>
                                        </div>
                                        <div class="judul">
                                            <h1>{{ $package_detail->course->name }}</h1>
                                            <h2>sub judul Video</h2>
                                        </div>
                                    </div>
                                    <img style="width: 30px; height: 30px;" src="{{ asset('img/icon_video.png') }}"
                                        alt="">
                                    <img style="display: none;" src="{{ asset('img/icon_gembok.png') }}" alt="">
                                </div>
                            </button>
                        @endif
                    @endif
                @endforeach
            </div>


        </div>
        <div class="kanan">
            <div class="wraper">

                <iframe style="background-color: #f1f1f1" src="" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
            {{-- <h1>Yang perlu Disiapkan</h1>
        <p class="deskripsi">Materi Bagian Pengenalan dan juga hal yang harus di siapkan</p>
        <h2>Alat yang digunakan di Kelas</h2> --}}
        </div>

    </div>

    <script type="text/javascript">
        // $(document).ready(function{
        //     $("#menu_video").click(function(){
        //         // alert($("#menu_video").val())
        //         alert("asd")
        //     })
        // })
        function playVideo(url, button) {
            const wraper = (".wraper");

            $(wraper).children().remove();

            $(".satu_menu").removeClass("active");

    // Menambahkan kelas "active" ke elemen .satu_menu yang diklik
    $(button).find(".satu_menu").addClass("active");
            var finalUrl = "https://www.youtube.com/embed/" + url + "?si=kqml2tAY1RCp0DnQ&&autoplay=1"
          
                $(wraper).append(
                    '<iframe  src="' +
                    finalUrl +
                    '" title="YouTube video player" allow="autoplay" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>'
                )
        }
   
    </script>

    <script src="{{ asset('js/home.js') }}"></script>
@endsection

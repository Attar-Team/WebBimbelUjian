<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('quiz/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body oncontextmenu=" return false" style="background-color: #f1f1f1">
    <nav>
        <h3>Bumn<span>Muda</span>.</h3>

        <div class="d-flex gap-3" style="align-items: center">
            <p class="m-0">Zarif</p>
            <i class="fa-solid fa-user"></i>
        </div>
    </nav>

    <div class="review">
        <div class="content">
            <div class="box bg-benar">
                <p>1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui accusamus expedita repellat sit ducimus! Cumque voluptatum voluptate deserunt. Dolorum error cumque nihil in aliquid quidem velit consequatur quo dolor laudantium.</p>

                <ol>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique labore eveniet architecto sint illum corporis?</li>
                    <li class="jawaban-benar">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam esse cumque at modi nostrum, veniam ipsa ut libero neque saepe.</li>
                    <li >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, placeat.</li>
                    <li >Lorem ipsum dolor sit amet consectetur adipisicing elit. Est asperiores ut quisquam deleniti eaque libero voluptates dignissimos culpa distinctio expedita, enim incidunt assumenda nam amet?</li>
                </ol>

                <div class="line"></div>
                <h5>Pembahasan</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores velit cupiditate consequuntur. Rem quisquam sequi veritatis aspernatur vero asperiores, voluptatem laudantium possimus architecto iure cumque perspiciatis. Maiores modi quaerat dolorem!</p>
            </div>

            <div class="box bg-salah">
                <p>1. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Qui accusamus expedita repellat sit ducimus! Cumque voluptatum voluptate deserunt. Dolorum error cumque nihil in aliquid quidem velit consequatur quo dolor laudantium.</p>

                <ol>
                    <li>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique labore eveniet architecto sint illum corporis?</li>
                    <li class="jawaban-benar">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam esse cumque at modi nostrum, veniam ipsa ut libero neque saepe.</li>
                    <li class="jawaban-salah" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, placeat.</li>
                    <li >Lorem ipsum dolor sit amet consectetur adipisicing elit. Est asperiores ut quisquam deleniti eaque libero voluptates dignissimos culpa distinctio expedita, enim incidunt assumenda nam amet?</li>
                </ol>
                <div class="line"></div>
                <h5>Pembahasan</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores velit cupiditate consequuntur. Rem quisquam sequi veritatis aspernatur vero asperiores, voluptatem laudantium possimus architecto iure cumque perspiciatis. Maiores modi quaerat dolorem!</p>
            </div>
        </div>

        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>

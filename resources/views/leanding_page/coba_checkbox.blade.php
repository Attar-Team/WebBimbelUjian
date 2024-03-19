<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        input[type="checkbox"] {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        width: 25px;
        height: 25px;
        border: 1px solid #ccc;
        outline: none;
        padding: 2px;
        border-radius: 3px;
    }

    /* Mengatur ukuran tulisan */
    label {
        font-size: 20px;
    }

    /* Mengatur gaya checkbox agar terlihat seperti kotak */
    input[type="checkbox"]::before {
        content: '';
        display: block;
        width: 100%;
        height: 100%;
        background-color: #fff; /* Warna latar belakang kotak */
        /* border: 1px solid #ccc; */
        box-sizing: border-box; /* Penyesuaian ukuran kotak agar sesuai dengan border */
        border-radius: 6px;

    }

    /* Menampilkan tanda centang jika checkbox dicentang */
    input[type="checkbox"]:checked::before {
        background-color: #000; /* Warna latar belakang kotak ketika dicentang */
    }
    </style>
</head>
<body>
    <script>
        function toggleCheckbox(group, checkbox) {
        var checkboxes = document.querySelectorAll('.custom-checkbox[data-group="' + group + '"]');

        checkboxes.forEach(function(cb) {
            if (cb !== checkbox && cb.checked) {
                cb.checked = false; // Nonaktifkan checkbox lain dalam kelompok yang sama
            }
        });
    }

    </script>
    <div>
        <input type="checkbox" class="custom-checkbox" data-group="group1" onclick="toggleCheckbox('group1', this)"> Checkbox 1
        <input type="checkbox" class="custom-checkbox" data-group="group1" onclick="toggleCheckbox('group1', this)"> Checkbox 2
        <input type="checkbox" class="custom-checkbox" data-group="group1" onclick="toggleCheckbox('group1', this)"> Checkbox 3
    </div>
    
    <div>
        <input type="checkbox" class="custom-checkbox" data-group="group2" onclick="toggleCheckbox('group2', this)"> Checkbox 1
        <input type="checkbox" class="custom-checkbox" data-group="group2" onclick="toggleCheckbox('group2', this)"> Checkbox 2
    </div>

    {{-- <div>
        <input type="checkbox" class="custom-checkbox" data-group="group1" id="checkbox1" onclick="ambilNama('group1', this)"> 
        <label for="checkbox1">Checkbox 1 (Group 1)</label><br>
        <input type="checkbox" class="custom-checkbox" data-group="group1" id="checkbox2" onclick="ambilNama('group1', this)"> 
        <label for="checkbox2">Checkbox 2 (Group 1)</label><br>
        <input type="checkbox" class="custom-checkbox" data-group="group1" id="checkbox3" onclick="ambilNama('group1', this)"> 
        <label for="checkbox3">Checkbox 3 (Group 1)</label>
    </div>
    
    <div>
        <input type="checkbox" class="custom-checkbox" data-group="group2" id="checkbox4" onclick="ambilNama('group2', this)"> 
        <label for="checkbox4">Checkbox 4 (Group 2)</label><br>
        <a href=""><input type="checkbox" class="custom-checkbox" data-group="group2" id="checkbox5" onclick="ambilNama('group2', this)"> 
        <label for="checkbox5">Checkbox 5 (Group 2)</label></a>
    </div>
    
    <a id="link" href="#" style="display: block;">Link: Pilih checkbox untuk mengubah link</a> --}}
</body>
</html>
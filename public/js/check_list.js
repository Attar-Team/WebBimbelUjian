function toggleCheckbox(group, checkbox) {
    var checkboxes = document.querySelectorAll('.custom-checkbox[data-group="' + group + '"]');

    checkboxes.forEach(function(cb) {
        if (cb !== checkbox && cb.checked) {
            cb.checked = false; // Nonaktifkan checkbox lain dalam kelompok yang sama
        }
    });
}
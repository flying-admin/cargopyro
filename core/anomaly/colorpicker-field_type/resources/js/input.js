(function (window, document) {

    let fields = Array.prototype.slice.call(
        document.querySelectorAll('input[data-provides="anomaly.field_type.colorpicker"]')
    );

    fields.forEach(function (field) {

        let picker = document.querySelector('#' + field.name + '__picker');

        field.addEventListener('keyup', function (event) {
            picker.value = event.target.value;
        });

        picker.addEventListener('change', function (event) {
            field.value = event.target.value;
        });
    });
})(window, document);

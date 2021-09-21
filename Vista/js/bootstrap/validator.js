//INICIO VALIDADORES TP 1
$('#buscarAuto').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        patente: {
            message : 'Ingrese la patente',
            validators: {
                notEmpty: {},
                stringLength: {
                    min: 7,
                    max: 7,
                    message: 'El formato de patente ingresado no es válido'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9 ]+$/,
                    message: 'El formato de patente ingresado no es válido'
                },
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

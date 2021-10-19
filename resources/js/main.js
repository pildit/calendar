$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')

    $('.datetime').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        locale: 'en',
        sideBySide: true
    })

    $('.select2').select2()

})

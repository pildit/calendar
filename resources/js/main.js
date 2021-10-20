$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr('content')

    $('.datetime').datetimepicker({
        format: 'YYYY-MM-DD HH:mm:ss',
        locale: 'en',
        sideBySide: true
    })

    $('.select2').select2()

    $('#select_calendar_user').on('change', function(e) {
        var base_url = window.location.origin + window.location.pathname;

        if ($(this).val())
            window.location = base_url + '?user_id=' + $(this).val();
        else
            window.location = base_url;
    })
})

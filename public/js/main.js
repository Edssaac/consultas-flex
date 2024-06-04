$(document).ready(function () {
    showActiveTab();
    initializePopovers();
});

const showActiveTab = () => {
    var path = window.location.pathname;

    $('.navbar-nav a').each(function () {
        var href = $(this).attr('href');

        if (path === href) {
            $(this).addClass('active');
        }
    });
}

const initializePopovers = () => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
}

$('#fetchData').on('submit', (e) => {
    e.preventDefault();

    var path = window.location.pathname;
    var data = {};

    $('#fetchData input').each(function () {
        data[$(this).attr('name')] = $(this).val();
    });

    $.ajax({
        url: `${path}/getData`,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        beforeSend: function () {
            $('.spinner-border').removeClass('d-none');
            $('.alert').addClass('d-none');
            $('.alert').text('');
            $('input[readonly]').val('');
        },
        success: function (response) {
            if (response.data) {
                for (field in response.data) {
                    sanitized_field = field.toLowerCase().replaceAll(' ', '_');

                    if ($('input[name="' + sanitized_field + '"]').length) {
                        $('input[name="' + sanitized_field + '"]').attr('placeholder', '');
                        $('input[name="' + sanitized_field + '"]').val(response.data[field]);
                    }
                }
            } else {
                $('.alert').text(response.message ?? 'Não foi possível realizar a consulta no momento.');
                $('.alert').removeClass('d-none');
            }
        },
        complete: function () {
            $('.spinner-border').addClass('d-none');
        }
    });
});
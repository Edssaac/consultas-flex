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

    $('#fetchData').find('input, select, textarea').each(function () {
        var input = $(this);
        var input_name = input.attr('name');

        if (input.attr('type') === 'datalist') {
            var option_code = $(`datalist#${input.attr('list')} option[value="${input.val()}"]`).attr('code');

            data[input_name] = option_code ?? 0;
        } else {
            data[input_name] = input.val();
        }
    });

    const alert_element = $('.alert');
    const spinner_element = $('.spinner-border');
    const read_only_inputs = $('input[readonly], textarea[readonly]');
    const table_bodies = {};

    $.ajax({
        url: `${path}/getData`,
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify(data),
        beforeSend: function () {
            spinner_element.removeClass('d-none');
            alert_element.addClass('d-none').text('');
            read_only_inputs.val('');

            $('table tbody').html('');
            $('table tbody').append('<tr><td>-</td></tr>');

            $('table').each(function () {
                const table_name = $(this).attr('name');

                table_bodies[table_name] = $(this).find('tbody');
            });
        },
        success: function (response) {
            if (response.data) {
                for (const field in response.data) {
                    const sanitized_field = field.toLowerCase().replaceAll(' ', '_');
                    let field_value = response.data[field];

                    if ($.isArray(field_value)) {
                        const table_body = table_bodies[sanitized_field];

                        table_body.html('');

                        field_value.sort().forEach(value => {
                            table_body.append(`<tr><td>${value}</td></tr>`);
                        });
                    } else {
                        const element = $(`input[name="${sanitized_field}"], textarea[name="${sanitized_field}"]`);

                        if (element.length) {
                            element.attr('placeholder', '');

                            if ($.isPlainObject(field_value)) {
                                field_value = JSON.stringify(field_value, null, 2);
                            }

                            element.val(field_value);
                        }
                    }
                }
            } else {
                alert_element.text(response.message ?? 'Não foi possível realizar a consulta no momento.');
                alert_element.removeClass('d-none');
            }
        },
        complete: function () {
            spinner_element.addClass('d-none');
        }
    });
});
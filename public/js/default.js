$(document).ready(function () {

    $('.btn-delete').click(function () {
        return confirm('Deseja realmente fazer isso?');
    });

    $('[name="cnpj"]').inputmask('99.999.999/9999-99', {"placeholder": ""});

    $('[name="phone"]').inputmask('(99) 9999-99999', {"placeholder": ""});

    $('[name="cep"]').inputmask('99999-999', {"placeholder": ""});

    $('[name="price"]').maskMoney({
        allowNegative: true,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });

    $('select[name="state_id"]').change(function () {

        let value = $(this).val();

        let el = $('select[name="city_id"]');
        let data_value = el.attr('data-value');
        let data_text = el.attr('data-text');

        if (value) {

            el.html('<option value="">Aguarde...</option>').attr('disabled', true);

            $.ajax({
                url: base_url + 'cities/' + value,
                type: 'GET',
                dataType: 'json'
            }).done(function (data) {

                el.html('<option value="">Selecione</option>');

                $.each(data, function (key, value) {
                    el.append('<option value="' + value.id + '" ' + (data_value == value.id || data_text == value.name ? 'selected' : '') + '>' + value.name + '</option>')
                });

            }).always(function () {
                el.attr('disabled', false);
            });

        }

    });

    let state_id = $('select[name="state_id"]').attr('data-value');

    if (state_id) {
        $('select[name="state_id"]').val(state_id).change();
    }

    //----------------------------------

    $('[name="cep"]').blur(function () {

        let el = $(this);
        let value = el.val();

        if (value) {

            el.attr('disabled', true);

            $('[name="state_id"], [name="city_id"], [name="address"], [name="neighborhood"]').attr('disabled', true);

            $('[name="address"], [name="neighborhood"]').val('');

            $.ajax({
                url: base_url + 'cep/' + value,
                type: 'GET',
                dataType: 'json'
            }).done(function (data) {

                if (data.localidade) {

                    $('[name="city_id"]').attr('data-text', data.localidade);

                }

                if (data.uf) {

                    $('[name="state_id"] option').filter(function () {
                        return $(this).text() == data.uf;
                    }).attr('selected', true).change();

                }

                if (data.logradouro) {

                    $('[name="address"]').val(data.logradouro);

                }

                if (data.bairro) {

                    $('[name="neighborhood"]').val(data.bairro);

                }

            }).fail(function (data) {

                $('[name="cep"]').val('');

                if (typeof data.responseJSON !== 'undefined') {
                    alert(data.responseJSON.message);
                } else {
                    alert('CEP inválido');
                }

            }).always(function () {

                el.attr('disabled', false);

                $('[name="state_id"], [name="city_id"], [name="address"], [name="neighborhood"]').attr('disabled', false);

            });

        }

    });

    $('[name="product_id[]"], [name="quantity[]"]').change(function () {

        let e = $(this);

        let price = e.parents('tr').find('[name="product_id[]"] > option:selected').attr('data-price');

        let quantity = e.parents('tr').find('[name="quantity[]"]').val();

        if (!price > 0) {
            price = '-';
        }

        e.parents('tr').find('.price').text('R$ ' + numberToReal(price));

        e.parents('tr').find('.total').text('R$ ' + numberToReal(price * quantity));

    });

});

function numberToReal(number) {
    return parseFloat(number, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString()
}
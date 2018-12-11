<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/app.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/plentz-maskmoney/jquery.maskMoney.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/default.js') . '?v=' . time() }}" type="text/javascript"></script>

<script src="{{ asset('/js/client.js') . '?v=' . time() }}" type="text/javascript"></script>

<script src="{{ asset('/js/order.js') . '?v=' . time() }}" type="text/javascript"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
<script>
    window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
    ]) !!};

    var base_url = {!! json_encode(url('/')) !!} +'/';
</script>

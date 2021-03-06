<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ asset('/js/bootstrap.js') }}" type="text/javascript"></script>

<!-- <script src="{{ asset('/plugins/jQuery/jquery-2.2.3.min.js') }}" type="text/javascript"></script> -->

<script src="{{ asset('/plugins/input-mask/jquery.inputmask.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/plentz-maskmoney/jquery.maskMoney.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/highcharts/highcharts.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/default.js') . '?v=1' }}" type="text/javascript"></script>

<script src="{{ asset('/js/client.js') . '?v=1' }}" type="text/javascript"></script>

<script src="{{ asset('/js/order.js') . '?v=1' }}" type="text/javascript"></script>

<script src="{{ asset('/js/dashboard.js') . '?v=1' }}" type="text/javascript"></script>



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

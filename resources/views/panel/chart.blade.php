<body>
<!-- Main Application (Can be VueJS or other JS framework) -->
<div class="app">

        {!! $chart->html() !!}

</div>
<!-- End Of Main Application -->
{!! Charts::scripts() !!}
{!! $chart->script() !!}
</body>
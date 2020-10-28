<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/app-style.css">

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/js/app.js"></script>

    <title>Промоакция на АЗС Shell «Скидка на технику Philips»</title>
</head>
<body id="app-layout" class="page">
@if ($errors->has('message'))
    @include('_modal_message_block',['id' => 'message', 'message' => $errors->first('message')])
    <script>$('#message').modal('show');</script>
@endif

@if ($settingsForm)
    {!! $settingsForm !!}
@endif

<section class="section section-02">
    <header class="header">
        <div class="container">
            <div class="row">
                @include('layouts._logos_block')
                <div class="col-md-5 col-sm-5 col-xs-5">
                     <nav class="nav">
                        <span class="spacer"></span>
                        <a href="ShellPhilipsRules.pdf" target="_blank">Условия акции</a>
                        <span class="spacer"></span>
                        <a href="{{ url('/user') }}">Настройки</a>
                        <a href="{{ url('/logout') }}" class="nav-k">Выйти</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
</section>

@yield('content')

<section class="section section-05 footer">
    <div class="container">
        <p class="small-text">Не является публичной офертой. За 1 визит на АЗС клиент может получить не более 1 купона за покупку товара в магазине и не более 1 купона за покупку топлива АИ-92, АИ-95, Дизель или не более 2 купонов за покупку топлива Shell V-Power, Shell V-Power Racing, Shell V-Power Diesel. Максимальное количество купонов за 1 визит на АЗС — 6 штук. Покупка табачных изделий не учитывается в сумме покупки, необходимой для получения купона. Список товаров Philips, участвующих в акции, на которые возможно получить скидку, представлен на сайте <a href="www.philips-shell-promo.ru" target="_blank">www.philips-shell-promo.ru</a>. Размер максимальной скидки на различные товары Philips отличается. С подробной информацией об организаторе и операторах акции, о правилах, порядке, сроках и условиях ее проведения можно ознакомиться на сайте shell.com.ru. Shell V-Power Рейсинг, Shell V-Power Дизель.</p>
    </div>
</section>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-85034431-1', 'auto');
    ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter39928480 = new Ya.Metrika({
                    id:39928480,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39928480" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

</body>
</html>

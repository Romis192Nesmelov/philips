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
    <script src="/js/jquery.maskedinput.min.js" type="text/javascript"></script>
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
                <table>
                    <tr>
                        @include('layouts._logos_block')
                        <td>
                             <nav class="nav">
                                <a href="rules.pdf" target="_blank">Условия акции</a>
                                <a href="{{ url('/user') }}">Настройки</a>
                                <a href="{{ url('/logout') }}" class="nav-k">Выйти</a>
                            </nav>
                        </td>
                </table>
            </div>
        </div>
    </header>
</section>

@yield('content')

<section class="section section-05 footer">
    <div class="container">
        <p class="small-text">Не является публичной офертой. За каждый визит на АЗС «Шелл» клиент получает скретч-карты за покупку в одном чеке от 10 литров топлива Shell V-Power с октановым числом 95, Shell V-Power Racing (Рейсинг) с октановым числом 98, Shell V-Power Diesel (Дизель), а также любого из видов кофейных напитков, реализуемых на АЗС «Шелл», в любом объеме. Транзакции по приобретению топлива и кофе должны быть указаны в одном чеке. Список участвующих в акции товаров Philips, на которые можно получить скидки по купонам, представлен на сайте www.philips-shell-promo.ru. Размер максимальной скидки на разные товары Philips отличается. С подробной информацией об организаторе и операторах акции, о правилах, порядке, сроках и условиях ее проведения можно ознакомиться на сайте shell.com.ru.</p>
    </div>
</section>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-85034431-1', 'auto');
</script>

@if (Session::has('code'))
    <script>ga('send', 'event', "{{ Session::get('code') }}", '0');</script>
@else
    <script>ga('send', 'pageview');</script>
@endif

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

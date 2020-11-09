<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Промоакция на АЗС Shell «Скидка на технику Philips»</title>

    <link href="/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <!--   SLIDER -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" type="text/css" href="/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">

    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>-->
    <!--   <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap-switch.js"></script>
    <script type="text/javascript" src="/js/jquery.maskedinput.min.js"></script>
    <script type="text/javascript">
        // Floating nav on scroll
        (function($) {
            $(document).ready(function(){
                $(window).scroll(function(){
                    if ($(this).scrollTop() > 400) {
                        $('#floating-nav').fadeIn(500);

                    } else {
                        $('#floating-nav').fadeOut(500);

                    }

                    if ($(this).scrollTop() > 100) {

                        $('#hero-logo').fadeOut(500);
                    } else {

                          $('#hero-logo').fadeIn(500);
                    }
                });
            });
        })(jQuery);
        // Smooth Scrolling
        $(function() {
            $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                    if (target.length) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            });
        });
    </script>
    <script src="/js/slick/slick.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/app.js"></script>
</head>
<body class="page">
<div class="pop-up-overlay" id="pop-up">
    <div class="pop-up-form">
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>

<section class="section section-01">
     <header class="header">
        <div class="container">
            <div class="row">
                <table>
                    <tr>
                        @include('layouts._logos_block')
                        <td>
                            <nav class="nav">
                                <!--  <a href="#">Описание</a> -->
                                <a href="rules.pdf" target="_blank">Правила акции</a>
                            </nav>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </header>
    <div class="container text-center">
        <h1 class="section-title">Заправьтесь подарками!<br>Выгода до 50% на технику Philips!</h1>
        <div class="promo-text">Накопите 4 или 5 купонов и получите скидку на акционный товар.</div>
        <div class="promo-sub">1 купон = 10%</div>
        <div class="promo-sub">Для участия в акции, пожалуйста, зарегистрируйтесь, используя кнопку ниже:</div>
        <a href="{{ url('/login') }}" class="button">Введите код</a>
        {{--<a href="{{ url('/register') }}" class="button">Регистрация</a>--}}

        <div class="counter-block">
            <span>До конца акции осталось:</span>
            <?php $time = Request::path() != 'end' ? strtotime(Config::get('app.end_time'))-time()-(3*60*60) : 0; ?>
            <div class="counter" it="timer" id="timer">
                <span class="time days">
                    <span class="digits"><span>{{ $time ? floor($time/(60*60*24)) : '00' }}</span></span>
                    <span class="text-mark">дней</span>
                </span>
                <span class="time hours">
                    <span class="digits"><span>{{ $time ? floor(($time/(60*60))%24) : '00' }}</span></span>
                    <span class="text-mark">часов</span>
                </span>
                <span class="time minutes">
                    <span class="digits"><span>{{ $time ? floor($time/60%60) : '00' }}</span></span>
                    <span class="text-mark">минут</span>
                </span>
                <span class="time seconds">
                    <span class="digits"><span>{{ $time ? floor($time%60) : '00' }}</span></span>
                    <span class="text-mark">секунд</span>
                </span>
            </div>
        </div>

        <img class="gifts" src="/images/gifts.jpg" />
        <div class="terms">
            @include('_term_block', ['num' => 1, 'text' => '<b>Заправьтесь</b><br>топливом</b>V-Power<sup>1</sup>'])
            @include('_term_block', ['num' => 2, 'text' => '<b>Купите</b><br>любой кофе<br>deli by Shell'])
            @include('_term_block', ['num' => 3, 'text' => 'И вы <nobr>в игре!</nobr>', 'addClass' => 'final'])
        </div>

        <div id="labels">
            @include('layouts._label_block',['icon' => 'icon-shield-check', 'head' => '2 года*', 'text' => 'Официальная гарантия'])
            @include('layouts._label_block',['icon' => 'icon-truck', 'head' => 'БЕСПЛАТНАЯ**', 'text' => 'Доставка по России'])
        </div>
    </div>
</section>

<a name="gifts"></a>
<section class="section section-03">
    <div class="container">
        <h1 class="section-title">Закажите эти и другие товары со скидкой<br>в интернет-магазине <span class="brand">Philips</span></h1>
        <!-- Slider -->
        <div class="regular slider" style="margin-top: 30px;">
            <?php
                $items = [
                    ['title' => 'Беспроводной вертикальный пылесос SpeedPro', 'text' => 'Новый беспроводной пылесос SpeedPro обеспечивает быструю уборку и маневренность.<br>Он оснащен насадкой с системой всасывания 180° для сбора загрязнений даже в самых сложных местах — у стен, вокруг мебели и в углах.'],
                    ['title' => 'Парогенератор<br>PerfectCare 7000 Series','text' => 'PerfectCare 7000 создан для вашего комфорта и удобства. Простое управление благодаря съемному резервуару для воды и мощный пар для оптимального отпаривания. Защита от прогорания всех пригодных для глажения тканей благодаря OptimalTEMP.'],
                    ['title' => 'Климатический комплекс 2 в 1','text' => 'Отслеживайте качество воздуха когда и где угодно. Этот климатический комплекс 2 в 1 эффективно увлажняет воздух и очищает его от загрязнений, вредных газов, частиц, бактерий и вирусов в помещениях площадью до 30 кв. м.'],
                    ['title' => 'Электробритва<br>для сухого и влажного бритья','text' => 'Бритва серии 9000 — наиболее совершенная на сегодняшний день. Уникальная технология повторения контуров гарантирует идеальное скольжение, а система лезвий Vtrack обеспечивает более удобный захват волосков и максимально чистое бритье.'],
                    ['title' => 'OneBlade Pro','text' => 'Philips OneBlade — новое революционное гибридное устройство для подравнивания, создания четких контуров и бритья щетины любой длины. Забудьте об использовании множества устройств в несколько этапов. OneBlade умеет все.'],
                    ['title' => 'Фен Prestige Pro','text' => 'Фен Philips Prestige Pro мощностью 2300 Вт  оснащен профессиональным AC-мотором, обеспечивающим мощный воздухопоток.  Уникальная насадка-концентратор Style&Protect позволяет делать профессиональную укладку без перегрева волос.'],
                    ['title' => 'Стеклянный чайник','text' => 'Стеклянный чайник объемом 1,7 л отличается современным дизайном и оснащен удобным синим индикатором включения в основании чайника. Съемный микрофильтр в носике удерживает мельчайшие частицы накипи размером 200 микрон.'],
                    ['title' => 'Стационарный блендер','text' => 'Технология ProBlend Crush позволяет превращать даже самые твердые ингредиенты в смузи вдвое быстрее. Уникальный 6-конечный нож в сочетании с энергоэффективным мотором 800 Вт легко измельчит лед и крупные ингредиенты.'],
                    ['title' => 'Увлажнитель воздуха<br>Series 2000 с функцией очищения','text' => 'Технология испарения Philips NanoCloud снижает риск распространения бактерий, а также не допускает образования мокрых пятен и белого налета. Резервуар для воды емкостью 4 литра обеспечивает непрерывное увлажнение на протяжении 26 часов.'],
                    ['title' => 'Электрическая<br>звуковая зубная щетка ProtectiveClean 5100','text' => 'Почувствуйте разницу: бережная чистка благодаря датчику давления и осветление зубов всего за 1 неделю. Продвинутая звуковая технология Philips Sonicare и 3 режима работы гарантируют безупречную чистоту ваших зубов.']

            ];
            ?>
            @for($i=1;$i<=10;$i++)
                @include('layouts._slider_block',[
                    'image' => $i.'_2304-PH-PhilipsShell_promo20_img.jpg',
                    'title' => $items[$i-1]['title'],
                    'text' => $items[$i-1]['text']
                ])
            @endfor
        </div>
        <!-- // Slider -->
    </div>
</section>

<section class="section section-02">
    <div class="container">
        <h1 class="section-title">Копите купоны и получите скидку <nobr>на технику</nobr> Philips</h1>
        <div class="row section-rules">
            <ol class="rules">
                <li>Заплатите по одному чеку за топливо<sup>1</sup> и кофейный напиток.</li>
                <li>За каждый чек получите один купон со скидкой 10%.</li>
                <li>Для участия в акции накопите 4 или 5 купонов, для достижения скидки 40% или 50%<sup>2</sup>.</li>
                <li>Регистрируйтесь на сайте и наслаждайтесь покупками.</li>
            </ol>
            <table class="callout">
                <tr>
                    <td><sup>1</sup></td><td>Топливо Shell V-Power с октановым числом 95, Shell V-Power Racing (Рейсинг) с октановым числом 98, Shell V-Power Diesel (Дизель) от 10 литров.</td>
                </tr>
                <tr>
                    <td><sup>2</sup></td><td>Размер скидки — 40% или 50%, в зависимости от категории товара. Предложение действительно только для участников Shell ClubSmart. Карту Shell ClubSmart вы можете получить абсолютно бесплатно на любой АЗС «Шелл» уже сегодня. Период выдачи купонов на АЗС «Шелл» — с 9 ноября 2020 года до 14 февраля 2021 года или до тех пор, пока купоны имеются в наличии. Использование промокодов на странице акции на сайте https://www.philips-shell-promo.ru возможно с 9 ноября 2020 года до 31 марта 2021 года.</td>
                </tr>
            </table>
        </div>
    </div>
</section>

<section class="section section-05 footer">
    <div class="container">
        <p class="small-text">Не является публичной офертой. За каждый визит на АЗС «Шелл» клиент получает скретч-карты за покупку в одном чеке от 10 литров топлива Shell V-Power с октановым числом 95, Shell V-Power Racing (Рейсинг) с октановым числом 98, Shell V-Power Diesel (Дизель), а также любого из видов кофейных напитков, реализуемых на АЗС «Шелл», в любом объеме. Транзакции по приобретению топлива и кофе должны быть указаны в одном чеке. Список участвующих в акции товаров Philips, на которые можно получить скидки по купонам, представлен на сайте www.philips-shell-promo.ru. Размер максимальной скидки на разные товары Philips отличается. С подробной информацией об организаторе и операторах акции, о правилах, порядке, сроках и условиях ее проведения можно ознакомиться на сайте shell.com.ru.</p>
        <p class="small-text">* По вопросам гарантийного обслуживания товара Philips можно проконсультироваться при заказе.</p>
        <p class="small-text">** При участии в данной Акции сохраняются специальные условия "Бесплатной доставки".</p>
    </div>
</section>

<script type="text/javascript">
    $(document).on('ready', function() {
        $(".regular").slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1
        });
        $(".center").slick({
            dots: true,
            infinite: true,
            centerMode: true,
            slidesToShow: 3,
            slidesToScroll: 3
        });
        $(".variable").slick({
            dots: true,
            infinite: true,
            variableWidth: true
        });
    });
</script>

@if (Request::path() != 'end')
    <script>
        startTimer("{{ str_replace('-','.',Config::get('app.end_time')) }}");
    </script>
@endif

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
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
        <div class="max-width">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 logos">
                    <img src="/images/logo-philips.png" class="logo-philips" alt="Philips">
                    <img src="/images/shell-clubsmart.png" class="logo-shell-clubsmart" alt="Shell Clubsmart">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <nav class="nav">
                       <!--  <a href="#">Описание</a> -->
                        <a href="ShellPhilipsRules.pdf" target="_blank">Условия акции</a>
                        <span class="spacer"></span>
                        <a href="{{ url('/home') }}" class="nav-k">Вход</a>
                        <a href="{{ url('/register') }}" class="nav-k">Регистрация</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <div class="max-width">
        <div class="row hero-block">
            <div class="col-md-6 pair">
                <img src="/images/twix.png">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <h1 class="section-title">Заправьтесь подарками!<br>Выгода до 50% на технику Philips!</h1>
                {{--<div class="title-disclamer">Бесплатная доставка!<sup>*</sup></div>--}}
                <div class="promo-text">Для активации скидки зарегистрируйте код с купона и закажите понравившиеся вам товары.</div>

                <div id="labels">
                    @include('layouts._label_block',['icon' => 'icon-shield-check', 'head' => '2 года*', 'text' => 'Официальная гарантия'])
                    @include('layouts._label_block',['icon' => 'icon-truck', 'head' => 'БЕСПЛАТНАЯ**', 'text' => 'Доставка по России'])
                </div>

                <a href="{{ url('/login') }}" class="button-register">ВВЕДИТЕ КОД</a>
                <div class="counter-block" it="timer">
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
            </div>
        </div>
    </div>
</section>

<a name="gifts"></a>
<section class="section section-03">
    <div class="max-width">
        <h1 class="section-title">Закажите эти и другие товары со скидкой<br>в интернет-магазине <span class="brand">Philips</span></h1>
        <!-- Slider -->
        <div class="regular slider" style="margin-top: 30px;">
            @include('layouts._slider_block',[
                'image' => 'EP5064.jpg',
                'title' => 'Автоматическая кофемашина',
                'text' => 'Насладитесь нежным сливочным вкусом кофейных напитков, например, капучино или латте маккиато, из свежего молока и кофейных зерен одним нажатием кнопки. Крепость, объем и температуру всех напитков, включая эспрессо, кофе и американо, можно регулировать.'
            ])

            @include('layouts._slider_block',[
                'image' => 'BRI956.jpg',
                'title' => 'Фотоэпилятор',
                'text' => 'Первое в мире решение IPL с уникальными изогнутыми насадками для оптимальных результатов на любых участках. Philips Lumea Prestige — самый эффективный фотоэпилятор IPL, который работает как в проводном, так и в беспроводном режиме и оснащен датчиком SmartSkin.'
            ])

            @include('layouts._slider_block',[
                'image' => 'FC6172.jpg',
                'title' => 'Вертикальный пылесос',
                'text' => 'Новый Philips PowerPro Duo обеспечивает превосходные результаты очистки твердых напольных и ковровых покрытий. Насадка TriActive Turbo собирает больше пыли и шерсти за один прием. Мини-насадка «Турбо» очищает мягкие поверхности, например диванов, подушек и матрасов.'
            ])

            @include('layouts._slider_block',[
                'image' => 'GC6833.jpg',
                'title' => 'Парогенератор',
                'text' => 'Мощная постоянная подача пара обеспечивает более быстрое глажение, чем при использовании парового утюга. Благодаря технологии OptimalTEMP нет необходимости регулировать температуру и режимы подачи пара. Компактная конструкция и небольшой вес гарантируют удобное хранение.'
            ])

            @include('layouts._slider_block',[
                'image' => 'HX6829.jpg',
                'title' => 'Электрическая зубная щетка',
                'text' => 'Почувствуйте разницу: бережная очистка благодаря датчику давления на щетку делает десны на 100% более здоровыми, чем при использовании обычной зубной щетки.'
            ])

            @include('layouts._slider_block',[
                'image' => 'GC362.jpg',
                'title' => 'Ручной отпариватель',
                'text' => 'Отпаривание — еще проще с нагревающейся подошвой SmartFlow. Вертикальное или горизонтальное разглаживание участков со сложной фактурой и придание свежести одежде — без риска прожечь ткань. Легкий и компактный прибор можно применять в любое время, в любом месте. Просто включите подачу пара и приступайте к использованию!'
            ])

            @include('layouts._slider_block',[
                'image' => 'MG7730.jpg',
                'title' => 'Мультигруммер<br>(для бороды, усов и тела)',
                'text' => 'Усовершенствуйте свой стиль, используя самый точный и многофункциональный из наших триммеров. 16 высококачественных насадок позволяют экспериментировать с образами, обрабатывая любые участки тела. Оцените максимальную точность лезвий DualCut и комфортное использование благодаря нескользящей прорезиненной ручке.'
            ])

            {{--@include('layouts._slider_block',[--}}
                {{--'image' => 'BHB876.jpg',--}}
                {{--'title' => 'Автоматические электрощипцы',--}}
                {{--'text' => 'Теперь вы легко можете создать локоны своей мечты благодаря инновационной интеллектуальной системе завивки автоматических щипцов для завивки StyleCare Prestige от Philips. Создавайте локоны своей мечты: можно захватывать более широкие пряди, сокращая время укладки в два раза.'--}}
            {{--])--}}

            {{--@include('layouts._slider_block',[--}}
                {{--'image' => 'BHD184.jpg',--}}
                {{--'title' => 'Фен для волос',--}}
                {{--'text' => 'Постоянное чередование горячего и холодного воздушного потока дарит волосам и коже головы приятные ощущения. До 22 % больше блеска благодаря ThermoBalance по сравнению с максимальной настройкой прибора.'--}}
            {{--])--}}

            {{--@include('layouts._slider_block',[--}}
                {{--'image' => 'FC6141.jpg',--}}
                {{--'title' => 'Автомобильный ручной компактный пылесос FC6141',--}}
                {{--'text' => 'Еще более качественные результаты уборки благодаря мощному пылесосу Philips MiniVac 12 В для автомобиля. Двухуровневый циклонный фильтр гарантирует долгий срок службы, а насадка аэродинамической формы обеспечивает эффективную очистку от пыли.'--}}
            {{--])--}}

            {{--@include('layouts._slider_block',[--}}
                {{--'image' => 'HF3505.jpg',--}}
                {{--'title' => 'Световой будильник',--}}
                {{--'text' => 'Cветовой будильник Philips Wake-up Light обеспечивает естественное пробуждение при помощи уникального сочетания света и звука. Теперь Вы будете просыпаться легче и чувствовать себя бодрыми и заряженными энергией.'--}}
            {{--])--}}

            {{--@include('layouts._slider_block',[--}}
                {{--'image' => 'HC3521.jpg',--}}
                {{--'title' => 'Машинка для стрижки волос',--}}
                {{--'text' => 'Безупречная прическа без лишних усилий. Стрижка в два раза быстрее* благодаря технологии DualCut и самозатачивающимся лезвиям. Технология Trim-n-Flow предотвращает засорение гребня: создавайте прическу, ни на что не отвлекаясь.'--}}
            {{--])--}}
        </div>
        <!-- // Slider -->
    </div>
</section>

<section class="section section-02">
    <div class="max-width">
        <h1 class="section-title">Получите <b>купон(ы)</b> на скидку <b>10%</b> любым из четырех способов:</h1>
        <div class="row section-rules">
            <ol class="rules">
                <li>Заправьтесь на 30 литров и более топливом АИ-92, АИ-95, Дизель.</li>
                <li>Приобретите товары в магазине на АЗС «Шелл» на сумму более 300 рублей.</li>
                <li>Спишите накопленные 200 баллов с карты лояльности Shell ClubSmart.</li>
                <li>Получите сразу 2 купона за заправку топливом Shell V-Power, Shell V-Power Racing, Shell V-Power Diesel на 30 литров и более.</li>
            </ol>
            <p><sup>Купоны суммируются. Размер максимальной скидки — от 40% до 60%, в зависимости от категории товара.</sup></p>
            <p><sup>Предложение действительно только для участников Shell ClubSmart. Нет карты? Не расстраивайтесь. Вы можете получить вашу карту Shell ClubSmart  абсолютно бесплатно на любой АЗС «Шелл» уже сегодня.</sup></p>
            <p><sup>Период выдачи купонов на АЗС «Шелл» с 29 октября 2018 года до 03 февраля 2019 года или до тех пор, пока купоны имеются в наличии. Использование промо кодов на странице акции на сайте <a href="www.philips-shell-promo.ru">www.philips-shell-promo.ru</a> возможно с 29 октября 2018 года до 23 февраля 2019 года.</sup></p>
        </div>
    </div>
</section>

<section class="section section-05 footer">
    <div class="max-width">
        <p class="small-text">Не является публичной офертой. За 1 визит на АЗС клиент может получить не более 1 купона за покупку товара в магазине и не более 1 купона за покупку топлива АИ-92, АИ-95, Дизель или не более 2 купонов за покупку топлива Shell V-Power, Shell V-Power Racing, Shell V-Power Diesel. Максимальное количество купонов за 1 визит на АЗС — 6 штук. Покупка табачных изделий не учитывается в сумме покупки, необходимой для получения купона. Список товаров Philips, участвующих в акции, на которые возможно получить скидку, представлен на сайте <a href="www.philips-shell-promo.ru" target="_blank">www.philips-shell-promo.ru</a>. Размер максимальной скидки на различные товары Philips отличается. С подробной информацией об организаторе и операторах акции, о правилах, порядке, сроках и условиях ее проведения можно ознакомиться на сайте shell.com.ru. Shell V-Power Рейсинг, Shell V-Power Дизель.</p>
        <p class="small-text">* По вопросам гарантийного обслуживания можно проконсультироваться при заказе товара.</p>
        <p class="small-text">** Подробнее в правилах акции.</p>
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
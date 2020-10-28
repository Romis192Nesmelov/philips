@extends('layouts.app')

@section('content')

@for ($i=5;$i>=4;$i--)
    @if (count($promoCodesNotActive) >= $i)
        @include('_modal_block',['id' => 'discount_'.$i, 'value' => $i*10])
    @endif
@endfor

<section class="section section-01">
    <div class="container">
        <h1 class="section-title do-1 coffee-count">1. Введите промокод</h1>
        <p></p>
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/codes') }}">
            {!! csrf_field() !!}
            <div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php /* <div class="form-group products-group">
                            @foreach ($coffee as $k => $coff)
                                <div class="product-item">
                                    <div class="checkbox product">
                                        <label>
                                            <div class="prod-img"><img src="{{ $coff->image }}"></div>
                                            <input type="radio" name="coffee" value="{{ $coff->id }}" {{ count($errors->getMessageBag()) ? (old('coffee') && old('coffee') == $coff->name ? 'checked' : '') : ''}}>
                                            <span>{{ $coff->name }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        */ ?>
                        <div class="row data-group">

                            @if (Config::get('app.allow_register_new_codes'))
                                <div>
                                       <?php /* <div class="form-group">
                                        <div><input type="text" placeholder="Город" class="form-control" name="town" value="{{ count($errors->getMessageBag()) ? old('town') : '' }}"></div>
                                    </div>
                                    <div class="form-group">
                                        <div><input type="text" placeholder="Название магазина" class="form-control" name="shop" value="{{ count($errors->getMessageBag()) ? old('shop') : '' }}"></div>
                                    </div>   */ ?>
                                    <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                                        <div><input type="text" placeholder="XXXX-XXXX" class="form-control" name="code" value="{{ old('code') }}"></div>
                                         <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-sign-in"></i> Ввод</button>
                                        @if ($errors->has('code'))
                                            <div class="form-control-feedback"><i class="icon-cancel-circle2"></i></div>
                                            <span class="help-block">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>

                                </div>
                            @endif
                            <div>
                                <div id="promo-codes-block">
                                    @if (!count($promoCodesNotActive) && !count($promoCodesActive))
                                        <div class="no-code">{{ trans('messages.no_have_promo') }}</div>
                                    @else
                                        <h2 class="block-title">Введенные промокоды</h2>
                                    @endif

                                    @foreach ($promoCodesActive as $code)
                                        <div class="code inactive-code">{{ $code->code }}</div>
                                    @endforeach

                                    @foreach ($promoCodesNotActive as $code)
                                        <div class="code active-code">{{ $code->code }}</div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@if (count($promoCodesNotActive) <= Config::get('app.max_discount_codes'))
    <a name="discount"></a>
    <section class="section section-02">
        <div class="container">
            <h1 class="section-title do-2 coffee-count">2. Получите скидку</h1>
            <p>В зависимости от количества введенных вами промокодов, вам станут доступны соответствующие скидки. Для получения скидки нажмите кнопку с выбранной скидкой. Затем, после появления запроса, подтвердите получение скидки.</p>
            <div class="row">

                <div class="col-md-6">
                    <div class="discount-buttons">
                        @for ($i=5;$i>=4;$i--)
                            @if (count($promoCodesNotActive) >= $i)
                             <!-- class="btn btn-primary" -->
                                <a href="#discount_{{ $i }}" class="" data-toggle="modal">
                                    <div class="discount-value active">{{ $i*10 }}%</div>
                                </a>
                            @else
                                <div class="discount-value inactive">{{ $i*10 }}%</div>
                            @endif
                        @endfor
                    </div>

                    <div id="discount_block" class="discount-block">
                        <?php $avlDis = []; ?>
                        @foreach ($discountCodesNotActive as $code)
                            @if (!$code->activation_time)
                                <div class="discount-code">{{ $code->code }}  {{ $code->discount }}%</div>
                                @if (!in_array($code->discount, $avlDis))
                                    <?php $avlDis[$code->discount] = $code->code; ?>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </div>

                @if (count($discountCodesActive))
                    <div class="col-md-6">
                        <div class="discount-block-used">
                            <h2 class="block-title">Использованные скидки</h2>
                            @foreach ($discountCodesActive as $code)
                                <div class="discount-code"><i class="line-through">{{ $code->code }}</i><span>Заказ #{{ $code->order_number }}, {{ date('d.m.Y', $code->activation_time) }}</span></div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <a name="shop"></a>
    <section class="section section-03">
        <div class="container">
            <h1 class="section-title do-1 coffee-count">3. Выберите скидку и сделайте покупку</h1>
            <p id="count_discount">
                @if (!isset($avlDis) || !count($avlDis))
                    {{ trans('messages.no_have_discounts') }}
                @elseif (count($avlDis) == 1)
                    {{ trans('messages.one_discount') }}
                @else
                    {{ trans('messages.many_discounts') }}
                @endif
            </p>

            <div class="row">
                <div class="col-md-6">
                    <div id="avaliableDiscounts">
                        @if (count($avlDis))
                            @for ($i=5;$i>=4;$i--)
                                <?php $value = $i*10;?>
                                @if (array_key_exists($value, $avlDis))
                                    @if (Request::input('dis_code') != $avlDis[$value])
                                        <a href="{{ url('/codes?dis_code='.$avlDis[$value].'#shop') }}"><div class="discount-value">{{ $value }}%</div></a>
                                    @else
                                        <a href="{{ url('/codes#shop') }}"><div class="discount-value active">{{ $value }}%</div></a>
                                    @endif
                                @endif
                            @endfor
                        @endif
                    </div>
                </div>
            </div>

            <p id="discountDescript">
                @if (count($avlDis))
                    {{ Request::has('dis_code') && !$errors->has('message') ? trans('messages.selected_discount', ['code' => Request::input('dis_code')]) : trans('messages.not_selected_discount') }}
                @endif
            </p>

            <div id="iframeContainer">
                <iframe src="{{ Config::get('app.api_host').'show/name/shell?apc='.Request::input('dis_code') }}" width="100%" height="1000" frameborder="no" align="center"></iframe>
            </div>
        </div>
    </section>
@endif

<script>
    window.api_host = "{{ Config::get('app.api_host') }}"+'show/name/shell?apc=';

    window.no_have_discounts = "{{ trans('messages.no_have_discounts') }}";
    window.one_discount = "{{ trans('messages.one_discount') }}";
    window.many_discounts = "{{ trans('messages.many_discounts') }}";

    window.not_selected_discount = "{{ trans('messages.not_selected_discount') }}";

    window.no_have_promo = "{{ trans('messages.no_have_promo') }}";
</script>
@if (Request::has('dis_code') && !$errors->has('message'))
    <script>startCheckingCode('{{ Request::input("dis_code") }}')</script>
@endif

@endsection

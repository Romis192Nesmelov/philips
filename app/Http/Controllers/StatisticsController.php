<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PromoCode;
use App\DiscountCode;

class StatisticsController extends Controller
{
    private $statistics;

    public function __construct()
    {
        $this->middleware('secret');
    }

    public function getIndex(Request $request)
    {
        $new = date('d.m.Y');
        $timeStart = strtotime($new);
        $this->generateStatistic($timeStart);

        return $this->sendMail('Статистика за '.date('d.m.Y'));
    }

    public function getAll(Request $request)
    {
        $timeStart = 1470009600;
        $timeEnd = time();

        while ($timeStart <= $timeEnd) {
            $this->generateStatistic($timeStart);
            $timeStart += (60 * 60 * 24);
        }


        return $this->sendMail('Статистика за все время');
    }

    private function generateStatistic($timeStart)
    {
        $timeEnd = $timeStart + (60 * 60 * 24);
        $promoRegister = PromoCode::where('on_time','>=',$timeStart)->where('on_time','<=',$timeEnd)->count();
        $gotDiscount30 = $this->giveMeDiscountCount($timeStart, $timeEnd, 30);
        $gotDiscount40 = $this->giveMeDiscountCount($timeStart, $timeEnd, 40);
        $gotDiscount50 = $this->giveMeDiscountCount($timeStart, $timeEnd, 50);
        $ordersDone = DiscountCode::where('activation_time','>=',$timeStart)->where('activation_time','<=',$timeEnd)->count();

        $this->statistics[] = [
            'date' => date('d.m.Y',$timeStart),
            'promoRegister' => $promoRegister,
            'gotDiscount30' => $gotDiscount30,
            'gotDiscount40' => $gotDiscount40,
            'gotDiscount50' => $gotDiscount50,
            'ordersDone' => $ordersDone
        ];
    }

    private function giveMeDiscountCount($timeStart, $timeEnd, $value)
    {
        return DiscountCode::where('on_time','>=',$timeStart)->where('on_time','<=',$timeEnd)->where('discount',$value)->count();
    }

    private function sendMail($head)
    {
//        Mail::send('statistics', ['head' => $head, 'statistics' => $this->statistics], function($message) {
//            $message->from('_____@yandex.ru', 'Admin')->subject('Статистика [site address]');
//            $message->to('');
//        });

        return view('statistics',['head' => $head, 'statistics' => $this->statistics]);
    }
}

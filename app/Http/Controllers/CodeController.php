<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Config;
use Exception;

use App\PromoCode;
use App\DiscountCode;

class CodeController extends BasicController
{
    protected $promoCodesNotActive;
    protected $promoCodesActive;
    protected $discountCodesNotActive;
    protected $discountCodesActive;
    protected $discountVal = null;
    protected $settingsForm = null;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        if ($request->has('dis_code') && !$this->checkingDiscountCode($request->input('dis_code'))) {
            return redirect('/codes#shop')->withErrors($this->errors);
        }
        return $this->showView();
    }

    public function postIndex(Request $request)
    {
        try {
            $this->validate($request, [
                'code' => 'required|exists:promo_codes,code',
            ]);
        } catch (Exception $e) {
            return redirect('/codes')->withErrors($e->validator->errors());
        }

        if (!$code = PromoCode::where('code',strtolower(trim($request->input('code'))))->where('on_time','')->first()) {
            $request->flash();
            $this->errors->add('code','Этот промокод уже был использован');
            return redirect('/codes')->withErrors($this->errors);
        }

        $code->on_time = time();
        $code->user_id = Auth::user()->id;
        $code->save();

        return redirect('/codes');
    }

    public function postAddDiscount(Request $request)
    {
        $this->validate($request, ['value' => 'required']);
        $countCodes = $request->input('value')/10;
        $promoCodes = PromoCode::where('user_id',Auth::user()->id)->where('activation_time',0)->limit($countCodes)->get();

        if (
            count($this->promoCodesNotActive) <= Config::get('app.max_discount_codes') &&
            count($promoCodes) >= $countCodes &&
            $discountCode = DiscountCode::where('on_time',0)->where('discount',$request->input('value'))->first()
        ) {
            foreach ($promoCodes as $code) {
                $code->activation_time = time();
                $code->save();
            }

            $discountCode->on_time = time();
            $discountCode->user_id = Auth::user()->id;
            $discountCode->save();

            return redirect('/codes#discount');

        } else {
            $this->errors->add('message', 'Не удалось получить код скидки. Обратитесь в службу технической поддержки tech@philips-shell-promo.ru.');
            return redirect()->back()->withErrors($this->errors);
        }
    }

    public function postCheckDiscountCode(Request $request)
    {
        if ($request->has('dis_code') && $this->checkingDiscountCode($request->input('dis_code'))) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    protected function checkingDiscountCode($code) {

        $resRequest = $this->giveMeApiRequest($code);
        $res = $resRequest[0];

// Раскомментировать и подставить вместо XXXXXXXXXXXXXXXX код скидки, который должен считаться использованным
//        if (strtoupper($code) == 'XXXXXXXXXXXXXXXX') {
//            $res->status = 'used';
//            $res->date = '10.09.2016';
//            $res->id = 123456789;
//        }

        if ($res->status == 'ok') return true;
        elseif ($res->status == 'used') {
            DiscountCode::where('code',strtoupper($code))->update([
                'activation_time' => strtotime($res->date),
                'order_number' => $res->id
            ]);
            $this->errors->add('message', 'Скидка '.$code.' уже была использована '.$res->date.'.');
            return false;
        } else {
//            $code = DiscountCode::where('code',strtoupper($code))->first();
//            if ($code) $code->delete();
            $this->errors->add('message', 'Ошибка обработки скидки '.$code.'. Обратитесь в службу технической поддержки tech@philips-shell-promo.ru.');
            return false;
        }
    }

    protected function giveMePromoCodes()
    {
        $this->promoCodesNotActive = PromoCode::where('user_id',Auth::user()->id)->where('activation_time',0)->get();
        $this->promoCodesActive = PromoCode::where('user_id',Auth::user()->id)->where('activation_time','!=',0)->get();
    }

    protected function giveMeDiscountCodes()
    {
        $this->discountCodesNotActive = $this->giveMeDiscountNotActve();
        $codesString = '';
        foreach ($this->discountCodesNotActive as $k => $code) {
            $codesString .= $k ? ','.$code->code : $code->code;
        }

        if ($codesString) {
            $resRequest = $this->giveMeApiRequest($codesString);

            foreach ($resRequest as $res) {
                if ($res->status == 'used') {
                    $code = DiscountCode::where('code',$res->code)->first();
                    $code->activation_time = strtotime($res->date);
                    $code->order_number = $res->id;
                    $code->save();
//                } elseif ($res->status == 'invalid') {
//                    $code = DiscountCode::where('code',$res->code)->first();
//                    if ($code) $code->delete();
                }
            }
        }
        $this->discountCodesActive = DiscountCode::where('user_id',Auth::user()->id)->where('activation_time','!=',0)->orderBy('activation_time','desc')->get();
    }

    protected function giveMeDiscountNotActve()
    {
        return DiscountCode::where('user_id',Auth::user()->id)->where('activation_time',0)->orderBy('discount','desc')->get();
    }

    protected function giveMeApiRequest($codesString)
    {
        return json_decode(file_get_contents(Config::get('app.api_host').'check/codes/'.strtoupper($codesString).'/key/'.Config::get('app.api_key')));
    }

    protected function showView()
    {
        $this->giveMePromoCodes();
        $this->giveMeDiscountCodes();

        return view('codes', [
            'promoCodesNotActive' => $this->promoCodesNotActive,
            'promoCodesActive' => $this->promoCodesActive,
            'discountCodesNotActive' => $this->discountCodesNotActive,
            'discountCodesActive' => $this->discountCodesActive,
            'discountVal' => $this->discountVal,
            'settingsForm' => $this->settingsForm,
        ]);
    }
}

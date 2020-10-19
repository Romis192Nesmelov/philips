<?php

use Illuminate\Database\Seeder;

class DiscountCodesTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['code' => 'SH60-TESTTESTPNXU','discount' => 60],
            ['code' => 'SH60-TESTTESTPSKK','discount' => 60],
            ['code' => 'SH60-TESTTEST1V50','discount' => 60],
            ['code' => 'SH60-TESTTESTVBUP','discount' => 60],
            ['code' => 'SH60-TESTTESTD1PB','discount' => 60],
            ['code' => 'SH60-TESTTEST9GDX','discount' => 60],
            ['code' => 'SH60-TESTTESTPUSZ','discount' => 60],
            ['code' => 'SH60-TESTTEST5U98','discount' => 60],
            ['code' => 'SH60-TESTTESTQ9M2','discount' => 60],
            ['code' => 'SH60-TESTTESTU1JE','discount' => 60],

            ['code' => 'SH50-TESTTEST1B5V','discount' => 50],
            ['code' => 'SH50-TESTTEST0F9V','discount' => 50],
            ['code' => 'SH50-TESTTESTHMW6','discount' => 50],
            ['code' => 'SH50-TESTTEST3EG8','discount' => 50],
            ['code' => 'SH50-TESTTESTT4G7','discount' => 50],
            ['code' => 'SH50-TESTTESTZEL5','discount' => 50],
            ['code' => 'SH50-TESTTEST0OCR','discount' => 50],
            ['code' => 'SH50-TESTTESTQAHI','discount' => 50],
            ['code' => 'SH50-TESTTESTNM4N','discount' => 50],
            ['code' => 'SH50-TESTTEST0OVN','discount' => 50],

            ['code' => 'SH40-TESTTESTIGYS','discount' => 40],
            ['code' => 'SH40-TESTTEST7AVC','discount' => 40],
            ['code' => 'SH40-TESTTESTT0MY','discount' => 40],
            ['code' => 'SH40-TESTTESTNMVZ','discount' => 40],
            ['code' => 'SH40-TESTTESTFKLZ','discount' => 40],
            ['code' => 'SH40-TESTTESTNTES','discount' => 40],
            ['code' => 'SH40-TESTTEST1JC3','discount' => 40],
            ['code' => 'SH40-TESTTESTNORJ','discount' => 40],
            ['code' => 'SH40-TESTTESTQ9DU','discount' => 40],
            ['code' => 'SH40-TESTTESTH7B2','discount' => 40],

            ['code' => 'SH30-TESTTESTDT38','discount' => 30],
            ['code' => 'SH30-TESTTESTUXEL','discount' => 30],
            ['code' => 'SH30-TESTTESTE4LV','discount' => 30],
            ['code' => 'SH30-TESTTESTBT3K','discount' => 30],
            ['code' => 'SH30-TESTTESTNUPC','discount' => 30],
            ['code' => 'SH30-TESTTEST6ONZ','discount' => 30],
            ['code' => 'SH30-TESTTESTHX18','discount' => 30],
            ['code' => 'SH30-TESTTESTIT4T','discount' => 30],
            ['code' => 'SH30-TESTTESTJY1D','discount' => 30],
            ['code' => 'SH30-TESTTEST3E4B','discount' => 30],

            ['code' => 'SH20-TESTTESTM7AD','discount' => 20],
            ['code' => 'SH20-TESTTESTJZ8H','discount' => 20],
            ['code' => 'SH20-TESTTEST6S94','discount' => 20],
            ['code' => 'SH20-TESTTEST61GP','discount' => 20],
            ['code' => 'SH20-TESTTESTH7AV','discount' => 20],
            ['code' => 'SH20-TESTTEST76D7','discount' => 20],
            ['code' => 'SH20-TESTTEST7LGV','discount' => 20],
            ['code' => 'SH20-TESTTESTTTEK','discount' => 20],
            ['code' => 'SH20-TESTTESTWCFX','discount' => 20],
            ['code' => 'SH20-TESTTESTT7LW','discount' => 20],

            ['code' => 'SH10-TESTTEST9BLX','discount' => 10],
            ['code' => 'SH10-TESTTESTWTFI','discount' => 10],
            ['code' => 'SH10-TESTTESTOEKF','discount' => 10],
            ['code' => 'SH10-TESTTESTJDVO','discount' => 10],
            ['code' => 'SH10-TESTTESTIIZ4','discount' => 10],
            ['code' => 'SH10-TESTTESTQAYL','discount' => 10],
            ['code' => 'SH10-TESTTESTQB2I','discount' => 10],
            ['code' => 'SH10-TESTTESTNBLG','discount' => 10],
            ['code' => 'SH10-TESTTEST1A5F','discount' => 10],
            ['code' => 'SH10-TESTTESTY3JL','discount' => 10],
        ];

        foreach ($data as $val) {
            \App\DiscountCode::create($val);
        }
    }
}
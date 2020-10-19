<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $this->call(PromoCodesPart1TableSeeder::class);
        $this->call(PromoCodesPart2TableSeeder::class);
        $this->call(PromoCodesPart3TableSeeder::class);
        $this->call(PromoCodesPart4TableSeeder::class);
        $this->call(PromoCodesPart5TableSeeder::class);
        $this->call(PromoCodesPart6TableSeeder::class);
        $this->call(PromoCodesPart7TableSeeder::class);

        $this->call(DiscountCodesTableSeeder::class);
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOwnerIdToDiscountCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->integer('user_id', false, true)->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discount_codes', function (Blueprint $table) {
            $table->dropForeign('discount_codes_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}

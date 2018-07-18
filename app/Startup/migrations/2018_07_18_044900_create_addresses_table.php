<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street1', 100);
            $table->string('street2', 100)->nullable()->default(null);
            $table->string('city', 100);
            $table->string('postal_code', 20);
            $table->string('phone', 20)->nullable()->default(null);

            $table->string('state_province', 100);

            $table->tinyInteger('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries');


            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}

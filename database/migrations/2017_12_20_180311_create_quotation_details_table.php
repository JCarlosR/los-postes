<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('quotation_id')->unsigned(); // cotización
            $table->foreign('quotation_id')->references('id')->on('quotations');

            $table->integer('quantity');
            $table->float('unit_price');
            $table->float('subtotal');
            $table->integer('article_id')->unsigned(); // artículos
            $table->foreign('article_id')->references('id')->on('articles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_details');
    }
}

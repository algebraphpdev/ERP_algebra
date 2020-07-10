<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('productName', 70);
            $table->unsignedBigInteger('productline_id')->index();
            $table->string('productScale', 10);
            $table->string('productVendor', 50);
            $table->text('productDescription');
            $table->smallInteger('quantityInStock');
            $table->decimal('buyPrice', 10, 2);
            $table->decimal('MSRP', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('productline_id')->references('id')->on('productlines');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

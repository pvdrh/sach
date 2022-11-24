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
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->integer('origin_price')->nullable();;
            $table->integer('sale_price')->nullable();;
            $table->integer('discount_percent')->nullable();
            $table->string('content')->nullable();
            $table->integer('author_id')->nullable();;
            $table->integer('publishing_company_id')->nullable();;
            $table->integer('pages_count');
            $table->integer('category_id')->nullable();;
            $table->integer('status');
            $table->integer('rate')->nullable();
            $table->timestamps();
            $table->softDeletes();
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

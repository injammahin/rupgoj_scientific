<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMainProductsTable extends Migration
{
    public function up()
    {
        Schema::create('main_products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Main product name
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('main_products');
    }
}

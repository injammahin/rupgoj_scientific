<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainProductIdToNewProductsTable extends Migration
{
    public function up()
    {
        Schema::table('new_products', function (Blueprint $table) {
            $table->unsignedBigInteger('main_product_id')->nullable()->after('id');
            $table->foreign('main_product_id')->references('id')->on('main_products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('new_products', function (Blueprint $table) {
            $table->dropForeign(['main_product_id']);
            $table->dropColumn('main_product_id');
        });
    }
}

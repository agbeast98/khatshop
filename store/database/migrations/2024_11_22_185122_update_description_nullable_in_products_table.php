<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDescriptionNullableInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
            $table->text('short_description')->nullable()->change();
            $table->json('tags')->nullable()->change();
            $table->json('categories')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('description')->nullable(false)->change();
            $table->text('short_description')->nullable(false)->change();
            $table->json('tags')->nullable(false)->change();
            $table->json('categories')->nullable(false)->change();
        });
    }
}

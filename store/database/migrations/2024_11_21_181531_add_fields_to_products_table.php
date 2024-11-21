<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('english_name')->nullable();
            $table->json('categories')->nullable(); // برای پشتیبانی از چند دسته‌بندی
            $table->string('brand')->nullable();
            $table->float('weight')->nullable();
            $table->float('height')->nullable();
            $table->float('width')->nullable();
            $table->float('length')->nullable();
            $table->json('tags')->nullable();
            $table->text('short_description')->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->date('discount_expiry')->nullable();
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
            $table->dropColumn([
                'english_name',
                'categories',
                'brand',
                'weight',
                'height',
                'width',
                'length',
                'tags',
                'short_description',
                'discount_price',
                'discount_expiry',
            ]);
        });
    }
}

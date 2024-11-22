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
            $table->string('name'); // نام محصول (ضروری)
            $table->string('english_name')->nullable(); // نام انگلیسی محصول
            $table->string('brand')->nullable(); // برند محصول
            $table->float('weight')->nullable(); // وزن محصول
            $table->float('height')->nullable(); // ارتفاع محصول
            $table->float('width')->nullable(); // عرض محصول
            $table->float('length')->nullable(); // طول محصول
            $table->json('tags')->nullable(); // برچسب‌های محصول
            $table->text('short_description')->nullable(); // توضیحات کوتاه
            $table->text('description')->nullable(); // توضیحات کامل محصول
            $table->decimal('price', 10, 2); // قیمت محصول (ضروری)
            $table->decimal('discount_price', 10, 2)->nullable(); // قیمت تخفیف
            $table->date('discount_expiry')->nullable(); // تاریخ انقضای تخفیف
            $table->json('categories')->nullable(); // دسته‌بندی‌ها
            $table->integer('stock')->default(0); // موجودی انبار
            $table->timestamps(); // زمان ایجاد و به‌روزرسانی
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

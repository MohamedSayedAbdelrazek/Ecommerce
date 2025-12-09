<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('orderName');
            $table->date('orderDate');
            $table->integer('totalAmount');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->decimal('totalPrice',8,2);

            //relations
            $table->unsignedBigInteger('order_status_id');
            $table->foreign('order_status_id')->references('id')->on('order_statuses');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');


            $table->timestamps();
            $table->softDeletes(); 
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

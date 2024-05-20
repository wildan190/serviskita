<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('OrderTicker')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_services_id');
            $table->unsignedBigInteger('category_id');
            $table->text('address'); // Address field to store full address as a single text column
            $table->string('phoneNumber'); // Phone number field
            $table->decimal('total_price', 10, 2); // Adjust precision and scale as needed
            $table->enum('status', ['Confirmed', 'Pending', 'Canceled'])->default('Pending');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_services_id')->references('id')->on('product_services')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

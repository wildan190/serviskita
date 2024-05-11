<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_services', function (Blueprint $table) {
            $table->id();
            $table->string('ServiceName');
            $table->unsignedBigInteger('Category_id');
            $table->foreign('Category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->decimal('ServicePrice', 8, 2);
            $table->unsignedInteger('Rating')->nullable();
            $table->text('Feedback')->nullable();
            $table->unsignedBigInteger('User_id');
            $table->foreign('User_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('AdditionalService')->nullable();
            $table->decimal('AdditionalServicePrice', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Drops the 'product_services' table from the database.
     *
     * @throws \Exception if an error occurs while dropping the table
     */
    public function down()
    {
        Schema::dropIfExists('product_services');
    }
}

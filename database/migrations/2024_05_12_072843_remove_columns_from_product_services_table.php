<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromProductServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_services', function (Blueprint $table) {
            $table->dropColumn('Rating');
            $table->dropColumn('Feedback');
            $table->dropColumn('AdditionalService');
            $table->dropColumn('AdditionalServicePrice');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_services', function (Blueprint $table) {
            $table->unsignedInteger('Rating')->nullable();
            $table->text('Feedback')->nullable();
            $table->string('AdditionalService')->nullable();
            $table->decimal('AdditionalServicePrice', 8, 2)->nullable();
        });
    }
}

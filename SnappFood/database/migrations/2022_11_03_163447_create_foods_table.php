<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('raw_material');
            $table->integer('price');
            $table->string('image');
            $table->unsignedBigInteger('foods_category_id');
            $table->foreign('foods_category_id')->
            references('id')->
            on('foods_category')->
            cascadeOnDelete();
            $table->timestamps();
            $table->unsignedBigInteger('resturant_id');
            $table->foreign('resturant_id')
                ->references('id')
                ->on('resturants')->cascadeOnDelete();

            $table->unsignedBigInteger('discount_id')->nullable();
            $table->foreign('discount_id')
                ->references('id')
                ->on('discounts')->cascadeOnDelete();
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
        Schema::dropIfExists('foods');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();
            $table->enum('order_status', ['pending', 'preparing', 'delivaring', 'taken_over'])->default('pending');
            $table->unsignedBigInteger('resturant_id');
            $table->foreign('resturant_id')
                ->references('id')
                ->on('resturants')
                ->cascadeOnDelete();
            $table->boolean('is_paid')->default(false);
            $table->integer('total_price');
            $table->text('note')->nullable();
            $table->timestamps();
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
};

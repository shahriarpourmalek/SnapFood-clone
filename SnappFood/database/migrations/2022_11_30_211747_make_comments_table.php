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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->
            references('id')->
            on('foods')->
            cascadeOnDelete();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->
            references('id')->
            on('users')->
            cascadeOnDelete();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->
            references('id')->
            on('orders')->
            cascadeOnDelete();
            $table->text('message');
            $table->text('answer')->nullable();
            $table->enum('score', \App\Models\Comment::COMMENT_SCORE);
            $table->enum('comment_status', \App\Models\Comment::COMMENT_STATUS)->default('Unaccepted');
            $table->softDeletes();
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
        Schema::dropIfExists('comments');

    }
};

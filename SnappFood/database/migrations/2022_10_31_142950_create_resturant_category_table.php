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
        Schema::create('resturant_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('resturant_id');
            $table->foreign('resturant_id')->
            references('id')->
            on('resturants')->
            cascadeOnDelete();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->
            references('id')->
            on('categories')->
            cascadeOnDelete();
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
        Schema::dropIfExists('resturant_category');
    }
};

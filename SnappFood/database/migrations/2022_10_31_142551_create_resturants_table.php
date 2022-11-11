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
        Schema::create('resturants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('number');
            $table->string('account_number');

            $table->integer('delivery_cost')->nullable();
            $table->text('address');
            $table->string('latitude');
            $table->string('longitude');
            $table->unsignedBigInteger('manager_id');
            $table->foreign('manager_id')
                ->references('id')
                ->on('managers')->cascadeOnDelete();

            $table->timestamps();
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
        Schema::dropIfExists('resturants');
    }
};

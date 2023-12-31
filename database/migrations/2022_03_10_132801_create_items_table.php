<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name', 100)->nullable();
            $table->string('type', 16);
            $table->string('detail', 500)->nullable();
            $table->longText('image', 500)->nullable();
            $table->date('buy_date', 500);
            $table->string('color', 16);
            $table->string('season', 16);
            $table->string('brand', 16)->nullable();
            $table->string('group', 16)->nullable();
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
        Schema::dropIfExists('items');
    }
}

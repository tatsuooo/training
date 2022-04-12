<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('menu'); //　トレーニングのメニューを保存するカラム
            $table->string('set');// トレーニングのセット数を保存するカラム
            $table->string('times');//　トレーニングの時間を保存するカラム
            $table->string('weight');
            $table->string('body'); //　トレーニングの説明を保存するカラム
            $table->string('image_path')->nullable();

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
        Schema::dropIfExists('tras');
    }
}

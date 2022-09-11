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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('news_tricker_total');
            $table->integer('news_ticker_status');
            $table->text('video_total');
            $table->integer('video_status');
            $table->text('logo')->nullable();
            $table->text('fevicon')->nullable();
            $table->integer('top_bar_date_status');
            $table->text('top_bar_email');
            $table->integer('top_bar_email_status');
            $table->text('theme_color_1');
            $table->text('theme_color_2');
            $table->text('analytic_id');
            $table->text('disqus');


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
        Schema::dropIfExists('settings');
    }
};

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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->text('about_title');
            $table->text('about_detail');
            $table->integer('about_status');
            $table->text('faq_title');
            $table->text('contact_title');
            $table->text('contact_detail');
            $table->text('contact_map');
            $table->integer('contact_status');

            $table->text('terms_title');
            $table->text('terms_detail');
            $table->integer('terms_status');
            $table->text('privacy_title');
            $table->text('privacy_detail');
            $table->integer('privacy_status');
            $table->text('disclaim_title');
            $table->text('disclaim_detail');
            $table->integer('disclaim_status');
            $table->text('login_title');

            $table->integer('login_status');
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
        Schema::dropIfExists('pages');
    }
};

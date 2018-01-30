<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(-1);
            $table->string('type');
            $table->string('title');
            $table->string('icon')->nullable();
            $table->string('label');
            $table->string('link');
            $table->text('meta')->nullable();
            $table->text('settings')->nullable();
            $table->text('online');
            $table->text('viewer');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('site_maps');
    }
}

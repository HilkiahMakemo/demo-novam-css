<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('group_id');
      $table->string('email', 128)->unique();
      $table->string('password');
      $table->string('stripe_id')->nullable();
      $table->string('card_brand')->nullable();
      $table->string('card_last_four')->nullable();
      $table->timestamp('trial_ends_at')->nullable();
      $table->boolean('active')->default(0);
      $table->rememberToken();
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
    Schema::dropIfExists('users');
  }
}

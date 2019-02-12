<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable(false);
            $table->string('slug', 255)->unique()->nullable(false);
            $table->text('content')->nullable(false);
            $table->integer('parent_id')->nullable();
            $table->enum('no_comments', ['Y', 'N']);
            $table->integer('created_user_id')->index();
            $table->integer('updated_user_id')->index();
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
        Schema::dropIfExists('pages');
    }
}

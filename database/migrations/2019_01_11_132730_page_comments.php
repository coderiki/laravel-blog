<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PageComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content')->nullable(false);
            $table->integer('page_id')->index()->nullable(false);
            $table->integer('parent_id')->nullable();
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
        Schema::dropIfExists('page_comments');
    }
}

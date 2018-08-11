<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('training_id');
            $table->integer('user_id');
            $table->string('attribute_name');
            $table->string('title');
            $table->string('content');
            $table->integer('rating_score');
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
        Schema::dropIfExists('training_reviews');
    }
}

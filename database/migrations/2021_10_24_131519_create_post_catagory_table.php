<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCatagoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_catagory', function (Blueprint $table) {
            $table->bigInteger("post_id")->unsigned()->index();
            $table->bigInteger("category_id")->unsigned()->index();
            $table->foreign("post_id")->references("id")->on("posts")->onDelete("cascade");
            $table->foreign("category_id")->references("id")->on("post_categories")->onDelete("cascade");
            $table->primary(["post_id", "category_id"]);
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
        Schema::dropIfExists('post_catagory');
    }
}

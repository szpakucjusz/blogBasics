<?php

use App\Model\Image;
use App\Model\Post;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(Image::TABLE_NAME, function (Blueprint $table) {
            $table->foreign(Image::COLUMN_RELATED_POST_ID)->references('id')->on(Post::TABLE_NAME)->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

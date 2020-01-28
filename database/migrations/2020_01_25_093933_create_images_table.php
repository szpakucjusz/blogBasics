<?php
use App\Model\Image;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Image::TABLE_NAME, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path');
            $table->bigInteger(IMAGE::COLUMN_RELATED_POST_ID)->unsigned();
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
        Schema::dropIfExists(Image::TABLE_NAME);
    }
}

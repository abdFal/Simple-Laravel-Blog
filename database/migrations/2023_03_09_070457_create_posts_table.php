<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('title', 100);
        $table->text('content');
        $table->timestamps();
    });
    DB::statement('ALTER TABLE posts  AUTO_INCREMENT = 1');
    DB::statement('ALTER TABLE posts MODIFY COLUMN title VARCHAR(255) NOT NULL');

}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
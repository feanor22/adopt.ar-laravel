<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Commenttext extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('comment', function (Blueprint $table) {
        $table->string('text', 500);


      });
  }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('comment', function (Blueprint $table) {
          $table->dropColumn('text');
      });
    }
}

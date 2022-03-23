<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('age')->nullable();
            $table->integer('sex')->nullable();
            $table->text('image')->nullable();
            $table->text('bicycle_image')->nullable();
            $table->text('my_bicycle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('age');
            $table->dropColumn('sex');
            $table->dropColumn('image');
            $table->dropColumn('bicycle_image');
            $table->dropColumn('my_bicycle');
        });
    }
}

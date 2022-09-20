<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHideToBannerFooterTable extends Migration
{
    public function up()
    {
        Schema::table('banner_footer', function (Blueprint $table) {
            $table->string('hide');
        });
    }


    public function down()
    {
        Schema::table('banner_footer', function($table) {
            $table->dropColumn('hide');
        });
    }
}

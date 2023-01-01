<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contact_center', function (Blueprint $table) {
            $table->string('chk_link_wa');
            $table->string('link_wa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contact_center', function (Blueprint $table) {
            $table->dropColumn('chk_link_wa');
            $table->dropColumn('link_wa');
        });
    }
};

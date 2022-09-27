<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushNotificatonInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('push_notificaton_info', function (Blueprint $table) {
            $table->id();
            $table->string('title_push_notification_info');
            $table->string('deskripsi_push_notification_info');
            $table->string('image_push_notification_info');
            $table->string('key_product_push_notification_info');
            $table->string('value_product_push_notification_info');
            $table->string('type_notification')->default('info');
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
        Schema::dropIfExists('push_notificaton_info');
    }
}

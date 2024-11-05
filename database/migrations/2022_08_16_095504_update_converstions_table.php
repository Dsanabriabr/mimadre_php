<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateConverstionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->string('sender_type')->nullable(false)->change();
            $table->foreignId('receiver_id')->change();
            $table->string('receiver_type')->nullable(false)->change();
            $table->foreignId('last_message_id')->nullable()->change();
            $table->dateTime('last_message_time')->nullable()->change();
            $table->integer('unread_message_count')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conversations', function (Blueprint $table) {
            $table->dropColumn('receiver_id');
            $table->dropColumn('receiver_type');
            $table->dropColumn('last_message_id')->nullable();
            $table->dropColumn('last_message_time')->nullable();
            $table->dropColumn('sender_type');
        });
    }
}

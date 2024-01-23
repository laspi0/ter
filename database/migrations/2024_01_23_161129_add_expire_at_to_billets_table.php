<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('billets', function (Blueprint $table) {
            $table->timestamp('expire_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('billets', function (Blueprint $table) {
            $table->dropColumn('expire_at');
        });
    }
};

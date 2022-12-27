<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('address')->nullable();
            $table->string('max_registrations')->nullable();
            $table->boolean('registrations_public')->default(false);
            $table->datetime('registration_closes')->nullable();
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('max_registrations');
            $table->dropColumn('registrations_public');
            $table->dropColumn('registration_closes');
        });
    }
};

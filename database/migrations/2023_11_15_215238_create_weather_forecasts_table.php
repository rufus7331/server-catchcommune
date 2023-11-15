<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('weather_forecasts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fishing_spot_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->string('weather_condition');
            $table->float('temperature');
            $table->float('wind_speed')->nullable();
            $table->float('precipitation')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weather_forecasts');
    }
};

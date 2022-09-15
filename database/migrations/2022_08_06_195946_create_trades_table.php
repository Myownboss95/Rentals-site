<?php

use App\Models\Tradeable;
use App\Models\User;
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
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Tradeable::class);
            $table->foreignIdFor(User::class);
            $table->double('amount');
            $table->enum('type', ['buy', 'sell']);
            $table->integer('stop_loss')->nullable();
            $table->string('close_at')->nullable();
            $table->enum('status', ['active', 'closed']);
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
        Schema::dropIfExists('trades');
    }
};

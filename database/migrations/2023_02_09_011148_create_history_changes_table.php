<?php

use App\Models\Sim;
use App\Models\User;
use App\Models\Network;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sim::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('iccid');
            $table->integer('price_in');
            $table->integer('price_out');
            $table->foreignIdFor(Network::class)->nullable()->constrained()->cascadeOnDelete();
            $table->date('imported_at')->nullable();
            $table->date('expired_at')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('history_changes');
    }
};

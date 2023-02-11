<?php

use App\Models\Sim;
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
        Schema::create('sim_owners', function (Blueprint $table) {
            $table->id();
            $table->morphs('userable');
            $table->foreignIdFor(Sim::class)->constrained()->cascadeOnDelete();
            $table->integer('price');
            $table->date('exprired_at');
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
        Schema::dropIfExists('sim_owners');
    }
};

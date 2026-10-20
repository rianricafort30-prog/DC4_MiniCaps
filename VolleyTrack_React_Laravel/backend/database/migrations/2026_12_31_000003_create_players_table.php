<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration{public function up():void{Schema::create('players',function(Blueprint $t){$t->id();$t->string('first_name');$t->string('last_name');$t->unsignedTinyInteger('jersey_number')->nullable();$t->string('position')->nullable();$t->foreignId('team_id')->nullable()->constrained()->nullOnDelete();$t->timestamps();});}public function down():void{Schema::dropIfExists('players');}};

<?php
use Illuminate\Database\Migrations\Migration;use Illuminate\Database\Schema\Blueprint;use Illuminate\Support\Facades\Schema;
return new class extends Migration{public function up():void{Schema::create('teams',function(Blueprint $t){$t->id();$t->string('name');$t->string('school')->nullable();$t->string('coach')->nullable();$t->string('category')->nullable();$t->timestamps();});}public function down():void{Schema::dropIfExists('teams');}};

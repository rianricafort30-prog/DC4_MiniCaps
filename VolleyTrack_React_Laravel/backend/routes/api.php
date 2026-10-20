<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\{User,Team,Player,Tournament,MatchGame};
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ResourceController;
Route::post('/login',[AuthController::class,'login']);
Route::middleware('auth:sanctum')->group(function(){
 Route::get('/user',fn(Request $r)=>$r->user()); Route::post('/logout',[AuthController::class,'logout']);
 Route::get('/dashboard',fn()=>['teams'=>Team::count(),'players'=>Player::count(),'tournaments'=>Tournament::count(),'matches'=>MatchGame::count()]);
 foreach(['teams'=>Team::class,'players'=>Player::class,'tournaments'=>Tournament::class,'matches'=>MatchGame::class] as $uri=>$model){Route::get("/$uri",[ResourceController::class,'index'])->defaults('resource',$uri);Route::post("/$uri",[ResourceController::class,'store'])->defaults('resource',$uri);Route::get("/$uri/{id}",[ResourceController::class,'show'])->defaults('resource',$uri);Route::put("/$uri/{id}",[ResourceController::class,'update'])->defaults('resource',$uri);Route::delete("/$uri/{id}",[ResourceController::class,'destroy'])->defaults('resource',$uri);}
});

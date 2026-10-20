<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;
class MatchGame extends Model{use HasFactory;protected $table='matches';protected $fillable=['tournament_id','home_team_id','away_team_id','match_date','venue','home_score','away_score','status'];protected function casts():array{return ['match_date'=>'datetime'];}public function tournament(){return $this->belongsTo(Tournament::class);}}

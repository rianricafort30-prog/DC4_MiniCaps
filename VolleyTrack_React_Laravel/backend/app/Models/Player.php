<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;
class Player extends Model{use HasFactory;protected $fillable=['first_name','last_name','jersey_number','position','team_id'];public function team(){return $this->belongsTo(Team::class);}}

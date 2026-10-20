<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tournament extends Model{use HasFactory;protected $fillable=['name','venue','start_date','end_date','status'];protected function casts():array{return ['start_date'=>'date','end_date'=>'date'];}}

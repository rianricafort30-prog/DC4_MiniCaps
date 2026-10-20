<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;use Illuminate\Http\Request;use Illuminate\Support\Facades\Validator;use App\Models\{Team,Player,Tournament,MatchGame};
class ResourceController extends Controller{
 private function model($r){return ['teams'=>Team::class,'players'=>Player::class,'tournaments'=>Tournament::class,'matches'=>MatchGame::class][$r]??abort(404);}
 private function rules($r){return match($r){'teams'=>['name'=>'required|string|max:150','school'=>'nullable|string|max:150','coach'=>'nullable|string|max:150','category'=>'nullable|string|max:80'],'players'=>['first_name'=>'required|string|max:100','last_name'=>'required|string|max:100','jersey_number'=>'nullable|integer|min:0|max:99','position'=>'nullable|string|max:80','team_id'=>'nullable|exists:teams,id'],'tournaments'=>['name'=>'required|string|max:150','venue'=>'nullable|string|max:150','start_date'=>'nullable|date','end_date'=>'nullable|date','status'=>'nullable|string|max:50'],'matches'=>['tournament_id'=>'required|exists:tournaments,id','home_team_id'=>'required|exists:teams,id','away_team_id'=>'required|different:home_team_id|exists:teams,id','match_date'=>'nullable|date','venue'=>'nullable|string|max:150','home_score'=>'nullable|integer|min:0','away_score'=>'nullable|integer|min:0','status'=>'nullable|string|max:50'],default=>[]};}
 public function index(Request $q){$m=$this->model($q->route('resource'));return $m::latest('id')->paginate(100);}
 public function show(Request $q,$id){$m=$this->model($q->route('resource'));return $m::findOrFail($id);}
 public function store(Request $q){$r=$q->route('resource');$m=$this->model($r);$data=$q->validate($this->rules($r));return response()->json($m::create($data),201);}
 public function update(Request $q,$id){$r=$q->route('resource');$m=$this->model($r);$item=$m::findOrFail($id);$item->update($q->validate($this->rules($r)));return $item;}
 public function destroy(Request $q,$id){$m=$this->model($q->route('resource'));$m::findOrFail($id)->delete();return response()->json(['message'=>'Deleted']);}
}

<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;use App\Models\User;use Illuminate\Http\Request;use Illuminate\Support\Facades\Hash;use Illuminate\Validation\ValidationException;
class AuthController extends Controller{
 public function login(Request $r){$data=$r->validate(['email'=>'required|email','password'=>'required|string']);$u=User::where('email',$data['email'])->first();if(!$u||!Hash::check($data['password'],$u->password))throw ValidationException::withMessages(['email'=>['Invalid email or password.']]);return response()->json(['token'=>$u->createToken('volleytrack-web')->plainTextToken,'user'=>$u]);}
 public function logout(Request $r){$r->user()->currentAccessToken()?->delete();return response()->json(['message'=>'Logged out']);}
}

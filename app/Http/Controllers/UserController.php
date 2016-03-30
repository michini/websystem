<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $usuarios = User::orderBy('id','ASC')->paginate(3);
        return view('users.index',compact('usuarios'));
    }

    public function create()
    {
        return $this->showRegistrationForm();
    }

    public function store(Request $request)
    {
        $user = new User();

        $v = Validator::make($request->all(),[
            "username"=>"required",
            "email"=>"required|email|unique:users",
            "rol"=>"required"
        ]);
        if($v->fails()){
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = bcrypt('123456');
        $user->remember_token = str_random(60);
        $user->save();
        $user->attachRole($request->get('rol'));

        return redirect()->route('admin.usuario.index');
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view('users.show',compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $roles = Role::select('id','name','display_name')->get();
        return view('users.edit',compact('usuario','roles'));
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $this->authorize('owneraccount',$usuario);
        $usuario->roles()->detach();
        $usuario->attachRole($request->get('rol'));
        $usuario->username = $request->get('username');
        $usuario->email = $request->get('email');
        $usuario->save();
        Flash::success("Datos actualizados");
        return redirect()->back();
    }

    public function destroy($id)
    {
        //
    }

    public function getResetPassword(){
        return view('users.resetpass');
    }

    public function postResetPassword(Requests\ResetRequest $request){

        $oldPassRepet = $request->get('password_confirmation');
        $newPass = $request->get('newPass');
        $error = "Tu contraseña actual no es correcta";
        $user = User::find($request->get('id'));
        if(!Hash::check($oldPassRepet,$user->password)){
            return redirect()->back()->withErrors($error);
        }
        $user->password = bcrypt($newPass);
        $user->save();

        return redirect()->to('/home');
    }

    public function userContracts($id){
        $contratos = Contrato::where('user_id',$id)->paginate(5);
        return view('contratos.index',compact('contratos'));
    }
}

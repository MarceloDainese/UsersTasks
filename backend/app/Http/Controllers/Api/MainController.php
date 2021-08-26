<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if(isset($users)){
            echo json_encode($users);
        } else {
            echo json_encode(['message' => 'Sem usuários Cadastrados']);
        }

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $adress = $request->input('adress');
        $phone = $request->input('phone');

        $checkEmail = User::where('email', $email)->first();

        if(!$checkEmail){
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = bcrypt($password);
            $user->adress = $adress;
            $user->phone = $phone;
            $user->save();
            if(isset($user)){
                echo response()->json(['message' => 'Inserido com sucesso.']);
            };
        }
        else {
            echo json_encode(['message' => 'Já existe um Usuário cadastrado com este email.']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = $request->query('id');
        $user = User::find($id);

        if(isset($user)){
             echo json_encode($user);
        } else {
             echo response()->json(['message' => 'Usuário não encontrado']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $adress = $request->input('adress');
        $phone = $request->input('phone');

        $id = $request->input('id');
        $user = User::find($id);

        $user = User::find($id);
        $user->name = $name;
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->adress = $adress;
        $user->phone = $phone;
        $user->save();
        if(isset($user)){
            echo json_encode(['message' => 'Alterado com sucesso']);
        };
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->query('id');
        $user = User::find($id);
        $user->delete();
        if(isset($user)){
            echo json_encode(['message' => 'Deletado com sucesso']);
        };
    }
}

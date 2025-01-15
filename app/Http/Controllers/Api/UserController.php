<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }

    public function show(user $user): JsonResponse
    {

        return response()->json([
            'status' => true,
            'user' => $user,
        ], 200);
    }

    public function store(Request $request)
    {
        // Inicia a transação
        DB::beginTransaction();

        try {
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => $request->password
            ]);

            //Confirma a transação
            DB::commit();


            return response()->json([
                'status' => true,
                'user' => $user,
                'message' => "Usuário cadastrado com sucesso!",
            ], 201);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => false,
                'message' => "Usuário não cadastrado!",
            ], 400);
        }
    }
}

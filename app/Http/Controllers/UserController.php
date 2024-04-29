<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index(): JsonResponse {
        $data = UserModel::all();
        return response()->json($data);
    }

    public function store(Request $request): JsonResponse {
        $this->validate($request, [
            "user_name" => "required",
            "user_email" => "required|email",
            "phone_number" => "required",
            "gender" => "required|in:male,female",
            "user_password" => "required",
        ]);

        $user = new UserModel();
        $user->user_name = $request->input("user_name");
        $user->user_email = $request->input("user_email");
        $user->phone_number = $request->input("phone_number");
        $user->gender = $request->input("gender");
        $user->user_password = $request->input("user_password");
        $user->save();
        $data = $user->refresh();

        return response()->json($data, 201);
    }

    public function show($id): JsonResponse {
        $data = UserModel::find($id);
        if (!$data) return response()->json(["error" => "User not found"], 404);

        return response()->json($data);
    }

    public function update(Request $request, $id): JsonResponse {
        $this->validate($request, [
            "username" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        return response()->json(["msg" => "update user success"]);
    }

    public function delete($id): JsonResponse {
        return response()->json(["msg" => "delete user"]);
    }
}

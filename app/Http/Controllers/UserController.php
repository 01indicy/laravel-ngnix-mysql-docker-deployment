<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function index(): JsonResponse {
        return response()->json(["msg" => "return all users"]);
    }

    public function store(Request $request): JsonResponse {
        $this->validate($request, [
            "username" => "required",
            "email" => "required|email",
            "password" => "required"
        ]);

        return response()->json(["msg" => "create user success"]);
    }

    public function show($id): JsonResponse {
        return response()->json(["msg" => "show user by id"]);
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

<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birthday' => 'required|date',
            'location' => 'required|string',

        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }


        $data['id'] = (string) \Illuminate\Support\Str::uuid();


        $user = User::create($data);

        return $this->sendResponse(new UserResource($user), 'User created.');
    }


    public function update(Request $request, User $user)
    {

        $input = $request->all();
        $validator = Validator::make($input, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'birthday' => 'required|date',
            'location' => 'required|string',
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $user->first_name = $input['first_name'];
        $user->last_name = $input['last_name'];
        $user->birthday = $input['birthday'];
        $user->save();

        return $this->sendResponse(new UserResource($user), 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return $this->sendResponse([], 'User deleted.');
    }
}

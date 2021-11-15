<?php

namespace App\Http\Controllers;

use App\BasicResource;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function isUserExists($id)
    {
        try {
            return User::where(['id'=>$id])->exists();
        }
        catch (\Exception $e)
        {
            return response()->json([
             'message'=>'user not found'
            ]);
        }
    }

    public function getUserById($id)
    {
        if ($this->isUserExist($id))
            return \App\Models\User::find($id);
        return null;
    }

    public function index()
    {
        \App\Models\User::chunk(10,function ($users){
            foreach ($users as $user)
            {
                return [
                    'name'=>$user->name,
                    'family'=>$user->family,
                    'codmeli'=>$user->codmeli,
                    'gender'=>$user->gender,
                    'birthday'=>$user->birthday,
                    'description'=>$user->description,
                    'state_id'=>$user->state_id,
                    'referral'=>$user->referral,
                    'mobile'=>$user->mobile,
                    'password'=>$user->password,
                    'remember_token'=>$user->remember_token,
                ];

            }
        });
    }


    public function create($data)
    {
//        return view('create.user',compact(['data']));
    }

    public function store(Request $request)
    {

//        $requestData = $request->all();
//        $newUser =\App\Models\User::create($requestData);
//        $message = 'Created';
//        $error = [];
//        return response(new BasicResource($newUser,$message,$error), 201);

        //OR

        $id=$request->id;
         if (!$this->isUserExists($id))
            {
                $this->create($request->all());
            }
         else
             return 'user already exists!';
    }



    public function show(Request $request,\App\Models\User $user)
    {
//        if (!$user)
//         {
//            return response(new BasicResource('','',''));
//         }
//        return response(new BasicResource($user));

        //OR

        $id=$request->id;
        if ($this->isUserExists($id))
        {
            $person=\App\Models\User::where(['id'=>$id])->first();
            return [
                'data'=>$person
            ];
        }
        return view('error.err');
    }



    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {
        if ($this->isUserExists($id))
        {
            $user=$this->getUserById($id);
            $data=$request->all();
            $user->update($data);
        }
        else
            return view('error.err');
    }


    public function destroy($id)
    {
//        $user=\App\Models\User::where(['id'=>$id])->first();
//        $user->delete();
        //OR
//        if ($this->isUserExists($id))
//        {
//             $result=\App\Models\User::destroy(['id'=>$id]);
//             return $result;
//        }
//        else
//            return  view('error.err');
//       //OR
       return $this->getUserById($id)->delete();
    }
}

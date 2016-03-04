<?php

namespace App\Http\Controllers;

use Gate;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Article;
use App\Custom\Responses;

class UserController extends AuthenticateController
{

    protected $apiResponse;

    public function __construct(\Custom\Responses\ApiResponse $apiResponse)
    {
       $this->middleware('jwt.auth', ['except' => ['test']]);
       $this->apiResponse = $apiResponse;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return $users;
    }

    public function test()
    {
        $users = User::all();
        return $this->apiResponse->sendResponse(200, "", $users);
    }


    /**
    * Getting the users articles
    *
    * 
    */
    public function usersArticles($id){
        $usersArticles = User::find($id)->articles()->get();
        return $usersArticles; 
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

        // look at: https://laracasts.com/discuss/channels/general-discussion/how-to-return-error-code-of-validation-fields-in-rest-api

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed.', 'reason' => $validator->errors()], 400);
        }
       
        $user = User::create($request->all());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $requestedUser = $user;

        if (Gate::denies('showuser', $requestedUser)){
            return response()->json(['error' => true, 'message' => 'Not allowed to view resource.'], 401);
        }
        return $user;
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => 'Validation failed.', 'reason' => $validator->errors()], 400);
        }
        
        $input = $request->all(); //if other validation $request->all(); could be used
        $user = User::findOrFail($id);
        $user->update($input);
        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        $message = array('message' => 'User with id $id successfully deleted.');
        return $message;
    }
}

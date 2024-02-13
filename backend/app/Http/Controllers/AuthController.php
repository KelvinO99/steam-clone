<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Developers;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string|min:6',  
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->createNewToken($token);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {

        // Richiede in input se sei un developer
        $is_developer = $request->input('is_developer');

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|between:5,30|unique:users',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create(array_merge(
                    $validator->validated(),
                    ['password' => bcrypt($request->password)]
                ));
                

        // Da qui si assegnerà il ruolo base di User
        $userRole = \App\Models\Role::where('name', 'user')->first(); // Qui metto il nome esatto del ruolo (In questo caso, user)
        $user->addRole($userRole); // Qui aggiungo il ruolo con addRole(nomeruolo) E NON attachRole()

        
        if ($is_developer) {
            $validator = Validator::make($request->all(), [
                'is_publisher' => 'required|boolean',
                'description' => 'string|nullable',
            ]);
            if($validator->fails()){
                return response()->json($validator->errors()->toJson(), 400);
            }

            $developer = Developers::create([
                'user_id' => $user->id,
                'is_publisher' => $request->is_publisher,
                'description' => $request->description
            ]);

            // Da qui si assegnerà il ruolo base di User
            $developerRole = \App\Models\Role::where('name', 'developer/publisher')->first(); // Qui metto il nome esatto del ruolo (In questo caso, developer)
            $user->addRole($developerRole); // Qui aggiungo il ruolo con addRole(nomeruolo) E NON attachRole()
        };



        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->createNewToken(auth()->refresh());
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function userProfile() {
        return response()->json(auth()->user());
    }
    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }
}
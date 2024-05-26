<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;

class login_registerController extends Controller
{

    public function index(){
        $registerUser = User::get();

        return response()->json([
            'status' => true,
            'message' => 'Data Ditemukan',
            'status' => $registerUser,
        ], 200);
    }

    public function apilogin(Request $request){
        if(Auth::attempt(['email' => $request->email,
                          'password' =>$request->password])){
            $user = Auth::user();
            $success['token'] = $user->createToken('auth_token')->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'status' => true,
                'message' => 'Login Sukses',
                'data' => $success
            ]);
        } else{
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal',
                'data' => null
            ]);
        }
    }

    public function show_login(){
        return view('login_register.layout.login');
    }

    public function Googlelogins(Request $request){
        // echo 'halooo';

        $input = $request->photoURL;
        // // Tampilkan seluruh input
        

        $registerUser = User::where('social_id', $request->uid)->first();

        if(!$registerUser){

            $user = User::updateOrCreate([
                'social_id' => $request->uid,
            ],[
                'name' => $request->displayName,
                'email' => $request->email,
                'no_telp' => $request->phone,
                'image' => $request->photoURL,
                'role' => 'user',
                'password' => 'user123',
            ]);

            Auth::login($user);
            return response()->json([
                'status' => 'success'
            ]);

        //     // return redirect()->route('dashboard');
        }
        

        Auth::login($registerUser);
        return response()->json([
            'status' => 'success'
        ]);

        // return redirect()->route('dashboard');


        // $checkuser = User::where('social_id', $request->uid)->first();
    
        // if($checkuser){
            // $checkuser->social_id = $request->uid;
            // $checkuser->name = $request->displayName;
            // $checkuser->email = $request->email;
            // $checkuser->no_telp = $request->phone; 
        //     $checkuser->save();
        //     Auth::loginUsingId($checkuser->id, true); // Gunakan $checkuser->id untuk login
        //     return response()->json([
        //         'status' => 'success'
        //     ]);
        // } else {
        //     $user = new User;
        //     $user->social_id = $request->uid;
        //     $user->name = $request->displayName;
        //     $user->email = $request->email; // Gunakan atribut email yang sesuai dari respons OAuth
        //     $user->no_telp = $request->phone; // Gunakan atribut telepon yang sesuai dari respons OAuth
        //     $user->save();
        //     Auth::loginUsingId($user->id, true); // Gunakan $user->id untuk login
        //     return response()->json([
        //         'status' => 'success',
        //         "user" => $user
        //     ]);
        // }   
    }
}

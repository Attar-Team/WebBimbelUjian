<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
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

    public function apiinsert_akun_google(Request $request){
        
        $user = new User;

        $rules = [
            'social_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'no_telp' => 'nullable',
            'image' => 'nullable',
            'role' => 'required',
            'password' => 'required',
        ];

        $validasi = Validator::make($request->all(), $rules);
        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukan data',
                'data' => $validasi->errors()
            ]);
        }

        $user->social_id = $request->uid;
        $user->name = $request->displayName;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->image = $request->image;
        $user->role = $request->role;
        $user->password = $request->password;

        $post = $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan data',

        ]);
    }

    public function api_editprofile(Request $request,  $id){
        $user = User::find($id);

        if(empty($user)){
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'name' => 'required',
            'no_telp' => 'required',
            'image' => 'required',
        ];

        $validasi = Validator::make($request->all(), $rules);
        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal Melakukan update profile',
                'data' => $validasi->errors()
            ]);
        }

        $user->name = $request->name;
        $user->no_telp = $request->no_telp;
        $user->image = $request->image;

        $post = $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil melakukan update profile',

        ]);

    }

    public function api_register(Request $request){
        $user = new User;

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'no_telp' => 'nullable',
            'image' => 'nullable',
            'role' => 'required',
            'password' => 'required',
        ];

        $validasi = Validator::make($request->all(), $rules);
        if($validasi->fails()){
            return response()->json([
                'status' => false,
                'message' => 'Gagal Memasukan data',
                'data' => $validasi->errors()
            ]);
        }

        $user->name = $request->displayName;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->image = $request->image;
        $user->role = $request->role;
        $user->password = $request->password;

        $post = $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil menambahkan data',

        ]);
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

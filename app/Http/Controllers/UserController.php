<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cart;
use Hash;
use Auth;
use JWTAuth;
use JWTException;
use Carbon\Carbon;

use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;

class UserController extends Controller
{

    public function getAllUser(Request $request)
    {
        $users = User::all();
        return response()->json($users);
    }

    public function getUser(Request $request, $id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updateUser(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);
        $input['password'] = $user->password;
        $user->update($input);
        return $user;
    }

    public function deleteUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return 'Berhasil menghapus user';
    }

    public function register(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['level'] = 'user';
        $user = User::create($input);
        return $user;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // if (!$user || !Hash::check($credentials['password'], $user->password)) {
        //     return response()->json(['error' => 'Invalid credentials'], 401);
        // }
        // return response()->json(['token' => $user->token], 200);
        // return $credentials;
        if (!$jwt_token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ]);
        }
        $user = User::where('email', $credentials['email'])->first();
        return response()->json([
            'success' => true,
            'message' => 'Login Success',
            'token' => $jwt_token,
            'user' => JWTAuth::user()
        ]);
    }

    public function updateProfile()
    {
        // $user = User::where('id', Auth::user()->id)->first();
        $user = JWTAuth::user();
        $user->update($request->all());
        return response()->json([
            'success' => 1,
            'message' => 'Profile updated successfully',
            'data' => $user
        ]);
    }

    public function checkProfile(Request $request)
    {
        $user = JWTAuth::user();
        return $user;
    }

    public function getAuthenticatedUser()
    {

        return User::where('id', '1')->first();

        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json($user); // nanti pake ini
    }

    // BISA JUGA
    // public function profile()
    // {
    //     $user = JWTAuth::parseToken()->authenticate();
    //     return $user;
    // }

    // public function timeBomb()
    // {
    //     config(['app.locale' => 'id']);
    //     if (Carbon::now('Asia/Jakarta')->format('H:i:s') >= '20:00:00') {
    //         Cart::truncate();
    //         return response()->json([
    //             'mesage' => 'Data keranjang berhasil dihapus. Have a nice day.',
    //             'cart' => Cart::all()
    //         ]);
    //     }
    // }


    public function getProvince()
    {
        $provinces = Province::get();
        return $provinces;
    }

    public function getRegency(Request $request)
    {
        $regencies = Regency::where('province_id', $request->province_id)->get();
        return $regencies;
    }

    public function getDisctrict(Request $request)
    {
        $districts = District::where('regency_id', $request->regency_id)->get();
        return $districts;
    }

    public function getVillage(Request $request)
    {
        $villages = Village::where('district_id', $request->district_id)->get();
        return $villages;
    }
}

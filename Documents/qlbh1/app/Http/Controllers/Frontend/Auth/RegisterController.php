<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Model\User;
use App\UserAddress;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'province_id' => ['required', 'numeric'],
            'district_id' => ['required', 'numeric'],
            'ward_id' => ['required', 'numeric'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $user->address()->saveMany([
                new UserAddress(
                    array_merge(
                        request()->only(
                            'province_id', 'district_id',
                            'ward_id', 'address', 'phone'
                        ),
                        ['is_default' => true]
                    )
                )
            ]);
            DB::commit();
        } catch (\Exception $exception) {
            Alert::error('Có lỗi xảy ra!');
            DB::rollBack();
        }
        Alert::success('Thành công!');
        return $user;
    }

    public function showRegistrationForm()
    {
        return view('frontend.auth.register');
    }
}

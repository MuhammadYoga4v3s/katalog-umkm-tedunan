<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellerAccountController extends Controller
{
    /**
     * Menampilkan daftar akun seller.
     */
    public function index()
    {
        $sellers = User::where('role', 'seller')
            ->with([
                'seller',
                'seller.businessCategory',
            ])
            ->get();

        $categories = \App\Models\BusinessCategory::all();

        return view(
            'admin.akun-penjual.index',
            compact('sellers', 'categories')
        );
    }


    /**
     * Membuat akun seller baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],

            'password' => 'required|string|min:8',

            'business_name' => 'required|string|max:255',

            'business_category_id' => [
                'required',
                'exists:business_categories,id',
            ],
        ]);


        DB::transaction(function () use ($request) {

            /*
            |--------------------------------------------------------------------------
            | Buat akun user
            |--------------------------------------------------------------------------
            */

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'seller',
                'status' => 'active',
            ]);


            /*
            |--------------------------------------------------------------------------
            | Buat profil seller
            |--------------------------------------------------------------------------
            */

            Seller::create([
                'user_id' => $user->id,

                'business_category_id'
                    => $request->business_category_id,

                'owner_name'
                    => $request->name,

                'business_name'
                    => $request->business_name,

                'phone' => '-',

                'address' => 'Belum diisi',

                'rt' => '-',

                'rw' => '-',

                'verification_status' => 'approved',

                'verified_at' => now(),
            ]);
        });


        return redirect()
            ->route('admin.akun-penjual.index')
            ->with(
                'success',
                'Akun penjual berhasil dibuat!'
            );
    }


    /**
     * Mengubah status akun seller.
     */
    public function update(
        Request $request,
        string $id
    ) {

        $request->validate([
            'status' => 'required|in:active,inactive',
        ]);


        $user = User::where('role', 'seller')
            ->findOrFail($id);


        $user->status = $request->status;

        $user->save();


        $statusText = $request->status === 'active'
            ? 'diaktifkan'
            : 'dinonaktifkan';


        return redirect()
            ->route('admin.akun-penjual.index')
            ->with(
                'success',
                "Akun penjual berhasil {$statusText}!"
            );
    }


    /**
     * Menghapus akun seller.
     */
    public function destroy(string $id)
    {
        $user = User::where('role', 'seller')
            ->findOrFail($id);

        $user->delete();


        return redirect()
            ->route('admin.akun-penjual.index')
            ->with(
                'success',
                'Akun penjual berhasil dihapus!'
            );
    }
}
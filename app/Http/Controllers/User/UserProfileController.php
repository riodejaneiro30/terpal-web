<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserProfile;

class UserProfileController extends Controller
{
    public function edit(User $user)
    {
        $userProfile = $user->profile;

        return view('userprofile.edit', compact('userProfile'));
    }

    public function update(Request $request, $user_id)
    {
        $userProfile = UserProfile::where('user_id', $user_id)->first();
        if ($userProfile) {
            $userProfile->update([
                'phone_number' => $request->phone_number,
                'address' => $request->address,
                'date_of_birth' => $request->date_of_birth,
                'gender' => $request->gender,
                'updated_at' => now()
            ]);
        }

        // Redirect dengan menyertakan parameter user
        return redirect()->route('userprofile.edit', ['user' => $user_id])->with('success', 'Profil user berhasil diupdate');
    }
}

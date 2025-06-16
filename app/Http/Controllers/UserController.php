<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->type;
        if ($type == 'agency') {
            $users = User::where('user_type', 1)->get();
        } else {
            $users = User::where('user_type', 0)->get();
        }

        return view('admin.pages.users.index', compact('users', 'type'));
    }

    public function updateApprovalStatus(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Toggle the is_active field
        $user->is_active = $user->is_active == 0 ? 1 : 0;
        $user->save();

        // Redirect back or return a response as needed
        $output = [
            'success' => true,
            'msg' => 'User approval status updated successfully.',
        ];
        return redirect()->back()->with('status', $output);
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();

            $output = [
                'success' => true,
                'msg' => 'User deleted successfully',
            ];

            return redirect()->route('users.index')->with('status', $output);
        } catch (\Exception $e) {
            $output = [
                'success' => false,
                'msg' => 'Failed to delete user. Error: ' . $e->getMessage(),
            ];

            return redirect()->route('users.index')->with('status', $output);
        }
    }
}

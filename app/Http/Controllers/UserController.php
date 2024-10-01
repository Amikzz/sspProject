<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::paginate(10);

            return view('users.index', compact('users'));
        } catch (Exception $e) {
            Log::error('Error fetching users: ' . $e->getMessage());
            return redirect()->route('users.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error fetching users.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'password' => 'nullable|string|min:8',
                'address' => 'nullable|string|max:255',
                'gender' => 'nullable',
                'phone' => 'nullable|string|max:255',
            ]);

            $user->update($validated);

            return redirect()->route('users.index')
                ->with('flash.banner', 'User updated successfully.');
        } catch (ModelNotFoundException $e) {
            Log::error('User not found: ' . $e->getMessage());
            return redirect()->route('users.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'User not found.');
        } catch (QueryException $e) {
            Log::error('Database error while updating user: ' . $e->getMessage());
            return redirect()->route('users.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error updating user. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while updating user: ' . $e->getMessage());
            return redirect()->route('users.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\SkillSharer;
use App\Http\Requests\StoreSkillSharerRequest;
use App\Http\Requests\UpdateSkillSharerRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\select;

class SkillSharerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $skills = Skill::all();
            // Fetch skill sharers along with their related user details
            $skillSharers = SkillSharer::with('user')->paginate(10);

            // This will include user details for each skill sharer
            return view('skillsharers.index', compact('skillSharers', 'skills'));
        } catch (Exception $e) {
            // Log the error and return with an error message
            Log::error('Error fetching skillsharers: ' . $e->getMessage());
            return redirect()->route('skillsharers.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error fetching skills or categories.');
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
    public function store(StoreSkillSharerRequest $request)
    {
        try {
            // Step 1: Validate user data
            $validatedUser = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:6',
                'phone' => 'required|string|max:15',
                'address' => 'nullable|string|max:255',
                'gender' => 'required|string|in:male,female,other',
            ]);

            //hash the password
            $validatedUser['password'] = Hash::make($validatedUser['password']);

            $validatedUser['userType'] = 'suser';

            // Step 2: Create the user and retrieve the user_id
            $userId = DB::table('users')->insertGetId($validatedUser);

            // Step 3: Validate skill sharer data
            $validatedSkillSharer = $request->validate([
                'skills' => 'required',
                'skill_level' => 'required|string|max:255',
                'years_of_experience' => 'required|integer|min:0',
                'availability' => 'required|string|max:255',
            ]);

            // Step 4: Create skill sharer entry
            SkillSharer::create([
                'user_id' => $userId,
                'skills' => json_encode($validatedSkillSharer['skills']), // Store skills as JSON
                'skill_level' => $validatedSkillSharer['skill_level'],
                'years_of_experience' => $validatedSkillSharer['years_of_experience'],
                'availability' => $validatedSkillSharer['availability'],
            ]);

            // Redirect with success message
            return redirect()->route('skillsharers.index')
                ->with('flash.banner', 'Skill Sharer created successfully.');

        }
        catch (QueryException $e) {
            // Handle database-related exceptions
            Log::error('Database error while creating skill sharer: ' . $e->getMessage());
            return redirect()->route('skillsharers.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error creating skill sharer. Please try again.');
        } catch (Exception $e) {
            // Handle general exceptions
            Log::error('Unexpected error while creating skill sharer: ' . $e->getMessage());
            return redirect()->route('skillsharers.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillSharerRequest $request, SkillSharer $skillSharer)
    {
//        try {
//            // Validate incoming request data
//            $validatedUserData = $request->validate([
//                'name' => 'required|string|max:255',
//                'email' => 'required|email|max:255',
//                'phone' => 'nullable|string|max:20',
//                'address' => 'nullable|string|max:255',
//                'gender' => 'nullable|string|max:10',
//            ]);
//
//            $validatedSkillSharerData = $request->validate([
//                'skills' => 'nullable|json',
//                'skill_level' => 'nullable|string|max:255',
//                'years_of_experience' => 'nullable|integer',
//                'availability' => 'nullable|string|max:255',
//            ]);
//
//            // Update user data in the users table
//            $user = User::findOrFail($skillSharer->user_id);
//            $user->update($validatedUserData);
//
//            // Update skill sharer data in the skill_sharers table
//            $skillSharer->update($validatedSkillSharerData);
//
//            return redirect()->route('skillsharers.index')
//                ->with('flash.banner', 'Skill Sharer updated successfully.');
//        } catch (ModelNotFoundException $e) {
//            Log::error('Skill Sharer not found: ' . $e->getMessage());
//            return redirect()->route('skill_sharers.index')
//                ->with('flash.bannerStyle', 'danger')
//                ->with('flash.banner', 'Skill Sharer not found.');
//        } catch (QueryException $e) {
//            Log::error('Database error while updating skill sharer: ' . $e->getMessage());
//            return redirect()->route('skill_sharers.index')
//                ->with('flash.bannerStyle', 'danger')
//                ->with('flash.banner', 'Error updating skill sharer. Please try again.');
//        } catch (Exception $e) {
//            Log::error('Unexpected error while updating skill sharer: ' . $e->getMessage());
//            return redirect()->route('skill_sharers.index')
//                ->with('flash.bannerStyle', 'danger')
//                ->with('flash.banner', 'Unexpected error. Please try again.');
//        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SkillSharer $skillSharer)
    {
        //
    }

}

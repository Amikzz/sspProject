<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Exception;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();
            $skills = Skill::paginate(10);

            return view('skills.index', compact('skills', 'categories'));
        } catch (Exception $e) {
            Log::error('Error fetching skills or categories: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error fetching skills or categories.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        try {
            $validated = $request->validated();

            //slug creation
            $validated['slug'] = \Str::slug($validated['name']);

            Skill::create($validated);

            return redirect()->route('skills.index')
                ->with('flash.banner', 'Skill created successfully.');
        } catch (QueryException $e) {
            Log::error('Database error while creating skill: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error creating skill. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while creating skill: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        try {
            $validated = $request->validated();

            //slug creation
            if ($skill->name !== $validated['name']) {
                $validated['slug'] = \Str::slug($validated['name']);
            }

            $skill->update($validated);

            return redirect()->route('skills.index')
                ->with('flash.banner', 'Skill updated successfully.');
        } catch (ModelNotFoundException $e) {
            Log::error('Skill not found: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Skill not found.');
        } catch (QueryException $e) {
            Log::error('Database error while updating skill: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error updating skill. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while updating skill: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        try {
            $model = $skill;
            $skill->delete();

            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Skill ' . $model->name . ' deleted successfully.');
        } catch (ModelNotFoundException $e) {
            Log::error('Skill not found: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Skill not found.');
        } catch (QueryException $e) {
            Log::error('Database error while deleting skill: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Error deleting skill. Please try again.');
        } catch (Exception $e) {
            Log::error('Unexpected error while deleting skill: ' . $e->getMessage());
            return redirect()->route('skills.index')
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', 'Unexpected error. Please try again.');
        }
    }
}

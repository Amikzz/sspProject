<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use GuzzleHttp\Promise\Create;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('skills.index', [
            'skills' => Skill::paginate(10),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSkillRequest $request)
    {
        $validated = $request->validated();

        //slug creation
        $validated['slug'] = \Str::slug($validated['name']);

        Skill::create($validated);

        return redirect()->route('skills.index')
            ->with('flash.banner', 'Skill created successfully.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $validated = $request->validated();

        //slug update
        $validated['slug'] = \Str::slug($validated['name']);
        $skill->update($validated);

        return redirect()->route('skills.index')
            ->with('flash.banner', 'Skill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        $model = $skill;
        $skill->delete();

        session()->flash('flash.bannerStyle', 'danger');
        return redirect()->route('skills.index')
            ->with('flash.banner', 'Skill ' .$model->name. ' deleted successfully.');
    }
}

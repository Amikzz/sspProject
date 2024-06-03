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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('skills.create');
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
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return view('skills.view', [
            'skill' => $skill,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skill $skill)
    {
        return view('skills.edit', [
            'skill' => $skill,
        ]);
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

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillAPIController extends Controller
{
    //fetch all skills
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'All Skills',
            'data' => Skill::all()
        ], 200);
    }

    //create a new skill
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255',
                    'priceperhour' => 'nullable|integer',
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $skill = new Skill([
                'name' => $request->name,
                'description' => $request->description,
                'priceperhour' => $request->priceperhour,
                'slug' => \Str::slug($request['name'])
            ]);

            if ($skill->save()) {
                return response()->json([
                    'status' => true,
                    'message' => 'Skill created successfully',
                    'data' => $skill
                ], 201);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    //fetch a single skill
    public function show($id)
    {
        try {
            $skill = Skill::find($id);

            if ($skill) {
                return response()->json([
                    'status' => true,
                    'message' => 'Skill found',
                    'data' => $skill
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Skill not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    //update a skill
    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(),
                [
                    'name' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255',
                    'priceperhour' => 'nullable|integer',
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors(),
                ], 422);
            }

            $skill = Skill::find($id);

            if ($skill) {
                $skill->name = $request->name;
                $skill->description = $request->description;
                $skill->priceperhour = $request->priceperhour;
                $skill->slug = \Str::slug($request['name']);

                if ($skill->save()) {
                    return response()->json([
                        'status' => true,
                        'message' => 'Skill updated successfully',
                        'data' => $skill
                    ], 200);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Skill not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }

    //delete a skill
    public function destroy($id)
    {
        try {
            $skill = Skill::find($id);

            if ($skill) {
                $skill->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Skill deleted successfully'
                ], 200);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Skill not found'
                ], 404);
            }
        } catch (\Exception $exception) {
            return response()->json([
                'status' => false,
                'message' => $exception->getMessage()
            ], 500);
        }
    }
}

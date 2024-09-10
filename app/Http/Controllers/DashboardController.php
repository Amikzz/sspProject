<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User Model
use App\Models\Skill; // Import Skill Model

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the required data
        $totalSkills = Skill::count(); // Assuming you have a Skill model
        $totalUsers = User::count(); // Assuming you have a User model
        $totalEarnings = Skill::sum('priceperhour'); // Calculate the total of priceperhour in the skills table

        $recentActivities = [
            ['message' => 'Skill "React" was added', 'timestamp' => '2 hours ago'], // Example data
            // Add more recent activities dynamically
        ];

        // Pass the data to the view
        return view('dashboard', compact('totalSkills', 'totalUsers', 'totalEarnings', 'recentActivities'));
    }
}


<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User Model
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

// Import Skill Model

class DashboardController extends Controller
{
    public function index()
    {
        //if user is a=not an admin show an error message invalid login
        if (auth()->user()->userType == 'sadmin') {
            // Fetch the required data
            $username = User::first()->name; // Get the name of the first user
            $role = User::first()->userType; // Get the role of the first user
            $totalSkills = Skill::count(); // Assuming you have a Skill model
            $totalUsers = User::count(); // Assuming you have a User model
            $totalsadmin = User::where('userType', 'sadmin')->count(); // Assuming you have a User model
            $totaladmin = User::where('userType', 'admin')->count(); // Assuming you have a User model
            $totalcustomer = User::where('userType', 'user')->count(); // Assuming you have a User model
            $totalEarnings = Skill::sum('priceperhour'); // Calculate the total of priceperhour in the skills table

            $recentActivities = [
                ['message' => 'Skill "React" was added', 'timestamp' => '2 hours ago'], // Example data
                // Add more recent activities dynamically
            ];

            // Pass the data to the view
            return view('dashboard', compact( 'username', 'totalSkills', 'totalUsers', 'totaladmin', 'totalsadmin', 'totalcustomer', 'totalEarnings', 'recentActivities', 'role'));
        } else{
            Auth::guard('web')->logout();
            return redirect()->route('home')->with('error', 'Invalid login');
        }


    }
}


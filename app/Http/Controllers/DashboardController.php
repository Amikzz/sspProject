<?php

// app/Http/Controllers/DashboardController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User Model
use App\Models\Skill;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the currently authenticated user
        $loggedInUser = auth()->user();

        // Check if the logged-in user is 'sadmin'
        if ($loggedInUser->userType == 'sadmin') {
            // Fetch the required data
            $username = $loggedInUser->name; // Get the name of the logged-in user
            $role = $loggedInUser->userType; // Get the role of the logged-in user
            $totalSkills = Skill::count(); // Assuming you have a Skill model
            $totalUsers = User::count(); // Assuming you have a User model
            $totalsadmin = User::where('userType', 'sadmin')->count(); // Count the total number of super admins
            $totaladmin = User::where('userType', 'admin')->count(); // Count the total number of admins
            $totalcustomer = User::whereIn('userType', ['user', 'suser'])->count(); // Count the total number of users and susers
            $totalEarnings = Skill::sum('priceperhour'); // Calculate the total price per hour in the skills table

            // Pass the data to the view
            return view('dashboard', compact('username', 'totalSkills', 'totalUsers', 'totaladmin', 'totalsadmin', 'totalcustomer', 'totalEarnings', 'role'));

        } elseif ($loggedInUser->userType == 'admin') {
            // Fetch the required data for admin
            $username = $loggedInUser->name; // Get the name of the logged-in user
            $role = $loggedInUser->userType; // Get the role of the logged-in user
            $totalSkills = Skill::count(); // Assuming you have a Skill model
            $totalUsers = User::count(); // Assuming you have a User model
            $totalsadmin = User::where('userType', 'sadmin')->count(); // Count the total number of super admins
            $totaladmin = User::where('userType', 'admin')->count(); // Count the total number of admins
            $totalcustomer = User::where('userType', 'user')->count(); // Count the total number of users
            $totalEarnings = Skill::sum('priceperhour'); // Calculate the total price per hour in the skills table

            // Pass the data to the view
            return view('dashboard', compact('username', 'totalSkills', 'totalUsers', 'totaladmin', 'totalsadmin', 'totalcustomer', 'totalEarnings', 'role'));

        } else {
            // Logout and redirect if the user type is neither 'sadmin' nor 'admin'
            Auth::guard('web')->logout();
            return redirect()->route('home')->with('error', 'Invalid login');
        }
    }
}

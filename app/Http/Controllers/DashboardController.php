<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {

            $totalJobs = Job::count();

            $activeJobs = Job::where('status', 1)->count();

            $pendingJobs = Job::where('status', 0)->count();

            $premiumJobs = Job::where('is_premium', 1)->count();

            $totalUsers = User::count();

            $totalEmployers = User::where('role', 'employer')->count();

            $totalCategories = Category::count();

            $latestJobs = Job::latest()
                ->take(5)
                ->get();
        } else {

            $totalJobs = Job::where('user_id', $user->id)->count();

            $activeJobs = Job::where('user_id', $user->id)
                ->where('status', 1)
                ->count();

            $pendingJobs = Job::where('user_id', $user->id)
                ->where('status', 0)
                ->count();

            $premiumJobs = Job::where('user_id', $user->id)
                ->where('is_premium', 1)
                ->count();

            $totalUsers = 0;
            $totalEmployers = 0;
            $totalCategories = 0;

            $latestJobs = Job::where('user_id', $user->id)
                ->latest()
                ->take(5)
                ->get();
        }

        return view('admin.dashboard', compact(
            'totalJobs',
            'activeJobs',
            'pendingJobs',
            'premiumJobs',
            'totalUsers',
            'totalEmployers',
            'totalCategories',
            'latestJobs'
        ));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('category')
                    ->latest()
                    ->paginate(10);

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.jobs.create',
            compact('categories')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'           => 'required|max:255',
            'company'         => 'required|max:255',
            'category_id'     => 'required',
            'education'       => 'required',
            'experience'      => 'required',
            'gender'          => 'required',
            'location'        => 'required|max:255',
            'description'     => 'required',
            'requirements'    => 'required',
            'contact_email'   => 'required|email',
            'expired_at'      => 'required|date',
            'logo'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $logo = null;

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo')
                            ->store('jobs', 'public');

        }

        Job::create([

            'title'           => $request->title,
            'slug'            => Str::slug($request->title),

            'company'         => $request->company,
            'logo'          => $logo,

            'category_id'     => $request->category_id,

            'education'       => $request->education,
            'experience'      => $request->experience,
            'gender'          => $request->gender,

            'location'        => $request->location,
            'address'         => $request->address,

            'salary_min'      => $request->salary_min,
            'salary_max'      => $request->salary_max,

            'description'     => $request->description,
            'requirements'    => $request->requirements,

            'contact_email'   => $request->contact_email,
            'contact_phone'   => $request->contact_phone,

            'is_premium'      => $request->is_premium,
            'status'          => $request->status,

            'expired_at'      => $request->expired_at,

            'views'           => 0,

            'user_id'         => Auth::id(),
        ]);

        return redirect()
            ->route('jobs.index')
            ->with(
                'success',
                'Lowongan berhasil ditambahkan.'
            );
        }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.jobs.edit',
            compact('job', 'categories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        
        $request->validate([
            'title' => 'required|max:255',
            'company' => 'required|max:255',
            'category_id' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'gender' => 'required',
            'location' => 'required|max:255',
            'description' => 'required',
            'requirements' => 'required',
            'contact_email' => 'required|email',
            'expired_at' => 'required|date',
            'logo' => 'nullable|image|mimes,jpeg,png,webp|max:2048',
        ]);

        $logo = $job->logo;

        if ($request->hasFile('logo')) {

            if ($job->logo && Storage::disk('public')->exists($job->logo)) {
                Storage::disk('public')->delete($job->logo);
            }

            $logo = $request->file('logo')
                            ->store('jobs', 'public');
        }
        
        $job->update([

            'title'           => $request->title,
            'slug'            => Str::slug($request->title),

            'company'         => $request->company,
            'logo'            => $logo,

            'category_id'     => $request->category_id,

            'education'       => $request->education,
            'experience'      => $request->experience,
            'gender'          => $request->gender,

            'location'        => $request->location,
            'address'         => $request->address,

            'salary_min'      => $request->salary_min,
            'salary_max'      => $request->salary_max,

            'description'     => $request->description,
            'requirements'    => $request->requirements,

            'contact_email'   => $request->contact_email,
            'contact_phone'   => $request->contact_phone,

            'is_premium'      => $request->is_premium,
            'status'          => $request->status,

            'expired_at'      => $request->expired_at,
        ]);
        //dd($result);
        return redirect()
            ->route('jobs.index')
            ->with(
                'success',
                'Lowongan berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        if ($job->logo &&
            Storage::disk('public')->exists($job->logo))
        {
            Storage::disk('public')->delete($job->logo);
        }

        $job->delete();

        return redirect()
            ->route('jobs.index')
            ->with(
                'success',
                'Lowongan berhasil dihapus.'
            );
    }
}

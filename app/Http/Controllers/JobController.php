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
        if (auth()->user()->role == 'admin') {

            $jobs = Job::with('category')
                        ->latest()
                        ->paginate(10);

        } else {

            $jobs = Job::with('category')
                        ->where('user_id', auth()->id())
                        ->latest()
                        ->paginate(10);
        }

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
        $rules = [
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
            'logo'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        if (Auth::user()->role == 'admin') {
            $rules['expired_at'] = 'required|date';
        }

        $request->validate($rules);

        $logo = null;

        if ($request->hasFile('logo')) {

            $logo = $request->file('logo')
                            ->store('jobs', 'public');

        }

        $isAdmin = Auth::user()->role === 'admin';
        $isPremium = $isAdmin ? $request->is_premium : 0;
        $status    = $isAdmin ? $request->status : 0;
        $expiredAt = $isAdmin ? $request->expired_at : now()->addDays(30);

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

            'is_premium'      => $isPremium,
            'status'          => $status,

            'expired_at'      => $expiredAt,

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
        if (
            Auth::user()->role !== 'admin'
            && $job->user_id != Auth::id()
        ) {
            abort(403);
        }

        return view(
            'admin.jobs.show',
            compact('job')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $job->user_id != auth()->id()
        ) {
            abort(403);
        }

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
        
        if (
            auth()->user()->role !== 'admin' &&
            $job->user_id != auth()->id()
        ) {
            abort(403);
        }
        $rules = [
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
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];

        if (auth()->user()->role == 'admin') {
            $rules['expired_at'] = 'required|date';
        }

        $request->validate($rules);

        $logo = $job->logo;

        if ($request->hasFile('logo')) {

            if ($job->logo && Storage::disk('public')->exists($job->logo)) {
                Storage::disk('public')->delete($job->logo);
            }

            $logo = $request->file('logo')
                            ->store('jobs', 'public');
        }
        
        $isPremium = auth()->user()->role == 'admin'
            ? $request->is_premium
            : $job->is_premium;

        $status = auth()->user()->role == 'admin'
            ? $request->status
            : $job->status;

        $expiredAt = auth()->user()->role == 'admin'
            ? $request->expired_at
            : $job->expired_at;
            
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

            'is_premium'      => $isPremium,
            'status'          => $status,

            'expired_at'      => $expiredAt,
        ]);
        //dd($result);
        return redirect()
            ->route('jobs.index')
            ->with(
                'success',
                'Lowongan berhasil diperbarui.'
            );
    }

    public function activate(Job $job)
    {
        $job->update([
            'status' => 1
        ]);

        return back()->with(
            'success',
            'Lowongan berhasil diaktifkan.'
        );
    }

    public function deactivate(Job $job)
    {
        $job->update([
            'status' => 2
        ]);

        return back()->with(
            'success',
            'Lowongan berhasil dinonaktifkan.'
        );
    }

    public function premium(Job $job)
    {
        $job->update([
            'is_premium' => true
        ]);

        return back()->with(
            'success',
            'Lowongan berhasil dijadikan premium.'
        );
    }

    public function unpremium(Job $job)
    {
        $job->update([
            'is_premium' => false
        ]);

        return back()->with(
            'success',
            'Status premium berhasil dibatalkan.'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        if (
            auth()->user()->role !== 'admin' &&
            $job->user_id != auth()->id()
        ) {
            abort(403);
        }

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

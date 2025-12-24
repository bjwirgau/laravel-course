<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Job;

class JobController extends Controller
{
    use AuthorizesRequests;

    /**
     * @desc Show all job listings
     * @route GET /jobs
     * @return View
     */
    public function index(): View
    {
        $jobs = Job::all();

        return view('jobs.index')->with('jobs', $jobs);
    }

    /**
     * @desc Show create job form
     * @route GET /jobs/create
     * @return View
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }   

        return view('jobs.create');
    }

    /**
     * @desc Save job to database
     * @route POST /jobs
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $this->validatedData($request);

        //Hardcoded user ID
        $validatedData['user_id'] = auth()->user()->id;

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Store the image and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add path to validated data
            $validatedData['company_logo'] = $path;
        }

        // Submit to database
        Job::create($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    /**
     * @desc Show job details
     * @param Job $job
     * @route GET /jobs/{$id}
     * @return View
     */
    public function show(Job $job): View
    {
        return view('jobs.show')->with('job', $job);
    }

    /**
     * @desc Show job edit form
     * @route GET /jobs/{$id}/edit
     * @return View
     */
    public function edit(Job $job): View
    {
        // Check if user is authorized to edit the job
        $this->authorize('update', $job);

        return view('jobs.edit')->with('job', $job);
    }

    /**
     * @desc Update job in database
     * @param Request $request
     * @param Job $job
     * @route PUT /jobs/{$id}
     * @return RedirectResponse
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        // Check if user is authorized to edit the job
        $this->authorize('update', $job);

        $validatedData = $this->validatedData($request);

        // Check for image
        if ($request->hasFile('company_logo')) {
            // Delete old logo
           $this->deleteLogo($job->company_logo);
            
            // Store the image and get path
            $path = $request->file('company_logo')->store('logos', 'public');

            // Add path to validated data
            $validatedData['company_logo'] = $path;
        }

        // Submit to database
        $job->update($validatedData);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    /**
     * @desc Delete job from database
     * @route DELETE /jobs/{job}
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        // Check if user is authorized to delete the job
        $this->authorize('delete', $job);

        if ($job->company_logo) {
            $this->deleteLogo($job->company_logo);
        }

        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    /**
     * @desc Validate job data
     * @param Request $request
     * @return array
     */
    protected function validatedData(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|integer',
            'tags' => 'nullable|string',
            'job_type' => 'required|string',
            'remote' => 'required|boolean',
            'requirements' => 'nullable|string',
            'benefits' => 'nullable|string',
            'address' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'company_name' => 'required|string',
            'company_description' => 'nullable|string',
            'company_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_website' => 'nullable|url',
        ]);
    }

    /**
     * @desc Delete logo from storage
     * @param string $companyLogoPath
     * @return void
     */
    protected function deleteLogo(string $companyLogoPath): void
    {
        if (file_exists(public_path('storage/' . $companyLogoPath))) {
            unlink(public_path('storage/' . $companyLogoPath));
            Storage::delete('public/logos' . baseName($companyLogoPath));
        }
    }
}

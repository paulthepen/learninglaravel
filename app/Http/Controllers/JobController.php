<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(3); //latest() adds an order by desc
        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create() {
        return view('jobs.create');
    }

    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }

    public function store() {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs');
    }

    public function edit(Job $job) {
/*      Don't need this with the gate. The gate automatically fails logged out users
        if (Auth::guest()) {
            return redirect('/login');
        }
*/

//        Added middleware (see web.php), so I don't need this
//        Gate::authorize('edit-job', $job); //automatically aborts w/ 403

/*      Instead of using a gate, we can use the User->can()/cannot() method.
        if (Auth::user()->cannot('edit-job', $job)) {
            return redirect('/login');
        };
*/

/*      Other option w/ more control
        if(Gate::denies('edit-job', $job)) {
            return "You shall not pass!";
        }
*/

        return view('jobs.edit', ['job' => $job]);
    }

    public function update($id) {
        // authorize (on hold...)
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);
        $job = Job::findOrFail($id); //throws and exception if not found. replace the need for a if(!$job)
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect('/jobs/' . $id);
    }

    public function destroy($id) {
        Job::find($id)?->delete();
        return redirect('/jobs');
    }
}

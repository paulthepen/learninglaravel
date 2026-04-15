<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class JobPolicy
{
    //policies are connected to models and determine what kind of authorizations must be performed
    public function edit(User $user, Job $job): bool
    {
        return $job->employer->user->is($user);
    }
}

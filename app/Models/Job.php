<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model {
    use HasFactory;

    protected $table = 'job_listings'; //(Optional) Specify the table name in the event that class doesn't follow table name
//    protected $fillable = ['title', 'salary', 'employer_id']; //Fields that can be mass assigned
    protected $guarded = []; //The opposite of fillable, fields that cannot be mass assigned (blank means all are fillable)

    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id'); //the column name doesn't line up, so we had to specify
    }
}

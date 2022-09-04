<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function collaborators()
    {
        return $this->belongsToMany(Author::class,'project_author','project_id','author_id');
    }


    protected $fillable=[
        "photo",
        "name",
        "description",
        "duration",
        "startDate",
        "endDate",
        "currency",
        "budget",
        "funds",
        "verified",
        "author_id",
        "donor_id",
        "deliverables",
    ];
}

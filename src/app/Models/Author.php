<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_author','author_id','article_id');
    }

    public function datasets()
    {
        return $this->belongsToMany(Dataset::class,'dataset_author','author_id','dataset_id');
    }

    public function collaborations()
    {
        return $this->belongsToMany(Project::class,'project_author','author_id','project_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function verifiedProjects()
    {
        return $this->projects()->where('verified',1)->get();
    }

    public function verifiedCollaborations()
    {
       return  $this->collaborations()->where('verified',1)->get();
    }

    protected $fillable=[
        'avatar',
        'firstName',
        'middleName',
        'lastName',
        'biography',
        'title',
        'campus_id',
        'department_id',
    ];

    protected $hidden=[
        "created_at",
        "updated_at",
        "deleted_at",
        "pivot",
    ];

}

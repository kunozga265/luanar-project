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

    protected $fillable=[
        'avatar',
        'firstName',
        'middleName',
        'lastName',
        'biography',
    ];

    protected $hidden=[
        "created_at",
        "updated_at",
        "deleted_at",
        "pivot",
    ];

}

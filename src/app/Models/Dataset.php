<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Dataset extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    public function authors()
    {
        return $this->belongsToMany(Author::class,'dataset_author','dataset_id','author_id');
    }

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class,'dataset_keyword','dataset_id','keyword_id');
    }

    protected $fillable=[
        'title',
        'year',
        'abstract',
        'downloadCount',
        'file',
        'journal_id',
    ];

    protected $hidden=[
        "created_at",
        "updated_at",
        "deleted_at",
        "pivot",
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Keyword extends Model
{
    use HasFactory;
    use Searchable;

    public function articles()
    {
        return $this->belongsToMany(Article::class,'article_keyword','keyword_id','article_id');
    }

    public function datasets()
    {
        return $this->belongsToMany(Dataset::class,'dataset_keyword','keyword_id','dataset_id');
    }

    protected $fillable=[
      "name",
      "slug"
    ];

    protected $hidden=[
      "created_at",
      "updated_at",
      "pivot",
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Journal extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function datasets()
    {
        return $this->hasMany(Dataset::class);
    }

    protected $fillable=[
        'title',
        'volume',
    ];

    protected $hidden=[
        "created_at",
        "updated_at",
        "deleted_at",
        "pivot",
    ];
}

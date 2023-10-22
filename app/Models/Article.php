<?php

namespace App\Models;

use App\Models\Traits\FilterQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use FilterQueryBuilder;

    protected $table = 'articles';

    protected $fillable = [
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
    ];
}

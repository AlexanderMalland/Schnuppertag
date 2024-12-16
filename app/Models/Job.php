<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'company_id', 'category_id'];

    // Beziehung zu Company
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    // Beziehung zu Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

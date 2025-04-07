<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;



class UserApi extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['name', 'email', 'age'];
    protected static function boot()
    {
        parent::boot();
        static::creating(fn($model) => $model->id = (string) Str::uuid());
    }
}

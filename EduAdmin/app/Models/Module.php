<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Module extends Model
{
    protected $fillable = ['name', 'code', 'description', 'is_available'];
    
    /**
     * The teachers that belong to the module.
     */
    public function teachers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'module_user')
                    ->wherePivot('role', 'teacher')
                    ->where('users.role', 'teacher')
                    ->withTimestamps();
    }
    
    /**
     * The students that belong to the module.
     */
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'module_user')
                    ->wherePivot('role', 'student')
                    ->where('users.role', 'student')
                    ->withTimestamps();
    }
    
    /**
     * All users (both teachers and students) associated with the module.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'module_user')
                    ->withPivot('role')
                    ->withTimestamps();
    }
}
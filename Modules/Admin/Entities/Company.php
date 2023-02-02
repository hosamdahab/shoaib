<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Modules\File\Entities\FileWork;

class Company extends Model
{
    // use HasFactory;

    protected $guarded = [];
    
    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\CompanyFactory::new();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users','company_id','user_id');
    }

    public function filework()
    {
        return $this->hasMany(FileWork::class);
    }
}

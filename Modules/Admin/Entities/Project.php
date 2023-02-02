<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $guarded = [];
    
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }
   
}

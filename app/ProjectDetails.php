<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectDetails extends Model
{
    
    // These fields are not allowed to be mass assigned in the controller
    protected $guarded = [
        'id'
    ];
}

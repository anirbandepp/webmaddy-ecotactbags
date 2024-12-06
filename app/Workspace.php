<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workspace extends Model
{
    protected $guarded = ['id'];
    protected $table = 'workspaces';
}

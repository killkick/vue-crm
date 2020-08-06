<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = [];

    public function path() {
        return '/employees/' . $this->id;
    }
    public function company() {
        return $this->belongsTo(Company::class);
    }
}

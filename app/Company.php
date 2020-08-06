<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'website', 'logo'];

    public function path() {
        return '/companies/'. $this->id;
    }
    public function employees() {
        return $this->hasMany(Employee::class);
    }
}

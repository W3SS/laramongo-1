<?php

namespace App\Models;

use Moloquent\Eloquent\Model as Model;

class Person extends Model
{
    protected $fillable = ['name','gender','birthdate'];

    protected $collection = 'person_collection';

    protected $connection = 'mongodb';

}

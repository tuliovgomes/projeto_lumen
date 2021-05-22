<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model{
    protected $table = "contacts";

    protected $fillable = [
        'name',
        'email',
        'cell'
    ];

    public $timestamps = true;


    public function contacts()
    {
        return $this->hasMany(PersonalCollection::class);
    }
}
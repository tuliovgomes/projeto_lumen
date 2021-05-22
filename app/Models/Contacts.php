<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contacts extends Model {
    use  HasFactory;

    protected $table = "contacts";

    protected $fillable = [
        'name',
        'email',
        'cell'
    ];

    public $timestamps = true;


    public function loans()
    {
        return $this->hasMany(PersonalCollection::class);
    }

    public static function sort()
    {
        return [
            'id'    => 'contacts.id',
            'name'  => 'contacts.name',
            'email' => 'contacts.email',
            'cell'  => 'contacts.cell',
        ];
    }
}
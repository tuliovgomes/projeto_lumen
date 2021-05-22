<?php   
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalCollection extends Model{
    protected $table = "personal_collection";

    protected $fillable = [
        'title',
        'type',
        'contacts_id'
    ];

    public $timestamps = false;

    public function contacts()
    {
        return $this->belongsTo(Contacts::class);
    }
}
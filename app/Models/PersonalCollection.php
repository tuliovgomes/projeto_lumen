<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalCollection extends Model
{
    protected $table = "personal_collection";

    const TYPE_BOOK = 1;
    const TYPE_CD   = 2;
    const TYPE_DVD  = 3;

    const TYPES     = [
        self::TYPE_BOOK => 'Book',
        self::TYPE_CD => 'CD',
        self::TYPE_DVD => 'DVD',
    ];

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

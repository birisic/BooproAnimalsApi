<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property $id
 * @property $url
 * @property $internal_id
 * @property $created_at
 * @property $publish_at
 * @property $delete_at
 */
class Link extends Model
{
    use HasFactory;

    protected $fillable = ["url","internal_id","created_at","publish_at","delete_at"];
    public $timestamps = false;


    //generate unique alphabetical case-insensitive string
    public function makeInternalId($length = 7): string {
        $stringSpace = implode(array_merge(range('a', 'z'), range('A', 'Z')));
        $stringLength = strlen($stringSpace);
        $randomString = '';
        for ($i = 0; $i < $length; $i ++) {
            $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
        }

        return $randomString;
    }
}

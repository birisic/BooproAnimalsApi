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



     //This is a static recursive function that generates a unique alphabetical case-insensitive string
    private static function makeInternalId($allInternalIds, $length): string {
        $string = self::makeRandomStringOfLetters($length);
        if (self::validateInternalIdUniqueness($string, $allInternalIds)) {
            return $string;
        }

        return self::makeInternalId($allInternalIds, $length);
    }

    public function getInternalId($length = 7): string {
        $allInternalIds = Link::pluck("internal_id")
                                ->toArray();

        return self::makeInternalId($allInternalIds, $length);
    }

    private static function validateInternalIdUniqueness(string $string, array $allInternalIds): bool {
        if (!in_array($string, $allInternalIds)) return true;
        return false;
    }

    private static function makeRandomStringOfLetters($length): string {
        $stringSpace = implode(array_merge(range('a', 'z'), range('A', 'Z')));
        $stringLength = strlen($stringSpace);
        $randomString = '';

        for ($i = 0; $i < $length; $i ++) {
            $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
        }

        return $randomString;
    }
}

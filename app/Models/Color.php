<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "colors";
    protected $fillable = [
        "name",
        "hex_code"
    ];

    public static function getHexCodeByColorName($colorName)
    {
        $colors = config('colors');
        return $colors[strtolower($colorName)] ?? null;
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}

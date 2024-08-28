<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'areas');
        //return $this->belongsTo('App\Models\Area');
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genres');
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }

    public function scopeAreaSearch($query, $area)
    {
        if ($area != 'null') {
            $query->where('areas', $area);
        }
    }

    public function scopeGenreSearch($query, $genre)
    {
        if ($genre != 'null') {
            $query->where('genres', $genre);
        }
    }

    public function scopeShopSearch($query, $name)
    {
        if ($name != 'null') {
            $query->where('name', 'like', '%' . $name . '%');
        }
    }
}

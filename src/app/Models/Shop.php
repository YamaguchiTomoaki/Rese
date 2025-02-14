<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function area()
    {
        return $this->belongsTo(Area::class, 'areas');
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

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function representative()
    {
        return $this->belongsTo(Representative::class, 'representative_id');
    }

    public function newreview()
    {
        return $this->hasMany(Newreview::class);
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

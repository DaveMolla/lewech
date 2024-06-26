<?php

namespace App\Models;

use App\Http\Controllers\ItemRequestController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Item extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = ['user_id', 'item_name', 'description', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itemRequests()
    {
        return $this->hasMany(Request::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('item_image');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);

        $this->addMediaConversion('full')
            ->width(1920)
            ->height(1080);
    }

}

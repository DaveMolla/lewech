<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Request extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;


    protected $fillable = [
        'sender_user_id',
        'receiver_user_id',
        'item_id',
        'message',
        'status',
        // ... any other fields you want to allow for mass assignment
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('request_image');
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

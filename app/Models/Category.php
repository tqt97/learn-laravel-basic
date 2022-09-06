<?php

namespace App\Models;

use App\Traits\FilePondMedia;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Category extends Model  implements HasMedia
{
    use HasFactory;
    use Sluggable;
    use InteractsWithMedia;
    use FilePondMedia;
    use SoftDeletes;

    protected $fillable = ['name', 'slug', 'order_at', 'status', 'parent_id', 'image'];

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }

    private $check = '<svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-5 h-5 text-green-600">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M4.5 12.75l6 6 9-13.5" />
                                                </svg>';

    private $xMark = '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-600">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>';

    public function getStatus(): string
    {
        if ($this->attributes['status'] == 1) {
            return $this->check;
        } else {
            return $this->xMark;
        }
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('main')
            ->width(800)
            ->height(600)
            ->sharpen(10);

        $this->addMediaConversion('thumb-60')
            ->width(60)
            ->height(60);

        $this->addMediaConversion('thumb-100')
            ->width(100)
            ->height(100);
    }
}

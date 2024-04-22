<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Rental extends Model
{
    use HasFactory;

    protected $fillable =[
    
        'title',
        'description',
        'surface',
        'rooms',
        'bedrooms',
        'floor',
        'city',
        'price',
        'address',
        'postal_code',
        'rented',
        'image'
   ];

   public function features(): BelongsToMany
   {
         return $this->belongsToMany(Feature::class);

   }
   public function getSlug(): string
   {
            return Str::slug($this->title);
   }

   public function imageUrl (): string
   {
        return Storage::url($this->image);
   }

  
  
}

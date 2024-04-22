<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Property extends Model
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
        'sold',
        'image'
        
        
   ];
   public function options(): BelongsToMany
   {
         return $this->belongsToMany(Option::class);

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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title','slug','content','online','category_id'];
   /* public static $rules = [
        'title' => 'required|min:5',
        'content' => 'required|min:10'
    ];
   puisque on a crée un objet request donc on les coupe en rules de notre propre request
   */

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function tags()
    {
       return $this->belongsToMany('App\Tag');
    }

    public function scopePublished($query)
    {
        return $query->where('online',true)->whereRaw('created_at < NOW()');
        // its same like this
        // return $query->where('online',true)->where('created_at' , '<', DB::raw('NOW()'));
    }
    public function scopeSearchByTitle($query, $q)
    {
        return $query->where('title', 'LIKE', '%'.$q.'%');
    }
    public function setSlugAttribute($value)
    {
        if (empty($value))
        {
            $this->attributes['slug'] = Str::slug($this->title);
        }
    }
    public function getDates()
    {
        return ['created_at','updated_at','published_at'];
    }
}

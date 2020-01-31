<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Post extends Model implements Searchable
{
    //
    use Sluggable;
    use SluggableScopeHelpers;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $fillable = [
        'title',
        'body',
        'preview',
        'category_id',
        'post_type',
        'is_important',
        'photo_id'
    ];

    public function user() {

        return $this->belongsTo('App\User');

    }

    public function photo() {

        return $this->belongsTo('App\Photo');

    }

    public function getSearchResult(): SearchResult
    {
        $url = route('article', $this->slug);

        return new SearchResult(
            $this,
            $this->title,
            $url
        );
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }


}

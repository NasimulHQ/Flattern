<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfilo extends Model
{
    protected $fillable = ['portfilo_category_id', 'client_id', 'title', 'project_date', 'url', 'excerpt', 'description','image', 'slug' ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function portfilocategory()
    {
        return $this->belongsTo(PortfiloCategory::class, 'portfilo_category_id');
    }
}

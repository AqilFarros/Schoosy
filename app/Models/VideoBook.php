<?php

namespace App\Models;

use Cohensive\OEmbed\Facades\OEmbed;
use Illuminate\Database\Eloquent\Model;

class VideoBook extends Model
{
    protected $fillable = [
        'book_id',
        'url_youtube'
    ];

    public function book() {
        return $this->belongsTo(Book::class);
    }

    public function getVideoAttributes($value) {
        $embed = OEmbed::get($value);
        if ($embed) {
            return $embed->html(['width' => 300]);
        }
    }
}

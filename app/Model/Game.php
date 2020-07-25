<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table='games';
    public $timestamps=true;
    protected $fillable=['game_name','game_phrase','theme_highlight_text','background_image'];
}

<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $table ='characters';
    public $timestamps=true;
    protected $fillable = ['frase_characters','characters_description','characters_name','image','game'];
}

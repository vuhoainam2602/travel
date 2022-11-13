<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;
    protected $table = 'hwp_posts';
    protected $fillable = ['ID','post_content','post_title','post_name','post_date','post_date_gmt','post_modified','post_modified_gmt','post_view'];
    public $timestamps = false;

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'blocks';
	protected $fillable = array('title','position','topicid', 'text','imagepath','created_at_ip', 'updated_at_ip');
	protected $rules = [
        'title' => ['required'],
        'topicid' => ['required'],
        'text' => ['required'],
    ];
}

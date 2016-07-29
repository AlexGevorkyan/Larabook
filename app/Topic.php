<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use \Esensi\Model\Model;

class Topic extends Model
{
    protected $primaryKey = 'id';
	protected $table = 'topics';
	protected $fillable = array('topicname', 'created_at_ip', 'updated_at_ip');
	protected $rules = [
        'topicname' => ['required'],
    ];

}

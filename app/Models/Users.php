<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    // 关联到模型的数据表
    protected $table = 'users';

    // 定义主键，默认id
    protected $primaryKey = 'id';

   // 表明模型是否应该被打上时间戳
    public $timestamps = true;

   /*
   自定义用于存储时间戳的字段名称；  默认 created_at   updated_at
    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'last_update';
   */





}

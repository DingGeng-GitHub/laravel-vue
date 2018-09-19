<?php

namespace App\Http\Controllers\Admin;

use App\Models\Users;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Facades\Excel;


class ExcelController extends Controller
{
    // Excel导出
    public function export(){

        $data = Users::all()->toArray();

        Excel::create(iconv('UTF-8', 'GBK', '用户信息'),function($excel) use ($data){
            $excel->sheet('score', function($sheet) use ($data){
                $sheet->rows($data);
            });
        })->store('xls')->export('xls');
    }



    // Excel导入
    public function import(){
        $res = [];
        $filePath = 'storage/exports/'.iconv('UTF-8', 'GBK', '学生成绩').'.xls';
        Excel::load($filePath, function($reader) use (&$res) {
            $reader = $reader->getSheet(0);
            $res = $reader->toArray();
            $result = $this->create_table('resultaaaaaaaaaaa',$res);

                if($result === intval(1) ){
                    return dd('数据导入成功');
                }else{
                    return dd('数据导入失败');
                }
        });
    }


    // 创建数据表
    public function create_table($table_name,$arr_field)
    {

        $tmp = $table_name;
        $va = $arr_field;

        // 判断数据表是否存在
        if(Schema::hasTable($table_name)){

            // 如果表存在，删除后再重新创建
            Schema::drop($table_name);
            Schema::create("$tmp", function(Blueprint $table) use ($tmp,$va)
            {
                $fields = $va[0];  //列字段
                $table->increments('id');//主键
                foreach($fields as $key => $value){
                    if($key == 0){
                        $table->string($fields[$key]);    //->unique(); 唯一
                    }else{
                        $table->string($fields[$key]);
                    }
                }
            });

            // 处理数据
            $value_str= array();
            $id = 1;
            foreach($va as $key => $value){
                if($key != 0){
                    $content = implode(",",$value);
                    $content2 = explode(",",$content);
                    foreach ( $content2 as $key => $val ) {
                        $value_str[] = "'$val'";
                    }
                    $news = implode(",",$value_str);
                    $news = "$id,".$news;
                    DB::insert("insert into $tmp values ($news)");
                    $value_str= array();
                    $id = $id + 1;
                }
            }
            return 1;
        }else{

            // 如果没有就创建
            Schema::create("$tmp", function(Blueprint $table) use ($tmp,$va)
            {
                $fields = $va[0];  //列字段
                $table->increments('id');//主键
                foreach($fields as $key => $value){
                    if($key == 0){
                        $table->string($fields[$key]);    //->unique(); 唯一
                    }else{
                        $table->string($fields[$key]);
                    }
                }
            });

            // 处理数据
            $value_str= array();
            $id = 1;
            foreach($va as $key => $value){
                if($key != 0){
                    $content = implode(",",$value);
                    $content2 = explode(",",$content);
                    foreach ( $content2 as $key => $val ) {
                        $value_str[] = "'$val'";
                    }
                    $news = implode(",",$value_str);
                    $news = "$id,".$news;
                    DB::insert("insert into $tmp values ($news)");
                    $value_str= array();
                    $id = $id + 1;
                }
            }
            return 1;
        }

    }







}

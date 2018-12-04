<?php

namespace App\Http\Controllers\MbsController\Table;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use  App\Model\Mbs\Setting;

class TableController extends Controller
{
    
    public function index()
    {
        $note = new Setting();
        $sort = '';
        $sortType ='';
        $search = '';
       if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
       }
       if(isset($_GET['sortType'])){
        $sortType = $_GET['sortType'];
       }

       if(isset($_GET['search'])){
            $search =  $_GET['search'];
       }
       if(isset($_GET['search'])){
        $search = $_GET['search'];
        if($sort != '' ){
            return $note->where('name','LIKE',$search)->OrderBy($sort , $sortType)->paginate(2);
      }else{
       return $note->where('name',$search)->paginate(2);
      }

       }else{

        if($sort != '' ){
            return $note->OrderBy($sort , $sortType)->paginate(2);
      }else{
       return $note->paginate(2);
      }

       }
    }


    public function multipleTable($table_name)
    {   //echo $table_name;
        $name = (isset($_GET['where']))?$_GET['where']:'id';
        $page = (isset($_GET['num']))?$_GET['num']:10;
        $note = \DB::table($table_name);
        $sort = '';
        $sortType ='';
        $search = '';
       if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
       }
       if(isset($_GET['sortType'])){
        $sortType = $_GET['sortType'];
       }

       if(isset($_GET['search'])){
            $search =  $_GET['search'];
       }
       if(isset($_GET['search'])){
        $search = $_GET['search'];
        if($sort != '' ){
            return $note->where($name,'like','%'.$search.'%')->OrderBy($sort , $sortType)->paginate($page);
      }else{
       return $note->where($name,'like','%'.$search.'%')->paginate($page);
      }

       }else{

        if($sort != '' ){
            return $note->OrderBy($sort , $sortType)->paginate($page);
      }else{
       return $note->paginate($page);
      }

       }


    }
    public function getTableColumns($table)
    {
        return \DB::getSchemaBuilder()->getColumnListing($table);
    
        // OR
    
     //   return Schema::getColumnListing($table);
    
    }

    public function join($table_name){
        $name = (isset($_GET['where']))?$_GET['where']:'id';
        $page = (isset($_GET['num']))?$_GET['num']:10;
        
        $table_join = $_GET['join'];
        $table_a = $_GET['tableA'];
        $table_b = $_GET['tableB'];

        $note = \DB::table($table_name);
        $sort = '';
        $sortType ='';
        $search = '';
       if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
       }
       if(isset($_GET['sortType'])){
        $sortType = $_GET['sortType'];
       }

       if(isset($_GET['search'])){
            $search =  $_GET['search'];
       }
       if(isset($_GET['search'])){
        $search = $_GET['search'];
        if($sort != '' ){
            return $note->where($name,'like','%'.$search.'%')->where($table_name.'.status_id','!=','3')->join($table_join, $table_a, '=', $table_b)->select($table_join.'.*',$table_name.'.*')->OrderBy($sort , $sortType)->paginate($page);
      }else{
       return $note->where($name,'like','%'.$search.'%')->where($table_name.'.status_id','!=','3')->join($table_join, $table_a, '=', $table_b)->select($table_join.'.*',$table_name.'.*')->paginate($page);
      }

       }else{

        if($sort != '' ){
            return $note->OrderBy($sort , $sortType)->where($table_name.'.status_id','!=','3')->join($table_join, $table_a, '=', $table_b)->select($table_join.'.*',$table_name.'.*')->paginate($page);
      }else{
       return $note->where($table_name.'.status_id','!=','3')->join($table_join, $table_a, '=', $table_b)->select($table_join.'.*',$table_name.'.*')->paginate($page);
      }

       }
    }
    
}

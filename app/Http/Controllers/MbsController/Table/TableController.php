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
         $name = (isset($_GET['name_search']))?$_GET['name_search']:'id';
       
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
            return $note->where($name,'LIKE',$search)->OrderBy($sort , $sortType)->paginate(2);
      }else{
       return $note->where($name,$search)->paginate(2);
      }

       }else{

        if($sort != '' ){
            return $note->OrderBy($sort , $sortType)->paginate(2);
      }else{
       return $note->paginate(2);
      }

       }


    }
    public function getTableColumns($table)
    {
        return \DB::getSchemaBuilder()->getColumnListing($table);
    
        // OR
    
     //   return Schema::getColumnListing($table);
    
    }
    
}

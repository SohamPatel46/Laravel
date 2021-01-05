<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function simple_db_queries(){

       // DB::insert('insert into users (id, name, email,password) values (?, ?,?,?)',
       //              [1, 'Dayle','soham@gmail.com','soham46']);
       // executed

      // DB::update('update users set name = ? where id = ?', ['Soham',1]);

       $result=DB::select('select * from users');
       return $result;

       //DB::delete('delete users where name = ?', ['Soham']);

       return "I am in User Controller";    //this wont be retured as $result is already returned

    }

    public function index(){
        return view("welcome");
    }

    public function eloquent(){
        $user = new User();
        //dd($user);                 //die and dump (user) to see the details of the user model

        //$user->name = "Hit";
        //$user->email = "Hit@gmail.com";
        //$user->password = bcrypt("Hit@23");
        //$user->save();
        
        $result = User::all();         //fetching 
        return $result;

        //User::where('id',1)->delete();   //for deleting
        //User::where('id',2)->update(['name'=>'hit','email'=>"het@gmail.com"]);    //updating

    }

    public function eloquent_advance(){
        $data=[
            'name'=>'virat1',
            'email'=> 'virat1@gmail.com',
            'password'=> 'virat46'  //automatically crypted by mutator in user.php
        ];
        User::create($data);   //create method will look for fillable fields only
        
        $result = User::all();  
        return $result;
    }
    
}

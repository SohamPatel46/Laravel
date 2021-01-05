<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

       // DB::insert('insert into users (id, name, email,password) values (?, ?,?,?)',
       //              [1, 'Dayle','soham@gmail.com','soham46']);
       // executed

       DB::update('update users set name = ? where id = ?', ['Soham',1]);

       $result=DB::select('select * from users');
       return $result;

       //DB::delete('delete users where name = ?', ['Soham']);

       return "I am in User Controller";    //this wont be retured as $result is already returned

    }

    public function index2(){
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;


class UserController extends Controller
{
    public function getData(){

        try{
            
            $data = User::where('email' , 'amir@gmail.om')->firstOrFail();
            return $data;

        }
        catch(Exception $e){
            // return view('errors.404');
            echo "Error";
        }
        
        // function division($num){
        //     try{
        //             if($num==0)
        //             {
        //                 throw new Exception("Invalid Number");
        //             }
        //             else{
        //             echo 2/$num;
        
        //             }
        //         }
        //         catch(Exception $e){
        //             echo $e->getMessage();
        //         }
        // }
        // division(0);

        
        
        // $num = 0;
        // try{
        //     if($num==0)
        //     {
        //         throw new Exception("Invalid Number");
        //     }
        //     else{
        //     echo 2/$num;

        //     }
        // }
        // catch(Exception $e){
        //     echo $e->getMessage();
        //     // echo $e->getLine();
        //     // echo $e->getCode();
        //     // echo $e->getFile();
        //     //echo $e;



        // }
   }
}

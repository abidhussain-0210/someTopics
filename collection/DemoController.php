<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Jobs\SendEmail;
use App\Models\User; 

class DemoController extends Controller
{
    public function index(){
        Log::channel('custom')->info("Hello World on Custom File..!!");
    }
    
    public function mail()
    {
        dispatch(new SendEmail());
    }
    public function collection(){
        
        // $collection = collect([1,2,3,4,5,6,7,8,9]);
        //dd($collection);
        // $data = $collection->all();
        // $data = $collection->avg();
        // $data = $collection->chunk(2);
        // $data = $collection->reverse();
        // $data = $collection->map(function($item , $key){
        //     return $item + 2;
        // });
        // dd($data);

        // $data = User::get();
        // dd($data->pluck('name')->all());

        // $data = User::get();
        // $output = $data->each(function($user){
        //     $user->username = "hello";
        //     $user->year = date("Y");
        //     unset($user->created_at);
        //     unset($user->updated_at);
        // });
        // dd($output->toArray());

    }
}

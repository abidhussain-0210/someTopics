<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Cache;


class CategoryController extends Controller
{
   public function index()
   {  
     //     $categories = Category::latest('id')->paginate(15);
   		// return view('admin.category.index')
     //              ->with(compact('categories'));
      
      $page = request()->get('page', 1);
      $cacheKey = 'categories_page_' . $page;
      $categories = Cache::rememberForever($cacheKey,function () {
        return Category::latest('id')->paginate(15);
    });

          return view('admin.category.index')   
            ->with(compact('categories'));

          
         
         //STORE
         //Cache::put('email', 'aftab@gmail.com', $seconds=5);
         // Cache::put('state', 'sindh', now()->addMinutes(1));
         // Cache::remember('state' ,  5 , function(){
         //    return 'karachi';
         // });

         //RETRIVE
         // Cache::put('product' , 'Laptop' , $seconds = 10);
         // $cache = Cache::get('product');
         // return $cache;

         //CHECK
         // if(Cache::has('product')){
         //    return "Yes";
         // }
         // else{
         //    return "No";
         // }

         //REMOVE
         //Cache::forget('product');
         //dd(Cache::get('product'));
         
         //CLEAR ALL CACHE
         //Cache::flush();

         //RETRIVE AND STORE
         // $data = Cache::rememberForever('mobile' , function(){
         //    return 'NOKIA';
         // });
         // dd($data);
         //RETRIVE AND DELETE
         // $data = Cache::pull('product');
         //  dd($data);

   }

   public function create()
   {
   		 //Gate::authorize('create', Category::class);
         return view('admin.category.create');
   }
   public function store(Request $request)
   {  
      $request->validate([
         'title' => 'required',
      ]);
      Category::create([
         'title' => $request->get('title'),
         'slug' => $request->get('slug'),
         'status' => 'DEACTIVE',
         'meta_description' => $request->get('meta_description'),
         'meta_keywords' => $request->get('meta_keywords'),
      ]);
      return redirect()->to('admin/category');
   }
   public function edit($id)
   {
         $category = Category::findOrFail($id);
   		return view('admin.category.edit')
                  ->with(compact('category'));
   }
   public function update(Request $request , $id)
   {
      $category = Category::findOrFail($id);
      $category->update([
         'title' => $request->get('title'),
         'slug' => $request->get('slug'),
         'status' => 'DEACTIVE',
         'meta_description' => $request->get('meta_description'),
         'meta_keywords' => $request->get('meta_keywords'),
      ]);
      return redirect()->to('admin/category');
   }
   public function status($id)
   {
      $category = Category::findOrFail($id);
      $newstatus = ($category->status == 'DEACTIVE') ? 'ACTIVE' : 'DEACTIVE';
      $category->update([
         'status'=> $newstatus
      ]);
      return redirect()->back();
   }
   public function delete($id)
   {
      $category = Category::findOrFail($id);
      //Gate::authorize('delete', $category);
      $category->delete();
      return redirect()->back();
   }
}

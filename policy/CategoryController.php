<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;


class CategoryController extends Controller
{
   public function index()
   {  
         $categories = Category::latest('id')->paginate(15);
   		return view('admin.category.index')
                  ->with(compact('categories'));
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

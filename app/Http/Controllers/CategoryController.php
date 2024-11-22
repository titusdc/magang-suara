<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index() 
    {
        //get all products
        $categorys = Category::latest()->paginate(10);

        return view('categorys/index', compact('categorys'));
    }

    public function create()
    {
        return view('categorys.create');
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'title'         => 'required|min:4',
        ]);
        
        //upload image
        Category::create([
            'title'         => $request->title,
        ]);

        //redirect to index
        return redirect()->route('categorys.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id)
    {
        //get product by ID
        $categorys = Category::findOrFail($id);

        //render view with product
        return view('categorys.show', compact('categorys'));
    }

    public function edit(string $id)
    {
        //get product by ID
        $categorys = Category::findOrFail($id);

        //render view with product
        return view('categorys.edit', compact('categorys'));
    }
    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'title'         => 'required|min:4',
        ]);

        //get product by ID
        $categorys = Category::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/categorys', $image->hashName());

            //delete old image
            Storage::delete('public/categorys/'.$categorys->image);

            //update product with new image
            $categorys->update([
                'title'         => $request->title,
            ]);

        } else {

            //update product without image
            $categorys->update([
                'title'         => $request->title,
            ]);
        }

        //redirect to index
        return redirect()->route('categorys.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //get product by ID
        $categorys = Category::findOrFail($id);

        //delete image
        Storage::delete('public/categorys/'. $categorys->image);

        //delete product
        $categorys->delete();

        //redirect to index
        return redirect()->route('categorys.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

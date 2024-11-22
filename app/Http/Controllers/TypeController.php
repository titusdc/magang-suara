<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TypeController extends Controller
{
    public function index() 
    {
        //get all products
        $types = Type::latest()->paginate(10);

        return view('types/index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'title'         => 'required|min:3',
        ]);
        
        //upload image
        Type::create([
            'title'         => $request->title,
        ]);

        //redirect to index
        return redirect()->route('types.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id)
    {
        //get product by ID
        $types = Type::findOrFail($id);

        //render view with product
        return view('types.show', compact('types'));
    }

    public function edit(string $id)
    {
        //get product by ID
        $types = Type::findOrFail($id);

        //render view with product
        return view('types.edit', compact('types'));
    }
    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'title'         => 'required|min:3',
        ]);

        //get product by ID
        $types = Type::findOrFail($id);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/types', $image->hashName());

            //delete old image
            Storage::delete('public/types/'.$types->image);

            //update product with new image
            $types->update([
                'title'         => $request->title,
            ]);

        } else {

            //update product without image
            $types->update([
                'title'         => $request->title,
            ]);
        }

        //redirect to index
        return redirect()->route('types.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        //get product by ID
        $types = Type::findOrFail($id);

        //delete image
        Storage::delete('public/types/'. $types->image);

        //delete product
        $types->delete();

        //redirect to index
        return redirect()->route('types.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

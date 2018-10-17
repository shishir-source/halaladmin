<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Category;
use App\CsvData;
use App\Http\Requests\CsvImportRequest;
use Maatwebsite\Excel\Facades\Excel;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all()) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'featured' => 'required|image'
        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('public/uploads/categories',$featured_new_name);
        // $category = new Category();
        // $category->name = $request->name;
        // $category->save();

        $category = Category::create([
            'name' => $request->name,
            'image' => 'public/uploads/categories/' . $featured_new_name
        ]);

        Session::flash('success', 'You successfully created a category.');    
        return redirect()->route('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $category = Category::find($id);

        if($request->hasFile('image')){
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('public/uploads/posts',$featured_new_name);
            $category->featured = 'public/uploads/posts/'.$featured_new_name;
        }
        
        $category->name = $request->name;
        
        $category->save();
        
        Session::flash('success', 'Category updated successfully.');

        return redirect()->route('categories');
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        Session::flash('success', 'You successfully moved a category to Trahsed.');

        return redirect()->route('categories');
    }
    public function trashed(){
        $categories = Category::onlyTrashed()->get();

        return view('admin.categories.trashed')->with('categories',$categories);
    }
    public function kill($id){
        $category = Category::withTrashed()->where('id', $id)->first();

        $category->forceDelete();

        Session::flash('success', 'You successfully deleted a category from trashed.');

        return redirect()->route('category.trashed');
    }
    public function restore($id){
        $category = Category::withTrashed()->where('id', $id)->first();
        $category->restore();

        Session::flash('success', 'You successfully restored a Category from trashed.');

        return redirect()->route('categories');
    }


    public function importParse(CsvImportRequest $request)
    {
        $path = $request->file('csv_file')->getRealPath();
        if ($request->has('header')) {
            $data = Excel::load($path, function($reader) {})->get()->toArray();
        } else {
            $data = array_map('str_getcsv', file($path));
        }
        if (count($data) > 0) {
            if ($request->has('header')) {
                $csv_header_fields = [];
                foreach ($data[0] as $key => $value) {
                    $csv_header_fields[] = $key;
                }
            }
            $csv_data = array_slice($data, 0, 2);
            $csv_data_file = CsvData::create([
                'csv_filename' => $request->file('csv_file')->getClientOriginalName(),
                'csv_header' => $request->has('header'),
                'csv_data' => json_encode($data)
            ]);
        } else {
            return redirect()->back();
        }
        return view('admin.categories.import_fields', compact( 'csv_header_fields', 'csv_data', 'csv_data_file'));
    }
    public function importProcess(Request $request)
    {
        $data = CsvData::find($request->csv_data_file_id);
        $csv_data = json_decode($data->csv_data, true);
        foreach ($csv_data as $row) {
            $contact = new Category();
            foreach (config('app.db_fields') as $index => $field) {
                if ($data->csv_header) {
                    $contact->$field = $row[$request->fields[$field]];
                } else {
                    $contact->$field = $row[$request->fields[$index]];
                }
            }
            $contact->save();
        }
        return view('admin.categories.import_success');
    }
}

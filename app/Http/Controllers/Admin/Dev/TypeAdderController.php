<?php

namespace App\Http\Controllers\Admin\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SearchType;

class TypeAdderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type = SearchType::paginate(30);
        return view('admin.dev.adding_type.index', compact('type'));
    }

    public function create()
    {
        return view('admin.dev.adding_type.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'search_type_id' => 'required|string|unique:search_type',
            'search_type' => 'required',
        ]);
        $search = new SearchType;
        $search->timestamps = false;
        $search->search_type_id = $request['search_type_id'];
        $search->search_type = $request['search_type'];
        $search->save();

        return redirect('admin/adding_type');
    }

    public function edit($id)
    {
        $data = SearchType::where('search_type_id', $id)->get()[0];

        return view('admin.dev.adding_type.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'search_type_id' => 'required|string',
            'search_type' => 'required',
        ]);

        $type = SearchType::where('search_type_id', $id)
            ->update([
                'search_type_id' => $request['search_type_id'],
                'search_type' => $request['search_type'],
            ]);

        return redirect('admin/adding_type');
    }

    public function delete($id)
    {
        $delete = SearchType::where('search_type_id', $id)->delete();

        return response()->json([], 204);
    }
}

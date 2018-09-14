<?php

namespace App\Http\Controllers\Admin\Dev;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SearchCharge;

class ChargeAdderController extends Controller
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
        $charge = SearchCharge::paginate(30);
        return view('admin.dev.adding_charge.index', compact('charge'));
    }

    public function create()
    {
        return view('admin.dev.adding_charge.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'search_charge_id' => 'required|string|unique:search_charge',
            'search_charge' => 'required',
        ]);
        $search = new SearchCharge;
        $search->timestamps = false;
        $search->search_charge_id = $request['search_charge_id'];
        $search->search_charge = $request['search_charge'];
        $search->save();

        return redirect('admin/adding_charge');
    }

    public function edit($id)
    {
        $data = SearchCharge::where('search_charge_id', $id)->get()[0];

        return view('admin.dev.adding_charge.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'search_charge_id' => 'required|string',
            'search_charge' => 'required',
        ]);

        $charge = SearchCharge::where('search_charge_id', $id)
            ->update([
                'search_charge_id' => $request['search_charge_id'],
                'search_charge' => $request['search_charge'],
            ]);

        return redirect('admin/adding_charge');
    }

    public function delete($id)
    {
        $delete = SearchCharge::where('search_charge_id', $id)->delete();

        return response()->json([], 204);
    }
}

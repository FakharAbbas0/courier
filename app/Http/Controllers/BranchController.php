<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class BranchController extends Controller
{
    function __construct()
    {
        // $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $branches = Branch::latest()->get();
        return view('branch.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:branches',
        ]);

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->description = $request->description;
        $store = $branch->save();
        if ($store){
            return redirect(route('branches.index'))->with('success', 'New Branch create successfully');
        }
        return back()->with('warning', 'Branch could not be create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return Response
     */
    public function edit(Branch $branch)
    {
        return view('branch.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Branch $branch
     * @return void
     */
    public function update(Request $request, $branch_id)
    {
        $request->validate([
            'name' => 'required|unique:branches,name,'. $branch_id,
        ]);
        $branch = Branch::find($branch_id);
        $branch->name = $request->name;
        $branch->description = $request->description;
        $store = $branch->update();
        if ($store){
            return redirect(route('branches.index'))->with('success', 'Branch update successfully');
        }
        return back()->with('warning', 'Branch could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return Response
     * @throws \Exception
     */
    public function destroy(Branch $branch)
    {
        if ($branch->delete()){
            return back()->with('success', 'Branch delete successfully');
        }
        return back()->with('warning', 'Branch could not be delete');
    }
}

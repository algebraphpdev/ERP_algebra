<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.access:employees.create', ['only' => ['create', 'store']]);
        $this->middleware('sentinel.access:employees.view', ['only' => ['index', 'trash', 'show']]);
        $this->middleware('sentinel.access:employees.update', ['only' => ['edit', 'update']]);
        $this->middleware('sentinel.access:employees.destroy', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*with('reportsTo') omogucava eager loading (suprtono od lazyload)smanjuje broj requestova na bazu, odmah u prvom upitu kupi i podatke u 'reportsTo'*/
        $employees = Employee::with(['reportsTo', 'office'])->paginate(5);
        foreach($employees as $employee){


        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

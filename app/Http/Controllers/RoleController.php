<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role=Role::orderBy('id','desc')->paginate(10);
        return view('pages.Role.index')->with('role',$role);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.Role.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => request('name')]);
       foreach(request('permission') as $per)
       {
           
        // $permission = Permission::findById($per);
        $role->givePermissionTo($per);

       }
       toastr()->success('Role has been Created successfully!');
       
       return redirect('Role');

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
        $data['role']=Role::where('id',$id)->first();
        $data['per']=Role::join('role_has_permissions','role_has_permissions.role_id','=','roles.id')->where('roles.id',$id)->get();
        // dd($per);
        return view('pages.Role.edit')->with($data);

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
        $role = Role::where('id',$id)->first();
        \DB::table('role_has_permissions')->where('role_id',$id)->delete();

        foreach(request('permission') as $per)
        {
            
         // $permission = Permission::findById($per);
         $role->givePermissionTo($per);
 
        }
        $role->save();
        toastr()->success('Role has been Updated successfully!');

        return redirect('Role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role=Role::where('id',$id)->first();
        $role->delete();
        toastr()->error('Role has been Deleted successfully!');

        return redirect('Role');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Permissions;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.add_permission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_permission(Request $request)
    {
        $data = $request->validate([
            'permission_name' => 'required',

        ]);
        Permissions::create([
            'name' => $data['permission_name'],
        ]);

        return redirect()->back();
    }
}

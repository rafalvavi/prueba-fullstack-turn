<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wholesalers = User::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Lista de mayoristas',
            'data' => $wholesalers
        ], 200);
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
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);
        $wholesalers = User::create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Mayorista creado correctamente.',
            'data' => $wholesalers
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $wholesale)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detalle del mayorista',
            'data' => $wholesale
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $wholesale)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);
        $wholesale = User::find($wholesale->id);

        if ($wholesale) {
            $wholesale->update([
                'title' => $request->title,
                'content' => $request->content
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Mayorista actualizado correctamente',
                'data' => $wholesale
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Mayorista no encontrado.'
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $wholesale)
    {
        if ($wholesale) {
            $wholesale->delete();

            return response()->json([
                'success' => true,
                'message' => 'Mayorista eliminado correctamente.'
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => 'Mayorista no encontrado.'
        ], 404);
    }
}

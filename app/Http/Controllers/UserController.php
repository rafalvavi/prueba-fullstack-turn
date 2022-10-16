<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\State;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        // dd($search);
        $wholesalers = auth()->user()->wholesalers()
        ->where(function ($query) use ($search) {
            $query->where('IdUser', 'like', '%'.$search.'%')
            ->orWhere('Name', 'like', '%'.$search.'%')
            ->orWhere('Company', 'like', '%'.$search.'%')
            ->orWhere('Email', 'like', '%'.$search.'%')
            ->orWhere('Phone', 'like', '%'.$search.'%')
            ->orWhere('Discount', 'like', '%'.$search.'%');
        })
        ->orderBy('IdUser', 'desc')
        ->paginate(5);
        return view('dashboard.wholesalers.index', compact('wholesalers', 'search'));
    }

    public function create()
    {
        $states = State::all();
        return view('dashboard.wholesalers.create', compact('states'));
    }

    public function store(UserRequest $request)
    {
        $validated = $request->validated();
        // dd($validated);
        $validated['FK_IdUser'] = auth()->user()->IdUser;
        $validated['Status'] = 0;
        $validated['Role'] = 'Mayorista';
        $user = User::create($validated);

        if ($validated['PostalCode'] != null) {
            $user->address()->create([
                'ContactName' => $validated['ContactName'],
                'Address' => $validated['Address'],
                'PostalCode' => $validated['PostalCode'],
                'Neighborhood' => $validated['Neighborhood'],
                'City' => $validated['City'],
                'State' => $validated['State'],
                'Email' => $validated['address_email'],
                'Phone' => $validated['address_phone'],
                'Status' => 0
            ]);
        }
        if ($validated['billing_PostalCode'] != null) {
            $user->billingData()->create([
                'IqualAddress' => isset($validated['user_address']) ? 1 : 0,
                'ContactName' => $validated['billing_ContactName'],
                'Address' => $validated['billing_Address'],
                'PostalCode' => $validated['billing_PostalCode'],
                'Neighborhood' => $validated['billing_Neighborhood'],
                'City' => $validated['billing_City'],
                'State' => $validated['billing_State'],
                'Email' => $validated['billing_address_email'],
                'Phone' => $validated['billing_address_phone'],
                'Status' => 0
            ]);
        }

        return redirect()->route('mayoristas.index')->with('success', 'Mayorista creado correctamente.');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        //
    }

    public function update(UserRequest $request, User $user)
    {
        //
    }

    public function destroy(User $user)
    {
        //
    }
}

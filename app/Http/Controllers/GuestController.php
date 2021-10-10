<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestRequest;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $guests = Guest::paginate();
        return view('guests.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(GuestRequest $request)
    {
        Guest::create($request->validated());
        return redirect()->route('guests.index')->with('success', 'Данные успешно добавлены');
    }

    /**
     * Display the specified resource.
     *
     * @param Guest $guest
     * @return Response
     */
    public function show(int $id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.show')->with(['guest' => $guest]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Guest $guest
     * @return Response
     */
    public function edit(int $id)
    {
        $guest = Guest::findOrFail($id);
        return view('guests.edit')->with(['guest' => $guest]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GuestRequest $request
     * @param Guest $guest
     * @return Response
     */
    public function update(GuestRequest $request, int $id)
    {
        Guest::where('id', $id)->update([
            'name' => $request->name,
            'age' => $request->age,
        ]);
        return redirect()->route('guests.index')->with('success', 'Данные успешно обновлены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id)
    {
        Guest::where('id', $id)->delete();
        return redirect()->route('guests.index')->with('success', 'Данные успешно удалены');
    }
}

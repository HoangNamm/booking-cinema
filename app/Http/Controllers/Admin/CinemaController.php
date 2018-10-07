<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaFilm;
use App\Http\Requests\CreateCinemaRequest;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cinemas = Cinema::orderBy('updated_at', config('define.dir_desc'))
            ->paginate(config('define.category.limit_rows'));
        return view('admin.pages.cinemas.index', compact('cinemas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.cinemas.create');
    }

    /**
     * Show the film for creating a new ticket.
     *
     *@param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function getRoom($id)
    {
        $rooms = CinemaFilm::find($id)->cinema->rooms;
        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCinemaRequest $request)
    {
        if (Cinema::create($request->all())) {
            return redirect()->route('admin.cinemas.index')->with('message', trans('cinema.admin.message.add'));
        }
        return redirect()->back()->with('message', trans('cinema.admin.message.add_fail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function edit(Cinema $cinema)
    {
        return view('admin.pages.cinemas.edit', compact('cinema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCinemaRequest $request, Cinema $cinema)
    {
        try {
            $cinema->update($request->all());
            return redirect()->route('admin.cinemas.index')
                ->with('message', trans('cinema.admin.message.edit'));
        } catch (Exception $e) {
            return redirect()->route('admin.cinemas.index')
                ->with('message', trans('cinemas.admin.message.edit_fail'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Cinema  $cinema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cinema $cinema)
    {
        try {
            $cinema->schedules()->delete();
            $cinema->delete();
            return redirect()->route('admin.cinemas.index')
                ->with('message', trans('cinema.admin.message.del'));
        } catch (Exception $e) {
            return redirect()->route('admin.cinemas.index')
                ->with('message', trans('cinema.admin.message.del_fail'));
        }
    }
}

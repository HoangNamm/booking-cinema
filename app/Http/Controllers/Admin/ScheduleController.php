<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Models\Schedule;
use App\Models\Film;
use App\Models\Room;
use App\Models\BookingDetail;
use App\Models\Ticket;
use App\Models\Cinema;
use App\Models\CinemaFilm;
use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getField = [
            'schedules.id as id',
            'rooms.name as name',
            'schedules.start_time',
            'schedules.end_time',
            'films.name as film_name',
            'cinemas.name as cinema_name',
        ];
        $schedules = DB::table('schedules')
            ->join('cinema_film', 'schedules.cinema_film_id', 'cinema_film.id')
            ->join('films', 'cinema_film.film_id', 'films.id')
            ->join('cinemas', 'cinemas.id', 'cinema_film.cinema_id')
            ->join('rooms', 'schedules.room_id', 'rooms.id')
            ->select($getField)
            ->where('schedules.deleted_at', null)
            ->orderBy('schedules.id')
            ->paginate(config('define.schedule.limit_rows'));
        return view('admin.pages.schedules.index', compact('schedules'));
    }

    /**
     * This function return view when create schedule
     *
     * @return void
     */
    public function create()
    {
        $cinemaFilms = CinemaFilm::whereIn('film_id', function($q){
            $q->select('id')
              ->from('films')
              ->where('end_date', '>=', now())
              ->where('start_date', '<=', now());
        })->get();
        return view('admin.pages.schedules.create', [
            'cinemaFilms' => $cinemaFilms
        ]);
    }

        /**
     * This function check valid time when create/update schedule
     *
     * @param [type] $schedules schedules
     * @param [type] $startTime startTime
     * @param [type] $endTime   endTime
     *
     * @return boolean
     */
    public function isValidTimeSchedule($schedules, $startTime, $endTime)
    {
        foreach ($schedules as $schedule) {
            $scheduleStartTime = $schedule->start_time;
            $scheduleEndTime = $schedule->end_time;
            if (($startTime >= $scheduleStartTime && $startTime <= $scheduleEndTime)
                || ($endTime >= $scheduleStartTime && $endTime <= $scheduleEndTime)
                || ($startTime <= $scheduleStartTime && $endTime >= $scheduleEndTime)
                ) {
                    return false;
            }
        }
        return true;
    }

    /**
     * This function store schedule
     *
     * @param CreateScheduleRequest $request request
     *
     * @return void
     */
    public function store(CreateScheduleRequest $request)
    {
        $startTime = new Carbon($request->starttime);
        $endTime = new Carbon($request->endtime);
        $film = Film::find($request->film);
        // if set time when film not release or out of date
        if (($startTime < $film->start_date) || ($endTime > $film->end_date)) {
            return redirect()->back()
                ->with('message', trans('schedule.admin.message.invalid_time_film') .
                $film->start_date . trans('schedule.admin.message.and') . $film->end_date);
        } else {
            // if set time between start or end time of another schedule
            $schedules = Schedule::where('schedules.room_id', $request->room)->get();
            if (!$this->isValidTimeSchedule($schedules, $startTime, $endTime)) {
                return redirect()->back()
                    ->with('message', trans('schedule.admin.message.room_invalid'));
            }
            // insert schedule to databases
            $data = [
                'cinema_film_id' => $request->film,
                'room_id' => $request->room,
                'start_time' => $startTime,
                'end_time' => $endTime
            ];
            $schedule = Schedule::create($data);
            Ticket::create([
                'schedule_id' => $schedule->id,
                'type' => request('type'),
                'price' => request('price')
            ]);
            return redirect()->route('admin.schedules.index')
                ->with('message', trans('schedule.admin.message.add'));
        }
    }

    /**
     * This function return view for edit
     *
     * @param Schedule $schedule schedule
     *
     * @return void
     */
    public function edit(Schedule $schedule)
    {
        $schedule = [
            'id' => $schedule->id,
            'start_time' => Carbon::parse($schedule->start_time)->format('d-m-Y H:i'),
            'end_time' => Carbon::parse($schedule->end_time)->format('d-m-Y H:i'),
            'room_id' => $schedule->room_id,
            'cinema_film_id' => $schedule->cinema_film_id
        ];
        $films = Film::where('end_date', '>=', now())->where('start_date', '<=', now())->get();
        $rooms = Room::all();
        $cinemas = Cinema::all();
        $ticket = Ticket::where('schedule_id', $schedule['id'])->first();
        return view('admin.pages.schedules.edit', [
            'schedule' => $schedule,
            'films' => $films,
            'rooms' => $rooms,
            'ticket' => $ticket,
            'cinemas' => $cinemas
        ]);
    }

    /**
     * This function save data update
     *
     * @param CreateScheduleRequest $request  request
     * @param Schedule              $schedule request
     *
     * @return void
     */
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $startTime = new Carbon($request->starttime);
        $endTime = new Carbon($request->endtime);
        $film = Film::find($request->film);
        // if set time when film not release or out of date
        if (($startTime < $film->start_date) || ($endTime > $film->end_date)) {
            return redirect()->back()
                        ->with('message', trans('schedule.admin.message.invalid_time_film') .
                        $film->start_date . trans('schedule.admin.message.and') . $film->end_date);
        } else {
            // if set time between start or end time of another schedule
            $schedules = DB::table('schedules')->where([
                ['schedules.room_id', '=', request('room')],
                ['schedules.id', '<>', $schedule->id]
            ])->get();
            if (!$this->isValidTimeSchedule($schedules, $startTime, $endTime)) {
                return redirect()->back()
                    ->with('message', trans('schedule.admin.message.room_invalid'));
            }
            $data = [
                'film_id' => $request->film,
                'room_id' => $request->room,
                'start_time' => $startTime,
                'end_time' => $endTime
            ];
            $schedule->update($data);
            $schedule->tickets()->update([
                'type' => request('type'),
                'price' => request('price')
            ]);
            return redirect()->route('admin.schedules.index')
                ->with('message', trans('schedule.admin.message.edit'));
        }
    }

    /**
     * Destroy schedule in admin dasboard
     *
     * @param Schedule $schedule schedule
     *
     * @return void
     */
    public function destroy(Schedule $schedule)
    {
        DB::beginTransaction();
        try {
            $bookingDetails = BookingDetail::with('ticket.schedule')
                ->whereIn('ticket_id', $schedule->tickets()->get(['tickets.id']))
                ->get();
            foreach ($bookingDetails as $bookingDetail) {
                $bookingDetail->delete();
            }
            $schedule->tickets()->delete();
            $schedule->delete();
            DB::commit();
            return redirect()->back()->with('message', trans('schedule.admin.message.del'));
        } catch (Exception $ex) {
            DB::rollBack();
            return redirect()->back()->with('message', trans('schedule.admin.message.del_fail'));
        }
    }
}

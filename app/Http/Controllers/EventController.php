<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\UserEvent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class EventController extends Controller
{
    public function index()
    {
        return view('event.index',
            ['events' => Event::query()->get()]);
    }

    public function view($slug)
    {
        return view('event.view',
            ['event' => Event::query()->where('slug', $slug)->first()]);
    }

    /*
     * Authenticated Admin methods
     * */
    public function adminIndex()
    {
        return view('admin.event.event',
            ['events' => Event::query()->get()]);
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $filename_event_image = '';
        if($request->hasFile('event_image')){

            $event_image = $request->file('event_image');
            $filename_event_image  = time().'.'.$event_image->getClientOriginalExtension();
            Image::make($event_image)->resize(1280, 720)
                ->save(base_path('public/photo/event/'. $filename_event_image ));
        }

        $slug = Str::slug($request->input('title'), '-');

        $newEvent = new Event;
        $newEvent->{'title'} = $request->input('title');
        $newEvent->{'slug'} = $slug;
        $newEvent->{'description'} = $request->input('description');
        $newEvent->{'image'} = $filename_event_image;
        $newEvent->{'event_date'} = $request->input('event_date');
        $newEvent->{'duration'} = $request->input('event_duration');

        $newEvent->save();

        toastr()->success('Event Created Successfully');
        return back();
    }

    public function registered()
    {
        $registeredEvents = UserEvent::with('event', 'user')
            ->whereStatus(UserEvent::STATUS[1])->get();


        return view('admin.event.registered',
            ['events' => $registeredEvents]);
    }

    /*
     * Authenticated User methods
     */
    public function attendEvent($slug): RedirectResponse
    {
        $event = Event::query()->where('slug', $slug)->first();
        $user = auth()->user();
        $eventExists = UserEvent::whereEventId($event->id)
            ->whereUserId($user->id)
            ->whereStatus(UserEvent::STATUS[1])->exists();

        if($eventExists){
            toastr()->error('You have already registered to attend this event');
            return back();
        }
        UserEvent::create([
            'event_id' => $event->id,
            'user_id' => auth()->user()->id,
            'status' => UserEvent::STATUS[1]
        ]);

        toastr()->success('Registered Event Successfully');
        return back();
    }

    public function userRegisteredEvents()
    {
        $registeredEvents = UserEvent::with('event')->whereUserId(auth()->user()->id)
            ->whereStatus(UserEvent::STATUS[1])->get();

        return view('user.event.event',
            ['events' => $registeredEvents]);
    }

    public function declineEvent($slug): RedirectResponse
    {
        $event = Event::query()->where('slug', $slug)->first();
        $user = auth()->user();
        $eventExists = UserEvent::whereEventId($event->id)
            ->whereUserId($user->id)
            ->whereStatus(UserEvent::STATUS[1])->first();

        if($eventExists){
            $eventExists->status = UserEvent::STATUS[2];
            $eventExists->save();
            toastr()->success('Event Declined.');
            return back();
        }
        return back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Hotel;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\Roomtype;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RoomFormRequest;

class RoomController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if(is_null($this->user) || !$this->user->can('Rooms.Index')) {
            abort(403, 'Sorry! You do not have permission to view any Room.');
        }
        
        return view('admin.room.index');
    }

    public function create()
    {
        if(is_null($this->user) || !$this->user->can('Rooms.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Room.');
        }
        
        $facilities = Facility::all()->where('is_active','1')->where('is_delete','1');
        $views = Roomtype::all()->where('is_active','1')->where('is_delete','1');
        return view('admin.room.create', compact('facilities', 'views'));
    }

    public function store(RoomFormRequest $request)
    {
        if(is_null($this->user) || !$this->user->can('Rooms.Create')) {
            abort(403, 'Sorry! You do not have permission to create any Room.');
        }
        
        $validatedData = $request->validated();

        $room = new Room();

        $room->name = $validatedData['name'];
        $room->slug = Str::slug($validatedData['slug']);
        $room->short_description = $validatedData['short_description'];
        $room->long_description = $validatedData['long_description'];
        $room->max_adults = $validatedData['max_adults'];
        $room->max_childs = $validatedData['max_childs'];
        $room->quantity = $validatedData['quantity'];
        $room->price = $validatedData['price'];
        $room->discount_rate = $validatedData['discount_rate'];
        $room->discount_price = $validatedData['discount_price'];

        $room->meta_title = $validatedData['meta_title'];
        $room->meta_keyword = $validatedData['meta_keyword'];
        $room->meta_decription = $validatedData['meta_decription'];

        $room->has_discount = $request->has_discount == true ? '1':'0';
        $room->is_active = $request->is_active == true ? '1':'0';
        $room->created_by = $validatedData['created_by'];
        $room->save();

        $facilities = Facility::find($request->facilities);
        $room->facilities()->sync($facilities);

        $views = Roomtype::find($request->roomViews);
        $room->roomViews()->sync($views);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/rooms/';
            $i = 1;

            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename =  $room->slug.'-'.time().'-'.$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $room->roomImages()->create([
                    'room_id' => $room->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('admin/room')->with('message','Congratulations! New Room Has Been Created Successfully.');
    }

    public function edit(int $room_id)
    {
        if(is_null($this->user) || !$this->user->can('Rooms.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Room.');
        }
        
        $room = Room::findOrFail($room_id);
        $facilities = Facility::all()->where('is_active','1')->where('is_delete','1');
        $roomFacilities = $room->facilities();
        $views = Roomtype::all()->where('is_active','1')->where('is_delete','1');
        $roomViews = $room->roomViews();
        return view('admin.room.edit', compact('room', 'facilities', 'roomFacilities', 'views', 'roomViews'));
    }

    public function update(RoomFormRequest $request, int $room_id)
    {
        if(is_null($this->user) || !$this->user->can('Rooms.Edit')) {
            abort(403, 'Sorry! You do not have permission to edit any Room.');
        }
        
        $validatedData = $request->validated();

        $room = Room::findOrFail($room_id);

        $room->name = $validatedData['name'];
        $room->slug = Str::slug($validatedData['slug']);
        $room->short_description = $validatedData['short_description'];
        $room->long_description = $validatedData['long_description'];
        $room->max_adults = $validatedData['max_adults'];
        $room->max_childs = $validatedData['max_childs'];
        $room->quantity = $validatedData['quantity'];
        $room->price = $validatedData['price'];
        $room->discount_rate = $validatedData['discount_rate'];
        $room->discount_price = $validatedData['discount_price'];

        $room->meta_title = $validatedData['meta_title'];
        $room->meta_keyword = $validatedData['meta_keyword'];
        $room->meta_decription = $validatedData['meta_decription'];

        $room->has_discount = $request->has_discount == true ? '1':'0';
        $room->is_active = $request->is_active == true ? '1':'0';
        $room->updated_by = $validatedData['updated_by'];
        $room->update();

        $facilities = Facility::find($request->facilities);
        $room->facilities()->sync($facilities);

        $views = Roomtype::find($request->roomViews);
        $room->roomViews()->sync($views);

        if($request->hasFile('image')){
            $uploadPath = 'uploads/rooms/';

            $i = 1;
            foreach($request->file('image') as $imageFile){
                $extension = $imageFile->getClientOriginalExtension();
                $filename =  $room->slug.'-'.time().'-'.$i++.'.'.$extension;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $room->roomImages()->create([
                    'room_id' => $room->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }

        return redirect('admin/room')->with('message','Congratulations! New Room Has Been Updated Successfully.');
    }
}

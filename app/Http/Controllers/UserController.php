<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Lesson;
use App\Models\Session;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users.index', compact('users'));
    }
    public function addUser()
    {
        $courses = Course::all();
        $users = User::all();
        return view('admin.pages.users.add', compact('users', 'courses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'course_id' => 'required',

        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->email_verified_at = Carbon::now();
        $user->save();

        $order = new Order();
        $order->user_id = $user->id;
        $order->course_id = $request->course_id;
        $order->save();

        $order_id = Order::all()->last()->id;
        $lessons = Lesson::where('course_id', $request->course_id)->get();
        foreach ($lessons as $lesson) {
            OrderItem::insert([
                'user_id' => $user->id,
                'order_id' => $order_id,
                'lesson_id' => $lesson->id,
                'created_at' => Carbon::now(),
            ]);
        }


        return redirect()->route('view-users')->with('success', 'User Added Successfully');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        $orders = Order::where('user_id', $id)->get();

        return view('admin.pages.users.edit', compact('user', 'orders'));
    }
    public function updateUser(Request $request)
    {

        $id = $request->id;


        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->email_verified_at = Carbon::now();
        $user->save();
        return redirect()->route('view-users');
    }
    public function deleteUser($id)
    {
        $deletedUsers = User::find($id)->delete();
        return Redirect()->route('view-users')->with('success', 'User moved to trash successfully');
    }
    public function revoke($id){
        $user = User::find($id);
        $user->user_agent = NULL;
        $user->save();
        $sessions = Session::where('user_id', $id)->get();
        foreach ($sessions as $session) {
            $session->delete();
        }
        
        return redirect()->route('view-users');
    }
}

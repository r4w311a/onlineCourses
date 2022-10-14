<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DeviceInspect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();//or $request->user()
        /* if ($user->device_id != $request->device()->id) {
            return redirect()->route('login');
        } */
        $user = User::find($user->id);
        // TODO get enabled device/s from datebase for $user - by userId
        $enabledDevice = $user->user_agent; //example
        $currentDevice = $request->userAgent(); //or $_SERVER['HTTP_USER_AGENT'];
        //it could be fake like codedge said
        
        if($enabledDevice == NULL){
            // TODO save current device to database for $user - by userId
            $user->user_agent = $currentDevice;
            $user->save();
            return $next($request);
        }
        else if ($enabledDevice !== $currentDevice) {
            $data = array(
                "device" => false,
                "message" => "Sorry, You can log in from 1 device only.",
            );
            return response([$data], 401); // or something else
        }
        
        return $next($request);
    }
}

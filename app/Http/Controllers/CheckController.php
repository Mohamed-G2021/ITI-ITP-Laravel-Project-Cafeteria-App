<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Order;
use  App\Models\User;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        /*start if from_date filtration based on inputs*/
        if ($request->has('from_date')) {
            $fromDate = date('Y-m-d', strtotime($request->input('from_date')));
            $query->where('created_at', '>=', $fromDate);
        }
        /*end if from_date filtration based on inputs*/

        /*start if to_date filtration based on inputs*/
        if ($request->has('to_date')) {
            $toDate = date('Y-m-d', strtotime($request->input('to_date')));
            $query->where('created_at', '<=', $toDate);
        }
        /*end if to_date filtration based on inputs*/

        /*start if user_id filtration based on inputs*/
        if ($request->has('user_id') && $request->input('user_id') !== "-1") {
            if ($request->input('user_id') !== "0") { //if user id = 0 ,then dont enter so $query get all users
                //return $request->input('user_id');
                $query->where('user_id', $request->input('user_id')); //if userid does not equal 0 so $query will get specific user
            }
        }
        /*end if user_id filtration based on inputs*/

        $orders = $query->with("user")->with('products')->get();
        $allusers = User::get();

        /*start filter function to get just user that has orders*/
        $users = $allusers->filter(function ($user) use ($orders) {
            return $orders->contains(function ($order) use ($user) {
                return $order->user->id === $user->id;
            });
        });
        /*end filter function to get just user that has orders*/

        /*start function to add total amout property from $orders to $users*/

        $users = $users->map(function ($user) use ($orders) {
            $userOrders = $orders->where('user_id', $user->id);
            $user->total_amount = $userOrders->sum('amount');
            return $user;
        });

        /*start function to add total amout property from $orders to $users*/

        // return $orders;
        //return $users;
        return view("checks", ['allusers' => $allusers, 'orders' => $orders, 'users' => $users]);
    }
}

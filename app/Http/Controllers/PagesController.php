<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = "Home";
        return view('welcome')->with('title',$title);
    }
    public function login(){
        $title = "Login";
        return view('index')->with('title',$title);
    }
public function dashboard(){
        $title = "Dashboard";
        return view('dashboard')->with('title',$title);
    }


    public function viewOrder(){
        $title = "View Orders";
        return view('orders.view')->with('title',$title);
    }
    public function editOrder(){
        $title = "Edit Order";
        return view('orders.edit')->with('title',$title);
    }


    public function viewSale(){
        $title = "View Sales";
        return view('sales.view')->with('title',$title);
    }
    public function editSale(){
        $title = "Edit Sale";
        return view('sales.edit')->with('title',$title);
    }


    public function viewExpense(){
        $title = "View ExpensesRecord";
        return view('expenses.view')->with('title',$title);
    }
    public function editExpense(){
        $title = "Edit ExpensesRecord";
        return view('expenses.edit')->with('title',$title);
    }


    public function viewSeedplant(){
        $title = "View Seeds Planted";
        return view('seeds.seedplant')->with('title',$title);
    }

    public function editSeedlingsPlant(){
        $title = "Edit Seedlings Planted";
        return view('seeds.seedlings')->with('title',$title);
    }


    public function about(){
        $title = "About";
        return view('about')->with('title',$title);
    }
    public function trial(){
        $title = "Trial";
        return view('trial')->with('title', $title);
    }
}

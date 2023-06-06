<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class ManageMenuController extends Controller
{
	public function menu()
	{
		$menu = Menu::with('submenu')->get();

		return view('products.show.menu', compact('menu'));
	}
}

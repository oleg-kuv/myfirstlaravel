<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
   public function home() {
      return view('home');
   }
   public function review() {
      return view('review');
   }
   public function review_check(Request $req) {
      $valid = $req->validate([
         'email' => 'required|min:4|max:100',
         'subject' => 'required|min:4|max:100',
         'message' => 'required|min:15|max:500',
      ]);
   }
}

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;


class AboutController extends Controller
{
    // Method to display "Sejarah" page
    public function sejarah()
    {
        return view('sejarah');
    }

    // Method to display "Visi & Misi" page
    public function visimisi()
    {
        return view('visimisi');
    }

    // Method to display "Organisasi" page
    public function organisasi()
    {
        return view('organisasi');
    }
}
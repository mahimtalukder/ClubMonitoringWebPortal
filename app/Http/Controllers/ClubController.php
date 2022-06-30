<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use PDF;

class ClubController extends Controller
{
   public function print()
   {
    $pdf = PDF::loadView('layouts.clubInfoPrintLayout');
    
    return $pdf->download('club_info.pdf');
   }
}

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
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
        $pdf = PDF::loadView('layouts.clubInfoPrintLayout', $data);

        return $pdf->download('club_info.pdf');
    }
}

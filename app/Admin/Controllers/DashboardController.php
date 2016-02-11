<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Admin\Repositories\Bills\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $payments = Payment::all();

        $total_amount_per_year = [];
        $total_amount_per_year['total'] = 0;

        foreach ($payments as $payment) {

            $year = date('Y', strtotime($payment->date));

            if (!array_key_exists($year, $total_amount_per_year)) {
                $total_amount_per_year[$year] = 0;
            }

            $total_amount_per_year[$year] += str_replace([' ', ','], ['', '.'], $payment->amount);
            $total_amount_per_year['total'] += str_replace([' ', ','], ['', '.'], $payment->amount);
        }

        krsort($total_amount_per_year);

        return view(
            'cvepdb.admin.dashboard.index',
            [
                'total_amount_per_year' => $total_amount_per_year
            ]
        );
    }
}
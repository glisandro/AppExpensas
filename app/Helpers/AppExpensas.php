<?php

namespace App\Helpers;

use Carbon\Carbon;

class AppExpensas
{
    public function getPeriodo($date)
    {
        $periodoActual = $this->getPeriodoActual($date);

        $periodoStartEnd = $periodoActual->copy();
        $periodoStartEnd->subMonth();

        return [
            'periodo' => ucfirst($periodoActual->formatLocalized('%B %Y')),
            'periodo_date' => $periodoActual->format('Y-m-01'),
            'desde' => $periodoStartEnd->startOfDay()->toDateString(),
            'desde_humans' => $periodoStartEnd->startOfDay()->formatLocalized('%d %B %Y'),
            'hasta' => $periodoStartEnd->endOfMonth()->toDateString(),
            'hasta_humans' => $periodoStartEnd->endOfMonth()->formatLocalized('%d %B %Y'),
        ];
    }

    protected function getPeriodoActual($periodo = null) : Carbon
    {
        if ($periodo === null){
            $periodo = Carbon::now()->format('Y-m');
        }

        return Carbon::parse($periodo);
    }

    public function redirectPreviousTab($tab)
    {
        return redirect(url()->previous() . "#/" . $tab);
    }
}
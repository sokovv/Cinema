<?php

namespace App\Services;


use App\Models\ShowTime;
use App\Models\Ticket;

class TicketService
{

    public  function ticketCreate($id, $row, $place, $arrTaken): mixed
    {
        $show_time = ShowTime::class::find($id);
        $row = json_decode($row);
        $place = json_decode($place);
        $arrTaken = json_decode($arrTaken);
        for ($i = 0; $i < count($row); $i++) {
            Ticket::class::create([
                'show_times_id' => $id,
                'places_id' => $arrTaken[$i],
                'films_id' => $show_time->film->id,
                'title' => $show_time->film->title,
                'row' => $row[$i],
                'place' => $place[$i],
            ]);
        }
        return $show_time;
    }

    public function ticketText($ticketsPay, $show_time): ?string
    {
        $text = null;
        foreach ($ticketsPay as $ticket) {
            $text .= "Row=$ticket->row, Place=$ticket->place, Show=$show_time->id||";
        }
        return $text;
    }

    public function ticketSum($ticketsPay): ?string
    {
        $sum = 0;
        foreach ($ticketsPay as $ticketSum) {
            $sum += $ticketSum->places->price;
        }
        return $sum;
    }

    public  function ticketSave(): void
    {
        $tickets = Ticket::class::get();
        foreach ($tickets as $ticket) {
            $ticket->qr = 1;
            $ticket->save();
        }
    }
}

<?php

namespace Modules\Front\UseCases\Menu;

use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class GetMenuCalendarArrayAction
{
    private array $calendar;

    public function __invoke(Carbon $date): array
    {
        $menus = Menu::Month($date->format('n'))->with('reservation')->get();
        $count = $date->copy()->lastOfMonth()->format('j');

        for ($i = 0; $i < $count; ++$i, $date->addDay()) {
            if ($date->isWeekday()) {
                $this->calendar[] = [
                    'date' => $date->copy(),
                    'menu' => $this->getMenuByDate($menus, $date->copy()),
                    'reservation' => $this->getReservation($menus, $date->copy()),
                ];
            }
        }

        return $this->calendar;
    }

    private function getMenuByDate(Collection $menus, Carbon $date)
    {
        foreach ($menus as $menu) {
            if ($menu->date->isSameDay($date)) {
                return $menu;
            }
        }

        return '';
    }

    private function getReservation(Collection $menus, Carbon $date)
    {
        foreach ($menus as $menu) {
            if ($menu->date->isSameDay($date)) {
                return $menu->reservation->first();
            }
        }

        return '';
    }
}

<?php

namespace Modules\Front\UseCases\Entry;

use App\Models\Entry;

class SaveEntryAction
{
    public function __invoke( array $request)
    {
        return Entry::create([
            'tournament_id' => $request['tournament_id'],
            'selected_fish_id_1' => $request['fishing_style'][0],
            'selected_fish_id_2' => $request['fishing_style'][1] ?? null,
            'name' => $request['name'],
            'email' => $request['email'],
            'tel' => $request['tel'],
            'is_join_fellowship' => $request['fellowship'],
        ]);
    }
}

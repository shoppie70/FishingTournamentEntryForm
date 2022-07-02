<?php

namespace Modules\Front\UseCases\Entry;

use App\Models\Entry;
use App\Models\Tournament;

class SaveEntryNumberAction
{
    public function __invoke(Entry $entry): void
    {
        $tournament = Tournament::find($entry->tournament_id);
        $tournament->last_entry_number = $tournament->last_entry_number + 1;
        $tournament->save();

        $entry->entry_number = $tournament->last_entry_number;
        $entry->save();
    }
}

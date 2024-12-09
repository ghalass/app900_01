<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Attributes\On;
use Livewire\Component;

class ConfigsSidebar extends Component
{
    #[On('site-deleted')]
    #[On('site-added')]
    public function render()
    {
        $sites_count = Site::count();
        $typeparcs_count = 11;

        $data = [
            'sites_count'       => $sites_count,
            'typeparcs_count'   => $typeparcs_count,
        ];
        return view('livewire.configs-sidebar', $data);
    }
}

<?php

namespace App\Livewire;

use App\Models\Engin;
use App\Models\Lubrifiant;
use App\Models\Organe;
use App\Models\Panne;
use App\Models\Parc;
use App\Models\Site;
use App\Models\Typelubrifiant;
use App\Models\Typeorgane;
use App\Models\Typepanne;
use App\Models\Typeparc;
use Livewire\Attributes\On;
use Livewire\Component;

class ConfigsSidebar extends Component
{
    #[On('record-crud')]
    public function render()
    {
        $data = [
            'sites_count'           => Site::count(),
            'typeparcs_count'       => Typeparc::count(),
            'parcs_count'           => Parc::count(),
            'engins_count'          => Engin::count(),
            'typepannes_count'      => Typepanne::count(),
            'pannes_count'          => Panne::count(),
            'typelubrifiants_count' => Typelubrifiant::count(),
            'lubrifiants_count'     => Lubrifiant::count(),
            'typeorganes_count'     => Typeorgane::count(),
            'organes_count'         => Organe::count(),
        ];

        return view('livewire.commun.configs-sidebar', $data);
    }
}

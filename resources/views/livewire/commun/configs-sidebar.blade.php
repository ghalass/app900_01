@php
    $list_config = [
        [
            'title' => 'Configs',
            'route' => 'configs',
            'icon' => 'bi bi-gear',
            'count' => 0,
        ],
        [
            'title' => 'Sites',
            'route' => 'configs.sites',
            'icon' => 'bi bi-geo-alt',
            'count' => $sites_count ?? 0,
        ],
        [
            'title' => 'Typeparcs',
            'route' => 'configs.typeparcs',
            'icon' => 'bi bi-geo-alt',
            'count' => $typeparcs_count ?? 0,
        ],
        [
            'title' => 'Parcs',
            'route' => 'configs.parcs',
            'icon' => 'bi bi-geo-alt',
            'count' => $parcs_count ?? 0,
        ],
        [
            'title' => 'Engins',
            'route' => 'configs.engins',
            'icon' => 'bi bi-geo-alt',
            'count' => $engins_count ?? 0,
        ],
        [
            'title' => 'Type pannes',
            'route' => 'configs.typepannes',
            'icon' => 'bi bi-geo-alt',
            'count' => $typepannes_count ?? 0,
        ],
        [
            'title' => 'Pannes',
            'route' => 'configs.pannes',
            'icon' => 'bi bi-geo-alt',
            'count' => $pannes_count ?? 0,
        ],
        [
            'title' => 'Type organes',
            'route' => 'configs.typeorganes',
            'icon' => 'bi bi-geo-alt',
            'count' => $typeorganes_count ?? 0,
        ],
        [
            'title' => 'Organes',
            'route' => 'configs.organes',
            'icon' => 'bi bi-geo-alt',
            'count' => $organes_count ?? 0,
        ],
        [
            'title' => 'Type lubrifiants',
            'route' => 'configs.typelubrifiants',
            'icon' => 'bi bi-geo-alt',
            'count' => $typelubrifiants_count ?? 0,
        ],
        [
            'title' => 'Lubrifiants',
            'route' => 'configs.lubrifiants',
            'icon' => 'bi bi-geo-alt',
            'count' => $lubrifiants_count ?? 0,
        ],
    ];
@endphp

<ul class="list-group">
    @foreach ($list_config as $item)
        <a wire:navigate href="{{ route($item['route']) }}"
            class="py-1 list-group-item d-flex justify-content-between align-items-center ">
            <div>
                <i class="{{ $item['icon'] }}"></i>
                {{ $item['title'] }}
            </div>
            @if ($item['title'] != 'Configs')
                <div>
                    <span class="badge text-bg-info rounded-pill"> {{ $item['count'] }}</span>
                </div>
            @endif
        </a>
    @endforeach
</ul>

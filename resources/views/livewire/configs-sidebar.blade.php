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
            'route' => 'configs.sites',
            'icon' => 'bi bi-geo-alt',
            'count' => $typeparcs_count ?? 0,
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

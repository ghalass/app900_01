<?php

namespace App\Livewire;

use App\Models\Site;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Sites extends Component
{
    public $id;
    public $name;
    public $description;

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholder', $params);
    }

    protected function rules()
    {
        return [
            'name' => 'required|unique:sites,name,' . $this->id,
            'description' => 'string|max:255',
        ];
    }

    function formReset()
    {
        $this->reset();
        $this->resetErrorBag();
    }

    // CREATE
    function create()
    {
        $this->formReset();
        $this->dispatch('show-create-modal');
    }
    function store()
    {
        $validated = $this->validate();

        if ($this->id) {
            $this->update();
        } else {
            Site::create($validated);

            $this->dispatch('success', ['message' => 'Ajouté avec succès!']);

            $this->formReset();
            $this->dispatch('close-modal');
            $this->dispatch('record-crud');
        }
    }

    // UPDATE
    function edit(Site $site)
    {
        $this->id = $site->id;
        $this->name = $site->name;
        $this->description = $site->description;

        $this->dispatch('show-create-modal');
    }
    public function update()
    {
        $this->validate();

        $site = Site::findOrFail($this->id);

        $site->name = $this->name;
        $site->description = $this->description;

        $site->save();

        $this->dispatch('info', ['message' => 'Modifié avec succès!']);
        $this->formReset();
        $this->dispatch('close-modal');
    }

    // DESTORY
    function delete(Site $site)
    {
        $this->id = $site->id;
        $this->name = $site->name;
        $this->description = $site->description;

        $this->dispatch('show-delete-modal');
    }
    function destroy()
    {
        $site = Site::findOrFail($this->id);
        $site->delete();

        $this->dispatch('warning', ['message' => 'Supprimé avec succès!']);
        $this->formReset();
        $this->dispatch('close-modal');
        $this->dispatch('record-crud');
    }

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    #[Url]
    public ?string $q = '';
    #[Url(as: 'p')]
    public $pagination = 10;
    public $pagination_options = [];

    public function render()
    {
        $this->pagination_options = [];
        sleep(1);
        $nbr = ceil(Site::count() / 10);
        for ($i = 1; $i <= $nbr; $i++) {
            array_push($this->pagination_options, $i * 10);
        }

        if (count($this->pagination_options) < 1) {
            array_push($this->pagination_options, 10);
        }

        if (!$this->q) {
            $sites = Site::orderBy('id', 'desc')->paginate($this->pagination);
        } else {
            $sites = Site::where('name', 'like', '%' . $this->q . '%')
                ->orWhere('description', 'like', '%' . $this->q . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagination);
        }


        return view('livewire.sites.index', [
            'sites' => $sites
        ]);
    }
    // Q in updatedQ for q variable of search
    public function updatedQ()
    {
        $this->resetPage();
    }
    // Pagination in updatedQ for pagination variable
    public function updatedPagination()
    {
        $this->resetPage();
    }
}

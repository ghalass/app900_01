<?php

namespace App\Livewire;

use App\Models\Typeparc;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Typeparcs extends Component
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
            'name' => 'required|unique:typeparcs,name,' . $this->id,
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
            Typeparc::create($validated);

            $this->dispatch('success', ['message' => 'Ajouté avec succès!']);

            $this->formReset();
            $this->dispatch('close-modal');
            $this->dispatch('record-crud');
        }
    }

    // UPDATE
    function edit(Typeparc $site)
    {
        $this->id = $site->id;
        $this->name = $site->name;
        $this->description = $site->description;

        $this->dispatch('show-create-modal');
    }
    public function update()
    {
        $this->validate();

        $site = Typeparc::findOrFail($this->id);

        $site->name = $this->name;
        $site->description = $this->description;

        $site->save();

        $this->dispatch('info', ['message' => 'Modifié avec succès!']);
        $this->formReset();
        $this->dispatch('close-modal');
    }

    // DESTORY
    function delete(Typeparc $site)
    {
        $this->id = $site->id;
        $this->name = $site->name;
        $this->description = $site->description;

        $this->dispatch('show-delete-modal');
    }
    function destroy()
    {
        $site = Typeparc::findOrFail($this->id);
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
        $nbr = ceil(Typeparc::count() / 10);
        for ($i = 1; $i <= $nbr; $i++) {

            array_push($this->pagination_options, $i * 10);
        }

        if (!$this->q) {
            $typeparcs = Typeparc::orderBy('id', 'desc')->paginate($this->pagination);
        } else {
            $typeparcs = Typeparc::where('name', 'like', '%' . $this->q . '%')
                ->orWhere('description', 'like', '%' . $this->q . '%')
                ->orderBy('id', 'desc')
                ->paginate($this->pagination);
        }


        return view('livewire.typeparcs.index', [
            'typeparcs' => $typeparcs
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

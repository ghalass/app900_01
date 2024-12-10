<?php

namespace App\Livewire;

use App\Models\Parc;
use App\Models\Typeparc;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Parcs extends Component
{
    public $id;
    public $name;
    public $typeparc_id;
    public $description;

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholder', $params);
    }

    protected function rules()
    {
        return [
            'name' => 'required|unique:parcs,name,' . $this->id,
            'typeparc_id' => 'required',
            // 'description' => 'string|max:255',
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
            Parc::create($validated);

            $this->dispatch('success', ['message' => 'Ajouté avec succès!']);

            $this->formReset();
            $this->dispatch('close-modal');
            $this->dispatch('record-crud');
        }
    }

    // UPDATE
    function edit(Parc $parc)
    {
        $this->id = $parc->id;
        $this->name = $parc->name;
        $this->typeparc_id = $parc->typeparc_id;
        $this->description = $parc->description;

        $this->dispatch('show-create-modal');
    }
    public function update()
    {
        $this->validate();

        $parc = Parc::findOrFail($this->id);

        $parc->name = $this->name;
        $parc->description = $this->description;
        $parc->typeparc_id = $this->typeparc_id;

        $parc->save();

        $this->dispatch('info', ['message' => 'Modifié avec succès!']);
        $this->formReset();
        $this->dispatch('close-modal');
    }

    // DESTORY
    function delete(Parc $parc)
    {
        $this->id = $parc->id;
        $this->name = $parc->name;
        $this->typeparc_id = $parc->typeparc_id;
        $this->description = $parc->description;

        $this->dispatch('show-delete-modal');
    }
    function destroy()
    {
        $parc = Parc::findOrFail($this->id);
        $parc->delete();

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
        $nbr = ceil(Parc::count() / 10);
        for ($i = 1; $i <= $nbr; $i++) {
            array_push($this->pagination_options, $i * 10);
        }

        if (count($this->pagination_options) < 1) {
            array_push($this->pagination_options, 10);
        }

        if (!$this->q) {
            $parcs = Parc::orderBy('id', 'desc')->paginate($this->pagination);
        } else {
            $parcs = Parc::where('name', 'like', '%' . $this->q . '%')
                ->orWhere('description', 'like', '%' . $this->q . '%')
                ->orWhereHas('typeparc', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->q . '%');
                })
                ->orderBy('id', 'desc')
                ->paginate($this->pagination);
        }


        return view('livewire.parcs.index', [
            'typeparcs' => Typeparc::all(),
            'parcs' => $parcs
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

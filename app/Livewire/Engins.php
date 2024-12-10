<?php

namespace App\Livewire;

use App\Models\Engin;
use App\Models\Parc;
use App\Models\Site;
use App\Models\Typeparc;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Engins extends Component
{
    public $id;
    public $name;
    public $typeparc_id;
    public $parc_id;
    public $site_id;
    public $description;

    public $engin;

    public $parcs;

    public function placeholder(array $params = [])
    {
        return view('livewire.placeholder', $params);
    }

    protected function rules()
    {
        return [
            'name' => 'required|unique:engins,name,' . $this->id,
            'parc_id' => 'required',
            'site_id' => 'required',
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
            Engin::create($validated);

            $this->dispatch('success', ['message' => 'Ajouté avec succès!']);

            $this->formReset();
            $this->dispatch('close-modal');
            $this->dispatch('record-crud');
        }
    }

    // UPDATE
    function edit(Engin $engin)
    {
        $this->id = $engin->id;
        $this->name = $engin->name;
        $this->typeparc_id = $engin->parc->typeparc_id;
        $this->parc_id = $engin->parc_id;
        $this->site_id = $engin->site_id;
        $this->description = $engin->description;

        $this->engin = $engin;

        $this->dispatch('load-parcs-list');

        $this->dispatch('show-create-modal');
    }
    public function update()
    {
        $this->validate();

        $engin = Engin::findOrFail($this->id);

        $engin->name = $this->name;
        $engin->parc_id = $this->parc_id;
        $engin->site_id = $this->site_id;
        $engin->description = $this->description;

        $engin->save();

        $this->dispatch('info', ['message' => 'Modifié avec succès!']);
        $this->formReset();
        $this->dispatch('close-modal');
    }

    // DESTORY
    function delete(Engin $engin)
    {
        $this->id = $engin->id;
        $this->name = $engin->name;
        $this->typeparc_id = $engin->parc->typeparc_id;
        $this->parc_id = $engin->parc_id;
        $this->site_id = $engin->site_id;
        $this->description = $engin->description;

        $this->dispatch('show-delete-modal');
    }
    function destroy()
    {
        $engin = Engin::findOrFail($this->id);
        $engin->delete();

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
        $nbr = ceil(Engin::count() / 10);
        for ($i = 1; $i <= $nbr; $i++) {
            array_push($this->pagination_options, $i * 10);
        }

        if (count($this->pagination_options) < 1) {
            array_push($this->pagination_options, 10);
        }

        if (!$this->q) {
            $engins = Engin::orderBy('id', 'desc')->paginate($this->pagination);
        } else {
            $engins = Engin::where('name', 'like', '%' . $this->q . '%')
                ->orWhere('description', 'like', '%' . $this->q . '%')
                ->orWhereHas('typeparc', function (Builder $query) {
                    $query->where('name', 'like', '%' . $this->q . '%');
                })
                ->orderBy('id', 'desc')
                ->paginate($this->pagination);
        }


        return view('livewire.engins.index', [
            'typeparcs' => Typeparc::all(),
            'parcs' => $this->parcs,
            'sites' => Site::all(),
            'engins' => $engins
        ]);
    }
    // Q in updatedQ for q variable of search
    public function updatedQ()
    {
        $this->resetPage();
    }

    #[On('load-parcs-list')]
    public function updatedTypeparcId()
    {
        $this->parcs = Parc::where('typeparc_id', $this->typeparc_id)->get();
    }

    // Pagination in updatedQ for pagination variable
    public function updatedPagination()
    {
        $this->resetPage();
    }
}

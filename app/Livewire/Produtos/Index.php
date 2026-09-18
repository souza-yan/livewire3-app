<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    #[Url(history: true)]
    public $search = '';

    public $sortField = 'id';

    public $sortDirection = 'asc';

    public $perPage = 100;

    #[On('produto-criado')]
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function OpenCreate()
    {

        $this->dispatch('modal-create');

    }

    public function delete($id)
    {
        Produto::findOrFail($id)->delete();

        session()->flash('mensagem', 'Registro excluído com sucesso!');
    }

    public function render()
    {
        $itens = Produto::query()
            ->when($this->search, function ($query) {
                $query->where('nome', 'like', '%'.$this->search.'%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.produtos.index', [
            'itens' => $itens,
        ]);
    }
}

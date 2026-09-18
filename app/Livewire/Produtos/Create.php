<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\On;

class Create extends Component
{
    #[Rule('required|min:3')]
    public $nome = '';

    #[Rule('nullable')]
    public $descricao = '';

    #[Rule('required|numeric|min:0')]
    public $preco = '';

    public $modal = false;

    public function save()
    {
        $this->validate();

        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
        ]);


        session()->flash('mensagem', 'Produto criado com sucesso!');

    }

    public function CloseModal()
    {
        $this->modal = false;
    }

    #[On('modal-create')]
    public function OpenModal()
    {
        $this->modal = true;
    }

    public function render()
    {
        return view('livewire.produtos.create');
    }
}

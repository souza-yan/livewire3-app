<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Edit extends Component
{
    public Produto $produto;

    #[Rule('required|min:3')]
    public $nome = '';

    #[Rule('nullable')]
    public $descricao = '';

    #[Rule('required|numeric|min:0')]
    public $preco = '';

    public function mount(Produto $produto)
    {
        $this->produto = $produto;

        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->preco = $produto->preco;
    }

    public function update()
    {
        $this->validate();

        $this->produto->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
        ]);

        session()->flash('mensagem', 'Produto atualizado com sucesso!');

        return redirect()->route('produtos.index');
    }

    public function render()
    {
        return view('livewire.produtos.edit');
    }
}

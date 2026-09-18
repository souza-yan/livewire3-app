<div>
    @if(
        $modal
    )
    <h1>Novo Produto</h1>

    <form wire:submit="save">
        <div>
            <label>Nome</label>
            <input type="text" wire:model="nome">
        </div>

        <div>
            <label>Descrição</label>
            <textarea wire:model="descricao"></textarea>

        </div>

        <div>
            <label>Preço</label>
            <input type="number" step="0.01" wire:model="preco">

        </div>

        <button type="submit">Salvar</button>
        <a href="{{ route('produtos.index') }}">Cancelar</a>
    </form>
    @endif
</div>

<div>
    <input type="text" wire:model="nome">

    <textarea wire:model="descricao"></textarea>

    <input type="number" wire:model="preco" step="0.01">

    <button wire:click="update">Salvar</button>
</div>

<div>
    @if (session()->has('mensagem'))
        <div class="alert">{{ session('mensagem') }}</div>
    @endif

    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Buscar...">

    <a href="{{ route('produtos.create') }}">Novo</a>

    <table>
        <thead>
            <tr>
                <th wire:click="sortBy('id')" style="cursor: pointer">
                    ID
                </th>
                <th wire:click="sortBy('nome')" style="cursor: pointer">
                    Nome
                </th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($itens as $item)
                <tr wire:key="item-{{ $item->id }}">
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->preco }}</td>
                    <td>
                        <a href="{{ route('produtos.edit', $item->id) }}">Editar</a>
                        <button wire:click="delete({{ $item->id }})"
                                wire:confirm="Tem certeza que deseja excluir?">
                            Excluir
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Nenhum registro encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

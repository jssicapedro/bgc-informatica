<div class="email">
    <label for="equipamento_id" class="form-label">Equipamento a ser reparado:</label>
    <select class="form-control" id="equipamento_id" name="equipamento_id" wire:model="equipamento" wire:change="onChange" required>
        <option value="">Selecione o equipamento</option>
        @foreach($equipamentos as $equipa)
            <option value="{{ $equipa->id }}"
                {{ old('equipamento_id') == $equipa->id ? 'selected' : '' }}>
                {{ $equipa->id }} - {{ $equipa->modelo->nome }} - {{ $equipa->modelo->marca->nome }} (
                de {{ $equipa->cliente->nome }} ) <!-- Exibindo id e nome da categoria -->
            </option>
        @endforeach
    </select>
</div>

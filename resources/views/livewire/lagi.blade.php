
<div>
    <div class="form-group">
        <label class="form-label" for="basic-url">Размеры комнаты</label>

        @foreach($room as $key =>$val )
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button class="btn btn-danger waves-effect waves-themed" type="button" wire:click.prevent="removeRoom({{$key}})">
                            <i class="fal fa-times"></i>
                        </button>
                    </div>
                    <input type="number" step="100" aria-label="Длина" class="form-control" placeholder="Длина" wire:model="room.{{$key}}.dlina">
                    <input type="number" step="100" aria-label="Ширина" class="form-control" placeholder="Ширина" wire:model="room.{{$key}}.shirina">
                    <div class="input-group-append">
                        <span class="input-group-text">мм</span>
                    </div>
                </div>
            </div>
        @endforeach
        <span class="help-block">Длина - направление лаги</span>
    </div>
    <button type="button" class="btn  btn-success waves-effect waves-themed" wire:click.prevent="addRoom">
        <span class="fal fa-plus mr-1"></span>
        Добавить комнату
    </button>
</div>

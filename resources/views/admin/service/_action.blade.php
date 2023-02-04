<td>
    <div class="btn-group">
        <button type="button" onclick="window.livewire.emit('setPage', 'edit', {{ $model->id }})" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button>
        <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $model->id }})"><i class="bi bi-trash"></i></button>
    </div>
    <a href="#" target="_blank" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Preview</a>
</td>

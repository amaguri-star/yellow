<button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#deleteModal-{{ $task->id }}">
    削除
</button>
<div class="modal fade" id="deleteModal-{{ $task->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">"{{ $task->name }}"</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">本当に削除しますか？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    やめる
                </button>
                {{-- <button type="button" class="btn btn-primary">削除</button> --}}
                <form method="POST" action="{{ route('tasks.destroy', ['task' => $task]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>

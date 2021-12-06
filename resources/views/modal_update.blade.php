<form wire:submit.prevent="update">
    <div wire:ignore.self class="modal fade" id="modalUpdateArtigo" tabindex="-1" aria-labelledby="modalUpdateArtigoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalUpdateArtigoLabel">Novo Artigo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="article_id" name="article_id" wire:model='article_id'>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title_edit" name="title_edit" placeholder="title" wire:model='title'>
                        @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url_edit" name="url_edit" placeholder="url" wire:model='url'>
                        @error('url') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imageUrl" class="form-label">Image URL</label>
                        <input type="text" class="form-control" id="imageUrl_edit" name="imageUrl_edit" placeholder="image url" wire:model='imageUrl'>
                        @error('imageUrl') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="newsSite" class="form-label">News Site</label>
                        <input type="text" class="form-control" id="newsSite_edit" name="newsSite_edit" placeholder="news site" wire:model='newsSite'>
                        @error('newsSite') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="publishedAt" class="form-label">Published At</label>
                        <input type="date" class="form-control" id="publishedAt_edit" name="publishedAt_edit" placeholder="published at" wire:model='publishedAt'>
                        @error('publishedAt') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="summary" class="form-label">Sumário</label>
                        <textarea class="form-control" id="summary_edit" name="summary_edit" rows="3" wire:model='summary'></textarea>
                        @error('summary') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</form>

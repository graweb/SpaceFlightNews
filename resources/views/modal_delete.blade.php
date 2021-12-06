<form wire:submit.prevent="delete">
    <div wire:ignore.self class="modal fade" id="modalDeleteArtigo" tabindex="-1" aria-labelledby="modalDeleteArtigoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalDeleteArtigoLabel">Deletar artigo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="article_id" name="article_id" wire:model='article_id'>
                    Deseja remover esse artigo?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Sim</button>
                </div>
            </div>
        </div>
    </div>
</form>

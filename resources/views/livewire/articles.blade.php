<div>
    <div class="row justify-content-end">
        <div class="col-4">
            <div class="input-group mb-3">
                <input wire:model="search" type="search" id="search" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-2">
            <select class="form-select" aria-label="Default select example" wire:model='sortAsc' id="sortAsc" name="sortAsc">
                <option value="asc">Mais antigas</option>
                <option value="desc">Mais novas</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="text-center">
            <img class="img-fluid" src="{{ asset('assets/image/logo_space.png') }}" />
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col-10">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovoArtigo">
                Novo artigo
            </button>
        </div>
    </div>

    @forelse  ($articles as $article)
        @if ($article->id % 2 == 0)
        <div class="col d-flex justify-content-center mt-4">
            <div class="card mb-3 border-0" style="max-width: 840px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #1E2022"><b>{{ $article->title }}</b></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $article->publishedAt }}
                            </h6>
                            <p class="card-text" style="color: #302E53">{{ $article->summary }}</p>
                            <a href="{{ $article->url }}" target="_blank" class="btn btn-secondary">Ver mais</a>
                            <button data-bs-toggle="modal" data-bs-target="#modalUpdateArtigo" wire:click="edit({{ $article->id }})" type="button" class="btn btn-warning">Editar</button>
                            <button data-bs-toggle="modal" data-bs-target="#modalDeleteArtigo" wire:click="showDeleteModal({{ $article->id }})" type="button" class="btn btn-danger">Remover</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ $article->imageUrl }}" class="img-fluid rounded" alt="">
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="col d-flex justify-content-center mt-4">
            <div class="card mb-3 border-0" style="max-width: 840px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $article->imageUrl }}" class="img-fluid rounded" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #1E2022"><b>{{ $article->title }}</b></h5>
                            <h6 class="card-subtitle mb-2 text-muted">
                                {{ $article->publishedAt }}
                            </h6>
                            <p class="card-text" style="color: #302E53">{{ $article->summary }}</p>
                            <a href="{{ $article->url }}" target="_blank" class="btn btn-secondary">Ver mais</a>
                            <button data-bs-toggle="modal" data-bs-target="#modalUpdateArtigo" wire:click="edit({{ $article->id }})" type="button" class="btn btn-warning">Editar</button>
                            <button data-bs-toggle="modal" data-bs-target="#modalDeleteArtigo" wire:click="showDeleteModal({{ $article->id }})" type="button" class="btn btn-danger">Remover</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    @empty
        <p>Nenhum artigo registrado</p>
    @endforelse

    @empty($search)
        <div class="col d-flex justify-content-center">
            <button wire:click="loadMore()" class="btn btn-outline-info">Carregar mais</button>
        </div>
    @endempty

    <!-- Modal Novo Artigo -->
    @include('modal_new')
    @include('modal_update')
    @include('modal_delete')
</div>

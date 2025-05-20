<div class="card shadow-sm rounded-3 my-4" style="max-width: 900px; margin: 0 auto;">
    <div class="card-header bg-primary text-white d-flex align-items-center gap-2" style="min-height: 60px;">
        <img src="{{ asset('Dall-E-White-Logo.png') }}" alt="DALL·E Logo" style="height:60px; width:auto;">
    </div>
    @if (session('error'))
        <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    <div class="card-body d-flex flex-column chatbox-body" style="background: #f8f9fa; min-height: 800px; height: 700px;">
        <div class="flex-grow-1 d-flex flex-column justify-content-center">
            @if ($imageUrl)
                <div class="text-center mt-2">
                    <img src="{{ $imageUrl }}" alt="Immagine generata" class="img-fluid rounded-3 shadow"
                        style="max-height: 420px;">
                    <div class="mt-2">
                        <a href="{{ $imageUrl }}" target="_blank" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-external-link-alt me-1"></i>Apri immagine originale
                        </a>
                    </div>
                </div>
            @else
                <div class="text-center text-muted my-auto" style="margin-top: 80px;">
                    <img src="{{ asset('dall-e.png') }}" style="width: 180px;" alt="DALL·E Logo">
                </div>
            @endif
        </div>
        @if(count($history) > 1)
            <div class="mb-4" style="max-height: 220px; overflow-y: auto;">
                <h6 class="fw-bold">Storico richieste</h6>
                <ul class="list-unstyled mb-0">
                    @foreach(array_reverse($history) as $item)
                        <li class="mb-2 pb-2 border-bottom">
                            <div class="small text-muted mb-1" style="word-break: break-word;">
                                <i class="fas fa-comment-dots me-1"></i>
                                <span class="fw-semibold">{{ $item['prompt'] }}</span>
                            </div>
                            <img src="{{ $item['url'] }}" alt="Immagine generata" class="img-fluid rounded shadow" style="max-height: 60px;">
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form wire:submit.prevent="generateImage" class="mt-2">
            <div class="input-group">
                <input wire:model.defer="prompt" type="text"
                    class="form-control @error('prompt') is-invalid @enderror"
                    placeholder="Descrivi l'immagine che vuoi generare...">
                <button type="submit" class="btn btn-primary d-flex align-items-center px-4">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
            @error('prompt')
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </form>
    </div>
</div>

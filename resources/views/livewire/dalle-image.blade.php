<div class="card shadow-sm rounded-3 my-4" style="max-width: 500px; margin: 0 auto;">
    <div class="card-header bg-primary text-white d-flex align-items-center gap-2" style="min-height: 60px;">
        <img src="{{ asset('Dall-E-White-Logo.png') }}" alt="DALL·E Logo" style="height:60px; width:auto;">
    </div>
    @if (session('error'))
    <div class="alert alert-danger mt-3">{{ session('error') }}</div>
    @endif
    <div class="card-body d-flex flex-column justify-content-between chatbox-body" style="background: #f8f9fa; min-height: 440px; height: 430px;">
        @if ($imageUrl)
            <div class="text-center mt-4">
                <img src="{{ $imageUrl }}" alt="Immagine generata" class="img-fluid rounded-3 shadow"
                    style="max-height: 320px;">
                <div class="mt-2">
                    <a href="{{ $imageUrl }}" target="_blank" class="btn btn-outline-success btn-sm">
                        <i class="fas fa-external-link-alt me-1"></i>Apri immagine originale
                    </a>
                </div>
            </div>
        @else
            <div class="text-center text-muted my-auto" style="margin-top: 80px;">
                <img src="{{ asset('dall-e.png') }}" style="width: 150px;" alt="DALL·E Logo">
            </div>
        @endif

        <form wire:submit.prevent="generateImage" class="mt-4">
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

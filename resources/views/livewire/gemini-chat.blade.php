<div class="card shadow-sm rounded-3 my-4" style="max-width: 900px; margin: 0 auto;">
    <div class="card-header bg-primary text-white d-flex align-items-center gap-2" style="min-height: 60px;">
        <img src="{{ asset('gemini-brand.png') }}" alt="Gemini Logo" style="height:36px; width:auto;">
    </div>
    <div class="card-body d-flex flex-column" style="height: 770px; overflow-y: auto; background: #f8f9fa;">
        @forelse ($messages as $msg)
            <div class="mb-3">
                <div class="d-flex flex-column align-items-end">
                    <div class="bg-primary text-white rounded px-3 py-2 mb-1" style="max-width: 80%;">
                        <span>{{ $msg['user'] }}</span>
                    </div>
                    <small class="text-muted">Tu</small>
                </div>
                <div class="d-flex flex-column align-items-start mt-2">
                    <div class="bg-white border rounded px-3 py-2" style="max-width: 80%;">
                        <span style="white-space: pre-line;">{{ $msg['gemini'] }}</span>
                    </div>
                    <small class="text-muted">Gemini</small>
                </div>
            </div>
        @empty
            <div class="text-center text-muted my-auto" style="margin-top: 120px;">
                <img src="{{asset('gemini-logo.png')}}" class="img fluid" style="width: 150px; height:auto" alt="">
            </div>
        @endforelse
    </div>
    <div class="card-footer bg-white border-0">
        <form wire:submit.prevent="sendPrompt" class="d-flex gap-2">
            <input wire:model.defer="prompt" id="prompt" type="text" class="form-control @error('prompt') is-invalid @enderror" placeholder="Scrivi un messaggio..." autocomplete="off">
            <button type="submit" class="btn btn-primary d-flex align-items-center">
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
        @error('prompt')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>

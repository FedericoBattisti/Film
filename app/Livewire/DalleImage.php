<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DalleImage extends Component
{
    public $prompt = '';
    public $imageUrl = null;
    public $history = [];

    public function mount()
    {
        $this->history = session('dalle_history', []);
    }

    public function generateImage()
    {
        $this->validate([
            'prompt' => 'required|string|min:3',
        ]);

        try {
            $apiKey = env('OPENAI_API_KEY');
            $response = Http::withToken($apiKey)
                ->post('https://api.openai.com/v1/images/generations', [
                    'model' => 'dall-e-3',
                    'prompt' => $this->prompt,
                    'n' => 1,
                    'size' => '1024x1024',
                ]);

            $data = $response->json();
            $this->imageUrl = $data['data'][0]['url'] ?? null;

            // Salva nello storico
            if ($this->imageUrl) {
                $this->history[] = [
                    'prompt' => $this->prompt,
                    'url' => $this->imageUrl,
                ];
                // Aggiorna la sessione
                session(['dalle_history' => $this->history]);
            }

            $this->prompt = '';
        } catch (\Throwable $e) {
            $this->imageUrl = null;
            session()->flash('error', 'Errore generazione immagine: ' . $e->getMessage());
            $this->prompt = '';
        }
    }

    public function render()
    {
        return view('livewire.dalle-image');
    }
}

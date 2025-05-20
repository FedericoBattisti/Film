<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class DalleImage extends Component
{
    public $prompt = '';
    public $imageUrl = null;

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
        } catch (\Throwable $e) {
            $this->imageUrl = null;
            session()->flash('error', 'Errore generazione immagine: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.dalle-image');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;

class GeminiChat extends Component
{
    public $response = null;
    public $prompt = '';

    public function mount()
    {
        // Esegui una chiamata di esempio solo per test (NON in produzione)
        // In produzione, sposta la logica in un metodo chiamato da un evento Livewire
        try {
            // Assicurati che le classi Gemini siano autoloaded e configurate
            $yourApiKey = env('GEMINI_API_KEY');
            if ($yourApiKey) {
                $client = \Gemini::client($yourApiKey);

                $result = $client->generativeModel(model: 'gemini-2.0-flash')->generateContent('Hello');
                $this->response = $result->text();
            } else {
                $this->response = 'API Key non configurata.';
            }
        } catch (\Throwable $e) {
            $this->response = 'Errore: ' . $e->getMessage();
        }
    }

    public function sendPrompt()
    {
        $this->validate([
            'prompt' => 'required|string|min:2',
        ]);

        try {
            $yourApiKey = env('GEMINI_API_KEY');
            if ($yourApiKey) {
                $client = \Gemini::client($yourApiKey);
                $result = $client->generativeModel(model: 'gemini-2.0-flash')->generateContent($this->prompt);
                $this->response = $result->text();
                $this->prompt = ''; // Svuota il campo dopo la risposta
            } else {
                $this->response = 'API Key non configurata.';
            }
        } catch (\Throwable $e) {
            $this->response = 'Errore: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.gemini-chat');
    }
}
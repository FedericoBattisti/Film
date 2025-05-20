<?php

namespace App\Livewire;

use Livewire\Component;

class GeminiChat extends Component
{
    public $prompt = '';
    public $messages = []; // array di messaggi

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
                // Salva prompt e risposta nello storico
                $this->messages[] = [
                    'user' => $this->prompt,
                    'gemini' => $result->text(),
                ];
                $this->prompt = '';
            } else {
                $this->messages[] = [
                    'user' => $this->prompt,
                    'gemini' => 'API Key non configurata.',
                ];
                $this->prompt = '';
            }
        } catch (\Throwable $e) {
            $this->messages[] = [
                'user' => $this->prompt,
                'gemini' => 'Errore: ' . $e->getMessage(),
            ];
            $this->prompt = '';
        }
    }

    public function render()
    {
        return view('livewire.gemini-chat');
    }
}
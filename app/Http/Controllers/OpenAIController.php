<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenAIController extends Controller
{
    /**
     * Method to generate text using OpenAI's GPT-3 model.
     */
    public function generateText(Request $request)
    {

        $request->validate([
            'prompt' => 'required|string|max:500',
        ]);


        $prompt = $request->input('prompt');


        $client = new Client();


        $apiKey = env('OPENAI_API_KEY');


        $data = [
            'model' => 'gpt-3.5-turbo', // You can use 'gpt-4' if you have access
            'prompt' => $prompt,
            'max_tokens' => 150, // Maximum number of tokens (words/phrases) in the output
            'temperature' => 0.7,  // Controls randomness of the output (0 = deterministic, 1 = creative)
            'top_p' => 1.0,        // Controls the diversity of the output
            'frequency_penalty' => 0.0, // Penalty for repeating phrases
            'presence_penalty' => 0.0,  // Penalty for repeating words
        ];

        // Make a POST request to OpenAI API
        try {
            $response = $client->post('https://api.openai.com/v1/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            // Parse the response and get the generated text
            $responseData = json_decode($response->getBody()->getContents(), true);
            $generatedText = $responseData['choices'][0]['text'];

            // Return the generated text in the response
            return response()->json([
                'generated_text' => $generatedText
            ]);

        } catch (\Exception $e) {
            // Handle error
            return response()->json([
                'error' => 'Failed to generate text. Please try again later.',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

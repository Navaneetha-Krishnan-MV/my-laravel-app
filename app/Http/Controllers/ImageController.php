<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function index()
    {
        return view('image-form');
    }

    public function generateImage(Request $request)
{
    set_time_limit(0);

    $request->validate([
        'prompt' => 'required|string|max:255',
    ]);

    $prompt = $request->input('prompt');

    try {
        // Make API call to Hugging Face
        $response = retry(5, function () use ($prompt) {
            return Http::withOptions([
                'timeout' => 120,
                'verify' => false,
            ])->withHeaders([
                'Authorization' => 'Bearer ' . env('HUGGINGFACE_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api-inference.huggingface.co/models/black-forest-labs/FLUX.1-dev', [
                'inputs' => $prompt,
            ]);
        }, 2000); // Retry every 2 seconds

        // Log the response status and body
        \Log::info('API Response Status: ' . $response->status());
        \Log::info('API Response Body: ' . $response->body());

        // Check for failure
        if ($response->failed()) {
            return back()->withErrors('Failed to fetch the image. Please try again.');
        }

        // Save the image as a blob URL
        $imageBlob = $response->body();
        $imageBase64 = base64_encode($imageBlob);
        $imageSrc = "data:image/png;base64," . $imageBase64;

        return view('image-form', compact('imageSrc', 'prompt'));
    } catch (\Exception $e) {
        \Log::error('Image Generation Error: ' . $e->getMessage());
        return back()->withErrors('An error occurred: ' . $e->getMessage());
    }
}

}

<?php

namespace App\Livewire\Swiper;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Swiper extends Component
{
    public $cats = [];
    public $liked = [];

    // Fetch 10 cats from Cataas
    public function mount()
    {
        $response = Http::get('https://cataas.com/api/cats?limit=10');

        //dd($response->json());
        
        $this->cats = collect($response->json())->map(function ($cat, $index) {
            $id = $cat['id'] ?? null;

            return [
                'id' => $id ?? $index,
                'image' => $id
                ? "https://cataas.com/cat/{$id}?width=350&height=750"
                : "https://cataas.com/cat?width=350&height=750",
                'name'  => fake()->firstName(),
                'desc'  => fake()->sentence(6),
            ];
        })->toArray();
    }

    public function swipe($catId, $liked)
    {
        $cat = collect($this->cats)->firstWhere('id', $catId);

        if ($liked && $cat) {
            $this->liked[] = $cat;
        }

        // Remove cat from the stack
        $this->cats = array_values(array_filter($this->cats, fn($c) => $c['id'] !== $catId));
    }

    public function reloadCats()
    {
        $this->mount();
    }

    public function render()
    {
        return view('livewire.swiper.swiper');
    }
}

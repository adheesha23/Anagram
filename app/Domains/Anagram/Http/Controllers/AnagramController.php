<?php

namespace App\Domains\Anagram\Http\Controllers;

use App\Domains\Anagram\Services\AnagramService;
use App\Http\Controllers\Controller;

class AnagramController extends Controller
{
    /**
     * @var AnagramService
     */
    private $anagramService;

    /**
     * @param AnagramService $anagramService
     */
    public function __construct(AnagramService $anagramService)
    {
        $this->anagramService = $anagramService;
    }

    public function index(): array
    {
        $dictionary = $this->anagramService->prepareDictionary(["East", "seat", "teas", "eats"]);
        return $this->anagramService->getAnagrams($dictionary, "seat");
    }
}

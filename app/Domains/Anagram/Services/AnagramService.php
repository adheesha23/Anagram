<?php

namespace App\Domains\Anagram\Services;

use Faker\Factory as Faker;

class AnagramService
{
    /**
     * Get matching anagrams by providing dictionary array and a word string
     * @param array $dictionary
     * @param string $word
     * @return array
     */
    public function getAnagrams(array $dictionary, string $word): array
    {
        $wordLength = strlen($word);
        $wordLetters = str_split(strtolower($word));
        sort($wordLetters);

        $anagrams = array_filter($dictionary, function ($dictWord) use ($word, $wordLength) {
            return strlen($dictWord) === $wordLength && $this->isAnagram($word, $dictWord);
        });

        return array_values($anagrams);
    }

    /**
     * Check if is Anagram
     * @param string $word1
     * @param string $word2
     * @return bool
     */
    private function isAnagram(string $word1, string $word2): bool
    {
        $sortedWord1 = $this->sortLetters($word1);
        $sortedWord2 = $this->sortLetters($word2);
        return $sortedWord1 === $sortedWord2 && strtolower($word1) !== strtolower($word2);
    }

    /**
     * Sorting letters
     * @param string $word
     * @return string
     */
    private function sortLetters(string $word): string
    {
        $letters = str_split(strtolower($word));
        sort($letters);
        return implode('', $letters);
    }

    /**
     * @param $wordsArray
     * @return mixed
     */
    public function prepareDictionary($wordsArray)
    {
        $faker = Faker::create();

        $words = array_map(function () use ($faker) {
            return $faker->word;
        }, array_fill(0, 1000000, null));

        return array_merge($words, $wordsArray);
    }
}

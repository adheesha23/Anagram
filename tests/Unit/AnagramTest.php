<?php

namespace Tests\Unit;

use App\Domains\Anagram\Services\AnagramService;
use PHPUnit\Framework\TestCase;

class AnagramTest extends TestCase
{
    /**
     * @return void
     */
    public function testGetAnagrams()
    {
        $service = new AnagramService();
        $dictionary = $service->prepareDictionary(["east", "seat", "teas", "eats", "apple", "banana"]);

        $this->assertEquals(["seat", "teas", "eats"], $service->getAnagrams($dictionary, "east"));
        $this->assertEquals([], $service->getAnagrams($dictionary, "apple"));
        $this->assertEquals([], $service->getAnagrams($dictionary, "banana"));
        $this->assertEquals([], $service->getAnagrams($dictionary, "test"));
        $this->assertEquals([], $service->getAnagrams($dictionary, ""));
        $this->assertEquals(["East", "Teas", "eats"], $service->getAnagrams($service->prepareDictionary(["East", "seat", "Teas", "eats"]), "seat"));
        $this->assertEquals(["east", "teas", "eats", "eats"], $service->getAnagrams($service->prepareDictionary(["east", "seat", "teas", "eats", "seat", "eats"]), "seat"));
        $this->assertEquals(["east", "teas", "eats"], $service->getAnagrams($service->prepareDictionary(["east", "seat", "teas", "eats", "seat", "eatss"]), "seat"));
        $this->assertEquals(["123"], $service->getAnagrams(["123", "456", "789"], "321"));
    }
}

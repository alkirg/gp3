<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    const NAMES = [
        'The Witcher 3: Wild Hunt',
        'Overwatch',
        'Deus Ex: Mankind Divided',
        'World of WarCraft',
        'Call of Duty: Black ops II',
        'Batman'
    ];
    const MIN_CATEGORY = 1;
    const MAX_CATEGORY = 5;
    const MIN_IMAGE = 1;
    const MAX_IMAGE = 8;
    const PREVIEW_LENGTH = 100;
    const DETAIL_LENGTH = 1000;
    const MIN_PRICE = 2;
    const MAX_PRICE = 5;
    const PRICE_MULTIPLICATOR = 100;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => self::NAMES[array_rand(self::NAMES)],
            'category_id' => mt_rand(self::MIN_CATEGORY, self::MAX_CATEGORY),
            'price' => self::PRICE_MULTIPLICATOR * mt_rand(self::MIN_PRICE, self::MAX_PRICE),
            'preview_picture' => 'images/game-' . mt_rand(self::MIN_IMAGE, self::MAX_IMAGE) . '.jpg',
            'detail_picture' => 'images/game-' . mt_rand(self::MIN_IMAGE, self::MAX_IMAGE) . '.jpg',
            'preview_text' => $this->faker->realText(self::PREVIEW_LENGTH),
            'detail_text' => $this->faker->realText(self::DETAIL_LENGTH)
        ];
    }
}

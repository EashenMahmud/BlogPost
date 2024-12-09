<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'title_first' => 'Our',
                'title_second' => 'Mission',
                'content' => 'To deliver state-of-the-art software development and engineering solutions to empower our clients with essential information management systems, meeting their specific requirements in the realms of business and the environment.',
                'icon' => 'mission.png',
                'order' => 1,
            ],
            [
                'title_first' => 'Our',
                'title_second' => 'Vision',
                'content' => 'Our vision is to become a leading global provider of innovative technology solutions engineering solutions to empower our clients with essential information management systems, meeting their specific requirements in the realms of business and the environment.',
                'icon' => 'vision.png',
                'order' => 2,
            ],
            [
                'title_first' => 'We',
                'title_second' => 'Value',
                'content' => 'Our Value is to become a leading global provider of innovative technology solutions engineering solutions to empower our clients with essential information management systems, meeting their specific requirements in the realms of business and the environment.',
                'icon' => 'value.png',
                'order' => 3,
            ],
            [
                'title_first' => 'We',
                'title_second' => 'Promise',
                'content' => 'Our Promise is to become a leading global provider of innovative technology solutions engineering solutions to empower our clients with essential information management systems, meeting their specific requirements in the realms of business and the environment.',
                'icon' => 'promise.png',
                'order' => 4,
            ],
            [
                'title_first' => 'We',
                'title_second' => 'Dreams',
                'content' => 'Our Promise is to become a leading global provider of innovative technology solutions engineering solutions to empower our clients with essential information management systems, meeting their specific requirements in the realms of business and the environment.',
                'icon' => 'promise.png',
                'order' => 5,
            ],
        ];

        foreach ($sections as $section) {
            Section::create($section);
        }
    }
}

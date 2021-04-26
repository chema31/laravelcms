<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);

        Page::truncate();

        $about = new Page([
            'title' => 'About',
            'url' => 'about',
            'content' => 'Content for about us'
        ]);
        $contact = new Page([
                'title' => 'Contact',
                'url' => 'contact',
                'content' => 'Content for contact us'
        ]);
        $faq = new Page([
                'title' => 'FAQ',
                'url' => 'faq',
                'content' => 'Content for FAQ'
        ]);

        $admin->pages()->saveMany([
            $about,
            $contact,
            $faq
        ]);

        $about->appendNode($faq);
    }
}

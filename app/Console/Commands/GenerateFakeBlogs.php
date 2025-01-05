<?php

namespace App\Console\Commands;

use App\Models\Blog;
use Illuminate\Console\Command;
use Faker\Factory as Faker;

class GenerateFakeBlogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:blogs {count=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate fake blog content with styled HTML';
    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->argument('count');
        $faker = Faker::create(); // Adjust locale if needed, e.g., 'ml_IN' for Malayalam

        for ($i = 0; $i < $count; $i++) {
            $title = $faker->sentence;
            $htmlContent = $this->generateStyledHtmlContent($faker);

            // Assuming you have a Blog model with title and content fields
            Blog::create([
                'title' => $title,
                'content' => $htmlContent,
            ]);

            $this->info("Blog '{$title}' created successfully.");
        }

        $this->info("Successfully created {$count} fake blogs.");

        return Command::SUCCESS;
    }

    /**
     * Generate large styled HTML content.
     *
     * @param \Faker\Generator $faker
     * @return string
     */
    private function generateStyledHtmlContent($faker)
    {
        $numParagraphs = 50; // Increase the number of paragraphs
        $numSentencesPerParagraph = 20; // Increase sentences per paragraph
        $numLists = 10; // Increase the number of lists
        $listItemsPerList = 15; // Increase items per list

        $paragraphs = collect(range(1, $numParagraphs))
            ->map(fn() => "<p>" . $faker->paragraph($numSentencesPerParagraph) . "</p>")
            ->implode("\n");

        $listItems = collect(range(1, $numLists))
            ->map(fn() => "<ul>" . collect(range(1, $listItemsPerList))
                ->map(fn() => "<li>{$faker->sentence}</li>")
                ->implode("\n") . "</ul>")
            ->implode("\n");

        return <<<HTML
            <h1>{$faker->sentence}</h1>
            {$paragraphs}
            <h2>{$faker->sentence}</h2>
            {$listItems}
            {$paragraphs}
HTML;
    }
}

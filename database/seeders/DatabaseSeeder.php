<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        \App\Models\Post::factory(1)->create();

        $postTitle = sprintf("Hello User, Welcome to %s!", config('app.name'));
        \App\Models\Post::create([
            'user_id' => 1,
            'title' => str($postTitle)->title(),
            'slug' => str($postTitle)->slug(),
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti labore aliquid eum. Voluptate quaerat sapiente sint tempore consequatur, impedit vero fugit optio repellendus, iste officia itaque doloribus sequi incidunt perferendis assumenda fuga aliquam similique explicabo, repudiandae nisi blanditiis magni fugiat! Aliquid facilis inventore autem sunt praesentium rerum incidunt ducimus ipsum tempora repudiandae ab earum, nesciunt doloremque dolore ea ipsam dolorem velit saepe quod non voluptatum quasi soluta. Suscipit cum obcaecati deserunt cupiditate nam molestiae. Possimus laborum tenetur voluptatibus voluptatem, provident cumque reprehenderit aspernatur placeat sit eius corrupti odit? Aliquid, soluta assumenda quaerat, blanditiis saepe doloribus asperiores obcaecati rerum quia consectetur eos molestias culpa! Tempore dicta, autem cumque delectus culpa id consequatur adipisci aperiam ullam officia! Aspernatur voluptates labore officia tenetur minima, inventore doloremque ad, sequi reprehenderit veniam adipisci voluptatem minus quia. Necessitatibus rem iure ratione, corporis quos veritatis dicta animi dolorum vitae ex accusantium deleniti obcaecati voluptatem maiores, libero officia sit pariatur architecto. Cum dolores rem suscipit, eos harum alias soluta. Corporis debitis, eius possimus sit quia quaerat error nobis quibusdam fugiat officiis nam sapiente beatae saepe quis repudiandae, pariatur repellendus aperiam doloribus? Officia repudiandae eos sequi veniam officiis harum delectus consequatur facere sit a quam nostrum alias eum, mollitia culpa repellat aperiam perferendis excepturi animi, eveniet odio. Officia facilis mollitia similique fuga debitis, eum accusantium. Perspiciatis quisquam nulla debitis amet minus blanditiis! Libero eveniet mollitia, aspernatur in, praesentium tempora animi dolorum error reprehenderit modi culpa eius repudiandae ducimus commodi quas nisi illo voluptates velit? Autem quisquam praesentium maiores eum nostrum nemo harum aspernatur adipisci culpa vero saepe aliquid nisi aut quo voluptas necessitatibus, doloribus sunt, deleniti ullam? Vero officia laborum esse nulla perspiciatis alias architecto. Suscipit a harum perspiciatis voluptatibus omnis fugiat quo nemo voluptatum, quis sint minima voluptate nobis officiis natus repudiandae dicta laborum consectetur delectus? Perspiciatis quae reiciendis repellat et sint. Inventore ea harum quasi. Nihil corrupti nemo consectetur odio fuga mollitia quia magni atque debitis voluptatum hic exercitationem, dolore earum ad, fugiat aliquam neque. Iusto debitis voluptatem atque quis necessitatibus temporibus suscipit tempora eos nostrum maxime? Id distinctio aspernatur enim. Recusandae, quod natus? Blanditiis quibusdam, odit veritatis accusantium adipisci natus, aperiam neque incidunt, commodi laborum doloremque corporis odio sed. Laborum quis ullam molestiae explicabo ratione maiores earum ipsam repellat repudiandae vero at dolore iure suscipit unde, officiis deserunt possimus labore delectus, provident numquam architecto reiciendis nesciunt sed esse! Assumenda eligendi aperiam doloribus voluptatibus quia recusandae cum, rem minus expedita consequuntur unde tenetur, itaque vitae perspiciatis est molestias. Incidunt, tempora minus. Quam obcaecati optio blanditiis, quae nulla esse nisi minus ipsum nihil. Assumenda tempore perspiciatis id libero sunt laborum similique mollitia nostrum beatae. Exercitationem enim commodi expedita quis ipsam perspiciatis, illo ducimus pariatur quam hic voluptate unde vel nihil accusamus dolores, doloribus inventore molestias corporis aperiam laborum labore dolor tempora ut veritatis. Ea obcaecati, voluptates iure dicta sequi dolores facilis incidunt asperiores quisquam, exercitationem id, placeat labore vitae numquam accusantium quidem autem quam quasi voluptatum laborum voluptate in inventore? Libero maiores maxime officia reiciendis. Ut, ullam nostrum.',
            'tags' => json_encode(['welcome', 'blog'])
        ]);

        \App\Models\Post::factory(10)->create();

        DB::commit();
    }
}

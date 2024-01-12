<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    */
   public function run(): void
   {
      //users
      //id 1
      \App\Models\User::factory()->create([
         'id' => 1,
         'name' => 'Deleted',
         'email' => 'Deleted',
         'password' => 'shouldBeSomeVeryLongAndComplexPW',
         'is_admin' => 0
      ]);
      //id 2
      \App\Models\User::factory()->create([
         'id' => 2,
         'name' => 'superAdmin',
         'email' => 'superAdmin',
         'password' => 'shouldBeSomeVeryLongAndComplexPW',
         'is_admin' => 1
      ]);

      //id 3
      \App\Models\User::factory()->create([
         'name' => 'admin',
         'email' => 'admin@ehb.be',
         'password' => 'Password!321',
         'is_admin' => 1
      ]);

      //id 4
      \App\Models\User::factory()->create([
         'name' => 'TestUser1',
         'email' => 'test1@student.ehb.be',
         'password' => 'Test1234'
      ]);

      //id 5
      \App\Models\User::factory()->create([
         'name' => 'TestUser2',
         'email' => 'test2@student.ehb.be',
         'password' => 'Test1234'
      ]);

      \App\Models\userinfo::factory()->create([
         'user_id' => 4,
         'birthday' => '2000-01-01',
         'bio' => 'Buiten het spelen van games is TestUser1 ook betrokken bij de online gaminggemeenschap, waar hij/zij actief is op platforms zoals Twitch en YouTube om zijn/haar speedruns te delen, strategieën uit te leggen en in contact te komen met fans.',
         'image' => 'default-avatar.jpg'
      ]);

      \App\Models\userinfo::factory()->create([
         'user_id' => 5,
         'birthday' => '1990-05-10',
         'bio' => 'The shimmering moon cast a soft glow on the tranquil lake, as a gentle breeze rustled the leaves of the surrounding trees.',
         'image' => 'default-avatar.jpg'
      ]);

      //FAQ
      //id 1
      \App\Models\questioncategory::factory()->create([
         'name' => 'General',
         'status' => 'shown',
         'sequence' => 1
      ]);

      \App\Models\question::factory()->create([
         'question' => 'I found a bug / have a problem with the game. Where to report it?',
         'response' => 'We are sorry for the inconvenience.',
         'category_id' => 1,
         'status' => 'shown'
      ]);

      \App\Models\question::factory()->create([
         'question' => 'What is the multiplayer status?',
         'response' => 'The game has a very robust multiplayer system, allowing for up to 500 players in a single game. We are continually working on improving the Multiplayer, and we currently support a matching server allowing people to publish their servers and list other running games.',
         'category_id' => 1,
         'status' => 'shown'
      ]);

      //id 2
      \App\Models\questioncategory::factory()->create([
         'name' => 'requirements',
         'status' => 'shown',
         'sequence' => 2
      ]);

      \App\Models\question::factory()->create([
         'question' => 'What are the supported operating systems?',
         'response' => 'The Supported platforms are:
            Windows 11, 10, 8, 7, Vista.
            macOS Mojave, High Sierra, Sierra; MacOS X El Capitan, Yosemite.
            Linux (tarball installation).
            Nintendo Switch.',
         'category_id' => 2,
         'status' => 'shown'
      ]);

      \App\Models\question::factory()->create([
         'question' => 'What are the minimal PC requirements?',
         'response' => 'The Minimum system requirements for running the game are:
            4GB RAM
            DirectX 10.1 capable GPU with 512 MB VRAM - GeForce GTX 260, Radeon HD 4850 or Intel HD Graphics 5500
            Dual core 3GHz+ processor
            1920x1080 screen resolution
            3 GB of disk space
            A 64-bit operating system',
         'category_id' => 2,
         'status' => 'shown'
      ]);

      //id 3
      \App\Models\questioncategory::factory()->create([
         'name' => 'speedruns',
         'status' => 'notShown',
         'sequence' => 3
      ]);

      \App\Models\question::factory()->create([
         'question' => 'How do I upload speedrun?',
         'response' => 'go to speedrun upload page',
         'category_id' => 3,
         'status' => 'notShown'
      ]);

      //News
      //id 1
      \App\Models\news::factory()->create([
         'title' => 'Friday Facts #391 - 2023 recap',
         'message' => 'Hello,
        Another year has come to an end, from all of us here we wish you good fortune in the year to come.
        
        Mod portal recap 2023Vinzenz
        Hey it\'s the end of 2023 and surprise surprise we\'re still counting mod downloads. While most of those downloads are via the built-in mod manager, some of you like to automate your Factorio installs with download scripts or Docker containers.
        
        Some of them crash when updating their mods, then restart, download all the mods again, crash, restart and after a short while it\'s very likely that the Factorio auth server starts ignoring the download script. So maybe this festive season is the time you\'ll remember your poor mini-PC sitting in a forgotten closet, mindlessly downloading \'Power Armor MK3\' over and over again.',
         'status' => 'released',
         'image' => 'newsPlaceholder.png',
         'user_id' => 3
      ]);

      \App\Models\comment::factory()->create([
         'message' => 'This random text aims to evoke a tranquil and mysterious nighttime atmosphere. The imagery of the shimmering moon, tranquil lake, and rustling leaves paints a picture of a serene environment.',
         'user_id' => 4,
         'news_id' => 1,
         'is_reported' => 1

      ]);
      \App\Models\comment::factory()->create([
         'message' => 'Good',
         'user_id' => 5,
         'news_id' => 1,
      ]);
      \App\Models\comment::factory()->create([
         'message' => '"INSTALL MODS LIST" button OMG I HAVE WAITED FOR SO LONG!',
         'user_id' => 4,
         'news_id' => 1,

      ]);

      \App\Models\like::factory()->create([
         'user_id' => 4,
         'news_id' => 1,

      ]);

      \App\Models\like::factory()->create([
         'user_id' => 5,
         'news_id' => 1,

      ]);

      \App\Models\reports::factory()->create([
         'user_id' => 4,
         'comment_id' => 1,

      ]);

      //id 2
      \App\Models\news::factory()->create([
         'title' => 'Friday Facts #390 - Noise expressions 2.0',
         'message' => 'Hello,
         We\'ve had a lot of requests to talk about map generation. It\'s difficult to talk about map generation without first explaining noise expressions. From time to time we need to talk about noise expressions anyway because they are a critical part of the game, but I don\'t think we\'ve ever done a good job of explaining what they actually are at a high level. We will a closer look at planet mapgen again in the future, but for now this will introduce the basic concepts and act as a primer for later.',
         'status' => 'released',
         'image' => 'newsPlaceholder.png',
         'user_id' => 3
      ]);

      //id 3
      \App\Models\news::factory()->create([
         'title' => 'Friday Facts #392 - Parametrised blueprints',
         'message' => 'Hello,
         I\'m going to cover a feature I only just finished.
         I was thinking about this idea for years already.
         I always thought the feature is too hardcore to be included, but I learned that it is usually a mistake to underestimate the players, so I gave it a go, and decided to share it right away.',
         'status' => 'draft',
         'image' => 'newsPlaceholder.png',
         'user_id' => 3
      ]);

      //contact form
      \App\Models\contactform::factory()->create([
         'name' => 'Pieter',
         'email' => 'pieter.de.pauw@student.ehb.be',
         'message' => 'a question to the owners of the website?',
         'status' => 'new'
      ]);

      //speedruns
      //id 1
      \App\Models\Speedrun::factory()->create([
         'user_id' => 4,
         'info' => 'info how the run was done',
         'videoTitle' => 'title of video',
         'videoLink' => 'https://youtu.be/C0vKdPYboCg',
         'time_seconds' => '4980',
         'game_version' => '1.0.11',
         'status' => 'commited',
         'category' => 'any%'
      ]);

      \App\Models\Speedrun::factory()->create([
         'user_id' => 4,
         'info' => 'info how the run was done',
         'videoTitle' => 'title of video 2',
         'videoLink' => 'https://youtu.be/C0vKdPYboCg',
         'time_seconds' => '7510',
         'game_version' => '1.0.11',
         'status' => 'accepted',
         'category' => 'any%'
      ]);

      \App\Models\Speedrun::factory()->create([
         'user_id' => 4,
         'info' => 'info how the run was done',
         'videoTitle' => 'title of video 3',
         'videoLink' => 'https://youtu.be/C0vKdPYboCg',
         'time_seconds' => '5000',
         'game_version' => '1.0.11',
         'status' => 'rejected',
         'category' => 'any%'
      ]);

      \App\Models\Speedrun::factory()->create([
         'user_id' => 5,
         'info' => 'info how the run was done',
         'videoTitle' => 'title of video 4',
         'videoLink' => 'https://youtu.be/C0vKdPYboCg',
         'time_seconds' => '4979',
         'game_version' => '1.0.11',
         'status' => 'accepted',
         'category' => 'any%'
      ]);
   }
}

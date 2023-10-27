<?php

use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::insert([
            'user_id' => 1,
            'body' => 'new comment!',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OlahragaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('olahraga')->insert([
            [
                'nama' => 'Full Body',
                'deskripsi' => 'Latihan full body yang mengaktifkan semua kelompok otot utama. Kombinasi gerakan compound dan isolasi untuk memaksimalkan hasil dengan fokus pada kekuatan dan pembentukan otot.',
                'kategori' => 'Kardio, Fat Burning, Pemula',
                'durasi' => 20,
                'url_video' => 'https://www.youtube.com/embed/UitW1tVZZmE?si=GnKpe7nSWiucBI-z',
                'thumbnails' => 'thumbnails/LOBJljZ0DLYDGM5nVdtDAWkm0KrZq9XhjJeT4dG5.png',
            ],
            [
                'nama' => 'Cardio Blast',
                'deskripsi' => 'Latihan kardio intensif untuk membakar kalori dan meningkatkan daya tahan tubuh.',
                'kategori' => 'Kardio, Fat Burning',
                'durasi' => 25,
                'url_video' => 'https://www.youtube.com/embed/XYZ12345',
                'thumbnails' => 'thumbnails/cardio_blast.png',
            ],
            [
                'nama' => 'Yoga',
                'deskripsi' => 'Latihan yoga untuk pemula dengan fokus pada kelenturan dan pernapasan.',
                'kategori' => 'Relaksasi, Pemula',
                'durasi' => 30,
                'url_video' => 'https://www.youtube.com/embed/Yoga123',
                'thumbnails' => 'thumbnails/yoga.png',
            ],
            [
                'nama' => 'HIIT',
                'deskripsi' => 'Latihan interval intensitas tinggi yang membantu membakar kalori dengan cepat.',
                'kategori' => 'Kardio, Pemula',
                'durasi' => 15,
                'url_video' => 'https://www.youtube.com/embed/HIIT12345',
                'thumbnails' => 'thumbnails/hiit.png',
            ],
            [
                'nama' => 'Strength Training',
                'deskripsi' => 'Latihan kekuatan dengan fokus pada pembentukan otot dan meningkatkan kekuatan fisik.',
                'kategori' => 'Kekuatan, Fat Burning',
                'durasi' => 45,
                'url_video' => 'https://www.youtube.com/embed/Strength123',
                'thumbnails' => 'thumbnails/strength_training.png',
            ],
            [
                'nama' => 'Pilates',
                'deskripsi' => 'Latihan pilates untuk membentuk tubuh dan meningkatkan kekuatan inti.',
                'kategori' => 'Core, Pemula',
                'durasi' => 30,
                'url_video' => 'https://www.youtube.com/embed/Pilates123',
                'thumbnails' => 'thumbnails/pilates.png',
            ],
            [
                'nama' => 'Abs Workout',
                'deskripsi' => 'Latihan untuk membentuk otot perut dan meningkatkan kekuatan inti.',
                'kategori' => 'Fat Burning, Core',
                'durasi' => 20,
                'url_video' => 'https://www.youtube.com/embed/AbsWorkout123',
                'thumbnails' => 'thumbnails/abs_workout.png',
            ],
            [
                'nama' => 'Stretching',
                'deskripsi' => 'Latihan peregangan untuk meningkatkan fleksibilitas dan mengurangi ketegangan otot.',
                'kategori' => 'Relaksasi, Pemula',
                'durasi' => 10,
                'url_video' => 'https://www.youtube.com/embed/Stretching123',
                'thumbnails' => 'thumbnails/stretching.png',
            ],
            [
                'nama' => 'Zumba',
                'deskripsi' => 'Latihan tarian yang menyenangkan dengan irama musik cepat untuk meningkatkan kebugaran.',
                'kategori' => 'Kardio, Fun',
                'durasi' => 40,
                'url_video' => 'https://www.youtube.com/embed/Zumba123',
                'thumbnails' => 'thumbnails/zumba.png',
            ]
        ]);
    }
}

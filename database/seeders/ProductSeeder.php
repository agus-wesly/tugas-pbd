<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Shocks',
            'description' => 'Sepatu olahraga yang nyaman dan ringan, cocok untuk berbagai aktivitas fisik. Sepatu ini memiliki sol yang fleksibel dan tahan lama, serta bantalan udara yang menyerap goncangan. Sepatu ini juga memiliki desain yang sporty dan modern, dengan warna-warna cerah yang menarik.',
            'product_url' => 'https://pm1.narvii.com/6829/9377b1ae948d99a8df728f98c0c4366f34e3f6f6v2_hq.jpg',
            'price' => 500000,
            'type_id' => 1,
          ]);
        DB::table('products')->insert([
            'name' => 'Pumps',
            'description' => 'Sepatu hak tinggi yang elegan dan feminin, cocok untuk pesta dan acara formal. Sepatu ini memiliki hak yang stabil dan nyaman, serta ujung yang lancip yang memberikan kesan mewah. Sepatu ini juga memiliki bahan yang berkualitas, dengan permukaan yang halus dan mengkilap.',
            'product_url' => 'https://i.etsystatic.com/17244981/r/il/d5664b/1736273156/il_fullxfull.1736273156_cj56.jpg',
            'price' => 800000,
            'type_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Kicks',
            'description' => 'Sepatu kasual yang trendi dan modis, cocok untuk gaya sehari-hari. Sepatu ini memiliki sol yang tebal dan empuk, serta tali yang kuat dan mudah disesuaikan. Sepatu ini juga memiliki motif yang unik dan kreatif, dengan kombinasi warna yang menyenangkan.',
            'product_url' => 'https://i.pinimg.com/originals/c7/0b/57/c70b5784850f0fcf5304ca840d94b5fa.jpg',
            'price' => 300000,
            'type_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'Boots',
            'description' => 'Sepatu bot yang kuat dan tahan banting, cocok untuk petualangan dan aktivitas luar ruangan. Sepatu ini memiliki sol yang bergigi dan anti selip, serta bagian atas yang tebal dan tahan air. Sepatu ini juga memiliki resleting samping yang memudahkan Anda memakai dan melepasnya.',
            'product_url' => 'https://i.stpost.com/altimate-double-zipper-motorcycle-boots-leather-for-women-in-black~p~4144g_01~1500.3.jpg',
            'price' => 100000,
            'type_id' => 1, 
        ]);
        DB::table('products')->insert([
            'name' => 'Slippers',
            'description' => 'Sepatu sandal yang santai dan nyaman, cocok untuk bersantai di rumah atau di pantai. Sepatu ini memiliki sol yang empuk dan lembut, serta tali yang elastis dan menyesuaikan bentuk kaki Anda. Sepatu ini juga memiliki warna-warna pastel yang menenangkan dan menyegarkan.',
            'product_url' => 'https://thumbs.dreamstime.com/b/pair-warm-female-slippers-isolated-white-background-104884160.jpg',
            'price' => 100000,
            'type_id' => 1,
        ]);

        // JAM TANGAN

    DB::table('products')->insert([
        'name' => 'Chronos',
        'description' => 'Jam tangan analog yang elegan dan klasik, dengan bahan stainless steel dan tahan air hingga 50 meter. Jam tangan ini memiliki fitur chronograph, tanggal, dan stopwatch.',
        'product_url' => 'https://thumbs.dreamstime.com/b/modern-mens-watch-white-background-studio-shot-sports-wrist-as-product-photography-isolated-129104125.jpg',
        'price' => 1500000,
        'type_id' => 4,
    ]);
    DB::table('products')->insert([
        'name' => 'Smarto',
        'description' => 'Jam tangan pintar yang multifungsi dan modern, dengan layar sentuh dan koneksi bluetooth. Jam tangan ini dapat mengukur detak jantung, langkah, kalori, dan notifikasi ponsel.',
        'product_url' => 'https://image.shutterstock.com/shutterstock/photos/532756432/display_1500/stock-photo-wristwatch-isolated-on-white-background-532756432.jpg',
        'price' => 1000000,
        'type_id' => 4,
    ]);
    DB::table('products')->insert([
        'name' => 'Casio',
        'description' => 'Jam tangan digital yang sporty dan praktis, dengan bahan resin dan tahan guncangan. Jam tangan ini memiliki fitur lampu LED, alarm, timer, dan stopwatch.',
        'product_url' => 'https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX1955686.jpg',
        'price' => 500000,
        'type_id' => 4,
    ]);
    DB::table('products')->insert([
        'name' => 'Rolex',
        'description' => 'Jam tangan mewah yang prestisius dan berkualitas, dengan bahan emas dan berlian. Jam tangan ini memiliki fitur tachymeter, magnifier, dan water resistant hingga 100 meter.',
        'product_url' => 'https://thumbs.dreamstime.com/b/watch-modern-white-background-32633925.jpg',
        'price' => 500000000,
        'type_id' => 4,
    ]);
    DB::table('products')->insert([
        'name' => 'Swatch',
        'description' => 'Jam tangan kreatif yang unik dan berwarna-warni, dengan bahan plastik dan karet. Jam tangan ini memiliki desain yang menarik dan cocok untuk gaya sehari-hari.',
        'product_url' => 'https://www.meitalstudios.com/wp-content/uploads/2020/05/best-white-background-watches-photographer.jpg',
        'price' => 250000,
        'type_id' => 4,
    ]);

    // KACA MATA
    
    DB::table('products')->insert([
        'name' => 'Ray-Ban',
        'description' => 'Kacamata hitam yang ikonik dan stylish, dengan bahan metal dan lensa polarized. Kacamata ini memiliki model aviator yang klasik dan cocok untuk pria dan wanita.',
        'product_url' => 'https://purepng.com/public/uploads/large/purepng.com-glassesglasseseyeglassesspectaclesplastic-lensesmounted-14215264993951jk1l.png',
        'price' => 1500000,
        'type_id' => 5,
    ]);
    DB::table('products')->insert([
        'name' => 'Oakley',
        'description' => 'Kacamata olahraga yang fungsional dan keren, dengan bahan plastik dan lensa anti gores. Kacamata ini memiliki model wraparound yang nyaman dan cocok untuk berbagai aktivitas fisik.',
        'product_url' => 'https://freepngimg.com/thumb/glasses/27-glasses-png-image.png',
        'price' => 1000000,
        'type_id' => 5,
    ]);
    DB::table('products')->insert([
        'name' => 'Gucci',
        'description' => 'Kacamata fashion yang mewah dan glamor, dengan bahan akrilik dan lensa gradient. Kacamata ini memiliki model cat eye yang feminin dan cocok untuk pesta dan acara formal.',
        'product_url' => 'https://img.ebdcdn.com/product/frame/white/mt7364_1.jpg?im=Resize,width=280,height=140,aspect=fill;UnsharpMask,sigma=1.0,gain=1.0&q=85%20240w,%20https://img.ebdcdn.com/product/frame/white/mt7364_1.jpg?im=Resize,width=360,height=180,aspect=fill;UnsharpMask,sigma=1.0,gain=1.0&q=85%20360w,%20https://img.ebdcdn.com/product/frame/white/mt7364_1.jpg?im=Resize,width=600,height=300,aspect=fill;UnsharpMask,sigma=1.0,gain=1.0&q=85%20600w',
        'price' => 3000000,
        'type_id' => 5,
    ]);
    DB::table('products')->insert([
        'name' => 'Zenni',
        'description' => 'Kacamata kesehatan yang berkualitas dan terjangkau, dengan bahan titanium dan lensa anti radiasi. Kacamata ini memiliki model round yang simpel dan cocok untuk membaca dan bekerja.',
        'product_url' => 'https://pngimg.com/uploads/glasses/glasses_PNG58.png',
        'price' => 250000,
        'type_id' => 5,
    ]);
    DB::table('products')->insert([
        'name' => 'Snapchat',
        'description' => 'Kacamata pintar yang inovatif dan seru, dengan bahan plastik dan kamera HD. Kacamata ini memiliki model wayfarer yang trendi dan cocok untuk merekam dan berbagi momen.',
        'product_url' => 'https://i.pinimg.com/736x/bf/b4/62/bfb462aa95720fcb94a2a3f95d28706c--pure-white-eyeglasses.jpg',
        'price' => 2000000,
        'type_id' => 5,
    ]);
    
    // Tipe produk: Tas
    DB::table('products')->insert([
        'name' => 'Backpack',
        'description' => 'Tas ransel yang luas dan nyaman, dengan bahan kanvas dan banyak kantong. Tas ini memiliki tali yang empuk dan dapat disesuaikan, serta resleting yang kuat dan mudah dibuka.',
        'product_url' => 'https://mockupsjar-production.s3-eu-west-1.amazonaws.com/renders/tote-bag-with-background-AliJnp4CQMViO7Bt.jpg',
        'price' => 300000,
        'type_id' => 3
    ]);
    DB::table('products')->insert([
        'name' => 'Handbag',
        'description' => 'Tas tangan yang elegan dan modis, dengan bahan kulit dan aksen emas. Tas ini memiliki pegangan yang kokoh dan dapat dilepas, serta kancing magnet yang praktis dan aman.',
        'product_url' => 'https://www.thefashiontamer.com/wp-content/uploads/2019/03/white-handbags-5.jpg',
        'price' => 500000,
        'type_id' =>3, 
    ]);
    DB::table('products')->insert([
        'name' => 'Duffel',
        'description' => 'Tas jinjing yang besar dan kuat, dengan bahan nilon dan tahan air. Tas ini memiliki pegangan yang nyaman dan tali bahu yang dapat dilepas, serta lubang ventilasi yang mengurangi bau.',
        'product_url' => 'https://www.allfashionbags.com/wp-content/uploads/2017/05/White-Shoulder-Bag-Photos.jpg',
        'price' => 400000,
        'type_id' => 3, 
    ]);

    DB::table('products')->insert([
        'name' => 'Clutch',
        'description' => 'Tas genggam yang kecil dan cantik, dengan bahan sutra dan manik-manik. Tas ini memiliki pegangan yang halus dan rantai yang dapat dilepas, serta kancing gesper yang menawan dan elegan.',
        'product_url' => 'https://3.bp.blogspot.com/-3AelpriI9B0/VZAepGcZStI/AAAAAAAASbk/UiomWnMDF_w/s1600/louis-vuitton-mahina-leather-solar-gm-white-women-shoulder-bags-and-totes.jpg',
        'price' => 250000,
        'type_id' => 3
    ]);

    DB::table('products')->insert([
        'name' => 'Messenger',
        'description' => 'Tas selempang yang simpel dan klasik, dengan bahan denim dan patchwork. Tas ini memiliki tali yang panjang dan dapat disesuaikan, serta kancing tekan yang mudah dan cepat.',
        'product_url' => 'https://cdna.lystit.com/photos/0d2b-2015/12/19/coach-chalk-edie-studded-leather-shoulder-bag-white-product-1-093650221-normal.jpeg',
        'price' => 200000,
        'type_id' =>3
    ]);
    

    DB::table('products')->insert([
        'name' => 'T-shirt',
        'description' => 'Baju kaos yang kasual dan nyaman, dengan bahan katun dan sablon. Baju ini memiliki kerah bulat dan lengan pendek, serta motif yang lucu dan menarik.',
        'product_url' => 'https://www.80scasualclassics.co.uk/images/adidas-originals-trefoil-t-shirt-green-p10660-65092_image.jpg',
        'price' => 100000,
        'type_id' => 2,
    ]);
    DB::table('products')->insert([
        'name' => 'Blouse',
        'description' => 'Baju wanita yang feminin dan anggun, dengan bahan sifon dan renda. Baju ini memiliki kerah V dan lengan panjang, serta hiasan yang manis dan cantik.',
        'product_url' => 'https://i5.walmartimages.com/asr/38ea6606-e5a2-4d29-9ae5-2952d7173b8b_1.44e5c3267324f91822dda55e193abed7.jpeg',
        'price' => 150000,
        'type_id' => 2,
    ]);
    DB::table('products')->insert([
        'name' => 'Shirt',
        'description' => 'Baju kemeja yang formal dan rapi, dengan bahan katun dan polos. Baju ini memiliki kerah kaku dan lengan panjang, serta kancing yang halus dan seragam.',
        'product_url' => 'https://i.pinimg.com/originals/dc/62/b3/dc62b35bef6b7a0ab00cdd6254c2eec5.jpg',
        'price' => 200000,
        'type_id' => 2,
    ]);
    DB::table('products')->insert([
        'name' => 'Sweater',
        'description' => 'Baju hangat yang cozy dan lembut, dengan bahan wol dan rajutan. Baju ini memiliki kerah tinggi dan lengan panjang, serta corak yang unik dan kreatif.',
        'product_url' => 'https://www.seoclerk.com/pics/000/763/212/0a0c4c9428b23836d1b2595516adfb0f.jpg',
        'price' => 250000,
        'type_id' => 2,
    ]);

} }

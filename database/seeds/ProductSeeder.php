<?php

use App\Product;
use App\Inventory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'featured_image' => 'https://images-na.ssl-images-amazon.com/images/I/718-PNZEgML._SY355_.jpg',
            'name' => 'Wooden Gymnastic Rings',
            'description' => 'The rings, also known as steady rings or still rings (in contrast to flying rings), is an artistic gymnastics apparatus and the event that uses it. It is traditionally used only by male gymnasts, due to its extreme upper body strength requirements. Gymnasts typically wear ring grips while performing on the rings.',
            'price' => 999.75,
        ]);

        Inventory::create([
            'product_id' => $product->id,
            'stock' => 30,
        ]);

        $product = Product::create([
            'featured_image' => 'https://www.gymnasticsdirect.com.au/images/products/367_one.jpg',
            'name' => 'Wooden Parallettes',
            'description' => 'Parallettes are small gymnastics devices, employed in pairs, used primarily to simulate the parallel bars that can be found in professional gymnasiums. Parallettes are similar to pushup bars, or dip bars, but they are generally longer and lower to the ground.',
            'price' => 450.65,
        ]);

        Inventory::create([
            'product_id' => $product->id,
            'stock' => 20,
        ]);

        $product = Product::create([
            'featured_image' => 'https://albanystrength.com/wp-content/uploads/2018/10/chalk.jpg',
            'name' => 'Gymnastics Magnesium Chalk',
            'description' => "Magnesium carbonate, most often referred to as 'chalk', is also used as a drying agent on athletes' palms in rock climbing, gymnastics and weight lifting. As a food additive magnesium carbonate is known as E504, for which the only known side effect is that it may work as a laxative in high concentrations.",
            'price' => 150.25,
        ]);

        Inventory::create([
            'product_id' => $product->id,
            'stock' => 100,
        ]);

        $product = Product::create([
            'featured_image' => 'https://www.roguefitness.com/media/catalog/product/cache/1/image/1500x1500/9df78eab33525d08d6e5fb8d27136e95/r/o/rogue-p-3-pull-up-system.jpg',
            'name' => 'Wall Mounted Steel Pull-up Bar',
            'description' => "Pull yourself up until your chin is level with the bar, then slowly lower until your arms are fully extended. If you can't initially do full chin-ups and pull-ups, work up to them using moves 5 and 6. This classic grip hits both your biceps and forearms, as well as strengthening muscles that stabilise your spine.",
            'price' => 1750.85,
        ]);

        Inventory::create([
            'product_id' => $product->id,
            'stock' => 10,
        ]);
    }
}

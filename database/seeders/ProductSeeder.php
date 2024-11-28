<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'image' => 'frontend/images/products/product-1.jpg',
                'link' => 'https://www.loyarmyanmar.com/',
                'title' => 'Loyar Myanmar',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Mobile App Development, Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-2.jpg',
                'link' => 'https://prideofmyanmar.com/',
                'title' => 'Pride Of Myanmar',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Mobile App Development, Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-3.jpg',
                'link' => 'https://www.loyarmyanmar.com/',
                'title' => 'Reservation & Queue Management System (RQMS)',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-4.jpg',
                'link' => 'https://www.loyarmyanmar.com/',
                'title' => 'Octoverse Payment Gateway',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-5.jpg',
                'link' => 'https://myantickets.com/',
                'title' => 'Event Ticket Selling System (MyansTicket)',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Mobile App Development, Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-6.jpg',
                'link' => 'https://myanmarcba.com.mm/',
                'title' => 'Membership Management System',
                'description' => 'Myanmar Custom Brokers Association (MCBA) is an organization that represents the interests of customs brokers in Myanmar. The association was established to promote and develop the customs brokerage profession in the country, and to enhance the quality of services provided by customs brokers to their clients.',
                'category' => 'Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-1.jpg',
                'link' => 'https://www.loyarmyanmar.com/',
                'title' => 'Peral Auction System (ebidMyanmar)',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Web Development'
            ],
            [
                'image' => 'frontend/images/products/product-2.jpg',
                'link' => 'https://www.loyarmyanmar.com/',
                'title' => 'Broadcast Program Management System',
                'description' => 'LOYAR is a km-based ride-hailing mobile application, that is the very first Taxi application in Myanmar, which includes Lorem ipsum dolor sit amet consectetur adipiscing, elit magna egestas himenaeos quis nam cras, venenatis convallis senectus ad etiam. Hac ultrices rhoncus et hendrerit arcu ligula, cras tellus mattis torquent nascetur inceptos tempus, auctor pulvinar ac malesuada enim. Sed facilisi cursus nostra ultrices turpis consequat vehicula taciti fermentum ultricies, erat eget at pharetra parturient semper velit commodo habitant vestibulum ullamcorper, purus inceptos ante aliquet primis iaculis posuere nascetur faucibus.',
                'category' => 'Desktop App Development'
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'image' => $product['image'],
                'link' => $product['link'],
                'title' => $product['title'],
                'description' => $product['description'],
                'category' => $product['category']
            ]);
        }
    }
}

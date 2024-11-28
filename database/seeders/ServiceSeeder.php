<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'logo' => 'frontend/images/services/Digital Payment Solutions.png',
                'title' => 'Digital Payment Solutions',
                'content' => 'We implement secure online payment methods tailored for your business. This includes setting up digital wallets or payment gateways, ensuring that transactions are not only safe but also seamless for both you and your customers. It\'s like having a trustworthy digital cashier that operates 24/7.'
            ],
            [
                'logo' => 'frontend/images/services/Digital Transformation & Content Delivery.png',
                'title' => 'Digital Transformation & Content Delivery',
                'content' => 'In this digital era, we work on enhancing your online presence. We streamline and improve your digital processes, making your messages more engaging and delivering them effectively to your target audience. Think of it as giving your business a virtual makeover for the internet age.'
            ],
            [
                'logo' => 'frontend/images/services/System Development & Integration.png',
                'title' => 'System Development & Integration',
                'content' => 'We focus on developing and integrating digital systems to optimize your business operations. This involves creating software solutions tailored to your specific needs and ensuring they seamlessly work together. It\'s like crafting a set of digital tools designed specifically for the unique requirements of your business.'
            ],
            [
                'logo' => 'frontend/images/services/Cloud Storage and Solutions.png',
                'title' => 'Cloud Storage and Solutions',
                'content' => 'Our cloud storage services provide a secure and scalable solution for storing and accessing your data online. It\'s akin to having a digital filing cabinet that not only keeps your information safe but also expands effortlessly as your business grows.'
            ],
            [
                'logo' => 'frontend/images/services/E-Government Transformation.png',
                'title' => 'E-Government Transformation',
                'content' => 'Leveraging technology, we transform government services to be more transparent, efficient, and accessible to the public. Imagine a digital bridge connecting citizens to government services, making interactions smoother and information more readily available.'
            ],
            [
                'logo' => 'frontend/images/services/Web Development.png',
                'title' => 'Web Development',
                'content' => 'Our web development services focus on creating visually appealing and functional websites. This involves designing user-friendly interfaces and ensuring the technical aspects work seamlessly. It\'s like building a digital storefront that not only attracts customers but also provides a pleasant shopping experience.'
            ],
            [
                'logo' => 'frontend/images/services/Mobile Application Development.png',
                'title' => 'Mobile Application Development',
                'content' => 'We specialize in creating mobile apps that are easy to use and align with your brand. These apps ensure your business stays connected with customers on the go. It\'s like having a portable version of your business in the pocket of every customer.'
            ],
            [
                'logo' => 'frontend/images/services/Tailor-Made Software Development.png',
                'title' => 'Tailor-Made Software Development',
                'content' => 'When off-the-shelf software falls short, we step in with customized solutions. It\'s like having a unique set of digital tools designed specifically to address the intricate challenges your business faces, ensuring a perfect fit.'
            ],
            [
                'logo' => 'frontend/images/services/E-Commerce Website.png',
                'title' => 'E-Commerce Website',
                'content' => 'Our e-commerce websites are more than just online shops. We build secure and user-friendly platforms for customers to explore, interact, and make purchases. Think of it as creating a digital marketplace where your products or services are showcased professionally and transactions occur smoothly.'
            ],
        ];

        foreach ($services as $service) {
            Service::create([
                'logo' => $service['logo'],
                'title' => $service['title'],
                'content' => $service['content'],
            ]);
        }
    }
}

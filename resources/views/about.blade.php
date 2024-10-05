@extends('layouts.app')

@section('content')
<style>
    body {
             font-family: 'Roboto', sans-serif;
         }
 
         .fade-in {
             animation: fadeIn 2s ease-in-out;
         }
 
         @keyframes fadeIn {
             from {
                 opacity: 0;
             }
             to {
                 opacity: 1;
             }
         }
 
         .slide-in {
             animation: slideIn 2s ease-in-out;
         }
 
         @keyframes slideIn {
             from {
                 transform: translateX(-100%);
             }
             to {
                 transform: translateX(0);
             }
         }
 
         .moving-background {
             background: url('/images/about.jpg') repeat;
             animation: moveBackground 10s linear infinite;
             opacity: 0.1;
         }
 
         @keyframes moveBackground {
             from {
                 background-position: 0 0;
             }
             to {
                 background-position: 100% 0;
             }
         }
   </style>

<section class="py-16 relative">
    <div class="moving-background absolute inset-0 z-0">
    </div>
    <div class="relative z-10 container mx-auto text-center">
     <h2 class="text-3xl font-bold mb-8 fade-in">
      About Us
     </h2>
     <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      <div class="p-6">
       <img alt="Our Story" class="w-full h-64 object-cover rounded-lg shadow-lg slide-in" height="300" src="https://storage.googleapis.com/a1aa/image/FL3jlHJRSW5bCZAshe5cuR9wlilEgF3tPtqyjvQIRLuFjpxJA.jpg" width="400"/>
      </div>
      <div class="p-6 flex flex-col justify-center">
       <h3 class="text-xl font-bold mb-4">
        Our Story
       </h3>
       <p class="text-gray-700 mb-4">
        Cake Shop was founded with the passion to create the most delicious and beautiful cakes and pastries. Our journey started in a small kitchen, and now we have grown into a beloved bakery known for our quality and creativity.
       </p>
       <p class="text-gray-700 mb-4">
        We believe in using the finest ingredients and traditional baking techniques to bring you the best flavors and textures. Our team of skilled bakers and decorators work tirelessly to ensure every product is a masterpiece.
       </p>
      </div>
     </div>
     <div class="mt-16">
      <h3 class="text-2xl font-bold mb-8 fade-in">
       Meet Our Team
      </h3>
      <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
       <div class="bg-white p-6 rounded-lg shadow-lg">
        <img alt="Team Member 1" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/dAfwje27LsiZX03iK1hSsql85oRh5ZYvD0nZGzKR0rYJGTjTA.jpg" width="100"/>
        <h4 class="text-xl font-bold mb-2">
         John Doe
        </h4>
        <p class="text-gray-700">
         Head Baker
        </p>
       </div>
       <div class="bg-white p-6 rounded-lg shadow-lg">
        <img alt="Team Member 2" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/b2l5Drf9fxqNOkYCh62XN8XLYZVgHku5mC3vUURP79EMGTjTA.jpg" width="100"/>
        <h4 class="text-xl font-bold mb-2">
         Jane Smith
        </h4>
        <p class="text-gray-700">
         Pastry Chef
        </p>
       </div>
       <div class="bg-white p-6 rounded-lg shadow-lg">
        <img alt="Team Member 3" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/FL3jlHJRSW5bCZAshe5cuR9wlilEgF3tPtqyjvQIRLuFjpxJA.jpg" width="100"/>
        <h4 class="text-xl font-bold mb-2">
         Emily Johnson
        </h4>
        <p class="text-gray-700">
         Cake Decorator
        </p>
       </div>
       <div class="bg-white p-6 rounded-lg shadow-lg">
        <img alt="Team Member 4" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/FL3jlHJRSW5bCZAshe5cuR9wlilEgF3tPtqyjvQIRLuFjpxJA.jpg" width="100"/>
        <h4 class="text-xl font-bold mb-2">
         Michael Brown
        </h4>
        <p class="text-gray-700">
         Assistant Baker
        </p>
       </div>
       <div class="bg-white p-6 rounded-lg shadow-lg">
        <img alt="Team Member 5" class="w-32 h-32 object-cover rounded-full mx-auto mb-4" height="100" src="https://storage.googleapis.com/a1aa/image/FL3jlHJRSW5bCZAshe5cuR9wlilEgF3tPtqyjvQIRLuFjpxJA.jpg" width="100"/>
        <h4 class="text-xl font-bold mb-2">
         Sarah Lee
        </h4>
        <p class="text-gray-700">
         Customer Service
        </p>
       </div>
      </div>
     </div>
    </div>
   </section>
@endsection

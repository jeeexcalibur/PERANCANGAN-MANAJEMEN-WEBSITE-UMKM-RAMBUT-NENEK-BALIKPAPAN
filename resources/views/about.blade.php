@extends('layouts.app')

@section('content')
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .text-white {
        color: white;
    }

    .text-center {
        text-align: center;
    }

    .text-5xl {
        font-size: 3rem;
    }

    .font-bold {
        font-weight: 700;
    }

    .font-semibold {
        font-weight: 600;
    }

    .text-lg {
        font-size: 1.125rem;
    }

    .text-3xl {
        font-size: 1.875rem;
    }

    .text-2xl {
        font-size: 1.5rem;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .mb-6 {
        margin-bottom: 1.5rem;
    }

    .mb-8 {
        margin-bottom: 2rem;
    }

    .mb-10 {
        margin-bottom: 2.5rem;
    }

    .mb-16 {
        margin-bottom: 4rem;
    }

    .rounded-xl {
        border-radius: 1rem;
    }

    .shadow-xl {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
   </style>

<section id="about-us" class="about-us py-20">
    @php
        $landingPage = \App\Models\LandingPages::where('image_title', 'Landing')->first();
    @endphp

    <div class="container mx-auto px-6 py-16 text-center">
        <!-- Title -->
        <h2 class="text-5xl font-bold mb-8">Tentang Kami</h2>

        <!-- Deskripsi Perusahaan -->
        <div class="flex flex-col md:flex-row justify-between items-center gap-12 mb-16">
            <div class="md:w-1/2">
                <h3 class="text-3xl font-semibold mb-4">Siapa Kami?</h3>
                <p class="text-lg mb-6">
                    Kami adalah perusahaan yang berkomitmen untuk memberikan solusi terbaik dalam memenuhi kebutuhan Anda. 
                    Dengan produk berkualitas tinggi dan pelayanan yang ramah, kami hadir untuk membuat hidup Anda lebih mudah.
                </p>
                <p class="text-lg">
                    Dari hari pertama kami didirikan, kami selalu berusaha untuk memberikan layanan yang terbaik dan inovatif. 
                    Tujuan kami adalah membangun hubungan jangka panjang dengan pelanggan kami, dan menjadi mitra terpercaya untuk kebutuhan Anda.
                </p>
            </div>
            <div class="md:w-1/2">
                @php
                    $landingPage = \App\Models\LandingPages::where('image_title', 'About')->first();
                @endphp
                <img src="{{ $landingPage && $landingPage->image_url ? $landingPage->image_url : asset('assets/images/default.jpg') }}" 
                    alt="Tentang perusahaan" class="rounded-xl shadow-xl w-full h-auto object-cover" />
            </div>
            
        </div>

        <!-- Misi dan Visi -->
        <div class="mb-16">
            <h3 class="text-3xl font-semibold mb-4">Misi dan Visi Kami</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="flex flex-col items-center">
                    <h4 class="text-2xl font-bold mb-2">Misi</h4>
                    <p class="text-lg text-center">
                        Misi kami adalah menyediakan produk dan layanan yang mengutamakan kualitas dan kepuasan pelanggan, 
                        serta terus berinovasi untuk memenuhi harapan dan kebutuhan pasar yang terus berkembang.
                    </p>
                </div>
                <div class="flex flex-col items-center">
                    <h4 class="text-2xl font-bold mb-2">Visi</h4>
                    <p class="text-lg text-center">
                        Visi kami adalah menjadi pemimpin pasar dalam industri ini, menawarkan solusi yang relevan dan berkelanjutan 
                        untuk setiap pelanggan, serta berperan aktif dalam pembangunan sosial dan ekonomi.
                    </p>
                </div>
            </div>
        </div>

        <!-- CTA - Hubungi Kami -->
        <div class="flex justify-center">
            <a href="#contact" class="py-4 px-10 bg-gradient-to-r from-purple-600 to-red-600 text-white rounded-lg shadow-lg 
                transform hover:scale-105 transition duration-300">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pendataan Penduduk RW 012 Kp. Paris</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="text-gray-700 body-font border-b border-gray-200">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <div class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <span class="ml-3 text-xl">RW 012</span>
            </div>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <div class="mr-5 hover:text-gray-900 font-semibold">Kampung Paris</div>
            </nav>
        </div>
    </header>
    <section class="text-gray-700 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Pendataan Penduduk
                </h1>
                <p class="mb-8 leading-relaxed">Sistem Informasi Pendataan Penduduk adalah solusi modern untuk mengatasi
                    berbagai kendala dalam pengelolaan data kependudukan. Dengan menggunakan teknologi berbasis web,
                    sistem ini memudahkan Anda dalam memasukkan, menyimpan, dan mengambil data penduduk secara cepat dan
                    akurat.</p>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="Foto maps"
                    src="{{ asset('images/maps kp paris.png') }}">
            </div>
        </div>
    </section>

    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap w-full mb-20 flex-col items-center text-center">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Statistik</h1>
                <p class="lg:w-1/2 w-full leading-relaxed text-base">Dalam kategori usia Balita, Anak-Anak, Remaja,
                    Dewasa dan Lansia.</p>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg">
                        <h1 class="text-indigo-500 font-bold text-2xl mb-4">10000</h1>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Total Penduduk</h2>
                        <p class="leading-relaxed text-base">Jumlah keseluruhan penduduk</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg">
                        <h1 class="text-indigo-500 font-bold text-2xl mb-4">10000</h1>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Total Penduduk Balita</h2>
                        <p class="leading-relaxed text-base">Penduduk dengan kategori Balita</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg">
                        <h1 class="text-indigo-500 font-bold text-2xl mb-4">10000</h1>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Total Penduduk Anak-anak</h2>
                        <p class="leading-relaxed text-base">Penduduk dengan kategori Anak-anak</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg">
                        <h1 class="text-indigo-500 font-bold text-2xl mb-4">10000</h1>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Total Penduduk Remaja</h2>
                        <p class="leading-relaxed text-base">Penduduk dengan kategori Remaja</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg">
                        <h1 class="text-indigo-500 font-bold text-2xl mb-4">10000</h1>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Total Penduduk Dewasa</h2>
                        <p class="leading-relaxed text-base">Penduduk dengan kategori Dewasa</p>
                    </div>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg">
                        <h1 class="text-indigo-500 font-bold text-2xl mb-4">10000</h1>
                        <h2 class="text-lg text-gray-900 font-medium title-font mb-2">Total Penduduk Lansia</h2>
                        <p class="leading-relaxed text-base">Penduduk dengan kategori Lansia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-gray-700 body-font border-t border-gray-200">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Jajaran</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Para Pengurus RT/RW 012 Kampung Paris periode
                    2024-2029</p>
            </div>
            <div class="flex flex-wrap -m-2">
                <div class="p-2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/80x80/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Holden Caulfield</h2>
                            <p class="text-gray-500">Ketua RW 012</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/84x84/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Henry Letham</h2>
                            <p class="text-gray-500">Ketua RT 001</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/88x88/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">Oskar Blinde</h2>
                            <p class="text-gray-500">Ketua RT 002</p>
                        </div>
                    </div>
                </div>
                <div class="p-2 md:w-1/2 w-full">
                    <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                        <img alt="team"
                            class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                            src="https://dummyimage.com/90x90/edf2f7/a5afbd">
                        <div class="flex-grow">
                            <h2 class="text-gray-900 title-font font-medium">John Doe</h2>
                            <p class="text-gray-500">Ketua RT 003</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-gray-700 body-font relative py-56">
        <div class="absolute inset-0 bg-gray-300">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1400.4690894086475!2d106.76268124843888!3d-6.87565237352779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e683300407b74cd%3A0x3d26c082cc27294c!2sKampung%20paris!5e0!3m2!1sid!2sid!4v1720328097513!5m2!1sid!2sid"
                width="100%" height="100%" frameborder="0" marginheight="0" marginwidth="0" style="border:0;"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
</body>

</html>

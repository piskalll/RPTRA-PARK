@extends('layouts.visitor')

@section('content')
        <section class="bg-center bg-no-repeat bg-gray-700 bg-blend-multiply min-h-screen flex items-center" style="background-image: url('storage/image/banner1.jpeg');">
            <div class="px-4 mx-auto max-w-screen-xl text-center w-full">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">RPTRA Mutiara Rawa Binong</h1>
                <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Nikmati Keindahan & Kenyamanan Taman Kota Bersama Keluarga<br>Booking Fasilitas Sekarang!</p>
                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="{{ route('public.facilities') }}" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white px-4 py-2 rounded-lg hover:bg-black transition">
                        Pesan
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </section>
        <div class="px-4 py-6">
            <section class="py-10">
            <div class="w-full bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select tab</label>
                    <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Profil</option>
                        <option>Inventaris</option>
                        <option>Tetntang</option>
                    </select>
                </div>
                <ul class="hidden text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg sm:flex dark:divide-gray-600 dark:text-gray-400 rtl:divide-x-reverse" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="stats-tab" data-tabs-target="#stats" type="button" role="tab" aria-controls="stats" aria-selected="true" class="inline-block w-full p-4 rounded-ss-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Profil</button>
                    </li>
                    <li class="w-full">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Inventaris</button>
                    </li>
                    <li class="w-full">
                        <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false" class="inline-block w-full p-4 rounded-se-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Tentang</button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="stats" role="tabpanel" aria-labelledby="stats-tab">
                        <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Profil</h2>
                        <div class="overflow-x-auto">
                            <table class="w-full mb-4 text-sm text-left text-gray-700 dark:text-gray-200">
                                <tbody>
                                    <tr><td class="font-semibold py-1 w-1/3">Nama RPTRA</td><td class="py-1">: Mutiara Rawa Binong</td></tr>
                                    <tr><td class="font-semibold py-1">Alamat</td><td class="py-1">: Jl. Raya Rawa Binong RT 001 RW 10</td></tr>
                                    <tr><td class="font-semibold py-1">Luas</td><td class="py-1">: 1800 m<sup>2</sup></td></tr>
                                    <tr><td class="font-semibold py-1">Sumber Dana</td><td class="py-1">: APBD</td></tr>
                                    <tr><td class="font-semibold py-1">Tahap</td><td class="py-1">: 4</td></tr>
                                    <tr><td class="font-semibold py-1">Tgl. Peresmian</td><td class="py-1">: 10 Oct 2017</td></tr>
                                    <tr><td class="font-semibold py-1">Kelurahan</td><td class="py-1">: Lubang Buaya</td></tr>
                                    <tr><td class="font-semibold py-1">Kecamatan</td><td class="py-1">: Cipayung</td></tr>
                                    <tr><td class="font-semibold py-1">Kota</td><td class="py-1">: Kota Jakarta Timur</td></tr>
                                    <tr>
                                        <td class="font-semibold py-1">Google Map</td>
                                        <td class="py-1">: <a href="https://goo.gl/maps/pt3Z4MzxQiRn6VCr5" target="_blank" class="text-blue-600 underline">Lihat Lokasi</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="about" role="tabpanel" aria-labelledby="about-tab">
                        <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Inventaris</h2>
                        <!-- List -->
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Nama Aset
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                    </svg></a>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Deskripsi
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                    </svg></a>
                                        </div>
                                    </th>
                                    <!-- <th scope="col" class="px-6 py-3">
                                        <div class="flex items-center">
                                            Tanggal
                                            <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                    </svg></a>
                                        </div>
                                    </th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                                    <td class="px-6 py-4">{{ $service->name }}</td>
                                    <td class="px-6 py-4">{{ $service->description }}</td>
                                    <!-- <td class="px-6 py-4">{{ $service->created_at }}</td> -->
                                </tr>
                            @empty
                                <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada layanan.</td></tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="hidden p-4 bg-white rounded-lg dark:bg-gray-800" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                        <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-white dark:bg-gray-800 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
                            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Tentang RPTRA</h2>
                            <div class="prose max-w-none dark:prose-invert text-justify">
                                <p>Untuk meningkatkan kualitas hidup warganya dengan menyediakan ruang publik ramah anak dan ruang terbuka hijau sejak tahun 2015 sampai dengan saat ini, Pemerintah Provinsi (Pemprov) DKI Jakarta telah menghadirkan ruang ketiga bagi masyarakat dalam bentuk Ruang Publik Terpadu Ramah Anak (RPTRA) di berbagai wilayah ibu kota.</p>
                                <p>Ruang Publik Terpadu Ramah Anak (RPTRA) merupakan ruang publik berupa ruang terbuka hijau ramah anak yang dilengkapi dengan berbagai fasilitas yang mendukung perkembangan anak, kenyamanan orangtua, serta tempat berinteraksi seluruh warga dari berbagai kalangan.</p>
                                <p>RPTRA terbuka untuk umum dan dibangun di tengah permukiman warga, agar manfaatnya dapat dirasakan oleh warga sekitar. Fasilitas-fasilitas dalam RPTRA tidak hanya ramah anak, namun juga ramah penyandang disabilitas. Selain itu, RPTRA juga dilengkapi dengan pengawasan CCTV (closed circuit television) yang membuat area ini memiliki sistem keamanan yang baik, sehingga orangtua tidak perlu khawatir terhadap keamanan anaknya ketika bermain dan belajar.</p>
                                <p>Proses pembangunan, pengawasan, dan pemeliharaan RPTRA melibatkan masyarakat sekitar. Sejak tahun 2015 hingga 2023, Pemprov DKI telah mendirikan 324 RPTRA yang terdapat di 44 Kecamatan dan 173 Kelurahan. Jumlah tersebut sudah melampaui target yang awalnya berjumlah 267. Dari total RPTRA yang seluruhnya, sejumlah 253 unit RPTRA dibangun dengan pembiayaan Anggaran Pendapatan dan Belanja Daerah (APBD) dan sejumlah 71 unit dibangun dengan menggunakan sumbangan dana Corporate Social Responsibility (CSR).</p>
                                <p>Adapun sebaran RPTRA di 5 Kota dan 1 Kabupaten se DKI Jakarta sebagai berikut:</p>
                                <ul class="list-disc ml-6">
                                    <li>Jakarta Pusat memiliki 50 RPTRA yang tersebar pada 31 Kelurahan. Sejumlah 35 RPTRA dibangun dengan pembiayaan APBD, dan 15 RPTRA dibangun dengan menggunakan sumbangan dana CSR;</li>
                                    <li>Jakarta Utara memiliki 77 RPTRA yang tersebar pada 24 Kelurahan. Sejumlah 64 RPTRA dibangun dengan pembiayaan APBD, dan 13 RPTRA dibangun dengan menggunakan sumbangan dana CSR;</li>
                                    <li>Jakarta Barat memiliki 58 RPTRA yang tersebar pada 33 Kelurahan. Sejumlah 46 RPTRA dibangun dengan pembiayaan APBD, dan 12 RPTRA dibangun dengan menggunakan sumbangan dana CSR;</li>
                                    <li>Jakarta Selatan memiliki 62 RPTRA yang tersebar pada 36 Kelurahan. Sejumlah 46 RPTRA dibangun dengan pembiayaan APBD, dan 16 RPTRA dibangun dengan menggunakan sumbangan dana CSR;</li>
                                    <li>Jakarta Timur memiliki 68 RPTRA yang tersebar pada 43 Kelurahan. Sejumlah 55 RPTRA dibangun dengan pembiayaan APBD, dan 13 RPTRA dibangun dengan menggunakan sumbangan dana CSR;</li>
                                    <li>Jakarta Kepulauan Seribu memiliki 9 RPTRA yang tersebar pada seluruh Kelurahan (6 Kelurahan). Sejumlah 7 RPTRA dibangun dengan pembiayaan APBD, dan 2 RPTRA dibangun dengan menggunakan sumbangan dana CSR;</li>
                                </ul>
                                <p>Sebagai ruang yang ramah anak, RPTRA menyediakan berbagai fasilitas bermain yang terbuat dari bahan plastik dan metal khusus dengan mengutamakan keamanan, seperti perosotan, ayunan, jungkat-jungkit, serta permainan lainnya. Selain fasilitas bermain, tersedia pula lapangan futsal dan badminton sebagai ruang berolahraga anak dan keluarga. RPTRA juga dilengkapi dengan taman yang dihiasi berbagai tanaman dan pusat kompos yang mendaur ulang sampah. Dengan adanya taman di RPTRA ini, diharapkan warga dapat menikmati kesejukan ruang terbuka hijau dan mendorong anak untuk peduli lingkungan.</p>
                                <p>RPTRA tidak hanya menyediakan tempat bermain di luar ruangan, tapi juga disediakan tempat interaksi di dalam ruangan seperti perpustakaan dan ruang multimedia yang ditujukan sebagai tempat belajar anak. Terlebih lagi, RPTRA saat ini sudah dilengkapi oleh wifi dan fasilitas lain untuk umum seperti PKK Mart, ruang laktasi, toilet, serta ruangan serba guna.</p>
                                <p>Dalam mengoptimalkan fungsi RPTRA juga dapat dipergunakan untuk  penyelenggaraan rapat, hajatan, pengajian, serta bakti sosial. Selain itu, dalam keadaan darurat, RPTRA dapat menjadi posko pengungsian bagi warga yang terkena dampak bencana, seperti banjir dan kebakaran.</p>
                                <p>Untuk menjaga dan memelihara RPTRA beserta seluruh fasilitas di dalamnya, Pemprov DKI mengerahkan petugas Pengelola RPTRA yang juga bertugas memfasilitasi seluruh kegiatan yang dilaksanakan di RPTRA. Selain itu, karena RPTRA merupakan ruang publik hasil kolaborasi dengan masyarakat, warga sekitar RPTRA pun ikut membantu menjaga dan memelihara fasilitas milik bersama ini.</p>
                                <p>RPTRA diharapkan dapat menjadi tempat warga, khususnya anak-anak, untuk berinteraksi, sehingga menciptakan lingkungan sosial yang baik dan masyarakat yang berkualitas hidupnya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-10">
            <h2 class="text-2xl flex items-center justify-center font-semibold mb-6 text-gray-800">Galeri</h2>
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
                    @foreach($galleries as $gallery)
                        <div class="overflow-hidden rounded-lg shadow hover:shadow-lg transition bg-white">
                            <img src="{{ asset('storage/' . $gallery->image_path) }}"
                                alt="{{ $gallery->caption }}"
                                class="w-full h-40 object-cover object-center" />
                            <div class="p-2">
                                <p class="text-xs text-gray-700 truncate">{{ $gallery->caption }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($galleries->isEmpty())
                    <div class="text-center text-gray-400 py-8">Belum ada galeri.</div>
                @endif
            </div>
        </section>

        <section class="py-10">
            <div class="max-w-7xl mx-auto px-4">
                <h2 id="artikel" class="text-2xl flex items-center justify-center font-semibold mb-6 text-gray-800">Artikel Terbaru</h2>
                <div class="grid md:grid-cols-3 gap-6">
                    @foreach($articles as $article)
                    <article class="overflow-hidden rounded-lg shadow-sm transition hover:shadow-lg">
                        <a href="{{ route('visitor.articles.show', $article->id) }}">
                        <img alt="" src="{{ asset('storage/' . $article->thumbnail) }}" class="h-56 w-full object-cover"/>
                        <div class="bg-white p-4 sm:p-6">
                            <time class="block text-xs text-gray-500">{{ $article->created_at }}</time>
                            <h3 class="mt-0.5 text-lg text-gray-900">{{ $article->title }}</h3>
                            </a>

                            <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                            {{ Str::limit($article->content, 100) }}...
                            </p>
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-10">
            <h2 class="text-2xl flex items-center justify-center font-semibold mb-6 text-gray-800">Informasi Kegiatan</h2>
            <div class="relative max-w-7xl mx-auto px-4 overflow-hidden shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                NO
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Informasi
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
            </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Deskripsi
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
            </svg></a>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Tanggal
                                    <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
            </svg></a>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($park_infos as $parkinfo)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $loop->iteration }}</th>
                            <td class="px-6 py-4">{{ $parkinfo->title }}</td>
                            <td class="px-6 py-4">{{ Str::limit($parkinfo->content, 50) }}</td>
                            <td class="px-6 py-4">{{ $parkinfo->created_at }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-4 text-center text-gray-500">Belum ada Kegiatan.</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </section>
        </div>
        
@endsection

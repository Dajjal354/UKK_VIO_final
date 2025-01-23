@extends('layouts.user')

@section('content')
<div class="main-content">
    @auth<h1 class="welcome-text">Selamat Datang, {{ Auth::user()->name ?? 'Alumni' }}! 👋</h1>@endauth
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" />
    
    <!-- Study Tracer Information Cards -->
    <div class="info-cards-container">
        <div class="info-card">
            <h3><i class="fas fa-info-circle me-2"></i>Apa itu Study Tracer?</h3>
            <p>Study Tracer adalah studi pelacakan jejak lulusan/alumni yang dilakukan untuk mengetahui outcome pendidikan dalam bentuk transisi dari dunia pendidikan tinggi ke dunia kerja. Dengan study tracer, institusi pendidikan dapat memperoleh informasi yang berharga tentang keberhasilan lulusan dalam karier mereka.</p>
        </div>

        <div class="info-card">
            <h3><i class="fas fa-bullseye me-2"></i>Tujuan Study Tracer</h3>
            <p>Study tracer bertujuan untuk mengumpulkan data yang berguna bagi pengembangan institusi, termasuk:</p>
            <ul>
                <li>Evaluasi relevansi kurikulum dengan kebutuhan pasar kerja</li>
                <li>Analisis kompetensi lulusan di dunia kerja</li>
                <li>Umpan balik untuk peningkatan kualitas layanan pendidikan</li>
                <li>Pemetaan kesempatan kerja bagi lulusan baru</li>
            </ul>
        </div>

        <div class="info-card">
            <h3><i class="fas fa-users me-2"></i>Manfaat Bagi Alumni</h3>
            <p>Partisipasi Anda dalam study tracer memberikan berbagai manfaat:</p>
            <ul>
                <li>Membantu meningkatkan kualitas pendidikan bagi generasi mendatang</li>
                <li>Memperluas jaringan alumni dan kesempatan kolaborasi</li>
                <li>Mendapatkan informasi tentang peluang pengembangan karier</li>
                <li>Berkontribusi pada pengembangan almamater</li>
            </ul>
        </div>
    </div>

    <div class="text-center mt-5">
        <a href="{{ route('alumni.register')}}" class="btn btn-survey">
            <i class="fas fa-clipboard-list me-2"></i>Isi Kuisioner Study Tracer
        </a>
    </div>

    <!-- Testimonial Section -->
    <div class="testimonial-section">
        <div class="container">
            <div class="testimonial-header">
                <p class="testimonial-label">TESTIMONIAL ALUMNI</p>
                <h2 class="testimonial-heading">Apa Kata Alumni Tentang Study Tracer?</h2>
            </div>

            <div class="swiper mySwiperTestimoni">
                <div class="swiper-wrapper">
                    @forelse($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <img class="testimonial-avatar" 
                                     src="{{ $testimonial->alumni->avatar ? '/avatars/' . $testimonial->alumni->avatar : asset('images/Sayang.jpg') }}" 
                                     alt="{{ $testimonial->alumni->name }}'s Avatar">
                                
                                <div class="testimonial-quote">
                                    <i class="fas fa-quote-left quote-icon"></i>
                                    <p>{{ $testimonial->testimoni }}</p>
                                    <i class="fas fa-quote-right quote-icon"></i>
                                </div>
                                
                                <p class="testimonial-author">{{ $testimonial->alumni->name }}</p>
                                <p class="testimonial-status">Alumni Angkatan {{ $testimonial->alumni->tahun_lulus }}</p>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide">
                            <div class="testimonial-card">
                                <div class="testimonial-quote">
                                    <p>Belum ada testimonial.</p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-5">
    <div class="container">
        <div class="footer-content">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4>Study Tracer</h4>
                    <p class="footer-description">Menghubungkan alumni dengan almamater untuk masa depan pendidikan yang lebih baik.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Hubungi Kami</h4>
                    <ul class="contact-info">
                        <li><i class="fas fa-phone me-2"></i>(021) 1234-5678</li>
                        <li><i class="fas fa-envelope me-2"></i>info@studytracer.ac.id</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i>Jl. Pendidikan No. 123, Jakarta</li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Media Sosial</h4>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 Study Tracer. All rights reserved.</p>
        </div>
    </div>
</footer>
@endsection
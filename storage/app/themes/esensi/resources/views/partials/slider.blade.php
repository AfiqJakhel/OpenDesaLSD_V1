<section class="sliderx w-full relative group transition-all duration-300 overflow-hidden" x-data="heroCarousel()">
    <div class="relative rounded-lg h-48 lg:h-[400px] z-10 w-full overflow-hidden">
        @php $slideIndex = 0; @endphp
        @foreach ($slider_gambar['gambar'] as $data)
            @php
                $img = $slider_gambar['lokasi'] . 'sedang_' . $data['gambar'];
            @endphp
            @if (is_file($img))
                <figure class="absolute inset-0 h-48 lg:h-[400px] w-full transition-all duration-600 ease-in-out"
                        :class="currentSlide === {{ $slideIndex }} ? 'opacity-100 translate-x-0' : (currentSlide > {{ $slideIndex }} ? 'opacity-0 -translate-x-full' : 'opacity-0 translate-x-full')"
                        style="transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94), opacity 0.6s;">
                    <img src="{{ base_url($img) }}" alt="{{ $data['judul'] }}" class="max-w-full w-full h-48 lg:h-[400px] object-cover">

                    @if ($slider_gambar['sumber'] != 3)
                        <div class="absolute bg-black bg-opacity-60 bottom-0 left-0 right-0 text-white">
                            <a href="{{ site_url('artikel/' . buat_slug($data)) }}" class="font-bold text-h5 block py-4 px-5 hover:py-5 transition-all duration-300">{{ $data['judul'] }}</a>
                        </div>
                    @endif
                </figure>
                @php $slideIndex++; @endphp
            @endif
        @endforeach
    </div>
    
    <!-- Navigation Arrows -->
    <div class="slider-nav">
        <span @click="prevSlide()" class="slider-nav-prev px-1 py-2 cursor-pointer transition-all duration-300 opacity-0 group-hover:opacity-100 hover:bg-primary-100 shadow absolute top-1/2 left-0 transform -translate-y-1/2 z-[99]" title="Sebelumnya">
            <i class="fas fa-chevron-left text-lg text-white px-3"></i>
        </span>
        <span @click="nextSlide()" class="slider-nav-next px-1 py-2 cursor-pointer transition-all duration-300 opacity-0 group-hover:opacity-100 hover:bg-primary-100 shadow absolute top-1/2 right-0 transform -translate-y-1/2 z-[99]" title="Selanjutnya">
            <i class="fas fa-chevron-right text-lg text-white px-3"></i>
        </span>
    </div>
    
    <!-- Dot Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 z-[99] flex gap-2">
        @for ($i = 0; $i < $slideIndex; $i++)
            <button @click="goToSlide({{ $i }})" 
                    class="w-2 h-2 rounded-full transition-all duration-300 cursor-pointer"
                    :class="currentSlide === {{ $i }} ? 'bg-white w-8' : 'bg-white/40 hover:bg-white/60'">
            </button>
        @endfor
    </div>
</section>

@push('scripts')
<script>
function heroCarousel() {
    return {
        currentSlide: 0,
        totalSlides: {{ $slideIndex }},
        autoplayInterval: null,
        isPaused: false,
        
        init() {
            this.startAutoplay();
            
            // Pause on hover
            this.$el.addEventListener('mouseenter', () => {
                this.isPaused = true;
                this.stopAutoplay();
            });
            
            // Resume on mouse leave
            this.$el.addEventListener('mouseleave', () => {
                this.isPaused = false;
                this.startAutoplay();
            });
        },
        
        nextSlide() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
            this.resetAutoplay();
        },
        
        prevSlide() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
            this.resetAutoplay();
        },
        
        goToSlide(index) {
            this.currentSlide = index;
            this.resetAutoplay();
        },
        
        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                if (!this.isPaused) {
                    this.nextSlide();
                }
            }, 5000); // Auto-slide every 5 seconds
        },
        
        stopAutoplay() {
            if (this.autoplayInterval) {
                clearInterval(this.autoplayInterval);
            }
        },
        
        resetAutoplay() {
            this.stopAutoplay();
            if (!this.isPaused) {
                this.startAutoplay();
            }
        }
    }
}
</script>
@endpush

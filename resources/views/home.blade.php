@extends('layouts.app')

@section('title', 'LPPM IBI KKG')

@section('content')
    <section class="hero section" id="hero">
      <div class="hero-mesh-bg"></div>
      <div class="hero-orb orb-primary"></div>
      <div class="hero-orb orb-secondary"></div>
      <div class="hero-orb orb-accent"></div>
      <div class="container hero-grid hero-grid-refined" style="position: relative; z-index: 2;">
        <div class="hero-copy reveal hero-copy-refined parallax-item hero-copy">
          <h1 class="hero-main-title">
            <span class="hero-title-line">Selamat Datang</span>
            <span class="hero-title-line hero-title-line-middle">di</span>
            <span class="hero-title-line hero-title-line-accent">LPPM IBIKKG</span>
          </h1>
        </div>

        <div class="hero-visual reveal hero-visual-clean hero-visual-refined parallax-item hero-visual">
          <div class="hero-carousel hero-carousel-right" id="heroCarousel">
            <div class="hero-carousel-track">
              @forelse($sliders as $index => $slider)
                <div class="hero-slide {{ $index === 0 ? 'active' : '' }}">
                  <img src="{{ Str::startsWith($slider->image, 'assets/') ? asset($slider->image) : asset('storage/' . $slider->image) }}"
                    alt="{{ $slider->title }}" />

                  <div class="hero-slide-info">
                    <span class="hero-slide-badge">LPPM IBI KKG</span>
                    <h3>{{ $slider->title }}</h3>
                    <p>{{ $slider->subtitle }}</p>

                    @if($slider->button_text)
                      <div class="hero-caption-actions">
                        <a href="{{ $slider->button_url ? (Str::startsWith($slider->button_url, '/') ? url($slider->button_url) : $slider->button_url) : '#' }}" class="btn btn-primary btn-sm">
                          {{ $slider->button_text }}
                        </a>
                        <a href="#berita-terbaru" class="btn btn-outline btn-sm btn-light-outline">
                          Berita Terbaru
                        </a>
                      </div>
                    @endif
                  </div>
                </div>
              @empty
                <div class="hero-slide active">
                  <img src="{{ asset('assets/images/1.jpeg') }}" alt="LPPM" />
                  <div class="hero-slide-info">
                    <span class="hero-slide-badge">LPPM IBI KKG</span>
                    <h3>Pusat Penelitian & Pengabdian Masyarakat</h3>
                    <p>Membangun ekosistem tridharma perguruan tinggi yang adaptif dan unggul.</p>
                  </div>
                </div>
              @endforelse
            </div>

            <button class="hero-carousel-btn prev" type="button" id="heroPrev" aria-label="Slide sebelumnya">
              &#10094;
            </button>

            <button class="hero-carousel-btn next" type="button" id="heroNext" aria-label="Slide berikutnya">
              &#10095;
            </button>

            <div class="hero-carousel-dots" id="heroDots">
              @foreach($sliders as $index => $slider)
                <button class="hero-dot {{ $index === 0 ? 'active' : '' }}" type="button" data-slide="{{ $index }}" aria-label="Slide {{ $index + 1 }}"></button>
              @endforeach
            </div>
          </div>
        </div>
    </section>

    <section class="section layanan-section" id="layanan-lppm">
      <div class="container news-showcase-wrap">
        <div class="news-showcase-head reveal">
          <span class="news-showcase-line"></span>
          <h2>Layanan</h2>
          <span class="news-showcase-line"></span>
        </div>

        <div class="section-head-center section-head-compact reveal">
          <div>
            <p>
              Akses cepat ke layanan inti LPPM untuk mendukung penelitian,
              pengabdian, publikasi ilmiah, dan kebutuhan dokumen akademik.
            </p>
          </div>
        </div>

        <div class="layanan-grid">
          <article class="news-feature-card reveal">
            <a href="{{ route('penelitian.pengumuman') }}" class="news-feature-link">
              <div class="news-feature-image">
                <img src="{{ asset('assets/images/pkm2024.jpeg') }}" alt="Layanan Penelitian" />
              </div>
              <div class="news-feature-body">
                <h3>Penelitian</h3>
                <p>Informasi skema, pengumuman, dan data penelitian dosen.</p>
              </div>
            </a>
          </article>

          <article class="news-feature-card reveal">
            <a href="{{ route('abdimas.pengumuman') }}" class="news-feature-link">
              <div class="news-feature-image">
                <img src="{{ asset('assets/images/pkm2025.jpeg') }}" alt="Layanan Abdimas" />
              </div>
              <div class="news-feature-body">
                <h3>Abdimas</h3>
                <p>
                  Program pengabdian kepada masyarakat yang relevan dan
                  berdampak.
                </p>
              </div>
            </a>
          </article>

          <article class="news-feature-card reveal">
            <a href="{{ route('publikasi.jurnal') }}" class="news-feature-link">
              <div class="news-feature-image">
                <img src="{{ asset('assets/images/LCD - Selamat dan Sukses Dosen IBIKKG].jpg') }}" alt="Layanan Publikasi" />
              </div>
              <div class="news-feature-body">
                <h3>Publikasi</h3>
                <p>
                  Jurnal, artikel ilmiah, dan prosiding untuk luaran akademik
                  kampus.
                </p>
              </div>
            </a>
          </article>

          <article class="news-feature-card reveal">
            <a href="{{ route('dokumen.unduhan') }}" class="news-feature-link">
              <div class="news-feature-image">
                <img src="{{ asset('assets/images/pkm2024.jpeg') }}" alt="Layanan Dokumen" />
              </div>
              <div class="news-feature-body">
                <h3>Dokumen</h3>
                <p>
                  Panduan, template, dan unduhan untuk kebutuhan administrasi
                  akademik.
                </p>
              </div>
            </a>
          </article>
        </div>
      </div>
    </section>

    <section class="section news-section" id="berita-terbaru">
      <div class="container news-showcase-wrap">
        <div class="news-showcase-head reveal">
          <span class="news-showcase-line"></span>
          <h2>Berita</h2>
          <span class="news-showcase-line"></span>
        </div>

        <div class="news-showcase" id="newsShowcase">
          <button class="news-nav-btn news-nav-prev" type="button" id="newsPrev" aria-label="Berita sebelumnya">
            &#10094;
          </button>

          <div class="news-track-wrap">
            <div class="news-track" id="newsTrack">
              @forelse($beritas as $berita)
                @php
                  $imgPath = Str::startsWith($berita->image, 'assets/') ? asset($berita->image) : asset('storage/' . $berita->image);
                @endphp
                <article class="news-feature-card reveal">
                  @if($berita->content)
                    <button type="button" class="news-feature-link news-modal-trigger"
                      data-news-title="{{ $berita->title }}"
                      data-news-date="{{ $berita->date }}" 
                      data-news-image="{{ $imgPath }}"
                      data-news-long="{!! $berita->content !!}">
                      <div class="news-feature-image">
                        <img src="{{ $imgPath }}" alt="{{ $berita->title }}" />
                      </div>
                      <div class="news-feature-body">
                        <h3>{{ $berita->title }}</h3>
                        <p>Klik untuk membaca informasi lengkap pengajuan artikel dan ketentuannya.</p>
                      </div>
                    </button>
                  @else
                    <a href="{{ $berita->link ? (Str::startsWith($berita->link, '/') ? url($berita->link) : $berita->link) : '#' }}" class="news-feature-link">
                      <div class="news-feature-image">
                        <img src="{{ $imgPath }}" alt="{{ $berita->title }}" />
                      </div>
                      <div class="news-feature-body">
                        <h3>{{ $berita->title }}</h3>
                        <p>{{ $berita->date }}</p>
                      </div>
                    </a>
                  @endif
                </article>
              @empty
                <p style="text-align: center; width: 100%; color: var(--text-muted);">Belum ada berita terbaru.</p>
              @endforelse
            </div>
          </div>

          <button class="news-nav-btn news-nav-next" type="button" id="newsNext" aria-label="Berita berikutnya">
            &#10095;
          </button>
        </div>
      </div>
    </section>

    <section class="section video-section" id="video-lppm">
      <div class="container news-showcase-wrap">
        <div class="news-showcase-head reveal">
          <span class="news-showcase-line"></span>
          <h2>Video</h2>
          <span class="news-showcase-line"></span>
        </div>

        <div class="video-grid" style="grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; display: grid;">
          @forelse($videos as $video)
            <article class="news-feature-card reveal" style="background: rgba(15, 28, 63, 0.4); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 16px; overflow: hidden; display: flex; flex-direction: column;">
              <div class="video-iframe-wrapper" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: #000;">
                <iframe src="{{ $video->url }}" title="{{ $video->title }}" allowfullscreen style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;"></iframe>
              </div>
              <div class="news-feature-body" style="padding: 20px; flex-grow: 1; display: flex; flex-direction: column; justify-content: space-between;">
                <div>
                  <h3 style="color: #fff; font-size: 1.15rem; font-weight: 600; margin-bottom: 8px; line-height: 1.4;">{{ $video->title }}</h3>
                  @if($video->description)
                    <p style="color: rgba(255, 255, 255, 0.6); font-size: 0.88rem; line-height: 1.5; margin-bottom: 0;">{{ Str::limit($video->description, 120) }}</p>
                  @endif
                </div>
              </div>
            </article>
          @empty
            <div style="text-align: center; width: 100%; grid-column: 1 / -1; padding: 40px; color: rgba(255,255,255,0.4);">
              <i class="fa-solid fa-video-slash" style="font-size: 2.5rem; margin-bottom: 12px; display: block; color: rgba(255,255,255,0.2);"></i>
              Belum ada video kegiatan LPPM yang diterbitkan.
            </div>
          @endforelse
        </div>
      </div>
    </section>

    <section class="section cta-banner-section">
      <div class="container">
        <div class="cta-banner reveal">
          <div class="cta-banner-copy">
            <span class="section-tag">Informasi LPPM</span>
            <h2>Butuh panduan, dokumen, atau informasi penelitian?</h2>
          </div>

          <div class="cta-banner-actions">
            <a href="{{ route('dokumen.panduan') }}" class="btn btn-primary">Lihat Panduan</a>
            <a href="{{ route('kontak.informasi') }}" class="btn btn-outline">Hubungi LPPM</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Details Modal -->
    <div class="news-modal" id="newsModal" aria-hidden="true">
      <div class="news-modal-backdrop" data-close-news-modal></div>

      <div class="news-modal-dialog" role="dialog" aria-modal="true" aria-labelledby="newsModalTitle">
        <button type="button" class="news-modal-close" id="newsModalClose" aria-label="Tutup detail berita">
          &times;
        </button>

        <div class="news-modal-media">
          <img id="newsModalImage" src="" alt="" />
        </div>

        <div class="news-modal-content">
          <span class="news-modal-date" id="newsModalDate"></span>
          <h3 id="newsModalTitle"></h3>
          <div class="news-modal-body" id="newsModalBody"></div>
        </div>
      </div>
    </div>
@endsection

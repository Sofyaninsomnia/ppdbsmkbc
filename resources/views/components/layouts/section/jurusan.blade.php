<section id="jurusan" class="team section">
    <div class="container section-title" data-aos="fade-up">
      <h2>Keahlian</h2>
      <div><span>Hadir Dengan Pilihan Kompetensi
        </span> <span class="description-title">Keahlian</span></div>
    </div>

    <div class="container">
      <div class="row gy-5">

        @foreach ($infoJurusan as $jurusan)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic">
              <img src="{{ asset('storage/'.$jurusan->cover) }}" class="img-fluid" alt="" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
            <div class="member-info">
              <h4>{{ $jurusan->jurusan->nama_jurusan }}</h4>
              <span>Rekayasa Perangkat Lunak (RPL) adalah jurusan yang fokus pada pengembangan perangkat lunak</span>
              <p>
              <div class="d-flex">
                <a href="smkbece/rpl.php" class="btn-get-started" style="color: #003366;">Lihat Selengkapnya >></a>
              </div>
            </div>
          </div>
        </div>
        @endforeach


      </div>
    </div>

    <div class="container" style="margin-top: 40px;">
      <div class="row gy-5">

        <!-- Team Member 4 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic">
              <img src="{{ asset('assets/img/jurusan/dkv.jpeg') }}" class="img-fluid" alt="" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
            <div class="member-info">
              <h4>Desain Komunikasi Visual</h4>
              <span>Jurusan Desain Komunikasi Visual fokus pada pembuatan desain grafis untuk menyampaikan pesan.</span>
              <p>
              <div class="d-flex">
                <a href="smkbece/dkv.php" class="btn-get-started" style="color: #003366;">Lihat Selengkapnya >></a>
              </div>
            </div>
          </div>
        </div>
        <!-- End Team Member -->

        <!-- Team Member 5 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic">
              <img src="{{ asset('assets/img/jurusan/tbo.jpeg') }}" class="img-fluid" alt="" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
            <div class="member-info">
              <h4>Teknik Bodi Otomotif</h4>
              <span>Jurusan Teknik Bodi Otomotif mempelajari perbaikan dan pembuatan bodi kendaraan.</span>
              <p>
              <div class="d-flex">
                <a href="smkbece/tbo.php" class="btn-get-started" style="color: #003366;">Lihat Selengkapnya >></a>
              </div>
            </div>
          </div>
        </div><!-- End Team Member -->

        <!-- Team Member 6 -->
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="member">
            <div class="pic">
              <img src="{{ asset('assets/img/jurusan/sti.jpeg') }}" class="img-fluid" alt="" style="width: 100%; height: 500px; object-fit: cover;">
            </div>
            <div class="member-info">
              <h4>Samsung Tech Institute</h4>
              <span>
                Samsung Tech Institute adalah pelatihan teknologi untuk karir di Samsung.</span>
              <p>
              <div class="d-flex">
                <a href="smkbece/sti.php" class="btn-get-started" style="color: #003366;">Lihat Selengkapnya >></a>
              </div>
            </div>
          </div>
        </div><!-- End Team Member -->

      </div>
    </div>
  </section>
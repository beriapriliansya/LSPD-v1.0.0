        <section id="tab-komunikasi-radio" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>Komunikasi & Kode Radio</h2>
              <span>RADIO PROTOCOL, CALLSIGNS & TEN-CODES</span>
            </div>

            <button class="btn-pdf-export" onclick="window.print()">
              <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
            </button>
          </div>

          <!-- Intro Banner Box -->
          <div class="radio-intro-banner">
            Komunikasi radio adalah senjata utama Anda. Informasi yang jelas, padat, dan akurat dapat menyelamatkan
            nyawa. Pelajari dan biasakan menggunakan Ten-Codes, Sandi Callsign, serta Phonetic Alphabet.
          </div>

          <!-- Main 2-Column Grid -->
          <div class="radio-page-grid">

            <!-- LEFT COLUMN -->
            <div class="radio-col">

              <!-- Card: Penggunaan 10-Codes & Kode Respon di Radio -->
              <div class="radio-card">
                <div class="radio-card-header">
                  <i class="fa-solid fa-tower-broadcast"></i> Penggunaan 10-Codes &amp; Laporan Awal Radio
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.75rem;">
                  <strong style="color:var(--text-main);">Laporan Awal (Initial Reporting) — Contoh:</strong>
                  <div class="radio-quote-box">
                    "Dispatch this is 71-ADAMS/LINCOLN-503 will be doing 55 at (location) with the 60 (ciri-ciri
                    kendaraan), posible (jumlah) 61, and the plat number is (.......), stand by for future update"
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.75rem;">
                  <strong style="color:#f87171;">Laporan Update 10-57 (Pursuit / Pengejaran) — Contoh:</strong>
                  <div class="radio-quote-box" style="border-left-color:#f87171;">
                    "Dispatch, for the last 10-55 situation on [nama jalan], it's now changing into active 10-57 (pursuit). Requesting 10-78 (backup) on my 20 (location). Suspect is now heading [arah pelarian]."
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:1rem;">
                  <strong style="color:var(--text-main);">Struktur Pembaruan Arah:</strong>
                  <ul style="padding-left:1.2rem; margin-top:0.4rem; line-height:1.6; color:var(--text-muted);">
                    <li><span style="color:#60a5fa; font-weight:600;">Action (Tindakan)</span> — contoh: heading / belok
                      kiri (turn left)</li>
                    <li><span style="color:#4ade80; font-weight:600;">Arah Mata Angin</span> — North / South / East /
                      West</li>
                    <li><span style="color:#facc15; font-weight:600;">Nama Jalan</span> — lokasi atau jalur jalan saat
                      ini</li>
                    <li><span style="color:#c084fc; font-weight:600;">Info Tambahan</span> — landmark, kepadatan lalu
                      lintas, deskripsi fisik suspect</li>
                  </ul>
                </div>

                <div style="border-top:1px solid var(--border-color); padding-top:0.85rem; font-size:0.85rem;">
                  <strong style="color:var(--text-main); display:block; margin-bottom:0.3rem;">Cara Mengucapkan
                    Callsign:</strong>
                  <p style="color:var(--text-muted); font-size:0.82rem; margin-bottom:0.4rem;">
                    Misal badge number Milo Hale itu <strong style="color:var(--color-gold);">71503</strong>
                  </p>
                  <ul style="padding-left:1.2rem; color:var(--text-main); font-size:0.83rem; line-height:1.6;">
                    <li>Jika sendiri (lincoln): <strong>71 Lincoln 503</strong></li>
                    <li>Dengan partner (adam): <strong>71 Adam 503</strong></li>
                  </ul>
                  <span
                    style="font-size:0.75rem; color:var(--text-dim); font-style:italic; display:block; margin-top:0.3rem;">
                    *Angka 71 merujuk pada nomor divisi/stasiun tempat bertugas.
                  </span>
                </div>
              </div>

              <!-- Card: Dedicated Transmisi Pembaruan Situasi & BOLO -->
              <div class="radio-card">
                <div class="radio-card-header"
                  style="background:rgba(37, 99, 235, 0.12); border-bottom-color:rgba(37, 99, 235, 0.3);">
                  <i class="fa-solid fa-arrows-rotate" style="color:var(--color-gold);"></i> Transmisi Pembaruan Situasi
                  &amp; BOLO (Updates &amp; Pursuit Transitions)
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:var(--color-gold);">1. Laporan Awal 10-34 Narkoba / Suspicious
                    Situation:</strong>
                  <div class="radio-quote-box" style="border-left-color:var(--color-gold); margin-top:0.35rem;">
                    "Dispatch, this is 71 Adam 530. We have an active 34 at [location], suspect brandishing narcotics.
                    60 is [vehicle description], possible 61 is [number of occupants], and the plate number is [plate].
                    Stand by for further updates."
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:#f87171;">2. Peralihan dari 10-55 / 10-34 ke Active 10-57 (Pursuit / Pengejaran):</strong>
                  <div class="radio-quote-box" style="border-left-color:#f87171; margin-top:0.35rem;">
                    "Dispatch, for the last 10-55 situation on [nama jalan], it's now changing into active 10-57 (pursuit). Requesting 10-78 (backup) on my 20 (location). Suspect is now heading [arah pelarian]."
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.35rem;">
                  <strong style="color:#60a5fa;">3. Detail Arah Pelarian (Heading Updates):</strong>
                  <div class="radio-quote-box" style="border-left-color:#60a5fa; margin-top:0.35rem;">
                    "Suspect is now heading West on Vespucci Blvd, taking left on Intersection, heading South on San
                    Andreas Ave."
                  </div>
                </div>
              </div>

              <!-- Card: Contoh Transmisi Patroli & Izin Wilayah -->
              <div class="radio-card">
                <div class="radio-card-header">
                  <i class="fa-solid fa-microphone-lines"></i> Transmisi Patroli &amp; Izin Wilayah (Patrol &amp; County
                  Requests)
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:var(--color-gold);">1. Reporting On-Duty Patrol (Patroli Municipal):</strong>
                  <div class="radio-quote-box" style="border-left-color:var(--color-success); margin-top:0.35rem;">
                    "71-adam-530 reporting 10-8 arround municipial area. stand by for any situation"
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:var(--color-warning);">2. Masuk Area County untuk Treatment (Alta
                    Hospital):</strong>
                  <div class="radio-quote-box" style="border-left-color:var(--color-warning); margin-top:0.35rem;">
                    "71 adam 530 requesting to enter county area for treatment at alta hospital"
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:var(--color-info);">3. Meninggalkan Area County (Kembali ke Municipal):</strong>
                  <div class="radio-quote-box" style="border-left-color:var(--color-info); margin-top:0.35rem;">
                    "71 adam 530 requesting to leave county area back to municipal"
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:#a855f7;">4. Assisting / Bantu Respon Situasi (Assisting 10-55 /
                    Backup):</strong>
                  <div class="radio-quote-box" style="border-left-color:#a855f7; margin-top:0.35rem;">
                    "copy 71 adamn 503 will be aassisting for the last 55"
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.35rem;">
                  <strong style="color:var(--color-success);">5. Laporan Selesai / Clear (Code 4 Broadcast):</strong>
                  <div class="radio-quote-box" style="border-left-color:var(--color-success); margin-top:0.35rem;">
                    "Dispatch, this is 71 Adam 503.reporting for the Last 55 is al ready Code 4. Thanks for all officer
                    assiting,"
                  </div>
                </div>
              </div>

              <!-- Card: Dedicated 31-A / 31-B Robbery Broadcasts Card -->
              <div class="radio-card">
                <div class="radio-card-header"
                  style="background:rgba(239, 68, 68, 0.12); border-bottom-color:rgba(239, 68, 68, 0.3);">
                  <i class="fa-solid fa-person-falling-burst" style="color:#ef4444;"></i> Transmisi Perampokan &amp;
                  Situasi (31-A / 31-B Robbery Broadcasts)
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.85rem;">
                  <strong style="color:#f97316;">1. Respon Robbery / Situasi (31-A / 31-B Response):</strong>
                  <div class="radio-quote-box" style="border-left-color:#f97316; margin-top:0.35rem;">
                    "Dispatch this is 71 adam 530 responding to the last 31a at Vespucci Boulevard"
                  </div>
                </div>

                <div style="font-size:0.85rem; margin-bottom:0.35rem;">
                  <strong style="color:#ef4444;">2. Warung / Robbery Update (31-B Situation Update):</strong>
                  <div class="radio-quote-box" style="border-left-color:#ef4444; margin-top:0.35rem;">
                    "For the last 31-B at initial report, we have an active situation at this time.<br>
                    60 is a white F33.<br>
                    61 is 2 hostage.<br>
                    Requesting additional units,78. Standby for further updates"
                  </div>
                </div>
              </div>

              <!-- Card: Ten-Codes -->
              <div class="radio-card">
                <div class="radio-card-header" style="justify-style:space-between;">
                  <div style="display:flex; align-items:center; gap:0.5rem;">
                    <i class="fa-solid fa-list-ol"></i> Ten-Codes
                  </div>
                </div>

                <div class="tencodes-scroll-table" id="tenCodesListContainer">
                  <!-- Rendered via JS -->
                </div>
              </div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="radio-col">

              <!-- Card: Phonetic Alphabet -->
              <div class="radio-card">
                <div class="radio-card-header">
                  <i class="fa-solid fa-font"></i> Phonetic Alphabet
                </div>

                <div class="phonetic-grid-container">
                  <div class="phonetic-item"><strong>A:</strong> Adam</div>
                  <div class="phonetic-item"><strong>J:</strong> John</div>
                  <div class="phonetic-item"><strong>S:</strong> Sam</div>
                  <div class="phonetic-item"><strong>B:</strong> Boy</div>
                  <div class="phonetic-item"><strong>K:</strong> King</div>
                  <div class="phonetic-item"><strong>T:</strong> Tom</div>
                  <div class="phonetic-item"><strong>C:</strong> Charles</div>
                  <div class="phonetic-item"><strong>L:</strong> Lincoln</div>
                  <div class="phonetic-item"><strong>U:</strong> Union</div>
                  <div class="phonetic-item"><strong>D:</strong> David</div>
                  <div class="phonetic-item"><strong>M:</strong> Mary</div>
                  <div class="phonetic-item"><strong>V:</strong> Victor</div>
                  <div class="phonetic-item"><strong>E:</strong> Edward</div>
                  <div class="phonetic-item"><strong>N:</strong> Nora</div>
                  <div class="phonetic-item"><strong>W:</strong> William</div>
                  <div class="phonetic-item"><strong>F:</strong> Frank</div>
                  <div class="phonetic-item"><strong>O:</strong> Ocean</div>
                  <div class="phonetic-item"><strong>X:</strong> X-Ray</div>
                  <div class="phonetic-item"><strong>G:</strong> George</div>
                  <div class="phonetic-item"><strong>P:</strong> Paul</div>
                  <div class="phonetic-item"><strong>Y:</strong> Young</div>
                  <div class="phonetic-item"><strong>H:</strong> Henry</div>
                  <div class="phonetic-item"><strong>Q:</strong> Queen</div>
                  <div class="phonetic-item"><strong>Z:</strong> Zebra</div>
                  <div class="phonetic-item"><strong>I:</strong> Ida</div>
                  <div class="phonetic-item"><strong>R:</strong> Robert</div>
                </div>
              </div>

              <!-- Card: Sistem Sandi Callsign & Kode Respon -->
              <div class="radio-card">
                <div class="radio-card-header">
                  <i class="fa-solid fa-id-badge"></i> Sistem Sandi Callsign & Kode Respon
                </div>
                <p style="font-size:0.78rem; color:var(--text-muted); margin-bottom:0.75rem;">
                  Sandi Callsign digunakan untuk identifikasi unit saat komunikasi radio dan dispatch.
                </p>

                <table class="callsign-table">
                  <thead>
                    <tr>
                      <th>Callsign</th>
                      <th>Unit Assignment / Deskripsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><strong>STAFF</strong></td>
                      <td>High Command</td>
                    </tr>
                    <tr>
                      <td><strong>VICTOR</strong></td>
                      <td>Command Staff</td>
                    </tr>
                    <tr>
                      <td><strong>ADAM</strong></td>
                      <td>Supervisor / NCO - Berpasangan (2 Officer)</td>
                    </tr>
                    <tr>
                      <td><strong>LINCOLN</strong></td>
                      <td>Supervisor / NCO - Solo Patrol (1 Officer)</td>
                    </tr>
                    <tr>
                      <td><strong>HENRY</strong></td>
                      <td>Interceptor Unit</td>
                    </tr>
                    <tr>
                      <td><strong>GOLF</strong></td>
                      <td>Interceptor High Command</td>
                    </tr>
                    <tr>
                      <td><strong>MARY</strong></td>
                      <td>Unit Motor (Patroli Roda 2)</td>
                    </tr>
                    <tr>
                      <td><strong>DAVID</strong></td>
                      <td>Metro Unit</td>
                    </tr>
                    <tr>
                      <td><strong>BEAST</strong></td>
                      <td>Bearcat Unit</td>
                    </tr>
                    <tr>
                      <td><strong>NORA</strong></td>
                      <td>K9 Unit</td>
                    </tr>
                    <tr>
                      <td><strong>AIR</strong></td>
                      <td>Air Support Division (Helikopter)</td>
                    </tr>
                    <tr>
                      <td><strong>AIR-STAFF</strong></td>
                      <td>Air Support High Command</td>
                    </tr>
                    <tr>
                      <td><strong>GEORGE</strong></td>
                      <td>Detective Unit</td>
                    </tr>
                  </tbody>
                </table>

                <div
                  style="margin-top:1.25rem; border-top:1px solid var(--border-color); padding-top:0.85rem; font-size:0.82rem; line-height:1.6;">
                  <strong style="color:var(--color-gold); display:block; margin-bottom:0.4rem;">Kode Respon Lapangan
                    (Response Code)</strong>
                  <p style="margin-bottom:0.25rem;"><strong style="color:var(--text-main);">Code 1:</strong>
                    Non-emergency. Patroli normal, wajib mematuhi aturan lalu lintas.</p>
                  <p style="margin-bottom:0.25rem;"><strong style="color:var(--text-main);">Code 2:</strong> Emergency
                    ringan. Lampu rotator menyala, sirine mati (Pendekatan senyap).</p>
                  <p style="margin-bottom:0.25rem;"><strong style="color:var(--color-danger);">Code 3:</strong>
                    Emergency penuh. Lampu rotator & sirine aktif (Respons darurat prioritas).</p>
                  <p style="margin-bottom:0.25rem;"><strong style="color:var(--text-main);">Code 4:</strong> Situasi
                    aman terkendali, tidak membutuhkan backup tambahan.</p>
                  <p style="margin-bottom:0.25rem;"><strong style="color:var(--text-main);">Code 6:</strong> Out of
                    vehicle (Memulai investigasi di luar mobil patroli).</p>
                </div>
              </div>

              <!-- Card: Radio Abbreviations -->
              <div class="radio-card">
                <div class="radio-card-header">
                  <i class="fa-solid fa-arrow-down-a-z"></i> Radio Abbreviations
                </div>
                <p style="font-size:0.78rem; color:var(--text-muted); margin-bottom:0.75rem;">
                  Daftar terminologi penting penegakan hukum (LEO) di radio.
                </p>

                <div class="search-box" style="margin-bottom:0.75rem;">
                  <i class="fa-solid fa-magnifying-glass"></i>
                  <input type="text" id="abbrevSearch" placeholder="Cari istilah (Contoh: BOLO, DUI, PIT)..."
                    oninput="filterAbbrevs(this.value)">
                </div>

                <div class="abbrev-scroll-list" id="abbrevContainer">
                  <!-- Rendered via JS -->
                </div>
              </div>

            </div>
          </div>

          <!-- Bottom Navigation Controls Bar (Previous / Next) -->
          <div class="bottom-nav-bar">
            <button class="btn-prev" onclick="prevTab()">
              <i class="fa-solid fa-arrow-left"></i> Previous
            </button>

            <span style="font-size:0.75rem; color:var(--text-dim); font-family:var(--font-mono);">
              HANDBOOK COMPILED BY MILO HALE @ LSPD
            </span>

            <button class="btn-next" onclick="nextTab()">
              Next <i class="fa-solid fa-arrow-right"></i>
            </button>
          </div>
        </section>
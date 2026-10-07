        <section id="tab-prosedur-taktis" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>SOP & Prosedur Taktis</h2>
              <span>TACTICAL SOP, PROTOCOLS & ENGAGEMENT MATRIX</span>
            </div>

            <button class="btn-pdf-export" onclick="window.print()">
              <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
            </button>
          </div>

          <!-- Top Notice Banner -->
          <div class="radio-intro-banner">
            SOP Taktis wajib dipatuhi untuk memastikan keamanan Officer dan masyarakat. Pelanggaran SOP dapat berakibat
            fatal secara operasional maupun administratif (Pemberian sanksi Strike).
          </div>

          <!-- Accordion Container List -->
          <div class="accordion-container">
            <!-- 1. Prosedur Traffic Stop (10-55) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-car-side"></i> Prosedur Traffic Stop (10-55)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4>1) Hentikan Kendaraan</h4>
                  <p>Nyalakan sirine/lampu rotator, lalu umumkan lewat mic:</p>
                  <div class="code-quote">"This is LSPD to [Deskripsi Kendaraan], please pull over your vehicle."</div>
                  <p>Posisikan mobil polisi tepat di belakang kendaraan tersangka. Perintahkan pengemudi: <strong>"Turn
                      off your engine and remain inside the vehicle."</strong></p>
                </div>
                <div class="step-block">
                  <h4>2) Lapor ke Central (Dispatch)</h4>
                  <p>Kirim laporan traffic stop di radio:</p>
                  <div class="code-quote">"Dispatch this is 71-ADAMS/LINCOLN-503 will be doing 55 at (location) with the
                    60 (ciri-ciri kendaraan), posible (jumlah) 61, and the plat number is (.......), stand by for future
                    update"</div>
                  <p style="font-size:0.83rem; color:#f87171; font-weight:600; margin-top:0.4rem;">※ Update jika suspect lari / berpindah ke 10-57 Pursuit:</p>
                  <div class="code-quote" style="border-left-color:#f87171;">"Dispatch, for the last 10-55 situation on [nama jalan], it's now changing into active 10-57 (pursuit). Requesting 10-78 (backup) on my 20 (location). Suspect is now heading [arah pelarian]."</div>
                </div>
                <div class="step-block">
                  <h4>3) Dekati Kendaraan</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li>Turun dari mobil, jalan di sisi kiri menuju pintu sopir.</li>
                    <li>Tunjukkan badge polisi and perkenalkan diri.</li>
                    <li>Minta ID & SIM. Jika menolak kasih ID, jelaskan alasan stop (contoh: speeding, broken tail
                      light, dll).</li>
                    <li>Jika memberi ID & SIM, lanjut ke tahap berikutnya.</li>
                  </ul>
                </div>
                <div class="step-block">
                  <h4>4) Cek Identitas di MDT</h4>
                  <p>Kembali ke mobil patroli. Cek nama tersangka di MDT apakah memiliki: <strong
                      style="color:var(--color-danger);">WARRANT</strong> (buron), <strong
                      style="color:var(--color-warning);">BOLO</strong> (kendaraan dicari), atau catatan pelanggaran
                    lalin sebelumnya.</p>
                  <p style="color:var(--color-danger); font-size:0.83rem; margin-top:0.3rem;">※ <strong>Jika ada
                      WARRANT/BOLO → Segera ubah menjadi Felony Stop & panggil backup 10-78.</strong></p>
                </div>
                <div class="step-block">
                  <h4>5) Konfirmasi Alasan Stop</h4>
                  <p>Balik ke kendaraan tersangka. Tanyakan: <em>"Do you know why I pulled you over?"</em></p>
                  <p>Jika jawabannya salah/tidak tahu → jelaskan alasan detail. Jika benar → biarkan mereka menjelaskan.
                  </p>
                </div>
                <div class="step-block">
                  <h4>6) Berikan Sanksi</h4>
                  <p>Putuskan tindakan akhir: <strong>Warning</strong> (peringatan lisan untuk lalin ringan) atau
                    <strong>Ticket</strong> (denda). Kembalikan ID & SIM, lalu ucapkan: <em>"Have a nice day, drive
                      safe."</em>
                  </p>
                </div>
                <div class="step-block">
                  <h4>7) Akhiri Stop &amp; Lepaskan Kendaraan</h4>
                  <p>Kembali ke mobil, matikan sirine dan rotator, lalu suruh suspect jalan.</p>
                </div>
                <div class="step-block">
                  <h4>8) Laporan Selesai / Clear (Code 4)</h4>
                  <p>Jika selesai atau clear, umumkan ke radio:</p>
                  <div class="code-quote">"Dispatch, this is 71 Adam 503.reporting for the Last 55 is al ready Code 4.
                    Thanks for all officer assiting,"</div>
                </div>
              </div>
            </div>

            <!-- 2. Prosedur Felony Stop (10-38) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-gun" style="color:#ef4444;"></i> Prosedur Felony Stop (10-38)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#f87171;">1) Lapor ke Central (Dispatch) &amp; Request Backup</h4>
                  <p>Lapor perubahan situasi dari 10-55 ke 10-38 / minta backup 10-78:</p>
                  <div class="code-quote">"Dispatch this is 71 adam 530 for last 55 we changed 38 because 60 61 has
                    warrants and bolo need 78"</div>
                  <p style="font-size:0.83rem; color:#f87171; font-weight:600; margin-top:0.4rem;">※ Update jika suspect lari / berpindah ke 10-57 Pursuit:</p>
                  <div class="code-quote" style="border-left-color:#f87171;">"Dispatch, for the last 10-55 situation on [nama jalan], it's now changing into active 10-57 (pursuit). Requesting 10-78 (backup) on my 20 (location). Suspect is now heading [arah pelarian]."</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">2) Instruksi Matikan Mesin &amp; Kunci</h4>
                  <p>Minta suspect untuk mematikan mesin kendaraan dan membuang kunci keluar jendela.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">3) Instruksi Keluar Kendaraan</h4>
                  <p>Pegang senjata (draw firearm), perintahkan suspect untuk keluar dari kendaraan dengan tangan
                    terangkat tinggi.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">4) Komando Keluar Unit (Radio Broadcast)</h4>
                  <p>Koordinasikan serentak ke seluruh unit responder lewat radio:</p>
                  <div class="code-quote">"To Units responder felony stop, we get out from the vehicle in 3... 2... 1...
                    go"</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">5) Pointing Senjata ke Suspect</h4>
                  <p>Pointing senjata api lurus membidik ke arah suspect dari balik perlindungan pintu kendaraan
                    (cover).</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">6) Posisi Suspect (Mata 1 &amp; Mundur)</h4>
                  <p>Suruh suspect membalikkan badan (posisi mata 1) dan berjalan mundur perlahan ke arah suara petugas.
                  </p>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">7) Borgol &amp; Pembacaan Hak Miranda</h4>
                  <p>Borgol suspect, lalu bacakan Hak Miranda secara jelas:</p>
                  <div class="code-quote">"Kamu berhak untuk diam, apapun yang kamu katakan dapat digunakan untuk
                    melawan anda dan dibawa ke pengadilan. Anda berhak untuk menunjuk pengacara. jika tidak ada maka
                    kami akan menentukan seorang pengacara untuk anda."</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">8) Pengecekan Kendaraan Suspect</h4>
                  <p>Minta 1 officer untuk mengecek kendaraan suspect:</p>
                  <div class="code-quote">"I need 1 officer to check the suspect's vehicle"</div>
                  <p style="margin-top:0.4rem;">Cek kendaraan suspect dan buka semua pintu secara bersamaan dengan
                    hitungan <strong>1... 2... 3...</strong></p>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">9) Penanganan Impound Kendaraan</h4>
                  <p>Ketika kendaraan sudah dinyatakan clear, IC (Incident Commander) menentukan apakah kendaraan akan
                    di-<strong>Impound Public</strong> atau <strong>Impound Sita</strong>.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#f87171;">10) Laporan Clear / Code 4 &amp; Escort (Dispatch)</h4>
                  <p>Jika situasi sudah selesai atau clear, laporkan ke radio:</p>
                  <div class="code-quote">"Dispatch, this is 71 Adam 530.reporting for the Last 38 is al ready Code 4.
                    We got 1 95 and gone be iscorting Alta Station. Thanks for all officer assiting,"</div>
                  <div
                    style="margin-top:0.6rem; padding:0.6rem 0.8rem; background:rgba(59, 130, 246, 0.1); border-left:3px solid var(--color-info); border-radius:4px; font-size:0.83rem; color:var(--text-main);">
                    <strong style="color:var(--color-gold);">Opsional (Komando Perintah IC):</strong><br>
                    <em>"Saya butuh 2 officer untuk memproses suspect dan sisanya silahkan breaking off."</em>
                  </div>
                </div>
              </div>
            </div>

            <!-- 3. Prosedur 10-34 (Suspicious Activity & Narkoba) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-capsules" style="color:#c084fc;"></i> Prosedur 10-34 (Suspicious Activity &amp;
                  Narkoba)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#c084fc;">1) Pemantauan Visual &amp; Laporan Awal (Radio Broadcast)</h4>
                  <p>Lakukan pengamatan visual dari jarak aman terhadap aktivitas transaksi ilegal / penggunaan narkoba
                    mencurigakan. Kirim laporan ke radio:</p>
                  <div class="code-quote">"Dispatch, this is 71 Adam 530. We have an active situation at [location],
                    suspect brandishing narcotics. 60 is [vehicle description], possible 61 is [number of occupants],
                    and the plate number is [plate]. Stand by for further updates."</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#c084fc;">2) Interogasi Lisan &amp; Frisking</h4>
                  <p>Hampiri subjek secara tenang, lakukan interogasi lisan di tempat &amp; penggeledahan fisik ringan
                    (<em>frisk</em>) untuk memeriksa bukti narkotika atau barang haram.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#c084fc;">3) Penanganan Barang Bukti &amp; Penahanan (10-95)</h4>
                  <p>Jika ditemukan barang bukti narkoba/senjata ilegal, amankan barang bukti (<em>Take Evidence</em>),
                    borgol tersangka (10-95), dan bawa ke kantor polisi terdekat (Alta / MRPD).</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#c084fc;">4) Transisi Darurat (Pengejaran Active 10-57)</h4>
                  <p style="color:#f87171; font-size:0.85rem; line-height:1.6;">※ <strong>Apabila tersangka melarikan
                      diri saat hendak disergap (pake mobil/kaki), situasi langsung berganti status menjadi 10-57
                      (Pursuit). Segera laporkan ke dispatch untuk meminta bantuan 10-78.</strong></p>
                </div>
              </div>
            </div>

            <!-- 4. Prosedur 31-A (Silent Alarm & Initial Robbery Response) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-bell-slash" style="color:#3b82f6;"></i> Prosedur 31-A (Silent Alarm &amp; Respon
                  Perampokan Awal)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#3b82f6;">1) Transmisi Respon Radio (31-A Call-out)</h4>
                  <p>Saat laporan perampokan/silent alarm toko atau rumah masuk ke radio dispatch, segera laporkan
                    respon unit Anda:</p>
                  <div class="code-quote">"Dispatch this is 71 adam 530 responding to the last 31a at [Nama Jalan /
                    Lokasi]"</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">2) Pendekatan Senyap (Silent Approach) &amp; Arrival</h4>
                  <p>Mendekati TKP dengan sirine mati (<em>silent approach</em>) agar tidak memicu kepanikan atau
                    membahayakan warga sipil. Lapor status 10-23 (Tiba di Lokasi).</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">3) Pembentukan Perimeter Awal (Containment)</h4>
                  <p>Posisikan cruiser polisi untuk mengunci rute keluar utama dan mengamati visual fisik perampok (61)
                    maupun kendaraan melarikan diri (60).</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">4) Penetapan Saluran TAC &amp; Incident Commander (IC)</h4>
                  <p>Unit responder utama mengambil alih peran Incident Commander (IC), menetapkan frekuensi radio TAC
                    khusus, dan berkoordinasi dengan seluruh unit pendukung.</p>
                </div>
              </div>
            </div>

            <!-- 5. Prosedur 31-B (Active Robbery & Hostage Situation) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-handcuffs" style="color:#ef4444;"></i> Prosedur 31-B (Active Robbery &amp;
                  Hostage Situation)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#ef4444;">1) Laporan Radio Respon Awal (Initial Responding Broadcast)</h4>
                  <p>Saat merespon laporan perampokan 31-B menuju TKP, laporkan ke radio dispatch:</p>
                  <div class="code-quote">"Dispatch this is 71 adam 530 responding to the last 31b at [Nama Jalan / Lokasi]"</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#ef4444;">2) Broadcast Laporan Situasi Aktif (Warung / Robbery Update)</h4>
                  <p>Lakukan pembaruan detail situasi perampokan aktif &amp; sandera ke radio dispatch:</p>
                  <div class="code-quote">"For the last 31-B at initial report, we have an active situation at this time.<br>60 is a [Warna &amp; Tipe Kendaraan].<br>61 is [Jumlah] hostage.<br>Requesting additional units,78. Standby for further updates"</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#ef4444;">3) Negosiasi Taktis Sandera (Hostage Negotiation)</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li><strong>Ada Sandera (Hostage):</strong> Negosiator resmi/IC bernegosiasi mengamankan keselamatan sandera. Penuhi tuntutan wajar (seperti <em>free passage / no spike strips</em>) demi nyawa sandera.</li>
                    <li><strong>Tanpa Sandera:</strong> Polisi berhak melakukan <em>breach-in</em> (penerobosan paksa) sesuai dengan komando taktis IC.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#ef4444;">4) Transisi Pengejaran (Pursuit Mode)</h4>
                  <p>Ketika perampok melarikan diri menggunakan kendaraan, langsung ubah mode ke 10-57 Pursuit. Batasi unit sesuai jumlah kendaraan tersangka.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#ef4444;">5) Clearance Broadcast (Code 4 Update)</h4>
                  <p>Jika perampokan berhasil ditangani dan seluruh tersangka dalam pengamanan:</p>
                  <div class="code-quote">"Dispatch, this is 71 Adam 503.reporting for the Last 31-B is al ready Code 4. Thanks for all officer assiting,"</div>
                </div>
              </div>
            </div>

            <!-- 4. Gang War / Active Shootout (10-71) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-skull-crossbones" style="color:#ef4444;"></i> Gang War / Active Shootout (10-71)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <p style="margin-bottom:0.6rem;">1. Laporkan situasi <strong style="color:#ef4444;">10-71</strong>,
                    tetapkan Code 3 respon darurat untuk seluruh unit di kota.</p>
                  <p style="margin-bottom:0.6rem;">2. <strong>Dilarang keras</strong> unit pertama langsung menerobos
                    masuk ke area baku tembak. Keselamatan Officer prioritas mutlak.</p>
                  <p style="margin-bottom:0.6rem;">3. Tunggu di perimeter luar. Bentuk barikade jalan agar warga sipil
                    yang tidak tahu tidak masuk ke zona peluru (Kill Zone).</p>
                  <p style="margin-bottom:0.6rem;">4. Setelah bantuan datang dan situasi mereda, mulai lakukan
                    sterilisasi dan pencarian bukti (<em>*search*</em>) di TKP. Jika menemukan suspect tergeletak,
                    segera lakukan evakuasi medis dan bawa ke <strong>**Sector A (Alta/MRPD)**</strong>. <span
                      style="color:#f87171; font-weight:bold;">Pastikan untuk melakukan uji GSR (Gunshot Residue) dan
                      mengamankan bukti senjata (Take Evidence) terlebih dahulu!</span></p>
                </div>
              </div>
            </div>

            <!-- 5. Prosedur Respon Robbery (Perampokan) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-masks-theater" style="color:#3b82f6;"></i> Prosedur Respon Robbery (Perampokan)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#3b82f6;">Persyaratan Unit Patroli</h4>
                  <p>Unit patroli (<strong>ADAM / ROBERT</strong>) maksimal terdiri dari tiga officer demi efisiensi
                    taktis.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Tanggung Jawab First Responder (Unit Pertama Tiba)</h4>
                  <p>Saat tiba pertama kali di TKP perampokan:</p>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li>Nyatakan status <strong>10-23 (Tiba di Lokasi)</strong> ke Dispatch.</li>
                    <li>Laporkan kondisi visual awal dan jumlah perkiraan tersangka jika terpantau.</li>
                    <li>Bangun perimeter pengamanan awal (<em>*containment*</em>) di area luar TKP.</li>
                  </ul>
                  <p style="margin-top:0.4rem; font-size:0.83rem;">Contoh Laporan Radio:</p>
                  <div class="code-quote">"Central, ini [Callsign] merespon ke [Jenis Robbery] di [Lokasi]."</div>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Negosiasi</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li><strong>Jika ada Sandera (Hostage):</strong> Mulai negosiasi taktis untuk menjamin keselamatan
                      sandera. Tunggu keputusan dan instruksi dari Incident Commander (IC).</li>
                    <li><strong>Jika TIDAK ada Sandera:</strong> Polisi diizinkan melakukan tindakan penerobosan
                      langsung (<em>*breach-in*</em>) sesuai kesepakatis taktis dan aturan Robbery Matrix.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Laporan Dispatch &amp; Penetapan TAC</h4>
                  <p>Setelah komando diambil alih oleh IC, panggilan formal dispatch harus dibuat dan alokasi saluran
                    TAC radio ditetapkan. Saluran TAC ini wajib disesuaikan dengan jumlah kendaraan tersangka yang
                    berupaya melarikan diri.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Transisi Menuju Pengejaran (Pursuit Transition)</h4>
                  <p>Ketika tersangka mulai melarikan diri dari TKP menggunakan kendaraan, langsung ubah mode menjadi
                    Prosedur Pursuit (Pengejaran). Unit Primary dan Secondary wajib ditunjuk seketika dan batas maksimal
                    unit di lapangan harus dipatuhi dengan ketat.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Penanganan Kendaraan Tersangka Ganda</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li><strong>1 Kendaraan Tersangka:</strong> Dibatasi maksimal <strong>4-5 unit</strong> pengejar.
                    </li>
                    <li><strong>2 Kendaraan Tersangka:</strong> Diperbolehkan hingga <strong>8-10 unit</strong> pengejar
                      (dipecah menjadi dua rombongan).</li>
                    <li><strong>Lebih dari 2 Kendaraan:</strong> Unit tambahan disesuaikan secara proporsional
                      berdasarkan diskresi mutlak dari Incident Commander.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Prosedur VCB (Visual Contact Broken)</h4>
                  <p>Apabila salah satu kendaraan buronan mengalami status VCB (kehilangan kontak visual), unit Primary
                    diperbolehkan mengalihkan rute untuk membantu unit pengejaran aktif lainnya pada insiden yang sama.
                    Unit pendukung yang tidak mendapatkan target harus segera disengage (mundur) dan kembali bersiap
                    untuk patroli kota normal.</p>
                </div>
              </div>
            </div>

            <!-- 6. Prosedur Pursuit (Pengejaran) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-truck-monster" style="color:#60a5fa;"></i> Prosedur Pursuit (Pengejaran)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#3b82f6;">Batasan Jumlah Unit</h4>
                  <p>Jumlah maksimal unit aktif yang diperbolehkan di dalam iring-iringan pengejaran adalah <strong>4 -
                      5 unit</strong>, dengan rincian formasi:</p>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li><strong>2 Unit Interceptor (Henry / Golf):</strong> Wajib berada di paling depan sebagai unit
                      pengambil keputusan.</li>
                    <li><strong>3 Unit Patroli Dasar (Basic / Adam / Lincoln):</strong> Bertindak sebagai unit pendukung
                      di barisan belakang.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Dukungan Udara &amp; Unit Khusus</h4>
                  <p>Dalam situasi perampokan tertentu, Incident Commander (IC) dapat meminta otorisasi unit tambahan
                    berupa <strong>Unit Motor (MARY)</strong> atau <strong>Air Support (AIR)</strong>. Apabila AIR atau
                    MARY dimasukkan ke dalam barisan aktif, maka salah satu unit pengejar dasar yang sudah ada
                    sebelumnya wajib mengundurkan diri agar total unit di lapangan tetap dalam batas regulasi.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Tanggung Jawab Unit Utama</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li><strong>Primary Unit (Henry / Unit Paling Depan):</strong> Bertanggung jawab penuh
                      mempertahankan kontak visual dengan ekor target. Fokus kemudi 100% aman dan dilarang melakukan
                      call-out di radio demi menjaga konsentrasi berkendara.</li>
                    <li><strong>Secondary Unit (Unit Kedua):</strong> Berfungsi sebagai navigator utama di radio,
                      bertugas mengumumkan arah mata angin, nama persimpangan jalan, dan dinamika laju suspect agar unit
                      perimeter dapat melakukan pemotongan lajur di depan.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Kategori Pengejaran: Clean Pursuit vs Hot Pursuit</h4>
                  <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin:0.6rem 0;">
                    <div
                      style="background:rgba(59, 130, 246, 0.1); border:1px solid rgba(59, 130, 246, 0.3); border-radius:6px; padding:0.85rem;">
                      <h5 style="color:#60a5fa; font-weight:700; margin-bottom:0.3rem;">Clean Pursuit (Normal)</h5>
                      <p style="font-size:0.82rem; color:#cbd5e1;">Target mengemudi dalam batas kendali logis, tidak
                        melompati bukit secara berlebihan, dan tidak sengaja menabrakkan diri untuk mencelakai polisi.
                      </p>
                    </div>
                    <div
                      style="background:rgba(239, 68, 68, 0.1); border:1px solid rgba(239, 68, 68, 0.3); border-radius:6px; padding:0.85rem;">
                      <h5 style="color:#f87171; font-weight:700; margin-bottom:0.3rem;">Hot Pursuit (Eskalasi Tinggi)
                      </h5>
                      <p style="font-size:0.82rem; color:#cbd5e1;">Pengejaran berlangsung lebih dari 10 menit, suspect
                        melompati jembatan/bukit berkali-kali untuk merusak ban mobil, mengemudi di area pedestrian
                        padat, atau menabrakkan kendaraan dinas secara ofensif.</p>
                    </div>
                  </div>
                  <p style="font-size:0.78rem; color:var(--text-dim); font-style:italic;">※ Pedoman Toleransi: Tersangka
                    hanya ditoleransi melakukan 1 kali lompatan tidak logis. Lompatan berulang akan langsung mengubah
                    status taktis pengejaran menjadi Hot Pursuit.</p>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Otorisasi PIT (Precision Immobilization Technique)</h4>
                  <p>Menebas ekor mobil buron atau PIT hanya boleh dilaksanakan atas otorisasi verbal dari Incident
                    Commander (IC) atau Sersan yang memimpin operasi. PIT diizinkan apabila pengejaran telah berlangsung
                    di atas 10 menit, tidak ada sandera hidup di dalam kendaraan tersangka, serta kondisi jalan dinilai
                    aman dari warga sipil.</p>
                </div>
              </div>
            </div>

            <!-- 7. Prosedur P.I.T (Precision Immobilization Technique) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-rotate-left" style="color:#3b82f6;"></i> Prosedur P.I.T (Precision
                  Immobilization Technique)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <p>PIT (Pursuit Intervention Technique) adalah manuver taktis yang terkendali dengan menempelkan
                    bumper depan samping mobil polisi ke ban belakang samping mobil buron untuk menghentikan pelarian
                    secara cepat.</p>
                </div>

                <!-- Ilustrasi Gambar Diagram Manuver PIT -->
                <div
                  style="background:rgba(0,0,0,0.3); border:1px solid var(--border-color); border-radius:8px; padding:1.25rem; margin:1rem 0; text-align:center;">
                  <img src="img/pit_maneuver.png" alt="Ilustrasi Titik Kontak Sentuhan Manuver PIT"
                    style="max-width:550px; width:100%; height:auto; border-radius:6px; border:1px solid var(--border-color); margin-bottom:0.5rem;">
                  <br>
                  <span style="font-size:0.78rem; color:var(--text-dim); font-style:italic;">Ilustrasi Titik Kontak
                    Sentuhan Manuver PIT</span>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;">Langkah Pelaksanaan Manuver PIT:</h4>
                  <ol style="padding-left:1.2rem; line-height:1.7;">
                    <li><strong>Penyelarasan Posisi:</strong> Sejajarkan bumper depan samping kendaraan polisi dengan
                      bumper/quarter-panel ban belakang kendaraan tersangka.</li>
                    <li><strong>Kontak Fisik Terkendali:</strong> Lakukan kontak fisik halus secara sengaja pada bagian
                      samping ban belakang target.</li>
                    <li><strong>Akselerasi Konstan:</strong> Tekan pedal gas secara konstan ke arah sisi mobil tersangka
                      untuk memutar poros kendalinya.</li>
                    <li><strong>Spin Out:</strong> Kendaraan tersangka akan kehilangan traksi roda belakang and berputar
                      180 derajat hingga mesin mati.</li>
                  </ol>
                </div>

                <div
                  style="background:rgba(59, 130, 246, 0.08); border:1px solid rgba(59, 130, 246, 0.3); border-radius:6px; padding:1rem; margin-top:1rem;">
                  <strong style="color:#3b82f6; font-size:0.85rem; display:block; margin-bottom:0.4rem;">
                    <i class="fa-solid fa-triangle-exclamation"></i> Catatan Penting Penahanan:
                  </strong>
                  <ul style="padding-left:1.2rem; font-size:0.83rem; line-height:1.6; color:#cbd5e1;">
                    <li>Manuver PIT tidak otomatis mengakhiri pengejaran secara instan.</li>
                    <li>Unit cadangan (Backup) wajib segera bergerak masuk mengurung mobil target (<em>*vehicle
                        pinning*</em>).</li>
                    <li>Kecepatan ideal pengerjaan PIT yang aman bagi keselamatan berkendara berkisar antara <strong>40
                        hingga 55 MPH</strong>.</li>
                  </ul>
                </div>
              </div>
            </div>

            <!-- 8. Prosedur Impound Sita (Sita Kendaraan) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-building-circle-exclamation" style="color:#3b82f6;"></i> Prosedur Impound Sita
                  (Sita Kendaraan)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <p>Impound Sita dilakukan apabila kendaraan suspect berada di lokasi sebuah kasus dan diperlukan
                    sebagai bagian dari proses penyelidikan atau pengamanan barang bukti.</p>
                </div>

                <div
                  style="background:rgba(59, 130, 246, 0.08); border:1px solid rgba(59, 130, 246, 0.3); border-radius:6px; padding:1rem; margin:0.85rem 0;">
                  <strong style="color:#3b82f6; font-size:0.88rem; display:block; margin-bottom:0.4rem;">
                    <i class="fa-solid fa-triangle-exclamation"></i> Kondisi Pelaksanaan Impound Sita
                  </strong>
                  <ul style="padding-left:1.2rem; font-size:0.83rem; line-height:1.6; color:#cbd5e1;">
                    <li>Kendaraan suspect berada di lokasi sebuah kasus.</li>
                    <li>Kendaraan suspect masuk ke dalam air.</li>
                    <li>Suspect meninggalkan kendaraan dan berpindah ke kendaraan lain saat pengejaran (<em>changing
                        vehicle during pursuit</em>).</li>
                    <li><strong>Persetujuan Otoritas:</strong> Kendaraan hanya boleh dilakukan Impound Sita setelah
                      mendapat persetujuan <strong style="color:#3b82f6;">Incident Commander (IC)</strong>.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;"><i class="fa-solid fa-magnifying-glass"></i> Langkah-Langkah Pengecekan
                    Lapangan</h4>
                  <ol style="padding-left:1.2rem; line-height:1.7;">
                    <li><strong>Cek Identitas Kendaraan:</strong> Tekan <strong>F1 → Police Interaction → Next Page →
                        Checking Vehicle</strong>.</li>
                    <li><strong>Dokumentasi Awal:</strong> Ambil foto kendaraan menggunakan mata satu dan tuliskan
                      deskripsi kendaraan secara lengkap.</li>
                    <li><strong>Pemeriksaan Sistem MDT:</strong> Periksa database MDT mengenai plat nomor kendaraan,
                      status kriminal, serta profil pemilik kendaraan.</li>
                    <li><strong>Pemeriksaan Fisik (Trunk & Glove Box):</strong> Gunakan mata satu untuk memeriksa Trunk
                      (Bagasi) dan Glove Box.</li>
                    <li><strong>Pengumpulan Bukti Foto:</strong> Ambil foto seluruh isi bagasi/glove box serta foto utuh
                      fisik kendaraan secara keseluruhan (termasuk plate number yang terlihat jelas).</li>
                    <li><strong>Penemuan Barang Ilegal:</strong> Wajib menggunakan sarung tangan taktis, amankan barang
                      bukti resmi sesuai dengan prosedur evidence.</li>
                  </ol>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;"><i class="fa-solid fa-box-archive"></i> Administrasi &amp; Pengarsipan</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li><strong>Sita Kendaraan:</strong> Setelah pengecekan tuntas, lakukan eksekusi: <strong>F1 →
                        Police Interaction → Next Page → Impound Sita</strong>.</li>
                    <li><strong>Pencatatan MDT &amp; Forum:</strong> Tindakan Impound Sita wajib terarsip di sistem MDT
                      serta Threads Forum resmi. Tambahkan catatan jika ada tampering (manipulasi) atau kejanggalan
                      lain.</li>
                    <li><strong>Website Putih (Impound Police):</strong> Masukkan seluruh foto evidence ke Website Putih
                      pada bagian <strong>Impound Police</strong>. Cantumkan nomor MDT kasus, deskripsi kendaraan,
                      kronologi singkat, dan berkas foto.</li>
                    <li><strong>Pengecualian (Suspect Tertangkap):</strong> Apabila kendaraan digunakan dalam aksi
                      perampokan / aktivitas ilegal lainnya dan suspect berhasil ditangkap, maka penyitaan kendaraan
                      <span style="color:#f87171; font-weight:bold;">TIDAK menggunakan Impound Police</span> melainkan
                      wajib diproses melalui: <strong>IMPOUND VEHICLE PUBLIC</strong>.
                    </li>
                  </ul>
                </div>

                <div
                  style="background:rgba(239, 68, 68, 0.1); border:1px solid rgba(239, 68, 68, 0.4); border-radius:6px; padding:1rem; margin-top:1rem;">
                  <strong style="color:#f87171; font-size:0.85rem; display:flex; align-items:center; gap:0.5rem;">
                    <i class="fa-solid fa-circle-exclamation" style="font-size:1.1rem;"></i> PERINGATAN PENTING:
                  </strong>
                  <p style="font-size:0.82rem; color:#fca5a5; margin-top:0.3rem; font-weight:700;">
                    PENGGUNAAN IMPOUND POLICE DAN IMPOUND VEHICLE PUBLIC HARUS DISESUAIKAN DENGAN JENIS KASUS DAN STATUS
                    PENANGANAN SUSPECT.
                  </p>
                </div>
              </div>
            </div>

            <!-- 9. Prosedur Pengeluaran Kendaraan (Release Vehicle) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-key" style="color:#4ade80;"></i> Prosedur Pengeluaran Kendaraan (Release
                  Vehicle)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4 style="color:#3b82f6;"><i class="fa-solid fa-id-card"></i> 1. Verifikasi Identitas &amp; Berkas</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li>Minta dokumen identitas warga yang ingin mengambil kendaraan.</li>
                    <li>Minta Plate Number kendaraan yang dimaksud.</li>
                    <li>Lakukan cross-check menyeluruh terhadap riwayat warga, catatan kriminal warga, riwayat
                      kendaraan, serta catatan khusus kendaraan melalui <strong>MDT</strong> dan <strong>Website Putih
                        (bagian Impound Police)</strong>.</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;"><i class="fa-solid fa-lock"></i> 2. Pemeriksaan Dokumen Catatan (Notes)
                  </h4>
                  <p>Petugas <strong>WAJIB</strong> membaca bagian NOTES yang tertera pada profile warga, profile
                    kendaraan, sistem MDT, serta arsip website.</p>
                  <div
                    style="background:rgba(0,0,0,0.3); border:1px solid var(--border-color); border-radius:6px; padding:0.85rem; margin-top:0.5rem;">
                    <strong style="color:#f87171; font-size:0.8rem; display:block; margin-bottom:0.3rem;">CONTOH
                      KASUS:</strong>
                    <p style="font-size:0.82rem; color:var(--text-muted);">Apabila kendaraan terkait dengan kasus
                      narkotika dan memiliki instruksi catatan tidak boleh dikeluarkan sampai tanggal tertentu, maka:
                    </p>
                    <p style="color:#f87171; font-size:0.82rem; font-weight:700; margin-top:0.3rem;">
                      <i class="fa-solid fa-triangle-exclamation"></i> JANGAN mengeluarkan kendaraan tanpa adanya
                      persetujuan resmi dari Incident Commander (IC) yang menangani kasus tersebut.
                    </p>
                  </div>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;"><i class="fa-solid fa-shield-halved"></i> 3. Status BOLO &amp; Penyelesaian
                    Tanggungan</h4>
                  <ul style="padding-left:1.2rem; line-height:1.6;">
                    <li>Pastikan kendaraan tidak berstatus <strong style="color:#f87171;">BOLO</strong> (Be On the Look
                      Out).</li>
                    <li>Jika kendaraan terdeteksi berstatus BOLO, ikuti instruksi ketat pada Incident MDT yang
                      berkaitan.</li>
                    <li>Selesaikan seluruh kewajiban administrasi hukum yang tercantum dalam MDT (seperti pembayaran
                      denda yang tertunggak atau penyelesaian kasus bersangkutan).</li>
                  </ul>
                </div>

                <div class="step-block">
                  <h4 style="color:#3b82f6;"><i class="fa-solid fa-circle-check"></i> 4. Penyerahan Kendaraan &amp; Biaya
                    Regulasi</h4>
                  <p>Apabila seluruh pemeriksaan berkas warga dan kendaraan dinyatakan bersih and valid:</p>
                  <ol style="padding-left:1.2rem; line-height:1.6; margin-top:0.4rem;">
                    <li>Sebelum diserahkan, lakukan pemeriksaan fisik ulang pada bagian <strong>Trunk</strong> and
                      <strong>Glove Box</strong>.
                    </li>
                    <li>Tagihkan denda biaya regulasi resmi pengeluaran kendaraan sita sebesar: <strong
                        style="color:#4ade80;">$5,000</strong>.</li>
                    <li>Setelah seluruh rangkaian transaksi selesai, berikan kembali kunci kendaraan kepada warga
                      tersebut.</li>
                  </ol>
                </div>

                <div
                  style="background:rgba(239, 68, 68, 0.1); border:1px solid rgba(239, 68, 68, 0.4); border-radius:6px; padding:1rem; margin-top:1rem;">
                  <strong style="color:#f87171; font-size:0.85rem; display:flex; align-items:center; gap:0.5rem;">
                    <i class="fa-solid fa-triangle-exclamation" style="font-size:1.1rem;"></i> PERINGATAN PENTING:
                  </strong>
                  <p style="font-size:0.82rem; color:#fca5a5; margin-top:0.3rem; font-weight:700;">
                    PASTIKAN NOTES, STATUS BOLO, DAN CATATAN MDT TELAH DIPERIKSA SECARA MENYELURUH SEBELUM KENDARAAN
                    DIKELUARKAN.
                  </p>
                </div>
              </div>
            </div>

            <!-- 10. Prosedur & Integrasi Body Cam (ShareX & FiveManage) -->
            <div class="accordion-item">
              <div class="accordion-header" onclick="toggleAccordion(this)">
                <div class="accordion-header-title">
                  <i class="fa-solid fa-video"></i> Prosedur & Integrasi Body Cam (ShareX & FiveManage)
                </div>
                <i class="fa-solid fa-chevron-down accordion-icon"></i>
              </div>
              <div class="accordion-content">
                <div class="step-block">
                  <h4>1) Kewajiban Pengaktifan Body Cam</h4>
                  <p>Setiap Officer wajib mengaktifkan rekam Body Cam sejak mulai tugas (10-41) hingga selesai tugas
                    (10-42).</p>
                </div>
                <div class="step-block">
                  <h4>2) Penyimpanan Rekaman (ShareX / FiveManage)</h4>
                  <p>Upload klip video/foto bukti ke server penyimpanan resmi (FiveManage / Discord Evidence Channel)
                    dengan format nama file:</p>
                  <div class="code-quote">[Tanggal] - [Nama Officer] - [Jenis Kasus/Case ID]</div>
                </div>
                <div class="step-block">
                  <h4>3) Lampiran pada Laporan MDT</h4>
                  <p>Sertakan URL link bukti video Body Cam ke dalam kolom <em>Rincian Barang Bukti (Evidences)</em>
                    saat membuat Laporan Kejadian.</p>
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
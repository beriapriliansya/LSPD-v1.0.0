        <section id="tab-proses-hukum" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>Sistem Proses Hukum</h2>
              <span>MIRANDA RIGHTS, SUSPECT PROCESSING & MDT LOGS</span>
            </div>

            <button class="btn-pdf-export" onclick="window.print()">
              <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
            </button>
          </div>

          <!-- Hak Miranda (Miranda Rights) Box -->
          <div class="radio-card" style="margin-bottom: 1.5rem;">
            <div class="radio-card-header" style="justify-content: space-between;">
              <span><i class="fa-solid fa-scale-balanced"></i> Hak Miranda (Miranda Rights)</span>
              <button id="copyMirandaBtn" class="btn btn-gold" style="font-size:0.78rem; padding:0.3rem 0.75rem;">
                <i class="fa-solid fa-copy"></i> Salin Teks Miranda Warning
              </button>
            </div>

            <div class="ic-quote-banner" style="margin-bottom:0;">
              <div class="ic-quote-text" id="mirandaText">
                "You have the right to remain silent. Anything you say can and will be used against you in the court of
                law. You have the right to an attorney. If you cannot afford one, one will be provided for you. Do you
                understand these rights as I have read them to you?"
              </div>
            </div>
          </div>

          <!-- Alur Pemrosesan Tersangka (Suspect Processing) Timeline -->
          <div class="timeline-section">
            <h3 class="timeline-title">
              <i class="fa-solid fa-timeline"></i> Alur Pemrosesan Tersangka (Suspect Processing)
            </h3>

            <div class="timeline-list">

              <!-- STEP 1 -->
              <div class="timeline-step-item">
                <div class="timeline-badge">1</div>
                <div class="timeline-step-title">Penanganan Awal di Station</div>
                <ul class="info-list" style="padding-left: 1.2rem; line-height: 1.7; font-size: 0.88rem;">
                  <li>Setelah tiba di station, segera bawa suspect ke <strong>Sel Tahanan (Holding Cell)</strong> atau
                    <strong>Ward</strong>.
                  </li>
                  <li>Jika terdapat banyak suspect, tempatkan mereka di area station yang lebih luas agar proses
                    pemeriksaan berjalan dengan tertib.</li>
                </ul>

                <!-- Alert Box: Penanganan Suspect Pingsan / Cedera -->
                <div class="alert-box-red">
                  <div class="alert-box-red-title">
                    <i class="fa-solid fa-heart-pulse"></i> Penanganan Suspect Pingsan / Cedera:
                  </div>
                  <ol style="padding-left: 1.2rem; margin: 0; font-size: 0.82rem; color: #f8fafc; line-height: 1.6;">
                    <li>Segera panggil petugas <strong>EMS</strong> dan lakukan tindakan pertolongan pertama <strong>BLS
                        (Basic Life Support)</strong> sesuai SOP.</li>
                    <li>Lakukan pemeriksaan residu tembakan melalui <strong>GSR Test</strong>.</li>
                    <li><strong>Sebelum suspect dibangunkan/pulih:</strong> Ambil foto seluruh barang bawaan suspect
                      secara jelas serta foto hasil GSR Test sebagai lembar bukti (*evidences*).</li>
                    <li>Setelah penanganan medis selesai oleh EMS, biarkan suspect menyelesaikan administrasi
                      pengobatan, borgol kembali suspect secara rapat, kemudian <strong>segera bacakan Miranda
                        Rights</strong>.</li>
                  </ol>
                </div>
              </div>

              <!-- STEP 2 -->
              <div class="timeline-step-item">
                <div class="timeline-badge">2</div>
                <div class="timeline-step-title">Penggeledahan dan Penyitaan</div>
                <div class="timeline-step-subtitle">
                  Lakukan penggeledahan fisik secara menyeluruh pada badan suspect serta tas atau barang bawaan yang
                  dibawa.
                </div>
                <ul class="info-list" style="padding-left: 1.2rem; line-height: 1.7; font-size: 0.88rem;">
                  <li>Sita seluruh barang ilegal yang ditemukan di tubuh/tas tersangka, termasuk: <strong>Senjata
                      Ilegal, Narkoba, Uang Merah (Dirty Money), serta Barang Ilegal Lainnya</strong>.</li>
                  <li>Ambil dokumentasi foto yang jelas pada semua barang bukti yang disita.</li>
                  <li>Input data berkas foto bukti sitaan tersebut ke dalam sistem MDT sesuai ID Kejadian (*incident*)
                    yang ditangani.</li>
                </ul>

                <div class="note-box-italic">
                  ※ Setelah penyitaan rampung, lepaskan borgol tersangka sementara waktu dan perintahkan tersangka untuk
                  melepaskan topi, masker, kacamata, atau penutup wajah lainnya yang menghalangi visual.
                </div>
              </div>

              <!-- STEP 3 -->
              <div class="timeline-step-item">
                <div class="timeline-badge">3</div>
                <div class="timeline-step-title">Verifikasi Identitas & Mugshot</div>
                <div class="timeline-step-subtitle">
                  Minta tersangka untuk menunjukkan ID Card resmi miliknya, lalu ambil dokumentasi foto ID Card
                  tersebut.
                </div>

                <!-- Alert Box: SOP Fingerprint -->
                <div class="alert-box-orange">
                  <div class="alert-box-orange-title">
                    <i class="fa-solid fa-fingerprint"></i> SOP Fingerprint (Bila suspect tidak membawa ID):
                  </div>
                  <ol style="padding-left: 1.2rem; margin: 0; font-size: 0.82rem; color: #f8fafc; line-height: 1.6;">
                    <li>Tuntun tersangka menuju ke meja mesin fingerprint.</li>
                    <li>Masukkan nomor kantong (<strong>Pocket Number</strong>) tersangka ke sistem mesin.</li>
                    <li>Bila mesin menampilkan kode identifikasi unik, salin berkas kode tersebut dan ambil foto kode
                      fingerprint sebagai evidence valid.</li>
                    <li>Buka terminal MDT, akses menu <strong>Profile</strong>, lalu masukkan kode fingerprint tadi ke
                      kolom pencarian untuk melihat identitas asli pemilik kode.</li>
                  </ol>
                </div>

                <div style="font-size: 0.85rem; color: #cbd5e1; margin-top: 0.5rem;">
                  Serahkan papan identitas mugshot kepada tersangka, posisikan tersangka membelakangi dinding pengukur
                  tinggi badan, lalu ambil foto mugshot resmi sesuai ketentuan LSPD.
                </div>
              </div>

              <!-- STEP 4 -->
              <div class="timeline-step-item">
                <div class="timeline-badge">4</div>
                <div class="timeline-step-title">Pengisian MDT, Pembacaan, & Pembayaran</div>
                <ol style="padding-left: 1.2rem; margin: 0; font-size: 0.85rem; color: #cbd5e1; line-height: 1.7;">
                  <li style="margin-bottom: 0.5rem;">
                    <strong>Input Laporan MDT:</strong> Akses menu <strong>Incident</strong> di MDT, cari laporan
                    kejadian aktif Anda, masuk ke kolom <strong>Criminal</strong>, tekan tombol <strong>(+)</strong>
                    untuk menambahkan nama tersangka.
                  </li>
                  <li style="margin-bottom: 0.5rem;">
                    <strong>Handle Charge:</strong> Masukkan draf tuntutan (<strong>Penal Codes</strong>) tersangka
                    berdasarkan arahan/diskresi Incident Commander (IC). Verifikasi keakuratan charge sebelum disimpan.
                  </li>
                  <li style="margin-bottom: 0.5rem;">
                    <strong>Pembacaan Tuntutan:</strong> Bacakan pasal Penal Code yang dilanggar, total denda, serta
                    draf total masa tahanan kepada tersangka, kemudian tanyakan pembelaan mereka: <strong
                      style="color:var(--color-gold);">Plead Guilty</strong> atau <strong
                      style="color:var(--color-danger);">Not Guilty</strong>.
                  </li>
                  <li style="margin-bottom: 0.5rem;">
                    <strong>Mekanisme Pembayaran Denda (Jika Plead Guilty):</strong>
                    <ul style="padding-left: 1.2rem; margin-top: 0.25rem;">
                      <li>Tekan tombol <strong>Send Fine</strong> di MDT. Setelah dikirim, centang tanda
                        <strong>Processed</strong> dan <strong>Plead Guilty</strong> di database profile tersangka.
                      </li>
                      <li><strong>Alternatif Tablet (F1):</strong> Buka Tablet (F1) → Pilih <strong>Billing</strong> →
                        Masukkan nomor kantong tersangka → Masukkan nominal denda sesuai kalkulasi MDT.</li>
                      <li><strong style="color:var(--color-warning);">PENTING:</strong> Transaksi denda wajib ditransfer
                        lewat rekening bank. Dilarang keras menerima pembayaran tunai (Cash).</li>
                    </ul>
                  </li>
                  <li>
                    <strong>Verifikasi Pembayaran:</strong> Masuk ke tab <strong>Billing History</strong> untuk melihat
                    status pembayaran. Bila denda belum terbayar lunas, gunakan instruksi tindakan <strong>Force
                      Pay</strong> dari profile data billing tersangka.
                  </li>
                </ol>
              </div>

              <!-- STEP 5 -->
              <div class="timeline-step-item">
                <div class="timeline-badge">5</div>
                <div class="timeline-step-title">Pengiriman ke Penjara (Jail System)</div>
                <ul class="info-list" style="padding-left: 1.2rem; line-height: 1.7; font-size: 0.88rem;">
                  <li>Hubungi petugas <strong>DOC (Department of Corrections) Central</strong> atau <strong>DOC
                      Lokal</strong> untuk melakukan proses pengawalan (*escort*) tersangka menuju ke penjara.</li>
                  <li>Apabila tersangka merupakan status <strong>Court Verdict</strong> (meminta pengacara/menunggu
                    sidang), prioritaskan koordinasi pemanggilan unit <strong>DOC Central</strong> untuk melakukan
                    penjemputan pengawalan.</li>
                  <li>Jika kondisi lapangan sedang kosong dan tidak ada petugas DOC yang bertugas/merespon, lakukan
                    proses pemenjaraan mandiri secara aman melalui <strong>MDT Jail System</strong> atau gunakan
                    perintah teks perintah administratif <strong>/jail</strong> sesuai dengan regulasi SOP server.</li>
                </ul>
              </div>

            </div>
          </div>

          <!-- Bottom Card: Catatan Penting Penggunaan MDT -->
          <div class="radio-card">
            <div class="radio-card-header">
              <i class="fa-solid fa-folder-open"></i> Catatan Penting Penggunaan MDT
            </div>

            <div class="radio-page-grid">

              <!-- LEFT COLUMN -->
              <div>
                <div style="margin-bottom: 1.25rem;">
                  <h4 style="font-size:0.92rem; color:var(--color-gold); font-weight:700; margin-bottom:0.4rem;">
                    1. Pembacaan Denda & Masa Tahanan
                  </h4>
                  <p style="font-size:0.83rem; color:#cbd5e1; line-height:1.6; margin-bottom:0.4rem;">
                    Nominal denda wajib dibacakan secara penuh tanpa dipotong atau disederhanakan. Contoh: <strong
                      style="color:var(--color-warning);">$24,582</strong> wajib dibacakan sebagai <em>"Dua puluh empat
                      ribu lima ratus delapan puluh dua dolar."</em>
                  </p>
                  <p style="font-size:0.83rem; color:#cbd5e1; line-height:1.6;">
                    Masa tahanan (Contoh: <strong>90 bulan</strong>) juga wajib dibacakan dengan jelas. Pengurangan masa
                    kurungan hanya boleh disetujui atas instruksi langsung dari IC apabila berhak menerima keringanan.
                  </p>
                </div>

                <div>
                  <h4 style="font-size:0.92rem; color:var(--color-gold); font-weight:700; margin-bottom:0.4rem;">
                    2. Ketentuan Tuntutan Saling Tumpuk (Stacking Charge)
                  </h4>
                  <p style="font-size:0.83rem; color:#cbd5e1; line-height:1.6; margin-bottom:0.4rem;">
                    Satu draf tuntutan (Charge) hanya dihitung satu kali untuk satu tindak kejahatan yang terpisah.
                    Namun, apabila tersangka membawa barang bukti ilegal atau melakukan pelanggaran kategori sejenis
                    lebih dari satu barang bukti, maka draf tuntutan <strong>dapat ditumpuk (di-stack)</strong> sesuai
                    jumlah temuan di tubuh tersangka.
                  </p>
                  <p style="font-size:0.83rem; color:#cbd5e1; line-height:1.6;">
                    Contoh: Membawa dua unit senjata ilegal berkategori sama akan diinput sebanyak <strong>2x Stacking
                      Charge</strong>.
                  </p>
                </div>
              </div>

              <!-- RIGHT COLUMN -->
              <div>
                <div style="margin-bottom: 1.25rem;">
                  <h4 style="font-size:0.92rem; color:var(--color-gold); font-weight:700; margin-bottom:0.4rem;">
                    3. Aturan Tanda Status (Warrant, Processed & Plead Guilty)
                  </h4>
                  <p style="font-size:0.83rem; color:#cbd5e1; line-height:1.6; margin-bottom:0.4rem;">
                    Ikuti matriks kontrol status record MDT ini secara akurat:
                  </p>
                  <ul style="padding-left:1.2rem; font-size:0.82rem; color:#cbd5e1; line-height:1.65;">
                    <li style="margin-bottom:0.3rem;">
                      <strong>WARRANT:</strong> Aktifkan hanya jika tersangka merupakan buron terdaftar, target DPO,
                      atau memiliki surat perintah penangkapan aktif dari pengadilan.
                    </li>
                    <li style="margin-bottom:0.3rem;">
                      <strong>PROCESSED & PLEAD GUILTY:</strong> Centang status ini bila tersangka sudah selesai
                      diproses, mengakui perbuatannya, dan denda administrasinya telah lunas dibayarkan.
                    </li>
                    <li>
                      <strong>HANYA PROCESSED:</strong> Centang status ini jika tersangka sudah selesai diproses di
                      station namun menolak mengaku bersalah (<strong>Not Guilty</strong>) dan memilih untuk melimpahkan
                      kasus ke persidangan (*court verdict*).
                    </li>
                  </ul>
                </div>

                <div>
                  <h4 style="font-size:0.92rem; color:var(--color-gold); font-weight:700; margin-bottom:0.4rem;">
                    4. Penanganan Tanpa Petugas DOC
                  </h4>
                  <p style="font-size:0.83rem; color:#cbd5e1; line-height:1.6;">
                    Jika tidak ada unit DOC di kota, laksanakan proses pengiriman sel penjara mandiri menggunakan
                    terminal <strong>Jail System pada MDT</strong> atau gunakan eksekusi teks perintah
                    <strong>/jail</strong> sesuai dengan kebijakan kota.
                  </p>
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
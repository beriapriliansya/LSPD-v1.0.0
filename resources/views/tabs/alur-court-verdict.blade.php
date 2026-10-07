        <section id="tab-alur-court-verdict" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>Alur Court Verdict</h2>
              <span>JUDICIAL PROCESS, MEDIATION & COURT TRIALS</span>
            </div>

            <button class="btn-pdf-export" onclick="window.print()">
              <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
            </button>
          </div>

          <!-- Flowchart Card Container -->
          <div class="flowchart-container">
            <div class="flowchart-header-icon">
              <i class="fa-solid fa-balance-scale"></i>
            </div>
            <h3 class="flowchart-title">Alur Court Verdict</h3>
            <p class="flowchart-subtitle">
              SOP penanganan hukum ketika tersangka menyatakan "Not Guilty" dan meminta sidang/mediasi pengacara.
            </p>

            <!-- NODE 1: Suspect Ditangkap -->
            <div class="flowchart-node">
              <h4>Suspect Ditangkap</h4>
              <p>Miranda Rights dibacakan</p>
            </div>

            <div class="flowchart-arrow">
              <i class="fa-solid fa-arrow-down"></i>
            </div>

            <!-- NODE 2: Pleads "Not Guilty" -->
            <div class="flowchart-node border-gold">
              <div class="flowchart-question-badge">?</div>
              <h4 style="color:var(--color-gold);">Pleads "Not Guilty"</h4>
              <p>Menolak dakwaan MDT awal</p>
            </div>

            <div class="flowchart-arrow">
              <i class="fa-solid fa-arrow-down"></i>
            </div>

            <!-- NODE 3: SPLIT CHOICE ROW -->
            <div class="flowchart-split-row">
              <!-- Left: Lawyer Tersedia -->
              <div class="flowchart-split-box box-lawyer-yes">
                <i class="fa-solid fa-user-tie" style="font-size:1.5rem; color:#3b82f6; margin-bottom:0.4rem;"></i>
                <h4 style="font-size:0.95rem; color:#ffffff; font-weight:700; margin:0 0 0.3rem 0;">Lawyer Tersedia</h4>
                <p style="font-size:0.78rem; color:#cbd5e1; margin:0;">
                  Pengacara datang ke Alta/MRPD mendampingi proses mediasi taktis
                </p>
              </div>

              <div class="flowchart-or-text">ATAU</div>

              <!-- Right: Lawyer Tidak Ada -->
              <div class="flowchart-split-box box-lawyer-no">
                <i class="fa-solid fa-user-slash" style="font-size:1.5rem; color:#ef4444; margin-bottom:0.4rem;"></i>
                <h4 style="font-size:0.95rem; color:#ffffff; font-weight:700; margin:0 0 0.3rem 0;">Lawyer Tidak Ada
                </h4>
                <p style="font-size:0.78rem; color:#cbd5e1; margin:0;">
                  Tersangka ditahan sementara (Hold) menunggu jadwal sidang hakim
                </p>
              </div>
            </div>

            <div class="flowchart-arrow">
              <i class="fa-solid fa-arrow-down"></i>
            </div>

            <!-- NODE 4: Sidang Pengadilan (Court Trial) -->
            <div class="flowchart-node border-purple">
              <i class="fa-solid fa-gavel" style="font-size:1.4rem; color:#a855f7; margin-bottom:0.4rem;"></i>
              <h4 style="font-size:1.05rem; font-weight:700;">Sidang Pengadilan (Court Trial)</h4>
              <p style="font-size:0.8rem; color:#cbd5e1;">
                Hakim memeriksa alat bukti rekaman CCTV, saksi, kesaksian polisi, and laporan MDT.
              </p>
            </div>

            <div class="flowchart-arrow">
              <i class="fa-solid fa-arrow-down"></i>
            </div>

            <!-- NODE 5: FINAL VERDICT ROW -->
            <div class="flowchart-verdict-row">
              <!-- Vonis GUILTY -->
              <div class="flowchart-verdict-box verdict-guilty">
                <h4>Vonis: GUILTY</h4>
                <p>Dakwaan polisi terbukti sah. Tersangka dimasukkan ke dalam Bolingbroke Penitentiary.</p>
              </div>

              <!-- Vonis NOT GUILTY -->
              <div class="flowchart-verdict-box verdict-not-guilty">
                <h4>Vonis: NOT GUILTY</h4>
                <p>Bukti tidak memadai. Tersangka dibebaskan murni tanpa catatan kriminal tambahan.</p>
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
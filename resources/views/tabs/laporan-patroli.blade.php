        <section id="tab-laporan-patroli" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>Sistem Laporan Patroli</h2>
              <span>PATROL LOGS, AUTOMATIC BBCODE GENERATOR & FORUM TOOLS</span>
            </div>

            <div style="display:flex; gap:0.75rem; align-items:center; flex-wrap:wrap;">
              <button class="btn btn-primary open-report-modal-btn">
                <i class="fa-solid fa-plus"></i> Buat Laporan Baru
              </button>
              <button class="btn btn-danger open-dpo-modal-btn">
                <i class="fa-solid fa-user-plus"></i> Tambah DPO Buronan
              </button>
              <button class="btn-pdf-export" onclick="window.print()">
                <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
              </button>
            </div>
          </div>

          <!-- Main 3-Column Generator Layout Grid -->
          <div class="patrol-gen-grid">

            <!-- COLUMN 1: Auto-Generator Form -->
            <div class="patrol-gen-card">
              <div class="patrol-gen-header">
                <i class="fa-solid fa-file-pen"></i> Auto-Generator Patrol Report
              </div>

              <div class="form-sub-header"
                style="margin-bottom:0.85rem; font-size:0.78rem; font-weight:800; color:#94a3b8; letter-spacing:0.5px;">
                ISI DATA PATROLI ANDA</div>

              <div class="form-row" style="margin-bottom:0.85rem; display:flex; gap:0.85rem;">
                <div class="form-group" style="flex:1; margin-bottom:0;">
                  <input type="text" id="pGenOfficer" placeholder="Officer Name" value="Milo Hale" class="search-box"
                    style="padding:0.65rem 0.85rem; width:100%; font-size:0.85rem;">
                </div>
                <div class="form-group" style="flex:1; margin-bottom:0;">
                  <input type="text" id="pGenStation" placeholder="Station (Cth: 71)" value="71" class="search-box"
                    style="padding:0.65rem 0.85rem; width:100%; font-size:0.85rem;">
                </div>
              </div>

              <div class="form-row" style="margin-bottom:0.85rem; display:flex; gap:0.85rem;">
                <div class="form-group" style="flex:1; margin-bottom:0;">
                  <input type="text" id="pGenRank" placeholder="Rank (Cth: Rookie)" value="Rookie" class="search-box"
                    style="padding:0.65rem 0.85rem; width:100%; font-size:0.85rem;">
                </div>
                <div class="form-group" style="flex:1; margin-bottom:0;">
                  <input type="text" id="pGenBadge" placeholder="Badge (Cth: 71503)" value="71503" class="search-box"
                    style="padding:0.65rem 0.85rem; width:100%; font-size:0.85rem;">
                </div>
              </div>

              <div class="form-group" style="margin-bottom:0.85rem;">
                <input type="text" id="pGenDate" placeholder="dd/mm/yyyy" value="21/01/2026" class="search-box"
                  style="padding:0.65rem 0.85rem; width:100%; font-size:0.85rem;">
              </div>

              <div class="form-group" style="margin-bottom:1.15rem;">
                <textarea id="pGenChronology" rows="5" class="search-box"
                  style="padding:0.85rem; width:100%; font-size:0.83rem; line-height:1.5;"
                  placeholder="Ceritakan kronologi kejadian secara naratif (5W+1H)...">At approximately 21:20 International Time, while conducting a routine patrol, I, Officer Milo Hale, received a report regarding brandishing a weapon and narcotics activity in front of the Alta Police Department. I immediately responded to the scene and observed a red sedan with license plate MLP 8172 fleeing the area.

I began coordinating and requesting additional units for backup. The pursuit continued until the suspect vehicle became immobilized beneath the Olympic Freeway.</textarea>
              </div>

              <!-- Evidence Section -->
              <div style="border-top:1px solid var(--border-color); padding-top:1.15rem; margin-top:1.15rem;">
                <div
                  style="font-size:0.9rem; font-weight:700; color:var(--color-gold); margin-bottom:0.4rem; display:flex; align-items:center; gap:0.4rem;">
                  <i class="fa-solid fa-camera"></i> Evidence / Dokumentasi
                </div>
                <p style="font-size:0.78rem; color:var(--text-muted); margin-bottom:0.85rem; line-height:1.4;">
                  Masukkan nama bukti deskriptif (Cth: Vehicle, Suspect ID/Mugshot, Suspect Inventory, Crime Scene,
                  Hostage/Victim, dll).
                </p>

                <div id="pGenEvidenceList">
                  <div class="form-row p-evidence-row" style="margin-bottom:0.65rem; display:flex; gap:0.85rem;">
                    <div class="form-group" style="flex:1; margin-bottom:0;">
                      <input type="text" class="p-ev-name search-box"
                        style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="EVIDENCE NAME"
                        value="Vehicle Damage">
                    </div>
                    <div class="form-group" style="flex:1; margin-bottom:0;">
                      <input type="text" class="p-ev-url search-box"
                        style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="IMAGE URL"
                        value="https://i.vgy.me/6XFDDp.png">
                    </div>
                  </div>
                </div>

                <button id="addEvidenceRowBtn" type="button" class="btn btn-secondary"
                  style="font-size:0.8rem; padding:0.55rem 0.85rem; width:100%; margin-top:0.65rem; border-radius:6px; cursor:pointer;">
                  <i class="fa-solid fa-plus"></i> Tambah Kolom Bukti
                </button>
              </div>

              <!-- Additional Dynamic Reports Container -->
              <div id="additionalReportsContainer"></div>

              <button id="pGenAddReportBtn" type="button" class="btn btn-secondary"
                style="width:100%; margin-top:1.25rem; justify-content:center; padding:0.65rem 1rem; font-weight:800; font-size:0.88rem; border-radius:6px; cursor:pointer; background:rgba(30,41,59,0.8); border:1px solid var(--border-color); color:#ffffff;">
                <i class="fa-solid fa-plus-circle" style="color:var(--color-gold);"></i> Tambah Report
              </button>
            </div>

            <!-- COLUMN 2: Middle Live BBCode & Editor Guide -->
            <div style="display:flex; flex-direction:column; gap:1.25rem;">

              <!-- Panduan Lengkap Tools Editor Forum -->
              <div class="patrol-gen-card">
                <div class="patrol-gen-header" style="font-size:0.9rem;">
                  <i class="fa-solid fa-wrench"></i> Panduan Lengkap Tools Editor Forum
                </div>

                <div class="forum-guide-grid">
                  <div class="forum-guide-item">
                    <strong>B I U :</strong> Tebal, Miring, Garis Bawah.
                  </div>
                  <div class="forum-guide-item">
                    <strong>" :</strong> Membuat blok kutipan teks (Quote).
                  </div>
                  <div class="forum-guide-item">
                    <strong>&lt;/&gt; :</strong> Menuliskan kode script (Code format).
                  </div>
                  <div class="forum-guide-item">
                    <strong>List Icons & * :</strong> Membuat daftar *bullet* atau penomoran.
                  </div>
                  <div class="forum-guide-item">
                    <strong>Image Icon :</strong> Menyisipkan link gambar.
                  </div>
                  <div class="forum-guide-item">
                    <strong>Rantai Icon :</strong> Menyematkan URL/Link website.
                  </div>
                  <div class="forum-guide-item">
                    <strong>Tetes Air :</strong> Mengubah warna teks (Color).
                  </div>
                  <div class="forum-guide-item">
                    <strong>Normal :</strong> Mengubah ukuran font.
                  </div>
                  <div class="forum-guide-item">
                    <strong>Mata :</strong> Membuat Spoiler (menyembunyikan konten gambar/panjang).
                  </div>
                  <div class="forum-guide-item">
                    <strong>align, center... :</strong> Mengatur perataan teks.
                  </div>
                  <div class="forum-guide-item">
                    <strong>box, divbox :</strong> Membuat kotak container layout.
                  </div>
                  <div class="forum-guide-item">
                    <strong>br & hr :</strong> Garis baru & pembatas horizontal.
                  </div>
                </div>
              </div>

              <!-- BBCode Output Box -->
              <div class="patrol-gen-card">
                <div class="patrol-gen-header" style="justify-content:space-between;">
                  <span style="font-size:0.9rem;"><i class="fa-solid fa-code"></i> Hasil BBCode (Otomatis)</span>
                  <button id="copyBBCodeBtn" type="button" class="btn btn-gold"
                    style="font-size:0.75rem; padding:0.35rem 0.75rem;">
                    <i class="fa-solid fa-copy"></i> Copy BBCode
                  </button>
                </div>

                <textarea id="pGenBBCodeOutput" class="bbcode-output-box" readonly></textarea>
              </div>

            </div>

            <!-- COLUMN 3: Right Forum Preview -->
            <div style="display:flex; flex-direction:column; gap:1.25rem;">

              <!-- Forum Preview (Contoh Patrol Report) Card -->
              <div class="patrol-gen-card">
                <div class="patrol-gen-header" style="justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.5rem;">
                  <span style="font-size:0.9rem; font-weight:700; display:flex; align-items:center; gap:0.45rem; color:#ffffff;">
                    <i class="fa-solid fa-circle-dot" style="color:#3b82f6;"></i> Forum Preview (Contoh Patrol Report)
                  </span>
                  <span style="background:#dc2626; color:#ffffff; padding:0.25rem 0.65rem; border-radius:4px; font-weight:800; font-size:0.7rem; letter-spacing:0.5px; display:inline-block;">
                    LSPD FORUM STYLE
                  </span>
                </div>

                <!-- Styled Forum Preview Container -->
                <div style="background:#0b1329; border:1px solid rgba(255,255,255,0.1); border-radius:6px; padding:0.85rem; max-height:550px; overflow-y:auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                  
                  <!-- Top Banner Header Box -->
                  <div style="background:#000066; color:#ffffff; text-align:center; font-weight:800; font-size:1.05rem; padding:0.5rem 0.25rem; letter-spacing:0.8px;">
                    Los Santos Police Department
                  </div>

                  <!-- Subheader Box: PATROL REPORT -->
                  <div style="border:1px solid #000000; background:#ffffff; color:#000000; text-align:center; font-weight:800; font-size:0.9rem; padding:0.35rem 0.25rem; margin:0.4rem 0;">
                    PATROL REPORT
                  </div>

                  <!-- Section Header A: GENERAL INFORMATION -->
                  <div style="background:#000066; color:#ffffff; padding:0.3rem 0.5rem; font-weight:800; font-size:0.8rem; letter-spacing:0.5px;">
                    A. GENERAL INFORMATION
                  </div>

                  <!-- Section Content Box A -->
                  <div style="border:1px solid #000000; background:#ffffff; color:#000000; padding:0.65rem 0.75rem; margin-top:0.35rem; margin-bottom:0.6rem; font-size:0.82rem; line-height:1.6;">
                    <div><strong>Officer Name :</strong> <span id="fpOfficerName">Milo Hale</span></div>
                    <div><strong>Station :</strong> <span id="fpStation">71</span></div>
                    <div><strong>Rank :</strong> <span id="fpRank">Rookie</span></div>
                    <div><strong>Badge Number :</strong> <span id="fpBadge">71503</span></div>
                  </div>

                  <!-- Section Header B: PATROL REPORT OFFICER -->
                  <div style="background:#000066; color:#ffffff; padding:0.3rem 0.5rem; font-weight:800; font-size:0.8rem; letter-spacing:0.5px;">
                    B. PATROL REPORT OFFICER
                  </div>

                  <!-- Section Content Box B & Sub Reports Container -->
                  <div id="fpSubReportsContainer" style="border:1px solid #000000; background:#ffffff; color:#000000; padding:0.65rem 0.75rem; margin-top:0.35rem;">
                    
                    <!-- First Report Card -->
                    <div class="fp-first-report-card">
                      <div style="background:#000066; color:#ffffff; padding:0.25rem 0.6rem; font-weight:800; font-size:0.78rem; display:inline-block; border-radius:2px; margin-bottom:0.5rem;">
                        First Report
                      </div>

                      <div style="font-weight:700; font-size:0.82rem; color:#000000; margin-bottom:0.25rem;">Date:</div>
                      <div style="border:1px solid #000000; padding:0.35rem 0.55rem; font-size:0.82rem; color:#000000; margin-bottom:0.6rem; background:#ffffff;">
                        <span id="fpDate">21/01/2026</span>
                      </div>

                      <div style="font-weight:700; font-size:0.82rem; color:#000000; margin-bottom:0.25rem;">Details:</div>
                      <div id="fpDetails" style="border:1px solid #000000; padding:0.6rem 0.75rem; font-size:0.78rem; color:#1e293b; line-height:1.55; margin-bottom:0.6rem; background:#ffffff; white-space:pre-wrap;">At approximately 21:20 International Time, while conducting a routine patrol, I, Officer Milo Hale, received a report regarding brandishing a weapon and narcotics activity in front of the Alta Police Department. I immediately responded to the scene and observed a red sedan with license plate MLP 8172 fleeing the area.

I began coordinating and requesting additional units for backup. The pursuit continued until the suspect vehicle became immobilized beneath the Olympic Freeway.</div>

                      <div style="font-weight:700; font-size:0.82rem; color:#000000; margin-bottom:0.35rem;">Evidence:</div>
                      <div id="fpEvidences" style="display:flex; flex-direction:column; gap:0.35rem;">
                        <div style="border:1px solid #d1d5db; background:#f9fafb; border-radius:3px; padding:0.35rem 0.6rem; display:flex; justify-content:space-between; align-items:center; font-size:0.78rem; color:#374151;">
                          <span>Vehicle Damage</span>
                          <span style="background:#ef4444; color:#ffffff; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.6rem;"><i class="fa-solid fa-eye"></i></span>
                        </div>
                      </div>
                    </div>

                  </div>

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
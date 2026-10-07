        <section id="tab-rules" class="tab-content">
          <div class="section-header-row">
            <div class="section-title">
              <h2>Rules & Regulations</h2>
              <span>OFFICIAL LSPD OPERATIONAL RULES</span>
            </div>

            <div class="section-nav-pills">
              <a href="#section-rules-a" class="sub-nav-pill"><i class="fa-solid fa-book"></i> Aturan Umum</a>
              <a href="#section-rules-b" class="sub-nav-pill"><i class="fa-solid fa-table"></i> Robbery Matrix</a>
              <a href="#section-rules-c" class="sub-nav-pill"><i class="fa-solid fa-shield-halved"></i> Special
                Barricade</a>
            </div>

            <button class="btn-pdf-export" onclick="window.print()">
              <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
            </button>
          </div>

          <!-- A. ATURAN UMUM ROBBERY -->
          <div id="section-rules-a" style="margin-bottom:1.75rem;">
            <h3
              style="font-size:1.1rem; color:var(--color-gold); font-weight:800; margin-bottom:1rem; letter-spacing:0.5px;">
              A. ATURAN UMUM ROBBERY
            </h3>

            <div class="accordion-group">
              <div class="accordion-item active">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                  <div class="accordion-header-title">
                    <i class="fa-solid fa-list-check" style="color:var(--color-gold);"></i> Ketentuan Dasar
                  </div>
                  <i class="fa-solid fa-chevron-down accordion-icon"></i>
                </div>
                <div class="accordion-content">
                  <ul style="padding-left:1.2rem; line-height:1.7; font-size:0.88rem; color:#cbd5e1;">
                    <li>Minimal suspect harus memiliki 1 sandera. Jika tidak ada sandera, polisi berhak melakukan
                      breach-in.</li>
                    <li>Maksimal waktu HIT ROBBERY adalah 1 jam sebelum badai.</li>
                    <li>Dilarang melakukan aktivitas kriminal 30 menit sebelum badai.</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- B. ROBBERY MATRIX -->
          <div id="section-rules-b" style="margin-bottom:2rem;">
            <h3
              style="font-size:1.1rem; color:var(--color-gold); font-weight:800; margin-bottom:1rem; letter-spacing:0.5px;">
              B. ROBBERY MATRIX
            </h3>

            <div class="table-container" style="overflow-x:auto;">
              <table class="callsign-table">
                <thead>
                  <tr>
                    <th>ROBBERY</th>
                    <th>PURSUIT</th>
                    <th>BARRICADE</th>
                    <th>MAX CRIMINAL</th>
                    <th>MIN POLICE</th>
                    <th>WEAPON CLASS</th>
                    <th>VEHICLE</th>
                    <th>HELICOPTER</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>BOOSTING CAR / ATM</strong></td>
                    <td>6</td>
                    <td>4</td>
                    <td>2</td>
                    <td>6</td>
                    <td><span style="color:#60a5fa; font-weight:600;">Class 1 + All Revolver</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#f87171; font-weight:600;">Not Allowed</span></td>
                  </tr>
                  <tr>
                    <td><strong>LTD</strong></td>
                    <td>12</td>
                    <td>8</td>
                    <td>4</td>
                    <td>8</td>
                    <td><span style="color:#60a5fa; font-weight:600;">Class 1</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#f87171; font-weight:600;">Not Allowed</span></td>
                  </tr>
                  <tr>
                    <td><strong>LAUNDROMAT / CASH EXCHANGE / CONTAINER</strong></td>
                    <td>12</td>
                    <td>10</td>
                    <td>6</td>
                    <td>10</td>
                    <td><span style="color:#60a5fa; font-weight:600;">Class 2</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#f87171; font-weight:600;">Not Allowed</span></td>
                  </tr>
                  <tr>
                    <td><strong>JEWEL</strong></td>
                    <td>24</td>
                    <td>10</td>
                    <td>6</td>
                    <td>10</td>
                    <td><span style="color:#60a5fa; font-weight:600;">Class 2</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#f87171; font-weight:600;">Not Allowed</span></td>
                  </tr>
                  <tr>
                    <td><strong>BOBCAT / ART ASYLUM</strong></td>
                    <td>30</td>
                    <td>12</td>
                    <td>8</td>
                    <td>12</td>
                    <td><span style="color:#60a5fa; font-weight:600;">Class 2</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#f87171; font-weight:600;">Not Allowed</span></td>
                  </tr>
                  <tr>
                    <td><strong>FLEECA</strong></td>
                    <td>30</td>
                    <td>12</td>
                    <td>8</td>
                    <td>12</td>
                    <td><span style="color:#60a5fa; font-weight:600;">Class 2</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#4ade80; font-weight:600;">1 Police Helicopter</span></td>
                  </tr>
                  <tr>
                    <td><strong>ROXWOOD / PALETO</strong></td>
                    <td>36</td>
                    <td>14</td>
                    <td>10</td>
                    <td>14</td>
                    <td><span style="color:#c084fc; font-weight:600;">Class 3</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#4ade80; font-weight:600;">1 Police Helicopter</span></td>
                  </tr>
                  <tr>
                    <td><strong>PACIFIC</strong></td>
                    <td>40</td>
                    <td>16</td>
                    <td>12</td>
                    <td>16</td>
                    <td><span style="color:#c084fc; font-weight:600;">Class 3</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#4ade80; font-weight:600;">2 Police Helicopters</span></td>
                  </tr>
                  <tr>
                    <td><strong>MAZE BANK</strong></td>
                    <td>46</td>
                    <td>18</td>
                    <td>14</td>
                    <td>18</td>
                    <td><span style="color:#c084fc; font-weight:600;">Class 3</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#4ade80; font-weight:600;">2 Police Helicopters</span></td>
                  </tr>
                  <tr>
                    <td><strong>CASINO</strong></td>
                    <td>50</td>
                    <td>20</td>
                    <td>16</td>
                    <td>20</td>
                    <td><span style="color:#c084fc; font-weight:600;">Class 3</span></td>
                    <td><em>Based on Negotiation</em></td>
                    <td><span style="color:#4ade80; font-weight:600;">2 Police Helicopters</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

          <!-- C. KETENTUAN BARRICADE & TACTICAL RULES -->
          <div id="section-rules-c" style="margin-bottom:2rem;">
            <h3
              style="font-size:1.1rem; color:var(--color-gold); font-weight:800; margin-bottom:1rem; letter-spacing:0.5px;">
              C. KETENTUAN BARRICADE & TACTICAL RULES
            </h3>

            <div class="accordion-group">
              <div class="accordion-item active">
                <div class="accordion-header" onclick="toggleAccordion(this)">
                  <div class="accordion-header-title">
                    <i class="fa-solid fa-shield-halved" style="color:var(--color-danger);"></i> Ketentuan Barricade &
                    Tactical Rules
                  </div>
                  <i class="fa-solid fa-chevron-down accordion-icon"></i>
                </div>
                <div class="accordion-content">
                  <div style="display:flex; flex-direction:column; gap:1rem;">

                    <!-- Callout 1 (Blue Accent) -->
                    <div
                      style="background:rgba(59, 130, 246, 0.05); border-left:4px solid var(--color-gold); border-radius:6px; padding:1rem 1.25rem;">
                      <strong style="color:var(--text-main); font-size:0.88rem; display:block; margin-bottom:0.4rem;">
                        Jika jumlah officer lebih sedikit dari badside dalam situasi barricade, maka polisi berhak:
                      </strong>
                      <ul style="padding-left:1.2rem; font-size:0.85rem; line-height:1.6; color:#cbd5e1;">
                        <li>Menggunakan senjata <strong style="color:var(--color-gold);">1 level di atas</strong>
                          badside</li>
                        <li>Menggunakan <strong style="color:var(--color-gold);">1 helikopter</strong></li>
                      </ul>
                    </div>

                    <!-- Callout 2 (Blue) -->
                    <div
                      style="background:rgba(59, 130, 246, 0.05); border-left:4px solid var(--color-info); border-radius:6px; padding:1rem 1.25rem;">
                      <strong style="color:var(--text-main); font-size:0.88rem; display:block; margin-bottom:0.4rem;">
                        Jika situasi barricade terjadi di luar 5 blok, polisi berhak:
                      </strong>
                      <ul style="padding-left:1.2rem; font-size:0.85rem; line-height:1.6; color:#cbd5e1;">
                        <li><strong style="color:#60a5fa;">All-in</strong> officer</li>
                        <li>Class senjata <strong style="color:#cbd5e1;">tidak dinaikkan</strong></li>
                      </ul>
                    </div>

                    <!-- Callout 3 (Red) -->
                    <div
                      style="background:rgba(239, 68, 68, 0.05); border-left:4px solid var(--color-danger); border-radius:6px; padding:1rem 1.25rem;">
                      <strong style="color:var(--text-main); font-size:0.88rem; display:block; margin-bottom:0.4rem;">
                        Jika terjadi setup One Way / Tangga Monyet, polisi berhak:
                      </strong>
                      <ul style="padding-left:1.2rem; font-size:0.85rem; line-height:1.6; color:#cbd5e1;">
                        <li>Menggunakan senjata <strong style="color:var(--color-danger);">1 level di atas</strong>
                          badside</li>
                        <li><strong style="color:var(--color-danger);">All-in</strong> officer</li>
                        <li>Menggunakan <strong style="color:var(--color-danger);">1 helikopter</strong></li>
                      </ul>
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
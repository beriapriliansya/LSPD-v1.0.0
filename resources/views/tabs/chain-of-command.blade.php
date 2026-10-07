        <section id="tab-chain-of-command" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>Chain of Command</h2>
              <span>LOS SANTOS POLICE DEPARTMENT OFFICIAL STRUCTURE &amp; PERSONNEL ROSTER</span>
            </div>

            <button class="btn-pdf-export" onclick="window.print()">
              <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
            </button>
          </div>

          <!-- Personnel Summary Stat Cards -->
          <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 1.25rem;">
            <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 0.85rem 1rem; text-align: center;">
              <span data-i18n="statTotal" style="font-size: 0.72rem; color: var(--text-dim); text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">TOTAL POSISI</span>
              <h3 id="cocStatTotal" style="color: var(--color-gold); font-size: 1.5rem; margin-top: 0.2rem; font-weight: 800;">0</h3>
            </div>
            <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 0.85rem 1rem; text-align: center;">
              <span data-i18n="statActive" style="font-size: 0.72rem; color: var(--text-dim); text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">PERSONEL AKTIF</span>
              <h3 id="cocStatActive" style="color: var(--color-success); font-size: 1.5rem; margin-top: 0.2rem; font-weight: 800;">0</h3>
            </div>
            <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 0.85rem 1rem; text-align: center;">
              <span data-i18n="statVacant" style="font-size: 0.72rem; color: var(--text-dim); text-transform: uppercase; font-weight: 700; letter-spacing: 0.5px;">POSISI VACANT</span>
              <h3 id="cocStatVacant" style="color: var(--color-danger); font-size: 1.5rem; margin-top: 0.2rem; font-weight: 800;">0</h3>
            </div>
          </div>

          <!-- Controls: Search & Category Filter Pills -->
          <div style="background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-sm); padding: 0.85rem 1rem; margin-bottom: 1.25rem; display: flex; flex-direction: column; gap: 0.75rem;">
            <div class="search-box">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" id="cocSearchInput" placeholder="Cari nama officer, badge (cth #7000), rank, atau divisi (SWAT, METRO, MCD, Patrol)..." oninput="filterChainOfCommand()">
            </div>
            <div style="display: flex; gap: 0.4rem; flex-wrap: wrap;" id="cocCategoryFilterContainer">
              <!-- Filter buttons rendered dynamically via JS -->
            </div>
          </div>

          <!-- Container for Rendering Personnel Hierarchy Cards -->
          <div id="cocPersonnelGrid" style="display: flex; flex-direction: column; gap: 1.25rem;">
            <!-- Dynamically rendered via JS -->
          </div>
        </section>
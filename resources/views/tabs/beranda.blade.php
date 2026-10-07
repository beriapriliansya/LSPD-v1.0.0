<section id="tab-beranda" class="tab-content active">
  <div class="dashboard-container">
    
    <!-- Dashboard Header & Officer Profile Hero -->
    <div class="dashboard-header" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; margin-bottom: 1.5rem; background: linear-gradient(135deg, rgba(15,23,42,0.85) 0%, rgba(30,41,59,0.85) 100%); padding: 1.25rem 1.5rem; border-radius: 14px; border: 1px solid var(--border-color); border-left: 4px solid var(--color-gold);">
      <div>
        <h2 class="dashboard-title" style="margin-bottom: 0.35rem;">Dashboard</h2>
        <p class="dashboard-subtitle" style="margin: 0;">Welcome back, <strong>Milo Meletup (#71302)</strong>. Here's an overview of LSPD activity and important information.</p>
      </div>

      <!-- Hero Officer Profile Card -->
      <div style="display: flex; align-items: center; gap: 0.85rem; background: rgba(15,23,42,0.9); padding: 0.65rem 1rem; border-radius: 12px; border: 1px solid rgba(59, 130, 246, 0.4); box-shadow: 0 4px 15px rgba(0,0,0,0.3);">
        <img src="{{ asset('img/officers/milo_71302.png') }}" alt="Milo Meletup" style="width: 48px; height: 48px; border-radius: 10px; object-fit: cover; border: 2px solid #3b82f6;">
        <div>
          <div style="display: flex; align-items: center; gap: 0.35rem;">
            <span style="font-size: 0.9rem; font-weight: 800; color: #ffffff;">Milo Meletup</span>
            <span style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; font-family: monospace; font-size: 0.7rem; font-weight: 800; padding: 0.05rem 0.4rem; border-radius: 4px;">#71302</span>
          </div>
          <div style="font-size: 0.78rem; color: var(--color-gold); font-weight: 700; margin-top: 0.1rem; display: flex; align-items: center; gap: 0.3rem;">
            <i class="fa-solid fa-award"></i> Police Officer III
          </div>
        </div>
      </div>
    </div>

    <!-- 4 Top Metric Stat Cards -->
    <div class="dash-stats-grid">
      
      <div class="dash-stat-card">
        <div class="dash-stat-icon icon-blue">
          <i class="fa-solid fa-user-group"></i>
        </div>
        <div class="dash-stat-content">
          <span class="dash-stat-label">Total Officers</span>
          <h3 class="dash-stat-value">187</h3>
          <span class="dash-stat-badge badge-green"><i class="fa-solid fa-arrow-up"></i> 2 new this week</span>
        </div>
      </div>

      <div class="dash-stat-card">
        <div class="dash-stat-icon icon-green">
          <div class="pulse-dot-green"></div>
        </div>
        <div class="dash-stat-content">
          <span class="dash-stat-label">On Duty</span>
          <h3 class="dash-stat-value">142</h3>
          <span class="dash-stat-badge badge-green">76% of total</span>
        </div>
      </div>

      <div class="dash-stat-card">
        <div class="dash-stat-icon icon-red">
          <div class="dot-red"></div>
        </div>
        <div class="dash-stat-content">
          <span class="dash-stat-label">Off Duty</span>
          <h3 class="dash-stat-value">45</h3>
          <span class="dash-stat-badge badge-red">24% of total</span>
        </div>
      </div>

      <div class="dash-stat-card">
        <div class="dash-stat-icon icon-blue-shield">
          <i class="fa-solid fa-shield"></i>
        </div>
        <div class="dash-stat-content">
          <span class="dash-stat-label">Active Divisions</span>
          <h3 class="dash-stat-value">7</h3>
          <span class="dash-stat-subtext">of 9 total</span>
        </div>
      </div>

    </div>

    <!-- Main Dashboard Body (2-Column Grid) -->
    <div class="dash-body-grid">
      
      <!-- LEFT COLUMN (Main Content) -->
      <div class="dash-left-col">
        
        <!-- Quick Links -->
        <div class="dash-card">
          <div class="dash-card-header">
            <h3 class="dash-card-title"><i class="fa-solid fa-link text-accent"></i> Quick Links &amp; Navigation</h3>
          </div>
          <div class="quick-links-grid" style="grid-template-columns: repeat(2, 1fr);">
            
            <div class="quick-link-item" onclick="switchTab('penal-code-cheat')">
              <div class="quick-link-icon"><i class="fa-solid fa-book-bookmark"></i></div>
              <div class="quick-link-text">
                <h5>Penal Code Cheat</h5>
                <span>Panduan cepat pasal &amp; kasus</span>
              </div>
              <i class="fa-solid fa-chevron-right quick-link-arrow"></i>
            </div>

            <div class="quick-link-item" onclick="switchTab('rules')">
              <div class="quick-link-icon"><i class="fa-solid fa-list-check"></i></div>
              <div class="quick-link-text">
                <h5>SOP &amp; Rules</h5>
                <span>Prosedur standar operasional</span>
              </div>
              <i class="fa-solid fa-chevron-right quick-link-arrow"></i>
            </div>

            <div class="quick-link-item" onclick="switchTab('chain-of-command')">
              <div class="quick-link-icon"><i class="fa-solid fa-user-tie"></i></div>
              <div class="quick-link-text">
                <h5>Chain of Command</h5>
                <span>Struktur organisasi officer</span>
              </div>
              <i class="fa-solid fa-chevron-right quick-link-arrow"></i>
            </div>

            <div class="quick-link-item" onclick="switchTab('weapon-classes')">
              <div class="quick-link-icon"><i class="fa-solid fa-gun"></i></div>
              <div class="quick-link-text">
                <h5>Weapon Classes</h5>
                <span>Panduan kelas senjata api</span>
              </div>
              <i class="fa-solid fa-chevron-right quick-link-arrow"></i>
            </div>

          </div>
        </div>

      </div>

      <!-- RIGHT COLUMN (Widgets & Banner) -->
      <div class="dash-right-col">
        
        <!-- Hero Banner Card -->
        <div class="hero-banner-card">
          <div class="hero-banner-overlay"></div>
          <div class="hero-banner-content">
            <img src="{{ asset('img/lspd_logo.png') }}" alt="LSPD Logo" class="hero-banner-seal">
            <h3 class="hero-banner-title">LOS SANTOS POLICE DEPARTMENT</h3>
            <p class="hero-banner-sub">To Protect and To Serve</p>
          </div>
        </div>

        <!-- Important Links Card -->
        <div class="dash-card">
          <div class="dash-card-header">
            <h3 class="dash-card-title"><i class="fa-solid fa-arrow-up-right-from-square text-accent"></i> Important Links</h3>
          </div>
          <div class="important-links-list">
            
            <a href="#" class="important-link-item">
              <span><i class="fa-regular fa-file-pdf"></i> LSPD Handbook (PDF)</span>
              <i class="fa-solid fa-download download-icon"></i>
            </a>

            <a href="#" class="important-link-item">
              <span><i class="fa-solid fa-book"></i> Code of Conduct</span>
              <i class="fa-solid fa-download download-icon"></i>
            </a>

            <a href="#" class="important-link-item">
              <span><i class="fa-solid fa-shield-halved"></i> Use of Force Policy</span>
              <i class="fa-solid fa-download download-icon"></i>
            </a>

            <a href="#" class="important-link-item">
              <span><i class="fa-solid fa-kit-medical"></i> Emergency Procedures</span>
              <i class="fa-solid fa-download download-icon"></i>
            </a>

          </div>
        </div>

        <!-- Quote Card -->
        <div class="quote-card">
          <i class="fa-solid fa-quote-left quote-icon"></i>
          <p class="quote-text">Integrity, Service, Protection.</p>
          <span class="quote-author">— LSPD</span>
        </div>

      </div>

    </div>

  </div>
</section>
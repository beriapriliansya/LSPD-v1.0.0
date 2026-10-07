    <nav class="sidebar">
      <div style="flex:1; overflow-y:auto;">
        
        <div class="sidebar-group">
          <div class="sidebar-group-title">MAIN</div>
          <ul class="nav-list">
            <li class="nav-item">
              <button class="active" data-tab="beranda" onclick="switchTab('beranda')">
                <i class="fa-solid fa-gauge-high"></i> Dashboard
              </button>
            </li>
          </ul>
        </div>

        <div class="sidebar-group">
          <div class="sidebar-group-title">HANDBOOK</div>
          <ul class="nav-list">
            <li class="nav-item">
              <button data-tab="penal-code-cheat" onclick="switchTab('penal-code-cheat')">
                <i class="fa-solid fa-book-bookmark"></i> Penal Code Cheat
              </button>
            </li>
            <li class="nav-item">
              <button data-tab="rules" onclick="switchTab('rules')">
                <i class="fa-solid fa-scroll"></i> SOP &amp; Rules
              </button>
            </li>
          </ul>
        </div>

        <div class="sidebar-group">
          <div class="sidebar-group-title">OFFICER MANAGEMENT</div>
          <ul class="nav-list">
            <li class="nav-item">
              <button data-tab="chain-of-command" onclick="switchTab('chain-of-command')">
                <i class="fa-solid fa-users-viewfinder"></i> Chain of Command
              </button>
            </li>
            <li class="nav-item">
              <button data-tab="weapon-classes" onclick="switchTab('weapon-classes')">
                <i class="fa-solid fa-gun"></i> Weapon Classes
              </button>
            </li>
          </ul>
        </div>

        <div class="sidebar-group">
          <div class="sidebar-group-title">OPERATIONS</div>
          <ul class="nav-list">
            <li class="nav-item">
              <button data-tab="komunikasi-radio" onclick="switchTab('komunikasi-radio')">
                <i class="fa-solid fa-walkie-talkie"></i> Komunikasi Radio
              </button>
            </li>
            <li class="nav-item">
              <button data-tab="prosedur-taktis" onclick="switchTab('prosedur-taktis')">
                <i class="fa-solid fa-crosshairs"></i> Prosedur Taktis
              </button>
            </li>
            <li class="nav-item">
              <button data-tab="incident-command" onclick="switchTab('incident-command')">
                <i class="fa-solid fa-sitemap"></i> Incident Command
              </button>
            </li>
          </ul>
        </div>

        <div class="sidebar-group">
          <div class="sidebar-group-title">REPORTS &amp; LEGAL</div>
          <ul class="nav-list">
            <li class="nav-item">
              <button data-tab="laporan-patroli" onclick="switchTab('laporan-patroli')">
                <i class="fa-solid fa-file-lines"></i> Laporan Patroli
              </button>
            </li>
            <li class="nav-item">
              <button data-tab="proses-hukum" onclick="switchTab('proses-hukum')">
                <i class="fa-solid fa-gavel"></i> Proses Hukum
              </button>
            </li>
            <li class="nav-item">
              <button data-tab="alur-court-verdict" onclick="switchTab('alur-court-verdict')">
                <i class="fa-solid fa-scale-balanced"></i> Alur Court Verdict
              </button>
            </li>
          </ul>
        </div>

        <div class="sidebar-group">
          <div class="sidebar-group-title">TRAINING &amp; PROMOTION</div>
          <ul class="nav-list">
            <li class="nav-item">
              <button data-tab="kualifikasi-promosi" onclick="switchTab('kualifikasi-promosi')">
                <i class="fa-solid fa-award"></i> Kualifikasi Promosi
              </button>
            </li>
          </ul>
        </div>

      </div>

      <div class="sidebar-footer">
        <div class="sidebar-status-box">
          <div class="sidebar-version">LSPD v1.0.0</div>
          <div class="sidebar-status"><span class="status-dot"></span> System Operational</div>
        </div>
      </div>
    </nav>
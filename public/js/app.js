/**
 * LSPD MDC Application Logic
 * GTA V Roleplay Police Operations & Handbook System
 */

const TAB_SEQUENCE = [
  'beranda',
  'chain-of-command',
  'komunikasi-radio',
  'prosedur-taktis',
  'rules',
  'weapon-classes',
  'incident-command',
  'proses-hukum',
  'alur-court-verdict',
  'penal-code-cheat',
  'penal-calculator',
  'laporan-patroli',
  'kualifikasi-promosi'
];

let currentTabIndex = 0;

/* ==========================================================================
   MOBILE SIDEBAR DRAWER TOGGLE ENGINE
   ========================================================================== */
window.toggleMobileSidebar = function(forceState) {
  const sidebar = document.querySelector('.sidebar');
  const backdrop = document.getElementById('sidebarBackdrop');
  if (!sidebar) return;
  const isOpen = typeof forceState === 'boolean' ? forceState : !sidebar.classList.contains('open');
  if (isOpen) {
    sidebar.classList.add('open');
    if (backdrop) backdrop.classList.add('active');
  } else {
    sidebar.classList.remove('open');
    if (backdrop) backdrop.classList.remove('active');
  }
};

/* ==========================================================================
   GLOBAL TAB SWITCHER & APPLICATION ENGINE
   ========================================================================== */

// Global Tab Switcher Function (Guarantees Instant Tab Clicking)
window.switchTab = function(targetTab) {
  if (!targetTab) return;

  // Auto-close mobile drawer when switching tabs
  if (typeof window.toggleMobileSidebar === 'function') {
    window.toggleMobileSidebar(false);
  }

  const idx = TAB_SEQUENCE.indexOf(targetTab);
  if (idx !== -1) currentTabIndex = idx;

  const navButtons = document.querySelectorAll('.nav-item button');
  const tabContents = document.querySelectorAll('.tab-content');

  navButtons.forEach(btn => {
    if (btn.getAttribute('data-tab') === targetTab) {
      btn.classList.add('active');
    } else {
      btn.classList.remove('active');
    }
  });

  tabContents.forEach(c => {
    c.classList.remove('active');
    c.style.display = 'none';
  });

  const activeTabEl = document.getElementById(`tab-${targetTab}`);
  if (activeTabEl) {
    activeTabEl.classList.add('active');
    activeTabEl.style.display = 'block';
  }

  if (targetTab === 'chain-of-command' && typeof window.renderChainOfCommand === 'function') {
    window.renderChainOfCommand();
  }

  // Update Header Title dynamically
  const headerTitleEl = document.getElementById('headerTabTitle');
  if (headerTitleEl) {
    const titleMap = {
      'beranda': 'Beranda LSPD',
      'chain-of-command': 'Chain of Command LSPD',
      'komunikasi-radio': 'Komunikasi Radio LSPD',
      'prosedur-taktis': 'Prosedur Taktis LSPD',
      'rules': 'Rules & Code of Conduct LSPD',
      'weapon-classes': 'Weapon Classes & Legalitas LSPD',
      'incident-command': 'Incident Command & Divisi LSPD',
      'proses-hukum': 'Proses Hukum & Miranda LSPD',
      'alur-court-verdict': 'Alur Court Verdict LSPD',
      'penal-code-cheat': 'Penal Code Cheat Sheet LSPD',
      'penal-calculator': 'Kalkulator Penal Code & AI Prompt LSPD',
      'laporan-patroli': 'Laporan Patroli & Log LSPD',
      'kualifikasi-promosi': 'Kualifikasi Promosi LSPD'
    };
    headerTitleEl.textContent = titleMap[targetTab] || 'LSPD MDC Terminal';
  }
};

window.nextTab = function() {
  currentTabIndex = (currentTabIndex + 1) % TAB_SEQUENCE.length;
  window.switchTab(TAB_SEQUENCE[currentTabIndex]);
};

window.prevTab = function() {
  currentTabIndex = (currentTabIndex - 1 + TAB_SEQUENCE.length) % TAB_SEQUENCE.length;
  window.switchTab(TAB_SEQUENCE[currentTabIndex]);
};

/* ==========================================================================
   CONTENT-AWARE SEARCH ENGINE & SIDEBAR FILTER
   (Searches full text across all sidebar tabs & matches inner tab content)
   ========================================================================== */
let globalSearchIndex = [];

const SEARCH_TYPO_MAP = {
  'roberry': 'robbery',
  'roberi': 'robbery',
  'robery': 'robbery',
  'rober': 'robbery',
  'taktik': 'taktis',
  'tactic': 'taktis',
  'tactical': 'taktis',
  'promosi': 'promosi',
  'promo': 'promosi',
  'narkotik': 'narkoba',
  'narkotika': 'narkoba',
  'senjata': 'weapon',
  'pasal': 'penal',
  'denda': 'penal'
};

function levenshteinDist(a, b) {
  if (a.length === 0) return b.length;
  if (b.length === 0) return a.length;
  const matrix = [];
  for (let i = 0; i <= b.length; i++) matrix[i] = [i];
  for (let j = 0; j <= a.length; j++) matrix[0][j] = j;

  for (let i = 1; i <= b.length; i++) {
    for (let j = 1; j <= a.length; j++) {
      if (b.charAt(i - 1) === a.charAt(j - 1)) {
        matrix[i][j] = matrix[i - 1][j - 1];
      } else {
        matrix[i][j] = Math.min(
          matrix[i - 1][j - 1] + 1,
          matrix[i][j - 1] + 1,
          matrix[i - 1][j] + 1
        );
      }
    }
  }
  return matrix[b.length][a.length];
}

function matchTokenInText(token, textLower) {
  if (textLower.includes(token)) return true;

  const norm = SEARCH_TYPO_MAP[token];
  if (norm && textLower.includes(norm)) return true;

  if (token.length >= 4) {
    const words = textLower.split(/[\s,.\-()/]+/).filter(w => w.length >= 4);
    for (let w of words) {
      const maxDist = token.length >= 7 ? 2 : 1;
      if (levenshteinDist(token, w) <= maxDist) return true;
    }
  }
  return false;
}

window.buildGlobalSearchIndex = function() {
  globalSearchIndex = [];

  const tabLabels = {
    'beranda': '🏠 Beranda',
    'komunikasi-radio': '📻 Radio',
    'prosedur-taktis': '🚗 Taktis',
    'rules': '📜 Rules',
    'weapon-classes': '🔫 Senjata',
    'incident-command': '👔 Command',
    'proses-hukum': '⚖️ Hukum & Miranda',
    'alur-court-verdict': '🏛️ Court Verdict',
    'penal-code-cheat': '🎯 Penal Code',
    'laporan-patroli': '📋 Patroli',
    'kualifikasi-promosi': '🏆 Promosi'
  };

  const indexedTextMap = new Set();

  TAB_SEQUENCE.forEach(tabId => {
    const tabEl = document.getElementById(`tab-${tabId}`);
    if (!tabEl) return;

    const categoryLabel = tabLabels[tabId] || tabId;

    const nodes = tabEl.querySelectorAll('h1, h2, h3, h4, h5, h6, .card, .cheat-card, .promo-card, .tencodes-list-item, .rule-card, .taktis-card, tr, li, p, span, div, strong, b, a');

    nodes.forEach((node, idx) => {
      if (node.classList && (node.classList.contains('tab-content') || node.classList.contains('main-content'))) return;

      const directText = node.innerText || node.textContent || '';
      const text = directText.trim().replace(/\s+/g, ' ');
      if (text.length < 3 || text.length > 300) return;

      const key = `${tabId}:${text.toLowerCase().substring(0, 100)}`;
      if (indexedTextMap.has(key)) return;
      indexedTextMap.add(key);

      if (!node.id) {
        node.id = `srch_${tabId}_${idx}`;
      }

      let title = text;
      if (text.length > 55) {
        title = text.substring(0, 55) + '...';
      }

      globalSearchIndex.push({
        tabId: tabId,
        elementId: node.id,
        category: categoryLabel,
        title: title,
        fullText: text,
        snippet: text.length > 120 ? text.substring(0, 120) + '...' : text
      });
    });
  });
};

window.filterHandbook = function(query) {
  const q = query ? query.trim().toLowerCase() : '';
  const navButtons = document.querySelectorAll('.nav-item button');

  if (!q) {
    document.querySelectorAll('.nav-item').forEach(li => li.style.display = 'block');
    navButtons.forEach(btn => {
      const b = btn.querySelector('.nav-match-badge');
      if (b) b.remove();
    });
    return;
  }

  if (globalSearchIndex.length === 0) {
    window.buildGlobalSearchIndex();
  }

  const qTokens = q.split(/\s+/);

  const tabCounts = {};
  globalSearchIndex.forEach(item => {
    const textLower = item.fullText.toLowerCase();
    if (qTokens.every(tok => matchTokenInText(tok, textLower))) {
      tabCounts[item.tabId] = (tabCounts[item.tabId] || 0) + 1;
    }
  });

  navButtons.forEach(btn => {
    const tabId = btn.getAttribute('data-tab');
    const btnText = btn.textContent.toLowerCase();

    const isBtnTitleMatch = qTokens.every(tok => btnText.includes(tok));
    const matchCount = tabCounts[tabId] || 0;

    let existingBadge = btn.querySelector('.nav-match-badge');

    if (isBtnTitleMatch || matchCount > 0) {
      btn.parentElement.style.display = 'block';
      const displayCount = matchCount || 1;
      if (!existingBadge) {
        existingBadge = document.createElement('span');
        existingBadge.className = 'nav-match-badge';
        btn.appendChild(existingBadge);
      }
      existingBadge.textContent = `${displayCount}`;
    } else {
      btn.parentElement.style.display = 'none';
      if (existingBadge) existingBadge.remove();
    }
  });
};

window.handleGlobalSearch = function(query) {
  window.filterHandbook(query);

  const navInput = document.getElementById('globalSearchInput');
  const sideInput = document.getElementById('handbookSearchInput');

  if (navInput && query !== navInput.value) navInput.value = query;
  if (sideInput && query !== sideInput.value) sideInput.value = query;

  const dropdownEl = document.getElementById('globalSearchResultsDropdown');
  const listEl = document.getElementById('globalSearchResultsList');
  const countEl = document.getElementById('globalSearchResultCount');
  const clearBtn = document.getElementById('clearGlobalSearchBtn');
  const shortcutBadge = document.querySelector('.search-shortcut-badge');

  if (!query || query.trim().length === 0) {
    if (dropdownEl) dropdownEl.style.display = 'none';
    if (clearBtn) clearBtn.style.display = 'none';
    if (shortcutBadge) shortcutBadge.style.display = 'block';
    removeMultiTabSwitcherBar();
    return;
  }

  if (clearBtn) clearBtn.style.display = 'block';
  if (shortcutBadge) shortcutBadge.style.display = 'none';

  if (globalSearchIndex.length === 0) {
    window.buildGlobalSearchIndex();
  }

  const q = query.trim().toLowerCase();
  const qTokens = q.split(/\s+/);

  const matches = globalSearchIndex.filter(item => {
    const textLower = item.fullText.toLowerCase();
    return qTokens.every(tok => matchTokenInText(tok, textLower));
  });

  const groupsByTab = {};
  matches.forEach(m => {
    if (!groupsByTab[m.tabId]) {
      groupsByTab[m.tabId] = {
        tabId: m.tabId,
        category: m.category,
        items: []
      };
    }
    groupsByTab[m.tabId].items.push(m);
  });

  const matchingTabsList = Object.values(groupsByTab);

  // AUTOMATIC DIRECT TAB SWITCH & SCROLL TO FIRST MATCH
  if (matches.length > 0) {
    const topMatch = matches[0];
    window.switchTab(topMatch.tabId);

    const targetEl = document.getElementById(topMatch.elementId);
    if (targetEl) {
      targetEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
      targetEl.classList.add('flash-highlight');
      setTimeout(() => {
        targetEl.classList.remove('flash-highlight');
      }, 2000);
    }
  }

  // RENDER MULTI-TAB SWITCHER BAR IF MATCHES SPAN 2+ TABS
  renderMultiTabSwitcherBar(matchingTabsList, query);

  if (countEl) countEl.textContent = `${matches.length} ditemukan (${matchingTabsList.length} Tab)`;

  if (matchingTabsList.length === 0) {
    if (listEl) {
      listEl.innerHTML = `
        <div class="no-results-box">
          <i class="fa-solid fa-circle-xmark" style="font-size:1.5rem; margin-bottom:0.4rem; color:var(--text-dim);"></i>
          <div>Tidak ada materi atau 10-code yang cocok dengan "<strong>${escapeHtml(query)}</strong>"</div>
        </div>
      `;
    }
  } else {
    if (listEl) {
      listEl.innerHTML = matchingTabsList.map(group => {
        const groupHeader = `
          <div class="search-group-header">
            <span>${group.category}</span>
            <span class="group-count-tag">${group.items.length} hasil</span>
          </div>
        `;

        const groupItems = group.items.slice(0, 8).map(m => {
          const highlightedTitle = highlightQuery(m.title, qTokens[0] || q);
          const highlightedSnippet = highlightQuery(m.snippet, qTokens[0] || q);

          return `
            <div class="search-result-item" onclick="navigateToSearchResult('${m.tabId}', '${m.elementId}')">
              <div class="search-result-top">
                <span class="search-result-title">${highlightedTitle}</span>
              </div>
              <div class="search-result-snippet">${highlightedSnippet}</div>
            </div>
          `;
        }).join('');

        return groupHeader + groupItems;
      }).join('');
    }
  }

  if (dropdownEl) dropdownEl.style.display = 'flex';
};

function renderMultiTabSwitcherBar(matchingTabsList, query) {
  removeMultiTabSwitcherBar();
  if (matchingTabsList.length <= 1) return;

  const mainContent = document.querySelector('.main-content > div');
  if (!mainContent) return;

  const bar = document.createElement('div');
  bar.id = 'multiTabSwitcherBar';
  bar.className = 'multi-tab-switcher-bar';

  const labelHtml = `
    <div class="multi-tab-label">
      <i class="fa-solid fa-layer-group"></i> Ditemukan di ${matchingTabsList.length} Tab Sidebar:
    </div>
  `;

  const pillsHtml = `
    <div class="multi-tab-pills">
      ${matchingTabsList.map((g, idx) => `
        <button class="multi-tab-pill ${idx === 0 ? 'active' : ''}" onclick="switchMultiTabPill('${g.tabId}', '${g.items[0].elementId}', this)">
          ${g.category} <span style="opacity:0.8;">(${g.items.length})</span>
        </button>
      `).join('')}
    </div>
  `;

  bar.innerHTML = labelHtml + pillsHtml;
  mainContent.insertBefore(bar, mainContent.firstChild);
}

function removeMultiTabSwitcherBar() {
  const existing = document.getElementById('multiTabSwitcherBar');
  if (existing) existing.remove();
}

window.switchMultiTabPill = function(tabId, elementId, pillBtn) {
  document.querySelectorAll('.multi-tab-pill').forEach(p => p.classList.remove('active'));
  if (pillBtn) pillBtn.classList.add('active');

  window.switchTab(tabId);

  const targetEl = document.getElementById(elementId);
  if (targetEl) {
    targetEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
    targetEl.classList.add('flash-highlight');
    setTimeout(() => {
      targetEl.classList.remove('flash-highlight');
    }, 2000);
  }
};

window.clearGlobalSearch = function() {
  const inputEl = document.getElementById('globalSearchInput');
  const dropdownEl = document.getElementById('globalSearchResultsDropdown');
  const clearBtn = document.getElementById('clearGlobalSearchBtn');
  const shortcutBadge = document.querySelector('.search-shortcut-badge');

  if (inputEl) inputEl.value = '';
  if (dropdownEl) dropdownEl.style.display = 'none';
  if (clearBtn) clearBtn.style.display = 'none';
  if (shortcutBadge) shortcutBadge.style.display = 'block';
};

window.navigateToSearchResult = function(tabId, elementId) {
  window.switchTab(tabId);

  const dropdownEl = document.getElementById('globalSearchResultsDropdown');
  if (dropdownEl) dropdownEl.style.display = 'none';

  setTimeout(() => {
    const el = document.getElementById(elementId);
    if (el) {
      el.scrollIntoView({ behavior: 'smooth', block: 'center' });
      el.classList.add('flash-highlight');
      setTimeout(() => {
        el.classList.remove('flash-highlight');
      }, 2000);
    }
  }, 100);
};

function highlightQuery(text, query) {
  if (!text || !query) return escapeHtml(text || '');
  const esc = escapeHtml(text);
  const regex = new RegExp(`(${query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')})`, 'gi');
  return esc.replace(regex, '<span class="search-result-match">$1</span>');
}

// Global Keyboard Shortcut (Ctrl+K or /) & Document click handlers
document.addEventListener('keydown', (e) => {
  if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
    e.preventDefault();
    const searchIn = document.getElementById('globalSearchInput');
    if (searchIn) {
      searchIn.focus();
      searchIn.select();
    }
  } else if (e.key === 'Escape') {
    const dropdownEl = document.getElementById('globalSearchResultsDropdown');
    if (dropdownEl) dropdownEl.style.display = 'none';
  }
});

document.addEventListener('click', (e) => {
  const container = document.querySelector('.global-search-container');
  const dropdownEl = document.getElementById('globalSearchResultsDropdown');
  if (container && dropdownEl && !container.contains(e.target)) {
    dropdownEl.style.display = 'none';
  }
});

function escapeHtml(str) {
  if (typeof str !== 'string') return str;
  return str
    .replace(/&/g, "&amp;")
    .replace(/</g, "&lt;")
    .replace(/>/g, "&gt;")
    .replace(/"/g, "&quot;")
    .replace(/'/g, "&#039;");
}
window.escapeHtml = escapeHtml;

/* ==========================================
     11. Chain of Command Rendering & Filter Engine
     ========================================== */
  let currentCocFilter = 'ALL';

  window.renderChainOfCommand = function() {
    const container = document.getElementById('cocPersonnelGrid');
    const statTotalEl = document.getElementById('cocStatTotal');
    const statActiveEl = document.getElementById('cocStatActive');
    const statVacantEl = document.getElementById('cocStatVacant');
    const filterContainer = document.getElementById('cocCategoryFilterContainer');

    if (!container) return;

    let rawData = StorageManager.getChainOfCommand();
    if (!rawData || !Array.isArray(rawData) || rawData.length === 0) {
      rawData = typeof DEFAULT_CHAIN_OF_COMMAND !== 'undefined' ? DEFAULT_CHAIN_OF_COMMAND : [];
      if (rawData.length > 0) StorageManager.saveChainOfCommand(rawData);
    }

    // Update Summary Metrics
    if (statTotalEl) statTotalEl.textContent = rawData.length;
    if (statActiveEl) statActiveEl.textContent = rawData.filter(d => d.status === 'ACTIVE').length;
    if (statVacantEl) statVacantEl.textContent = rawData.filter(d => d.status === 'VACANT').length;

    // Render Category Filter Pills
    const categories = ['ALL', 'COMMISSIONER', 'CHIEF OF POLICE', 'ASSISTANT CHIEF', 'DEPUTY CHIEF', 'COMMANDER', 'CAPTAIN', 'LIEUTENANT', 'DETECTIVE', 'SERGEANT', 'POLICE OFFICER III', 'POLICE OFFICER II', 'ROOKIE'];

    if (filterContainer) {
      filterContainer.innerHTML = categories.map(cat => `
        <button type="button" class="btn-filter-pill ${cat === currentCocFilter ? 'active' : ''}" onclick="setCocCategoryFilter('${cat}')" style="
          padding: 0.35rem 0.75rem;
          font-size: 0.73rem;
          font-weight: 700;
          border-radius: 20px;
          border: 1px solid var(--border-color);
          background: ${cat === currentCocFilter ? 'var(--color-primary)' : 'var(--bg-card-hover)'};
          color: ${cat === currentCocFilter ? '#ffffff' : 'var(--text-muted)'};
          cursor: pointer;
          transition: all 0.2s ease;
        ">
          ${cat}
        </button>
      `).join('');
    }

    window.filterChainOfCommand();
  };

  window.setCocCategoryFilter = function(category) {
    currentCocFilter = category;
    const filterContainer = document.getElementById('cocCategoryFilterContainer');
    if (filterContainer) {
      const buttons = filterContainer.querySelectorAll('button');
      buttons.forEach(btn => {
        if (btn.textContent.trim() === category) {
          btn.style.background = 'var(--color-primary)';
          btn.style.color = '#ffffff';
          btn.style.borderColor = 'var(--color-primary)';
        } else {
          btn.style.background = 'var(--bg-card-hover)';
          btn.style.color = 'var(--text-muted)';
          btn.style.borderColor = 'var(--border-color)';
        }
      });
    }
    window.filterChainOfCommand();
  };

  window.filterChainOfCommand = function() {
    const container = document.getElementById('cocPersonnelGrid');
    const searchInput = document.getElementById('cocSearchInput');
    if (!container) return;

    const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
    let rawData = StorageManager.getChainOfCommand();
    if (!rawData || !Array.isArray(rawData) || rawData.length === 0) {
      rawData = typeof DEFAULT_CHAIN_OF_COMMAND !== 'undefined' ? DEFAULT_CHAIN_OF_COMMAND : [];
    }

    let filtered = rawData.filter(item => {
      const matchesCategory = currentCocFilter === 'ALL' || item.category === currentCocFilter;
      const matchesQuery = !query || 
        item.name.toLowerCase().includes(query) ||
        item.rank.toLowerCase().includes(query) ||
        item.badge.toLowerCase().includes(query) ||
        item.division.toLowerCase().includes(query) ||
        item.category.toLowerCase().includes(query);
      return matchesCategory && matchesQuery;
    });

    if (filtered.length === 0) {
      container.innerHTML = `
        <div style="text-align:center; padding: 2.5rem 1rem; background: var(--bg-card); border: 1px solid var(--border-color); border-radius: var(--radius-sm); color: var(--text-muted);">
          <i class="fa-solid fa-user-slash" style="font-size: 2.5rem; margin-bottom: 0.75rem; color: var(--color-danger); opacity: 0.7;"></i>
          <h4 style="color: var(--text-bright);">Tidak Ada Personel Ditemukan</h4>
          <p style="font-size: 0.85rem; margin-top: 0.25rem;">Coba ubah kata kunci pencarian atau pilih kategori filter lain.</p>
        </div>
      `;
      return;
    }

    // Group by Category
    const categoryOrder = ['COMMISSIONER', 'CHIEF OF POLICE', 'ASSISTANT CHIEF', 'DEPUTY CHIEF', 'COMMANDER', 'CAPTAIN', 'LIEUTENANT', 'DETECTIVE', 'SERGEANT', 'POLICE OFFICER III', 'POLICE OFFICER II', 'ROOKIE'];
    
    const grouped = {};
    filtered.forEach(item => {
      if (!grouped[item.category]) grouped[item.category] = [];
      grouped[item.category].push(item);
    });

    const getCategoryColor = (cat) => {
      switch (cat) {
        case 'COMMISSIONER':
        case 'CHIEF OF POLICE':
          return '#f59e0b'; // Gold
        case 'ASSISTANT CHIEF':
        case 'DEPUTY CHIEF':
          return '#d97706'; // Amber Gold
        case 'COMMANDER':
        case 'CAPTAIN':
          return '#a855f7'; // Purple
        case 'LIEUTENANT':
          return '#3b82f6'; // Blue
        case 'DETECTIVE':
          return '#06b6d4'; // Cyan
        case 'SERGEANT':
          return '#10b981'; // Emerald
        case 'POLICE OFFICER III':
          return '#0284c7'; // Sky Blue
        case 'POLICE OFFICER II':
          return '#64748b'; // Slate
        case 'ROOKIE':
        default:
          return '#94a3b8'; // Gray
      }
    };

    const getRankIcon = (rank, cat) => {
      if (cat === 'COMMISSIONER') return 'fa-solid fa-crown';
      if (cat === 'CHIEF OF POLICE') return 'fa-solid fa-star';
      if (cat === 'ASSISTANT CHIEF') return 'fa-solid fa-star-half-stroke';
      if (cat === 'DEPUTY CHIEF' || cat === 'COMMANDER') return 'fa-solid fa-shield-halved';
      if (cat === 'CAPTAIN') return 'fa-solid fa-bars-staggered';
      if (cat === 'LIEUTENANT') return 'fa-solid fa-bars';
      if (cat === 'DETECTIVE') return 'fa-solid fa-user-secret';
      if (cat === 'SERGEANT') return 'fa-solid fa-chevron-up';
      if (cat === 'POLICE OFFICER III' || cat === 'POLICE OFFICER II') return 'fa-solid fa-user-shield';
      return 'fa-solid fa-user-check';
    };

    let html = '';

    categoryOrder.forEach(cat => {
      if (grouped[cat] && grouped[cat].length > 0) {
        const color = getCategoryColor(cat);
        const items = grouped[cat];

        html += `
          <div class="coc-category-section" style="background: var(--bg-card); border: 1px solid var(--border-color); border-left: 4px solid ${color}; border-radius: var(--radius-sm); padding: 1.25rem;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid rgba(255,255,255,0.06); padding-bottom: 0.5rem;">
              <h3 style="color: ${color}; font-size: 1.05rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.5px; display: flex; align-items: center; gap: 0.5rem; margin: 0;">
                <i class="${getRankIcon('', cat)}"></i> ${cat}
              </h3>
              <span style="font-size: 0.75rem; background: rgba(255,255,255,0.08); padding: 0.2rem 0.6rem; border-radius: 12px; font-weight: 700; color: var(--text-dim);">
                ${items.length} Personel
              </span>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 0.85rem;">
              ${items.map(item => {
                const isVacant = item.status === 'VACANT' || item.name.toUpperCase() === 'VACANT';
                return `
                  <div class="coc-card" style="
                    background: ${isVacant ? 'rgba(239, 68, 68, 0.04)' : 'var(--bg-card-hover)'};
                    border: 1px ${isVacant ? 'dashed rgba(239, 68, 68, 0.35)' : 'solid var(--border-color)'};
                    border-radius: var(--radius-sm);
                    padding: 0.85rem;
                    display: flex;
                    align-items: center;
                    gap: 0.85rem;
                    transition: transform 0.2s ease, border-color 0.2s ease;
                  ">
                    <!-- Avatar Badge -->
                    <div style="
                      width: 42px;
                      height: 42px;
                      border-radius: 50%;
                      background: ${isVacant ? 'rgba(239, 68, 68, 0.12)' : `${color}20`};
                      border: 1.5px solid ${isVacant ? 'rgba(239, 68, 68, 0.4)' : color};
                      display: flex;
                      align-items: center;
                      justify-content: center;
                      flex-shrink: 0;
                    ">
                      <i class="${getRankIcon(item.rank, item.category)}" style="color: ${isVacant ? '#ef4444' : color}; font-size: 1.05rem;"></i>
                    </div>

                    <!-- Officer Details -->
                    <div style="flex: 1; min-width: 0;">
                      <div style="display: flex; align-items: center; justify-content: space-between; gap: 0.4rem; margin-bottom: 0.15rem;">
                        <span style="font-size: 0.68rem; font-weight: 800; color: ${color}; text-transform: uppercase; letter-spacing: 0.3px;">
                          #${escapeHtml(item.badge)} &bull; ${escapeHtml(item.rank)}
                        </span>
                        <span style="
                          font-size: 0.62rem;
                          font-weight: 800;
                          padding: 0.08rem 0.35rem;
                          border-radius: 4px;
                          background: ${isVacant ? 'rgba(239, 68, 68, 0.2)' : 'rgba(16, 185, 129, 0.2)'};
                          color: ${isVacant ? '#ef4444' : '#10b981'};
                        ">
                          ${isVacant ? 'VACANT' : 'ACTIVE'}
                        </span>
                      </div>

                      <div style="font-weight: 700; font-size: 0.92rem; color: ${isVacant ? '#ef4444' : 'var(--text-bright)'}; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                        ${escapeHtml(item.name)}
                      </div>

                      <div style="font-size: 0.74rem; color: var(--text-dim); margin-top: 0.1rem;">
                        <i class="fa-solid fa-layer-group" style="font-size: 0.65rem; margin-right: 0.25rem;"></i>${escapeHtml(item.division)}
                      </div>
                    </div>
                  </div>
                `;
              }).join('')}
            </div>
          </div>
        `;
      }
    });

    container.innerHTML = html;
  };

document.addEventListener('DOMContentLoaded', () => {
  // App State Initialization
  let tenCodes = StorageManager.getTenCodes();
  let penalCodes = StorageManager.getPenalCodes();
  let reports = StorageManager.getReports();
  let dpos = StorageManager.getDpos();
  let selectedPenalIds = new Set();
  
  // Timer State
  let shiftSeconds = 0;
  let timerInterval = null;
  let isTimerRunning = false;

  // Initialize All Systems
  initClockAndTimer();
  initNavigation();
  initSubtabs();
  renderDashboard();
  renderTenCodes();
  renderPenalCodes();
  renderReports();
  renderDpos();
  renderChainOfCommand();
  initScratchpad();
  initPatrolReportGenerator();
  setupEventListeners();
  window.buildGlobalSearchIndex();

  /* ==========================================
     1. Clock & Duty Shift Timer Logic
     ========================================== */
  function initClockAndTimer() {
    const clockEl = document.getElementById('clockDisplay');
    function updateClock() {
      const now = new Date();
      const timeStr = now.toLocaleTimeString('id-ID', { hour12: false });
      if (clockEl) clockEl.innerHTML = `<i class="fa-regular fa-clock"></i> ${timeStr} WIB`;
    }
    updateClock();
    setInterval(updateClock, 1000);

    const timerDisplay = document.getElementById('shiftTimerDisplay');
    const timerToggleBtn = document.getElementById('toggleTimerBtn');
    const timerResetBtn = document.getElementById('resetTimerBtn');

    function formatTime(totalSec) {
      const hrs = String(Math.floor(totalSec / 3600)).padStart(2, '0');
      const mins = String(Math.floor((totalSec % 3600) / 60)).padStart(2, '0');
      const secs = String(totalSec % 60).padStart(2, '0');
      return `${hrs}:${mins}:${secs}`;
    }

    if (timerToggleBtn) {
      timerToggleBtn.addEventListener('click', () => {
        if (isTimerRunning) {
          clearInterval(timerInterval);
          isTimerRunning = false;
          timerToggleBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
          showToast('Shift timer dipause');
        } else {
          isTimerRunning = true;
          timerToggleBtn.innerHTML = '<i class="fa-solid fa-pause"></i>';
          timerInterval = setInterval(() => {
            shiftSeconds++;
            if (timerDisplay) timerDisplay.textContent = formatTime(shiftSeconds);
          }, 1000);
          showToast('Shift timer berjalan');
        }
      });
    }

    if (timerResetBtn) {
      timerResetBtn.addEventListener('click', () => {
        clearInterval(timerInterval);
        isTimerRunning = false;
        shiftSeconds = 0;
        if (timerDisplay) timerDisplay.textContent = '00:00:00';
        if (timerToggleBtn) timerToggleBtn.innerHTML = '<i class="fa-solid fa-play"></i>';
        showToast('Shift timer direset');
      });
    }

    const dutySelect = document.getElementById('dutyStatusSelect');
    const dutyDot = document.getElementById('dutyDot');
    if (dutySelect) {
      dutySelect.addEventListener('change', (e) => {
        const val = e.target.value;
        if (dutyDot) {
          dutyDot.className = 'status-dot';
          if (val === '10-7') dutyDot.classList.add('off-duty');
          else if (val === '10-6') dutyDot.classList.add('busy');
        }
        showToast(`Status dinas diubah ke: ${val}`);
      });
    }
  }

  /* ==========================================
     2. Sidebar Navigation Event Binding
     ========================================== */
  function initNavigation() {
    const navButtons = document.querySelectorAll('.nav-item button');
    navButtons.forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        const targetTab = btn.getAttribute('data-tab');
        if (targetTab) {
          window.switchTab(targetTab);
        }
      });
    });
  }

  /* ==========================================
     3. Subtabs in Laporan Patroli Section
     ========================================== */
  function initSubtabs() {
    const subReportsBtn = document.getElementById('subtabReportsBtn');
    const subDpoBtn = document.getElementById('subtabDpoBtn');
    const subScratchBtn = document.getElementById('subtabScratchBtn');

    const subReportsContent = document.getElementById('subtabReportsContent');
    const subDpoContent = document.getElementById('subtabDpoContent');
    const subScratchContent = document.getElementById('subtabScratchContent');

    function resetSubtabs() {
      [subReportsBtn, subDpoBtn, subScratchBtn].forEach(b => {
        if (b) b.className = 'btn btn-secondary';
      });
      [subReportsContent, subDpoContent, subScratchContent].forEach(c => {
        if (c) c.style.display = 'none';
      });
    }

    if (subReportsBtn) {
      subReportsBtn.addEventListener('click', () => {
        resetSubtabs();
        subReportsBtn.className = 'btn btn-gold';
        if (subReportsContent) subReportsContent.style.display = 'block';
      });
    }

    if (subDpoBtn) {
      subDpoBtn.addEventListener('click', () => {
        resetSubtabs();
        subDpoBtn.className = 'btn btn-gold';
        if (subDpoContent) subDpoContent.style.display = 'block';
      });
    }

    if (subScratchBtn) {
      subScratchBtn.addEventListener('click', () => {
        resetSubtabs();
        subScratchBtn.className = 'btn btn-gold';
        if (subScratchContent) subScratchContent.style.display = 'block';
      });
    }
  }

  /* ==========================================
     4. Dashboard Overview Rendering
     ========================================== */
  function renderDashboard() {
    const totalReportsEl = document.getElementById('dashTotalReports');
    const totalDpoEl = document.getElementById('dashTotalDpo');
    const totalCodesEl = document.getElementById('dashTotalCodes');

    if (totalReportsEl) totalReportsEl.textContent = reports.length;
    if (totalDpoEl) totalDpoEl.textContent = dpos.filter(d => d.status === 'Active').length;
    if (totalCodesEl) totalCodesEl.textContent = tenCodes.length;

    const recentReportsContainer = document.getElementById('dashRecentReports');
    if (recentReportsContainer) {
      if (reports.length === 0) {
        recentReportsContainer.innerHTML = '<p class="text-muted" style="padding:1rem;">Belum ada laporan dimasukkan.</p>';
      } else {
        const recent = reports.slice(0, 3);
        recentReportsContainer.innerHTML = recent.map(r => `
          <div class="report-card" style="margin-bottom:0.5rem; padding:0.85rem;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
              <strong style="color:var(--text-main); font-size:0.9rem;">${escapeHtml(r.title)}</strong>
              <span class="report-id-badge">${escapeHtml(r.id)}</span>
            </div>
            <div style="font-size:0.8rem; color:var(--text-muted); display:flex; gap:1rem; margin-top:0.3rem;">
              <span><i class="fa-solid fa-user"></i> ${escapeHtml(r.suspectName)}</span>
              <span><i class="fa-solid fa-calendar"></i> ${escapeHtml(r.date)}</span>
              <span><i class="fa-solid fa-coins" style="color:var(--color-warning);"></i> $${r.fineTotal.toLocaleString()}</span>
            </div>
          </div>
        `).join('');
      }
    }

    const activeDpoContainer = document.getElementById('dashActiveDpo');
    if (activeDpoContainer) {
      const activeDpos = dpos.filter(d => d.status === 'Active').slice(0, 3);
      if (activeDpos.length === 0) {
        activeDpoContainer.innerHTML = '<p class="text-muted" style="padding:1rem;">Tidak ada DPO aktif saat ini.</p>';
      } else {
        activeDpoContainer.innerHTML = activeDpos.map(d => `
          <div class="dpo-card priority-${d.priority}" style="margin-bottom:0.75rem;">
            <div class="dpo-header">
              <strong style="font-size:0.9rem; color:var(--text-main);">${escapeHtml(d.name)} (${escapeHtml(d.alias)})</strong>
              <span class="priority-tag priority-${d.priority}">${d.priority}</span>
            </div>
            <div class="dpo-body" style="padding:0.75rem;">
              <p><strong>Diincar Untuk:</strong> ${escapeHtml(d.wantedFor)}</p>
              <p><strong>Kendaraan:</strong> ${escapeHtml(d.vehicleInfo)}</p>
            </div>
          </div>
        `).join('');
      }
    }
  }

  /* ==========================================
     5. Ten-Codes Reference & Copy on Click
     ========================================== */
  function renderTenCodes(filterText = '', filterCat = 'All') {
    renderTenCodesListContainer(filterText);
    renderAbbrevContainer();

    const grid = document.getElementById('tenCodesGrid');
    if (!grid) return;

    let filtered = tenCodes.filter(c => {
      const matchesSearch = c.code.toLowerCase().includes(filterText.toLowerCase()) ||
                            c.title.toLowerCase().includes(filterText.toLowerCase()) ||
                            c.desc.toLowerCase().includes(filterText.toLowerCase());
      const matchesCat = filterCat === 'All' || c.category === filterCat;
      return matchesSearch && matchesCat;
    });

    if (filtered.length === 0) {
      grid.innerHTML = '<div style="grid-column: 1/-1; text-align:center; padding:3rem; color:var(--text-muted);">Kode tidak ditemukan.</div>';
      return;
    }

    grid.innerHTML = filtered.map(c => `
      <div class="code-card category-${escapeHtml(c.category)}" style="cursor:pointer;" title="Klik untuk menyalin kode ini">
        <span class="code-badge">${escapeHtml(c.code)}</span>
        <div class="code-title">${escapeHtml(c.title)}</div>
        <div class="code-desc">${escapeHtml(c.desc)}</div>
      </div>
    `).join('');

    grid.querySelectorAll('.code-card').forEach(card => {
      card.addEventListener('click', () => {
        const badge = card.querySelector('.code-badge');
        if (badge) {
          const codeText = badge.textContent.trim();
          navigator.clipboard.writeText(codeText).then(() => {
            showToast(`Kode "${codeText}" disalin ke clipboard!`);
          }).catch(() => {
            showToast(`Kode: ${codeText}`);
          });
        }
      });
    });
  }

  function renderTenCodesListContainer(filterText = '') {
    const container = document.getElementById('tenCodesListContainer');
    if (!container) return;

    const filtered = tenCodes.filter(c => 
      c.code.toLowerCase().includes(filterText.toLowerCase()) ||
      c.title.toLowerCase().includes(filterText.toLowerCase())
    );

    if (filtered.length === 0) {
      container.innerHTML = '<div style="padding:1rem; text-align:center; color:var(--text-muted);">Tidak ada kode ditemukan.</div>';
      return;
    }

    container.innerHTML = filtered.map(c => {
      let colorStyle = '';
      if (c.code === '10-13A' || c.code === '10-99') colorStyle = 'color:var(--color-danger); font-weight:700;';
      else if (c.code === '10-13B') colorStyle = 'color:var(--color-warning); font-weight:700;';

      return `
        <div class="tencodes-list-item" style="cursor:pointer;" onclick="navigator.clipboard.writeText('${escapeHtml(c.code)}'); showToast('Kode ${escapeHtml(c.code)} disalin!');">
          <span class="code-badge" style="${colorStyle}">${escapeHtml(c.code)}</span>
          <span style="${colorStyle}">${escapeHtml(c.title)}</span>
        </div>
      `;
    }).join('');
  }

  function renderAbbrevContainer(filterText = '') {
    const container = document.getElementById('abbrevContainer');
    if (!container) return;

    const abbrevs = typeof DEFAULT_ABBREVIATIONS !== 'undefined' ? DEFAULT_ABBREVIATIONS : [];
    const filtered = abbrevs.filter(a => 
      a.term.toLowerCase().includes(filterText.toLowerCase()) ||
      a.desc.toLowerCase().includes(filterText.toLowerCase())
    );

    if (filtered.length === 0) {
      container.innerHTML = '<div style="padding:1rem; text-align:center; color:var(--text-muted);">Tidak ada istilah ditemukan.</div>';
      return;
    }

    container.innerHTML = filtered.map(a => `
      <div class="abbrev-item">
        <strong>${escapeHtml(a.term)}</strong> - ${escapeHtml(a.desc)}
      </div>
    `).join('');
  }

  window.filterTenCodesList = function(query) {
    renderTenCodesListContainer(query);
  };

  window.filterAbbrevs = function(query) {
    renderAbbrevContainer(query);
  };

  window.toggleAccordion = function(headerEl) {
    const item = headerEl.closest('.accordion-item');
    if (item) {
      item.classList.toggle('active');
    }
  };

  /* ==========================================
     6. Penal Code & Ticket Calculator
     ========================================== */
  function renderPenalCodes(filterText = '', filterCat = 'All') {
    const listEl = document.getElementById('penalCodesList');
    if (!listEl) return;

    let filtered = penalCodes.filter(p => {
      const matchesSearch = p.code.toLowerCase().includes(filterText.toLowerCase()) ||
                            p.title.toLowerCase().includes(filterText.toLowerCase()) ||
                            p.desc.toLowerCase().includes(filterText.toLowerCase());
      const matchesCat = filterCat === 'All' || p.category === filterCat;
      return matchesSearch && matchesCat;
    });

    if (filtered.length === 0) {
      listEl.innerHTML = '<p class="text-muted" style="padding:2rem; text-align:center;">Pasal tidak ditemukan.</p>';
      return;
    }

    listEl.innerHTML = filtered.map(p => {
      const isChecked = selectedPenalIds.has(p.id);
      return `
        <div class="penal-item ${isChecked ? 'selected' : ''}" data-id="${p.id}">
          <input type="checkbox" class="penal-checkbox" ${isChecked ? 'checked' : ''} />
          <div class="penal-info">
            <div class="penal-code-title">
              <span><strong>${escapeHtml(p.code)}</strong> - ${escapeHtml(p.title)}</span>
            </div>
            <div style="font-size:0.8rem; color:var(--text-muted); margin-top:0.25rem;">${escapeHtml(p.desc)}</div>
            <div class="penal-meta">
              <span class="fine-tag"><i class="fa-solid fa-coins"></i> Denda: $${p.fine.toLocaleString()}</span>
              <span class="jail-tag"><i class="fa-solid fa-lock"></i> Penjara: ${p.jailMonths} Bulan</span>
            </div>
          </div>
        </div>
      `;
    }).join('');

    const items = listEl.querySelectorAll('.penal-item');
    items.forEach(item => {
      item.addEventListener('click', (e) => {
        const id = item.getAttribute('data-id');
        const checkbox = item.querySelector('.penal-checkbox');
        
        if (e.target !== checkbox) {
          checkbox.checked = !checkbox.checked;
        }

        if (checkbox.checked) {
          selectedPenalIds.add(id);
          item.classList.add('selected');
        } else {
          selectedPenalIds.delete(id);
          item.classList.remove('selected');
        }

        updatePenalCalculatorSummary();
      });
    });
  }

  function updatePenalCalculatorSummary() {
    const totalFineEl = document.getElementById('calcTotalFine');
    const totalJailEl = document.getElementById('calcTotalJail');
    const selectedChipsList = document.getElementById('selectedChargesChips');
    const discountGuilty = document.getElementById('discountGuilty');

    let totalFine = 0;
    let totalJail = 0;
    let selectedItems = [];

    penalCodes.forEach(p => {
      if (selectedPenalIds.has(p.id)) {
        totalFine += p.fine;
        totalJail += p.jailMonths;
        selectedItems.push(p);
      }
    });

    if (discountGuilty && discountGuilty.checked) {
      totalFine = Math.round(totalFine * 0.8);
      totalJail = Math.round(totalJail * 0.8);
    }

    if (totalFineEl) totalFineEl.textContent = `$${totalFine.toLocaleString()}`;
    if (totalJailEl) totalJailEl.textContent = `${totalJail} Bulan`;

    if (selectedChipsList) {
      if (selectedItems.length === 0) {
        selectedChipsList.innerHTML = '<span class="text-muted" style="font-size:0.8rem; display:block; padding:0.5rem 0;">Belum ada pasal dipilih. Centang daftar di samping.</span>';
      } else {
        selectedChipsList.innerHTML = selectedItems.map(p => `
          <div class="selected-charge-chip">
            <span><strong>${escapeHtml(p.code)}</strong> ${escapeHtml(p.title)}</span>
            <i class="fa-solid fa-xmark remove-charge-btn" data-id="${p.id}" style="cursor:pointer; margin-left:0.5rem; color:var(--color-danger);"></i>
          </div>
        `).join('');

        selectedChipsList.querySelectorAll('.remove-charge-btn').forEach(btn => {
          btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const id = btn.getAttribute('data-id');
            selectedPenalIds.delete(id);
            renderPenalCodes(penalSearchInput ? penalSearchInput.value : '', penalCategorySelect ? penalCategorySelect.value : 'All');
            updatePenalCalculatorSummary();
          });
        });
      }
    }
  }

  const penalSearchInput = document.getElementById('penalSearch');
  const penalCategorySelect = document.getElementById('penalCategory');
  const discountGuiltyCheckbox = document.getElementById('discountGuilty');

  if (penalSearchInput) {
    penalSearchInput.addEventListener('input', () => {
      renderPenalCodes(penalSearchInput.value, penalCategorySelect ? penalCategorySelect.value : 'All');
    });
  }
  if (penalCategorySelect) {
    penalCategorySelect.addEventListener('change', () => {
      renderPenalCodes(penalSearchInput ? penalSearchInput.value : '', penalCategorySelect.value);
    });
  }
  if (discountGuiltyCheckbox) {
    discountGuiltyCheckbox.addEventListener('change', () => {
      updatePenalCalculatorSummary();
    });
  }

  const copyToReportBtn = document.getElementById('copyToReportBtn');
  if (copyToReportBtn) {
    copyToReportBtn.addEventListener('click', () => {
      if (selectedPenalIds.size === 0) {
        showToast('Pilih setidaknya 1 pasal denda terlebih dahulu!');
        return;
      }

      let selectedItems = penalCodes.filter(p => selectedPenalIds.has(p.id));
      let chargesText = selectedItems.map(p => `${p.code} (${p.title})`).join(', ');

      let totalFine = 0;
      let totalJail = 0;
      selectedItems.forEach(p => {
        totalFine += p.fine;
        totalJail += p.jailMonths;
      });

      if (discountGuiltyCheckbox && discountGuiltyCheckbox.checked) {
        totalFine = Math.round(totalFine * 0.8);
        totalJail = Math.round(totalJail * 0.8);
      }

      document.getElementById('reportChargesInput').value = chargesText;
      document.getElementById('reportFineInput').value = totalFine;
      document.getElementById('reportJailInput').value = totalJail;

      openModal('reportModal');
      showToast('Data denda & hukuman disalin ke Form Laporan!');
    });
  }

  /* ==========================================
     7. Incident Reports System & Discord Exporter
     ========================================== */
  function renderReports(searchText = '') {
    const container = document.getElementById('reportsListContainer');
    if (!container) return;

    let filtered = reports.filter(r => {
      return r.id.toLowerCase().includes(searchText.toLowerCase()) ||
             r.title.toLowerCase().includes(searchText.toLowerCase()) ||
             r.suspectName.toLowerCase().includes(searchText.toLowerCase()) ||
             r.location.toLowerCase().includes(searchText.toLowerCase());
    });

    if (filtered.length === 0) {
      container.innerHTML = '<div style="text-align:center; padding:3rem; color:var(--text-muted);">Tidak ada laporan ditemukan.</div>';
      return;
    }

    container.innerHTML = filtered.map(r => `
      <div class="report-card">
        <div class="report-header">
          <div>
            <span class="report-id-badge">${escapeHtml(r.id)}</span>
            <h3 style="margin-top:0.35rem; font-size:1.1rem; color:var(--text-main);">${escapeHtml(r.title)}</h3>
          </div>
          <div style="font-size:0.8rem; color:var(--text-muted); font-family:var(--font-mono);">
            <i class="fa-solid fa-clock"></i> ${escapeHtml(r.date)} ${escapeHtml(r.time)}
          </div>
        </div>

        <div class="report-details-grid">
          <div><span>Petugas Utama</span><strong>${escapeHtml(r.primaryOfficer)}</strong></div>
          <div><span>Tersangka</span><strong>${escapeHtml(r.suspectName)}</strong></div>
          <div><span>Lokasi TKP</span><strong>${escapeHtml(r.location)}</strong></div>
          <div><span>Total Sanksi</span><strong style="color:var(--color-warning);">$${r.fineTotal.toLocaleString()} / ${r.jailTotal} Bulan</strong></div>
        </div>

        <div style="font-size:0.85rem; color:var(--text-muted);">
          <strong>Pasal Dikenakan:</strong> ${Array.isArray(r.charges) ? r.charges.map(c => `<span style="background:rgba(245,158,11,0.1); border:1px solid rgba(245,158,11,0.2); padding:0.15rem 0.4rem; border-radius:4px; margin-right:0.3rem; display:inline-block; margin-top:0.2rem; color:var(--color-gold);">${escapeHtml(c)}</span>`).join('') : escapeHtml(r.charges)}
        </div>

        <div style="font-size:0.85rem; color:var(--text-main); background:var(--bg-input); padding:0.75rem; border-radius:var(--radius-sm); border:1px solid var(--border-color);">
          <strong>Kronologi:</strong> ${escapeHtml(r.chronology)}
        </div>

        <div class="report-actions">
          <button class="btn btn-gold copy-discord-btn" data-id="${r.id}"><i class="fa-brands fa-discord"></i> Salin Format Discord</button>
          <button class="btn btn-secondary edit-report-btn" data-id="${r.id}"><i class="fa-solid fa-pen"></i> Edit</button>
          <button class="btn btn-danger delete-report-btn" data-id="${r.id}"><i class="fa-solid fa-trash"></i> Hapus</button>
        </div>
      </div>
    `).join('');

    container.querySelectorAll('.copy-discord-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        const rep = reports.find(x => x.id === id);
        if (rep) {
          const markdownText = formatReportToDiscordMarkdown(rep);
          navigator.clipboard.writeText(markdownText).then(() => {
            showToast('Laporan disalin ke clipboard dalam format Discord!');
          }).catch(() => {
            showToast('Gagal menyalin otomatis, lihat modal preview.');
          });
          openDiscordPreviewModal(markdownText);
        }
      });
    });

    container.querySelectorAll('.delete-report-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        if (confirm(`Apakah Anda yakin ingin menghapus laporan ${id}?`)) {
          reports = reports.filter(r => r.id !== id);
          StorageManager.saveReports(reports);
          renderReports(reportSearchInput ? reportSearchInput.value : '');
          renderDashboard();
          showToast('Laporan dihapus!');
        }
      });
    });

    container.querySelectorAll('.edit-report-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        const rep = reports.find(r => r.id === id);
        if (rep) {
          document.getElementById('reportFormId').value = rep.id;
          document.getElementById('reportTitleInput').value = rep.title;
          document.getElementById('reportDateInput').value = rep.date;
          document.getElementById('reportTimeInput').value = rep.time;
          document.getElementById('reportLocationInput').value = rep.location;
          document.getElementById('reportPrimaryOfficerInput').value = rep.primaryOfficer;
          document.getElementById('reportSecondaryOfficersInput').value = rep.secondaryOfficers;
          document.getElementById('reportSuspectInput').value = rep.suspectName;
          document.getElementById('reportChargesInput').value = Array.isArray(rep.charges) ? rep.charges.join(', ') : rep.charges;
          document.getElementById('reportFineInput').value = rep.fineTotal;
          document.getElementById('reportJailInput').value = rep.jailTotal;
          document.getElementById('reportEvidenceInput').value = rep.evidenceDetails;
          document.getElementById('reportChronologyInput').value = rep.chronology;

          openModal('reportModal');
        }
      });
    });
  }

  function formatReportToDiscordMarkdown(r) {
    const chargesStr = Array.isArray(r.charges) ? r.charges.join('\n- ') : r.charges;
    return "```markdown\n" +
"====================================================\n" +
"           LOS SANTOS POLICE DEPARTMENT\n" +
"             INCIDENT REPORT (#" + r.id + ")\n" +
"====================================================\n\n" +
"**[ INFORMASI UTAMA ]**\n" +
"• **Judul Kasus:** " + r.title + "\n" +
"• **Waktu / Tanggal:** " + r.date + " - " + r.time + " EST\n" +
"• **Lokasi TKP:** " + r.location + "\n\n" +
"**[ PERSONEL BERTUGAS ]**\n" +
"• **Petugas Utama:** " + r.primaryOfficer + "\n" +
"• **Unit Pendukung:** " + r.secondaryOfficers + "\n\n" +
"**[ DATA TERSANGKA ]**\n" +
"• **Nama Suspect:** " + r.suspectName + "\n\n" +
"**[ PASAL & SANKSI ]**\n" +
"- " + chargesStr + "\n" +
"• **Total Denda:** $" + r.fineTotal.toLocaleString() + "\n" +
"• **Masa Tahanan:** " + r.jailTotal + " Bulan / Menit\n\n" +
"**[ BARANG BUKTI ]**\n" +
r.evidenceDetails + "\n\n" +
"**[ KRONOLOGI KEJADIAN ]**\n" +
r.chronology + "\n\n" +
"====================================================\n" +
"    *Official LSPD Automated MDC System Log*\n" +
"```";
  }

  const reportSearchInput = document.getElementById('reportSearch');
  if (reportSearchInput) {
    reportSearchInput.addEventListener('input', () => {
      renderReports(reportSearchInput.value);
    });
  }

  const reportForm = document.getElementById('reportForm');
  if (reportForm) {
    reportForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const existingId = document.getElementById('reportFormId').value;
      const chargesRaw = document.getElementById('reportChargesInput').value;
      const chargesArr = chargesRaw.split(',').map(c => c.trim()).filter(c => c.length > 0);

      const reportData = {
        id: existingId ? existingId : `REP-${new Date().getFullYear()}-${String(reports.length + 1).padStart(3, '0')}`,
        title: document.getElementById('reportTitleInput').value,
        date: document.getElementById('reportDateInput').value || new Date().toISOString().split('T')[0],
        time: document.getElementById('reportTimeInput').value || new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'}),
        location: document.getElementById('reportLocationInput').value,
        primaryOfficer: document.getElementById('reportPrimaryOfficerInput').value,
        secondaryOfficers: document.getElementById('reportSecondaryOfficersInput').value || '-',
        suspectName: document.getElementById('reportSuspectInput').value,
        charges: chargesArr,
        fineTotal: parseInt(document.getElementById('reportFineInput').value) || 0,
        jailTotal: parseInt(document.getElementById('reportJailInput').value) || 0,
        evidenceDetails: document.getElementById('reportEvidenceInput').value,
        chronology: document.getElementById('reportChronologyInput').value
      };

      if (existingId) {
        const index = reports.findIndex(r => r.id === existingId);
        if (index !== -1) reports[index] = reportData;
      } else {
        reports.unshift(reportData);
      }

      StorageManager.saveReports(reports);
      closeModal('reportModal');
      reportForm.reset();
      document.getElementById('reportFormId').value = '';
      renderReports();
      renderDashboard();
      showToast('Laporan berhasil disimpan!');
    });
  }

  /* ==========================================
     8. DPO / Wanted Suspect Database
     ========================================== */
  function renderDpos(searchText = '') {
    const container = document.getElementById('dpoGridContainer');
    if (!container) return;

    let filtered = dpos.filter(d => {
      return d.name.toLowerCase().includes(searchText.toLowerCase()) ||
             d.alias.toLowerCase().includes(searchText.toLowerCase()) ||
             d.wantedFor.toLowerCase().includes(searchText.toLowerCase()) ||
             d.vehicleInfo.toLowerCase().includes(searchText.toLowerCase());
    });

    if (filtered.length === 0) {
      container.innerHTML = '<div style="grid-column: 1/-1; text-align:center; padding:3rem; color:var(--text-muted);">Tidak ada data DPO ditemukan.</div>';
      return;
    }

    container.innerHTML = filtered.map(d => `
      <div class="dpo-card priority-${d.priority}">
        <div class="dpo-header">
          <div>
            <strong style="font-size:1rem; color:var(--text-main); display:block;">${escapeHtml(d.name)}</strong>
            <span style="font-size:0.75rem; color:var(--text-muted); font-family:var(--font-mono);">Alias: "${escapeHtml(d.alias)}"</span>
          </div>
          <span class="priority-tag priority-${d.priority}">${d.priority}</span>
        </div>

        <div class="dpo-body">
          <p><strong>Diincar Kasus:</strong> ${escapeHtml(d.wantedFor)}</p>
          <p><strong>Terakhir Terlihat:</strong> ${escapeHtml(d.lastSeen)}</p>
          <p><strong>Kendaraan:</strong> ${escapeHtml(d.vehicleInfo)}</p>
          <p><strong>Catatan Khusus:</strong> <span style="color:var(--color-warning);">${escapeHtml(d.notes)}</span></p>
          
          <div style="display:flex; justify-content:space-between; align-items:center; margin-top:0.5rem; padding-top:0.5rem; border-top:1px solid var(--border-color);">
            <span style="font-size:0.75rem; font-family:var(--font-mono); color:${d.status === 'Active' ? 'var(--color-danger)' : 'var(--color-success)'}; font-weight:700;">
              STATUS: ${d.status.toUpperCase()}
            </span>
            <div style="display:flex; gap:0.4rem;">
              <button class="btn btn-secondary toggle-dpo-status" data-id="${d.id}" style="padding:0.3rem 0.6rem; font-size:0.75rem;">
                ${d.status === 'Active' ? 'Mark Caught' : 'Mark Active'}
              </button>
              <button class="btn btn-danger delete-dpo-btn" data-id="${d.id}" style="padding:0.3rem 0.6rem; font-size:0.75rem;"><i class="fa-solid fa-trash"></i></button>
            </div>
          </div>
        </div>
      </div>
    `).join('');

    container.querySelectorAll('.toggle-dpo-status').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        const targetObj = dpos.find(d => d.id === id);
        if (targetObj) {
          targetObj.status = targetObj.status === 'Active' ? 'Tertangkap' : 'Active';
          StorageManager.saveDpos(dpos);
          renderDpos(dpoSearchInput ? dpoSearchInput.value : '');
          renderDashboard();
          showToast(`Status DPO diubah ke ${targetObj.status}`);
        }
      });
    });

    container.querySelectorAll('.delete-dpo-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        const id = btn.getAttribute('data-id');
        if (confirm('Hapus buronan ini dari sistem?')) {
          dpos = dpos.filter(d => d.id !== id);
          StorageManager.saveDpos(dpos);
          renderDpos(dpoSearchInput ? dpoSearchInput.value : '');
          renderDashboard();
          showToast('Data DPO dihapus!');
        }
      });
    });
  }

  const dpoSearchInput = document.getElementById('dpoSearch');
  if (dpoSearchInput) {
    dpoSearchInput.addEventListener('input', () => {
      renderDpos(dpoSearchInput.value);
    });
  }

  const dpoForm = document.getElementById('dpoForm');
  if (dpoForm) {
    dpoForm.addEventListener('submit', (e) => {
      e.preventDefault();

      const newDpo = {
        id: `DPO-${Date.now().toString().slice(-4)}`,
        name: document.getElementById('dpoNameInput').value,
        alias: document.getElementById('dpoAliasInput').value || '-',
        priority: document.getElementById('dpoPrioritySelect').value,
        wantedFor: document.getElementById('dpoWantedForInput').value,
        lastSeen: document.getElementById('dpoLastSeenInput').value,
        vehicleInfo: document.getElementById('dpoVehicleInput').value || '-',
        notes: document.getElementById('dpoNotesInput').value || 'Tidak ada catatan.',
        status: 'Active',
        dateAdded: new Date().toISOString().split('T')[0]
      };

      dpos.unshift(newDpo);
      StorageManager.saveDpos(dpos);
      closeModal('dpoModal');
      dpoForm.reset();
      renderDpos();
      renderDashboard();
      showToast('Data DPO Buronan ditambahkan!');
    });
  }

  /* ==========================================
     9. Patrol Quick Notes & Scratchpad
     ========================================== */
  function initScratchpad() {
    const textarea = document.getElementById('patrolNotesTextarea');
    const saveBtn = document.getElementById('saveNotesBtn');
    const stampBtn = document.getElementById('stampTimeBtn');

    if (textarea) {
      textarea.value = StorageManager.getPatrolNotes();

      let timeout = null;
      textarea.addEventListener('input', () => {
        clearTimeout(timeout);
        timeout = setTimeout(() => {
          StorageManager.savePatrolNotes(textarea.value);
        }, 800);
      });
    }

    if (saveBtn) {
      saveBtn.addEventListener('click', () => {
        if (textarea) {
          StorageManager.savePatrolNotes(textarea.value);
          showToast('Buku catatan berhasil disimpan!');
        }
      });
    }

    if (stampBtn && textarea) {
      stampBtn.addEventListener('click', () => {
        const now = new Date();
        const stamp = `\n[${now.toLocaleDateString('id-ID')} ${now.toLocaleTimeString('id-ID', {hour12:false})}] `;
        textarea.value += stamp;
        textarea.focus();
        StorageManager.savePatrolNotes(textarea.value);
      });
    }
  }

  /* ==========================================
     9b. Auto-Generator Patrol Report (BBCode Exporter)
     ========================================== */
  function initPatrolReportGenerator() {
    const officerInput = document.getElementById('pGenOfficer');
    const stationInput = document.getElementById('pGenStation');
    const rankInput = document.getElementById('pGenRank');
    const badgeInput = document.getElementById('pGenBadge');
    const dateInput = document.getElementById('pGenDate');
    const chronologyInput = document.getElementById('pGenChronology');
    const bbcodeOutput = document.getElementById('pGenBBCodeOutput');
    const htmlPreview = document.getElementById('liveReportHtmlPreview');
    const copyBtn = document.getElementById('copyBBCodeBtn');
    const addEvidenceBtn = document.getElementById('addEvidenceRowBtn');
    const evidenceList = document.getElementById('pGenEvidenceList');
    const additionalContainer = document.getElementById('additionalReportsContainer');
    const addReportBtn = document.getElementById('pGenAddReportBtn');

    if (!officerInput || !bbcodeOutput) return;

    function getOrdinalTitle(index) {
      const ordinals = ['FIRST', 'SECOND', 'THIRD', 'FOURTH', 'FIFTH', 'SIXTH', 'SEVENTH', 'EIGHTH', 'NINTH', 'TENTH'];
      return ordinals[index] || `${index + 1}TH`;
    }

    function reindexSubReports() {
      if (!additionalContainer) return;
      const cards = additionalContainer.querySelectorAll('.sub-report-card');
      cards.forEach((card, idx) => {
        const titleText = getOrdinalTitle(idx + 1) + ' REPORT';
        const titleEl = card.querySelector('.sub-report-title');
        const chronoEl = card.querySelector('.sub-report-chrono');
        const evTitleEl = card.querySelector('.sub-ev-title');

        if (titleEl) titleEl.textContent = titleText;
        if (chronoEl) chronoEl.placeholder = `Kronologi kejadian — ${getOrdinalTitle(idx + 1)} Report (opsional)...`;
        if (evTitleEl) evTitleEl.textContent = `Evidence / Dokumentasi (${getOrdinalTitle(idx + 1)} Report)`;
      });
    }

    function renderGenerator() {
      const officer = officerInput.value.trim() || 'Answer';
      const station = stationInput.value.trim() || 'Answer';
      const rank = rankInput.value.trim() || 'Answer';
      const badge = badgeInput.value.trim() || 'Answer';
      const date = dateInput.value.trim() || '-';
      const details = chronologyInput.value.trim() || '-';

      // Gather First Report evidence
      let evidenceBbcodeList = [];
      let evidenceHtmlList = [];
      const evRows = evidenceList ? evidenceList.querySelectorAll('.p-evidence-row') : [];

      evRows.forEach(row => {
        const nameInput = row.querySelector('.p-ev-name');
        const urlInput = row.querySelector('.p-ev-url');
        const evName = nameInput ? nameInput.value.trim() : '';
        const evUrl = urlInput ? urlInput.value.trim() : '';

        if (evName || evUrl) {
          const imgContent = (evUrl.startsWith('http') && !evUrl.includes('[img]')) ? `[img]${evUrl}[/img]` : (evUrl || '-');
          evidenceBbcodeList.push(`[spoiler=${evName || 'Evidence'}]${imgContent}[/spoiler]`);
          evidenceHtmlList.push(`<div><strong>${evName || 'Evidence'}:</strong> ${evUrl || '-'}</div>`);
        }
      });

      const evidencesBbcodeStr = evidenceBbcodeList.length > 0 ? evidenceBbcodeList.join('\n') : '-';
      const evidencesHtmlStr = evidenceHtmlList.length > 0 ? evidenceHtmlList.join('') : '-';

      // Gather additional sub-reports
      let subReportsBbcodeStr = '';
      let subReportsHtmlPreviewStr = '';

      if (additionalContainer) {
        const subCards = additionalContainer.querySelectorAll('.sub-report-card');
        subCards.forEach((card, idx) => {
          const ordTitle = getOrdinalTitle(idx + 1);
          const subReportName = `${ordTitle.charAt(0) + ordTitle.slice(1).toLowerCase()} Report`;
          const subDateInput = card.querySelector('.sub-report-date');
          const subChronoInput = card.querySelector('.sub-report-chrono');

          const subDate = subDateInput ? subDateInput.value.trim() || '-' : '-';
          const subChrono = subChronoInput ? subChronoInput.value.trim() || '-' : '-';

          // Gather sub-evidence
          let subEvBbList = [];
          let subEvHtmlList = [];
          const subEvRows = card.querySelectorAll('.sub-ev-row');

          subEvRows.forEach(row => {
            const nameIn = row.querySelector('.sub-ev-name');
            const urlIn = row.querySelector('.sub-ev-url');
            const evName = nameIn ? nameIn.value.trim() : '';
            const evUrl = urlIn ? urlIn.value.trim() : '';

            if (evName || evUrl) {
              const imgContent = (evUrl.startsWith('http') && !evUrl.includes('[img]')) ? `[img]${evUrl}[/img]` : (evUrl || '-');
              subEvBbList.push(`[spoiler=${evName || 'Evidence'}]${imgContent}[/spoiler]`);
              subEvHtmlList.push(`<div><strong>${evName || 'Evidence'}:</strong> ${evUrl || '-'}</div>`);
            }
          });

          const subEvBbStr = subEvBbList.length > 0 ? subEvBbList.join('\n') : '-';
          const subEvHtmlStr = subEvHtmlList.length > 0 ? subEvHtmlList.join('') : '-';

          // BBCode block for sub-report
          subReportsBbcodeStr += `

[lspdsubtitle=#11224E][b][b]${subReportName}[/b][/b][/lspdsubtitle]

[b]Date:[/b]
[divbox=white] ${subDate} [/divbox]

[b]Details:[/b]
[divbox=white] ${subChrono} [/divbox]

[b]Evidence:[/b]
[divbox=white] 
${subEvBbStr}
[/divbox]`;

          // Live HTML Preview block for sub-report
          subReportsHtmlPreviewStr += `
            <div style="background:#11224e; color:#fff; padding:0.15rem 0.4rem; font-weight:700; font-size:0.7rem; border-radius:2px; display:inline-block; margin-top:0.6rem; margin-bottom:0.3rem;">${subReportName}</div>
            <div><strong>Date:</strong> ${subDate}</div>
            <div><strong>Details:</strong></div>
            <div style="font-style:italic; margin-bottom:0.4rem;">${subChrono}</div>
            <div><strong>Evidence:</strong></div>
            <div>${subEvHtmlStr}</div>
          `;
        });
      }

      // Build BBCode
      const bbcodeStr = `[divbox=white]
[center][img]https://i.vgy.me/IhV1jB.png[/img][/center]
[/divbox]
[divbox=darkblue]
[size=150][center][b][color=#FFFFFF]Los Santos Police Department [/color][/b][/center][/size]
[/divbox]

[divbox=white]
[center][b][size=120]PATROL REPORT[/size][/b][/center][/divbox]
[lspdsubtitle=#11224E][b]A. GENERAL INFORMATION[/b][/lspdsubtitle]
[divbox=white]
[b]Officer Name :[/b] ${officer}
[b]Station :[/b] ${station}
[b]Rank :[/b] ${rank}
[b]Badge Number :[/b] ${badge}
[/divbox]

[lspdsubtitle=#11224E][b]B. PATROL REPORT OFFICER[/b][/lspdsubtitle]
[divbox=white]
[lspdsubtitle=#11224E][b][b]First Report[/b][/b][/lspdsubtitle]

[b]Date:[/b]
[divbox=white] ${date} [/divbox]

[b]Details:[/b]
[divbox=white] ${details} [/divbox]

[b]Evidence:[/b]
[divbox=white] 
${evidencesBbcodeStr}
[/divbox]${subReportsBbcodeStr}

[/divbox]`;

      bbcodeOutput.value = bbcodeStr;

      // Update Live Preview Box
      if (htmlPreview) {
        htmlPreview.innerHTML = `
          <div style="text-align:center; margin-bottom:0.4rem;">
            <img src="img/lspd_logo.png" style="width:36px; height:36px;">
          </div>
          <div style="background:#11224e; color:#fff; text-align:center; padding:0.4rem; font-weight:800; border-radius:3px; margin-bottom:0.5rem;">LOS SANTOS POLICE DEPARTMENT</div>
          <div style="text-align:center; font-weight:800; margin-bottom:0.5rem;">PATROL REPORT</div>
          <div style="background:#11224e; color:#fff; padding:0.2rem 0.4rem; font-weight:700; font-size:0.75rem; border-radius:3px;">A. GENERAL INFORMATION</div>
          <div style="background:#f8fafc; border:1px solid #e2e8f0; padding:0.5rem; border-radius:3px; margin:0.3rem 0 0.6rem 0;">
            <div><strong>Officer Name :</strong> ${officer}</div>
            <div><strong>Station :</strong> ${station}</div>
            <div><strong>Rank :</strong> ${rank}</div>
            <div><strong>Badge Number :</strong> ${badge}</div>
          </div>
          <div style="background:#11224e; color:#fff; padding:0.2rem 0.4rem; font-weight:700; font-size:0.75rem; border-radius:3px;">B. PATROL REPORT OFFICER</div>
          <div style="background:#f8fafc; border:1px solid #e2e8f0; padding:0.5rem; border-radius:3px; margin-top:0.3rem;">
            <div style="background:#11224e; color:#fff; padding:0.15rem 0.4rem; font-weight:700; font-size:0.7rem; border-radius:2px; display:inline-block; margin-bottom:0.3rem;">First Report</div>
            <div><strong>Date:</strong> ${date}</div>
            <div><strong>Details:</strong></div>
            <div style="font-style:italic; margin-bottom:0.4rem;">${details}</div>
            <div><strong>Evidence:</strong></div>
            <div>${evidencesHtmlStr}</div>
            ${subReportsHtmlPreviewStr}
          </div>
        `;
      }

      // Update Forum Preview card on right column
      const fpOfficer = document.getElementById('fpOfficerName');
      const fpStation = document.getElementById('fpStation');
      const fpRank = document.getElementById('fpRank');
      const fpBadge = document.getElementById('fpBadge');
      const fpDate = document.getElementById('fpDate');
      const fpDetails = document.getElementById('fpDetails');
      const fpEvidences = document.getElementById('fpEvidences');
      const fpSubReportsContainer = document.getElementById('fpSubReportsContainer');

      if (fpOfficer) fpOfficer.textContent = officer !== '-' ? officer : 'Milo Hale';
      if (fpStation) fpStation.textContent = station !== '-' ? station : '71';
      if (fpRank) fpRank.textContent = rank !== '-' ? rank : 'Rookie';
      if (fpBadge) fpBadge.textContent = badge !== '-' ? badge : '71503';
      if (fpDate) fpDate.textContent = date !== '-' ? date : '25/08/2026';
      
      if (fpDetails) {
        if (details !== '-' && details.trim().length > 0) {
          fpDetails.textContent = details;
        } else {
          fpDetails.innerHTML = `On August 25, 2026, LSPD units responded to a <strong>Commercial Robbery at Little Seoul</strong> conducted a routine patrol with Sir Joni and Sir Jon. During the patrol, the officers encountered and handled a drug-related case involving a suspect who was found to be in possession of approximately 620 grams of drugs and illegal money amounting to $4,100.<br><br>The case was handled by the responding officers after the suspect was identified as being involved in the possession of illegal narcotics and proceeds suspected to be related to criminal activity. The investigation and handling of the case were conducted with the assistance of Sir Jon, who supported the responding officer throughout the process.<br><br>Following the discovery of the illegal substances and money, the suspect was taken into custody for further investigation and processing. The seized 620 grams of drugs and $4,100 in illegal funds were secured as evidence in accordance with the applicable LSPD procedures.`;
        }
      }

      // First report evidence rendering for Forum Preview
      if (fpEvidences) {
        const evRowsArr = evidenceList ? Array.from(evidenceList.querySelectorAll('.p-evidence-row')) : [];
        let evBoxesHtml = '';

        evRowsArr.forEach(row => {
          const nameIn = row.querySelector('.p-ev-name');
          const evName = nameIn ? nameIn.value.trim() : '';
          if (evName) {
            evBoxesHtml += `
              <div style="border:1px solid #d1d5db; background:#f9fafb; border-radius:3px; padding:0.35rem 0.6rem; display:flex; justify-content:space-between; align-items:center; font-size:0.78rem; color:#374151;">
                <span>${evName}</span>
                <span style="background:#ef4444; color:#ffffff; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.6rem;"><i class="fa-solid fa-eye"></i></span>
              </div>
            `;
          }
        });

        if (evBoxesHtml) {
          fpEvidences.innerHTML = evBoxesHtml;
        } else {
          fpEvidences.innerHTML = `
            <div style="border:1px solid #d1d5db; background:#f9fafb; border-radius:3px; padding:0.35rem 0.6rem; display:flex; justify-content:space-between; align-items:center; font-size:0.78rem; color:#374151;">
              <span>footage vehicle</span>
              <span style="background:#ef4444; color:#ffffff; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.6rem;"><i class="fa-solid fa-eye"></i></span>
            </div>
            <div style="border:1px solid #d1d5db; background:#f9fafb; border-radius:3px; padding:0.35rem 0.6rem; display:flex; justify-content:space-between; align-items:center; font-size:0.78rem; color:#374151;">
              <span>vehicle inventory</span>
              <span style="background:#ef4444; color:#ffffff; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.6rem;"><i class="fa-solid fa-eye"></i></span>
            </div>
            <div style="border:1px solid #d1d5db; background:#f9fafb; border-radius:3px; padding:0.35rem 0.6rem; display:flex; justify-content:space-between; align-items:center; font-size:0.78rem; color:#374151;">
              <span>suspect</span>
              <span style="background:#ef4444; color:#ffffff; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.6rem;"><i class="fa-solid fa-eye"></i></span>
            </div>
          `;
        }
      }

      // Render Sub-Reports in Forum Preview
      if (fpSubReportsContainer) {
        // Keep First Report Card
        const firstReportCard = fpSubReportsContainer.firstElementChild;
        fpSubReportsContainer.innerHTML = '';
        if (firstReportCard) fpSubReportsContainer.appendChild(firstReportCard);

        if (additionalContainer) {
          const subCards = additionalContainer.querySelectorAll('.sub-report-card');
          subCards.forEach((card, idx) => {
            const ordTitle = getOrdinalTitle(idx + 1);
            const subReportName = `${ordTitle.charAt(0) + ordTitle.slice(1).toLowerCase()} Report`;
            const subDateInput = card.querySelector('.sub-report-date');
            const subChronoInput = card.querySelector('.sub-report-chrono');

            const subDate = subDateInput ? subDateInput.value.trim() || '-' : '-';
            const subChrono = subChronoInput ? subChronoInput.value.trim() || '-' : '-';

            // Sub-evidence boxes
            let subEvBoxesHtml = '';
            const subEvRows = card.querySelectorAll('.sub-ev-row');
            subEvRows.forEach(row => {
              const nameIn = row.querySelector('.sub-ev-name');
              const evName = nameIn ? nameIn.value.trim() : '';
              if (evName) {
                subEvBoxesHtml += `
                  <div style="border:1px solid #d1d5db; background:#f9fafb; border-radius:3px; padding:0.35rem 0.6rem; display:flex; justify-content:space-between; align-items:center; font-size:0.78rem; color:#374151;">
                    <span>${evName}</span>
                    <span style="background:#ef4444; color:#ffffff; width:18px; height:18px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.6rem;"><i class="fa-solid fa-eye"></i></span>
                  </div>
                `;
              }
            });

            if (!subEvBoxesHtml) {
              subEvBoxesHtml = `<div style="font-size:0.78rem; color:#9ca3af; font-style:italic;">No evidence provided</div>`;
            }

            const subReportCardHtml = document.createElement('div');
            subReportCardHtml.style.cssText = 'border:1px solid #000000; padding:0.6rem 0.75rem; background:#ffffff; margin-top:0.4rem;';
            subReportCardHtml.innerHTML = `
              <div style="background:#000066; color:#ffffff; padding:0.25rem 0.6rem; font-weight:800; font-size:0.8rem; display:inline-block; border-radius:2px; margin-bottom:0.5rem;">
                ${subReportName}
              </div>

              <div style="font-weight:700; font-size:0.82rem; color:#000000; margin-bottom:0.25rem;">Date:</div>
              <div style="border:1px solid #000000; padding:0.3rem 0.5rem; font-size:0.8rem; color:#000000; margin-bottom:0.6rem; background:#ffffff;">
                <span>${subDate}</span>
              </div>

              <div style="font-weight:700; font-size:0.82rem; color:#000000; margin-bottom:0.25rem;">Details:</div>
              <div style="border:1px solid #000000; padding:0.6rem 0.75rem; font-size:0.78rem; color:#1e293b; line-height:1.55; margin-bottom:0.6rem; background:#ffffff;">
                ${subChrono}
              </div>

              <div style="font-weight:700; font-size:0.82rem; color:#000000; margin-bottom:0.35rem;">Evidence:</div>
              <div style="display:flex; flex-direction:column; gap:0.35rem;">
                ${subEvBoxesHtml}
              </div>
            `;

            fpSubReportsContainer.appendChild(subReportCardHtml);
          });
        }
      }

      // Dynamic Live Report Analysis Engine
      let compScore = 0;
      let missingFields = [];

      const officerVal = officerInput ? officerInput.value.trim() : '';
      const stationVal = stationInput ? stationInput.value.trim() : '';
      const rankVal = rankInput ? rankInput.value.trim() : '';
      const badgeVal = badgeInput ? badgeInput.value.trim() : '';
      const dateVal = dateInput ? dateInput.value.trim() : '';

      if (officerVal) compScore += 6; else missingFields.push('Officer Name');
      if (stationVal) compScore += 6; else missingFields.push('Station');
      if (rankVal) compScore += 6; else missingFields.push('Rank');
      if (badgeVal) compScore += 6; else missingFields.push('Badge Number');
      if (dateVal) compScore += 6; else missingFields.push('Date');

      const narrativeText = chronologyInput ? chronologyInput.value.trim() : '';
      const narrativeLen = narrativeText.length;
      let narrScore = 0;
      if (narrativeLen >= 200) narrScore = 20;
      else if (narrativeLen >= 100) narrScore = 14;
      else if (narrativeLen >= 30) narrScore = 8;
      else if (narrativeLen > 0) narrScore = 4;
      if (narrativeLen < 30) missingFields.push('Narrative (min 30 chars)');

      // Evidence Score (15%)
      const hasEvidenceLink = /https?:\/\/|imgur|postimg|streamable|youtube/i.test(narrativeText);
      let evScore = (typeof evidenceBbcodeList !== 'undefined' && evidenceBbcodeList.length > 0) || hasEvidenceLink ? 15 : 0;
      if (evScore === 0) missingFields.push('Attached Evidence / Media Link');

      // Legal Docs Score (15%)
      const legalRegex = /pasal|penal\s*code|title|\([1-7]\)\d+|miranda|warrant|felony|misdemeanor|arrest|suspect|tuntutan|denda/i;
      let legalScore = legalRegex.test(narrativeText) || (typeof selectedPenalCodes !== 'undefined' && selectedPenalCodes.length > 0) ? 15 : (narrativeLen > 50 ? 8 : 0);
      if (legalScore === 0) missingFields.push('Legal Docs / Penal Code Citations');

      // Chronology Score (10%)
      const chronoRegex = /\[\d{1,2}:\d{2}\]|\d{1,2}:\d{2}|WIB|PST|EST|am|pm|pada|sekitar|kemudian|setelah|lalu|\d+\.|\-/i;
      let chronoScore = chronoRegex.test(narrativeText) || (typeof details !== 'undefined' && details !== '-' && details.length > 30) ? 10 : (narrativeLen > 80 ? 5 : 0);

      // Formatting Score (10%)
      const formatRegex = /\[divbox|\[b\]|\[i\]|\[url\]|\[img\]|\[color\]|\n\n/i;
      let formatScore = formatRegex.test(narrativeText) || (typeof bbcodeStr !== 'undefined' && bbcodeStr.includes('[divbox=white]')) ? 10 : 5;

      const totalScore = compScore + narrScore + evScore + legalScore + chronoScore + formatScore;

      // Update Analysis UI
      const scoreCard = document.getElementById('analysisScoreCard');
      const scoreValEl = document.getElementById('scoreValueText');
      const scoreFillEl = document.getElementById('totalScoreBarFill');
      const statusLabelEl = document.getElementById('analysisStatusLabel');

      const isComplete = totalScore >= 80;
      const numColor = isComplete ? '#10b981' : '#ef4444';

      if (scoreValEl) {
        scoreValEl.innerHTML = `<span class="score-num" style="color:${numColor}; font-weight:800;">${totalScore}</span><span class="score-max" style="color:#64748b; font-weight:600;">/100</span>`;
      }
      if (scoreFillEl) scoreFillEl.style.width = `${totalScore}%`;

      if (isComplete) {
        if (scoreCard) scoreCard.classList.add('complete');
        if (scoreValEl) scoreValEl.classList.add('complete');
        if (scoreFillEl) scoreFillEl.classList.add('complete');
        if (statusLabelEl) {
          statusLabelEl.textContent = 'Complete Report';
          statusLabelEl.classList.add('complete');
        }
      } else {
        if (scoreCard) scoreCard.classList.remove('complete');
        if (scoreValEl) scoreValEl.classList.remove('complete');
        if (scoreFillEl) scoreFillEl.classList.remove('complete');
        if (statusLabelEl) {
          statusLabelEl.textContent = 'Incomplete Report';
          statusLabelEl.classList.remove('complete');
        }
      }

      // Breakdown bars
      const setBar = (fillId, valId, score, max) => {
        const fill = document.getElementById(fillId);
        const val = document.getElementById(valId);
        if (fill) fill.style.width = `${(score / max) * 100}%`;
        if (val) {
          const valColor = score > 0 ? (score === max ? '#10b981' : '#38bdf8') : '#ef4444';
          val.innerHTML = `<span style="color:${valColor}; font-weight:700;">${score}%</span><span style="color:#64748b;">/${max}%</span>`;
        }
      };

      setBar('bdCompletenessFill', 'bdCompletenessVal', compScore, 30);
      setBar('bdNarrativeFill', 'bdNarrativeVal', narrScore, 20);
      setBar('bdEvidenceFill', 'bdEvidenceVal', evScore, 15);
      setBar('bdLegalFill', 'bdLegalVal', legalScore, 15);
      setBar('bdChronoFill', 'bdChronoVal', chronoScore, 10);
      setBar('bdFormatFill', 'bdFormatVal', formatScore, 10);

      // Missing Information UI
      const missingInfoEl = document.getElementById('missingInfoContent');
      if (missingInfoEl) {
        if (missingFields.length > 0) {
          missingInfoEl.innerHTML = `<i class="fa-solid fa-triangle-exclamation" style="color:var(--color-gold);"></i> <span>${missingFields.join(', ')}</span>`;
          missingInfoEl.style.color = 'var(--color-gold)';
        } else {
          missingInfoEl.innerHTML = `<i class="fa-solid fa-circle-check" style="color:#34d399;"></i> <span style="color:#34d399;">All required fields & legal standards satisfied</span>`;
        }
      }

      // Recognized Entities UI
      const recognizedEl = document.getElementById('recognizedEntitiesContent');
      if (recognizedEl) {
        let entities = [];
        if (officerVal) entities.push(`Officer: ${officerVal}`);
        if (badgeVal) entities.push(`Badge: #${badgeVal}`);
        if (stationVal) entities.push(`Station: ${stationVal}`);
        if (dateVal) entities.push(`Date: ${dateVal}`);

        const foundPasal = narrativeText.match(/\([1-7]\)\d+\b/g);
        if (foundPasal) {
          [...new Set(foundPasal)].slice(0, 3).forEach(p => entities.push(`Pasal: ${p}`));
        }

        if (entities.length > 0) {
          recognizedEl.innerHTML = entities.map(e => `<span style="display:inline-block; background:rgba(245,158,11,0.15); color:var(--color-gold); font-size:0.75rem; padding:0.15rem 0.5rem; border-radius:4px; margin:0.15rem; font-weight:600;">${e}</span>`).join(' ');
          recognizedEl.style.fontStyle = 'normal';
        } else {
          recognizedEl.textContent = 'Start writing to detect entities...';
          recognizedEl.style.fontStyle = 'italic';
        }
      }
    }

    // Toggle Breakdown Button Listener
    const toggleBreakdownBtn = document.getElementById('toggleBreakdownBtn');
    const breakdownList = document.getElementById('analysisBreakdownList');
    if (toggleBreakdownBtn && breakdownList) {
      toggleBreakdownBtn.addEventListener('click', () => {
        const isCollapsed = breakdownList.classList.toggle('collapsed');
        const icon = toggleBreakdownBtn.querySelector('i');
        if (icon) {
          icon.className = isCollapsed ? 'fa-solid fa-chevron-up' : 'fa-solid fa-chevron-down';
        }
      });
    }

    // Toggle Forum Preview Button Listener
    const toggleForumPreviewBtn = document.getElementById('toggleForumPreviewBtn');
    const forumPaperContent = document.getElementById('forumPreviewPaperContent');
    if (toggleForumPreviewBtn && forumPaperContent) {
      toggleForumPreviewBtn.addEventListener('click', () => {
        const isCollapsed = forumPaperContent.style.display === 'none';
        if (isCollapsed) {
          forumPaperContent.style.display = 'block';
          const icon = toggleForumPreviewBtn.querySelector('i');
          if (icon) icon.className = 'fa-solid fa-chevron-up';
        } else {
          forumPaperContent.style.display = 'none';
          const icon = toggleForumPreviewBtn.querySelector('i');
          if (icon) icon.className = 'fa-solid fa-chevron-down';
        }
      });
    }

    // Add Sub-Report Button (+ Tambah Report)
    if (addReportBtn && additionalContainer) {
      addReportBtn.addEventListener('click', () => {
        const currentCount = additionalContainer.querySelectorAll('.sub-report-card').length;
        const ordTitle = getOrdinalTitle(currentCount + 1);

        const card = document.createElement('div');
        card.className = 'sub-report-card';
        card.style.cssText = 'background: rgba(15, 23, 42, 0.6); border: 1px solid var(--border-color); border-radius: 8px; padding: 1rem; margin-top: 1.15rem; position: relative;';
        card.innerHTML = `
          <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.85rem; padding-bottom:0.5rem; border-bottom:1px solid rgba(255,255,255,0.06);">
            <div style="font-size:0.85rem; font-weight:800; color:var(--color-gold); display:flex; align-items:center; gap:0.4rem;">
              <i class="fa-solid fa-bookmark"></i> <span class="sub-report-title">${ordTitle} REPORT</span>
            </div>
            <button type="button" class="btn-remove-sub-report" style="background:rgba(239,68,68,0.15); color:#ef4444; border:1px solid rgba(239,68,68,0.3); font-size:0.72rem; padding:0.2rem 0.55rem; border-radius:4px; cursor:pointer; font-weight:700;">
              <i class="fa-solid fa-xmark"></i> Hapus
            </button>
          </div>

          <div class="form-group" style="margin-bottom:0.85rem;">
            <input type="text" class="search-box sub-report-date" placeholder="dd/mm/yyyy" style="padding:0.65rem 0.85rem; width:100%; font-size:0.85rem;">
          </div>

          <div class="form-group" style="margin-bottom:1rem;">
            <textarea class="search-box sub-report-chrono" rows="4" style="padding:0.75rem; width:100%; font-size:0.83rem; line-height:1.5;" placeholder="Kronologi kejadian — ${ordTitle} Report (opsional)..."></textarea>
          </div>

          <div style="border-top:1px solid rgba(255,255,255,0.06); padding-top:0.85rem; margin-top:0.85rem;">
            <div class="sub-ev-title" style="font-size:0.85rem; font-weight:700; color:var(--color-gold); margin-bottom:0.5rem; display:flex; align-items:center; gap:0.4rem;">
              <i class="fa-solid fa-camera"></i> Evidence / Dokumentasi (${ordTitle} Report)
            </div>

            <div class="sub-report-ev-list">
              <div class="form-row sub-ev-row" style="margin-bottom:0.65rem; display:flex; gap:0.85rem;">
                <div class="form-group" style="flex:1; margin-bottom:0;">
                  <input type="text" class="sub-ev-name search-box" style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="Cth: Crime Scene">
                </div>
                <div class="form-group" style="flex:1; margin-bottom:0;">
                  <input type="text" class="sub-ev-url search-box" style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="https://example.com/img.jpg">
                </div>
              </div>
            </div>

            <button type="button" class="btn btn-secondary btn-add-sub-ev" style="font-size:0.78rem; padding:0.45rem 0.75rem; width:100%; margin-top:0.5rem; border-radius:6px; cursor:pointer;">
              <i class="fa-solid fa-plus"></i> Tambah Kolom Bukti
            </button>
          </div>
        `;

        additionalContainer.appendChild(card);

        // Attach listeners to new sub-report inputs
        card.querySelectorAll('input, textarea').forEach(inEl => {
          inEl.addEventListener('input', renderGenerator);
        });

        // Add sub-evidence row button listener
        const addSubEvBtn = card.querySelector('.btn-add-sub-ev');
        const subEvList = card.querySelector('.sub-report-ev-list');
        if (addSubEvBtn && subEvList) {
          addSubEvBtn.addEventListener('click', () => {
            const newEvRow = document.createElement('div');
            newEvRow.className = 'form-row sub-ev-row';
            newEvRow.style.cssText = 'margin-bottom:0.65rem; display:flex; gap:0.85rem;';
            newEvRow.innerHTML = `
              <div class="form-group" style="flex:1; margin-bottom:0;">
                <input type="text" class="sub-ev-name search-box" style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="Cth: Evidence">
              </div>
              <div class="form-group" style="flex:1; margin-bottom:0;">
                <input type="text" class="sub-ev-url search-box" style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="https://example.com/img.jpg">
              </div>
            `;
            subEvList.appendChild(newEvRow);
            newEvRow.querySelectorAll('input').forEach(i => i.addEventListener('input', renderGenerator));
            renderGenerator();
          });
        }

        // Remove sub-report button listener
        const removeBtn = card.querySelector('.btn-remove-sub-report');
        if (removeBtn) {
          removeBtn.addEventListener('click', () => {
            card.remove();
            reindexSubReports();
            renderGenerator();
            showToast('Report tambahan dihapus.');
          });
        }

        renderGenerator();
        showToast(`${ordTitle} REPORT berhasil ditambahkan!`);
      });
    }

    // Attach listeners to initial First Report form
    [officerInput, stationInput, rankInput, badgeInput, dateInput, chronologyInput].forEach(el => {
      if (el) el.addEventListener('input', renderGenerator);
    });

    if (evidenceList) {
      evidenceList.addEventListener('input', renderGenerator);
    }

    if (addEvidenceBtn && evidenceList) {
      addEvidenceBtn.addEventListener('click', () => {
        const newRow = document.createElement('div');
        newRow.className = 'form-row p-evidence-row';
        newRow.style.cssText = 'margin-bottom:0.65rem; display:flex; gap:0.85rem;';
        newRow.innerHTML = `
          <div class="form-group" style="flex:1; margin-bottom:0;">
            <input type="text" class="p-ev-name search-box" style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="EVIDENCE NAME">
          </div>
          <div class="form-group" style="flex:1; margin-bottom:0;">
            <input type="text" class="p-ev-url search-box" style="padding:0.6rem 0.75rem; font-size:0.82rem; width:100%;" placeholder="IMAGE URL">
          </div>
        `;
        evidenceList.appendChild(newRow);
        newRow.querySelectorAll('input').forEach(i => i.addEventListener('input', renderGenerator));
        renderGenerator();
      });
    }

    if (copyBtn) {
      copyBtn.addEventListener('click', () => {
        navigator.clipboard.writeText(bbcodeOutput.value).then(() => {
          showToast('BBCode Patrol Report berhasil disalin!');
        });
      });
    }

    // Initial render
    renderGenerator();
  }

  /* ==========================================
     10. Universal Event Listeners & Modals Binding
     ========================================== */
  function setupEventListeners() {
    const copyMirandaBtn = document.getElementById('copyMirandaBtn');
    const mirandaTextEl = document.getElementById('mirandaText');
    if (copyMirandaBtn && mirandaTextEl) {
      copyMirandaBtn.addEventListener('click', () => {
        const text = mirandaTextEl.textContent.trim();
        navigator.clipboard.writeText(text).then(() => {
          showToast('Teks Miranda Warning disalin ke clipboard!');
        });
      });
    }

    document.querySelectorAll('.open-report-modal-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.getElementById('reportForm').reset();
        document.getElementById('reportFormId').value = '';
        const todayStr = new Date().toISOString().split('T')[0];
        const timeStr = new Date().toLocaleTimeString('id-ID', {hour:'2-digit', minute:'2-digit'});
        document.getElementById('reportDateInput').value = todayStr;
        document.getElementById('reportTimeInput').value = timeStr;
        openModal('reportModal');
      });
    });

    document.querySelectorAll('.open-dpo-modal-btn').forEach(btn => {
      btn.addEventListener('click', () => {
        document.getElementById('dpoForm').reset();
        openModal('dpoModal');
      });
    });

    document.querySelectorAll('.close-modal-btn, .cancel-modal-btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const modal = e.target.closest('.modal-overlay');
        if (modal) closeModal(modal.id);
      });
    });

    const resetDataBtn = document.getElementById('resetDataBtn');
    if (resetDataBtn) {
      resetDataBtn.addEventListener('click', () => {
        if (confirm('Apakah Anda yakin ingin mengembalikan seluruh data ke default awal LSPD? Data buatan Anda akan terhapus.')) {
          StorageManager.resetAllToDefault();
          tenCodes = StorageManager.getTenCodes();
          penalCodes = StorageManager.getPenalCodes();
          reports = StorageManager.getReports();
          dpos = StorageManager.getDpos();

          selectedPenalIds.clear();
          renderDashboard();
          renderTenCodes();
          renderPenalCodes();
          renderReports();
          renderDpos();
          renderChainOfCommand();
          initScratchpad();
          showToast('Seluruh data berhasil di-reset ke default LSPD!');
        }
      });
    }
  }

  function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.add('active');
  }

  function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) modal.classList.remove('active');
  }

  function openDiscordPreviewModal(text) {
    const previewBox = document.getElementById('discordMarkdownPreviewBox');
    if (previewBox) previewBox.textContent = text;
    openModal('discordPreviewModal');
  }

  function showToast(message) {
    let container = document.getElementById('toastContainer');
    if (!container) {
      container = document.createElement('div');
      container.id = 'toastContainer';
      container.className = 'toast-container';
      document.body.appendChild(container);
    }

    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerHTML = `<i class="fa-solid fa-shield-halved" style="color:var(--color-gold);"></i> <span>${escapeHtml(message)}</span>`;
    container.appendChild(toast);

    setTimeout(() => {
      toast.style.opacity = '0';
      toast.style.transform = 'translateX(100%)';
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  }

  // Render Chain of Command on initial DOMReady
  if (typeof window.renderChainOfCommand === 'function') {
    window.renderChainOfCommand();
  }
});


/* ==========================================================================
   PENAL CODE CARDS REALTIME FILTER & SEARCH ENGINE
   ========================================================================== */
let currentPenalCardCategory = 'ALL';

window.filterPenalCards = function(category, btnEl) {
  currentPenalCardCategory = category;

  if (btnEl && btnEl.parentElement) {
    btnEl.parentElement.querySelectorAll('button').forEach(b => b.classList.remove('active'));
    btnEl.classList.add('active');
  }

  const searchInput = document.getElementById('penalCardSearchInput');
  const query = searchInput ? searchInput.value : '';

  window.applyPenalCardsFilter(query, category);
};

window.searchPenalCards = function(query) {
  window.applyPenalCardsFilter(query, currentPenalCardCategory);
};

window.applyPenalCardsFilter = function(query, category) {
  const cards = document.querySelectorAll('#penalRefCardsGrid .penal-ref-card');
  let visibleCount = 0;

  const rawQuery = (query || '').toLowerCase().trim();
  const queryWords = rawQuery ? rawQuery.split(/\s+/).filter(w => w.length > 0) : [];

  cards.forEach(card => {
    const cardCategory = card.getAttribute('data-category') || '';
    const cardText = card.getAttribute('data-text') || '';
    const cardCode = card.getAttribute('data-code') || '';
    const innerText = card.innerText || card.textContent || '';
    const fullHaystack = (cardCategory + ' ' + cardText + ' ' + cardCode + ' ' + innerText).toLowerCase();

    const matchesCategory = (category === 'ALL' || cardCategory === category);
    const matchesQuery = queryWords.length === 0 || queryWords.every(word => fullHaystack.includes(word));

    if (matchesCategory && matchesQuery) {
      card.style.display = 'flex';
      visibleCount++;
    } else {
      card.style.display = 'none';
    }
  });

  const grid = document.getElementById('penalRefCardsGrid');
  if (grid) {
    let noResultMsg = document.getElementById('penalCardsNoResult');
    if (visibleCount === 0) {
      if (!noResultMsg) {
        noResultMsg = document.createElement('div');
        noResultMsg.id = 'penalCardsNoResult';
        noResultMsg.style.cssText = 'grid-column:1/-1; text-align:center; padding:2.5rem 1rem; color:var(--text-muted); background:rgba(15,23,42,0.6); border:1px solid var(--border-color); border-radius:var(--radius-sm);';
        noResultMsg.innerHTML = '<i class="fa-solid fa-scale-unbalanced" style="font-size:2rem; color:var(--color-warning); margin-bottom:0.5rem; display:block;"></i><h4 style="color:#ffffff;">Pasal Tidak Ditemukan</h4><p style="font-size:0.82rem;">Coba ubah kata kunci atau pilih kategori pasal lainnya.</p>';
        grid.appendChild(noResultMsg);
      } else {
        noResultMsg.style.display = 'block';
      }
    } else if (noResultMsg) {
      noResultMsg.style.display = 'none';
    }
  }
};

// Auto-bind input listeners on DOM ready
document.addEventListener('DOMContentLoaded', () => {
  const cardSearchInput = document.getElementById('penalCardSearchInput');
  if (cardSearchInput) {
    ['input', 'keyup', 'change', 'search'].forEach(evt => {
      cardSearchInput.addEventListener(evt, () => {
        window.searchPenalCards(cardSearchInput.value);
      });
    });
  }
});

/* ==========================================================================
   SMART PENAL CODE & AI PROMPT CALCULATOR ENGINE (241 PASAL DYNAMIC SCANNER)
   ========================================================================== */

window.ALL_241_PENAL_CODES = [];
window.manualSelectedCharges = new Set();
window.aiDetectedCharges = new Set();

function escapeRegex(str) {
  return str.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
}

window.init241PenalCodesCatalog = function() {
  const cards = document.querySelectorAll('#penalRefCardsGrid .penal-ref-card');
  const catalog = [];
  
  cards.forEach((card, index) => {
    const rawCode = card.getAttribute('data-code') || '';
    const rawCategory = card.getAttribute('data-category') || '';
    const rawText = card.getAttribute('data-text') || '';
    
    const codeEl = card.querySelector('.penal-ref-code');
    const bodyEl = card.querySelector('.penal-ref-body');
    const fineEl = card.querySelector('.penal-fine strong');
    const sentenceEl = card.querySelector('.penal-sentence strong');
    
    const fullCodeTitle = codeEl ? codeEl.innerText.trim() : rawCode.toUpperCase();
    const description = bodyEl ? bodyEl.innerText.trim() : rawText;
    const fineText = fineEl ? fineEl.innerText.trim() : '$0';
    const sentenceText = sentenceEl ? sentenceEl.innerText.trim() : '0 Bulan';
    
    let fineAmount = 0;
    let isFineCourtVerdict = false;
    if (fineText.toUpperCase().includes('COURT VERDICT')) {
      isFineCourtVerdict = true;
    } else {
      fineAmount = parseInt(fineText.replace(/[^0-9]/g, '')) || 0;
    }
    
    let sentenceMonths = 0;
    let isSentenceCourtVerdict = false;
    if (sentenceText.toUpperCase().includes('COURT VERDICT')) {
      isSentenceCourtVerdict = true;
    } else {
      sentenceMonths = parseInt(sentenceText.replace(/[^0-9]/g, '')) || 0;
    }
    
    const isCourtVerdict = isFineCourtVerdict || isSentenceCourtVerdict;
    
    let codeNumber = fullCodeTitle.split('.')[0].trim();
    if (!codeNumber || codeNumber.length > 12) {
      codeNumber = rawCode.split('.')[0].trim();
    }
    
    catalog.push({
      id: 'PC-241-' + index,
      codeNumber: codeNumber,
      fullTitle: fullCodeTitle,
      category: rawCategory,
      description: description,
      fine: fineAmount,
      sentenceMonths: sentenceMonths,
      isCourtVerdict: isCourtVerdict,
      searchHaystack: (fullCodeTitle + ' ' + description + ' ' + rawCategory + ' ' + rawText).toLowerCase()
    });
  });
  
  if (catalog.length === 0 && typeof DEFAULT_PENAL_CODES !== 'undefined') {
    DEFAULT_PENAL_CODES.forEach((item, index) => {
      catalog.push({
        id: item.id || ('PC-DEF-' + index),
        codeNumber: item.code || '',
        fullTitle: (item.code + '. ' + item.title).toUpperCase(),
        category: item.category || 'LAINNYA',
        description: item.desc || '',
        fine: item.fine || 0,
        sentenceMonths: item.jailMonths || 0,
        isCourtVerdict: item.isCourtVerdict || false,
        searchHaystack: ((item.code || '') + ' ' + (item.title || '') + ' ' + (item.desc || '')).toLowerCase()
      });
    });
  }

  window.ALL_241_PENAL_CODES = catalog;
  window.renderCalcPenalSelectorGrid();
};

window.renderCalcPenalSelectorGrid = function(filterQuery = '') {
  const container = document.getElementById('calcPenalSelectorGrid');
  if (!container) return;
  
  const queryWords = filterQuery.toLowerCase().trim().split(/\s+/).filter(Boolean);
  container.innerHTML = '';
  
  let matchesCount = 0;
  window.ALL_241_PENAL_CODES.forEach(pc => {
    const isMatched = queryWords.length === 0 || queryWords.every(w => pc.searchHaystack.includes(w));
    if (!isMatched) return;
    
    matchesCount++;
    const isSelected = window.manualSelectedCharges.has(pc.id);
    
    const cardEl = document.createElement('div');
    cardEl.className = `calc-selector-item ${isSelected ? 'selected' : ''}`;
    cardEl.style.cssText = `
      padding: 0.6rem 0.75rem;
      background: ${isSelected ? 'rgba(59,130,246,0.25)' : 'rgba(15,23,42,0.7)'};
      border: 1px solid ${isSelected ? '#3b82f6' : 'rgba(255,255,255,0.1)'};
      border-radius: 6px;
      cursor: pointer;
      transition: all 0.2s ease;
      display: flex;
      flex-direction: column;
      gap: 0.25rem;
    `;
    
    const fineDisplay = pc.isCourtVerdict ? 'CV' : `$${pc.fine.toLocaleString()}`;
    const sentenceDisplay = pc.isCourtVerdict ? 'CV' : `${pc.sentenceMonths}B`;
    
    cardEl.innerHTML = `
      <div style="display:flex; justify-content:space-between; align-items:center; gap:0.5rem;">
        <span style="font-weight:700; font-size:0.8rem; color:${isSelected ? '#60a5fa' : '#f8fafc'}; line-height:1.2;">
          ${pc.fullTitle}
        </span>
        <span class="badge ${pc.isCourtVerdict ? 'badge-danger' : 'badge-info'}" style="font-size:0.7rem; padding:0.15rem 0.4rem; white-space:nowrap;">
          ${fineDisplay} | ${sentenceDisplay}
        </span>
      </div>
      <span style="font-size:0.72rem; color:var(--text-muted); display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;">
        ${pc.description}
      </span>
    `;
    
    cardEl.onclick = () => {
      if (window.manualSelectedCharges.has(pc.id)) {
        window.manualSelectedCharges.delete(pc.id);
      } else {
        window.manualSelectedCharges.add(pc.id);
      }
      window.renderCalcPenalSelectorGrid(filterQuery);
      window.calculateSmartPenal();
    };
    
    container.appendChild(cardEl);
  });

  if (matchesCount === 0) {
    container.innerHTML = `<div style="grid-column:1/-1; text-align:center; padding:1.5rem; color:var(--text-muted); font-size:0.85rem;">Tidak ada pasal yang cocok dengan "${filterQuery}".</div>`;
  }
};

window.filterCalcPenalSelector = function(val) {
  window.renderCalcPenalSelectorGrid(val);
};

window.processAiPenalPrompt = function() {
  const promptEl = document.getElementById('aiPenalPrompt');
  if (!promptEl) return;
  
  const text = promptEl.value.toLowerCase().trim();
  window.aiDetectedCharges.clear();

  if (!text) {
    const badgeEl = document.getElementById('aiDetectedCountBadge');
    if (badgeEl) badgeEl.textContent = '0 Pasal Terdeteksi';
    window.calculateSmartPenal();
    return;
  }

  // Dictionary of Indonesian <-> English RP synonyms & concepts
  const SYNONYM_MAP = {
    'penembakan': ['shooting', 'murder', 'discharge', 'assault', 'pembunuhan', 'menembak', 'tembak'],
    'nembak': ['shooting', 'murder', 'discharge', 'assault', 'pembunuhan', 'menembak', 'tembak'],
    'tembak': ['shooting', 'murder', 'discharge', 'assault', 'pembunuhan', 'menembak', 'tembak'],
    'menembak': ['shooting', 'murder', 'discharge', 'assault', 'pembunuhan', 'tembak'],
    'shooting': ['shooting', 'murder', 'discharge', 'assault', 'pembunuhan', 'menembak'],

    'officer': ['officer', 'government', 'employee', 'petugas', 'polisi', 'law enforcement', 'leo'],
    'polisi': ['officer', 'government', 'employee', 'petugas', 'polisi', 'law enforcement', 'leo'],
    'petugas': ['officer', 'government', 'employee', 'petugas', 'polisi', 'law enforcement', 'leo'],
    'cop': ['officer', 'government', 'employee', 'petugas', 'polisi', 'law enforcement'],
    'leo': ['officer', 'government', 'employee', 'petugas', 'polisi', 'law enforcement'],

    'rampok': ['robbery', 'rob', 'burglary', 'laundromat', 'bank', 'perampokan', 'begal'],
    'perampokan': ['robbery', 'rob', 'burglary', 'laundromat', 'bank', 'begal'],
    'robbery': ['robbery', 'rob', 'burglary', 'laundromat', 'bank', 'perampokan'],
    'rob': ['robbery', 'rob', 'burglary', 'laundromat', 'bank', 'perampokan'],

    'suap': ['bribe', 'bribery', 'suap', 'penyuapan'],
    'penyuapan': ['bribe', 'bribery', 'suap', 'penyuapan'],
    'bribe': ['bribe', 'bribery', 'suap', 'penyuapan'],
    'bribery': ['bribe', 'bribery', 'suap', 'penyuapan'],

    'sandera': ['hostage', 'hostages', 'kidnapping', 'abduction', 'penyanderaan', 'culik'],
    'hostage': ['hostage', 'hostages', 'kidnapping', 'abduction', 'penyanderaan', 'sandera'],
    'penculikan': ['hostage', 'hostages', 'kidnapping', 'abduction', 'penyanderaan', 'culik'],

    'kabur': ['evading', 'pursuit', 'fleeing', 'pengejaran', 'eluding'],
    'evading': ['evading', 'pursuit', 'fleeing', 'pengejaran', 'eluding'],
    'pengejaran': ['evading', 'pursuit', 'fleeing', 'kabur', 'eluding'],

    'ugal': ['reckless', 'speeding', 'ngebut', 'urakan'],
    'reckless': ['reckless', 'speeding', 'ngebut', 'urakan'],
    'speeding': ['reckless', 'speeding', 'ngebut', 'urakan'],

    'rusak': ['destruction', 'vandalism', 'damage', 'merusak', 'pengrusakan', 'perusakan'],
    'pengrusakan': ['destruction', 'vandalism', 'damage', 'merusak', 'perusakan'],
    'vandalism': ['destruction', 'vandalism', 'damage', 'merusak', 'pengrusakan'],

    'maling': ['theft', 'stealing', 'stolen', 'pencurian', 'mencuri', 'gta'],
    'curi': ['theft', 'stealing', 'stolen', 'pencurian', 'mencuri', 'gta'],
    'pencurian': ['theft', 'stealing', 'stolen', 'mencuri', 'maling', 'gta']
  };

  const rawWords = text.split(/[\s,.-]+/).filter(w => w.length > 1);

  const expandedSearchTerms = new Set();
  rawWords.forEach(w => {
    expandedSearchTerms.add(w);
    if (SYNONYM_MAP[w]) {
      SYNONYM_MAP[w].forEach(syn => expandedSearchTerms.add(syn));
    }
  });

  window.ALL_241_PENAL_CODES.forEach(pc => {
    if (pc.codeNumber) {
      const cleanNum = pc.codeNumber.replace(/[()]/g, '');
      const numRegex = new RegExp('(?:pasal\\s*)?(?:\\(' + escapeRegex(cleanNum) + '\\)|\\b' + escapeRegex(cleanNum) + '\\b)', 'i');
      if (numRegex.test(text)) {
        window.aiDetectedCharges.add(pc.id);
        return;
      }
    }

    const cleanTitle = pc.fullTitle.replace(/^\([^)]+\)\s*\d*\.?\s*/, '').toLowerCase();
    if (cleanTitle.length > 4 && text.includes(cleanTitle)) {
      window.aiDetectedCharges.add(pc.id);
      return;
    }

    const isShootingPrompt = rawWords.some(w => ['penembakan', 'nembak', 'tembak', 'menembak', 'shooting', 'gsw'].includes(w));
    const isOfficerPrompt = rawWords.some(w => ['officer', 'polisi', 'petugas', 'leo', 'cop', 'aparat'].includes(w));

    if (isShootingPrompt && isOfficerPrompt) {
      if (pc.searchHaystack.includes('government employee') || pc.searchHaystack.includes('law enforcement') || pc.searchHaystack.includes('officer') || pc.searchHaystack.includes('petugas pemerintah')) {
        if (pc.searchHaystack.includes('murder') || pc.searchHaystack.includes('pembunuhan') || pc.searchHaystack.includes('discharge') || pc.searchHaystack.includes('assault')) {
          window.aiDetectedCharges.add(pc.id);
          return;
        }
      }
    }

    let matchScore = 0;
    expandedSearchTerms.forEach(term => {
      if (term.length > 3 && pc.searchHaystack.includes(term)) {
        matchScore++;
      }
    });

    if (matchScore >= 2) {
      window.aiDetectedCharges.add(pc.id);
    }
  });

  const keywordMap = [
    { keywords: ['vest', 'rompi', 'heavy armor', 'armor'], fieldId: 'calcVestQty', defaultQty: 1 },
    { keywords: ['carbine', 'ak47', 'rifle', 'assault rifle', 'senjata berat'], fieldId: 'calcClass3Qty', defaultQty: 1 },
    { keywords: ['smg', 'micro smg', 'shotgun'], fieldId: 'calcClass2Qty', defaultQty: 1 },
    { keywords: ['pistol', 'handgun', 'revolver'], fieldId: 'calcClass1Qty', defaultQty: 1 },
    { keywords: ['evading', 'kabur', 'pengejaran', 'pursuit', 'ngebut'], fieldId: 'calcEvadingType', defaultValue: 'vehicle' },
    { keywords: ['sandera', 'hostage', 'penculikan'], fieldId: 'calcHostagesQty', defaultQty: 1 }
  ];

  keywordMap.forEach(item => {
    if (item.keywords.some(k => text.includes(k))) {
      const el = document.getElementById(item.fieldId);
      if (el) {
        if (item.defaultValue && (!el.value || el.value === 'none')) {
          el.value = item.defaultValue;
        } else if (item.defaultQty && (!el.value || parseInt(el.value) === 0)) {
          const match = text.match(new RegExp('(\\d+)\\s*(?:' + item.keywords.join('|') + ')', 'i'));
          el.value = match ? parseInt(match[1]) : item.defaultQty;
        }
      }
    }
  });

  const drugParsers = [
    { keywords: ['weed', 'ganja'], fieldId: 'calcWeedQty' },
    { keywords: ['meth', 'sabu'], fieldId: 'calcMethQty' },
    { keywords: ['cocaine', 'kokain'], fieldId: 'calcCocaineQty' },
    { keywords: ['opium'], fieldId: 'calcOpiumQty' }
  ];

  drugParsers.forEach(dp => {
    dp.keywords.forEach(kw => {
      const regex = new RegExp('(\\d+)(?:g|gram|kg)?\\s*' + kw + '|' + kw + '\\s*(\\d+)(?:g|gram|kg)?', 'i');
      const m = text.match(regex);
      if (m) {
        const qty = parseInt(m[1] || m[2] || '0');
        if (qty > 0) {
          const el = document.getElementById(dp.fieldId);
          if (el && (!el.value || parseInt(el.value) === 0)) {
            el.value = qty;
          }
        }
      }
    });
  });

  const badgeEl = document.getElementById('aiDetectedCountBadge');
  if (badgeEl) badgeEl.textContent = `${window.aiDetectedCharges.size} Pasal Terdeteksi`;

  window.calculateSmartPenal();
};

window.clearAiPenalPrompt = function() {
  const promptEl = document.getElementById('aiPenalPrompt');
  if (promptEl) promptEl.value = '';
  window.aiDetectedCharges.clear();
  const badgeEl = document.getElementById('aiDetectedCountBadge');
  if (badgeEl) badgeEl.textContent = '0 Pasal Terdeteksi';
  window.calculateSmartPenal();
};

window.calculateSmartPenal = function() {
  let totalFine = 0;
  let totalMonths = 0;
  let isCourtVerdictRequired = false;
  
  const activeChargesList = [];
  const processedIds = new Set();

  const findRealPenalCode = function(keywordOrFunc) {
    if (!window.ALL_241_PENAL_CODES || window.ALL_241_PENAL_CODES.length === 0) return null;
    return window.ALL_241_PENAL_CODES.find(pc => {
      const haystack = (pc.codeNumber + ' ' + pc.fullTitle + ' ' + pc.description).toLowerCase();
      if (typeof keywordOrFunc === 'string') {
        return haystack.includes(keywordOrFunc.toLowerCase());
      } else if (typeof keywordOrFunc === 'function') {
        return keywordOrFunc(pc, haystack);
      }
      return false;
    }) || null;
  };

  const combinedIds = new Set([...window.manualSelectedCharges, ...window.aiDetectedCharges]);
  combinedIds.forEach(id => {
    const pc = window.ALL_241_PENAL_CODES.find(item => item.id === id);
    if (pc && !processedIds.has(pc.id)) {
      activeChargesList.push(pc);
      processedIds.add(pc.id);
    }
  });

  const vestQty = parseInt(document.getElementById('calcVestQty')?.value) || 0;
  const class1Qty = parseInt(document.getElementById('calcClass1Qty')?.value) || 0;
  const class2Qty = parseInt(document.getElementById('calcClass2Qty')?.value) || 0;
  const class3Qty = parseInt(document.getElementById('calcClass3Qty')?.value) || 0;
  const ammoQty = parseInt(document.getElementById('calcAmmoQty')?.value) || 0;
  const moneyQty = parseInt(document.getElementById('calcMoneyQty')?.value) || 0;
  const weedQty = parseInt(document.getElementById('calcWeedQty')?.value) || 0;
  const methQty = parseInt(document.getElementById('calcMethQty')?.value) || 0;
  const cocaineQty = parseInt(document.getElementById('calcCocaineQty')?.value) || 0;
  const opiumQty = parseInt(document.getElementById('calcOpiumQty')?.value) || 0;
  const hostagesQty = parseInt(document.getElementById('calcHostagesQty')?.value) || 0;
  const evadingType = document.getElementById('calcEvadingType')?.value || 'none';

  const totalDrugs = weedQty + methQty + cocaineQty + opiumQty;
  if (totalDrugs >= 4000) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('DRUG TRAFFICKING') || p.codeNumber.includes('(6)05'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  } else if (totalDrugs >= 2000) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('DRUG SMUGGLING') || p.codeNumber.includes('(6)04'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  } else if (totalDrugs >= 800) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('DISTRIBUTION OF SCHEDULE') || p.codeNumber.includes('(6)03'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  } else {
    if (weedQty > 0 || opiumQty > 0) {
      const sched1Total = weedQty + opiumQty;
      const pc = findRealPenalCode(p => p.fullTitle.includes('SCHEDULE I') && (sched1Total >= 60 ? p.fullTitle.includes('FELONY') : p.fullTitle.includes('MISDEMEANOR')));
      if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
    }
    if (methQty > 0 || cocaineQty > 0) {
      const sched2Total = methQty + cocaineQty;
      const pc = findRealPenalCode(p => p.fullTitle.includes('SCHEDULE II') && (sched2Total >= 100 ? p.fullTitle.includes('FELONY') : p.fullTitle.includes('MISDEMEANOR')));
      if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
    }
  }

  if (hostagesQty > 0) {
    if (hostagesQty >= 3) {
      const pc = findRealPenalCode(p => p.fullTitle.includes('AGGRAVATED HOSTAGES') || p.codeNumber.includes('(1)25'));
      if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
    } else {
      const pc = findRealPenalCode(p => (p.fullTitle.includes('HOSTAGES') && !p.fullTitle.includes('AGGRAVATED')) || p.codeNumber.includes('(1)24'));
      if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
    }
  }

  if (evadingType === 'foot') {
    const pc = findRealPenalCode(p => p.fullTitle.includes('EVADING') || p.fullTitle.includes('RESISTING'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  } else if (evadingType === 'vehicle') {
    const pc = findRealPenalCode(p => (p.fullTitle.includes('EVADING') && p.fullTitle.includes('VEHICLE')) || p.fullTitle.includes('RECKLESS DRIVING'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  }

  if (vestQty > 0) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('ARMOR') || p.fullTitle.includes('VEST') || p.description.includes('rompi'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  }
  if (class1Qty > 0) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('CLASS 1') || p.fullTitle.includes('FIREARM'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  }
  if (class2Qty > 0) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('CLASS 2') || p.fullTitle.includes('AUTOMATIC'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  }
  if (class3Qty > 0) {
    const pc = findRealPenalCode(p => p.fullTitle.includes('CLASS 3') || p.fullTitle.includes('RIFLE'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  }
  if (ammoQty >= 2000) {
    const pc = findRealPenalCode(p => p.codeNumber.includes('(7)48') || p.fullTitle.includes('AMMUNITION SMUGGLING'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  } else if (ammoQty > 0) {
    const pc = findRealPenalCode(p => p.codeNumber.includes('(7)20') || p.fullTitle.includes('ILLEGAL DISTRIBUTION OF AMMUNITION'));
    if (pc && !processedIds.has(pc.id)) { activeChargesList.push(pc); processedIds.add(pc.id); }
  }

  const activeContainer = document.getElementById('activeChargesContainer');
  if (activeContainer) {
    activeContainer.innerHTML = '';
    if (activeChargesList.length === 0) {
      activeContainer.innerHTML = `<span style="color:var(--text-dim); font-size:0.85rem; font-style:italic;">Belum ada pasal terdeteksi atau dipilih.</span>`;
    } else {
      activeChargesList.forEach(charge => {
        if (charge.isCourtVerdict) isCourtVerdictRequired = true;
        totalFine += charge.fine || 0;
        totalMonths += charge.sentenceMonths || 0;

        const tagEl = document.createElement('span');
        tagEl.className = 'badge badge-primary';
        tagEl.style.cssText = 'padding:0.35rem 0.65rem; font-size:0.8rem; display:inline-flex; align-items:center; gap:0.4rem; background:rgba(59,130,246,0.2); border:1px solid #3b82f6; border-radius:4px; color:#93c5fd;';
        tagEl.innerHTML = `
          <span>${charge.fullTitle}</span>
          <button type="button" style="background:none; border:none; color:#ef4444; cursor:pointer; padding:0; font-size:0.8rem;" onclick="removeManualCharge('${charge.id}')">&times;</button>
        `;
        activeContainer.appendChild(tagEl);
      });
    }
  }

  const fineEl = document.getElementById('calcTotalFine');
  const monthsEl = document.getElementById('calcTotalMonths');
  const statusEl = document.getElementById('calcCaseStatusText');
  const badgeCourt = document.getElementById('courtVerdictBadge');

  if (fineEl) fineEl.textContent = isCourtVerdictRequired ? 'COURT VERDICT' : `$${totalFine.toLocaleString()}`;
  if (monthsEl) monthsEl.textContent = isCourtVerdictRequired ? 'COURT VERDICT' : `${totalMonths} Bulan`;
  
  if (statusEl) {
    if (isCourtVerdictRequired) {
      statusEl.textContent = 'COURT VERDICT (PERSIDANGAN)';
      statusEl.style.color = '#ef4444';
    } else {
      statusEl.textContent = 'Standard Processing';
      statusEl.style.color = '#f59e0b';
    }
  }
  
  if (badgeCourt) {
    badgeCourt.style.display = isCourtVerdictRequired ? 'inline-flex' : 'none';
  }
};

window.removeManualCharge = function(id) {
  window.manualSelectedCharges.delete(id);
  window.aiDetectedCharges.delete(id);
  window.renderCalcPenalSelectorGrid();
  window.calculateSmartPenal();
};

window.resetSmartCalculator = function() {
  window.manualSelectedCharges.clear();
  window.aiDetectedCharges.clear();
  
  const fields = ['calcVestQty', 'calcClass1Qty', 'calcClass2Qty', 'calcClass3Qty', 'calcAmmoQty', 'calcMoneyQty', 'calcWeedQty', 'calcMethQty', 'calcCocaineQty', 'calcOpiumQty', 'calcHostagesQty'];
  fields.forEach(id => {
    const el = document.getElementById(id);
    if (el) el.value = '0';
  });
  
  const evadingEl = document.getElementById('calcEvadingType');
  if (evadingEl) evadingEl.value = 'none';

  window.renderCalcPenalSelectorGrid();
  window.calculateSmartPenal();
};

window.copyCalculatorDiscordReport = function() {
  const activeContainer = document.getElementById('activeChargesContainer');
  const charges = [];
  
  if (activeContainer) {
    const badges = activeContainer.querySelectorAll('.badge span:first-child');
    badges.forEach(b => charges.push(b.innerText.trim()));
  }

  const fineText = document.getElementById('calcTotalFine')?.textContent || '$0';
  const monthsText = document.getElementById('calcTotalMonths')?.textContent || '0 Bulan';
  const statusText = document.getElementById('calcCaseStatusText')?.textContent || 'Standard Processing';

  const report = `[LSPD ARREST & CHARGES REPORT]\nTanggal/Waktu: ${new Date().toLocaleString('id-ID')}\nStatus Kasus: ${statusText}\n\nDAFTAR PASAL TERPASANG:\n${charges.length > 0 ? charges.map(c => `- ${c}`).join('\n') : '- Tidak ada pasal terpasang'}\n\nTOTAL SANSI & HUKUMAN:\n- Total Denda: ${fineText}\n- Total Hukuman Penjara: ${monthsText}`;

  navigator.clipboard.writeText(report).then(() => {
    alert('Format Laporan Discord / Forum MDC berhasil disalin ke clipboard!');
  }).catch(() => {
    alert('Format Laporan:\n\n' + report);
  });
};

async function syncLiveDataFromApi() {
  try {
    let officersRes = (typeof window.DB_OFFICERS !== 'undefined' && Array.isArray(window.DB_OFFICERS) && window.DB_OFFICERS.length > 0)
      ? window.DB_OFFICERS
      : await fetch('/api/officers?t=' + Date.now(), { cache: 'no-store' }).then(r => r.ok ? r.json() : null);

    if (officersRes && Array.isArray(officersRes) && officersRes.length > 0) {
      const normalizeRankToCategory = (r) => {
        if (!r) return 'ROOKIE';
        const rankUpper = r.toUpperCase();
        if (rankUpper.includes('COMMISSIONER')) return 'COMMISSIONER';
        if (rankUpper.includes('CHIEF OF POLICE')) return 'CHIEF OF POLICE';
        if (rankUpper.includes('ASSISTANT CHIEF')) return 'ASSISTANT CHIEF';
        if (rankUpper.includes('DEPUTY CHIEF')) return 'DEPUTY CHIEF';
        if (rankUpper.includes('COMMANDER')) return 'COMMANDER';
        if (rankUpper.includes('CAPTAIN')) return 'CAPTAIN';
        if (rankUpper.includes('LIEUTENANT')) return 'LIEUTENANT';
        if (rankUpper.includes('DETECTIVE')) return 'DETECTIVE';
        if (rankUpper.includes('SERGEANT')) return 'SERGEANT';
        if (rankUpper.includes('OFFICER III')) return 'POLICE OFFICER III';
        if (rankUpper.includes('OFFICER II')) return 'POLICE OFFICER II';
        return 'ROOKIE';
      };

      const mappedCoC = officersRes.map(o => ({
        category: normalizeRankToCategory(o.rank),
        rank: o.rank,
        badge: o.badge_number,
        name: o.name,
        division: o.division,
        status: (o.duty_status === 'VACANT' || o.name === 'VACANT') ? 'VACANT' : (o.duty_status === '10-8' || o.duty_status === '10-6' ? 'ACTIVE' : 'OFF DUTY')
      }));
      window.DEFAULT_CHAIN_OF_COMMAND = mappedCoC;
      if (typeof StorageManager !== 'undefined') {
        StorageManager.saveChainOfCommand(mappedCoC);
      }
      if (typeof renderChainOfCommand === 'function') {
        renderChainOfCommand();
      }
    }
  } catch (e) {
    console.log('Syncing live API data:', e);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  syncLiveDataFromApi();
  setTimeout(() => {
    if (typeof window.init241PenalCodesCatalog === 'function') {
      window.init241PenalCodesCatalog();
    }
  }, 500);
});



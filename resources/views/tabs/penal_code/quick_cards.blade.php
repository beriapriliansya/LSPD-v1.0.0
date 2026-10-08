<div class="section-header" style="margin-bottom:1.25rem;">
  <div class="section-title">
    <h2 style="color:#ffffff; font-size:1.5rem; font-weight:800; display:flex; align-items:center; gap:0.6rem;">
      <i class="fa-solid fa-book-bookmark" style="color:var(--color-gold);"></i> Penal Code Quick Reference & Panduan Kasus
    </h2>
    <span style="color:#94a3b8; font-size:0.82rem;">Panduan cepat pengkategorian pasal resmi (Kasus, Penyerangan Officer, Senjata & Suppressor, Amunisi & Vest, Penculikan, Gang, Lalu Lintas, Narkoba, & Keuangan).</span>
  </div>

  <div style="display:flex; gap:0.75rem; align-items:center;">
    <button class="btn-pdf-export" onclick="window.print()">
      <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
    </button>
  </div>
</div>

@php
  $allPenalCodesList = isset($penalCodes) ? $penalCodes : \App\Models\PenalCode::orderBy('code')->get();
  $groupedPenalCodes = $allPenalCodesList->groupBy('category');

  $publicPanduanCards = [
    'PANDUAN KASUS PERAMPOKAN' => [
      'icon' => 'fa-wallet', 'color' => '#3b82f6',
      'items' => [
        ['label' => 'Perampokan Rumah', 'code' => '3.17'],
        ['label' => 'Perampokan Warung / Toko', 'code' => '3.08'],
        ['label' => 'Perampokan Mesin ATM', 'code' => '(3)28'],
        ['label' => 'Perampokan Perhiasan (Vangelico)', 'code' => '3.26'],
        ['label' => 'Perampokan Bank Fleeca', 'code' => '3.13'],
        ['label' => 'Perampokan Bobcat / Laundromat', 'code' => '3.14'],
        ['label' => 'Perampokan Federal Bank', 'code' => '3.12'],
        ['label' => 'Alat Hacking / Lockpick / Green Card', 'code' => '(7)09'],
        ['label' => 'Pencucian Uang', 'code' => '(4)08'],
        ['label' => 'Vehicle Boosting (Import/Export)', 'code' => '3.05'],
      ]
    ],
    'PASAL SENJATA, SUPPRESSOR & KOMPONEN' => [
      'icon' => 'fa-gun', 'color' => '#ef4444',
      'items' => [
        ['label' => 'Penggunaan Silencer / Suppressor Senjata Api', 'code' => '(7)49'],
        ['label' => 'Kepemilikan Komponen Senjata Api (< 10 Item)', 'code' => '(7)45'],
        ['label' => 'Kepemilikan Komponen Senjata Api (>= 10 Item)', 'code' => '(7)46'],
        ['label' => 'Pembuatan Komponen Senjata Api (Manufacturing)', 'code' => '(7)47'],
        ['label' => 'Kepemilikan Senjata Api Class 1 Ilegal', 'code' => '(7)03'],
        ['label' => 'Kepemilikan Senjata Api Class 2 Ilegal', 'code' => '(7)04'],
        ['label' => 'Kepemilikan Senjata Api Class 3 Ilegal', 'code' => '(7)05'],
        ['label' => 'Membawa Senjata Dinas Polisi / Govt Issue', 'code' => '(7)06'],
        ['label' => 'Membawa Taser Dinas Polisi', 'code' => '(7)08'],
      ]
    ],
    'PENYERANGAN OFFICER' => [
      'icon' => 'fa-user-shield', 'color' => '#60a5fa',
      'items' => [
        ['label' => 'Penyerangan Verbal Petugas', 'code' => '(1)03'],
        ['label' => 'Penganiayaan Fisik / Pemukulan', 'code' => '(1)04'],
        ['label' => 'Penyerangan Senjata Mematikan', 'code' => '(1)05'],
        ['label' => 'Penganiayaan Berat / Penembakan', 'code' => '(1)32'],
        ['label' => 'Percobaan Pembunuhan Petugas', 'code' => '(1)13'],
        ['label' => 'Pembunuhan Petugas On Duty', 'code' => '(1)18'],
        ['label' => 'Menghalangi Tugas Petugas', 'code' => '(5)04'],
        ['label' => 'Menolak Perintah Sah Petugas', 'code' => '(5)05'],
      ]
    ],
    'PANDUAN PASAL PENCULIKAN' => [
      'icon' => 'fa-user-ninja', 'color' => '#f59e0b',
      'items' => [
        ['label' => 'Menyandera <= 2 Sipil', 'code' => '(1)24'],
        ['label' => 'Menyandera >= 3 Sipil (Aggravated)', 'code' => '(1)25'],
        ['label' => 'Menculik Biasa', 'code' => '(1)30'],
        ['label' => 'Menculik Pegawai Pem. / Polisi', 'code' => '(1)31'],
        ['label' => 'Menyandera Pegawai Pem. Level 3', 'code' => '(1)26'],
        ['label' => 'Menyandera Pegawai Pem. Level 2', 'code' => '(1)27'],
        ['label' => 'Menyandera Pegawai Pem. Level 1', 'code' => '(1)28'],
        ['label' => 'Menyandera Pegawai Pem. Diperberat', 'code' => '(1)29'],
      ]
    ],
    'PANDUAN GANG & PENEMBAKAN' => [
      'icon' => 'fa-bullseye', 'color' => '#f87171',
      'items' => [
        ['label' => 'Penembakan Antar Gang', 'code' => '(1)10'],
        ['label' => 'Penembakan dari Mobil (Drive-By)', 'code' => '(7)42'],
        ['label' => 'Penggunaan Senjata Api (GSR Positif)', 'code' => '(7)15'],
        ['label' => 'Penembakan Liar di Tempat Umum', 'code' => '(7)18'],
        ['label' => 'Penodongan Senjata Api', 'code' => '(7)16'],
      ]
    ],
    'PANDUAN AMMUNITION & VEST' => [
      'icon' => 'fa-box-archive', 'color' => '#38bdf8',
      'items' => [
        ['label' => 'Amunisi < 300 Butir', 'code' => '(7)19'],
        ['label' => 'Distribusi Amunisi (300 - 2000 Butir)', 'code' => '(7)20'],
        ['label' => 'Penyelundupan Amunisi (> 2000 Butir)', 'code' => '(7)48'],
        ['label' => 'Membawa Vest Anti Peluru (< 10 Item)', 'code' => '(7)43'],
        ['label' => 'Membawa Vest Anti Peluru (>= 10 Item)', 'code' => '(7)44'],
      ]
    ],
    'PANDUAN PASAL LALU LINTAS' => [
      'icon' => 'fa-car', 'color' => '#3b82f6',
      'items' => [
        ['label' => 'Mengemudi Tanpa SIM Resmi', 'code' => '(8)22'],
        ['label' => 'Balap Liar / Street Racing', 'code' => '(8)30'],
        ['label' => 'Kabur dari Sirene Petugas (Evading)', 'code' => '(5)06'],
        ['label' => 'Melanggar Lampu Merah / Rambu', 'code' => '(8)16'],
        ['label' => 'Tabrak Lari (Hit and Run)', 'code' => '(8)02'],
        ['label' => 'Pencurian Kendaraan Motor/Mobil', 'code' => '3.05'],
      ]
    ],
    'PANDUAN PASAL NARKOBA' => [
      'icon' => 'fa-cannabis', 'color' => '#10b981',
      'items' => [
        ['label' => 'Narkoba Schedule I (Weed < 60g)', 'code' => '(6)00'],
        ['label' => 'Narkoba Schedule I (Weed > 60g)', 'code' => '(6)01'],
        ['label' => 'Narkoba Schedule II (Meth < 100g)', 'code' => '(6)02'],
        ['label' => 'Narkoba Schedule II (Meth > 100g)', 'code' => '(6)03'],
        ['label' => 'Alat Produksi Narkoba Kategori A (< 10 Item)', 'code' => '(6)07'],
        ['label' => 'Alat Produksi Narkoba Kategori B (>= 10 Item)', 'code' => '(6)07-131'],
        ['label' => 'Produksi Narkoba (Drug Manufacturing)', 'code' => '(6)08'],
        ['label' => 'Penjualan Narkoba (Drugs Selling)', 'code' => '(6)08-133'],
        ['label' => 'Pengedaran Narkoba (> 800g)', 'code' => '(6)08'],
        ['label' => 'Penyelundupan Narkoba (> 2000g)', 'code' => '(6)04'],
        ['label' => 'Perdagangan Narkoba Masif (> 4000g)', 'code' => '(6)05'],
      ]
    ],
    'PANDUAN KEUANGAN & OBSTRUCTION' => [
      'icon' => 'fa-money-bill-transfer', 'color' => '#fb7185',
      'items' => [
        ['label' => 'Perangkat Hacking / Lockpick', 'code' => '(7)09'],
        ['label' => 'Uang Merah Minor (< $50,000)', 'code' => '(4)35'],
        ['label' => 'Uang Merah Tingkat 3 ($50k-$150k)', 'code' => '(4)33'],
        ['label' => 'Uang Merah Tingkat 2 ($150k-$400k)', 'code' => '(4)32'],
        ['label' => 'Uang Merah Tingkat 1 (> $400,000)', 'code' => '(4)09'],
        ['label' => 'Membuang Barang Bukti', 'code' => '(4)17'],
        ['label' => 'Resisting Arrest / Kabur Ditangkap', 'code' => '(5)07'],
      ]
    ]
  ];

  $standardChapters = [
    'STATE OFFENSES (PASAL 0)',
    'AGAINST PERSON (PASAL 1)',
    'PROPERTY OFFENSES (PASAL 3)',
    'OFFENSES AGAINST PROPERTY (PASAL 3)',
    'PUBLIC ADMIN (PASAL 4)',
    'PUBLIC ORDER (PASAL 5)',
    'NARCOTICS (PASAL 6)',
    'PUBLIC SAFETY (PASAL 7)',
    'VEHICLE CODES (PASAL 8)',
    'PARKS & WILDLIFE (PASAL 9)',
    'SEXUAL OFFENSES (PASAL 2)',
  ];
@endphp

<!-- Categorized Case Guide Panels (Exact Public Panduan Kasus Cards - DYNAMIC FROM DB) -->
<div class="case-guide-container">
  @foreach($publicPanduanCards as $cardTitle => $cardConfig)
    @php
      $customCodes = $groupedPenalCodes->get($cardTitle, collect());
    @endphp
    <div class="case-guide-section">
      <div class="case-guide-header">
        <div class="case-guide-header-icon" style="background: rgba(59, 130, 246, 0.15); color: {{ $cardConfig['color'] }};">
          <i class="fa-solid {{ $cardConfig['icon'] }}"></i>
        </div>
        <h3 class="case-guide-header-title">{{ $cardTitle }}</h3>
      </div>

      <div class="case-guide-list">
        <!-- Render predefined default items for this card -->
        @foreach($cardConfig['items'] as $item)
          @php
            $dbCode = $allPenalCodesList->first(function($p) use ($item) {
              return str_contains($p->code, $item['code']);
            });
            $codeStr = $dbCode ? $dbCode->code . ' ' . $dbCode->title : $item['code'];
          @endphp
          <div class="case-guide-row">
            <span class="case-guide-label" title="{{ $item['label'] }}">{{ $item['label'] }}</span>
            <div class="case-guide-right">
              <div class="indicator-bar {{ ($dbCode && $dbCode->type === 'Felony') ? 'indicator-red' : (($dbCode && $dbCode->type === 'Court Verdict') ? 'indicator-orange' : 'indicator-blue') }}"></div>
              <div class="case-code-box {{ ($dbCode && $dbCode->type === 'Felony') ? 'danger-box' : (($dbCode && $dbCode->type === 'Court Verdict') ? 'warning-box' : '') }}">
                <span class="case-code-text" title="{{ $dbCode ? $dbCode->code . ' ' . $dbCode->title : $item['code'] }}">
                  <i class="fa-regular fa-folder-open" style="margin-right: 0.25rem;"></i> {{ $dbCode ? $dbCode->code . ' ' . $dbCode->title : $item['code'] }}
                </span>
                <button class="case-copy-btn" onclick="copyPenalText('{{ addslashes($dbCode ? $dbCode->code . ' ' . $dbCode->title : $item['code']) }}', this)" title="Copy Code">
                  <i class="fa-regular fa-copy"></i>
                </button>
              </div>
            </div>
          </div>
        @endforeach

        <!-- Render any custom added penal codes for this card category from DB -->
        @foreach($customCodes as $codeItem)
          @php
            $alreadyRendered = false;
            foreach($cardConfig['items'] as $item) {
              if (str_contains($codeItem->code, $item['code'])) { $alreadyRendered = true; break; }
            }
          @endphp
          @if(!$alreadyRendered)
            <div class="case-guide-row">
              <span class="case-guide-label">{{ $codeItem->title }}</span>
              <div class="case-guide-right">
                <div class="indicator-bar {{ $codeItem->type === 'Felony' ? 'indicator-red' : ($codeItem->type === 'Court Verdict' ? 'indicator-orange' : 'indicator-blue') }}"></div>
                <div class="case-code-box {{ $codeItem->type === 'Felony' ? 'danger-box' : ($codeItem->type === 'Court Verdict' ? 'warning-box' : '') }}">
                  <span class="case-code-text" title="{{ $codeItem->code }} {{ $codeItem->title }}">
                    <i class="fa-regular fa-folder-open" style="margin-right: 0.25rem;"></i> {{ $codeItem->code }}
                  </span>
                  <button class="case-copy-btn" onclick="copyPenalText('{{ addslashes($codeItem->code) }}', this)" title="Copy Code">
                    <i class="fa-regular fa-copy"></i>
                  </button>
                </div>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  @endforeach

  <!-- Also render any brand new category card added by Admin -->
  @foreach($groupedPenalCodes as $catName => $codes)
    @if(!array_key_exists($catName, $publicPanduanCards) && !in_array($catName, $standardChapters))
      <div class="case-guide-section">
        <div class="case-guide-header">
          <div class="case-guide-header-icon" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
            <i class="fa-solid fa-folder-open"></i>
          </div>
          <h3 class="case-guide-header-title">{{ strtoupper($catName) }}</h3>
        </div>

        <div class="case-guide-list">
          @foreach($codes as $codeItem)
            <div class="case-guide-row">
              <span class="case-guide-label">{{ $codeItem->title }}</span>
              <div class="case-guide-right">
                <div class="indicator-bar {{ $codeItem->type === 'Felony' ? 'indicator-red' : ($codeItem->type === 'Court Verdict' ? 'indicator-orange' : 'indicator-blue') }}"></div>
                <div class="case-code-box {{ $codeItem->type === 'Felony' ? 'danger-box' : ($codeItem->type === 'Court Verdict' ? 'warning-box' : '') }}">
                  <span class="case-code-text" title="{{ $codeItem->code }} {{ $codeItem->title }}">
                    <i class="fa-regular fa-folder-open" style="margin-right: 0.25rem;"></i> {{ $codeItem->code }}
                  </span>
                  <button class="case-copy-btn" onclick="copyPenalText('{{ addslashes($codeItem->code) }}', this)" title="Copy Code">
                    <i class="fa-regular fa-copy"></i>
                  </button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  @endforeach
</div>

<!-- Copy Clipboard Script -->
<script>
function copyPenalText(text, btn) {
  if (!navigator.clipboard) {
    const textArea = document.createElement("textarea");
    textArea.value = text;
    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand("copy");
    document.body.removeChild(textArea);
    showCopyFeedback(btn);
    return;
  }
  navigator.clipboard.writeText(text).then(() => {
    showCopyFeedback(btn);
  }).catch(err => {
    console.error('Copy error: ', err);
  });
}

function showCopyFeedback(btn) {
  const icon = btn.querySelector('i');
  if (icon) {
    icon.className = 'fa-solid fa-check';
    btn.style.borderColor = '#10b981';
    btn.style.color = '#34d399';
    btn.style.background = 'rgba(16, 185, 129, 0.2)';
    setTimeout(() => {
      icon.className = 'fa-regular fa-copy';
      btn.style.borderColor = '';
      btn.style.color = '';
      btn.style.background = '';
    }, 1200);
  }
}
</script>
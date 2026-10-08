@extends('admin.layouts.admin')

@section('title', 'Manajemen Cards Penal Code - LSPD Admin Console')
@section('header_title', 'Kelola Card Kategori & Daftar Pasal Penal Code')

@section('content')
<!-- Header Management Bar -->
<div class="admin-card" style="margin-bottom: 1.5rem;">
  <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem;">
    <div>
      <h3 style="font-size: 1.25rem; font-weight: 900; margin: 0 0 0.35rem 0; color: #ffffff; display: flex; align-items: center; gap: 0.65rem;">
        <i class="fa-solid fa-scale-balanced" style="color: #3b82f6;"></i> Manajemen Card Kategori &amp; Pasal Penal Code
      </h3>
      <span style="font-size: 0.84rem; color: #94a3b8;">
        Kelola 9 Card Kategori Panduan Kasus publik, edit/hapus pasal secara instan, atau buat Card Kategori &amp; Pasal baru.
      </span>
    </div>

    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
      <!-- Button: Add Category Card -->
      <button type="button" onclick="openAddCategoryModal()" class="btn-admin" style="background: #2563eb; color: #ffffff; padding: 0.55rem 1rem;">
        <i class="fa-solid fa-folder-plus"></i> Tambah Card Kategori Baru
      </button>

      <!-- Button: Add New Penal Code -->
      <button type="button" onclick="openAddPenalModal()" class="btn-admin" style="background: #1d4ed8; color: #ffffff; padding: 0.55rem 1rem;">
        <i class="fa-solid fa-plus-circle"></i> Tambah Pasal Baru
      </button>
    </div>
  </div>
</div>



@php
  // Define the 9 Public Panduan Kasus Cards structure matching public view 100%
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
@endphp

<!-- ========================================================================= -->
<!-- SECTION 1: CARD KATEGORI PENAL CODE CHEAT (EXACT 9 CARDS SINKRON PUBLIK) -->
<!-- ========================================================================= -->
<div style="margin-bottom: 2.5rem;">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.1rem; padding-bottom: 0.5rem; border-bottom: 1px solid var(--admin-border);">
    <h4 style="font-size: 1.05rem; font-weight: 800; margin: 0; color: #ffffff; display: flex; align-items: center; gap: 0.55rem;">
      <i class="fa-solid fa-layer-group" style="color: #3b82f6;"></i> Card Kategori Penal Code Cheat (Sinkron Publik)
    </h4>
    <span style="font-size: 0.8rem; color: #64748b; font-weight: 700;">9 Card Kategori Panduan Kasus</span>
  </div>

  <div class="case-guide-container">
    @foreach($publicPanduanCards as $cardTitle => $cardConfig)
      @php
        $customCodes = $groupedPenalCodes->get($cardTitle, collect());
      @endphp

      <div class="case-guide-section">
        <!-- Category Header -->
        <div class="case-guide-header">
          <div class="case-guide-header-icon" style="background: rgba(59, 130, 246, 0.15); color: {{ $cardConfig['color'] }};">
            <i class="fa-solid {{ $cardConfig['icon'] }}"></i>
          </div>
          <h3 class="case-guide-header-title">{{ $cardTitle }}</h3>
          <span style="background: rgba(37, 99, 235, 0.15); color: #60a5fa; border: 1px solid rgba(37, 99, 235, 0.3); padding: 0.15rem 0.45rem; border-radius: 6px; font-weight: 800; font-size: 0.7rem;">
            {{ count($cardConfig['items']) + count($customCodes) }} Pasal
          </span>
        </div>

        <!-- List of Items Inside Category Card -->
        <div class="case-guide-list" style="max-height: 320px; overflow-y: auto; padding-right: 0.2rem; scrollbar-width: thin;">
          @foreach($cardConfig['items'] as $item)
            @php
              $dbCode = $allPenalCodes->first(function($p) use ($item) {
                return str_contains($p->code, $item['code']) || str_contains($item['code'], $p->code);
              });
            @endphp

            <div class="case-guide-row">
              <span class="case-guide-label" title="{{ $item['label'] }}">{{ $item['label'] }}</span>
              <div class="case-guide-right" style="max-width: 70%;">
                <div class="indicator-bar {{ ($dbCode && $dbCode->type === 'Felony') ? 'indicator-red' : (($dbCode && $dbCode->type === 'Court Verdict') ? 'indicator-orange' : 'indicator-blue') }}"></div>
                <div class="case-code-box {{ ($dbCode && $dbCode->type === 'Felony') ? 'danger-box' : (($dbCode && $dbCode->type === 'Court Verdict') ? 'warning-box' : '') }}" style="display: flex; align-items: center; justify-content: space-between; gap: 0.35rem; width: 100%; min-width: 0;">
                  <span class="case-code-text" style="flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $dbCode ? $dbCode->code . '. ' . $dbCode->title : $item['code'] }}">
                    <i class="fa-regular fa-folder-open" style="margin-right: 0.25rem;"></i> {{ $dbCode ? $dbCode->code . '. ' . $dbCode->title : $item['code'] }}
                  </span>
                  
                  <!-- Admin Action Buttons (Edit & Delete) -->
                  @if($dbCode)
                    <div style="display: flex; gap: 0.3rem; align-items: center; flex-shrink: 0; position: relative; z-index: 10;">
                      <button type="button" data-id="{{ $dbCode->id }}" data-code="{{ $dbCode->code }}" data-category="{{ $dbCode->category }}" data-title="{{ $dbCode->title }}" data-fine="{{ $dbCode->fine }}" data-jail="{{ $dbCode->jail_time }}" data-type="{{ $dbCode->type }}" data-desc="{{ $dbCode->description }}" data-json="{{ htmlspecialchars(json_encode($dbCode), ENT_QUOTES, 'UTF-8') }}" onclick="openEditPenalModalFromBtn(this)" style="background: rgba(59, 130, 246, 0.25); border: 1px solid rgba(59, 130, 246, 0.5); color: #60a5fa; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Edit Pasal">
                        <i class="fa-solid fa-pen" style="pointer-events: none;"></i>
                      </button>
                      <form action="{{ route('admin.penal_codes.destroy', $dbCode->id) }}" method="POST" onsubmit="return confirmDeletePenal(event, this, '{{ addslashes($dbCode->code) }}')" style="display: inline-block; margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: rgba(239, 68, 68, 0.25); border: 1px solid rgba(239, 68, 68, 0.5); color: #ef4444; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Hapus Pasal">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  @endif
                </div>
              </div>
            </div>
          @endforeach

          <!-- Also render any newly added items for this category -->
          @foreach($customCodes as $codeItem)
            @php
              $alreadyRendered = false;
              foreach($cardConfig['items'] as $item) {
                if (str_contains($codeItem->code, $item['code'])) { $alreadyRendered = true; break; }
              }
            @endphp
            @if(!$alreadyRendered)
              <div class="case-guide-row" style="border-left: 2px solid #3b82f6;">
                <span class="case-guide-label" title="{{ $codeItem->title }}">{{ $codeItem->title }}</span>
                <div class="case-guide-right" style="max-width: 70%;">
                  <div class="indicator-bar {{ $codeItem->type === 'Felony' ? 'indicator-red' : ($codeItem->type === 'Court Verdict' ? 'indicator-orange' : 'indicator-blue') }}"></div>
                  <div class="case-code-box {{ $codeItem->type === 'Felony' ? 'danger-box' : ($codeItem->type === 'Court Verdict' ? 'warning-box' : '') }}" style="display: flex; align-items: center; justify-content: space-between; gap: 0.35rem; width: 100%; min-width: 0;">
                    <span class="case-code-text" style="flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $codeItem->code }}. {{ $codeItem->title }}">
                      <i class="fa-regular fa-folder-open" style="margin-right: 0.25rem;"></i> {{ $codeItem->code }}
                    </span>
                    
                    <div style="display: flex; gap: 0.3rem; align-items: center; flex-shrink: 0; position: relative; z-index: 10;">
                      <button type="button" data-id="{{ $codeItem->id }}" data-code="{{ $codeItem->code }}" data-category="{{ $codeItem->category }}" data-title="{{ $codeItem->title }}" data-fine="{{ $codeItem->fine }}" data-jail="{{ $codeItem->jail_time }}" data-type="{{ $codeItem->type }}" data-desc="{{ $codeItem->description }}" data-json="{{ htmlspecialchars(json_encode($codeItem), ENT_QUOTES, 'UTF-8') }}" onclick="openEditPenalModalFromBtn(this)" style="background: rgba(59, 130, 246, 0.25); border: 1px solid rgba(59, 130, 246, 0.5); color: #60a5fa; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Edit Pasal">
                        <i class="fa-solid fa-pen" style="pointer-events: none;"></i>
                      </button>
                      <form action="{{ route('admin.penal_codes.destroy', $codeItem->id) }}" method="POST" onsubmit="return confirmDeletePenal(event, this, '{{ addslashes($codeItem->code) }}')" style="display: inline-block; margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: rgba(239, 68, 68, 0.25); border: 1px solid rgba(239, 68, 68, 0.5); color: #ef4444; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Hapus Pasal">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>

        <!-- Add Code to Category Button -->
        <button type="button" onclick="openAddPenalModal('{{ addslashes($cardTitle) }}')" class="btn-secondary-admin" style="margin-top: 0.75rem; width: 100%; text-align: center; padding: 0.45rem; font-size: 0.75rem; font-weight: 700; border-radius: 6px; border-style: dashed; color: #60a5fa; border-color: rgba(37, 99, 235, 0.4); display: flex; align-items: center; justify-content: center; gap: 0.4rem; transition: all 0.2s ease;">
          <i class="fa-solid fa-plus-circle"></i> Tambah Pasal ke Card Ini
        </button>
      </div>
    @endforeach

    @php
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

    <!-- Also render any brand new Category Cards created by Admin via "Tambah Card Kategori Baru" -->
    @foreach($groupedPenalCodes as $catName => $codes)
      @if(!array_key_exists($catName, $publicPanduanCards) && !in_array($catName, $standardChapters))
        <div class="case-guide-section" style="border-top: 3px solid #2563eb;">
          <div class="case-guide-header">
            <div class="case-guide-header-icon" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
              <i class="fa-solid fa-folder-open"></i>
            </div>
            <h3 class="case-guide-header-title">{{ strtoupper($catName) }}</h3>
            <span style="background: rgba(37, 99, 235, 0.15); color: #60a5fa; border: 1px solid rgba(37, 99, 235, 0.3); padding: 0.15rem 0.45rem; border-radius: 6px; font-weight: 800; font-size: 0.7rem;">
              {{ count($codes) }} Pasal
            </span>
          </div>

          <div class="case-guide-list" style="max-height: 320px; overflow-y: auto; padding-right: 0.2rem; scrollbar-width: thin;">
            @foreach($codes as $codeItem)
              <div class="case-guide-row">
                <span class="case-guide-label" title="{{ $codeItem->title }}">{{ $codeItem->title }}</span>
                <div class="case-guide-right" style="max-width: 70%;">
                  <div class="indicator-bar {{ $codeItem->type === 'Felony' ? 'indicator-red' : ($codeItem->type === 'Court Verdict' ? 'indicator-orange' : 'indicator-blue') }}"></div>
                  <div class="case-code-box {{ $codeItem->type === 'Felony' ? 'danger-box' : ($codeItem->type === 'Court Verdict' ? 'warning-box' : '') }}" style="display: flex; align-items: center; justify-content: space-between; gap: 0.35rem; width: 100%; min-width: 0;">
                    <span class="case-code-text" style="flex: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $codeItem->code }}. {{ $codeItem->title }}">
                      <i class="fa-regular fa-folder-open" style="margin-right: 0.25rem;"></i> {{ $codeItem->code }}
                    </span>
                    
                    <div style="display: flex; gap: 0.3rem; align-items: center; flex-shrink: 0; position: relative; z-index: 10;">
                      <button type="button" data-id="{{ $codeItem->id }}" data-code="{{ $codeItem->code }}" data-category="{{ $codeItem->category }}" data-title="{{ $codeItem->title }}" data-fine="{{ $codeItem->fine }}" data-jail="{{ $codeItem->jail_time }}" data-type="{{ $codeItem->type }}" data-desc="{{ $codeItem->description }}" data-json="{{ htmlspecialchars(json_encode($codeItem), ENT_QUOTES, 'UTF-8') }}" onclick="openEditPenalModalFromBtn(this)" style="background: rgba(59, 130, 246, 0.25); border: 1px solid rgba(59, 130, 246, 0.5); color: #60a5fa; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Edit Pasal">
                        <i class="fa-solid fa-pen" style="pointer-events: none;"></i>
                      </button>
                      <form action="{{ route('admin.penal_codes.destroy', $codeItem->id) }}" method="POST" onsubmit="return confirmDeletePenal(event, this, '{{ addslashes($codeItem->code) }}')" style="display: inline-block; margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: rgba(239, 68, 68, 0.25); border: 1px solid rgba(239, 68, 68, 0.5); color: #ef4444; width: 24px; height: 24px; border-radius: 4px; display: inline-flex; align-items: center; justify-content: center; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Hapus Pasal">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

          <button type="button" onclick="openAddPenalModal('{{ addslashes($catName) }}')" class="btn-secondary-admin" style="margin-top: 0.75rem; width: 100%; text-align: center; padding: 0.45rem; font-size: 0.75rem; font-weight: 700; border-radius: 6px; border-style: dashed; color: #60a5fa; border-color: rgba(37, 99, 235, 0.4); display: flex; align-items: center; justify-content: center; gap: 0.4rem; transition: all 0.2s ease;">
            <i class="fa-solid fa-plus-circle"></i> Tambah Pasal ke Card Ini
          </button>
        </div>
      @endif
    @endforeach
  </div>
</div>

<!-- ========================================================================= -->
<!-- SECTION 2: SEARCH & CATEGORY FILTER BAR -->
<!-- ========================================================================= -->
<div style="background: rgba(15,23,42,0.75); padding: 1rem 1.1rem; border: 1px solid var(--admin-border); border-radius: 12px; margin-bottom: 1.5rem; display: flex; flex-direction: column; gap: 1rem;">
  
  <div style="display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center; justify-content: space-between;">
    <div style="position: relative; flex: 1; min-width: 280px;">
      <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 0.9rem; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 0.85rem;"></i>
      <input type="text" id="penalCardSearchInput" class="admin-input" placeholder="Cari nomor pasal (cth (2)01), nama kejahatan..." oninput="searchPenalCards(this.value)" style="padding-left: 2.3rem; border-radius: 20px;">
    </div>

    <div style="font-size: 0.8rem; color: #94a3b8; font-weight: 700;">
      Menampilkan <strong id="visibleCardCount" style="color: #60a5fa;">{{ count($allPenalCodes) }}</strong> dari <strong>{{ count($allPenalCodes) }}</strong> pasal
    </div>
  </div>

  <!-- Category Filter Buttons Pills -->
  <div id="penalRefCategoryFilter" style="display: flex; gap: 0.45rem; overflow-x: auto; padding-bottom: 0.35rem; flex-wrap: nowrap; scrollbar-width: thin;">
    <button type="button" class="btn-filter-pill active" data-cat-val="ALL" onclick="filterPenalCards('ALL', this)">SEMUA PASAL ({{ count($allPenalCodes) }})</button>

    @foreach(array_keys($publicPanduanCards) as $pCat)
      <button type="button" class="btn-filter-pill" data-cat-val="{{ $pCat }}" onclick="filterPenalCards('{{ addslashes($pCat) }}', this)">
        {{ strtoupper($pCat) }}
      </button>
    @endforeach

    @foreach($categories as $cat)
      @if(!array_key_exists($cat, $publicPanduanCards))
        <button type="button" class="btn-filter-pill" data-cat-val="{{ $cat }}" onclick="filterPenalCards('{{ addslashes($cat) }}', this)">
          {{ strtoupper($cat) }}
        </button>
      @endif
    @endforeach
  </div>
</div>

<!-- ========================================================================= -->
<!-- SECTION 3: KATALOG CARDS PENAL CODE GRID LAYOUT -->
<!-- ========================================================================= -->
<div id="penalRefCardsGrid" class="penal-ref-grid" style="margin-bottom: 2.5rem;">
  @forelse($allPenalCodes as $codeItem)
    @php
      $fineDisplay = is_numeric($codeItem->fine) ? '$' . number_format($codeItem->fine) : strtoupper($codeItem->fine);
      $jailDisplay = is_numeric($codeItem->jail_time) ? $codeItem->jail_time . ' BLN' : strtoupper($codeItem->jail_time);
      $isCourtVerdict = str_contains(strtolower($codeItem->type . ' ' . $codeItem->fine . ' ' . $codeItem->jail_time), 'verdict');
      $isFelony = ($codeItem->type === 'Felony');
      
      $dotClass = $isFelony ? 'dot-red' : ($isCourtVerdict ? 'dot-blue' : 'dot-green');
      $searchStr = strtolower($codeItem->code . ' ' . $codeItem->title . ' ' . $codeItem->description . ' ' . $codeItem->category);
    @endphp

    <div class="penal-ref-card" 
         data-category="{{ $codeItem->category }}" 
         data-code="{{ strtolower($codeItem->code . ' ' . $codeItem->title) }}" 
         data-text="{{ $searchStr }}">
      
      <!-- Card Header -->
      <div class="penal-ref-header" style="justify-content: space-between; gap: 0.5rem;">
        <div style="display: flex; align-items: flex-start; gap: 0.55rem; flex: 1; min-width: 0;">
          <span class="status-dot-badge {{ $dotClass }}" title="Tipe: {{ $codeItem->type }}"></span>
          <span class="penal-ref-code" style="font-weight: 800; font-size: 0.85rem; line-height: 1.35; word-break: break-word;">
            {{ $codeItem->code }}. {{ strtoupper($codeItem->title) }}
          </span>
        </div>

        <div style="display: flex; gap: 0.3rem; align-items: center; flex-shrink: 0; position: relative; z-index: 10;">
          <button type="button" data-id="{{ $codeItem->id }}" data-code="{{ $codeItem->code }}" data-category="{{ $codeItem->category }}" data-title="{{ $codeItem->title }}" data-fine="{{ $codeItem->fine }}" data-jail="{{ $codeItem->jail_time }}" data-type="{{ $codeItem->type }}" data-desc="{{ $codeItem->description }}" data-json="{{ htmlspecialchars(json_encode($codeItem), ENT_QUOTES, 'UTF-8') }}" onclick="openEditPenalModalFromBtn(this)" style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.4); padding: 0.2rem 0.45rem; border-radius: 4px; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Edit Pasal">
            <i class="fa-solid fa-pen" style="pointer-events: none;"></i>
          </button>
          <form action="{{ route('admin.penal_codes.destroy', $codeItem->id) }}" method="POST" onsubmit="return confirmDeletePenal(event, this, '{{ addslashes($codeItem->code) }}')" style="display: inline-block; margin: 0;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background: rgba(239, 68, 68, 0.2); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.4); padding: 0.2rem 0.45rem; border-radius: 4px; font-size: 0.72rem; cursor: pointer; transition: all 0.15s ease;" title="Hapus Pasal">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
        </div>
      </div>

      <!-- Card Body -->
      <div class="penal-ref-body">
        {{ $codeItem->description ?: $codeItem->title }}
      </div>

      <!-- Card Footer -->
      <div class="penal-ref-footer">
        <span class="penal-fine">
          Fine: <strong>{{ $fineDisplay }}</strong>
        </span>
        <span class="penal-sentence">
          Sentence: <strong>{{ $jailDisplay }}</strong>
        </span>
      </div>
    </div>
  @empty
    <div style="grid-column: 1 / -1; background: #131b2e; border: 1px dashed var(--admin-border); border-radius: 12px; padding: 3rem; text-align: center; color: #64748b;">
      <i class="fa-solid fa-folder-open" style="font-size: 2.5rem; color: #3b82f6; margin-bottom: 1rem; display: block;"></i>
      Belum ada pasal Penal Code terdaftar. Klik <strong>"Tambah Pasal Baru"</strong> di atas.
    </div>
  @endforelse
</div>

<!-- ========================================================================= -->
<!-- MODAL FORM: TAMBAH CARD KATEGORI BARU -->
<!-- ========================================================================= -->
<div id="addCategoryModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 520px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-folder-plus" style="color: #3b82f6;"></i> Buat Card Kategori Baru
      </h3>
      <button type="button" onclick="document.getElementById('addCategoryModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.penal_codes.store_category') }}" method="POST">
      @csrf
      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Card Kategori Baru</label>
        <input type="text" name="category_name" class="admin-input" placeholder="Contoh: PANDUAN CYBER CRIMES, DLL" required>
      </div>

      <div style="background: #0f172a; border: 1px solid #1e293b; border-radius: 8px; padding: 1rem; margin-bottom: 1.25rem;">
        <span style="font-size: 0.75rem; color: #3b82f6; font-weight: 800; text-transform: uppercase; display: block; margin-bottom: 0.5rem;">
          <i class="fa-solid fa-plus-circle"></i> Opsi Tambahkan Pasal Pertama (Opsional)
        </span>
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 0.75rem; margin-bottom: 0.75rem;">
          <input type="text" name="code" class="admin-input" placeholder="Kode (cth: (6)05)">
          <input type="text" name="title" class="admin-input" placeholder="Judul Offense">
        </div>
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 0.75rem;">
          <input type="number" name="fine" class="admin-input" placeholder="Denda ($)">
          <input type="number" name="jail_time" class="admin-input" placeholder="Penjara (Bln)">
          <select name="type" class="admin-select">
            <option value="Misdemeanor">Misdemeanor</option>
            <option value="Felony">Felony</option>
            <option value="Court Verdict">Court Verdict</option>
          </select>
        </div>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addCategoryModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Buat Card Kategori</button>
      </div>
    </form>
  </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL FORM: TAMBAH PASAL BARU -->
<!-- ========================================================================= -->
<div id="addPenalModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 540px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-plus-circle" style="color: #3b82f6;"></i> Form Tambah Pasal Baru
      </h3>
      <button type="button" onclick="document.getElementById('addPenalModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.penal_codes.store') }}" method="POST">
      @csrf
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kode Pasal</label>
          <input type="text" name="code" class="admin-input" placeholder="cth: (1)05" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Card</label>
          <input type="text" id="add_penal_category" name="category" class="admin-input" placeholder="cth: PANDUAN KASUS PERAMPOKAN" required>
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Judul Nama Pasal / Offense</label>
        <input type="text" name="title" class="admin-input" placeholder="cth: ASSAULT WITH DEADLY WEAPON" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Jumlah Denda ($)</label>
          <input type="number" name="fine" class="admin-input" placeholder="1500" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Penjara (Bulan)</label>
          <input type="number" name="jail_time" class="admin-input" placeholder="15" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Tipe Pelanggaran</label>
          <select name="type" class="admin-select">
            <option value="Misdemeanor">Misdemeanor</option>
            <option value="Felony">Felony</option>
            <option value="Court Verdict">Court Verdict</option>
          </select>
        </div>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Deskripsi / Catatan Penjelasan</label>
        <textarea name="description" class="admin-textarea" rows="3" placeholder="Penjelasan pasal hukum..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addPenalModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Pasal</button>
      </div>
    </form>
  </div>
</div>

<!-- ========================================================================= -->
<!-- MODAL FORM: EDIT PASAL -->
<!-- ========================================================================= -->
<div id="editPenalModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 540px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: #3b82f6;"></i> Form Edit Pasal Penal Code
      </h3>
      <button type="button" onclick="document.getElementById('editPenalModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editPenalForm" method="POST">
      @csrf
      @method('PUT')
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kode Pasal</label>
          <input type="text" id="edit_code" name="code" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Card</label>
          <input type="text" id="edit_category" name="category" class="admin-input" required>
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Judul Nama Pasal / Offense</label>
        <input type="text" id="edit_title" name="title" class="admin-input" required>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Jumlah Denda ($)</label>
          <input type="text" id="edit_fine" name="fine" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Penjara (Bulan)</label>
          <input type="text" id="edit_jail_time" name="jail_time" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Tipe Pelanggaran</label>
          <select id="edit_type" name="type" class="admin-select">
            <option value="Misdemeanor">Misdemeanor</option>
            <option value="Felony">Felony</option>
            <option value="Court Verdict">Court Verdict</option>
          </select>
        </div>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Deskripsi / Catatan Penjelasan</label>
        <textarea id="edit_description" name="description" class="admin-textarea" rows="3"></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editPenalModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Pasal</button>
      </div>
    </form>
  </div>
</div>

<!-- Custom LSPD Delete Confirmation Modal -->
<div id="customConfirmModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.82); z-index: 9999; align-items: center; justify-content: center; backdrop-filter: blur(4px);">
  <div style="background: #131b2e; border: 1px solid #ef4444; border-radius: 14px; width: 100%; max-width: 440px; padding: 1.75rem; box-shadow: 0 10px 40px rgba(239, 68, 68, 0.35); text-align: center;">
    <div style="width: 56px; height: 56px; border-radius: 50%; background: rgba(239, 68, 68, 0.15); border: 2px solid #ef4444; color: #ef4444; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; margin: 0 auto 1.1rem auto;">
      <i class="fa-solid fa-triangle-exclamation"></i>
    </div>
    <h3 style="margin: 0 0 0.5rem 0; color: #ffffff; font-size: 1.2rem; font-weight: 800;">Konfirmasi Hapus Pasal</h3>
    <p style="margin: 0 0 1.5rem 0; color: #94a3b8; font-size: 0.88rem; line-height: 1.5;" id="confirmModalText">
      Apakah Anda yakin ingin menghapus pasal ini?
    </p>
    <div style="display: flex; gap: 0.75rem; justify-content: center;">
      <button type="button" onclick="closeCustomConfirmModal()" class="btn-secondary-admin" style="padding: 0.55rem 1.35rem; font-size: 0.85rem;">Batal</button>
      <button type="button" onclick="executePendingDelete()" class="btn-admin" style="background: #dc2626; color: #ffffff; padding: 0.55rem 1.35rem; font-size: 0.85rem; border: none; cursor: pointer;">
        <i class="fa-solid fa-trash"></i> Ya, Hapus Pasal
      </button>
    </div>
  </div>
</div>

<script>
let pendingDeleteForm = null;

function confirmDeletePenal(event, form, codeName) {
  event.preventDefault();
  pendingDeleteForm = form;
  document.getElementById('confirmModalText').innerText = `Apakah Anda yakin ingin menghapus pasal "${codeName}"? Perubahan ini akan langsung diperbarui di Public MDC.`;
  document.getElementById('customConfirmModal').style.display = 'flex';
  return false;
}

function closeCustomConfirmModal() {
  pendingDeleteForm = null;
  document.getElementById('customConfirmModal').style.display = 'none';
}

function executePendingDelete() {
  if (pendingDeleteForm) {
    const formToSubmit = pendingDeleteForm;
    closeCustomConfirmModal();
    formToSubmit.submit();
  }
}

function openAddCategoryModal() {
  document.getElementById('addCategoryModal').style.display = 'flex';
}

function openAddPenalModal(presetCategory = '') {
  if (presetCategory) {
    document.getElementById('add_penal_category').value = presetCategory;
  }
  document.getElementById('addPenalModal').style.display = 'flex';
}

function openEditFromData(btn) {
  if (!btn) return;
  const id = btn.getAttribute('data-id');
  const code = btn.getAttribute('data-code');
  const category = btn.getAttribute('data-category');
  const title = btn.getAttribute('data-title');
  const fine = btn.getAttribute('data-fine');
  const jail = btn.getAttribute('data-jail');
  const type = btn.getAttribute('data-type');
  const desc = btn.getAttribute('data-desc');

  document.getElementById('editPenalForm').action = "/admin/penal-codes/" + id;
  document.getElementById('edit_code').value = code || '';
  document.getElementById('edit_category').value = category || '';
  document.getElementById('edit_title').value = title || '';
  document.getElementById('edit_fine').value = fine || '';
  document.getElementById('edit_jail_time').value = jail || '';
  document.getElementById('edit_type').value = type || 'Misdemeanor';
  document.getElementById('edit_description').value = desc || '';
  document.getElementById('editPenalModal').style.display = 'flex';
}

function openEditPenalModalFromBtn(btn) {
  if (!btn) return;
  const jsonStr = btn.getAttribute('data-json');
  if (jsonStr) {
    try {
      const pc = JSON.parse(jsonStr);
      openEditPenalModal(pc);
      return;
    } catch(e) {
      console.warn("JSON parse error, using dataset fallback:", e);
    }
  }
  openEditFromData(btn);
}

function openEditPenalModal(pc) {
  document.getElementById('editPenalForm').action = "/admin/penal-codes/" + pc.id;
  document.getElementById('edit_code').value = pc.code || '';
  document.getElementById('edit_category').value = pc.category || '';
  document.getElementById('edit_title').value = pc.title || '';
  document.getElementById('edit_fine').value = pc.fine !== undefined ? pc.fine : '';
  document.getElementById('edit_jail_time').value = pc.jail_time !== undefined ? pc.jail_time : '';
  document.getElementById('edit_type').value = pc.type || 'Misdemeanor';
  document.getElementById('edit_description').value = pc.description || '';
  document.getElementById('editPenalModal').style.display = 'flex';
}

function filterPenalCards(categoryVal, btn) {
  document.querySelectorAll('#penalRefCategoryFilter .btn-filter-pill').forEach(b => b.classList.remove('active'));
  if (btn) btn.classList.add('active');

  const cards = document.querySelectorAll('#penalRefCardsGrid .penal-ref-card');
  const query = document.getElementById('penalCardSearchInput').value.toLowerCase().trim();

  cards.forEach(card => {
    const cardCat = card.getAttribute('data-category') || '';
    const cardText = card.getAttribute('data-text') || '';

    const matchesCategory = (categoryVal === 'ALL') || 
      cardCat.toLowerCase().includes(categoryVal.toLowerCase());

    const matchesSearch = !query || cardText.includes(query);

    if (matchesCategory && matchesSearch) {
      card.style.display = 'flex';
    } else {
      card.style.display = 'none';
    }
  });

  updateVisibleCount();
}

function searchPenalCards(query) {
  const activeBtn = document.querySelector('#penalRefCategoryFilter .btn-filter-pill.active');
  const activeCategory = activeBtn ? activeBtn.getAttribute('data-cat-val') || 'ALL' : 'ALL';
  filterPenalCards(activeCategory, activeBtn);
}

function updateVisibleCount() {
  const cards = document.querySelectorAll('#penalRefCardsGrid .penal-ref-card');
  let visible = 0;
  cards.forEach(c => {
    if (c.style.display !== 'none') visible++;
  });
  const countEl = document.getElementById('visibleCardCount');
  if (countEl) countEl.innerText = visible;
}
</script>
@endsection

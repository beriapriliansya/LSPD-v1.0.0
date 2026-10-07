<section id="tab-weapon-classes" class="tab-content">
  <div class="section-header-row">
    <div class="section-title">
      <h2>Klasifikasi Senjata & Force Matrix</h2>
      <span>WEAPON PERMITS & ENGAGEMENT LEVELS</span>
    </div>

    <div class="section-nav-pills">
      <a href="#police-weapons" class="sub-nav-pill"><i class="fa-solid fa-shield-halved"></i> Police Weapons</a>
      <a href="#criminal-weapons" class="sub-nav-pill"><i class="fa-solid fa-gun"></i> Criminal Weapons</a>
    </div>

    <button class="btn-pdf-export" onclick="window.print()">
      <i class="fa-solid fa-file-pdf"></i> Cetak Dokumen / Save as PDF
    </button>
  </div>

  @php
    $policeClasses = isset($weaponClasses) ? $weaponClasses->filter(fn($w) => str_contains(strtolower($w->class_name), 'police')) : collect();
    $criminalClasses = isset($weaponClasses) ? $weaponClasses->filter(fn($w) => str_contains(strtolower($w->class_name), 'criminal')) : collect();
  @endphp

  <!-- 1. POLICE WEAPONS -->
  <div id="police-weapons" style="margin-bottom:2rem;">
    <h3 style="font-size:1.15rem; color:var(--text-main); font-weight:800; margin-bottom:1rem; display:flex; align-items:center; gap:0.6rem;">
      <i class="fa-solid fa-shield-halved" style="color:#3b82f6;"></i> POLICE WEAPONS
    </h3>

    <div class="weapon-grid">
      @forelse($policeClasses as $item)
        @php
          $weapons = array_map('trim', explode(',', $item->allowed_weapons));
          $label = strtoupper(str_replace('Police ', '', $item->class_name));
        @endphp
        <div class="weapon-card">
          <div class="weapon-card-header police">{{ $label }}</div>
          <div class="weapon-card-body">
            <ul class="weapon-list">
              @foreach($weapons as $weaponName)
                @if(!empty($weaponName))
                  <li>{{ $weaponName }}</li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      @empty
        <div style="color: #64748b; font-size: 0.85rem;">Belum ada data senjata polisi terdaftar.</div>
      @endforelse
    </div>
  </div>

  <!-- 2. CRIMINAL WEAPONS -->
  <div id="criminal-weapons" style="margin-bottom:2rem;">
    <h3 style="font-size:1.15rem; color:var(--text-main); font-weight:800; margin-bottom:1rem; display:flex; align-items:center; gap:0.6rem;">
      <i class="fa-solid fa-gun" style="color:#ef4444;"></i> CRIMINAL WEAPONS
    </h3>

    <div class="weapon-grid">
      @forelse($criminalClasses as $item)
        @php
          $weapons = array_map('trim', explode(',', $item->allowed_weapons));
          $label = strtoupper(str_replace('Criminal ', '', $item->class_name));
        @endphp
        <div class="weapon-card">
          <div class="weapon-card-header criminal">{{ $label }}</div>
          <div class="weapon-card-body">
            <ul class="weapon-list">
              @foreach($weapons as $weaponName)
                @if(!empty($weaponName))
                  <li>{{ $weaponName }}</li>
                @endif
              @endforeach
            </ul>
          </div>
        </div>
      @empty
        <div style="color: #64748b; font-size: 0.85rem;">Belum ada data senjata kriminal terdaftar.</div>
      @endforelse
    </div>
  </div>
</section>
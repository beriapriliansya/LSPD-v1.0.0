@extends('admin.layouts.admin')

@section('title', 'Manajemen Roster Petugas - LSPD Admin Console')
@section('header_title', 'Kelola Roster & Data Petugas LSPD')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Roster Personel LSPD</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola data anggota, nomor badge, pangkat, serta status tugas dinas.</span>
    </div>

    <!-- Add Officer Button -->
    <button type="button" onclick="document.getElementById('addOfficerModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-user-plus"></i> Tambah Petugas Baru
    </button>
  </div>

  <!-- Search & Category Filter Control Bar -->
  <form action="{{ route('admin.officers') }}" method="GET" style="background: #0f172a; border: 1px solid var(--admin-border); border-radius: 10px; padding: 0.85rem 1rem; margin-bottom: 1.25rem; display: flex; flex-wrap: wrap; gap: 0.75rem; align-items: center;">
    
    <!-- Search Input -->
    <div style="flex: 2; min-width: 220px; position: relative;">
      <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%); color: #64748b; font-size: 0.85rem;"></i>
      <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama petugas, badge #, divisi, atau rank..." class="admin-input" style="padding-left: 2.3rem;">
    </div>

    <!-- Category Filter: Divisi -->
    <div style="flex: 1; min-width: 160px;">
      <select name="division" class="admin-select">
        <option value="">-- Semua Divisi --</option>
        @foreach($divisions as $div)
          <option value="{{ $div }}" {{ request('division') == $div ? 'selected' : '' }}>{{ $div }}</option>
        @endforeach
      </select>
    </div>

    <!-- Category Filter: Status Duty -->
    <div style="flex: 1; min-width: 150px;">
      <select name="duty_status" class="admin-select">
        <option value="">-- Semua Status --</option>
        <option value="10-8" {{ request('duty_status') == '10-8' ? 'selected' : '' }}>10-8 | ON DUTY</option>
        <option value="10-6" {{ request('duty_status') == '10-6' ? 'selected' : '' }}>10-6 | BUSY</option>
        <option value="10-7" {{ request('duty_status') == '10-7' ? 'selected' : '' }}>10-7 | OFF DUTY</option>
      </select>
    </div>

    <!-- Category Filter: Pangkat (Rank) -->
    <div style="flex: 1; min-width: 160px;">
      <select name="rank" class="admin-select">
        <option value="">-- Semua Pangkat --</option>
        @foreach($ranks as $rnk)
          <option value="{{ $rnk }}" {{ request('rank') == $rnk ? 'selected' : '' }}>{{ $rnk }}</option>
        @endforeach
      </select>
    </div>

    <!-- Action Buttons -->
    <div style="display: flex; gap: 0.5rem; align-items: center;">
      <button type="submit" class="btn-admin" style="padding: 0.55rem 1rem; border-radius: 6px;">
        <i class="fa-solid fa-filter"></i> Filter
      </button>

      @if(request()->hasAny(['search', 'division', 'duty_status', 'rank']))
        <a href="{{ route('admin.officers') }}" class="btn-secondary-admin" style="padding: 0.55rem 0.85rem; border-radius: 6px; text-decoration: none; display: inline-flex; align-items: center; gap: 0.35rem;">
          <i class="fa-solid fa-rotate-left"></i> Reset
        </a>
      @endif
    </div>
  </form>

  <!-- Data Table -->
  <table class="admin-table">
    <thead>
      <tr>
        <th>Badge #</th>
        <th>Nama Petugas</th>
        <th>Pangkat (Rank)</th>
        <th>Divisi</th>
        <th>Status Dinas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($officers as $off)
        <tr>
          <td><strong style="color: var(--admin-gold); font-family: var(--font-mono);">#{{ $off->badge_number }}</strong></td>
          <td style="font-weight: 700;">{{ $off->name }}</td>
          <td><span style="color: #38bdf8; font-weight: 600;">{{ $off->rank }}</span></td>
          <td>{{ $off->division }}</td>
          <td>
            @if($off->duty_status === '10-8')
              <span style="background: rgba(16,185,129,0.15); color: #10b981; border: 1px solid #10b981; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">10-8 ON DUTY</span>
            @elseif($off->duty_status === '10-6')
              <span style="background: rgba(245,158,11,0.15); color: #f59e0b; border: 1px solid #f59e0b; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">10-6 BUSY</span>
            @else
              <span style="background: rgba(239,68,68,0.15); color: #ef4444; border: 1px solid #ef4444; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">10-7 OFF DUTY</span>
            @endif
          </td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditOfficerModal({{ json_encode($off) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.officers.destroy', $off->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus petugas ini dari Roster?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn-danger-admin">
                <i class="fa-solid fa-trash"></i> Hapus
              </button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="6" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada data petugas terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top: 1rem;">
    {{ $officers->links('admin.partials.pagination') }}
  </div>
</div>

<!-- Modal Form: Add Officer -->
<div id="addOfficerModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-user-shield" style="color: var(--admin-gold);"></i> Form Tambah Petugas Roster
      </h3>
      <button type="button" onclick="document.getElementById('addOfficerModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.officers.store') }}" method="POST">
      @csrf
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Lengkap Petugas</label>
          <input type="text" name="name" class="admin-input" required placeholder="Milo Hale">
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nomor Badge (Unique)</label>
          <input type="text" name="badge_number" class="admin-input" required placeholder="71503">
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Pangkat (Rank)</label>
          <select name="rank" class="admin-select">
            <option value="Commissioner">Commissioner</option>
            <option value="Chief of Police">Chief of Police</option>
            <option value="Assistant Chief of Police">Assistant Chief of Police</option>
            <option value="Deputy Chief">Deputy Chief</option>
            <option value="Commander">Commander</option>
            <option value="Captain">Captain</option>
            <option value="Lieutenant">Lieutenant</option>
            <option value="Detective III">Detective III</option>
            <option value="Detective II">Detective II</option>
            <option value="Detective I">Detective I</option>
            <option value="Detective">Detective</option>
            <option value="Sergeant II">Sergeant II</option>
            <option value="Sergeant I">Sergeant I</option>
            <option value="Sergeant">Sergeant</option>
            <option value="Police Officer III">Police Officer III</option>
            <option value="Police Officer II">Police Officer II</option>
            <option value="Rookie">Rookie</option>
          </select>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Divisi Unit</label>
          <input type="text" name="division" class="admin-input" required value="Patrol Division">
        </div>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Status Tugas Awal</label>
        <select name="duty_status" class="admin-select">
          <option value="10-8">10-8 | ON DUTY</option>
          <option value="10-6">10-6 | BUSY / CODE 6</option>
          <option value="10-7">10-7 | OFF DUTY</option>
        </select>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addOfficerModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Petugas</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Officer -->
<div id="editOfficerModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Data Petugas
      </h3>
      <button type="button" onclick="document.getElementById('editOfficerModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editOfficerForm" method="POST">
      @csrf
      @method('PUT')
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Lengkap Petugas</label>
          <input type="text" id="edit_officer_name" name="name" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nomor Badge</label>
          <input type="text" id="edit_officer_badge" name="badge_number" class="admin-input" required>
        </div>
      </div>

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Pangkat (Rank)</label>
          <select id="edit_officer_rank" name="rank" class="admin-select">
            <option value="Commissioner">Commissioner</option>
            <option value="Chief of Police">Chief of Police</option>
            <option value="Assistant Chief of Police">Assistant Chief of Police</option>
            <option value="Deputy Chief">Deputy Chief</option>
            <option value="Commander">Commander</option>
            <option value="Captain">Captain</option>
            <option value="Lieutenant">Lieutenant</option>
            <option value="Detective III">Detective III</option>
            <option value="Detective II">Detective II</option>
            <option value="Detective I">Detective I</option>
            <option value="Detective">Detective</option>
            <option value="Sergeant II">Sergeant II</option>
            <option value="Sergeant I">Sergeant I</option>
            <option value="Sergeant">Sergeant</option>
            <option value="Police Officer III">Police Officer III</option>
            <option value="Police Officer II">Police Officer II</option>
            <option value="Rookie">Rookie</option>
          </select>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Divisi Unit</label>
          <input type="text" id="edit_officer_division" name="division" class="admin-input" required>
        </div>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Status Tugas</label>
        <select id="edit_officer_status" name="duty_status" class="admin-select">
          <option value="10-8">10-8 | ON DUTY</option>
          <option value="10-6">10-6 | BUSY / CODE 6</option>
          <option value="10-7">10-7 | OFF DUTY</option>
        </select>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editOfficerModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Petugas</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditOfficerModal(off) {
  document.getElementById('editOfficerForm').action = "/admin/officers/" + off.id;
  document.getElementById('edit_officer_name').value = off.name;
  document.getElementById('edit_officer_badge').value = off.badge_number;
  document.getElementById('edit_officer_rank').value = off.rank;
  document.getElementById('edit_officer_division').value = off.division;
  document.getElementById('edit_officer_status').value = off.duty_status || '10-8';
  document.getElementById('editOfficerModal').style.display = 'block';
}
</script>
@endsection

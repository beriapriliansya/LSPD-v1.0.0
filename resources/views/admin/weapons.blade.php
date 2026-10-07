@extends('admin.layouts.admin')

@section('title', 'Manajemen Weapon Classes - LSPD Admin Console')
@section('header_title', 'Kelola Klasifikasi Senjata & Izin')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Klasifikasi Senjata Dinas</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola klasifikasi izin penggunaan senjata berdasarkan tingkatan pangkat.</span>
    </div>

    <button type="button" onclick="document.getElementById('addWeaponModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-plus"></i> Tambah Klasifikasi Baru
    </button>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Kelas Senjata</th>
        <th>Izin Pangkat (Allowed Ranks)</th>
        <th>Daftar Senjata Diizinkan</th>
        <th>Aturan Penggunaan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($weapons as $w)
        <tr>
          <td><strong style="color: var(--admin-gold);">{{ $w->class_name }}</strong></td>
          <td><span style="color: #38bdf8; font-weight: 700;">{{ $w->allowed_ranks }}</span></td>
          <td style="color: #ffffff;">{{ $w->allowed_weapons }}</td>
          <td><span style="color: #94a3b8; font-size: 0.8rem;">{{ $w->rules ?? '-' }}</span></td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditWeaponModal({{ json_encode($w) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.weapons.destroy', $w->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus klasifikasi ini?')">
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
          <td colspan="5" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada klasifikasi senjata terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal Form: Add Weapon Class -->
<div id="addWeaponModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-gun" style="color: var(--admin-gold);"></i> Form Tambah Klasifikasi Senjata
      </h3>
      <button type="button" onclick="document.getElementById('addWeaponModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.weapons.store') }}" method="POST">
      @csrf
      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Kelas Senjata (misal: Class 1)</label>
        <input type="text" name="class_name" class="admin-input" required placeholder="Class 1: Standard Sidearms">
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Batas Pangkat Izin (Allowed Ranks)</label>
        <input type="text" name="allowed_ranks" class="admin-input" required placeholder="Rookie & Above">
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Daftar Jenis Senjata</label>
        <input type="text" name="allowed_weapons" class="admin-input" required placeholder="Combat Pistol, Taser, Nightstick">
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Aturan Penggunaan Dinas</label>
        <textarea name="rules" class="admin-textarea" rows="3" placeholder="Aturan eskalasi senjata..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addWeaponModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Klasifikasi</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Weapon Class -->
<div id="editWeaponModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Klasifikasi Senjata
      </h3>
      <button type="button" onclick="document.getElementById('editWeaponModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editWeaponForm" method="POST">
      @csrf
      @method('PUT')
      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Kelas Senjata</label>
        <input type="text" id="edit_weapon_class" name="class_name" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Batas Pangkat Izin (Allowed Ranks)</label>
        <input type="text" id="edit_weapon_ranks" name="allowed_ranks" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Daftar Jenis Senjata</label>
        <input type="text" id="edit_weapon_weapons" name="allowed_weapons" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Aturan Penggunaan Dinas</label>
        <textarea id="edit_weapon_rules" name="rules" class="admin-textarea" rows="3"></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editWeaponModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Klasifikasi</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditWeaponModal(w) {
  document.getElementById('editWeaponForm').action = "/admin/weapons/" + w.id;
  document.getElementById('edit_weapon_class').value = w.class_name;
  document.getElementById('edit_weapon_ranks').value = w.allowed_ranks;
  document.getElementById('edit_weapon_weapons').value = w.allowed_weapons;
  document.getElementById('edit_weapon_rules').value = w.rules || '';
  document.getElementById('editWeaponModal').style.display = 'block';
}
</script>
@endsection

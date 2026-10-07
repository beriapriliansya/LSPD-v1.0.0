@extends('admin.layouts.admin')

@section('title', 'Manajemen Incident Command - LSPD Admin Console')
@section('header_title', 'Kelola Struktur Incident Command & Peran')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Incident Command Hierarchy & Peran</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola struktur penanggung jawab komando insiden besar (Incident Commander, Tactical Lead, dll).</span>
    </div>

    <button type="button" onclick="document.getElementById('addIncidentModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-plus"></i> Tambah Peran Komando
    </button>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Nama Peran Komando</th>
        <th>Syarat Pangkat Minimum</th>
        <th>Tanggung Jawab Utama</th>
        <th>Panduan SOP</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($incidents as $inc)
        <tr>
          <td><strong style="color: var(--admin-gold);">{{ $inc->role_name }}</strong></td>
          <td><span style="color: #38bdf8; font-weight: 700;">{{ $inc->rank_required }}</span></td>
          <td style="color: #ffffff;">{{ $inc->responsibilities }}</td>
          <td><span style="color: #94a3b8; font-size: 0.8rem;">{{ $inc->sop_guidelines ?? '-' }}</span></td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditIncidentModal({{ json_encode($inc) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.incidents.destroy', $inc->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peran ini?')">
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
          <td colspan="5" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada struktur incident command terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal Form: Add Incident Command -->
<div id="addIncidentModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-sitemap" style="color: var(--admin-gold);"></i> Form Tambah Peran Incident Command
      </h3>
      <button type="button" onclick="document.getElementById('addIncidentModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.incidents.store') }}" method="POST">
      @csrf
      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Peran Komando (misal: Incident Commander)</label>
        <input type="text" name="role_name" class="admin-input" required placeholder="Incident Commander (IC)">
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Syarat Pangkat Minimum</label>
        <input type="text" name="rank_required" class="admin-input" required placeholder="Sergeant I & Above">
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Tanggung Jawab Utama</label>
        <textarea name="responsibilities" class="admin-textarea" rows="3" required placeholder="Mengambil alih seluruh komando di TKP perampokan/insiden..."></textarea>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Panduan SOP Khusus</label>
        <textarea name="sop_guidelines" class="admin-textarea" rows="2" placeholder="Panduan khusus..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addIncidentModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Peran</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Incident Command -->
<div id="editIncidentModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Peran Incident Command
      </h3>
      <button type="button" onclick="document.getElementById('editIncidentModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editIncidentForm" method="POST">
      @csrf
      @method('PUT')
      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Peran Komando</label>
        <input type="text" id="edit_inc_role" name="role_name" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Syarat Pangkat Minimum</label>
        <input type="text" id="edit_inc_rank" name="rank_required" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Tanggung Jawab Utama</label>
        <textarea id="edit_inc_responsibilities" name="responsibilities" class="admin-textarea" rows="3" required></textarea>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Panduan SOP Khusus</label>
        <textarea id="edit_inc_sop" name="sop_guidelines" class="admin-textarea" rows="2"></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editIncidentModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Peran</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditIncidentModal(inc) {
  document.getElementById('editIncidentForm').action = "/admin/incidents/" + inc.id;
  document.getElementById('edit_inc_role').value = inc.role_name;
  document.getElementById('edit_inc_rank').value = inc.rank_required;
  document.getElementById('edit_inc_responsibilities').value = inc.responsibilities;
  document.getElementById('edit_inc_sop').value = inc.sop_guidelines || '';
  document.getElementById('editIncidentModal').style.display = 'block';
}
</script>
@endsection

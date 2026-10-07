@extends('admin.layouts.admin')

@section('title', 'Manajemen Prosedur Taktis - LSPD Admin Console')
@section('header_title', 'Kelola SOP & Prosedur Taktis Lapangan')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Prosedur Taktis & SOP Respon</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola alur prosedur Traffic Stop, Pursuit, Felony Stop, dan Active Shooter.</span>
    </div>

    <button type="button" onclick="document.getElementById('addTacticalModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-plus"></i> Tambah Prosedur Taktis
    </button>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Kategori</th>
        <th>Judul Prosedur</th>
        <th>Langkah-Langkah (Steps)</th>
        <th>Aturan / Rule Tambahan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($tacticals as $t)
        <tr>
          <td><span style="color: #38bdf8; font-weight: 700;">{{ $t->category }}</span></td>
          <td style="font-weight: 700; color: #ffffff;">{{ $t->title }}</td>
          <td><span style="color: #cbd5e1; font-size: 0.8rem;">{{ Str::limit($t->steps, 90) }}</span></td>
          <td><span style="color: #94a3b8; font-size: 0.8rem;">{{ Str::limit($t->rules ?? '-', 50) }}</span></td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditTacticalModal({{ json_encode($t) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.tactical.destroy', $t->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus prosedur ini?')">
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
          <td colspan="5" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada prosedur taktis terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top: 1rem;">
    {{ $tacticals->links('admin.partials.pagination') }}
  </div>
</div>

<!-- Modal Form: Add Tactical -->
<div id="addTacticalModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 520px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-crosshairs" style="color: var(--admin-gold);"></i> Form Tambah Prosedur Taktis
      </h3>
      <button type="button" onclick="document.getElementById('addTacticalModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.tactical.store') }}" method="POST">
      @csrf
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Prosedur</label>
          <input type="text" name="category" class="admin-input" required placeholder="Traffic Stop / Felony Stop">
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Judul Prosedur</label>
          <input type="text" name="title" class="admin-input" required placeholder="Prosedur High-Risk Vehicle Stop">
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Langkah-Langkah Operasional (Steps)</label>
        <textarea name="steps" class="admin-textarea" rows="4" required placeholder="1. Nyalakan sirine... 2. Instruksikan pengemudi matikan mesin..."></textarea>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Aturan / Catatan Tambahan (Optional)</label>
        <textarea name="rules" class="admin-textarea" rows="2" placeholder="Aturan tambahan..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addTacticalModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Prosedur</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Tactical -->
<div id="editTacticalModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 520px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Prosedur Taktis
      </h3>
      <button type="button" onclick="document.getElementById('editTacticalModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editTacticalForm" method="POST">
      @csrf
      @method('PUT')
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Prosedur</label>
          <input type="text" id="edit_tac_category" name="category" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Judul Prosedur</label>
          <input type="text" id="edit_tac_title" name="title" class="admin-input" required>
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Langkah-Langkah Operasional (Steps)</label>
        <textarea id="edit_tac_steps" name="steps" class="admin-textarea" rows="4" required></textarea>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Aturan / Catatan Tambahan (Optional)</label>
        <textarea id="edit_tac_rules" name="rules" class="admin-textarea" rows="2"></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editTacticalModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Prosedur</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditTacticalModal(t) {
  document.getElementById('editTacticalForm').action = "/admin/tactical/" + t.id;
  document.getElementById('edit_tac_category').value = t.category;
  document.getElementById('edit_tac_title').value = t.title;
  document.getElementById('edit_tac_steps').value = t.steps;
  document.getElementById('edit_tac_rules').value = t.rules || '';
  document.getElementById('editTacticalModal').style.display = 'block';
}
</script>
@endsection

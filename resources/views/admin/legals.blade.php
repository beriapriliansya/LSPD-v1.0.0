@extends('admin.layouts.admin')

@section('title', 'Manajemen Proses Hukum & Verdict - LSPD Admin Console')
@section('header_title', 'Kelola Tahapan Proses Hukum & Alur Court Verdict')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Sistem Tahapan Proses Hukum & Hak Miranda</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola alur prosedur penangkapan, Hak Miranda, pencarian bukti, dan booking MDT.</span>
    </div>

    <button type="button" onclick="document.getElementById('addLegalModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-plus"></i> Tambah Tahapan Hukum
    </button>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>No. Step</th>
        <th>Nama Tahapan (Stage Name)</th>
        <th>Panduan & Prosedur Petugas</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($legals as $leg)
        <tr>
          <td><strong style="color: var(--admin-gold);">Step {{ $leg->step_number }}</strong></td>
          <td style="font-weight: 700; color: #38bdf8;">{{ $leg->stage_name }}</td>
          <td><span style="color: #cbd5e1; font-size: 0.82rem;">{{ $leg->guideline_text }}</span></td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditLegalModal({{ json_encode($leg) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.legals.destroy', $leg->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus tahapan ini?')">
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
          <td colspan="4" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada tahapan proses hukum terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal Form: Add Legal Procedure -->
<div id="addLegalModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-gavel" style="color: var(--admin-gold);"></i> Form Tambah Tahapan Hukum
      </h3>
      <button type="button" onclick="document.getElementById('addLegalModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.legals.store') }}" method="POST">
      @csrf
      <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nomor Urut Step</label>
          <input type="number" name="step_number" class="admin-input" required value="1">
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Tahapan (misal: Miranda Warning)</label>
          <input type="text" name="stage_name" class="admin-input" required placeholder="Miranda Rights Reading">
        </div>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Instruksi & Teks Prosedur</label>
        <textarea name="guideline_text" class="admin-textarea" rows="4" required placeholder="Teks instruksi..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addLegalModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Tahapan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Legal Procedure -->
<div id="editLegalModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Tahapan Hukum
      </h3>
      <button type="button" onclick="document.getElementById('editLegalModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editLegalForm" method="POST">
      @csrf
      @method('PUT')
      <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nomor Urut Step</label>
          <input type="number" id="edit_leg_step" name="step_number" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Nama Tahapan</label>
          <input type="text" id="edit_leg_stage" name="stage_name" class="admin-input" required>
        </div>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Instruksi & Teks Prosedur</label>
        <textarea id="edit_leg_guideline" name="guideline_text" class="admin-textarea" rows="4" required></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editLegalModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Tahapan</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditLegalModal(leg) {
  document.getElementById('editLegalForm').action = "/admin/legals/" + leg.id;
  document.getElementById('edit_leg_step').value = leg.step_number || 1;
  document.getElementById('edit_leg_stage').value = leg.stage_name;
  document.getElementById('edit_leg_guideline').value = leg.guideline_text;
  document.getElementById('editLegalModal').style.display = 'block';
}
</script>
@endsection

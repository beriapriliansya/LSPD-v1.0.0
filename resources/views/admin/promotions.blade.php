@extends('admin.layouts.admin')

@section('title', 'Manajemen Kualifikasi Promosi - LSPD Admin Console')
@section('header_title', 'Kelola Syarat & Kualifikasi Promosi Jabatan')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Syarat Kualifikasi Promosi Pangkat</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola persyaratan administratif, performa patroli, dan ujian kenaikan pangkat.</span>
    </div>

    <button type="button" onclick="document.getElementById('addPromoModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-plus"></i> Tambah Kualifikasi Kenaikan
    </button>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Kenaikan Pangkat (From &rarr; To)</th>
        <th>Kategori Syarat</th>
        <th>Daftar Persyaratan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($promotions as $p)
        <tr>
          <td><strong style="color: var(--admin-gold);">{{ $p->from_rank }} &nbsp;&rarr;&nbsp; {{ $p->to_rank }}</strong></td>
          <td><span style="color: #38bdf8; font-weight: 700;">{{ $p->category_type }}</span></td>
          <td><span style="color: #cbd5e1; font-size: 0.82rem;">{{ $p->requirements_list }}</span></td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditPromoModal({{ json_encode($p) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.promotions.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kualifikasi ini?')">
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
          <td colspan="4" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada kualifikasi promosi terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

<!-- Modal Form: Add Promotion Qualification -->
<div id="addPromoModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-award" style="color: var(--admin-gold);"></i> Form Tambah Kualifikasi Promosi
      </h3>
      <button type="button" onclick="document.getElementById('addPromoModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.promotions.store') }}" method="POST">
      @csrf
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Pangkat Saat Ini (From)</label>
          <input type="text" name="from_rank" class="admin-input" required placeholder="Police Officer I">
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Pangkat Tujuan (To)</label>
          <input type="text" name="to_rank" class="admin-input" required placeholder="Police Officer II">
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Persyaratan</label>
        <select name="category_type" class="admin-select">
          <option value="Administrative Requirement">Administrative Requirement</option>
          <option value="Performance Requirement">Performance Requirement</option>
          <option value="Examination Requirement">Examination Requirement</option>
        </select>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Daftar Syarat & Ketentuan</label>
        <textarea name="requirements_list" class="admin-textarea" rows="4" required placeholder="Minimal 5 Laporan Patroli, Lulus Ujian Tertulis..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addPromoModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Kualifikasi</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Promotion Qualification -->
<div id="editPromoModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Kualifikasi Promosi
      </h3>
      <button type="button" onclick="document.getElementById('editPromoModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editPromoForm" method="POST">
      @csrf
      @method('PUT')
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Pangkat Saat Ini (From)</label>
          <input type="text" id="edit_promo_from" name="from_rank" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Pangkat Tujuan (To)</label>
          <input type="text" id="edit_promo_to" name="to_rank" class="admin-input" required>
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Persyaratan</label>
        <input type="text" id="edit_promo_category" name="category_type" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Daftar Syarat & Ketentuan</label>
        <textarea id="edit_promo_requirements" name="requirements_list" class="admin-textarea" rows="4" required></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editPromoModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Kualifikasi</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditPromoModal(p) {
  document.getElementById('editPromoForm').action = "/admin/promotions/" + p.id;
  document.getElementById('edit_promo_from').value = p.from_rank;
  document.getElementById('edit_promo_to').value = p.to_rank;
  document.getElementById('edit_promo_category').value = p.category_type || 'Administrative Requirement';
  document.getElementById('edit_promo_requirements').value = p.requirements_list;
  document.getElementById('editPromoModal').style.display = 'block';
}
</script>
@endsection

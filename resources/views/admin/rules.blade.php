@extends('admin.layouts.admin')

@section('title', 'Manajemen Rules & SOP - LSPD Admin Console')
@section('header_title', 'Kelola Peraturan & SOP Operasional')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Rules & Regulations LSPD</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Kelola peraturan operasional, Use of Force Matrix, dan standar tugas.</span>
    </div>

    <button type="button" onclick="document.getElementById('addRuleModal').style.display='block'" class="btn-admin">
      <i class="fa-solid fa-plus"></i> Tambah Peraturan Baru
    </button>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Kategori</th>
        <th>Judul Peraturan</th>
        <th>Tingkat Urgensi</th>
        <th>Ringkasan Isi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($rules as $r)
        <tr>
          <td><span style="color: #38bdf8; font-weight: 700;">{{ $r->category }}</span></td>
          <td style="font-weight: 700; color: #ffffff;">{{ $r->title }}</td>
          <td>
            @if($r->importance === 'Critical')
              <span style="background: rgba(239,68,68,0.15); color: #ef4444; border: 1px solid #ef4444; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">CRITICAL</span>
            @elseif($r->importance === 'High')
              <span style="background: rgba(245,158,11,0.15); color: #f59e0b; border: 1px solid #f59e0b; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">HIGH</span>
            @else
              <span style="background: rgba(59,130,246,0.15); color: #60a5fa; border: 1px solid #60a5fa; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">STANDARD</span>
            @endif
          </td>
          <td><span style="color: #cbd5e1; font-size: 0.8rem;">{{ Str::limit($r->content, 90) }}</span></td>
          <td style="display: flex; gap: 0.35rem; align-items: center;">
            <button type="button" onclick="openEditRuleModal({{ json_encode($r) }})" class="btn-warning-admin">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </button>
            <form action="{{ route('admin.rules.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus peraturan ini?')">
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
          <td colspan="5" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada peraturan terdaftar.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top: 1rem;">
    {{ $rules->links('admin.partials.pagination') }}
  </div>
</div>

<!-- Modal Form: Add Rule -->
<div id="addRuleModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-book-bookmark" style="color: var(--admin-gold);"></i> Form Tambah Peraturan & SOP
      </h3>
      <button type="button" onclick="document.getElementById('addRuleModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form action="{{ route('admin.rules.store') }}" method="POST">
      @csrf
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Peraturan</label>
          <input type="text" name="category" class="admin-input" required placeholder="Standard Operating Procedure">
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Tingkat Urgensi</label>
          <select name="importance" class="admin-select">
            <option value="Standard">Standard</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
          </select>
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Judul Peraturan</label>
        <input type="text" name="title" class="admin-input" required placeholder="Miranda Rights Protocol">
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Isi Peraturan Lengkap</label>
        <textarea name="content" class="admin-textarea" rows="4" required placeholder="Deskripsi peraturaan..."></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('addRuleModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Simpan Peraturan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Form: Edit Rule -->
<div id="editRuleModal" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
  <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 12px; width: 100%; max-width: 500px; padding: 1.5rem; margin: 3rem auto; box-shadow: 0 10px 40px rgba(0,0,0,0.5);">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #1e293b; padding-bottom: 0.75rem;">
      <h3 style="margin: 0; color: #ffffff; font-size: 1.1rem; font-weight: 800;">
        <i class="fa-solid fa-pen-to-square" style="color: var(--admin-gold);"></i> Form Edit Peraturan & SOP
      </h3>
      <button type="button" onclick="document.getElementById('editRuleModal').style.display='none'" style="background: none; border: none; color: #94a3b8; font-size: 1.25rem; cursor: pointer;">&times;</button>
    </div>

    <form id="editRuleForm" method="POST">
      @csrf
      @method('PUT')
      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Kategori Peraturan</label>
          <input type="text" id="edit_rule_category" name="category" class="admin-input" required>
        </div>
        <div>
          <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Tingkat Urgensi</label>
          <select id="edit_rule_importance" name="importance" class="admin-select">
            <option value="Standard">Standard</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
          </select>
        </div>
      </div>

      <div style="margin-bottom: 1rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Judul Peraturan</label>
        <input type="text" id="edit_rule_title" name="title" class="admin-input" required>
      </div>

      <div style="margin-bottom: 1.25rem;">
        <label style="font-size: 0.78rem; color: #94a3b8; font-weight: 700; display: block; margin-bottom: 0.35rem;">Isi Peraturan Lengkap</label>
        <textarea id="edit_rule_content" name="content" class="admin-textarea" rows="4" required></textarea>
      </div>

      <div style="display: flex; justify-content: flex-end; gap: 0.75rem;">
        <button type="button" onclick="document.getElementById('editRuleModal').style.display='none'" class="btn-secondary-admin">Batal</button>
        <button type="submit" class="btn-admin"><i class="fa-solid fa-save"></i> Update Peraturan</button>
      </div>
    </form>
  </div>
</div>

<script>
function openEditRuleModal(r) {
  document.getElementById('editRuleForm').action = "/admin/rules/" + r.id;
  document.getElementById('edit_rule_category').value = r.category;
  document.getElementById('edit_rule_importance').value = r.importance || 'Standard';
  document.getElementById('edit_rule_title').value = r.title;
  document.getElementById('edit_rule_content').value = r.content;
  document.getElementById('editRuleModal').style.display = 'block';
}
</script>
@endsection

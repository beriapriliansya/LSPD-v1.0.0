@extends('admin.layouts.admin')

@section('title', 'Manajemen Laporan Patroli - LSPD Admin Console')
@section('header_title', 'Kelola Log & Arsip Laporan Patroli')

@section('content')
<div class="admin-card">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.25rem;">
    <div>
      <h3 style="font-size: 1.1rem; font-weight: 800; margin: 0; color: #ffffff;">Log Laporan Patroli Terdaftar</h3>
      <span style="font-size: 0.78rem; color: #94a3b8;">Daftar pengajuan laporan patroli dari anggota di lapangan.</span>
    </div>
  </div>

  <table class="admin-table">
    <thead>
      <tr>
        <th>Tanggal Kejadian</th>
        <th>Badge & Nama Petugas</th>
        <th>Stasiun</th>
        <th>Ringkasan Detail</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($reports as $rep)
        <tr>
          <td><strong style="color: var(--admin-gold); font-family: var(--font-mono);">{{ $rep->incident_date }}</strong></td>
          <td style="font-weight: 700;">#{{ $rep->badge_number }} - {{ $rep->officer_name }}</td>
          <td><span style="color: #38bdf8;">Station {{ $rep->station }}</span></td>
          <td><span style="color: #cbd5e1; font-size: 0.8rem;">{{ Str::limit($rep->incident_details, 90) }}</span></td>
          <td>
            <span style="background: rgba(16,185,129,0.15); color: #10b981; border: 1px solid #10b981; padding: 0.15rem 0.45rem; border-radius: 4px; font-weight: 800; font-size: 0.7rem;">
              {{ strtoupper($rep->status ?? 'APPROVED') }}
            </span>
          </td>
          <td>
            <form action="{{ route('admin.reports.destroy', $rep->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')">
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
          <td colspan="6" style="text-align: center; color: #64748b; padding: 1.5rem;">Belum ada arsip laporan patroli yang tersimpan di database.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div style="margin-top: 1rem;">
    {{ $reports->links('admin.partials.pagination') }}
  </div>
</div>
@endsection

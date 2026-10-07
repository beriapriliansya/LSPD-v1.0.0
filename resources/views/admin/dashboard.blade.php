@extends('admin.layouts.admin')

@section('title', 'Dashboard Overview - LSPD Admin Console')
@section('header_title', 'System Management Dashboard')

@section('content')
<!-- Welcome & Officer Profile Row -->
<div style="display: grid; grid-template-columns: 2fr 1.2fr; gap: 1.25rem; margin-bottom: 1.5rem;">
  <!-- Welcome & System Banner -->
  <div style="background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%); border: 1px solid var(--admin-border); border-left: 4px solid #3b82f6; border-radius: 14px; padding: 1.25rem 1.5rem; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 20px rgba(0,0,0,0.25);">
    <div>
      <h2 style="font-size: 1.25rem; font-weight: 900; margin: 0 0 0.35rem 0; color: #ffffff; display: flex; align-items: center; gap: 0.65rem;">
        <i class="fa-solid fa-shield-halved" style="color: #3b82f6;"></i> LSPD Management Console Overview
      </h2>
      <span style="font-size: 0.82rem; color: #94a3b8; font-weight: 500;">
        Selamat datang kembali, Officer! Seluruh sistem database Public MDC Handbook terhubung secara real-time.
      </span>
    </div>

    <div style="display: flex; gap: 0.75rem; align-items: center; margin-top: 0.85rem; flex-wrap: wrap;">
      <span style="background: rgba(16,185,129,0.15); color: #34d399; border: 1px solid rgba(16,185,129,0.3); font-size: 0.75rem; font-weight: 800; padding: 0.35rem 0.75rem; border-radius: 8px; display: inline-flex; align-items: center; gap: 0.4rem;">
        <i class="fa-solid fa-circle" style="font-size: 0.5rem; color: #10b981;"></i> SYSTEM LIVE
      </span>
      <a href="{{ route('handbook.index') }}" target="_blank" class="btn-admin" style="font-size: 0.78rem; padding: 0.38rem 0.85rem; border-radius: 8px;">
        <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Public MDC
      </a>
    </div>
  </div>

  <!-- Officer Profile Card: Milo Meletup #71302 -->
  <div style="background: linear-gradient(135deg, #131b2e 0%, #0f172a 100%); border: 1px solid rgba(59, 130, 246, 0.4); border-radius: 14px; padding: 1.15rem 1.25rem; display: flex; align-items: center; gap: 1rem; box-shadow: 0 4px 20px rgba(0,0,0,0.3); position: relative; overflow: hidden;">
    <div style="position: absolute; right: -15px; top: -15px; font-size: 5.5rem; opacity: 0.05; color: #3b82f6; pointer-events: none;">
      <i class="fa-solid fa-id-card"></i>
    </div>
    
    <!-- Profile Avatar Frame -->
    <div style="position: relative; flex-shrink: 0;">
      <img src="{{ asset('img/officers/milo_71302.png') }}" alt="Milo Meletup" style="width: 72px; height: 72px; border-radius: 12px; object-fit: cover; border: 2px solid #3b82f6; box-shadow: 0 4px 14px rgba(59, 130, 246, 0.4);">
      <span style="position: absolute; bottom: -3px; right: -3px; background: #10b981; border: 2px solid #0f172a; width: 14px; height: 14px; border-radius: 50%;" title="10-8 On Duty"></span>
    </div>

    <!-- Officer Info Details -->
    <div style="min-width: 0; flex: 1;">
      <div style="display: flex; align-items: center; gap: 0.4rem; margin-bottom: 0.25rem; flex-wrap: wrap;">
        <span style="background: rgba(59, 130, 246, 0.2); color: #60a5fa; font-family: monospace; font-size: 0.75rem; font-weight: 800; padding: 0.1rem 0.5rem; border-radius: 4px; border: 1px solid rgba(59, 130, 246, 0.3);">
          #71302
        </span>
        <span style="background: rgba(16, 185, 129, 0.15); color: #34d399; font-size: 0.68rem; font-weight: 800; padding: 0.1rem 0.45rem; border-radius: 4px;">
          10-8 ON DUTY
        </span>
      </div>
      
      <h3 style="margin: 0 0 0.15rem 0; font-size: 1.1rem; font-weight: 900; color: #ffffff; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
        Milo Meletup
      </h3>

      <div style="font-size: 0.8rem; font-weight: 700; color: #60a5fa; display: flex; align-items: center; gap: 0.35rem;">
        <i class="fa-solid fa-award" style="color: #f59e0b;"></i> Police Officer III
      </div>
    </div>
  </div>
</div>

<!-- Primary Stats Cards Grid -->
<div class="stats-grid">
  <div class="stat-box" style="--accent-color: #3b82f6;">
    <div>
      <div class="stat-number">{{ $totalPenalCodes }}</div>
      <div class="stat-label">Penal Codes (Pasal)</div>
    </div>
    <div class="stat-icon" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
      <i class="fa-solid fa-gavel"></i>
    </div>
  </div>

  <div class="stat-box" style="--accent-color: #3b82f6;">
    <div>
      <div class="stat-number">{{ $totalOfficers }}</div>
      <div class="stat-label">Total Personnel Roster</div>
    </div>
    <div class="stat-icon" style="background: rgba(59, 130, 246, 0.15); color: #3b82f6;">
      <i class="fa-solid fa-users-viewfinder"></i>
    </div>
  </div>

  <div class="stat-box" style="--accent-color: #10b981;">
    <div>
      <div class="stat-number">{{ $activeOfficers }}</div>
      <div class="stat-label">Officers On Duty (10-8)</div>
    </div>
    <div class="stat-icon" style="background: rgba(16, 185, 129, 0.15); color: #10b981;">
      <i class="fa-solid fa-tower-broadcast"></i>
    </div>
  </div>

  <div class="stat-box" style="--accent-color: #a855f7;">
    <div>
      <div class="stat-number">{{ $totalReports }}</div>
      <div class="stat-label">Patrol Reports Logged</div>
    </div>
    <div class="stat-icon" style="background: rgba(168, 85, 247, 0.15); color: #a855f7;">
      <i class="fa-solid fa-file-invoice"></i>
    </div>
  </div>
</div>

<!-- Module Direct Navigation Cards Grid -->
<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; margin-bottom: 1.5rem;">
  <a href="{{ route('admin.officers') }}" style="text-decoration: none;">
    <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 10px; padding: 1rem 1.15rem; display: flex; align-items: center; justify-content: space-between; transition: all 0.2s ease;" onmouseover="this.style.borderColor='#3b82f6'; this.style.transform='translateY(-2px)';" onmouseout="this.style.borderColor='#1e293b'; this.style.transform='translateY(0)';">
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(59, 130, 246, 0.12); display: flex; align-items: center; justify-content: center;">
          <i class="fa-solid fa-users-viewfinder" style="color: #3b82f6; font-size: 1.05rem;"></i>
        </div>
        <span style="font-size: 0.85rem; font-weight: 700; color: #e2e8f0;">Chain of Command</span>
      </div>
      <strong style="color: #3b82f6; font-size: 1.15rem; font-weight: 800;">{{ $totalOfficers }} <span style="font-size: 0.75rem; color: #64748b;">Roster</span></strong>
    </div>
  </a>

  <a href="{{ route('admin.weapons') }}" style="text-decoration: none;">
    <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 10px; padding: 1rem 1.15rem; display: flex; align-items: center; justify-content: space-between; transition: all 0.2s ease;" onmouseover="this.style.borderColor='#ef4444'; this.style.transform='translateY(-2px)';" onmouseout="this.style.borderColor='#1e293b'; this.style.transform='translateY(0)';">
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(239, 68, 68, 0.12); display: flex; align-items: center; justify-content: center;">
          <i class="fa-solid fa-gun" style="color: #ef4444; font-size: 1.05rem;"></i>
        </div>
        <span style="font-size: 0.85rem; font-weight: 700; color: #e2e8f0;">Weapon Classes</span>
      </div>
      <strong style="color: #ef4444; font-size: 1.15rem; font-weight: 800;">6 <span style="font-size: 0.75rem; color: #64748b;">Class</span></strong>
    </div>
  </a>

  <a href="{{ route('admin.penal_codes') }}" style="text-decoration: none;">
    <div style="background: #131b2e; border: 1px solid #1e293b; border-radius: 10px; padding: 1rem 1.15rem; display: flex; align-items: center; justify-content: space-between; transition: all 0.2s ease;" onmouseover="this.style.borderColor='#3b82f6'; this.style.transform='translateY(-2px)';" onmouseout="this.style.borderColor='#1e293b'; this.style.transform='translateY(0)';">
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <div style="width: 36px; height: 36px; border-radius: 8px; background: rgba(59, 130, 246, 0.12); display: flex; align-items: center; justify-content: center;">
          <i class="fa-solid fa-book-skull" style="color: #3b82f6; font-size: 1.05rem;"></i>
        </div>
        <span style="font-size: 0.85rem; font-weight: 700; color: #e2e8f0;">Penal Code Cheat</span>
      </div>
      <strong style="color: #3b82f6; font-size: 1.15rem; font-weight: 800;">{{ $totalPenalCodes }} <span style="font-size: 0.75rem; color: #64748b;">Pasal</span></strong>
    </div>
  </a>
</div>

<!-- Main Content Grid: Recent Officers Roster & Quick Actions -->
<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 1.25rem;">
  <!-- Left Column: Recent Officers Roster -->
  <div class="admin-card" style="margin-bottom: 0;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.1rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--admin-border);">
      <h3 style="font-size: 1.05rem; font-weight: 800; margin: 0; color: #ffffff; display: flex; align-items: center; gap: 0.6rem;">
        <i class="fa-solid fa-user-shield" style="color: #3b82f6;"></i> Data Petugas Terbaru
      </h3>
      <a href="{{ route('admin.officers') }}" class="btn-admin" style="font-size: 0.78rem; padding: 0.35rem 0.85rem; border-radius: 6px;">
        Lihat Semua Roster <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>

    <div style="overflow-x: auto;">
      <table class="admin-table">
        <thead>
          <tr>
            <th>Badge</th>
            <th>Nama Petugas</th>
            <th>Rank / Jabatan</th>
            <th>Divisi</th>
            <th>Status Duty</th>
          </tr>
        </thead>
        <tbody>
          @forelse($recentOfficers as $off)
            <tr>
              <td><strong style="color: #60a5fa; font-family: monospace; font-size: 0.9rem;">#{{ $off->badge_number }}</strong></td>
              <td style="font-weight: 700; color: #f8fafc;">{{ $off->name }}</td>
              <td><span style="color: #cbd5e1; font-weight: 600;">{{ $off->rank }}</span></td>
              <td><span style="color: #94a3b8; font-size: 0.8rem;">{{ $off->division }}</span></td>
              <td>
                @if($off->duty_status === '10-8')
                  <span style="background: rgba(16,185,129,0.15); color: #34d399; border: 1px solid rgba(16,185,129,0.3); padding: 0.2rem 0.6rem; border-radius: 6px; font-weight: 800; font-size: 0.72rem; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <i class="fa-solid fa-circle" style="font-size: 0.45rem;"></i> 10-8 ON DUTY
                  </span>
                @elseif($off->duty_status === '10-6')
                  <span style="background: rgba(245,158,11,0.15); color: #fbbf24; border: 1px solid rgba(245,158,11,0.3); padding: 0.2rem 0.6rem; border-radius: 6px; font-weight: 800; font-size: 0.72rem; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <i class="fa-solid fa-circle" style="font-size: 0.45rem;"></i> 10-6 BUSY
                  </span>
                @else
                  <span style="background: rgba(239,68,68,0.15); color: #f87171; border: 1px solid rgba(239,68,68,0.3); padding: 0.2rem 0.6rem; border-radius: 6px; font-weight: 800; font-size: 0.72rem; display: inline-flex; align-items: center; gap: 0.35rem;">
                    <i class="fa-solid fa-circle" style="font-size: 0.45rem;"></i> 10-7 OFF DUTY
                  </span>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" style="text-align: center; color: #64748b; padding: 2rem;">Belum ada data petugas terdaftar.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Right Column: Quick System Actions -->
  <div class="admin-card" style="margin-bottom: 0;">
    <div style="margin-bottom: 1.1rem; padding-bottom: 0.75rem; border-bottom: 1px solid var(--admin-border);">
      <h3 style="font-size: 1.05rem; font-weight: 800; margin: 0; color: #ffffff; display: flex; align-items: center; gap: 0.6rem;">
        <i class="fa-solid fa-bolt" style="color: #3b82f6;"></i> Quick Actions
      </h3>
    </div>

    <div style="display: flex; flex-direction: column; gap: 0.75rem;">
      <a href="{{ route('admin.officers') }}" class="btn-secondary-admin" style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 1rem; text-decoration: none; border-radius: 8px; transition: all 0.2s ease;">
        <span style="display: flex; align-items: center; gap: 0.65rem; font-size: 0.85rem;">
          <i class="fa-solid fa-user-plus" style="color: #3b82f6;"></i> Kelola Roster & Tambah Petugas
        </span>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; color: #64748b;"></i>
      </a>

      <a href="{{ route('admin.weapons') }}" class="btn-secondary-admin" style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 1rem; text-decoration: none; border-radius: 8px; transition: all 0.2s ease;">
        <span style="display: flex; align-items: center; gap: 0.65rem; font-size: 0.85rem;">
          <i class="fa-solid fa-gun" style="color: #ef4444;"></i> Kelola Weapon Classes
        </span>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; color: #64748b;"></i>
      </a>

      <a href="{{ route('admin.penal_codes') }}" class="btn-secondary-admin" style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 1rem; text-decoration: none; border-radius: 8px; transition: all 0.2s ease;">
        <span style="display: flex; align-items: center; gap: 0.65rem; font-size: 0.85rem;">
          <i class="fa-solid fa-plus-circle" style="color: #3b82f6;"></i> Kelola Penal Code Cheat
        </span>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; color: #64748b;"></i>
      </a>

      <a href="{{ route('handbook.index') }}" target="_blank" class="btn-secondary-admin" style="display: flex; align-items: center; justify-content: space-between; padding: 0.75rem 1rem; text-decoration: none; border-radius: 8px; transition: all 0.2s ease;">
        <span style="display: flex; align-items: center; gap: 0.65rem; font-size: 0.85rem;">
          <i class="fa-solid fa-external-link" style="color: #10b981;"></i> Open Public MDC Portal
        </span>
        <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; color: #64748b;"></i>
      </a>
    </div>
  </div>
</div>
@endsection

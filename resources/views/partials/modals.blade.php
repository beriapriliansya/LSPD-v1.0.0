  <!-- ================= MODAL: CREATE / EDIT INCIDENT REPORT ================= -->
  <div id="reportModal" class="modal-overlay">
    <div class="modal-box">
      <div class="modal-header">
        <h3><i class="fa-solid fa-file-pen" style="color:var(--color-gold);"></i> Form Laporan Kejadian Polisi</h3>
        <button class="close-modal-btn">&times;</button>
      </div>

      <form id="reportForm">
        <div class="modal-body">
          <input type="hidden" id="reportFormId">

          <div class="form-group">
            <label>Judul Kasus / Insiden *</label>
            <input type="text" id="reportTitleInput" required placeholder="Contoh: Perampokan Bank Fleeca Alta St">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Tanggal Kejadian *</label>
              <input type="date" id="reportDateInput" required>
            </div>
            <div class="form-group">
              <label>Waktu Kejadian *</label>
              <input type="text" id="reportTimeInput" placeholder="21:30" required>
            </div>
          </div>

          <div class="form-group">
            <label>Lokasi TKP *</label>
            <input type="text" id="reportLocationInput" required
              placeholder="Contoh: Vinewood Hills Store / Pillbox Hill">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Petugas Utama (Primary Officer) *</label>
              <input type="text" id="reportPrimaryOfficerInput" value="Milo Hale (#71503)" required>
            </div>
            <div class="form-group">
              <label>Unit Pendukung (Secondary Officers)</label>
              <input type="text" id="reportSecondaryOfficersInput" placeholder="Officer J. Miller (#415)">
            </div>
          </div>

          <div class="form-group">
            <label>Nama Tersangka / Suspect *</label>
            <input type="text" id="reportSuspectInput" required placeholder="Nama Lengkap Suspect">
          </div>

          <div class="form-group">
            <label>Pasal-Pasal Dikenakan *</label>
            <input type="text" id="reportChargesInput" required
              placeholder="Pasal 4.02, Pasal 3.01, Pasal 2.05 (atau klik dari Kalkulator)">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Total Denda ($)</label>
              <input type="number" id="reportFineInput" value="0">
            </div>
            <div class="form-group">
              <label>Total Penjara (Bulan/Menit)</label>
              <input type="number" id="reportJailInput" value="0">
            </div>
          </div>

          <div class="form-group">
            <label>Rincian Barang Bukti (Evidences)</label>
            <textarea id="reportEvidenceInput" rows="2"
              placeholder="1x SNS Pistol 9mm, $5000 tunai, 2x Lockpick..."></textarea>
          </div>

          <div class="form-group">
            <label>Kronologi Singkat Kejadian *</label>
            <textarea id="reportChronologyInput" rows="4" required
              placeholder="Jelaskan bagaimana insiden bermula hingga penangkapan..."></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancel-modal-btn">Batal</button>
          <button type="submit" class="btn btn-gold"><i class="fa-solid fa-floppy-disk"></i> Simpan Laporan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ================= MODAL: ADD DPO BURONAN ================= -->
  <div id="dpoModal" class="modal-overlay">
    <div class="modal-box">
      <div class="modal-header">
        <h3><i class="fa-solid fa-user-plus" style="color:var(--color-danger);"></i> Form Input Buronan (DPO)</h3>
        <button class="close-modal-btn">&times;</button>
      </div>

      <form id="dpoForm">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group">
              <label>Nama Lengkap Buronan *</label>
              <input type="text" id="dpoNameInput" required placeholder="Nama Suspect">
            </div>
            <div class="form-group">
              <label>Nama Panggilan / Alias</label>
              <input type="text" id="dpoAliasInput" placeholder="Misal: Reznov / Slim">
            </div>
          </div>

          <div class="form-group">
            <label>Tingkat Ancaman / Prioritas *</label>
            <select id="dpoPrioritySelect">
              <option value="Extreme">EXTREME (Sangat Berbahaya / Senjata Berat)</option>
              <option value="High">HIGH (Prioritas Tinggi)</option>
              <option value="Medium" selected>MEDIUM (Tindak Pidana Biasa)</option>
              <option value="Low">LOW (Buronan Ringan)</option>
            </select>
          </div>

          <div class="form-group">
            <label>Diincar Atas Kasus / Pelanggaran *</label>
            <input type="text" id="dpoWantedForInput" required placeholder="Contoh: Perampokan Bank, Penembakan Polisi">
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Lokasi Terakhir Terlihat</label>
              <input type="text" id="dpoLastSeenInput" placeholder="Misal: Sandy Shores / Mirror Park">
            </div>
            <div class="form-group">
              <label>Info Kendaraan / Plat Nomor</label>
              <input type="text" id="dpoVehicleInput" placeholder="Misal: Sultan Merah (Plat: KABUR)">
            </div>
          </div>

          <div class="form-group">
            <label>Catatan Khusus Petugas</label>
            <textarea id="dpoNotesInput" rows="3"
              placeholder="Waspadai senjata api rakitan, selalu didampingi pengawal..."></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary cancel-modal-btn">Batal</button>
          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-shield-virus"></i> Terbitkan DPO</button>
        </div>
      </form>
    </div>
  </div>

  <!-- ================= MODAL: DISCORD MARKDOWN PREVIEW ================= -->
  <div id="discordPreviewModal" class="modal-overlay">
    <div class="modal-box">
      <div class="modal-header">
        <h3><i class="fa-brands fa-discord" style="color:#5865F2;"></i> Format Laporan Discord / Forum</h3>
        <button class="close-modal-btn">&times;</button>
      </div>

      <div class="modal-body">
        <p style="font-size:0.85rem; color:var(--text-muted);">Teks di bawah ini sudah otomatis diformat dan disalin ke
          clipboard Anda. Siap untuk di-paste langsung ke channel Discord LSPD atau forum server RP Anda.</p>

        <div id="discordMarkdownPreviewBox" class="discord-preview-box">
          <!-- Text inserted via JS -->
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary cancel-modal-btn">Tutup</button>
      </div>
    </div>
  </div>
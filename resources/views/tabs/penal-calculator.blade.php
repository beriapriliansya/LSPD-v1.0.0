        <section id="tab-penal-calculator" class="tab-content">
          <div class="section-header">
            <div class="section-title">
              <h2>Kalkulator Penal Code & Barang Bukti</h2>
              <span>KALKULASI OTOMATIS BARANG BUKTI, NARKOTIKA, SANDERA, & KATALOG 241 PASAL LSPD</span>
            </div>
          </div>

          <!-- Evidence & Contraband Quantity Builder Grid -->
          <div class="card card-neon-border mb-4">
            <div class="card-header">
              <h3 style="margin:0; font-size:1.05rem; color:var(--color-gold);">
                <i class="fa-solid fa-boxes-stacked" style="color:#f59e0b;"></i> Input Barang Bukti & Kontraband Utama
              </h3>
            </div>
            <div class="card-body">
              <div class="form-grid-3" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap:1.1rem;">
                
                <!-- Sandera (Hostages) -->
                <div class="form-group" style="background:rgba(15,23,42,0.6); padding:0.75rem; border-radius:8px; border:1px solid rgba(245,158,11,0.3);">
                  <label style="font-size:0.82rem; color:#fde047; font-weight:600;"><i class="fa-solid fa-user-lock"></i> Jumlah Sandera (Hostages)</label>
                  <input type="number" id="calcHostagesQty" class="form-control-neon" min="0" value="0" placeholder="0 Orang" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Weed / Ganja Grams -->
                <div class="form-group" style="background:rgba(15,23,42,0.6); padding:0.75rem; border-radius:8px; border:1px solid rgba(52,211,153,0.3);">
                  <label style="font-size:0.82rem; color:#86efac; font-weight:600;"><i class="fa-solid fa-cannabis"></i> Weed / Ganja (Gram)</label>
                  <input type="number" id="calcWeedQty" class="form-control-neon" min="0" value="0" placeholder="0 Gram" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Meth / Sabu Grams -->
                <div class="form-group" style="background:rgba(15,23,42,0.6); padding:0.75rem; border-radius:8px; border:1px solid rgba(96,165,250,0.3);">
                  <label style="font-size:0.82rem; color:#93c5fd; font-weight:600;"><i class="fa-solid fa-pills"></i> Meth / Sabu (Gram)</label>
                  <input type="number" id="calcMethQty" class="form-control-neon" min="0" value="0" placeholder="0 Gram" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Cocaine Grams -->
                <div class="form-group" style="background:rgba(15,23,42,0.6); padding:0.75rem; border-radius:8px; border:1px solid rgba(192,132,252,0.3);">
                  <label style="font-size:0.82rem; color:#e9d5ff; font-weight:600;"><i class="fa-solid fa-capsules"></i> Cocaine / Kokain (Gram)</label>
                  <input type="number" id="calcCocaineQty" class="form-control-neon" min="0" value="0" placeholder="0 Gram" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Opium Grams -->
                <div class="form-group" style="background:rgba(15,23,42,0.6); padding:0.75rem; border-radius:8px; border:1px solid rgba(244,114,182,0.3);">
                  <label style="font-size:0.82rem; color:#fbcfe8; font-weight:600;"><i class="fa-solid fa-vial"></i> Opium (Gram)</label>
                  <input type="number" id="calcOpiumQty" class="form-control-neon" min="0" value="0" placeholder="0 Gram" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Heavy Armor Vest -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-shield-halved"></i> Heavy Armor / Rompi Vest</label>
                  <input type="number" id="calcVestQty" class="form-control-neon" min="0" value="0" placeholder="0 Rompi" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Class 1 Firearm -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-gun"></i> Senjata Class 1 (Pistol)</label>
                  <input type="number" id="calcClass1Qty" class="form-control-neon" min="0" value="0" placeholder="0 Pistol" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Class 2 Firearm -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-gun"></i> Senjata Class 2 (SMG/Shotgun)</label>
                  <input type="number" id="calcClass2Qty" class="form-control-neon" min="0" value="0" placeholder="0 SMG" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Class 3 Firearm -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-gun"></i> Senjata Class 3 (Carbine/AK)</label>
                  <input type="number" id="calcClass3Qty" class="form-control-neon" min="0" value="0" placeholder="0 Rifle" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Ammunition -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-bullseye"></i> Total Amunisi (Butir)</label>
                  <input type="number" id="calcAmmoQty" class="form-control-neon" min="0" value="0" placeholder="0 Peluru" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Illegal Money -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-money-bill-wave"></i> Uang Haram / Uang Merah ($)</label>
                  <input type="number" id="calcMoneyQty" class="form-control-neon" min="0" value="0" placeholder="$0" onchange="calculateSmartPenal()" oninput="calculateSmartPenal()">
                </div>

                <!-- Pursuit / Evading -->
                <div class="form-group">
                  <label style="font-size:0.8rem; color:#cbd5e1;"><i class="fa-solid fa-car-side"></i> Pengejaran (Evading Police)</label>
                  <select id="calcEvadingType" class="form-control-neon" onchange="calculateSmartPenal()">
                    <option value="none">Tidak Ada Pengejaran</option>
                    <option value="foot">Pengejaran Pejalan Kaki (On Foot)</option>
                    <option value="vehicle">Pengejaran Kendaraan (In Vehicle)</option>
                  </select>
                </div>

              </div>
            </div>
          </div>



          <!-- Live Active Charges & Summary Card -->
          <div class="card card-neon-border" style="border-color:var(--color-gold);">
            <div class="card-header" style="display:flex; justify-content:space-between; align-items:center;">
              <h3 style="margin:0; font-size:1.1rem; color:var(--color-gold);">
                <i class="fa-solid fa-calculator"></i> Ringkasan Total Tuntutan & Hukuman
              </h3>
              <div id="courtVerdictBadge" class="badge badge-danger" style="display:none; font-size:0.85rem; padding:0.4rem 0.8rem; background:rgba(239,68,68,0.2); border:1px solid #ef4444; color:#f87171;">
                <i class="fa-solid fa-gavel"></i> COURT VERDICT REQUIRED
              </div>
            </div>
            <div class="card-body">
              <!-- Active Charges Tags -->
              <div style="margin-bottom:1rem;">
                <label style="font-size:0.85rem; color:var(--text-muted); display:block; margin-bottom:0.5rem;">
                  Daftar Pasal Terpasang:
                </label>
                <div id="activeChargesContainer" class="active-charges-tags-container" style="display:flex; flex-wrap:wrap; gap:0.5rem; min-height:40px; padding:0.5rem; background:rgba(15,23,42,0.6); border-radius:6px; border:1px dashed rgba(255,255,255,0.15);">
                  <span style="color:var(--text-dim); font-size:0.85rem; font-style:italic;">Belum ada pasal terdeteksi atau dipilih.</span>
                </div>
              </div>

              <!-- Counter Display Box Grid -->
              <div class="summary-counter-grid" style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap:1rem; margin-bottom:1.25rem;">
                <div class="counter-box" style="background:rgba(15,23,42,0.6); padding:1rem; border-radius:8px; border:1px solid rgba(255,255,255,0.1); text-align:center;">
                  <span style="font-size:0.8rem; color:var(--text-muted); display:block;">TOTAL DENDA ($)</span>
                  <span id="calcTotalFine" style="font-size:1.6rem; font-weight:700; color:#34d399;">$0</span>
                </div>
                <div class="counter-box" style="background:rgba(15,23,42,0.6); padding:1rem; border-radius:8px; border:1px solid rgba(255,255,255,0.1); text-align:center;">
                  <span style="font-size:0.8rem; color:var(--text-muted); display:block;">TOTAL HUKUMAN PENJARA</span>
                  <span id="calcTotalMonths" style="font-size:1.6rem; font-weight:700; color:#60a5fa;">0 Bulan</span>
                </div>
                <div class="counter-box" style="background:rgba(15,23,42,0.6); padding:1rem; border-radius:8px; border:1px solid rgba(255,255,255,0.1); text-align:center;">
                  <span style="font-size:0.8rem; color:var(--text-muted); display:block;">STATUS HASIL KASUS</span>
                  <span id="calcCaseStatusText" style="font-size:1.1rem; font-weight:600; color:#f59e0b;">Standard Processing</span>
                </div>
              </div>

              <!-- Action Buttons -->
              <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                <button type="button" class="btn btn-primary" onclick="copyCalculatorDiscordReport()">
                  <i class="fa-brands fa-discord"></i> Salin Format Discord / Forum MDC
                </button>
                <button type="button" class="btn btn-secondary" onclick="resetSmartCalculator()">
                  <i class="fa-solid fa-rotate-left"></i> Reset Kalkulator
                </button>
              </div>
            </div>
          </div>
        </section>
/**
 * LSPD MDC Initial Seed Data & Storage Handler
 * Updated with complete GTA V RP Police Manual & References
 */

const DEFAULT_TEN_CODES = [
  { code: "10-1", title: "Meet me at __ — Temui saya di __", category: "Komunikasi", desc: "Temui saya di lokasi yang ditentukan." },
  { code: "10-2", title: "Good signal — Sinyal bagus", category: "Komunikasi", desc: "Penerimaan sinyal radio jernih." },
  { code: "10-3", title: "Stop transmitting — Hentikan transmisi", category: "Komunikasi", desc: "Hentikan transmisi radio / kosongkan frekuensi." },
  { code: "10-4", title: "Roger that (OK) — Diterima / Siap", category: "Komunikasi", desc: "Pesan diterima dan dimengerti." },
  { code: "10-7", title: "Out of service — Tidak bertugas", category: "Status", desc: "Petugas tidak bertugas / off duty." },
  { code: "10-8", title: "In service — Sedang bertugas", category: "Status", desc: "Petugas sedang bertugas / on duty." },
  { code: "10-9", title: "Repeat — Ulangi", category: "Komunikasi", desc: "Ulangi transmisi radio terakhir." },
  { code: "10-10", title: "Fight in progress — Perkelahian sedang berlangsung", category: "Insiden", desc: "Keributan / perkelahian di TKP." },
  { code: "10-12", title: "Standby — Tunggu / Siaga", category: "Komunikasi", desc: "Tunggu / siaga di posisi." },
  { code: "10-13A", title: "Officer down (Emergency) — Petugas terluka (Darurat)", category: "Darurat", desc: "Petugas terluka dalam situasi darurat (tembakan/serangan)." },
  { code: "10-13B", title: "Officer down (Non-emergency) — Petugas terluka (Tidak darurat)", category: "Darurat", desc: "Petugas terluka dalam situasi non-darurat (kecelakaan/pingsan)." },
  { code: "10-14", title: "Memanggil EMS / EMS tiba", category: "Bantuan", desc: "Memanggil unit EMS atau memberitahukan EMS telah tiba." },
  { code: "10-18", title: "Quickly — Segera / Cepat", category: "Komunikasi", desc: "Lakukan instruksi secara cepat / segera." },
  { code: "10-20", title: "Location — Lokasi", category: "Komunikasi", desc: "Menanyakan / menginfokan lokasi saat ini." },
  { code: "10-22", title: "Cancel — Batalkan", category: "Komunikasi", desc: "Batalkan instruksi / laporan sebelumnya." },
  { code: "10-23", title: "Arriving on location — Tiba di lokasi", category: "Status", desc: "Unit telah tiba di lokasi kejadian." },
  { code: "10-28", title: "Info plate — Informasi plat nomor", category: "Kendaraan", desc: "Pengecekan informasi plat nomor kendaraan." },
  { code: "10-29", title: "Checking criminal records — Pengecekan data kriminal", category: "Pemeriksaan", desc: "Pengecekan rekam jejak kriminal tersangka/warga." },
  { code: "10-31A", title: "Crime in progress (House Robbery) — Kejahatan berlangsung (Perampokan rumah)", category: "Insiden", desc: "Perampokan rumah sedang berlangsung." },
  { code: "10-31B", title: "Crime in progress (Store Robbery) — Kejahatan berlangsung (Perampokan toko)", category: "Insiden", desc: "Perampokan toko sedang berlangsung." },
  { code: "10-32", title: "Man with firearms — Orang membawa senjata api", category: "Darurat", desc: "Terlihat seseorang memegang / membawa senjata api." },
  { code: "10-34", title: "Suspicious behavior (Narcotics) — Aktivitas mencurigakan (Narkoba)", category: "Insiden", desc: "Aktivitas transaksi / penggunaan narkoba mencurigakan." },
  { code: "10-37", title: "Suspicious vehicle — Kendaraan mencurigakan", category: "Insiden", desc: "Terlihat kendaraan mencurigakan di area." },
  { code: "10-38", title: "Stopping suspicious vehicle (Felony) — Menghentikan kendaraan mencurigakan (Kasus berat)", category: "Pengejaran", desc: "Melakukan perhentian kendaraan mencurigakan kejahatan berat." },
  { code: "10-41", title: "On duty — Mulai bertugas", category: "Status", desc: "Petugas masuk jam kerja / patroli." },
  { code: "10-42", title: "Off duty — Selesai bertugas", category: "Status", desc: "Petugas selesai jam kerja / patroli." },
  { code: "10-45", title: "Illegal hunting — Perburuan ilegal", category: "Kriminal", desc: "Terjadi aktivitas perburuan liar / ilegal." },
  { code: "10-47", title: "Injured person — Orang terluka", category: "Bantuan", desc: "Ada warga / korban mengalami luka fisik." },
  { code: "10-50", title: "Accident — Kecelakaan", category: "Lalu Lintas", desc: "Terjadi kecelakaan lalu lintas." },
  { code: "10-52", title: "EMS needed — Membutuhkan EMS / Medis", category: "Bantuan", desc: "Membutuhkan bantuan tim medis EMS." },
  { code: "10-55", title: "Traffic stop — Pemberhentian kendaraan", category: "Lalu Lintas", desc: "Pemberhentian kendaraan lalu lintas." },
  { code: "10-57", title: "Chase in progress — Pengejaran berlangsung", category: "Pengejaran", desc: "Pengejaran tersangka sedang berlangsung." },
  { code: "10-60", title: "Vehicle description — Deskripsi kendaraan", category: "Komunikasi", desc: "Memberikan deskripsi ciri-ciri kendaraan." },
  { code: "10-61", title: "Suspect description — Deskripsi tersangka", category: "Komunikasi", desc: "Memberikan deskripsi ciri-ciri fisik tersangka." },
  { code: "10-70", title: "Fire in progress — Kebakaran berlangsung / Penembakan berlangsung", category: "Darurat", desc: "Kebakaran atau penembakan sedang terjadi di TKP." },
  { code: "10-71a", title: "Shots fired driveby — Tembakan dilepaskan (Driveby)", category: "Darurat", desc: "Penembakan dari dalam kendaraan yang berjalan." },
  { code: "10-71b", title: "Shots fired on foot — Tembakan dilepaskan (Pejalan kaki)", category: "Darurat", desc: "Penembakan yang dilakukan oleh pelaku berjalan kaki." },
  { code: "10-74", title: "Negative — Negatif / Tidak", category: "Komunikasi", desc: "Jawaban negatif atau tidak terkonfirmasi." },
  { code: "10-76", title: "En route — Dalam perjalanan ke __", category: "Status", desc: "Unit sedang dalam perjalanan menuju lokasi." },
  { code: "10-77", title: "Need assistance (Non-emergency) — Butuh bantuan (Tidak darurat)", category: "Bantuan", desc: "Membutuhkan unit pendukung biasa." },
  { code: "10-78", title: "Need assistance (Emergency) — Butuh bantuan (Darurat)", category: "Bantuan", desc: "Membutuhkan unit pendukung darurat segera." },
  { code: "10-80", title: "Officer in danger — Petugas dalam bahaya (tidak bisa merespons)", category: "Darurat", desc: "Petugas dalam bahaya jiwa & tidak bisa merespons!" },
  { code: "10-89", title: "Bomb threat — Ancaman bom", category: "Darurat", desc: "Laporan ancaman atau ditemukannya bom." },
  { code: "10-90", title: "Robbery in progress — Perampokan berlangsung (Bank/Perhiasan) Vangelico, laundro, bobcat", category: "Darurat", desc: "Perampokan besar berlangsung (Vangelico, Laundromat, Bobcat, Bank)." },
  { code: "10-94", title: "Drag racing in progress — Balapan liar berlangsung", category: "Insiden", desc: "Aktivitas balapan liar jalanan." },
  { code: "10-95", title: "Subject in custody — Tersangka sudah diamankan", category: "Status", desc: "Tersangka telah berhasil diborgol & diamankan." },
  { code: "10-97", title: "Unauthorized access — Akses tidak sah", category: "Insiden", desc: "Penerobosan area terlarang / akses tanpa izin." },
  { code: "10-98", title: "Jailbreak — Pelarian dari penjara", category: "Darurat", desc: "Upaya atau pembobolan pelarian tahanan dari penjara." },
  { code: "10-99", title: "Clearing off — Situasi selesai / meninggalkan TKP", category: "Status", desc: "TKP aman / selesai, unit meninggalkan lokasi." },
  
  // Status Codes
  { code: "Code 1", title: "No Lights or Siren / Respon Biasa", category: "Kode Respon", desc: "Patroli santai / respon tanpa sirine & lampu strobe, ikuti aturan lalu lintas." },
  { code: "Code 2", title: "Lights Only / Respon Cepat Non-Siren", category: "Kode Respon", desc: "Respon mendesak dengan lampu strobe menyala, sirine jika perlu." },
  { code: "Code 3", title: "EMERGENCY / Lights & Sirens Full", category: "Kode Respon", desc: "Respon darurat penuh! Sirine & strobe menyala, terobos lampu lalu lintas dengan hati-hati." },
  { code: "Code 4", title: "Under Control / Situasi Aman", category: "Kode Respon", desc: "Lokasi aman, tidak butuh unit tambahan." },
  { code: "Code 6", title: "Out for Investigation / Investigasi TKP", category: "Kode Respon", desc: "Petugas berada di luar kendaraan melakukan pemeriksaan lokasi." }
];

const DEFAULT_ABBREVIATIONS = [
  { term: "ADW", desc: "Assault with a Deadly Weapon (Penyerangan dengan Senjata Mematikan)" },
  { term: "ALS", desc: "Advanced Life Support (Bantuan Hidup Lanjutan)" },
  { term: "ASAP", desc: "As Soon As Possible (Secepat Mungkin)" },
  { term: "BLS", desc: "Basic Life Support (Bantuan Hidup Dasar)" },
  { term: "BOLO", desc: "Be On the Look Out (DPO / Kendaraan Buronan)" },
  { term: "DUI", desc: "Driving Under the Influence (Mengemudi Terpengaruh Alkohol/Narkoba)" },
  { term: "ETA", desc: "Estimated Time of Arrival (Estimasi Waktu Tiba)" },
  { term: "GSW", desc: "Gunshot Wound (Luka Tembak)" },
  { term: "MVA", desc: "Motor Vehicle Accident (Kecelakaan Kendaraan Bermotor)" },
  { term: "PIT", desc: "Pursuit Intervention Technique (Teknik Penghentian Pengejaran)" },
  { term: "LEO", desc: "Law Enforcement Officer (Petugas Penegak Hukum)" },
  { term: "EMS", desc: "Emergency Medical Services (Layanan Medis Darurat)" },
  { term: "TAC", desc: "Tactical Radio Channel (Saluran Radio Taktis)" },
  { term: "NCIC", desc: "National Crime Information Center (Database Kriminal)" }
];

const DEFAULT_PENAL_CODES = [
  // Lalu Lintas & Transportasi
  { id: "PC-101", code: "Pasal 1.01", title: "Pelanggaran Rambu & Lampu Merah", category: "Lalu Lintas", fine: 1500, jailMonths: 0, desc: "Menerobos lampu merah atau mengabaikan rambu lalu lintas resmi." },
  { id: "PC-102", code: "Pasal 1.02", title: "Speeding / Mengemudi Melebihi Batas Kecepatan", category: "Lalu Lintas", fine: 2500, jailMonths: 0, desc: "Mengemudi di atas batas kecepatan area zona pemukiman/kota." },
  { id: "PC-103", code: "Pasal 1.03", title: "Reckless Driving / Mengemudi Urakan", category: "Lalu Lintas", fine: 5000, jailMonths: 10, desc: "Mengendarai kendaraan secara ugal-ugalan yang membahayakan publik." },
  { id: "PC-104", code: "Pasal 1.04", title: "Driving Without License / Tanpa SIM", category: "Lalu Lintas", fine: 3000, jailMonths: 5, desc: "Mengemudi tanpa memiliki atau membawa SIM yang valid." },
  { id: "PC-105", code: "Pasal 1.05", title: "Illegal Parking / Parkir Sembarangan", category: "Lalu Lintas", fine: 1000, jailMonths: 0, desc: "Memarkirkan kendaraan di area terlarang atau mengganggu lalu lintas." },

  // Tindak Pidana Ringan & Ketertiban
  { id: "PC-201", code: "Pasal 2.01", title: "Misdemeanor Assault / Penganiayaan Ringan", category: "Pidana Ringan", fine: 4000, jailMonths: 15, desc: "Melakukan pemukulan atau kontak fisik tanpa senjata yang menyebabkan cidera ringan." },
  { id: "PC-202", code: "Pasal 2.02", title: "Vandalism / Pengrusakan Properti", category: "Pidana Ringan", fine: 3500, jailMonths: 10, desc: "Merusak barang publik atau milik orang lain secara sengaja." },
  { id: "PC-203", code: "Pasal 2.03", title: "Trespassing / Memasuki Area Terlarang", category: "Pidana Ringan", fine: 3000, jailMonths: 10, desc: "Memasuki properti pribadi atau fasilitas terlarang tanpa izin." },
  { id: "PC-204", code: "Pasal 2.04", title: "Disturbing the Peace / Mengganggu Ketertiban", category: "Pidana Ringan", fine: 2000, jailMonths: 5, desc: "Membuat keributan, kegaduhan, atau berteriak di ruang publik." },
  { id: "PC-205", code: "Pasal 2.05", title: "Resisting Arrest / Melawan Petugas", category: "Pidana Ringan", fine: 6000, jailMonths: 20, desc: "Kabur, menolak diborgol, atau memprovokasi saat hendak diamankan." },

  // Kejahatan Senjata & Narkotika
  { id: "PC-301", code: "Pasal 3.01", title: "Possession of Illegal Firearm / Senjata Ilegal Class A", category: "Senjata & Narkoba", fine: 10000, jailMonths: 25, desc: "Memiliki/membawa senjata api genggam (Pistol/Revolver) tanpa lisensi resmi." },
  { id: "PC-302", code: "Pasal 3.02", title: "Possession of Class B Firearm / Senjata Berat (SMG/Rifle)", category: "Senjata & Narkoba", fine: 20000, jailMonths: 40, desc: "Memiliki/membawa senjata otomatis, assault rifle, atau shotgun ilegal." },
  { id: "PC-303", code: "Pasal 3.03", title: "Brandishing Firearm / Mengacungkan Senjata", category: "Senjata & Narkoba", fine: 7500, jailMonths: 20, desc: "Mengeluarkan dan mengarahkan senjata api di area umum tanpa ancaman bahaya." },
  { id: "PC-304", code: "Pasal 3.04", title: "Drug Possession / Kepemilikan Narkotika (Pengguna)", category: "Senjata & Narkoba", fine: 5000, jailMonths: 15, desc: "Memiliki zat terlarang (Ganja, Meth, Cocaine) dalam kuantitas personal (< 10 gram)." },
  { id: "PC-305", code: "Pasal 3.05", title: "Drug Trafficking / Pengedar Narkotika", category: "Senjata & Narkoba", fine: 25000, jailMonths: 45, desc: "Membawa atau menjual narkotika dalam jumlah besar (> 10 gram / paket besar)." },

  // Kejahatan Berat & Terorganisir
  { id: "PC-401", code: "Pasal 4.01", title: "Grand Theft Auto / Pencurian Kendaraan", category: "Kejahatan Berat", fine: 8000, jailMonths: 20, desc: "Mencuri atau membawa kendaraan tanpa izin pemilik." },
  { id: "PC-402", code: "Pasal 4.02", title: "Armed Robbery / Perampokan Bersenjata (Toko/Fleeca)", category: "Kejahatan Berat", fine: 15000, jailMonths: 35, desc: "Melakukan perampokan toko, kasir, atau bank kecil dengan ancaman senjata." },
  { id: "PC-403", code: "Pasal 4.03", title: "Pacific Bank / Vault Robbery", category: "Kejahatan Berat", fine: 35000, jailMonths: 60, desc: "Perampokan bank besar terorganisir." },
  { id: "PC-404", code: "Pasal 4.04", title: "Attempted Murder of LEO / Percobaan Pembunuhan Polisi", category: "Kejahatan Berat", fine: 30000, jailMonths: 50, desc: "Penembakan atau penyerangan mematikan kepada aparat kepolisian." },
  { id: "PC-405", code: "Pasal 4.05", title: "Kidnapping / Penyanderaan", category: "Kejahatan Berat", fine: 20000, jailMonths: 40, desc: "Menculik atau menyandera warga / petugas kepolisian." }
];

const DEFAULT_REPORTS = [
  {
    id: "REP-2026-001",
    title: "Perampokan Toko 24/7 Vinewood Hills",
    date: "2026-09-06",
    time: "21:30",
    location: "Vinewood Boulevard 24/7 Store",
    primaryOfficer: "Officer B. Wright (#402)",
    secondaryOfficers: "Officer J. Miller (#415)",
    suspectName: "Marcus Vance",
    charges: ["Pasal 4.02 (Armed Robbery)", "Pasal 3.01 (Illegal Firearm)", "Pasal 2.05 (Resisting Arrest)"],
    fineTotal: 31000,
    jailTotal: 80,
    evidenceDetails: "1x Pistol SNS 9mm, $4,500 uang tunai curian dari kasir toko, 15 butir amunisi.",
    chronology: "Unit meluncur ke TKP setelah alarm toko berbunyi. Tersangka terlihat keluar memegang senjata api. Tersangka sempat kabur menggunakan Dominator hitam sebelum terjadi chase dan pit maneuver di Alta St. Tersangka berhasil diamankan tanpa jatuhnya korban jiwa."
  },
  {
    id: "REP-2026-002",
    title: "Pelanggaran Balap Liar & Speeding Great Ocean Hwy",
    date: "2026-09-05",
    time: "23:15",
    location: "Great Ocean Highway",
    primaryOfficer: "Officer B. Wright (#402)",
    secondaryOfficers: "-",
    suspectName: "Kenji Sato",
    charges: ["Pasal 1.02 (Speeding)", "Pasal 1.03 (Reckless Driving)"],
    fineTotal: 7500,
    jailTotal: 10,
    evidenceDetails: "Rekaman Dashcam Kecepatan 165 MPH di zona 60 MPH, Kendaraan Elegy RH8 disita sementara.",
    chronology: "Tersangka terjaring radar kecepatan tinggi saat melakukan sprint di highway. Sempat mengabaikan sirine sebelum akhirnya menepi di SPBU Chumash. Diberikan sanksi tilang & penahanan sementara."
  }
];

const DEFAULT_DPOS = [
  {
    id: "DPO-101",
    name: "Viktor 'The Butcher' Reznov",
    alias: "Reznov",
    priority: "Extreme",
    wantedFor: "Percobaan Pembunuhan Polisi, Perampokan Pacific Bank, Senjata Berat Class B",
    lastSeen: "Sandy Shores Airfield / Grapeseed",
    vehicleInfo: "Sultan RS Warna Merah Cabai (Plat: REZNOV)",
    notes: "SANGAT BERBAHAYA! Bawa amunisi berat & selalu didampingi 2-3 pengawal bersenjata.",
    status: "Active",
    dateAdded: "2026-09-01"
  },
  {
    id: "DPO-102",
    name: "Donny Gonzales",
    alias: "Slim Donny",
    priority: "High",
    wantedFor: "Pengedar Narkotika (Meth), Pencurian Kendaraan Mewah (GTA)",
    lastSeen: "Mirror Park Alley",
    vehicleInfo: "Blista Kanjo Warna Kuning (Plat: D0NNY)",
    notes: "Sering bertransaksi malam hari di gang Mirror Park. Waspadai senjata rakitan.",
    status: "Active",
    dateAdded: "2026-09-04"
  }
];

const DEFAULT_PATROL_NOTES = `=== BUKU CATATAN PATROLI LSPD ===
[2026-09-06] 
- Target Supect Pursuit: Sultan Merah Plat "K4BUR" (Kabur dari Traffic Stop di Pillbox)
- Radio Channel LSPD Primary: TAC-1 (Freq: 911.1)
- Barang bukti kasus #001 tersimpan di Locker 4-B.
- Ingat koordinasi dengan EMS jika ada insiden 10-13 di South Central.`;

const DEFAULT_CHAIN_OF_COMMAND = [
  {
    "category": "COMMISSIONER",
    "rank": "Commissioner",
    "badge": "007",
    "name": "Daxton Noa",
    "division": "High Command",
    "status": "ACTIVE"
  },
  {
    "category": "COMMISSIONER",
    "rank": "Commissioner",
    "badge": "001",
    "name": "Leon Stark",
    "division": "High Command",
    "status": "ACTIVE"
  },
  {
    "category": "COMMISSIONER",
    "rank": "Commissioner",
    "badge": "002",
    "name": "Bill Murni",
    "division": "High Command",
    "status": "ACTIVE"
  },
  {
    "category": "COMMISSIONER",
    "rank": "Commissioner",
    "badge": "003",
    "name": "Munich Quill",
    "division": "High Command",
    "status": "ACTIVE"
  },
  {
    "category": "CHIEF OF POLICE",
    "rank": "Chief of Police",
    "badge": "7000",
    "name": "Satria Gelassen",
    "division": "High Command",
    "status": "ACTIVE"
  },
  {
    "category": "ASSISTANT CHIEF",
    "rank": "Assistant Chief of Police",
    "badge": "7001",
    "name": "Mocay Gelassen",
    "division": "PATROL OPS",
    "status": "ACTIVE"
  },
  {
    "category": "ASSISTANT CHIEF",
    "rank": "Assistant Chief of Police",
    "badge": "7002",
    "name": "Michael Wiliams",
    "division": "SPECIAL OPS",
    "status": "ACTIVE"
  },
  {
    "category": "ASSISTANT CHIEF",
    "rank": "Assistant Chief of Police",
    "badge": "7003",
    "name": "Charlie Clifton",
    "division": "OIB",
    "status": "ACTIVE"
  },
  {
    "category": "ASSISTANT CHIEF",
    "rank": "Assistant Chief of Police",
    "badge": "7004",
    "name": "Nacho Murphylaw",
    "division": "ASB",
    "status": "ACTIVE"
  },
  {
    "category": "ASSISTANT CHIEF",
    "rank": "Assistant Chief of Police",
    "badge": "7005",
    "name": "Datuak Chaniago",
    "division": "PSB",
    "status": "ACTIVE"
  },
  {
    "category": "DEPUTY CHIEF",
    "rank": "Deputy Chief",
    "badge": "7006",
    "name": "Joni Riverra",
    "division": "PATROL OPS",
    "status": "ACTIVE"
  },
  {
    "category": "DEPUTY CHIEF",
    "rank": "Deputy Chief",
    "badge": "7007",
    "name": "VACANT",
    "division": "SPECIAL OPS",
    "status": "VACANT"
  },
  {
    "category": "DEPUTY CHIEF",
    "rank": "Deputy Chief",
    "badge": "7008",
    "name": "Elang Calix",
    "division": "OIB",
    "status": "ACTIVE"
  },
  {
    "category": "DEPUTY CHIEF",
    "rank": "Deputy Chief",
    "badge": "7009",
    "name": "Xylo Boom",
    "division": "ASB",
    "status": "ACTIVE"
  },
  {
    "category": "DEPUTY CHIEF",
    "rank": "Deputy Chief",
    "badge": "7010",
    "name": "Takumi Amamiya",
    "division": "PSB",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7016",
    "name": "AlvarezYzn Malaka Villanueva",
    "division": "METRO",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7017",
    "name": "Rahayu Arsenia Ambrose",
    "division": "Internal Affairs",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7018",
    "name": "Kalea Clayton Osvald",
    "division": "MCD",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7019",
    "name": "Jianyu Zhang",
    "division": "Public Affairs",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7020",
    "name": "Aaron Aldrich",
    "division": "RED",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7021",
    "name": "Jezter Cloud",
    "division": "SRT",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7022",
    "name": "Karen Cloud Stark",
    "division": "Advocacy & Legal Affairs",
    "status": "ACTIVE"
  },
  {
    "category": "COMMANDER",
    "rank": "Commander",
    "badge": "7023",
    "name": "VACANT",
    "division": "PATROL OPS",
    "status": "VACANT"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7036",
    "name": "Karim Herza",
    "division": "SWAT",
    "status": "ACTIVE"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7037",
    "name": "Tevent Riverra",
    "division": "ASD",
    "status": "ACTIVE"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7038",
    "name": "Buco Lexano",
    "division": "HSIU",
    "status": "ACTIVE"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7039",
    "name": "VACANT",
    "division": "EOD",
    "status": "VACANT"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7040",
    "name": "VACANT",
    "division": "RED",
    "status": "VACANT"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7041",
    "name": "VACANT",
    "division": "Internal Affairs",
    "status": "VACANT"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7042",
    "name": "VACANT",
    "division": "Public Affairs",
    "status": "VACANT"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "7043",
    "name": "VACANT",
    "division": "Advocacy & Legal Affairs",
    "status": "VACANT"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7061",
    "name": "Broodie Zero Ackeric",
    "division": "SWAT",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7062",
    "name": "BONAR NAIHAHAHOHO MH",
    "division": "SWAT",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7063",
    "name": "Awan D Cartier",
    "division": "SWAT",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7064",
    "name": "Darius Petrov",
    "division": "ASD",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7065",
    "name": "VACANT",
    "division": "EOD",
    "status": "VACANT"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7066",
    "name": "Aldof Reyz",
    "division": "HSIU",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7067",
    "name": "Axel Mahardika",
    "division": "Public Affairs",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7068",
    "name": "VACANT",
    "division": "Internal Affairs",
    "status": "VACANT"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7069",
    "name": "Kazukii Hayakawa Ambrose",
    "division": "RED Recruitment",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "7070",
    "name": "Zaper Quinn Villanueva",
    "division": "Red Training",
    "status": "ACTIVE"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "74001",
    "name": "Jacob Reed",
    "division": "MCD",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "74002",
    "name": "VACANT",
    "division": "Head of Homicide",
    "status": "VACANT"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "74003",
    "name": "VACANT",
    "division": "Head of Narcotics",
    "status": "VACANT"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "74004",
    "name": "VACANT",
    "division": "Head of Firearms and Trafficking",
    "status": "VACANT"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective III",
    "badge": "74101:",
    "name": "Aziel Arkhana",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective III",
    "badge": "74102:",
    "name": "Ray Citato",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective III",
    "badge": "74103:",
    "name": "Meifanny Lorenta",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective III",
    "badge": "74104:",
    "name": "Fiorella D Cartier",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective III",
    "badge": "74105:",
    "name": "PaoPao D. Cartier",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74201:",
    "name": "Putri Luther King",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74202:",
    "name": "Dadang Sungkar",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74203:",
    "name": "Sarah Romanov",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74204:",
    "name": "Kimberly Corman",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74205:",
    "name": "Martin Osvald",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74206:",
    "name": "Oliver Queen",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74207:",
    "name": "James R. Reed",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74208:",
    "name": "Talita Cloud Osvald",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective II",
    "badge": "74209:",
    "name": "Kante Kusuma",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74301:",
    "name": "Kimberly Biscoff",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74302:",
    "name": "Fyrdochenkov Miroven",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74303:",
    "name": "VACANT",
    "division": "Detective Bureau",
    "status": "VACANT"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74304:",
    "name": "Aca Putri",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74305:",
    "name": "VACANT",
    "division": "Detective Bureau",
    "status": "VACANT"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74306:",
    "name": "VACANT",
    "division": "Detective Bureau",
    "status": "VACANT"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74307:",
    "name": "Meliodas Griezman",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "DETECTIVE",
    "rank": "Detective I",
    "badge": "74308:",
    "name": "Amberly Nadlyne",
    "division": "Detective Bureau",
    "status": "ACTIVE"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "71001",
    "name": "Steven William",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "CAPTAIN",
    "rank": "Captain",
    "badge": "72001",
    "name": "Felix Jackson Villanueva",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "71002",
    "name": "Nick Cortez",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "71004",
    "name": "Jason Max",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "72002",
    "name": "Dimi Quartaro",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "LIEUTENANT",
    "rank": "Lieutenant",
    "badge": "72003",
    "name": "Benji N Sylvester",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "71101:",
    "name": "Gogon Riverra",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "71103:",
    "name": "David Off",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "71105:",
    "name": "Juvelle Biscoff",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "72101:",
    "name": "Kuroshiro Tatsu",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "72102:",
    "name": "Cody Luc. Seneschal Valonforth",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "72103:",
    "name": "Novenno B Riverra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "72104:",
    "name": "Jamaludin Zutherland",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant II",
    "badge": "72105:",
    "name": "Aldan Y. Malak",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71201:",
    "name": "Bilal Einar",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71202:",
    "name": "Reno Arab",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71203:",
    "name": "Liam Alexander Mccartney",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71204:",
    "name": "Bryant W Norgard",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71205:",
    "name": "Saeza Riverra",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71206:",
    "name": "Miko Mizu",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71207:",
    "name": "Valentine Anastacius Barkley",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71208:",
    "name": "Ramon Teramon Amamiya",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71209:",
    "name": "Maximilian Stark",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71210:",
    "name": "Gasendra Jay",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71211:",
    "name": "Daniil Alexandria",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71212:",
    "name": "Jun De Constine",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71213:",
    "name": "Joeru Ashford Petrikov",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71214:",
    "name": "Justin Q Villanueva",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "71215:",
    "name": "Marcellino Turner",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72201:",
    "name": "Bongkeng Sans",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72202:",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72203:",
    "name": "Louie Nathaniel Mccartney",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72204:",
    "name": "Ken Jeder",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72205:",
    "name": "Lucas D. Riverra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72206:",
    "name": "Kenshi Sandria",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72207",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72208",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72209",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72210:",
    "name": "Rehan Gosep",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72211:",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72212:",
    "name": "Pyollilo L Cuwtiz",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72213:",
    "name": "Agus Tepar",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72214:",
    "name": "Kazuki Hayakawa",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72215:",
    "name": "Gerry L Villanueva",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "SERGEANT",
    "rank": "Sergeant I",
    "badge": "72216:",
    "name": "Bailey Beneviento",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71301:",
    "name": "Liam Olsen",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71302:",
    "name": "Puyo Amberlyn",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71303:",
    "name": "Junpei Tan",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71304:",
    "name": "Tennq G Mccoy",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71305:",
    "name": "DJOSUA LAW",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71306:",
    "name": "Erica Akiho Cartier",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71307:",
    "name": "Smokey Blame",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71311:",
    "name": "Daniil Alexandria",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71314:",
    "name": "KOBAR KORNELLO",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71315:",
    "name": "Ucok Chaniago Jang",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71316:",
    "name": "Jovel Ackeric",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71317:",
    "name": "Yuna Mikari",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71318:",
    "name": "Luthan Pandjaitan",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71319:",
    "name": "Anzou Hart",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71320:",
    "name": "Alejandro Defincoco",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71320:",
    "name": "Franky Roronoa",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71323:",
    "name": "Cokorda Bendod",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71324:",
    "name": "Keshi Reverine",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71325:",
    "name": "Victoria Berlin Valencaera",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "71327:",
    "name": "Billy Teker",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72301:",
    "name": "Jhon Kaonak",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72302:",
    "name": "Sza Clementine Murphylaw",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72303:",
    "name": "Agera Ger",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72304:",
    "name": "Mikhail Morozov",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72305:",
    "name": "Abeyya Sandria",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72306:",
    "name": "Rafael Riverra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72307:",
    "name": "Alexander Campbell",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72308:",
    "name": "Zaasun Stark Villanueva",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72309:",
    "name": "Abdul Fawaz",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72311:",
    "name": "Antonio Del Ucup",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72313:",
    "name": "Kaze Hytam",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72314:",
    "name": "Jacody Hampton",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72315:",
    "name": "De Mario Garcia",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72316:",
    "name": "Aoki Nanda",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72317:",
    "name": "Severus Edward Graves",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72319:",
    "name": "James Serioza",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72322:",
    "name": "Lunazeline B. Stark",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72324:",
    "name": "Andrew Mikhailovich Sirohe",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72325:",
    "name": "Yuki Hayakawa",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72326:",
    "name": "Callyster Amadeuus DHM",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72329:",
    "name": "Zoey Cassander",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72330:",
    "name": "Kim Ashiro Miyamura",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72331:",
    "name": "Yoseph Beyezid",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72332:",
    "name": "Celcius A Riverra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72333:",
    "name": "James Rodriguez",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72334:",
    "name": "Arthur William",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72335:",
    "name": "Yosafat Christian Dharma",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72337:",
    "name": "Nadaraya Historia",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72338:",
    "name": "Leon Redfield",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72339:",
    "name": "Sainz Lando",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72310",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72312",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72318",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72320",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72321",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72323",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72327",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72328",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72336",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER III",
    "rank": "Police Officer III",
    "badge": "72340",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71401:",
    "name": "Kaito Nash",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71402:",
    "name": "Zha Bree",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71403:",
    "name": "Alexis Rasen",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71404:",
    "name": "Gegey Alvarez",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71405:",
    "name": "Hayate Jayendra",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71406:",
    "name": "Kris Wu",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71407:",
    "name": "Nakai San",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71408:",
    "name": "Alexander Gatot",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71409:",
    "name": "Niko Fertores",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71410:",
    "name": "Levi Audemars",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71411:",
    "name": "Chen Yu",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71412:",
    "name": "Dinda C Riverra",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71413:",
    "name": "AHORRI DJAHOEFFMANN",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71414:",
    "name": "Rafless Diyandra",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71415:",
    "name": "Alex Morel",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71416:",
    "name": "Kello Osvald",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71418:",
    "name": "Santos DS",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71425:",
    "name": "Zee Lons",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71428:",
    "name": "Rio Frank",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "71433:",
    "name": "Jovel Ackeric",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72401:",
    "name": "EL Capitao",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72402:",
    "name": "Zoey D Bweok",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72403:",
    "name": "Amar Giovanni Villanueva",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72404:",
    "name": "Kevin Shirakaze",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72405:",
    "name": "Librae G Riley",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72406:",
    "name": "Darry A Logan",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72407:",
    "name": "Em Castelo",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72408:",
    "name": "Justin De Cartville",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72409:",
    "name": "Levi Akuma",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72410:",
    "name": "Alejandro Delpino",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72411:",
    "name": "John Winstonfield",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72412:",
    "name": "Abiz Rivera",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72413:",
    "name": "Argie Windra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72414:",
    "name": "Ucup Meletup",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72415:",
    "name": "Kevin Lolong",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72416:",
    "name": "Kuro Ezra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72417:",
    "name": "Nero Leonard",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72420:",
    "name": "Anna Adriana Valonforth",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72421:",
    "name": "El Capitano",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72422:",
    "name": "Aidan Strange",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72426:",
    "name": "Bejo Kesandung",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72438:",
    "name": "Thomas Riverra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72440:",
    "name": "Benedetta Stark",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72418",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72419",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72423",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72424",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72425",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72427",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72428",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72429",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72430",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72431",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72432",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72433",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72434",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72435",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72436",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72437",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "POLICE OFFICER II",
    "rank": "Police Officer II",
    "badge": "72439",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71501:",
    "name": "Farrel Horeg",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71502:",
    "name": "Graciella Hwang",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71504:",
    "name": "Ary Luckmad",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71506:",
    "name": "Alex Morgan",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71507:",
    "name": "Jar Kocoys",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71508:",
    "name": "Mansyur Sikampang",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71509:",
    "name": "Aditya Cakra Lesmana",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71511:",
    "name": "Fernandes Bill",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71512:",
    "name": "OSCAR W STANLEY",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71513:",
    "name": "Liam Supail",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71514:",
    "name": "Shiva De Katriel",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71515:",
    "name": "Gren O Melver",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71516:",
    "name": "Doye Irving",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71518:",
    "name": "Ley Alexander",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71519:",
    "name": "Santos DS",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71521:",
    "name": "Velisse Kazumi L",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71522:",
    "name": "Rayncii Ishikawa",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71523:",
    "name": "William Turner",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71524:",
    "name": "Verlin D Icarus",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71525:",
    "name": "Richard D. Cartier",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71526:",
    "name": "Mina Sharon",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71527:",
    "name": "Victor Cartesius",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "71528:",
    "name": "David Zijlstra",
    "division": "Station 71",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72502:",
    "name": "Lamelo Tenjin",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72504:",
    "name": "Udin Ras'Ud",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72505:",
    "name": "Vin Ezra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72506:",
    "name": "Logan Fukushima",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72507:",
    "name": "Aika Amamiya",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72508:",
    "name": "Ishihara Diby Andrea",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72509:",
    "name": "Rhyn Orine",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72510:",
    "name": "Vinz M Riverra",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72511:",
    "name": "Kurniadi Misbulah",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72512:",
    "name": "Jeremiah Navarro",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72513:",
    "name": "Steve City",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72514:",
    "name": "Mateo Herrera",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72515:",
    "name": "UJANG WIFI",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72516:",
    "name": "Richie Miga",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72517:",
    "name": "Allan Antoni",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72518:",
    "name": "Jihan Tron",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72519:",
    "name": "Reinessence Lysea",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72520:",
    "name": "Alexander Luice",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72521:",
    "name": "Sakra Vanhouten",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72522:",
    "name": "Mamat Rambo",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72523:",
    "name": "Erza Radhiant",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72524:",
    "name": "Bella Beatrice",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72527:",
    "name": "Rei X Leonora",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72529:",
    "name": "Simon Ghost Riley",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72530:",
    "name": "Zoey Rogers",
    "division": "Station 72",
    "status": "ACTIVE"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72501",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72503",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72525",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72526",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72528",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  },
  {
    "category": "ROOKIE",
    "rank": "Rookie",
    "badge": "72531",
    "name": "VACANT",
    "division": "Station 72",
    "status": "VACANT"
  }
];
window.DEFAULT_CHAIN_OF_COMMAND = DEFAULT_CHAIN_OF_COMMAND;

// Storage Manager Helper Functions
const StorageManager = {
  getTenCodes: () => {
    const data = localStorage.getItem('lspd_ten_codes');
    if (!data) return DEFAULT_TEN_CODES;
    try {
      const parsed = JSON.parse(data);
      if (parsed.length !== DEFAULT_TEN_CODES.length) return DEFAULT_TEN_CODES;
      return parsed;
    } catch(e) {
      return DEFAULT_TEN_CODES;
    }
  },
  saveTenCodes: (data) => {
    localStorage.setItem('lspd_ten_codes', JSON.stringify(data));
  },
  
  getPenalCodes: () => {
    const data = localStorage.getItem('lspd_penal_codes');
    return data ? JSON.parse(data) : DEFAULT_PENAL_CODES;
  },
  savePenalCodes: (data) => {
    localStorage.setItem('lspd_penal_codes', JSON.stringify(data));
  },

  getReports: () => {
    const data = localStorage.getItem('lspd_reports');
    return data ? JSON.parse(data) : DEFAULT_REPORTS;
  },
  saveReports: (data) => {
    localStorage.setItem('lspd_reports', JSON.stringify(data));
  },

  getDpos: () => {
    const data = localStorage.getItem('lspd_dpos');
    return data ? JSON.parse(data) : DEFAULT_DPOS;
  },
  saveDpos: (data) => {
    localStorage.setItem('lspd_dpos', JSON.stringify(data));
  },

  getPatrolNotes: () => {
    const data = localStorage.getItem('lspd_patrol_notes');
    return data !== null ? data : DEFAULT_PATROL_NOTES;
  },
  savePatrolNotes: (notes) => {
    localStorage.setItem('lspd_patrol_notes', notes);
  },

  getChainOfCommand: () => {
    const data = localStorage.getItem('lspd_chain_of_command');
    let items = DEFAULT_CHAIN_OF_COMMAND;
    if (data) {
      try {
        const parsed = JSON.parse(data);
        if (Array.isArray(parsed) && parsed.length > 0) {
          items = parsed;
        }
      } catch(e) {}
    }
    return items.map(item => {
      let cat = item.category;
      const r = item.rank || '';
      if (r === 'Commissioner') cat = 'COMMISSIONER';
      else if (r === 'Chief of Police') cat = 'CHIEF OF POLICE';
      else if (r.includes('Assistant Chief')) cat = 'ASSISTANT CHIEF';
      else if (r.includes('Deputy Chief')) cat = 'DEPUTY CHIEF';
      else if (r.includes('Commander')) cat = 'COMMANDER';
      else if (r.includes('Captain')) cat = 'CAPTAIN';
      else if (r.includes('Lieutenant')) cat = 'LIEUTENANT';
      else if (r.includes('Detective')) cat = 'DETECTIVE';
      else if (r.includes('Sergeant')) cat = 'SERGEANT';
      else if (r.includes('Police Officer III')) cat = 'POLICE OFFICER III';
      else if (r.includes('Police Officer II')) cat = 'POLICE OFFICER II';
      else if (r.includes('Rookie')) cat = 'ROOKIE';
      return { ...item, category: cat };
    });
  },
  saveChainOfCommand: (data) => {
    localStorage.setItem('lspd_chain_of_command', JSON.stringify(data));
  },

  resetAllToDefault: () => {
    localStorage.setItem('lspd_ten_codes', JSON.stringify(DEFAULT_TEN_CODES));
    localStorage.setItem('lspd_penal_codes', JSON.stringify(DEFAULT_PENAL_CODES));
    localStorage.setItem('lspd_reports', JSON.stringify(DEFAULT_REPORTS));
    localStorage.setItem('lspd_dpos', JSON.stringify(DEFAULT_DPOS));
    localStorage.setItem('lspd_patrol_notes', DEFAULT_PATROL_NOTES);
    localStorage.setItem('lspd_chain_of_command', JSON.stringify(DEFAULT_CHAIN_OF_COMMAND));
  }
};
window.StorageManager = StorageManager;


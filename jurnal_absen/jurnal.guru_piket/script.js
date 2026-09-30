const userData = {
  nama: "pak yanto",
};

const statsData = {
  total: 45,
  belumDivalidasi: 30,
  tervalidasi: 13,
  ditolak: 2,
};

const pendingJournal = {
  mapel: "MATEMATIKA",
  kelas: "XI DKV 2",
  jam: "13.00 - 13.40",
  ruang: "RUANG 18",
  guru: "NAMA GURU",
};


const journalList = [
  {
    mapel: "MATEMATIKA",
    kelas: "XI PPLG 2",
    jam: "08.00 - 08.40",
    status: "valid",
    keterangan: "21 Juli 2026, 08.20",
  },

  {
    mapel: "MATEMATIKA",
    kelas: "XI TKJ 2",
    jam: "10.00 - 10.40",
    status: "pending",
    keterangan: "21 Juli 2026, 09.30",
  },
  
  {
    mapel: "MATEMATIKA",
    kelas: "XI TKI 2",
    jam: "11.00 - 11.40",
    status: "rejected",
    keterangan: "21 Juli 2026, 09.30",
  },
];

const statusConfig = {
  valid: { icon: "✔", iconClass: "status-icon--valid", label: "Tervalidasi", textClass: "status-text--valid" },
  pending: { icon: "◔", iconClass: "status-icon--pending", label: "Menunggu Validasi", textClass: "status-text--pending" },
  rejected: { icon: "!", iconClass: "status-icon--rejected", label: "Perlu Diperbaiki", textClass: "status-text--rejected" },
};

function renderGreeting() {
  document.getElementById("greetingText").textContent = `Selamat Datang, ${userData.nama}`;
}

function renderStats() {
  document.getElementById("statTotal").textContent = statsData.total;
  document.getElementById("statPending").textContent = statsData.belumDivalidasi;
  document.getElementById("statValid").textContent = statsData.tervalidasi;
  document.getElementById("statRejected").textContent = statsData.ditolak;
}

function renderPendingJournal() {
  document.getElementById("heroMapel").textContent = pendingJournal.mapel;
  document.getElementById("heroKelas").textContent = pendingJournal.kelas;
  document.getElementById("heroJam").textContent = pendingJournal.jam;
  document.getElementById("heroRuang").textContent = pendingJournal.ruang;
  document.getElementById("heroGuru").textContent = pendingJournal.guru;
}

function renderJournalTable() {
  const tbody = document.getElementById("journalTableBody");
  tbody.innerHTML = "";

  journalList.forEach((item, index) => {
    const cfg = statusConfig[item.status];

    const row = document.createElement("tr");
    row.innerHTML = `
      <td class="col-status-icon">
        <span class="status-icon ${cfg.iconClass}">${cfg.icon}</span>
      </td>
      <td class="mapel-cell">${item.mapel}</td>
      <td>${item.kelas}</td>
      <td>${item.jam}</td>
      <td><span class="status-text ${cfg.textClass}">${cfg.label}</span></td>
      <td>${item.keterangan}</td>
      <td>
        <button class="btn-row-detail" data-index="${index}">
          Detail <span class="arrow">→</span>
        </button>
      </td>
    `;
    tbody.appendChild(row);
  });

  // Pasang event listener untuk setiap tombol detail baris
  tbody.querySelectorAll(".btn-row-detail").forEach((btn) => {
    btn.addEventListener("click", (e) => {
      const idx = e.currentTarget.dataset.index;
      const item = journalList[idx];
      alert(`Detail Jurnal:\n${item.mapel} - ${item.kelas}\n${item.jam}\nStatus: ${statusConfig[item.status].label}`);
    });
  });
}

const hariList = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
const bulanList = [
  "Januari", "Februari", "Maret", "April", "Mei", "Juni",
  "Juli", "Agustus", "September", "Oktober", "November", "Desember",
];

function updateDateTime() {
  const now = new Date();

  const hari = hariList[now.getDay()];
  const tanggal = now.getDate();
  const bulan = bulanList[now.getMonth()];
  const tahun = now.getFullYear();

  const jam = String(now.getHours()).padStart(2, "0");
  const menit = String(now.getMinutes()).padStart(2, "0");

  document.getElementById("currentDate").textContent = `${hari}, ${tanggal} ${bulan} ${tahun}`;
  document.getElementById("currentTime").textContent = `${jam}.${menit} WIB`;
}

function setupNavigation() {
  const navItems = document.querySelectorAll(".nav-item");

  navItems.forEach((item) => {
    item.addEventListener("click", (e) => {
      e.preventDefault();
      const target = item.dataset.nav;

      if (target === "home" || target === "info") {
        navItems.forEach((el) => el.classList.remove("active"));
        item.classList.add("active");
      }

      if (target === "logout") {
        const confirmLogout = confirm("Yakin ingin logout?");
        if (confirmLogout) {
          alert("Anda telah logout.");
        }
      }
    });
  });
}

function setupButtons() {
  document.getElementById("heroDetailBtn").addEventListener("click", () => {
    alert(
      `Detail Jurnal Belum Divalidasi:\n${pendingJournal.mapel} - ${pendingJournal.kelas}\nJam: ${pendingJournal.jam}\nRuang: ${pendingJournal.ruang}\nGuru: ${pendingJournal.guru}`
    );
  });

  document.getElementById("seeAllBtn").addEventListener("click", () => {
    alert("Menampilkan semua status validasi jurnal...");
  });
}

function init() {
  renderGreeting();
  renderStats();
  renderPendingJournal();
  renderJournalTable();
  updateDateTime();
  setInterval(updateDateTime, 1000 * 30);
  setupNavigation();
  setupButtons();
}

document.addEventListener("DOMContentLoaded", init);
<!DOCTYPE html>
<html lang="id" class="overscroll-none">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sekretaris</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-green': '#1A312C',
                        'medium-green': '#428475',
                        'mint-green': '#89D7B7',
                        'bg-cream': '#FFF4E1',
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }
        body { overflow-x: hidden; }
        #scrollIndicator { transition: top 0.15s ease-out; }
    </style>
</head>

<body class="bg-bg-cream text-dark-green font-sans min-h-screen overflow-x-hidden overscroll-none">

    <!-- ============================================================= -->
    <!-- MOBILE HEADER -->
    <!-- ============================================================= -->
    <div class="md:hidden bg-dark-green text-white p-4 flex items-center gap-3 sticky top-0 z-40 shadow-sm">
        <button id="hamburgerBtn" type="button" class="w-9 h-9 rounded-lg flex items-center justify-center hover:bg-white/10 transition focus:outline-none shrink-0">
            <i class="fa-solid fa-bars"></i>
        </button>
        <div class="flex items-center gap-2">
            <img src="{{ asset('image/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
            <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
        </div>
    </div>

    <!-- MOBILE OVERLAY -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden md:hidden"></div>

    <!-- ============================================================= -->
    <!-- SIDEBAR -->
    <!-- ============================================================= -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 w-60 bg-dark-green text-white p-6 flex flex-col justify-between z-50
               -translate-x-full md:translate-x-0 transition-transform duration-300">

        <div>
            <!-- LOGO -->
            <div class="flex flex-col items-center gap-2 mb-10 text-center">
                <img src="{{ asset('image/logo.png') }}" alt="Logo Jurnal Absensi" class="w-16 h-auto">
                <span class="font-bold text-sm tracking-wide">Jurnal Absensi</span>
            </div>

            <!-- NAVIGATION -->
            <nav class="flex flex-col gap-3 font-semibold text-xs">
                <a href="{{ url('/sekre/dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-white/10 text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-house w-4 text-center"></i>
                    <span>Dashboard</span>
                </a>

                <a href="{{ url('/sekre/jurnal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-solid fa-book-open w-4 text-center"></i>
                    <span>Jurnal</span>
                </a>

                <a href="{{ url('/sekre/jadwal') }}"
                    class="flex items-center gap-3 px-4 py-3 text-gray-300 hover:bg-white/10 hover:text-mint-green rounded-xl transition active:scale-[0.98]">
                    <i class="fa-regular fa-calendar-days w-4 text-center"></i>
                    <span>Jadwal Mata Pelajaran</span>
                </a>
            </nav>
        </div>

        <!-- FOOTER SIDEBAR -->
        <div class="flex flex-col gap-1 pt-3 border-t border-white/10 text-xs">
             <a href="{{ url('/sekre/akun') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-user-circle w-4"></i>
                <span>Profil</span>
            </a>

            <!-- LOGOUT -->
            <a href="{{ route('logout') }}"
                class="flex items-center gap-2 px-2 py-2 rounded-lg hover:bg-white/10 active:scale-[0.98] transition-all duration-200">
                <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>

    <!-- ============================================================= -->
    <!-- MAIN CONTENT -->
    <!-- ============================================================= -->
    <main class="min-w-0 p-4 pb-12 md:p-8 md:ml-60 max-w-full md:max-w-[calc(100%-15rem)] space-y-4 md:space-y-6">

        <!-- HEADER -->
        <header class="flex items-center justify-between gap-3">
            <div class="min-w-0">
                <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-dark-green truncate">
                    Selamat Datang, {{ Auth::user()->name ?? 'Sekretaris' }}
                </h2>
                <p class="text-[11px] sm:text-xs text-gray-400 font-semibold mt-1">
                    Semangat menjalankan tugas jurnal hari ini!
                </p>
            </div>

            <div class="flex items-center gap-2 sm:gap-3 shrink-0">
                <div class="text-right leading-tight">
                    <div id="live-date" class="text-[9px] sm:text-[10px] md:text-xs font-semibold text-medium-green whitespace-nowrap">memuat tanggal....</div>
                    <div id="live-clock" class="text-[10px] sm:text-xs font-extrabold text-dark-green mt-0.5">00.00 WIB</div>
                </div>
            </div>
        </header>

        <!-- JURNAL TERAKHIR: jurnal paling baru yang diisi guru, klik untuk lihat detail -->
        @if ($jurnalTerakhir)
            @php
                $badgeJamIni = match ($jurnalTerakhir->status) {
                    'approved' => 'bg-emerald-400/15 text-emerald-300',
                    'rejected' => 'bg-red-400/15 text-red-300',
                    default => 'bg-amber-400/15 text-amber-300',
                };
            @endphp
            <a href="{{ route('sekre.jurnal.show', $jurnalTerakhir) }}"
                class="group block bg-dark-green text-white rounded-2xl p-4 sm:p-5 md:px-7 md:py-5 hover:bg-[#20392F] transition">
                <div class="flex items-center justify-between gap-2 mb-3">
                    <span class="inline-flex items-center gap-1.5 text-[10px] sm:text-[11px] text-mint-green/80 uppercase tracking-wider font-bold">
                        <i class="fa-regular fa-clock"></i> Jurnal Terakhir &middot; {{ $jurnalTerakhir->tgl?->locale('id')->translatedFormat('l, d M Y') }}
                    </span>
                    <span class="{{ $badgeJamIni }} text-[9px] sm:text-[10px] font-bold px-2.5 py-1 rounded-full whitespace-nowrap">{{ $jurnalTerakhir->status_label }}</span>
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center gap-4 sm:gap-5">
                    <div class="sm:flex-1 sm:pr-5 sm:border-r sm:border-[#2E524A]">
                        <h3 class="text-base sm:text-[17px] font-bold">{{ $jurnalTerakhir->mapel?->name ?? 'Tanpa Mapel' }}</h3>
                        <p class="text-[11px] sm:text-xs text-[#8FBFB0] mt-0.5">{{ $jurnalTerakhir->kelas?->name ?? '-' }}</p>
                    </div>

                    <div class="sm:flex-1 sm:pr-5 sm:border-r sm:border-[#2E524A]">
                        <div class="flex items-center gap-2 text-sm sm:text-[15px] font-semibold">
                            <i class="fa-regular fa-clock text-mint-green text-sm sm:text-base"></i>
                            <span>{{ $jurnalTerakhir->jadwal?->waktu_mulai ?? '--:--' }} - {{ $jurnalTerakhir->jadwal?->waktu_selesai ?? '--:--' }}</span>
                        </div>
                        <p class="text-[11px] sm:text-xs text-[#8FBFB0] mt-1">Jam ke-{{ $jurnalTerakhir->start_time }}@if ($jurnalTerakhir->end_time && $jurnalTerakhir->end_time !== $jurnalTerakhir->start_time)&ndash;{{ $jurnalTerakhir->end_time }}@endif</p>
                    </div>

                    <div class="sm:flex-1">
                        <p class="text-[10px] sm:text-[11px] text-[#8FBFB0] uppercase tracking-wide">Diisi oleh</p>
                        <p class="text-sm sm:text-[15px] font-semibold">{{ $jurnalTerakhir->teacher?->name ?? '-' }}</p>
                    </div>

                    <span class="flex items-center justify-center gap-2 bg-[#2E524A] border border-[#3D6B61] text-mint-green text-xs sm:text-[13px] font-semibold px-4 sm:px-[22px] py-2.5 rounded-full group-hover:bg-[#3D6B61] group-hover:text-white transition whitespace-nowrap shrink-0">
                        Lihat Detail <i class="fa-solid fa-arrow-right"></i>
                    </span>
                </div>
            </a>
        @else
            <div class="block bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-4 sm:p-5 md:px-7 md:py-5">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-[#E2F2EB] text-medium-green flex items-center justify-center shrink-0">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-dark-green">Belum ada jurnal dari guru</p>
                        <p class="text-[11px] sm:text-xs text-gray-400 mt-0.5">Jurnal yang diisi guru akan muncul di sini untuk diperiksa.</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- ============================================================= -->
        <!-- KEHADIRAN KELAS HARI INI                                       -->
        <!-- Gabungan: info dari kurikulum + surat yang kamu input sendiri -->
        <!-- ============================================================= -->
        <div id="infoPiket" class="bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-4 md:p-[22px_24px] scroll-mt-20">
            <div class="flex items-center justify-between gap-3 mb-1">
                <h3 class="text-sm md:text-[17px] font-bold text-dark-green">Kehadiran Kelas Hari Ini</h3>
                <span id="piketBadge" class="text-[10px] md:text-xs font-bold text-medium-green bg-emerald-50 px-2.5 py-1 rounded-full shrink-0 whitespace-nowrap">-</span>
            </div>
            <p class="text-[10px] md:text-xs text-gray-400 mb-3">Surat siswa tidak masuk dan catatan terlambat. Dari Kurikulum, atau surat yang kamu terima langsung.</p>

            <!-- TAMBAH SURAT SENDIRI -->
            <button type="button" onclick="openTambah()"
                class="w-full bg-dark-green hover:bg-medium-green active:scale-[0.98] text-white rounded-xl p-3 transition text-left">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-white/10 text-mint-green flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-plus"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-xs font-extrabold">Tambah Surat Siswa</p>
                        <p class="text-[10px] text-gray-300 mt-0.5">Surat sakit/izin yang kamu terima langsung atau lewat chat. Kurikulum ikut melihat.</p>
                    </div>
                    <i class="fa-solid fa-chevron-right text-xs text-mint-green shrink-0"></i>
                </div>
            </button>

            <!-- FILTER (otomatis) -->
            <div id="piketTabs" class="flex flex-wrap items-center gap-2 mt-4 mb-4"></div>

            <div id="piketList" class="flex flex-col gap-3"></div>

            <p id="piketEmpty" class="hidden text-center text-xs text-gray-400 py-6">Belum ada data.</p>

            <p class="mt-3 text-[10px] text-gray-400 leading-relaxed">
                <i class="fa-solid fa-circle-info mr-1"></i>Siswa tetap wajib membawa surat asli saat kembali masuk. Data tidak masuk bisa datang dari dua jalur: surat yang diterima Kurikulum atau yang kamu terima sendiri.
            </p>
        </div>

        <!-- ANTREAN VALIDASI: satu daftar, urut prioritas, satu tombol aksi per baris -->
        <div id="antreanValidasi" class="bg-white border-[1.5px] border-[#E5DCCE] rounded-2xl p-4 md:p-[22px_24px] scroll-mt-20">
            <div class="flex items-center justify-between gap-3 mb-1">
                <h3 class="text-sm md:text-[17px] font-bold text-dark-green">Antrean Validasi</h3>
                <span class="text-[10px] md:text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-full shrink-0">{{ $jumlahMenunggu }} menunggu</span>
            </div>
            <p class="text-[10px] md:text-xs text-gray-400 mb-4 md:mb-5">Diurutkan dari yang paling perlu perhatian.</p>

            @if ($antrean->isNotEmpty())
                <div class="flex flex-col gap-3">
                    @foreach ($antrean as $item)
                        @php
                            $perluPerbaikan = $item->status === 'rejected';
                        @endphp
                        <div class="flex items-center justify-between gap-3 p-3 rounded-xl {{ $perluPerbaikan ? 'bg-red-50/60 border border-red-100' : 'bg-amber-50/60 border border-amber-100' }}">
                            <div class="flex items-center gap-3 min-w-0">
                                <span class="w-2.5 h-2.5 rounded-full {{ $perluPerbaikan ? 'bg-red-500' : 'bg-amber-500' }} shrink-0"></span>
                                <div class="min-w-0">
                                    <p class="text-xs md:text-sm font-semibold text-dark-green truncate">{{ $item->mapel?->name ?? 'Tanpa Mapel' }} &middot; {{ $item->kelas?->name ?? '-' }}</p>
                                    <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">
                                        Jam ke {{ $item->start_time }} &middot;
                                        @if ($perluPerbaikan)
                                            {{ $item->alasan_validasi ?: 'Perlu diperbaiki' }}
                                        @else
                                            {{ $item->jadwal?->waktu_mulai ?? '-' }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <a href="{{ route('sekre.jurnal.show', $item) }}" class="{{ $perluPerbaikan ? 'bg-red-500 hover:bg-red-600' : 'bg-dark-green hover:bg-medium-green' }} text-white text-[10px] md:text-xs font-bold px-3.5 py-2 rounded-full transition whitespace-nowrap shrink-0">
                                {{ $perluPerbaikan ? 'Tinjau Ulang' : 'Validasi' }}
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-xs text-gray-400 py-6">Tidak ada jurnal yang menunggu validasi.</p>
            @endif

            <a href="{{ route('sekre.status-validasi') }}" class="block w-full mt-4 md:mt-5 py-2.5 md:py-3 bg-[#CBEAD9] hover:bg-[#b4e2ca] text-dark-green text-xs md:text-[13px] font-semibold text-center rounded-full transition">
                Lihat Semua Jurnal
            </a>
        </div>
    </main>

    <!-- ============================================================= -->
    <!-- MODAL SURAT (lihat foto) -->
    <!-- ============================================================= -->
    <div id="modalSurat" class="fixed inset-0 z-[60] hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/60" onclick="tutupSurat()"></div>
        <div class="relative bg-white rounded-2xl w-full max-w-md p-5 shadow-xl max-h-full overflow-y-auto">
            <div class="flex items-center justify-between mb-3">
                <div>
                    <h4 id="suratNama" class="text-sm font-bold text-dark-green">Nama</h4>
                    <span id="suratJenis" class="text-[9px] font-bold text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">SAKIT</span>
                </div>
                <button type="button" onclick="tutupSurat()" aria-label="Tutup" class="w-8 h-8 rounded-lg hover:bg-gray-100 text-gray-500">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <!-- Ganti src dengan foto surat dari database nanti -->
            <div class="bg-gray-100 rounded-xl overflow-hidden aspect-[3/4] flex items-center justify-center">
                <img id="suratFoto" src="" alt="Foto surat" class="w-full h-full object-contain hidden">
                <div id="suratKosong" class="text-center text-gray-400 text-xs">
                    <i class="fa-regular fa-image text-3xl mb-2"></i>
                    <p>Foto surat belum diupload</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================= -->
    <!-- MODAL: TAMBAH SURAT SISWA (diinput sekre sendiri) -->
    <!-- ============================================================= -->
    <div id="tambahModal" class="fixed inset-0 z-[70] hidden items-end md:items-center justify-center bg-dark-green/60 backdrop-blur-sm p-0 md:p-4">
        <div class="bg-white rounded-t-3xl md:rounded-2xl w-full md:max-w-lg max-h-[92vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
            <div class="sticky top-0 z-10 bg-white flex items-center justify-between gap-3 px-5 py-4 border-b border-gray-100">
                <div>
                    <h2 class="text-sm md:text-base font-extrabold text-dark-green">Tambah Surat Siswa</h2>
                    <p class="text-[10px] text-gray-400 mt-0.5">Untuk siswa kelasmu yang tidak masuk. Langsung terlihat oleh Kurikulum.</p>
                </div>
                <button type="button" onclick="closeTambah()" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 flex items-center justify-center hover:bg-gray-200">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="p-5 space-y-4">
                <div>
                    <label class="text-[10px] font-bold text-gray-500">Siswa</label>
                    <select id="tSiswa"
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition"></select>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Jenis</label>
                    <div class="grid grid-cols-2 gap-2 mt-1.5">
                        <button type="button" data-jenis="Sakit" onclick="tJenisPilih('Sakit')" class="t-jenis rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-kit-medical mb-1 block"></i>Sakit
                        </button>
                        <button type="button" data-jenis="Izin" onclick="tJenisPilih('Izin')" class="t-jenis rounded-xl border border-gray-200 px-2 py-3 text-[10px] font-bold text-gray-600 transition">
                            <i class="fa-solid fa-file-signature mb-1 block"></i>Izin
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Surat diterima lewat</label>
                    <div class="grid grid-cols-2 gap-2 mt-1.5">
                        <button type="button" data-via="langsung" onclick="tViaPilih('langsung')" class="t-via text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Surat langsung</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Kamu pegang surat aslinya</p>
                        </button>
                        <button type="button" data-via="chat" onclick="tViaPilih('chat')" class="t-via text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Foto lewat chat</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Surat asli menyusul</p>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Apa yang tertulis di surat?</label>
                    <div class="grid grid-cols-1 gap-2 mt-1.5">
                        <button type="button" data-periode="default" onclick="tPeriodePilih('default')" class="t-periode text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Tidak ada keterangan tanggal</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Berlaku 1 hari saja</p>
                        </button>
                        <button type="button" data-periode="surat" onclick="tPeriodePilih('surat')" class="t-periode text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Ada periode tidak masuk</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Contoh: "izin tanggal 5 sampai 7, masuk tanggal 8"</p>
                        </button>
                        <button type="button" data-periode="dokter" onclick="tPeriodePilih('dokter')" class="t-periode text-left rounded-xl border border-gray-200 px-3 py-2.5 transition">
                            <p class="text-[11px] font-bold">Surat keterangan dokter</p>
                            <p class="text-[10px] opacity-70 mt-0.5">Istirahat sesuai anjuran dokter (khusus sakit)</p>
                        </button>
                    </div>

                    <div id="tFieldSatu" class="mt-3">
                        <label class="text-[10px] font-bold text-gray-500">Tanggal tidak masuk</label>
                        <input id="tTanggal" type="date" onchange="tInfoKembali()"
                            class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                    </div>
                    <div id="tFieldRange" class="mt-3 hidden">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-[10px] font-bold text-gray-500">Mulai tidak masuk</label>
                                <input id="tMulai" type="date" onchange="tInfoKembali()"
                                    class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                            </div>
                            <div>
                                <label class="text-[10px] font-bold text-gray-500">Sampai tanggal</label>
                                <input id="tSelesai" type="date" onchange="tInfoKembali()"
                                    class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition">
                            </div>
                        </div>
                    </div>
                    <p id="tInfoKembali" class="mt-2 text-[10px] font-semibold text-medium-green">-</p>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Foto Surat <span class="font-normal text-gray-400">(wajib, maks. 3 foto)</span></label>
                    <label for="tFoto"
                        class="mt-1.5 flex items-center justify-center gap-2 rounded-xl border-2 border-dashed border-emerald-200 bg-emerald-50/40 hover:bg-emerald-50 py-4 text-[11px] font-bold text-medium-green cursor-pointer transition">
                        <i class="fa-solid fa-camera"></i> Ambil / pilih foto surat
                    </label>
                    <input id="tFoto" type="file" accept="image/*" multiple class="hidden" onchange="tPilihFoto(this)">
                    <div id="tFotoPreview" class="grid grid-cols-3 gap-2 mt-2"></div>
                </div>

                <div>
                    <label class="text-[10px] font-bold text-gray-500">Catatan <span class="font-normal text-gray-400">(opsional)</span></label>
                    <textarea id="tCatatan" rows="2" placeholder="Contoh: Dikabari ibunya lewat chat, surat dibawa besok."
                        class="w-full mt-1.5 rounded-xl border border-gray-200 bg-gray-50 px-3 py-2.5 text-xs text-dark-green outline-none focus:border-medium-green focus:bg-white transition resize-none"></textarea>
                </div>

                <div class="flex gap-2 pt-1">
                    <button type="button" onclick="closeTambah()" class="flex-1 rounded-xl border border-gray-200 py-2.5 text-xs font-bold text-gray-500 hover:bg-gray-50 transition">Batal</button>
                    <button type="button" onclick="saveTambah()" class="flex-1 rounded-xl bg-dark-green py-2.5 text-xs font-bold text-white hover:bg-medium-green transition">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="toast" class="fixed bottom-5 left-1/2 -translate-x-1/2 z-[100] hidden">
        <div class="bg-dark-green text-white px-4 py-3 rounded-xl shadow-xl flex items-center gap-2">
            <i class="fa-solid fa-circle-check text-mint-green"></i>
            <span id="toastText" class="text-xs font-bold">Berhasil.</span>
        </div>
    </div>

    <!-- ============================================================= -->
    <!-- MOBILE SCROLL HELPER -->
    <!-- ============================================================= -->
    <div id="scrollHelper"
        class="md:hidden fixed right-2 sm:right-3 top-1/2 -translate-y-1/2 z-30 flex flex-col items-center gap-1">

        <button type="button" onclick="scrollToTop()" aria-label="Kembali ke atas"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">
            <i class="fa-solid fa-chevron-up text-[9px]"></i>
        </button>

        <div class="relative w-1 h-28 bg-dark-green/10 rounded-full overflow-hidden">
            <div id="scrollIndicator" class="absolute left-0 top-0 w-1 h-8 bg-medium-green rounded-full"></div>
        </div>

        <button type="button" onclick="scrollToBottom()" aria-label="Ke bagian bawah"
            class="w-7 h-7 rounded-full bg-white/95 border border-emerald-100 shadow-md text-medium-green flex items-center justify-center active:scale-90 transition">
            <i class="fa-solid fa-chevron-down text-[9px]"></i>
        </button>
    </div>

    <!-- ============================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ============================================================= -->
    <script>
        /* ===== LIVE CLOCK ===== */
        function updateLiveTime() {
            const now = new Date();
            const opsi = { weekday: 'long', day: 'numeric', month: 'long', year: 'numeric' };
            const dateEl = document.getElementById('live-date');
            const clockEl = document.getElementById('live-clock');
            if (dateEl) dateEl.textContent = now.toLocaleDateString('id-ID', opsi);
            if (clockEl) {
                const jam = String(now.getHours()).padStart(2, '0');
                const menit = String(now.getMinutes()).padStart(2, '0');
                clockEl.textContent = `${jam}.${menit} WIB`;
            }
        }
        updateLiveTime();
        setInterval(updateLiveTime, 1000);

        /* ===== MOBILE SIDEBAR ===== */
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            sidebarOverlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            sidebarOverlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }
        if (hamburgerBtn) hamburgerBtn.addEventListener('click', openSidebar);
        if (sidebarOverlay) sidebarOverlay.addEventListener('click', closeSidebar);
        if (sidebar) {
            sidebar.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) closeSidebar();
                });
            });
        }
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebarOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });

        /* ===== MOBILE SCROLL HELPER ===== */
        const scrollIndicator = document.getElementById('scrollIndicator');

        function updateScrollIndicator() {
            if (!scrollIndicator) return;
            const scrollTop = window.scrollY || window.pageYOffset;
            const documentHeight = document.documentElement.scrollHeight;
            const windowHeight = window.innerHeight;
            const maxScroll = documentHeight - windowHeight;

            if (maxScroll <= 0) {
                scrollIndicator.style.top = '0px';
                return;
            }

            const trackHeight = 112; // h-28
            const indicatorHeight = 32; // h-8
            const maxTop = trackHeight - indicatorHeight;
            const progress = Math.min(1, Math.max(0, scrollTop / maxScroll));
            scrollIndicator.style.top = `${progress * maxTop}px`;
        }

        window.addEventListener('scroll', updateScrollIndicator, { passive: true });
        window.addEventListener('resize', updateScrollIndicator);

        function scrollToTop() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
        function scrollToBottom() {
            window.scrollTo({ top: document.documentElement.scrollHeight, behavior: 'smooth' });
        }
        updateScrollIndicator();

        /* ===== TOAST ===== */
        let toastTimer;
        function showToast(pesan) {
            const t = document.getElementById('toast');
            document.getElementById('toastText').textContent = pesan;
            t.classList.remove('hidden');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => t.classList.add('hidden'), 2600);
        }

        /* ===== MODAL SURAT (lihat foto) ===== */
        function bukaSurat(nama, jenis, fotoUrl) {
            document.getElementById('suratNama').textContent = nama;
            document.getElementById('suratJenis').textContent = jenis;
            const foto = document.getElementById('suratFoto');
            const kosong = document.getElementById('suratKosong');
            if (fotoUrl) {
                foto.src = fotoUrl;
                foto.classList.remove('hidden');
                kosong.classList.add('hidden');
            } else {
                foto.removeAttribute('src');
                foto.classList.add('hidden');
                kosong.classList.remove('hidden');
            }
            const m = document.getElementById('modalSurat');
            m.classList.remove('hidden');
            m.classList.add('flex');
        }
        function tutupSurat() {
            const m = document.getElementById('modalSurat');
            m.classList.add('hidden');
            m.classList.remove('flex');
        }

        /* ============================================================= */
        /* KEHADIRAN KELAS HARI INI                                       */
        /*                                                               */
        /* Data siswa tidak masuk punya DUA jalur masuk:                 */
        /*   sumber 'piket' -> surat diterima kurikulum                 */
        /*   sumber 'sekre' -> surat yang diterima sekre sendiri         */
        /* Dua-duanya tampil di daftar yang sama dan sama-sama terlihat  */
        /* oleh kurikulum. Siswa terlambat selalu dicatat kurikulum.   */
        /* ============================================================= */
        const HARI_NAMA = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

        const ROSTER = [ // dummy: siswa XI RPL 2 (nanti dari database)
            { id: 1, nama: 'Ahmad Rizki' },   { id: 2, nama: 'Siti Nurhaliza' },
            { id: 3, nama: 'Budi Santoso' },   { id: 4, nama: 'Citra Ayu' },
            { id: 5, nama: 'Dewi Lestari' },   { id: 6, nama: 'Rizky Maulana' },
            { id: 7, nama: 'Salsa Aulia' },    { id: 8, nama: 'Ahmad Fauzan' },
        ];
        const KELAS_SAYA = 'XI RPL 2';

        function esc(s) {
            return String(s).replace(/[&<>"']/g, c => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#39;' }[c]));
        }
        function isoDari(d) { return `${d.getFullYear()}-${String(d.getMonth() + 1).padStart(2, '0')}-${String(d.getDate()).padStart(2, '0')}`; }
        function isoOffset(n) { const d = new Date(); d.setDate(d.getDate() + n); return isoDari(d); }
        function parseISO(s) { return new Date(s + 'T00:00:00'); }
        function tambahHari(d, n) { const x = new Date(d); x.setDate(x.getDate() + n); return x; }
        function fmtHariTgl(d) { return `${HARI_NAMA[d.getDay()]}, ${d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' })}`; }
        function masukKembali(selesaiISO) {
            let d = tambahHari(parseISO(selesaiISO), 1);
            while (d.getDay() === 0 || d.getDay() === 6) d = tambahHari(d, 1);
            return d;
        }
        function namaDari(id) { return (ROSTER.find(s => s.id === id) || { nama: '-' }).nama; }

        let seq = 100;
        const SURAT_DUMMY = { // dummy foto surat (nanti diganti file upload dari database)
            sakit: '{{ asset('image/dummy/surat-sakit.svg') }}',
            izin: '{{ asset('image/dummy/surat-izin.svg') }}',
            dokter: '{{ asset('image/dummy/surat-dokter.svg') }}',
        };
        const ABSEN = [ // surat tidak masuk (dummy dari kurikulum)
            { id: 1, siswaId: 1, jenis: 'Sakit', sumber: 'piket', mulai: isoOffset(0), selesai: isoOffset(0), fotoUrl: SURAT_DUMMY.sakit, dicatat: false },
            { id: 2, siswaId: 2, jenis: 'Izin',  sumber: 'piket', mulai: isoOffset(0), selesai: isoOffset(0), fotoUrl: SURAT_DUMMY.izin, dicatat: false },
            { id: 3, siswaId: 3, jenis: 'Sakit', sumber: 'piket', mulai: isoOffset(0), selesai: isoOffset(0), fotoUrl: SURAT_DUMMY.dokter, dicatat: true  },
        ];
        const TELAT = [ // catatan terlambat (selalu dari kurikulum)
            { id: 'a', siswaId: 6, jam: 1, alasan: 'Ban motor bocor', ttdWaka: true  },
            { id: 'b', siswaId: 7, jam: 2, alasan: 'Kesiangan',       ttdWaka: false },
        ];

        let filterAktif = 'all';

        function itemAbsen(a) {
            const sekre = a.sumber === 'sekre';
            const m = parseISO(a.mulai), e = parseISO(a.selesai);
            const periode = a.mulai === a.selesai ? fmtHariTgl(m) : `${fmtHariTgl(m)} - ${fmtHariTgl(e)}`;
            const sumberTxt = sekre
                ? '<span class="text-emerald-600 font-semibold">Kamu yang input</span>'
                : 'Surat diterima Kurikulum';
            const catatan = a.dicatat ? ' &middot; <span class="text-emerald-600 font-semibold">Sudah dicatat</span>' : '';
            const bg = a.dicatat ? 'bg-blue-50/30' : 'bg-blue-50/60';

            return `
            <div data-type="absen" class="flex items-center justify-between gap-3 p-3 rounded-xl ${bg} border border-blue-100">
                <div class="flex items-center gap-3 min-w-0 ${a.dicatat ? 'opacity-70' : ''}">
                    <div class="w-9 h-9 rounded-xl bg-blue-100 text-blue-500 flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-envelope-open-text text-sm"></i>
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <p class="text-xs md:text-sm font-semibold text-dark-green">${esc(namaDari(a.siswaId))}</p>
                            <span class="text-[9px] font-bold text-blue-600 bg-blue-100 px-2 py-0.5 rounded-full">${a.jenis.toUpperCase()}</span>
                        </div>
                        <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5">${KELAS_SAYA} &middot; ${sumberTxt}${catatan}</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">
                            <i class="fa-regular fa-calendar mr-1"></i>${esc(periode)}
                            &middot; masuk kembali ${esc(fmtHariTgl(masukKembali(a.selesai)))}
                        </p>
                    </div>
                </div>
                <button type="button" onclick="lihatSurat(${a.id})"
                    class="bg-white border border-blue-200 text-blue-600 hover:bg-blue-50 text-[10px] md:text-xs font-bold px-3 py-2 rounded-full transition whitespace-nowrap shrink-0">
                    <i class="fa-regular fa-image mr-1"></i>Surat
                </button>
            </div>`;
        }

        function itemTelat(t) {
            return `
            <div data-type="telat" class="flex items-center justify-between gap-3 p-3 rounded-xl bg-violet-50/60 border border-violet-100">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-9 h-9 rounded-xl bg-violet-100 text-violet-500 flex items-center justify-center shrink-0">
                        <i class="fa-regular fa-clock text-sm"></i>
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-2 flex-wrap">
                            <p class="text-xs md:text-sm font-semibold text-dark-green">${esc(namaDari(t.siswaId))}</p>
                            <span class="text-[9px] font-bold text-violet-600 bg-violet-100 px-2 py-0.5 rounded-full">JAM KE-${t.jam}</span>
                        </div>
                        <p class="text-[10px] md:text-[11px] text-gray-500 mt-0.5 truncate">${KELAS_SAYA} &middot; ${esc(t.alasan)}</p>
                        <p class="text-[10px] text-gray-400 mt-0.5">
                            <i class="fa-solid fa-signature mr-1"></i>TTD: Kurikulum <i class="fa-solid fa-check text-emerald-500"></i>
                            &middot; Waka <i class="fa-solid ${t.ttdWaka ? 'fa-check text-emerald-500' : 'fa-hourglass-half text-amber-500'}"></i>
                        </p>
                    </div>
                </div>
                <span class="bg-violet-100 text-violet-600 text-[9px] font-bold px-2.5 py-1.5 rounded-full whitespace-nowrap shrink-0">Dari Kurikulum</span>
            </div>`;
        }

        function renderPiket() {
            const total = ABSEN.length + TELAT.length;
            document.getElementById('piketBadge').textContent = `${total} siswa`;

            const tabs = [
                { k: 'all',   label: 'Semua',        n: total,         aktif: 'bg-dark-green text-white',  idle: 'bg-gray-100 text-gray-600',     ikon: '' },
                { k: 'absen', label: 'Tidak Masuk',  n: ABSEN.length,  aktif: 'bg-blue-500 text-white',    idle: 'bg-blue-50 text-blue-600',      ikon: '<i class="fa-solid fa-envelope-open-text mr-1"></i>' },
                { k: 'telat', label: 'Terlambat',    n: TELAT.length,  aktif: 'bg-violet-500 text-white',  idle: 'bg-violet-50 text-violet-600',  ikon: '<i class="fa-regular fa-clock mr-1"></i>' },
            ];
            const tabsEl = document.getElementById('piketTabs');
            tabsEl.innerHTML = tabs.map(t => `
                <button type="button" data-k="${t.k}" aria-pressed="${t.k === filterAktif}"
                    class="piket-tab text-[10px] md:text-xs font-bold px-3.5 py-1.5 rounded-full transition ${t.k === filterAktif ? t.aktif : t.idle}">
                    ${t.ikon}${t.label} <span class="opacity-70">${t.n}</span>
                </button>`).join('');
            tabsEl.querySelectorAll('.piket-tab').forEach(b => b.addEventListener('click', () => { filterAktif = b.dataset.k; renderPiket(); }));

            const bagian = [];
            if (filterAktif === 'all' || filterAktif === 'absen') ABSEN.forEach(a => bagian.push(itemAbsen(a)));
            if (filterAktif === 'all' || filterAktif === 'telat') TELAT.forEach(t => bagian.push(itemTelat(t)));

            document.getElementById('piketList').innerHTML = bagian.join('');
            document.getElementById('piketEmpty').classList.toggle('hidden', bagian.length > 0);
        }

        function lihatSurat(id) {
            const a = ABSEN.find(x => x.id === id);
            if (a) bukaSurat(namaDari(a.siswaId), a.jenis.toUpperCase(), a.fotoUrl);
        }

        /* ----- Form Tambah Surat ----- */
        let tJenis = '', tVia = 'langsung', tPeriode = 'default', tFotos = [], tFotoUrls = [];

        function openTambah() {
            const m = document.getElementById('tambahModal');
            m.classList.remove('hidden'); m.classList.add('flex');
            document.body.classList.add('overflow-hidden');

            document.getElementById('tSiswa').innerHTML =
                '<option value="">Pilih siswa...</option>' + ROSTER.map(s => `<option value="${s.id}">${esc(s.nama)}</option>`).join('');
            tJenis = ''; tFotos = [];
            document.getElementById('tCatatan').value = '';
            document.getElementById('tFoto').value = '';
            const h = isoOffset(0);
            ['tTanggal', 'tMulai', 'tSelesai'].forEach(id => document.getElementById(id).value = h);
            tFotoRender(); tJenisRender();
            tViaPilih('langsung');
            tPeriodePilih('default');
        }
        function closeTambah() {
            const m = document.getElementById('tambahModal');
            m.classList.add('hidden'); m.classList.remove('flex');
            document.body.classList.remove('overflow-hidden');
        }
        function tToggle(sel, attr, nilai, aktifCls, idleCls) {
            document.querySelectorAll(sel).forEach(b => {
                const on = b.dataset[attr] === nilai;
                aktifCls.forEach(c => b.classList.toggle(c, on));
                idleCls.forEach(c => b.classList.toggle(c, !on));
            });
        }
        function tJenisRender() { tToggle('.t-jenis', 'jenis', tJenis, ['bg-dark-green', 'text-white', 'border-dark-green'], ['text-gray-600', 'border-gray-200']); }
        function tJenisPilih(j) {
            tJenis = j;
            if (j !== 'Sakit' && tPeriode === 'dokter') tPeriodePilih('default');
            tJenisRender();
            const b = document.querySelector('.t-periode[data-periode="dokter"]');
            b.disabled = j === 'Izin';
            b.classList.toggle('opacity-40', j === 'Izin');
        }
        function tViaPilih(v) {
            tVia = v;
            tToggle('.t-via', 'via', v, ['bg-dark-green', 'text-white', 'border-dark-green'], ['text-dark-green', 'border-gray-200']);
        }
        function tPeriodePilih(p) {
            if (p === 'dokter' && tJenis === 'Izin') return;
            tPeriode = p;
            tToggle('.t-periode', 'periode', p, ['bg-dark-green', 'text-white', 'border-dark-green'], ['text-dark-green', 'border-gray-200']);
            document.getElementById('tFieldSatu').classList.toggle('hidden', p !== 'default');
            document.getElementById('tFieldRange').classList.toggle('hidden', p === 'default');
            tInfoKembali();
        }
        function tInfoKembali() {
            const info = document.getElementById('tInfoKembali');
            let selesai;
            if (tPeriode === 'default') {
                selesai = document.getElementById('tTanggal').value;
            } else {
                const m = document.getElementById('tMulai').value;
                selesai = document.getElementById('tSelesai').value;
                if (m && selesai && selesai < m) {
                    info.textContent = 'Tanggal selesai tidak boleh sebelum tanggal mulai.';
                    info.className = 'mt-2 text-[10px] font-semibold text-red-500';
                    return;
                }
            }
            info.className = 'mt-2 text-[10px] font-semibold text-medium-green';
            info.textContent = selesai ? `Siswa diharapkan masuk kembali: ${fmtHariTgl(masukKembali(selesai))}` : '-';
        }
        function tPilihFoto(input) { tFotos = Array.from(input.files).slice(0, 3); tFotoRender(); }
        function tFotoRender() {
            tFotoUrls.forEach(u => URL.revokeObjectURL(u));
            tFotoUrls = tFotos.map(f => URL.createObjectURL(f));
            document.getElementById('tFotoPreview').innerHTML = tFotoUrls.map(u => `
                <div class="aspect-[3/4] rounded-lg overflow-hidden border border-gray-200 bg-gray-50"><img src="${u}" alt="Foto surat" class="w-full h-full object-cover"></div>`).join('');
        }
        function saveTambah() {
            const sid = Number(document.getElementById('tSiswa').value);
            if (!sid) { alert('Pilih siswa terlebih dahulu.'); return; }
            if (!tJenis) { alert('Pilih jenis: sakit atau izin.'); return; }
            if (tFotos.length === 0) { alert('Foto surat wajib dilampirkan.'); return; }

            let mulai, selesai;
            if (tPeriode === 'default') {
                mulai = selesai = document.getElementById('tTanggal').value;
                if (!mulai) { alert('Isi tanggal tidak masuk.'); return; }
            } else {
                mulai = document.getElementById('tMulai').value;
                selesai = document.getElementById('tSelesai').value;
                if (!mulai || !selesai) { alert('Isi tanggal mulai dan sampai tanggal.'); return; }
                if (selesai < mulai) { alert('Tanggal selesai tidak boleh sebelum tanggal mulai.'); return; }
            }

            // Cegah surat ganda: siswa yang sama dengan periode yang bertumpuk
            const dup = ABSEN.find(a => a.siswaId === sid && !(selesai < a.mulai || mulai > a.selesai));
            if (dup) {
                alert(`${namaDari(sid)} sudah tercatat tidak masuk di periode ini (${dup.sumber === 'piket' ? 'dari Kurikulum' : 'surat kamu sebelumnya'}).`);
                return;
            }

            const cat = document.getElementById('tCatatan').value.trim();
            ABSEN.unshift({
                id: ++seq, siswaId: sid, jenis: tJenis, sumber: 'sekre', mulai, selesai,
                fotoUrl: URL.createObjectURL(tFotos[0]), dicatat: false,
            });

            // Data yang nanti dikirim ke backend (FormData supaya foto ikut terupload)
            console.log({ siswa_id: sid, jenis: tJenis, via: tVia, dasar: tPeriode, mulai, selesai, catatan: cat, foto: tFotos, sumber: 'sekre' });

            const nama = namaDari(sid);
            tFotoUrls = []; // jangan di-revoke: foto pertama dipakai tombol "Surat"
            closeTambah();
            filterAktif = 'absen';
            renderPiket();
            showToast(`Surat ${nama} tersimpan dan terlihat oleh Kurikulum.`);
        }

        /* ===== Backdrop & Esc ===== */
        document.getElementById('tambahModal').addEventListener('click', function (e) {
            if (e.target === this) closeTambah();
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') { tutupSurat(); closeTambah(); }
        });

        /* ===== INIT ===== */
        renderPiket();
    </script>

</body>
</html>
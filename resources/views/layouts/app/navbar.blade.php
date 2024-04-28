<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
 
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
    </form>

  <!-- Jam waktu nyata -->
  <div id="realtime-clock" style="color: white; margin-left: auto;">
      <!-- Jam -->
      <span id="jam"></span> :
      <!-- Menit -->
      <span id="menit"></span> :
      <!-- Detik -->
      <span id="detik"></span>
      <br>
      <!-- Hari, tanggal - bulan - tahun -->
      <span id="hari"></span>,
      <span id="tanggal"></span> 
      <span id="bulan"></span> 
      <span id="tahun"></span>
  </div>
</nav>


<script>
    function updateClock() {
        var now = new Date();
        var jam = now.getHours();
        var menit = now.getMinutes();
        var detik = now.getSeconds();
        var hari = now.toLocaleDateString('id-ID', { weekday: 'long' });
        var tanggal = now.getDate();
        var bulan = now.toLocaleDateString('id-ID', { month: 'long' });
        var tahun = now.getFullYear();

        // Format waktu agar dua digit
        jam = jam < 10 ? "0" + jam : jam;
        menit = menit < 10 ? "0" + menit : menit;
        detik = detik < 10 ? "0" + detik : detik;

        // Memasukkan nilai waktu ke dalam elemen HTML
        document.getElementById('jam').textContent = jam;
        document.getElementById('menit').textContent = menit;
        document.getElementById('detik').textContent = detik;
        document.getElementById('hari').textContent = hari;
        document.getElementById('tanggal').textContent = tanggal;
        document.getElementById('bulan').textContent = bulan;
        document.getElementById('tahun').textContent = tahun;
    }

    // Memanggil fungsi updateClock setiap detik
    setInterval(updateClock, 1000);

    // Memanggil fungsi untuk menampilkan waktu saat halaman pertama kali dimuat
    updateClock();
</script>
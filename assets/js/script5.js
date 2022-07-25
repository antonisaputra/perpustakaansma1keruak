let toggle = document.querySelector('.toggle'),
  icons = document.querySelector('.fa-bars'),
  nav = document.querySelector('.navigation'),
  main = document.querySelector('.main'),
  title = document.querySelectorAll('.title'),
  cardBox = document.querySelector('.cardBox');


icons.onclick = () => {
  toggle.classList.toggle('active');
  nav.classList.toggle('active');
  main.classList.toggle('active');
  cardBox.classList.toggle('active');
}

let dropdownBtnBuku = document.querySelector('.dropdown-btn-buku'),
  dropdownBuku = document.querySelector('.dropdown-buku');

dropdownBtnBuku.onclick = () => {
  dropdownBuku.classList.toggle('dropdown-active');
}

let dropdownBtnPinjam = document.querySelector('.dropdown-btn-pinjam'),
  dropdownPinjam = document.querySelector('.dropdown-pinjam');

dropdownBtnPinjam.onclick = () => {
  dropdownPinjam.classList.toggle('dropdown-active');
}


let flashData = $('.flash-data').data('flashdata');

if (flashData) {
  Swal.fire(
    'Data Anggota',
    'Berhasil ' + flashData,
    'success'
  )
}

let gantiPassword = $('.gantipassword').data('gantipassword');

if (gantiPassword) {
  Swal.fire(
    'Password ',
    gantiPassword + 'Diubah',
    'success'
  )
}

let editProfil = $('.editprofil').data('editprofil');

if (editProfil) {
  Swal.fire(
    'Data Akun',
    'Berhasil Diubah',
    'success'
  )
}

$('.tombol-hapus').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apa Anda Yakin',
    text: "Data Mahasiswa Dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

let flashInformasi = $('.informasi-sekolah').data('informasisekolah');

if (flashInformasi) {
  Swal.fire(
    'Data Informasi',
    'Berhasil ' + flashInformasi,
    'success'
  )
}

$('.hapus-informasi').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apa Anda Yakin',
    text: "Data Informasi Dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});


$('.logout').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apa Anda Yakin',
    text: "Ingin Keluar",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Keluar'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

let flashDataBuku = $('.tambah-buku').data('tambahbuku');

if (flashDataBuku) {
  Swal.fire(
    'Data Buku',
    'Berhasil ' + flashDataBuku,
    'success'
  )
}

$('.hapus-buku').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apa Anda Yakin',
    text: "Data Buku Dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});


let flashDataKategori = $('.tambah-kategori').data('tambahkategori');

if (flashDataKategori) {
  Swal.fire(
    'Kategori Buku',
    'Berhasil ' + flashDataKategori,
    'success'
  )
}

$('.hapus-kategori').on('click', function (e) {
  e.preventDefault();
  const href = $(this).attr('href');

  Swal.fire({
    title: 'Apa Anda Yakin',
    text: "Kategori Buku Dihapus",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data'
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});

var flashDataTrasaksi = $('.transaksi').data('transaksi');

if (flashDataTrasaksi) {
  Swal.fire(
    'Transaksi ' + flashDataTrasaksi,
    ' ',
    'success'
  )
}


// mouse hover btn_buku_kembali

function bukuKembaliHover(over) {
  over.innerHTML = "Buku Dikembali";
}

function bukuKembali(out) {
  out.innerHTML = "Buku Belum Kembali";
}

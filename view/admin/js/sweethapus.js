function sweethapus() {
    Swal.fire({
        title: 'Apakah anda yakin akan menghapus data penghuni?',
        text: "Data yang dihapus tidak akan kembali",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Terhapus',
            'Data berhasil dihapus'
          )
        }
      })
}

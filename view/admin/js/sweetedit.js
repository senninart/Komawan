function sweetedit() {
    Swal.fire({
        title: 'Apakah anda yakin akan menyimpan perubahan pada data penghuni??',
        text: "",
        icon: 'info',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: 'grey',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Simpan'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire(
            'Perubahan data penghuni berhasil disimpan',
            'Data berhasil disimpan'
          )
        }
      })
}
$(function () {

    $('.buttonInsert').on('click', function () {

        $('#labelModal').html('Tambah data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambahkan Data');
        $('.modal-body form')[0].reset();
    });



    $('.modalUpdate').on('click', function () {

        $('#labelModal').html('Ubah data mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');
        $('.modal-footer button[type=submit]').addClass("btn btn-warning")


        const dataId = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getDataMhs',
            data: { id: dataId },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#name').val(data.nama);
                $('#umur').val(data.umur);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }

        });
    });

});

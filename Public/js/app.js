let btnPesan = document.getElementById('pesan');
if (btnPesan != null) {
    btnPesan.addEventListener('click', function(){
        let tgl_cekin = document.getElementById('tgl_cekin').value;
        let tgl_cekout = document.getElementById('tgl_cekout').value;
        let jumlah_kamar = document.getElementById('jumlah_kamar').value;
    
        if (tgl_cekin == '' || tgl_cekout == '' || jumlah_kamar == '') {
            alert('Input tidak boleh kosong');
        } else {
            if (tgl_cekout < tgl_cekin) {
                alert('Tanggal Check-out tidak valid');
            } else {
                location.href = ''+BASE_URL+'order/form/'+tgl_cekin+'/'+tgl_cekout+'/'+jumlah_kamar+'';
            }
        }
    });
}

let btnCari = document.getElementById('cari');
if (btnCari != null) {
    btnCari.addEventListener('click', function(){
        let keyword = document.getElementById('keyword').value;
        location.href = ''+URL+'admin/search/'+keyword+'';
    });
}

let btnTgl = document.getElementById('cekin');
if (btnTgl != null) {
    btnTgl.addEventListener('change', function(){
        let tglCekin = document.getElementById('cekin').value;
        location.href = ''+URL+'admin/search/'+tglCekin+'';
    });
}

let btnLihat = document.getElementById('lihat');
if (btnLihat != null) {
    let inputPass = document.getElementById('kata_sandi');
    btnLihat.addEventListener('click', function(){
        let type = inputPass.getAttribute('type');
        if (type == 'password') {
            inputPass.setAttribute('type', 'text');
        } else {
            inputPass.setAttribute('type', 'password');
        }
    });
}
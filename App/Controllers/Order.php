<?php

class Order extends Basecontroller
{
    public function form($get = [])
    {
        if (!isset($_SESSION['login']) || empty($get[1]) || empty($get[2]) || empty($get[3])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('account/login');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Formulir Pemesanan',
            'tgl_cekin' => $get[1],
            'tgl_cekout' => $get[2],
            'jumlah_kamar' => $get[3],
            'tipe_kamar' => $this->model('KamarModel')->getKamar(),
            'profile' => $this->model('PenggunaModel')->getInfo(),
        ];
        $this->view('template/header', $data);
        $this->view('order', $data);
        $this->view('template/footer', $data);
    }

    public function do_order()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('account/login');
        }

        $id_pemesanan = rand(0, 9999);
        $tgl_cekin = $_POST['tgl_cekin'];
        $tgl_cekout = $_POST['tgl_cekout'];
        $jumlah_kamar = $_POST['jumlah_kamar'];
        $nama_pemesan = $_POST['nama_pemesan'];
        $email = $_POST['email'];
        $nomor_ponsel = $_POST['nomor_ponsel'];
        $nama_tamu = $_POST['nama_tamu'];
        $tipe_kamar = $_POST['tipe_kamar'];

        if (empty($tgl_cekin) || empty($tgl_cekout) || empty($jumlah_kamar) || empty($nama_pemesan) || empty($email) || empty($nomor_ponsel) || empty($nama_tamu) || is_null($tipe_kamar)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('order/form/' . $tgl_cekin . '/' . $tgl_cekout . '/' . $jumlah_kamar . '');
        } else {
            if ($tgl_cekout < $tgl_cekin) {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Tanggal Check-out tidak valid',
                ];
                return redirect('order/form/' . $tgl_cekin . '/' . $tgl_cekout . '/' . $jumlah_kamar . '');
            } else {
                $nama_pemesan = ucwords(strtolower($nama_pemesan));
                $nama_tamu = ucwords(strtolower($nama_tamu));

                $pesan_kamar = $this->model('PemesananModel')->insert([
                    'id_pemesanan' => $id_pemesanan,
                    'tgl_cekin' => $tgl_cekin,
                    'tgl_cekout' => $tgl_cekout,
                    'jumlah_kamar' => $jumlah_kamar,
                    'nama_pemesan' => $nama_pemesan,
                    'email' => $email,
                    'nomor_ponsel' => $nomor_ponsel,
                    'nama_tamu' => $nama_tamu,
                    'tipe_kamar' => $tipe_kamar,
                ]);
                if ($pesan_kamar) {
                    $_SESSION['result'] = [
                        'alert' => 'success',
                        'title' => 'Berhasil',
                        'msg' => 'Berhasil memesan kamar, nomor pesanan #' . $id_pemesanan . '',
                    ];
                    $_SESSION['success'] = true;
                    return redirect('order/success/' . $id_pemesanan . '');
                } else {
                    $_SESSION['result'] = [
                        'alert' => 'danger',
                        'title' => 'Gagal',
                        'msg' => 'Gagal memesan kamar, silahkan coba lagi',
                    ];
                    return redirect('order/form/' . $tgl_cekin . '/' . $tgl_cekout . '/' . $jumlah_kamar . '');
                }
            }
        }
    }

    public function success($get = [])
    {
        if (!isset($_SESSION['login']) || !isset($_SESSION['success'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('account/login');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Berhasil',
            'invoice' => $get[1],
            'profile' => $this->model('PenggunaModel')->getInfo(),
        ];
        $this->view('template/header', $data);
        $this->view('success', $data);
        $this->view('template/footer', $data);
    }
}

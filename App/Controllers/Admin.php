<?php

class Admin extends Basecontroller
{
    public function index()
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('admin/auth');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Data Reservasi',
            'reservasi' => $this->model('PemesananModel')->getReservasi(),
        ];
        $this->view('admin/template/header', $data);
        $this->view('admin/reservasi', $data);
        $this->view('admin/template/footer', $data);
    }

    public function auth()
    {
        if (isset($_SESSION['admin'])) {
            return redirect('admin');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Masuk',
            'profile' => $this->model('PenggunaModel')->getInfo(),
        ];
        $this->view('admin/template/header', $data);
        $this->view('admin/auth/login', $data);
        $this->view('admin/template/footer', $data);
    }

    public function do_login()
    {
        if (isset($_SESSION['admin']) || request_method() == 'GET') {
            return redirect('admin');
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('admin/auth');
        } else {
            $cek_user = $this->model('PetugasModel')->login([
                'username' => $username,
            ]);
            if (!is_null($cek_user)) {
                if (password_verify($password, $cek_user['password'])) {
                    $_SESSION['id_petugas'] = $cek_user['id_petugas'];
                    $_SESSION['username'] = $cek_user['username'];
                    $_SESSION['password'] = $cek_user['password'];
                    $_SESSION['nama_petugas'] = $cek_user['nama_petugas'];
                    $_SESSION['level'] = $cek_user['level'];
                    $_SESSION['admin'] = true;
                    $_SESSION['result'] = [
                        'alert' => 'success',
                        'title' => 'Berhasil',
                        'msg' => 'Selamat datang ' . $cek_user['nama_petugas'] . '',
                    ];
                    return redirect('admin');
                } else {
                    $_SESSION['result'] = [
                        'alert' => 'danger',
                        'title' => 'Gagal',
                        'msg' => 'Password tidak sesuai',
                    ];
                    return redirect('admin/auth');
                }
            } else {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Username tidak terdaftar',
                ];
                return redirect('admin/auth');
            }
        }
    }

    public function reservasi($keyword = false)
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('admin/auth');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Data Reservasi',
            'reservasi' => $this->model('PemesananModel')->getReservasi(),
        ];
        $this->view('admin/template/header', $data);
        $this->view('admin/reservasi', $data);
        $this->view('admin/template/footer', $data);
    }

    public function checkin($id)
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('admin/reservasi');
        }
        if (empty($id[1])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'ID Pesanan tidak ditemukan',
            ];
            return redirect('admin/reservasi');
        } else {
            $id = $id[1];
            $checkin = $this->model('PemesananModel')->checkin($id);
            if ($checkin) {
                $_SESSION['result'] = [
                    'alert' => 'success',
                    'title' => 'Berhasil',
                    'msg' => 'Berhasil melakukan Check-in',
                ];
                return redirect('admin/reservasi');
            } else {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Gagal melakukan Check-in',
                ];
                return redirect('admin/reservasi');
            }
        }
    }

    public function checkout($id)
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('admin/reservasi');
        }
        if (empty($id[1])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'ID Pesanan tidak ditemukan',
            ];
            return redirect('admin/reservasi');
        } else {
            $id = $id[1];
            $checkout = $this->model('PemesananModel')->checkout($id);
            if ($checkout) {
                $_SESSION['result'] = [
                    'alert' => 'success',
                    'title' => 'Berhasil',
                    'msg' => 'Berhasil melakukan Check-out',
                ];
                return redirect('admin/reservasi');
            } else {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Gagal melakukan Check-out',
                ];
                return redirect('admin/reservasi');
            }
        }
    }

    public function search($keyword = [])
    {
        if (!isset($_SESSION['admin'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('admin/reservasi');
        }
        if (!isset($keyword[1])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('admin/reservasi');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Data Reservasi',
            'reservasi' => $this->model('PemesananModel')->getReservasiKeyword([
                'keyword' => $keyword[1],
            ]),
            'keyword' => $keyword[1],
            'tgl_cekin' => $keyword[1],
        ];
        $this->view('admin/template/header', $data);
        $this->view('admin/reservasi', $data);
        $this->view('admin/template/footer', $data);
    }

    public function invoice($get)
    {
        $id = $get[1];
        if (empty($id)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Tidak ada sesi',
            ];
            return redirect('admin/reservasi');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Invoice #' . $id . '',
            'id_pemesanan' => $id,
            'invoice' => $this->model('PemesananModel')->getReservasiId([
                'id' => $id,
            ]),
        ];
        $this->view('invoice', $data);
    }

    public function logout()
    {
        session_destroy();
        return redirect('admin/auth');
    }
}

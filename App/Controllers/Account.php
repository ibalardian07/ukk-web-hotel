<?php

class Account extends Basecontroller
{
    public function index()
    {
        return redirect('account/login');
    }

    public function login()
    {
        if (isset($_SESSION['login'])) {
            return redirect('home');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Masuk',
        ];
        $this->view('template/header', $data);
        $this->view('auth/login', $data);
        $this->view('template/footer', $data);
    }

    public function do_login()
    {
        if (isset($_SESSION['login']) || request_method() == 'GET') {
            return redirect('home');
        } else {
            $email = $_POST['email'];
            $kata_sandi = $_POST['kata_sandi'];

            if (empty($email) || empty($kata_sandi)) {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Input tidak boleh kosong',
                ];
                return redirect('account/login');
            } else {
                $data = $this->model('PenggunaModel')->login([
                    'email' => $email,
                ]);
                if (!is_null($data)) {
                    if (password_verify($kata_sandi, $data['kata_sandi'])) {
                        $_SESSION['id_pengguna'] = $data['id_pengguna'];
                        $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['nomor_ponsel'] = $data['nomor_ponsel'];
                        $_SESSION['kata_sandi'] = $data['kata_sandi'];
                        $_SESSION['pin'] = $data['pin'];
                        $_SESSION['login'] = true;
                        return redirect('home');
                    } else {
                        $_SESSION['result'] = [
                            'alert' => 'danger',
                            'title' => 'Gagal',
                            'msg' => 'Kata sandi tidak sesuai',
                        ];
                        return redirect('account/login');
                    }
                } else {
                    $_SESSION['result'] = [
                        'alert' => 'danger',
                        'title' => 'Gagal',
                        'msg' => 'Email tidak terdaftar',
                    ];
                    return redirect('account/login');
                }
            }
        }
    }

    public function register()
    {
        if (isset($_SESSION['login'])) {
            return redirect('home');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Daftar',
        ];
        $this->view('template/header', $data);
        $this->view('auth/register', $data);
        $this->view('template/footer', $data);
    }

    public function do_register()
    {
        if (isset($_SESSION['login']) || request_method() == 'GET') {
            return redirect('home');
        }

        $nama_lengkap = htmlentities($_POST['nama_lengkap']);
        $email = $_POST['email'];
        $nomor_ponsel = $_POST['nomor_ponsel'];
        $kata_sandi = $_POST['kata_sandi'];
        $pin = $_POST['pin'];

        if (empty($nama_lengkap) || empty($nomor_ponsel) || empty($email) || empty($kata_sandi)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('account/register');
        } else {
            $cek_email = $this->model('PenggunaModel')->login([
                'email' => $email,
            ]);
            if (is_null($cek_email)) {
                $cek_nomor = $this->model('PenggunaModel')->cekNomor([
                    'nomor_ponsel' => $nomor_ponsel,
                ]);
                if (is_null($cek_nomor)) {
                    if (strlen($nomor_ponsel) < 10) {
                        $_SESSION['result'] = [
                            'alert' => 'danger',
                            'title' => 'Gagal',
                            'msg' => 'Nomor telepon terlalu pendek',
                        ];
                        return redirect('account/register');
                    } else {
                        $nama_lengkap = ucwords(strtolower($nama_lengkap));
                        $email = strtolower($email);
                        $kata_sandi = password_hash($kata_sandi, PASSWORD_BCRYPT);

                        $do_register = $this->model('PenggunaModel')->insert([
                            'nama_lengkap' => $nama_lengkap,
                            'email' => $email,
                            'nomor_ponsel' => $nomor_ponsel,
                            'kata_sandi' => $kata_sandi,
                            'pin' => $pin,
                        ]);
                        if ($do_register) {
                            $_SESSION['result'] = [
                                'alert' => 'success',
                                'title' => 'Berhasil',
                                'msg' => 'Berhasil mendaftar, silahkan masuk',
                            ];
                            return redirect('account/login');
                        } else {
                            $_SESSION['result'] = [
                                'alert' => 'danger',
                                'title' => 'Gagal',
                                'msg' => 'Gagal mendaftar, silahkan coba lagi',
                            ];
                            return redirect('account/register');
                        }
                    }
                } else {
                    $_SESSION['result'] = [
                        'alert' => 'danger',
                        'title' => 'Gagal',
                        'msg' => 'Nomor telepon telah digunakan',
                    ];
                    return redirect('account/register');
                }
            } else {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Email telah digunakan',
                ];
                return redirect('account/register');
            }
        }
    }

    public function forgot()
    {
        if (isset($_SESSION['login']) || request_method() == 'POST') {
            return redirect('home');
        }
        unset($_SESSION['email']);
        unset($_SESSION['new_password']);
        $data = [
            'title' => $this->title,
            'page' => 'Lupa Kata Sandi',
        ];
        $this->view('template/header', $data);
        $this->view('auth/forgot', $data);
        $this->view('template/footer', $data);
    }

    public function do_forgot()
    {
        if (isset($_SESSION['login']) || request_method() == 'GET') {
            return redirect('home');
        }

        $email = strtolower($_POST['email']);
        $pin = strtolower($_POST['pin']);

        if (empty($email) || empty($pin)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('account/forgot');
        } else {
            $cekEmail = $this->model('PenggunaModel')->login([
                'email' => $email,
            ]);
            if (!is_null($cekEmail)) {
                $cekEmailPin = $this->model('PenggunaModel')->cekEmailPin([
                    'email' => $email,
                    'pin' => $pin,
                ]);
                if (!is_null($cekEmailPin)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['new_password'] = true;
                    return redirect('account/new_password');
                } else {
                    $_SESSION['result'] = [
                        'alert' => 'danger',
                        'title' => 'Gagal',
                        'msg' => 'PIN Transaksi tidak sesuai',
                    ];
                    return redirect('account/forgot');
                }
            } else {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Email tidak terdaftar',
                ];
                return redirect('account/forgot');
            }
        }
    }

    public function new_password()
    {
        if (isset($_SESSION['login']) || request_method() == 'POST') {
            return redirect('home');
        }

        if (!isset($_SESSION['new_password'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Tidak ada sesi',
            ];
            return redirect('account/forgot');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Daftar',
        ];
        $this->view('template/header', $data);
        $this->view('auth/new_password', $data);
        $this->view('template/footer', $data);
    }

    public function do_update()
    {
        if (isset($_SESSION['login']) || request_method() == 'GET') {
            return redirect('home');
        }

        if (!isset($_SESSION['email']) && !isset($_SESSION['new_password'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Tidak ada sesi',
            ];
            return redirect('account/forgot');
        }

        $email = $_SESSION['email'];
        $sandi_baru = $_POST['sandi1'];
        $k_sandi_baru = $_POST['sandi2'];

        if (empty($sandi_baru) || empty($k_sandi_baru)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('account/new_password');
        } else {
            if ($k_sandi_baru != $sandi_baru) {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Konfirmasi sandi tidak sesuai',
                ];
                return redirect('account/new_password');
            } else {
                $do_update = $this->model('PenggunaModel')->updatePassword([
                    'email' => $email,
                    'kata_sandi' => password_hash($k_sandi_baru, PASSWORD_BCRYPT),
                ]);
                if ($do_update) {
                    $_SESSION['result'] = [
                        'alert' => 'success',
                        'title' => 'Berhasil',
                        'msg' => 'Berhasil memperbarui sandi',
                    ];
                    unset($_SESSION['email']);
                    unset($_SESSION['new_password']);
                    return redirect('account/login');
                } else {
                    $_SESSION['result'] = [
                        'alert' => 'danger',
                        'title' => 'Gagal',
                        'msg' => 'Gagal memperbarui sandi',
                    ];
                    return redirect('account/new_password');
                }
            }
        }
    }

    public function profile()
    {
        if (!isset($_SESSION['login'])) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('account/login');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Profil',
            'profile' => $this->model('PenggunaModel')->getInfo(),
        ];
        $this->view('template/header', $data);
        $this->view('profile', $data);
        $this->view('template/footer', $data);
    }

    public function update_profile()
    {
        if (!isset($_SESSION['login']) || request_method() == 'GET') {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Autentikasi diperlukan',
            ];
            return redirect('account/login');
        }

        $nama_lengkap = htmlentities($_POST['nama_lengkap']);
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tgl_lahir'];

        if (empty($nama_lengkap) || empty($jenis_kelamin) || empty($tgl_lahir)) {
            $_SESSION['result'] = [
                'alert' => 'danger',
                'title' => 'Gagal',
                'msg' => 'Input tidak boleh kosong',
            ];
            return redirect('account/profile');
        } else {
            $nama_lengkap = ucwords(strtolower($nama_lengkap));
            $update_profile = $this->model('PenggunaModel')->save([
                'nama_lengkap' => $nama_lengkap,
                'jenis_kelamin' => $jenis_kelamin,
                'tgl_lahir' => $tgl_lahir,
            ]);
            if ($update_profile) {
                $_SESSION['result'] = [
                    'alert' => 'success',
                    'title' => 'Berhasil',
                    'msg' => 'Berhasil memperbarui profil',
                ];
                return redirect('account/profile');
            } else {
                $_SESSION['result'] = [
                    'alert' => 'danger',
                    'title' => 'Gagal',
                    'msg' => 'Gagal memperbarui profil',
                ];
                return redirect('account/profile');
            }
        }
    }

    public function history()
    {
        if (!isset($_SESSION['login'])) {
            return redirect('account/login');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Histori Pemesanan',
            'profile' => $this->model('PenggunaModel')->getInfo(),
            'history' => $this->model('PemesananModel')->getPemesanan(),
        ];
        $this->view('template/header', $data);
        $this->view('history', $data);
        $this->view('template/footer', $data);
    }

    public function invoice($get = [])
    {
        $id = $get[1];
        if (!isset($_SESSION['login'])) {
            return redirect('account/login');
        }
        $data = [
            'title' => $this->title,
            'page' => 'Invoice ' . $id . '',
            'id_pemesanan' => $id,
            'invoice' => $this->model('PemesananModel')->getPemesananId($id),
            'profile' => $this->model('PenggunaModel')->getInfo(),
        ];
        $this->view('invoice', $data);
    }

    public function logout()
    {
        unset($_SESSION['id_pengguna']);
        unset($_SESSION['nama_lengkap']);
        unset($_SESSION['email']);
        unset($_SESSION['nomor_ponsel']);
        unset($_SESSION['kata_sandi']);
        unset($_SESSION['pin']);
        unset($_SESSION['login']);
        return redirect('account/login');
    }
}

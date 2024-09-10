<!doctype html>
<!--
* This Application created by IT-MCC
* Dedicated for MCC's Digital Infrastructures
-->
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>dist2/img/favicon.png">
    <title>PENGADUAN MCC</title>
    <link href="<?= base_url('assets/') ?>dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="<?= base_url('assets/') ?>dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="<?= base_url('assets/') ?>dist2/css/mcc-style.css" rel="stylesheet"/>
    <script src="<?= base_url('assets/') ?>dist/js/tabler.min.js?1684106062" defer></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>dist2/jquery-3.7.1.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
    @import url('https://rsms.me/inter/inter.css');
    :root {
        --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
    }
    body {
        font-feature-settings: "cv03", "cv04", "cv11";
    }
    </style>
</head>
<body class="flex-column mcc-bg">
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <div class="container">
                    <div class="card card-md">
                        <div class="card-header mcc-bg-card">
                            <img class="navbar-brand navbar-brand-autodark" src="<?= base_url('assets/') ?>dist2/img/mcc-logo-putih.png" height="65">
                        </div>
                        <div class="card-body">
                            <h1 class="h1 text-center">Formulir Pengaduan</h1>
                            <h5 class="text-center">Hai, Nawak Kreatif ! Jangan ragu sampaikan keluhan kamu ya ! Pengaduan kamu akan kami proses sebagai masukan untuk kemajuan MCC yang lebih baik :)</h5><hr>
                            <div class="col-12">
                                <form id="formPengaduan" method="post" action="<?php echo base_url() . 'form/submit/' ?>">
                                <?php echo $this->session->flashdata('response'); ?>
                                <?php echo $this->session->flashdata('captcha'); ?>
                                <div class="row row-cards">
                                    <div class="mb-2">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama'); ?>" placeholder="Nama lengkap sesuai KTP atau ID lainnya">
                                    <?= form_error('nama','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="<?= set_value('phone'); ?>" oninput="this.value = this.value.replace(/\D+/g, '')" placeholder="Contoh: 081211223344, serta pastikan nomor kamu benar dan aktif">
                                    <?= form_error('phone','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Apakah anda pernah menggunakan fasilitas MCC sebelumnya?</label>
                                    <div>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="opsipernah" id="opsipernah1" value="1" checked>
                                            <span class="form-check-label">Ya, Sudah</span>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="opsipernah" id="opsipernah0" value="0">
                                            <span class="form-check-label">Belum</span>
                                        </label>
                                    </div>
                                    <?= form_error('opsipernah','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="mb-0" id="forminstansi">
                                    <label class="form-label">Nama Instansi / Komunitas / Perorangan</label>
                                    <input type="text" name="instansi" class="form-control" id="instansi" value="<?= set_value('instansi'); ?>" placeholder="Jika Perorangan, masukkan nama brand atau bidang usaha">
                                    <?= form_error('instansi','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <label class="form-label">Keluhan</label>
                                    <textarea class="form-control" name="pengaduan" rows="6" value="<?= set_value('pengaduan'); ?>" placeholder="Sampaikan keluhanmu ya Nawak Kreatif :)"></textarea>
                                    <?= form_error('pengaduan','<small class="text-danger pl-3">','</small>'); ?>
                                </div>
                                <div class="mb-2">
                                    <div name="captcha" class="g-recaptcha" data-sitekey="rahasia"></div>
                                    <?php echo $this->session->flashdata('captcha'); ?>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" id="submit" class="btn mcc-btn w-100">Kirim</button>
                                </div>
                                </form>
                            </div><br>
                        </div>
                        <div class="card-footer page-pretitle"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg d-none d-lg-block"></div>
            </div>
        </div>
    </div>

    <footer class="mcc-footer">
        <div class="container">
            <div class="row text-center align-items-center">
            <div class="py-2 page-pretitle" style="color:#ffffff;">
                &copy; Copyright 2024 Malang Creative Center By IT-Team
            </div>
            </div>
        </div>
    </footer>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#opsipernah0").click(function(){
                $("#forminstansi").hide();
                $("#instansi").val(" ");
            });
            $("#opsipernah1").click(function(){
                $("#forminstansi").show();
                $("#instansi").val("");
            });
        });
    </script>
    <script type="text/javascript">
        function closeModal() {
            window.location.reload();
        }
    </script>
</body>
</html>
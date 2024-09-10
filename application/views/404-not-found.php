<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>404 Not Found</title>
    <!-- CSS files -->
    <link href="<?= base_url('assets/') ?>dist/css/tabler.min.css?1684106062" rel="stylesheet"/>
    <link href="<?= base_url('assets/') ?>dist/css/tabler-flags.min.css?1684106062" rel="stylesheet"/>
    <link href="<?= base_url('assets/') ?>dist/css/tabler-payments.min.css?1684106062" rel="stylesheet"/>
    <link href="<?= base_url('assets/') ?>dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet"/>
    <link href="<?= base_url('assets/') ?>dist/css/demo.min.css?1684106062" rel="stylesheet"/>

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/') ?>dist2/img/favicon.png">
    <link href="<?= base_url('assets/') ?>dist2/css/mcc-style.css" rel="stylesheet"/>
    <script src="<?= base_url('assets/') ?>dist2/jquery-3.7.1.min.js"></script>

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
  <body class="border-top-wide border-primary d-flex flex-column">
    <div class="page page-center">
      <div class="container-tight py-4">
        <div class="empty">
          <div class="empty-header"><a href="#"><img src="<?= base_url('assets/') ?>dist2/img/mcc-logo-blue.png" height="70"></a></div>
          <br><br><br>
          <p class="empty-header">404</p>
          <p class="empty-title">Oops… Halaman Tidak Ditemukan</p>
          <p class="empty-subtitle text-muted">
            Mohon maaf halaman yang Anda cari tidak ditemukan.
          </p>
          <div class="empty-action">
            <a href="<?php echo base_url('Form'); ?>" class="btn mcc-btn">Kembali</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="<?= base_url('assets/') ?>dist/js/tabler.min.js?1684106062" defer></script>
    <script src="<?= base_url('assets/') ?>dist/js/demo.min.js?1684106062" defer></script>
  </body>
</html>
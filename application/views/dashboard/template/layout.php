<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
    
  <?php $this->load->view('dashboard/template/head'); ?>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

    <!-- header -->
    <?php $this->load->view('dashboard/template/header'); ?>
     

    <!-- main menu-->
    <?php $this->load->view('dashboard/template/menu'); ?>
    <!-- / main menu-->


    <!-- main content -->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- stats -->

           <?php $this->load->view($data['kontent']); ?>
         

        </div>
      </div>
    </div>
    <!-- close main content -->

    <!-- footer -->
  <?php $this->load->view('dashboard/template/footer') ?>

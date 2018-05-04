<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>To-Do Task Manager</title>
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>
    <body>
		<div class="navbar navbar-default">
	      <div class="container">
	        <div class="navbar-header">
	          <a href="#" class="navbar-brand">To-Do</a>
	        </div>
	        <div class="navbar-collapse collapse" id="navbar-main">
	          <ul class="nav navbar-nav">
	            <li>
	              <a href="<?= base_url() ?>">Home</a>
	            </li>
	          </ul>

	          <ul class="nav navbar-nav navbar-right">
				  <?php if ($this->session->userdata('logged_in')): ?>
					  <li><a href="#">Welcome, <?= $this->session->userdata('username') ?></a></li>
				  <?php else: ?>
					  <li><a href="<?= base_url(); ?>users/register">Register</a></li>
				  <?php endif; ?>
	          </ul>

	        </div>
	      </div>
	    </div>

		<div class="container">
			<div class="page-header">
		        <div class="row">
					<div class="col-lg-3 col-md-3 col-sm-4">
						<div class="well well-lg">
							<div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <?php $this->load->view('users/login'); ?>
                                </div>
                            </div>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-8">
						<!-- Main Content -->
						<?php $this->load->view($main_content); ?>
					</div>
		        </div>
			</div>

			<footer>
		        <div class="row">
		          <div class="col-lg-12 text-center">
		            <p>&copy; Copyright 2018</p>
		          </div>
		        </div>
			</footer>
		</div>
    </body>
</html>

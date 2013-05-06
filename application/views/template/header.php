<html>
<head>
	<title>Objetivos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="/enny/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/enny/assets/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="/enny/assets/css/fullcalendar.css" />	
	<link rel="stylesheet" href="/enny/assets/css/unicorn.main.css" />
	<link rel="stylesheet" href="/enny/assets/css/unicorn.grey.css" class="skin-color" />
	<link rel="stylesheet" href="/enny/assets/css/uniform.css" class="skin-color" />
	<link rel="stylesheet" href="/enny/assets/css/select2.css" />		
	<link rel="stylesheet" href="/enny/assets/css/unicorn.main.css" />
	<link rel="stylesheet" href="/enny/assets/css/style.css">

</head>
<body>
		<div id="header">
			<h1><a href="#">Enny</a></h1>		
		</div>
		
		<div id="search">
			<input type="text" placeholder="Buscar..."/><button type="submit" class="tip-right" title="Search"><i class="icon-search icon-white"></i></button>
		</div>
		<div id="user-nav" class="navbar navbar-inverse">
            <ul class="nav btn-group">
                <li class="btn btn-inverse" ><a title="" href="#"><i class="icon icon-user"></i> <span class="text"><?php echo $this->session->userdata('username'); ?></span></a></li>
                <li class="btn btn-inverse dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">Messages</span> <span class="label label-important">5</span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a class="sAdd" title="" href="#">Nuevos Mensajes</a></li>
                        <li><a class="sInbox" title="" href="#">recibidos</a></li>
                        <li><a class="sOutbox" title="" href="#">enviados</a></li>
                        <li><a class="sTrash" title="" href="#">papelera</a></li>
                    </ul>
                </li>

                <li class="btn btn-inverse"><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Configuración</span></a></li>
                <li class="btn btn-inverse"><a title="" href="<?php echo base_url()?>index.php/login/logout"><i class="icon icon-share-alt"></i> <span class="text">Salir</span></a></li>
            </ul>
        </div>
            
		<div id="sidebar">
			<a href="#" class="visible-phone"><i class="icon icon-home"></i> Inicio</a>
			<ul>
				<li class="active"><a href="<?php echo base_url()."index.php/programas"; ?>"><i class="icon icon-home"></i> <span>Inicio</span></a></li>
				<li><a href="<?php echo base_url()."index.php/programas"; ?>"><i class="icon icon-th-list"></i> <span>Programas</span></a></li>
				<li><a href="<?php echo base_url()."index.php/categorias"; ?>"><i class="icon icon-th-list"></i> <span>Usuarios</span></a></li>
				<li><a href="<?php echo base_url()."index.php/areas"; ?>"><i class="icon icon-tint"></i> <span>Áreas</span></a></li>
				<li><a href="<?php echo base_url()."index.php/tipos"; ?>"><i class="icon icon-pencil"></i> <span>Aspectos ambientales</span></a></li>
				<li><a href="<?php echo base_url()."index.php/niveles"; ?>"><i class="icon icon-th"></i> <span>Legislación ambiental</span></a></li>
				<li class="submenu">
					<a href="#"><i class="icon icon-file"></i> <span>Configuración</span></a>
					<ul>
						<li><a href="invoice.html">Invoice</a></li>
						<li><a href="chat.html">Support chat</a></li>
						<li><a href="calendar.html">Calendar</a></li>
						<li><a href="gallery.html">Gallery</a></li>
					</ul>
				</li>
			</ul>
		
		</div>
		
		<div id="content">
			<div id="content-header">
				<h1>
					<?php echo $nombre; ?>
				</h1>
				<div class="btn-group">
					<a class="btn btn-large tip-bottom" title="Archivos"><i class="icon-file"></i></a>
					<a class="btn btn-large tip-bottom" title="Resultados"><i class="icon-user"></i></a>
					<a class="btn btn-large tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a>
				</div>
			</div>
			<div id="breadcrumb">
				<a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
				<a href="#" class="current"><?php echo $nombre; ?></a>
			</div>
			<div class="container-fluid">
				
				<div class="row-fluid">
					<div class="span12">
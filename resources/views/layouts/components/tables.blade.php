@extends('layouts.app')

@section('content')

      <!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/color-admin/admin/html/table_manage.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 11:33:30 GMT -->
<head>
	<meta charset="utf-8" />
	<title>Color Admin | Managed Tables</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="{{asset('admin2/assets/css/vendor.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin2/assets/css/default/app.min.css')}}" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
	
	<!-- ================== BEGIN page-css ================== -->
	<link href="{{asset('admin2/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin2/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}" rel="stylesheet" />
	<!-- ================== END page-css ================== -->
</head>
<body>
	<!-- BEGIN #loader -->
	
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app app-header-fixed app-sidebar-fixed">
	
	
		<!-- BEGIN #sidebar -->
	
		<div class="app-sidebar-bg" data-bs-theme="dark"></div>
		<div class="app-sidebar-mobile-backdrop"><a href="#" data-dismiss="app-sidebar-mobile" class="stretched-link"></a></div>
		<!-- END #sidebar -->
		
		<!-- BEGIN #content -->
		<div id="content" class="app-content">
			<!-- BEGIN breadcrumb -->
			<ol class="breadcrumb float-xl-end">
				<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
				<li class="breadcrumb-item active">Managed Tables</li>
			</ol>
			<!-- END breadcrumb -->
			<!-- BEGIN page-header -->
			<h1 class="page-header">Managed Tables <small>header small text goes here...</small></h1>
			<!-- END page-header -->
			<!-- BEGIN panel -->
			<div class="panel panel-inverse">
				<!-- BEGIN panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Data Table - Default</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-default" data-toggle="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-toggle="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-warning" data-toggle="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-danger" data-toggle="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<!-- END panel-heading -->
				<!-- BEGIN panel-body -->
				<div class="panel-body">
					<table id="data-table-default" width="100%" class="table table-striped table-bordered align-middle text-nowrap">
						<thead>
							<tr>
								<th width="1%"></th>
								<th width="1%" data-orderable="false"></th>
								<th class="text-nowrap">Rendering engine</th>
								<th class="text-nowrap">Browser</th>
								<th class="text-nowrap">Platform(s)</th>
								<th class="text-nowrap">Engine version</th>
								<th class="text-nowrap">CSS grade</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td width="1%" class="fw-bold">1</td>
								<td width="1%" class="with-img"><img src="../assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
								<td>Trident</td>
								<td>Internet Explorer 4.0</td>
								<td>Win 95+</td>
								<td>4</td>
								<td>X</td>
							</tr>
							
							<tr class="gradeU">
								<td class="fw-bold">58</td>
								<td class="with-img"><img src="../assets/img/user/user-1.jpg" class="rounded h-30px my-n1 mx-n1" /></td>
								<td>Other browsers</td>
								<td>All others</td>
								<td>-</td>
								<td>-</td>
								<td>U</td>
							</tr>
						</tbody>
					</table>
				</div>
				<!-- END panel-body -->
				<!-- BEGIN hljs-wrapper -->
				<div class="hljs-wrapper">
					<pre><code class="html" data-url="../assets/data/table-manage/default.json"></code></pre>
				</div>
				<!-- END hljs-wrapper -->
			</div>
			<!-- END panel -->
		</div>
		<!-- END #content -->
		
		<!-- BEGIN theme-panel -->
	
		<!-- END theme-panel -->
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="{{asset('admin2/assets/js/vendor.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/js/app.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<!-- ================== END core-js ================== -->
	
	<!-- ================== BEGIN page-js ================== -->
	<script src="{{asset('admin2/assets/plugins/datatables.net/js/dataTables.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/js/demo/table-manage-default.demo.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/plugins/%40highlightjs/cdn-assets/highlight.min.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script src="{{asset('admin2/assets/js/demo/render.highlight.js')}}" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<!-- ================== END page-js ================== -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="0120a43a662143d45adf1f99-text/javascript"></script>
	<script type="0120a43a662143d45adf1f99-text/javascript">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	
		gtag('config', 'G-Y3Q0VGQKY3');
	</script>
<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="0120a43a662143d45adf1f99-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"942343f1aa7aa41c","version":"2025.4.0-1-g37f21b1","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/table_manage.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 11:33:33 GMT -->
</html> 

@endsection


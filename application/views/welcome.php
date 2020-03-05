<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="addname">

<head>
	<meta charset="utf-8">
	<title>home</title>

</head>
<script>
	app.controller('addstudent', function($scope, $http, api_service) {
		$scope.load_data = function() {
			api_service.load_name_data().then(function(data) {
				console.log('load_name_data', data);
				$scope.names = data.data;

			});
		};
		$scope.load_data();
		$scope.add_name = {
			firstname: '',
			lastname: '',
		}

		$scope.add_name_data = function(data) {
			console.log(data);
			api_service.add_name_data(data).then(function() {
				// $scope.load_data();
				console.log('addname', data);
				$scope.add_name = {
					firstname: '',
					lastname: ''
				}
			});
		}
		$scope.edit = function(data) {
            console.log('tong', data);
            $scope.add_name = angular.copy(data);
            $("#add_name").modal('show');
        };

	});
</script>

<body ng-controller="addstudent">
	<nav class="navbar navbar-expand-md navbar-fixed-top main-nav" style="background-color: #ffc107;">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<img src="<?php echo base_url('img'); ?>/logocs.jpg" alt="" height="60px" style="border-radius: 100%;border: solid;border-width: thin;border-color: antiquewhite;padding: 0px;">
			</ul>
			<ul class="nav navbar-nav mx-auto">
				<form class="form-inline my-2 my-lg-0 justify-content-center">
					<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="width: 500px;">
					<button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
				</form>
			</ul>
			<ul class="nav navbar-nav">
				<i class="fa fa-user-circle-o" style="font-size: 40px"></i>
			</ul>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<ul class="list-group list-group-flush" style="border-right: outset;height: calc(100vh);">
					<li class="list-group-item"><a href="<?php echo site_url('script'); ?>">หน้าแรก</a></li>
					<li class="list-group-item"><a href="<?php echo site_url('script'); ?>">หน้าแรก</a></li>
					<li class="list-group-item"><a href="<?php echo site_url('script'); ?>">หน้าแรก</a></li>
					<li class="list-group-item"><a href="<?php echo site_url('script'); ?>">หน้าแรก</a></li>
					<li class="list-group-item"><a href="<?php echo site_url('script'); ?>">หน้าแรก</a></li>
				</ul>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Add Name</h5>
							</div>
						</div>
						<form>
							<div class="form-group">
								<label for="firstname">Firstname</label>
								<input type="text" class="form-control" name="firstname" ng-model="add_name.firstname">
							</div>
							<div class="form-group">
								<label for="lastname">Lastname</label>
								<input type="text" class="form-control" name="lastname" ng-model="add_name.lastname">
							</div>
							<button ng-click="add_name_data(add_name)" type="button" class="btn btn-primary">save</button>
						</form>
					</div>
					<div class="col-md-6" style="border-left: outset;height: calc(100vh);">
						<div class="card">
							<div class="card-header">
								<h5 class="card-title">Show Name</h5>
							</div>
						</div>
						<div ng-repeat="n in names">
							<div class="card">
								<div class="card-header">
									<span type="button" class="badge badge-success" style="position: absolute;right: 0px;margin-top: -12px;"ng-click="edit(n)">แก้ไข</span>
									<span class="badge badge-danger" style="position: absolute;right: 50px;margin-top: -12px;">ลบ</span>
									<h5 class="card-title">ชื่อ {{n.firstname}}</h5>
									<h5 class="card-title">นามสกุล {{n.lastname}}</h5>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="col-md-2" style="border-left: outset;height: calc(100vh); padding: 0px">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Show Name</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary">
		Launch demo modal
	</button>

	<!-- Modal -->
	<div class="modal fade" id="add_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">แก้ไข</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="firstname">Firstname</label>
							<input type="text" class="form-control" name="firstname" ng-model="add_name.firstname">
						</div>
						<div class="form-group">
							<label for="lastname">Lastname</label>
							<input type="text" class="form-control" name="lastname" ng-model="add_name.lastname">
						</div>
						<button ng-click="add_name_data(add_name)" type="button" class="btn btn-primary">save</button>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
@extends('master')

@section('title', 'قائمة المرضى')



@section('content')
<div class="card" ng-controller="patcontroller">
				<div class="card-header">
					<h4 class="card-title">قائمة المرضى</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table  datatable="" class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الأسم</th>
                                <th>Name</th>
                                <th>الجنسية</th>
								<th>الهاتف</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat = "da in patlist">
                                <th scope="row">1</th>
                                <td>@{{da.ar_fname}}  @{{da.ar_lname}}</td>
                                <td>@{{da.en_fname}}  @{{da.en_lname}}</td>
                                <td>@{{da.nat}} </td>
								<td>@{{da.phone1}}</td>
								<td>
								<button type="button"  class="btn btn-primary" ng-click = "edit()">تعديل</button>
								<button type="button" ng-click="deletePat(da.id)" class="btn btn-danger ">حذف</button>
								</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>
				
@endsection
@extends('master')

@section('title', 'قائمة العيادات')



@section('content')
<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة العيادات</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table class="table table-hover mb-0" style="font-size:smaller;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم الفرع</th>
                                <th>اسم العيادة</th>
								<th>Clinic name</th>
                                <th>نوعها</th>
								<th>الهاتف</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>الفرع الرئيسي - CNT</td>
                                <td>عيادة الجلدية</td>
                                <td>Skin Clinic</td>
								<td>داش بورد دكتور واستقبال ومحاسبة</td>
								<td>05309613013</td>
								<td>
								<button type="button" class="btn btn-primary btn-sm ">تعديل</button>
								<button type="button" class="btn btn-danger btn-sm">حذف</button>
								</td>
                            </tr>
                          
                           
                        </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>
				
@endsection
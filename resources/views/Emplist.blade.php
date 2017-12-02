@extends('master')

@section('title', 'قائمة الموظفين')



@section('content')
<div class="card">
				<div class="card-header">
					<h4 class="card-title">قائمة الموظفين</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				
				  <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الباركود</th>
                                <th>الأسم</th>
                                <th>Name</th>
								<th>طبيعة الموظف</th>
								<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td style = "background-color:#967ADC;color:white;">06918601</td>
                                <td>محمد معتز</td>
                                <td>Mohmmad Moatz</td>
								<td>ممرض</td>
								<td>
								<button type="button" class="btn btn-primary ">تعديل</button>
								<button type="button" class="btn btn-danger ">حذف</button>
								</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td style = "background-color:#967ADC;color:white;">09885782</td>
                                <td>الأسم هنا</td>
                                <td>Name Here</td>
								 <td>ممرض</td>
								 <td>
								 <button type="button" class="btn btn-primary ">تعديل</button>
								 <button type="button" class="btn btn-danger ">حذف</button>
								 </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>
				
@endsection
@extends('master')

@section('title', 'حجز جديد')



@section('content')

	<div class="card">
				<div class="card-header">
					<h4 class="card-title">حجز جديد</h4>
				</div>
				<div class="card-body">
					<div class="card-block">
					
						
						
					
						
							
				<div class="card">
				<div class="card-header">
					<h4 class="card-title" id="basic-layout-form">فاتورة المريض</h4>
					<a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
							
							<li><a data-action="expand"><i class="icon-expand2"></i></a></li>
							<li><a data-action="close"><i class="icon-cross2"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-body collapse in">
					<div class="card-block">
						
						<form class="form">
							<div class="form-body">
								
								<div class="row">
							
									<div class="col-md-12">
										<div class="form-group">
											<label for="projectinput1">رقم الفاتورة</label>
											<input type="text" id="projectinput1" class="form-control" placeholder="009481" name="fname">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput2">التاريخ</label>
											<input type="text" id="projectinput2" class="form-control" placeholder="" name="lname">
										</div>
									</div>
								
								
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">المريض</label>
											<input type="text" id="projectinput3" class="form-control"  name="email">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">العيادة</label>
											<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
										</div>
									</div>
									
										<div class="col-md-6">
										<div class="form-group">
											<label for="projectinput3">الطبيب</label>
											<select id="projectinput6" name="budget" class="form-control">
												<option value="a3zb"></option>
												<option value="mtzoj">...</option>
											</select>
										</div>
									</div>
									
									</div>
							

								<h4 class="form-section"><i class="icon-clipboard4"></i> بيانات الفاتورة</h4>
								<div class="row">
								
								<div class="col-md-4">
								<div class="form-group">
									<label for="companyName">الصنف</label>
									<input type="text" id="companyName" class="form-control" placeholder="اختيار الصنف" name="company">
								</div>
								</div>
								
								<div class="col-md-4">
								<div class="form-group">
									<label for="companyName">الكمية</label>
									<input type="text" id="companyName" class="form-control" placeholder="1" name="company">
								</div>
								</div>
									
								<div class="col-md-8">
								
								
								<button type="button" class="btn btn-info btn-min-width mr-1 mb-1 btn-block">+</button>
								
								
								</div>
								
								<div class ="col-md-12">
						<table class="table table-hover mb-0" style="font-size:smaller;">
                        <thead>
                            <tr>
                                <th>م</th>
                                <th>الصنف</th>
                                <th>الكمية</th>
								<th>السعر</th>
                                <th>الأجمالي</th>
								<th></th>
                            </tr>
                        </thead>
						<tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>كشف جديد</td>
                                <td>1</td>
                                <td>100</td>
								<td>100</td>
								<td></td>
								
					 </tbody>
                    </table>
								</div>
								
								</div>
								
								<h4 class="form-section"><i class="icon-clipboard4"></i> التفاصيل</h4>
								
								<div class="col-md-12">
								<div class="form-group">
									<label for="companyName">اجمالي الفاتورة</label>
									<input type="number" id="companyName" class="form-control" placeholder="0" name="company">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">خصم %</label>
									<input type="number" id="companyName" class="form-control" name="company">
								</div>
								</div>
								
								<div class="col-md-6">
								<div class="form-group">
									<label for="companyName">خصم </label>
									<input type="number" id="companyName" class="form-control" name="company">
								</div>
								</div>
								
								<div class="col-md-12">
								<div class="form-group">
								<label for="companyName">الصافي </label>
									<input type="number" id="companyName" class="form-control" name="company">
								</div>
								</div>
								
								
								
								</div>
								
								
								
								
								
								
									

							<div class="form-actions">
								<button type="button" class="btn btn-warning mr-1">
									<i class="icon-cross2"></i> الغاء
								</button>
								<button type="submit" class="btn btn-primary">
									<i class="icon-check2"></i> حفظ
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
								
							
							</div>
							
					
							
			
				</div>
			</div>
 
@endsection
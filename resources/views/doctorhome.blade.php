@extends('master')

@section('title', 'شاشة الطبيب')



@section('content')
<div class="card">
				<div class="card-header">
					<h4 class="card-title">شاشة الطبيب</h4>
				</div>
	<div class="card-body">
				
				<div class="card-block">
				<div class="row">
				
				<h4 align = "center" >  قائمة الأنتضار  <span class="bg-success" style="color:#fff">  2017/11/03 </span> </h4> 
				<br/>
				
			<div class="col-md-12">
			
			<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button">قفل استقبال المزيد من الزيارات</button>
	
			</div>
			
			<div class="col-md-6" >
			
		    <button class="btn btn-primary btn-min-width mr-1 mb-1 btn-block" type="button"  disabled="disabled">فترة العيادة : 01:00 الى 10:00</button>
		
			</div>
			<div class = "col-md-6">
		<button class="btn btn-danger btn-min-width mr-1 mb-1 btn-block" type="button"  disabled="disabled">3 ساعة و 5 دقيقة تبقى وتنتهي الفترة</button>

			</div>
				
				</div>
				
				  <div class="table-responsive">
                    <table class="table table-hover mb-0" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الساعة</th>
                                <th>اسم المريض</th>
								<th>رقم الملف</th>
                   				<th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>03:00 م</td>
                                <td>محسن يوسف صديق</td>
                                <td>P-005-1024</td>
								<td>
								<button type="button" class="btn btn-primary">دخول</button>
								<button type="button" class="btn btn-info ">التفاصيل</button>
								</td>
                            </tr>
                          
                           </tbody>
                    </table>
                </div>
				
				
				</div>
				
				
		</div>
				
				
</div>

<div class="card">
				<div class="card-header">
					<h5 class="card-title" style = "color:#DA4453;" >زيارات المريض : محسن يوسف صديق</h5>
				</div>
				
				<div class="card-body">
				
				<div class="card-block">
				<h1 align = "center"> لايوجد بيانات </h1>
			</div>
			
		</div>
				
</div>
				
@endsection
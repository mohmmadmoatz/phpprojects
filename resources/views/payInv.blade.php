<div class="modal fade text-xs-left" id="paymodel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel1">التنبيهات</h4>
            </div>
    
            <div class="modal-body">
           
              <h3>سند قبض</h3>
              
               <div class = "form-group">
                   <label class= "form-group"> الطبيب </label>
                   <input type ="text" class = "form-control" readonly ng-model = "pay_doc" >
               </div> 

               <div class = "form-group">
                    <label class= "form-group"> المريض </label>
                    <input type ="text" class = "form-control" readonly ng-model = "pay_pat">
                </div>

                <hr>

                <table class="table table-striped">
                        <thead>
                          <tr >
                            <th>المجموعة</th>
                            <th>الخدمة</th>
                            <th> المبلغ</th>
                            <th>عدد</th>
                            <th>الأجمالي</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr ng-repeat = "da in paySrvs">

                            <td>@{{da.sv_group}}</td>
                            <td>@{{da.sv_name}}</td>
                            <td>@{{da.sv_price}}</td>
                            <td>@{{da.sv_qty}} </td>
                            <td>@{{da.sv_qty * da.sv_price}} </td>
                          </tr>
                      
                        </tbody>
                      </table>
                      
                     

                            <div class = "form-group">
                                    <label class= "form-group"> الصافي </label>
                                    <input type ="text" class = "form-control" readonly ng-model = "pay_netprice">
                                </div>
            </div>
    
            <div class="modal-footer">
              
                <button type="button" class="btn btn-success " data-dismiss="modal" ng-click = "addMoney()">حفظ</button>

              <button type="button" class="btn grey btn-outline" data-dismiss="modal">الغاء</button>
              
            </div>
          </div>
        </div>
      </div>
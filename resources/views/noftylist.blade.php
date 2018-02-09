<div class="modal fade text-xs-left" id="default3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="myModalLabel1">التنبيهات</h4>
        </div>

        <div class="modal-body">
       
            <table class="table table-striped">
                <thead>
                  <tr >
                    <th>المريض</th>
                    <th>الطبيب</th>
                    <th>صافي المبلغ</th>
                    <th>سند قبض</th>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat = "da in nofties">
                    <td>@{{ getPatinfo(da.pat_id,"name") }}</td>
                    <td>@{{ getDocname(da.doc_id) }}</td>
                    <td>@{{da.net_price}}</td>
                    <td> <button class = "btn btn-primary" data-toggle="modal" data-target="#paymodel" ng-click = "sdatatoanother(da)" > سند قبض  </button> </td>
                  </tr>
              
                </tbody>
              </table>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn grey secondary" data-dismiss="modal">الغاء</button>
          
        </div>
      </div>
    </div>
  </div>
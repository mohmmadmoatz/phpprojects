app.controller('booking',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
    var lang = {
        "decimal":        "",
        "emptyTable":     "لايوجد بيانات",
        "info":           "Showing _START_ to _END_ of _TOTAL_ entries",
        "infoEmpty":      "Showing 0 to 0 of 0 entries",
        "infoFiltered":   "(filtered from _MAX_ total entries)",
        "infoPostFix":    "",
        "thousands":      ",",
        "lengthMenu":     "Show _MENU_ entries",
        "loadingRecords": "Loading...",
        "processing":     "Processing...",
        "search":         "بحث عام : ",
        "zeroRecords":    "لايوجد بيانات",
        "paginate": {
            "first":      "<|",
            "last":       "|>",
            "next":       ">>",
            "previous":   "<<"
        },
        "aria": {
            "sortAscending":  ": activate to sort column ascending",
            "sortDescending": ": activate to sort column descending"
        }
    }
    
    $scope.vm = {};
	$scope.vm.dtInstance = {};   
	$scope.vm.dtColumnDefs = [DTColumnDefBuilder.newColumnDef(2).notSortable()];
	$scope.vm.dtOptions = DTOptionsBuilder.newOptions()
					  .withOption('paging', true)
					  .withOption('searching', true)
					  .withOption('info', false)
					  .withOption('dom', 'Bfrtip')
					  .withButtons([])
                      .withOption('language',lang)     
    
                      $http.get('api/cln')
                      .success(function(respone){
                          $scope.clns= respone;
                      })



$scope.refresh =  function() {
    $http.get('api/cln')
    .success(function(respone){
        $scope.clns= respone;
    })
}

// Cln Per Ctrl 


$scope.perArr = [];
$scope.perBooked = [{perid : 'الفترة 1',appt:'09:00 ص', st : 'كشف جديد',pat: 'محمد معتز'}]

$scope.checkappt  =  function (perid,appt,type) { 
var status = ''
var pat = ''
if (perid === 'استراحة'){
    return 'استراحة/background-color:#f39c12;color:#fff'
}
for (let index = 0; index < $scope.perBooked.length; index++) {
    
    const element = $scope.perBooked[index];
    console.log(element.appt,appt)
    if (perid === element.perid && appt.trim() === element.appt.trim()) {
        status = element.st
        pat = element.pat
    }

    switch (type) {
        case 'pat':
            
            return pat
    
        case 'st':
        if (status) {
            return status + "/background-color:#34495e;color:#fff";
        }else{
            return  "متاح"
        }
            

    }

    

}

}

$scope.getDoctors  = function () {
    $http.get('api/doctor')
    .success(function(respone){
        $scope.docs= respone;
    })
}

$scope.getPats  = function () {
    $http.get('api/pats')
    .success(function(respone){
        $scope.pats= respone;
    })
}

$scope.getDoctors();
$scope.getPats();
$scope.getclnper = function(id) {

    $http.get('api/clnper/' + id ).success(function (data){
        
                $scope.clnsper =  data;
            var count = 0
            for (let index = 0; index <  $scope.clnsper.length; index++) {
                count +=1
                const element =  $scope.clnsper[index];
                 var timeFirst =  new Date(element.per_from);
                 var timeEnd = new Date(element.per_to);

                 $scope.Pertime(timeFirst.toTimeString("HH:MM"),element.kshf_per,$scope.getdiff(timeFirst,timeEnd),element.id)
                if (count !== $scope.clnsper.length) {

                 $scope.perArr.push({perid : 'استراحة' , appt : '--'})

                }
                 
            }


        })

}



$scope.Pertime = function (ftime,per,svh,perid) { 
    var svhinmnt = svh.split(":")[0] * 60 + parseInt(svh.split(":")[1]) 
    var numofper = svhinmnt / per
    var hourstart =  parseInt(ftime.split(":")[0])
    var minutestart =  parseInt(ftime.split(":")[1])
    
    var counter = 0

    $scope.perArr.push({perid : 'الفترة ' + perid , appt : h24to12h(hourstart + ":" + minutestart)})    

    for (var index = 1; index < numofper; index++) {
        
    var result = ""
      minutestart += parseInt(per)
      if (minutestart===60){
          minutestart=0
          hourstart +=1
      }
      
      if (hourstart === 24){
      hourstart = 0
      }
      
      result = hourstart + ":" + minutestart

      $scope.perArr.push({perid : 'الفترة ' + perid , appt : h24to12h(result)})    
    }
      
    }
    
    function h24to12h(hour) {
    var hh = hour.split(":")[0]
    var mm = hour.split(":")[1]
    var ampm = ""
    if (hh > 12){
    ampm = " م "
    }else{
    ampm = "ص  "
    }
      
    var hh12 = hh % 12 || 12
    if (hh12 < 10) {
        hh12 = "0" + hh12
    }
    if (mm < 10) {
        mm = "0" + mm
    }
    var result = ""
    result = hh12 + ":" + mm + " " + ampm
      return result
    }
    


$scope.getdiff = function (h1,h2) {

    var timeStart = new Date(h1).getTime();
    var timeEnd = new Date(h2).getTime();
    var hourDiff = timeEnd - timeStart; //in ms
    var secDiff = hourDiff / 1000; //in s
    var minDiff = hourDiff / 60 / 1000; //in minutes
    var hDiff = hourDiff / 3600 / 1000; //in hours
    var humanReadable = {};
    humanReadable.hours = Math.floor(hDiff);
    humanReadable.minutes = minDiff - 60 * humanReadable.hours;
    return humanReadable.hours + ":" + humanReadable.minutes

}

$scope.edit = function (id) {
    $http.get('api/appt/show/' + id).success(function(data){
        $scope.hour = data.hour
        $scope.date1 = data.date1
        $scope.status = data.status
        $scope.apptstatus = data.apptstatus
        $scope.pat_id = data.pat_id
        $scope.cln_id = data.cln_id
        $scope.doc_id = data.doc_id
        $scope.srvs = angular.fromJson(data.srvs)
        $scope.inv_total = data.inv_total
        $scope.inv_discountnsba = data.inv_discountnsba
        $scope.inv_discountvalue = data.inv_discountvalue
        $scope.net_price = data.net_price
        $scope.apptid = id
    })
}

$scope.add = function() {
    $scope.loading = true;
    var apiUrl = ""
    if ($scope.apptid) {
        apiUrl = "api/appt/" + $scope.apptid;
    }else{
        apiUrl = "api/appt"
    }
  

    $http.post(apiUrl, {
    hour: $scope.hour,
    date1: $scope.date1,
    status : $scope.status,
    apptstatus : $scope.apptstatus,
    pat_id : $scope.pat_id,
    cln_id : $scope.cln_id,
    doc_id : $scope.doc_id,
    srvs : angular.toJson($scope.srvs),
    inv_total : $scope.inv_total,
    inv_discountnsba : $scope.inv_discountnsba,
    inv_discountvalue : $scope.inv_discountvalue,
    net_price :$scope.net_price
    }).success(function(data, status, headers, config) {
    
        
        swal({
            title: "تم !",
            text: "تمت العملية بنجاح ",
            type: "success",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "موافق"
            }, 
            function(){ 
            
         });
         
         $scope.hour = ''
         $scope.date1 = ''
         $scope.status = ''
         $scope.apptstatus = ''
         $scope.pat_id = ''
         $scope.cln_id = ''
         $scope.doc_id = ''
         $scope.srvs = []
         $scope.inv_total = ''
         $scope.inv_discountnsba = ''
         $scope.inv_discountvalue = ''
         $scope.net_price = ''
    }).error(function (error) {
        swal({
            title: "خطأ",
            text: "لم تتم الأضافة يرجى مراجعة البيانات",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "موافق"
            }, 
            function(){ 
            
         });
    });
    };
    


//End cTrl
})



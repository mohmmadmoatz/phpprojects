app.controller('clnctrl',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
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
    
$http.get('api/branch')
.success(function(respone){
    $scope.brns= respone;
    $scope.refreshBranch();
})



$scope.refreshBranch =  function() {
    $http.get('api/cln')
    .success(function(respone){
        $scope.clns= respone;
    })
}

$scope.get_brname = function(id) {

    var brname = ''

    for (let index = 0; index < $scope.brns.length; index++) {
        const element = $scope.brns[index];
        
        if (id == element.id) {
            return element.branchname
        }


    }


}

$scope.refresh = function() {
    $http.get('api/cln')
    .success(function(respone){
        $scope.clns= respone;
    })
}

$scope.edit = function (id) {

    $http.get('api/cln/show/' + id).success(function(data){
        console.log(data)
        $scope.br_id = data['br_id'];
        $scope.cln_code = data.cln_code;
        $scope.cln_arname = data.cln_arname;
        $scope.cln_enname = data.cln_enname
        $scope.cln_type = data.cln_type
        $scope.cln_phone = data.cln_phone
        $scope.cln_phone2 = data.cln_phone2
        $scope.cln_phone3 = data.cln_phone3
        $scope.cln_phone4 = data.cln_phone4
        $scope.cln_fax = data.cln_fax
        $scope.cln_fax2 = data.cln_fax
        $scope.cln_email = data.cln_email
        $scope.cln_kshfvalue = data.cln_kshfvalue
        $scope.cln_refvale = data.cln_refvale
        $scope.cln_refdays = data.cln_refdays
        
        $scope.clnid = id;

    })

}

$scope.add = function() {
$scope.loading = true;
var apiUrl = ""

if ($scope.clnid) {
    apiUrl = "api/cln/" + $scope.clnid;
}else{
    apiUrl = "api/cln"
}

$http.post(apiUrl, {
br_id: $scope.br_id,
cln_code: $scope.cln_code,
cln_arname : $scope.cln_arname,
cln_enname : $scope.cln_enname,
cln_type : $scope.cln_type,
cln_phone  :   $scope.cln_phone,
cln_phone2 : $scope.cln_phone2,
cln_phone3 : $scope.cln_phone3,
cln_phone4 : $scope.cln_phone4,
cln_fax : $scope.cln_fax,
cln_fax2 : $scope.cln_fax2,
cln_email : $scope.cln_email,
cln_kshfvalue : $scope.cln_kshfvalue,
cln_refdays : $scope.cln_refdays,
cln_refvale : $scope.cln_refvale,
more :$scope.more,

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

     $timeout(function () {
        location.reload();
    }, 1000);

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



$scope.delete = function(id) {
    $http.delete('api/cln/'+id).success(function(data, status, headers, config) {

            $scope.refresh();


        });
}


// Cln Per Ctrl 

$scope.getclnper = function (id) {
    $http.get('api/clnper/' + id ).success(function (data){

        $scope.clnsper =  data;

    })
}

$scope.deleteper = function(id) {
    $http.delete('api/clnper/'+id).success(function(data, status, headers, config) {

        $scope.getclnper($scope.cln_id);
        

        });
}


$scope.addper = function() {
    $scope.loading = true;
    var apiUrl = ""
    if ($scope.perid) {
        apiUrl = "api/clnper/" + $scope.perid;
    }else{
        apiUrl = "api/clnper"
    }
    var perfrom = new Date($scope.per_from)
    var per_to = new Date($scope.per_to)

    $http.post(apiUrl, {
    cln_id: $scope.cln_id,
    per_from: perfrom,
    per_to : per_to,
    kshf_per : $scope.kshf_per,
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
         $scope.getclnper($scope.cln_id)
         $scope.per_from = ""
         $scope.per_to  = ""
         $scope.kshf_per = ""
         $scope.perid = ""
    
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

    $scope.editper = function (id) {
        
            $http.get('api/clnper/show/' + id).success(function(data){
              
                $scope.cln_id = data['cln_id'];
                $scope.per_from = new Date(data.per_from);
                $scope.per_to = new Date(data.per_to);
                $scope.kshf_per = data.kshf_per;
                $scope.perid = id;
        
            })
        
        }

//End cTrl
})



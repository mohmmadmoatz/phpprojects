app.controller('brctrl',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
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

                      $scope.files = [];   
                      $scope.btnst = "حفظ"
                      $scope.btnstd = false
                      $scope.imgSrc =  "images/up.png"
$http.get('api/branch')
.success(function(respone){
    $scope.brns= respone;
})

$scope.refresh = function() {
    $http.get('api/branch')
    .success(function(respone){
        $scope.brns= respone;
    })
}

var fd = new FormData();
$scope.uploadavtar = function(files) {
    fd.append("file", files[0]);
  }


  $scope.uploadDone = function () {
    var apiUrl = ""
    $scope.btnst = "جاري الحفظ ..."
    $scope.btnstd = true;

    if ($scope.brid) {
        apiUrl = "api/branch/" + $scope.brid;
    }else{
        apiUrl = "api/branch"
    }

  

    fd.append("br_code", $scope.br_code)
    fd.append("branchname", $scope.branchname)
    fd.append("br_own", $scope.br_own)
    fd.append("br_email", $scope.br_email)
    fd.append("br_phone", $scope.br_phone)
    fd.append("br_fax", $scope.br_fax)
    fd.append("br_address", $scope.br_address)  

    $http.post(apiUrl, fd, {
        withCredentials: true,
        headers: {'Content-Type': undefined },
        transformRequest: angular.identity
    }).then(function successCallback(response) {
    swal({
        title: "تم !",
        text: "تمت العملية بنجاح ",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "موافق"
        })
        $timeout(function () {
            location.reload();
        }, 1000);
    }, function errorCallback(response) {
        swal({
            title: "خطأ",
            text: "يوجد خطأ يرجى مراجعة البيانات ",
            type: "error",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "موافق"
            })
    });
  }






$scope.edit = function (id) {
    
        $http.get('api/branch/show/' + id).success(function(data){
            console.log(data)
            $scope.br_code = data['br_code'];
            $scope.branchname = data.branchname;
            $scope.br_own = data.br_own;
            $scope.br_email = data.br_email;
            $scope.br_phone = data.br_phone
            $scope.br_fax = data.br_fax
            $scope.br_address = data.address

            if (data.br_img) {
                $scope.imgSrc =  "images/branch/"  + data.br_img
            }else{
                $scope.imgSrc =  "images/up.png"
            }
           

            $scope.brid = id;
    
        })
    
    }

$scope.delete = function(id) {
    $http.delete('api/branch/'+id).success(function(data, status, headers, config) {

            $scope.refresh();


        });
}

})



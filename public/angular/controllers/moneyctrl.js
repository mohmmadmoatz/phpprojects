app.controller('moneyctrl',function($scope,$http,$window,$timeout,DTOptionsBuilder, DTColumnBuilder,DTColumnDefBuilder) {
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
    

                    


$scope.getbranches = function () {
    $http.get('api/branch')
    .success(function(respone){
        $scope.brns = respone;

    })
}
$scope.getbranches()

$scope.getpats = function () {
    $http.get('api/pats')
    .success(function(respone){
        $scope.pats = respone;
        console.log($scope.pats)
    })
}
$scope.getpats()

$scope.getclns = function (brid) {
    if (brid ==='الجميع') {
        brid = ''
    }
    $http.get('api/cln/bybranch/' + brid)
    .success(function(respone){
        $scope.clns = respone;

    })
}

$scope.getdoctros = function (clnid) {
    if (clnid ==='الجميع'){
        clnid = '';
    }
    $http.get('api/doctor/bycln/' + clnid)
    .success(function(respone){
        $scope.docs = respone;

    })
}

$scope.getbanks = function () {
  
    $http.get('api/bank')
    .success(function(respone){
        $scope.banks = respone;

    })
}
$scope.getbanks()

$scope.getbranchname = function (brid) {
let brname
    for (let index = 0; index < $scope.brns.length; index++) {
        const element = $scope.brns[index];
        console.log(element.id,brid)
        if (element.id == brid) {
        brname = element.branchname
        }
 
    }
return brname

}

$scope.getbankname = function (bankid) {
    let bankname
        for (let index = 0; index < $scope.banks.length; index++) {
            const element = $scope.banks[index];
            
            if (element.id == bankid) {
                bankname = element.bankname
            }
     
        }
    return bankname
    }


    $scope.getpatname = function (patid) {
        let patname
            for (let index = 0; index < $scope.pats.length; index++) {
                const element = $scope.pats[index];
                
                if (element.id == patid) {
                    patname = element.ar_fname + ' ' + element.ar_lname
                }
         
            }
        return patname
        }

$scope.getresult = function() {

    if (!$scope.kind) {
        $scope.kind ='الجميع'
    }

    if (!$scope.clnid) {
        $scope.clnid ='الجميع'
    }

    if (!$scope.docid) {
        $scope.docid ='الجميع'
    }

    if (!$scope.bankid) {
        $scope.bankid ='الجميع'
    }

    $http.get('api/money/k=' + $scope.kind.trim(' ') +'/c=' + $scope.clnid + '/d=' + $scope.docid + '/b=' + $scope.bankid)
    .success(function(respone){
        $scope.result = respone;
        console.log($scope.result)

    })
}





})



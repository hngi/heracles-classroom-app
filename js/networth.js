var sum = 0;
var inputArray = [];

var liabilitySum = 0;
var liabilityInputArray = [];

var networth = 0;

function getArray(){
    var x = document.getElementsByClassName('asset');
    for(var i = 0; i < x.length ; i++ ){
        inputArray[i] = Number(x[i].value);
    }
    inputArray = inputArray;
    return inputArray;

}
function inputValidate(){
    var arr = [];
    arr = getArray();
    var initsum=0;
    for(var i = 0; i < arr.length ; i++ ){
        // console.log(arr[i]);
        initsum += Number(arr[i]);
        // console.log("");
    }
    sum = initsum;
    // console.log(sum);
    // console.log("");
    displaySum(sum);
}
function displaySum(sum){
    document.getElementById('assetSum').innerHTML = sum.toFixed(2);
}



function getLiabilityArray(){
    var y = document.getElementsByClassName('_liability');
    for(var i = 0; i < y.length ; i++ ){
        liabilityInputArray[i] = Number(y[i].value);
    }
    liabilityInputArray = liabilityInputArray;
    return liabilityInputArray;

}
function liabilityValidate(){
    var liabilityArr = []
    liabilityArr = getLiabilityArray();
    var initliabilitySum=0;
    for(var i = 0; i < liabilityArr.length ; i++ ){
        // console.log(liabilityArr[i]);
        initliabilitySum += Number(liabilityArr[i]);
        // console.log("");
    }
    liabilitySum = initliabilitySum;
    // console.log(liabilitySum);
    // console.log("");
    displayliabilitySum(liabilitySum);
}
function displayliabilitySum(liabilitySum){
    document.getElementById('liabilitySum').innerHTML = '-' +liabilitySum.toFixed(2);
}
function displayNetworth(){
    document.getElementById('_networth').innerHTML = (sum - liabilitySum).toFixed(2);
}
function _reset(){
    document.getElementById('liabilitySum').innerHTML = 0 ;
    document.getElementById('_networth').innerHTML = 0 ; 
    document.getElementById('assetSum').innerHTML = 0;
    var x = document.getElementsByClassName('asset');
    for(var i = 0; i < x.length ; i++ ){
        x[i].value = '' ;
    }
    var y = document.getElementsByClassName('_liability');
    for(var i = 0; i < y.length ; i++ ){
    y[i].value = '';
    }
    sum = 0;
    liabilitySum = 0;
}

function callName(){
    setTimeout(hide, 3000);
}
function hide(){
    document.getElementById('animate_name').style.visibility = 'hidden';
}

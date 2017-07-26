define(function(){
    function isArray(arr){
        if(arr.constructor == Array && arr instanceof Array){
            return true;
        }
        return false;
    }
    return isArray;
});


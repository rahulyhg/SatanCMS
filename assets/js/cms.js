function ajax(type, url, variables, callback){
    var i = 0,
        string_vars = '';
    for(var key in variables){
        string_vars += key+"="+escape(variables[key])+"&";
    }
    string_vars = string_vars.substring(0,(string_vars.length)-1);

    var xhr;
    if(XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }else{
        return false;
    }

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function(){
        if(xhr.readState < 4){
            return false;
        }
        if(xhr.status !== 200){
            return false;
        }
        if(xhr.readyState === 4){
            callback(xhr);
        }
    };

    xhr.send(string_vars);
}

function message(arg){
    var body = document.getElementById('body');
}
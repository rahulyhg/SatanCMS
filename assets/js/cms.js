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

function message(arg,type){
    var body = document.getElementById('body');
    var messageDiv = document.createElement('div');
    var content = document.createTextNode(arg);
    messageDiv.className = 'alert-popup '+type;
    messageDiv.appendChild(content);
    if(body.insertBefore(messageDiv,body.firstChild)){
        return true;
    }else{
        return false;
    }
}
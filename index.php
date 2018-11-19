<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <br><br>

<div id="wrapper">
    <div id="info"></div>
</div>
<div class="">
  <ul>
    <a href="#"></a>
  </ul>
</div>
    <script>

            const showUsers = () => {
                let info = document.getElementById('info');
                let xmlhttp;
                const READYSTATE = 4;
                const STATUS = 200;
                /*condiciones de ajax*/
                if (window.XMLHttpRequest){
                    xmlhttp = new XMLHttpRequest()
                }else{
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }

                xmlhttp.onreadystatechange = function(){
                    if(this.readyState === READYSTATE && this.status === STATUS ){
                    info.innerHTML = xmlhttp.responseText;
        }

    }

        xmlhttp.open('GET' , 'php/server.php?users='+'users' , true)
        xmlhttp.send();

            }

            showUsers();


            function updateUser(usuarioID){

                let nameID = `nombreID${usuarioID}`
                let emailID = `emailID${usuarioID}`
                let delet =  `delete${usuarioID}`
                let update =  `update${usuarioID}`
                let updateNombreID =`${nameID}-editar`

               let username =  document.getElementById(nameID).innerHTML;

               let parent = document.querySelector('#'+nameID);
                if(parent.querySelector('#'+updateNombreID) === null){
                    document.getElementById(nameID)
                                            .innerHTML =`<input type="text"
                                            id="${updateNombreID}"
                                             value ="${username}" >`;


                    document.getElementById(delet).disabled = 'true';
                    document.getElementById(update).style.display = 'block';

                }

            }

            function updateUsers(new_name) {
                const READYSTATE = 4;
                const STATUS = 200;
                let xmlhttp;
                if(window.XMLHttpRequest){
                    xmlhttp  = new XMLHttpRequest();

                }else {
                    xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
                }


                let update_name =  document.getElementById('nombreID'+new_name+'-editar').value;

                console.log(update_name)

                xmlhttp.onreadystatechange = function () {
                    if(xmlhttp.readyState === READYSTATE && xmlhttp.status === STATUS){
                        showUsers()

                    }
                }
                    xmlhttp.open('GET' , 'php/server.php?new_name='+new_name+'&update_name='+update_name , true );
                    xmlhttp.send()

            }
            </script>
</body>
</html>

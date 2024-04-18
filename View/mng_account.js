load_acc();
function load_acc() {
fetch("http://localhost/rest_api_php/controller/show_api_account.php")
      .then((res) => res.json())
      .then((data) => {
        for (let i = 0; i < data.account.length; i++) {
          //   const data.question[i] = data.question[i];
          
           var id = data.account[i].id_user;
          var  hoten = data.account[i].name;
          var  user_name = data.account[i].user_name;
          var  pass = data.account[i].pass;
          var  sdt = data.account[i].sdt;
          var  rolee = data.account[i].role;
          document.getElementById("table_account").innerHTML += ` 
       
        <tr class="item${id}">
            <th>${id}</th>
              <th>${hoten}</th>
              <th>${user_name}</th>
              <th>${pass}</th>
              <th>${sdt}</th>
              <th>${rolee}</th>
              <th>
            <span><button class="btn_delete" onclick=deletee(${id}) >Delete</button> <button id="${id}" onclick= "read_one(${id})">Edit</button></span>
          </th>
            </tr>
        
        
        `;
        }
      })
      .catch((error) => console.log(error))}
function deletee(id) {
    // var options = {
    //     method : "DELETE" ,
    //     headers: {
    //         "Content-Type": "application/json",
    //       },
    // };
    // fetch(url_api+'/'+id,options) 
    // .then(function(response){
    //     response.json();
    // })
    // .then(function() {
    //     
    //     }
    // })
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    
    const raw = JSON.stringify({
      "id_user": id
    });
    
    const requestOptions = {
      method: "DELETE",
      headers: myHeaders,
      body: raw,
      redirect: "follow"
    };
    
    fetch("http://localhost/rest_api_php/controller/delete_acc.php", requestOptions)
      .then((response) => response.text())
      .then((result) => console.log(result))
      .catch((error) => console.error(error));  
      var item = document.querySelector('.item'+id)
         if(item)
             item.remove();
}
var hoten_input = document.getElementById('hoten').value ;
var username_input = document.getElementById('username').value ;
var pass_input = document.getElementById('pass').value ;
var sdt_input = document.getElementById('sdt').value ;
var role_input = document.getElementById('role').value ;
var url_api = "http://localhost/rest_api_php/controller/show_api_account.php" ;
// FUNCTION CREATE DATA ACCOUNT 
// function creat(data,callback) {
//     var options = {
//         method : "POST" ,
//         headers: {
//             "Content-Type": "application/json",
//           },
//         body : JSON.stringify(data)
//     };
//     fetch(url_api,options) 
//     .then(function(response){
//         response.json();
       
//     })
   
// }
document.getElementById('btn_update_acc').addEventListener("click",()=>{
  const myHeaders = new Headers();
myHeaders.append("Content-Type", "application/json");

const raw = JSON.stringify({
  "id_user": document.getElementById('id_user').value,
      "name": document.getElementById('hoten').value,
      "user_name": document.getElementById('username').value,
      "pass": document.getElementById('pass').value,
      "sdt": document.getElementById('sdt').value,
      "role": document.getElementById('role').value
});

const requestOptions = {
  method: "PUT",
  headers: myHeaders,
  body: raw,
  redirect: "follow"
};

fetch("http://localhost/rest_api_php/controller/update_acc.php", requestOptions)
  .then((response) => response.text())
  .then((result) => {
    console.log(result);
    
  })
  .catch((error) => console.error(error)); 
  alert('cap nhat thanh cong');
// 
setTimeout(window.location.reload(),3000);

})
// FUNTION EDIT DATA 
// function edit() {
//   const myHeaders = new Headers();
// myHeaders.append("Content-Type", "application/json");

// const raw = JSON.stringify({
//   "id_user": document.getElementById('id_user').value,
//       "user_name": document.getElementById('username').value,
//       "name": document.getElementById('hoten').value,
//       "pass": document.getElementById('pass').value,
//       "sdt": document.getElementById('sdt').value,
//       "role": document.getElementById('role').value
// });

// const requestOptions = {
//   method: "PUT",
//   headers: myHeaders,
  
// };

// fetch("http://localhost/rest_api_php/controller/update_acc.php", requestOptions)
//   .then((response) => response.text())
//   .then((result) => console.log(result))
//   .catch((error) => console.error(error)); 

// }
//FUNTION READ DATA HAVA CONDITIONER !! 
function read_one(id) {
  // console.log("http://localhost/rest_api_php/controller/show_one_acc.php?id="+id);
   fetch("http://localhost/rest_api_php/controller/show_one_acc.php?id="+id)
      .then((res) => res.json())
      .then((data) => {
        
          
           var id1 = data.id_user ;
          var hoten1 = data.name;
          var  user_name1 = data.user_name;
          var   pass1 = data.pass;
         var   sdt1 = data.sdt;
         var   role1 = data.role;

           console.log(data.name);
           document.getElementById('id_user').value= id1;
           document.getElementById('hoten').value= hoten1;
           document.getElementById('username').value=user_name1 ;
           document.getElementById('pass').value=pass1 ;
           document.getElementById('sdt').value=sdt1 ;
           document.getElementById('role').value=role1 ;
      })
      .catch((error) => console.log(error))
    
}
document.getElementById('btn_creat_acc').addEventListener("click",(event)=> {
    // event.preventDefault();
    // console.log(username_input);
    // var form_data = {
    //     id_user :  "",
    //     hoten_input : hoten_input = document.getElementById('hoten').value,
    //     username_input : document.getElementById('username').value,
    //     pass_input : document.getElementById('pass').value , 
    //     sdt_input : document.getElementById('sdt').value  ,
    //     role_input : document.getElementById('role').value  
    // }
    // console.log(form_data);
    // creat(form_data);
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    
    const raw = JSON.stringify({
      "id_user": "",
      "user_name": document.getElementById('username').value,
      "name": document.getElementById('hoten').value,
      "pass": document.getElementById('pass').value,
      "sdt": document.getElementById('sdt').value,
      "role": document.getElementById('role').value
    });
    
    const requestOptions = {
      method: "POST",
      headers: myHeaders,
      body: raw,
      redirect: "follow"
    };
    
    fetch("http://localhost/rest_api_php/controller/create_acc.php", requestOptions)
      .then((response) => response.text())
      .then((result) => console.log(result))
      .catch((error) => console.error(error));
 alert('Them thanh cong !');
 window.location.reload();
})
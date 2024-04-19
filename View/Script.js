// variables
const btn_submit = document.getElementById('submit');
const cau_tra_loi = document.querySelectorAll('.cau_tra_loi')
// funtion unselect radio button 
function unselect1() {
  document.getElementById("dapan2").checked = false;
  document.getElementById("dapan3").checked = false;
  document.getElementById("dapan4").checked = false;
}
function unselect2() {
  document.getElementById("dapan1").checked = false;
  document.getElementById("dapan3").checked = false;
  document.getElementById("dapan4").checked = false;
}
function unselect3() {
  document.getElementById("dapan2").checked = false;
  document.getElementById("dapan1").checked = false;
  document.getElementById("dapan4").checked = false;
}
function unselect4() {
  document.getElementById("dapan2").checked = false;
  document.getElementById("dapan3").checked = false;
  document.getElementById("dapan1").checked = false;
}
// let cauhoihientai = 0 ;
let diem = 0 ;
load_question();
//load 
var caudung = "";
var leng = 0 ; 
function load_question() {
    remove_answer();
    fetch("http://localhost/projects/mvc-pttk/web_quizz/controller/read.php")
    .then(res => res.json())
    .then(data => {
        const title_question1 = document.getElementById('title_question');
        const dapanA = document.getElementById('cautraloi1');
        const dapanB = document.getElementById('cautraloi2');
        const dapanC = document.getElementById('cautraloi3');
        const dapanD = document.getElementById('cautraloi4');
        
        const get_cauhoi = data.question[cauhoihientai];
        // console.log(get_cauhoi);
        title_question1.innerText = get_cauhoi.title ;
        dapanA.innerText = get_cauhoi.dapan1 ;
        dapanB.innerText = get_cauhoi.dapan2 ;
        dapanC.innerText = get_cauhoi.dapan3 ;
        dapanD.innerText = get_cauhoi.dapan4 ;
        caudung = get_cauhoi.dapan ;
        leng = data.question.length;
        // alert(leng);
        // console.log(caudung);
        // console.log(data.question[cauhoihientai+1]);
        
    })
    .catch(error => console.log(error));
}
function get_answer() {
    let answer = undefined ;
    cau_tra_loi.forEach(cau_tra_loi => {
        if(cau_tra_loi.checked){
            answer = cau_tra_loi.id;
            console.log(answer)
        }
    })
    return answer ;
}
function remove_answer() {
    cau_tra_loi.forEach(cau_tra_loi => {
        cau_tra_loi.checked = false ;
    });

}
// alert(leng);
var so_caudung = 0 ;
var cauhoihientai = 0;
btn_submit.addEventListener("click", (event) => {
    const answer = get_answer();
    
    event.preventDefault();
    if(answer===caudung){
        so_caudung++;
        console.log(so_caudung);
    }
    cauhoihientai++; 
    load_question();
    console.log('cauhoihientai');
   console.log(cauhoihientai);
   console.log("so_caudung");
   console.log(so_caudung);
   console.log("do dai mang ?");
    console.log(leng)
    if(cauhoihientai<leng){
        load_question();
    }
       if(cauhoihientai>leng||cauhoihientai==leng)
       document.getElementById('form_question').innerHTML = `<h3 class="h3 mt-3">Bạn đã đúng ${so_caudung} / ${leng}   </h3>
       <button onclick="location.reload()" class="btn btn-dark mt-3"> Làm lại bài thi </button> ` ;
})

// if(cauhoihientai<leng){
//     alert('nho');}
//    if(cauhoihientai>leng){
//     alert('lon');
    // d
    // 
    // `
// }


// variables
const btn_submit = document.getElementById("submit");
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
var cauhoihientai = 0;
let diem = 0;

//load

fetch("http://localhost/rest_api_php/controller/read.php")
  .then((res) => res.json())
  .then((data) => {
    const title_question1 = document.getElementById("title_question");
    const dapanA = document.getElementById("cautraloi1");
    const dapanB = document.getElementById("cautraloi2");
    const dapanC = document.getElementById("cautraloi3");
    const dapanD = document.getElementById("cautraloi4");

    const get_cauhoi = data.question[cauhoihientai];
    console.log(get_cauhoi);
    title_question1.innerText = get_cauhoi.title;
    dapanA.innerText = get_cauhoi.dapan1;
    dapanB.innerText = get_cauhoi.dapan2;
    dapanC.innerText = get_cauhoi.dapan3;
    dapanD.innerText = get_cauhoi.dapan4;

    // console.log(cauhoihientai+1);
    // console.log(data.question[cauhoihientai+1]);
  })
  .catch((error) => console.log(error));

btn_submit.addEventListener("click", () => {
  cauhoihientai++;
  // load_question();
  alert(cauhoihientai);
});
alert(cauhoihientai);

function unselect1() {
  document.getElementById("createDapan2").checked = false;
  document.getElementById("createDapan3").checked = false;
  document.getElementById("createDapan4").checked = false;
}
function unselect2() {
  document.getElementById("createDapan1").checked = false;
  document.getElementById("createDapan3").checked = false;
  document.getElementById("createDapan4").checked = false;
}
function unselect3() {
  document.getElementById("createDapan2").checked = false;
  document.getElementById("createDapan1").checked = false;
  document.getElementById("createDapan4").checked = false;
}
function unselect4() {
  document.getElementById("createDapan2").checked = false;
  document.getElementById("createDapan3").checked = false;
  document.getElementById("createDapan1").checked = false;
}

function unselectu1() {
  document.getElementById("updateDapan2").checked = false;
  document.getElementById("updateDapan3").checked = false;
  document.getElementById("updateDapan4").checked = false;
}
function unselectu2() {
  document.getElementById("updateDapan1").checked = false;
  document.getElementById("updateDapan3").checked = false;
  document.getElementById("updateDapan4").checked = false;
}
function unselectu3() {
  document.getElementById("updateDapan2").checked = false;
  document.getElementById("updateDapan1").checked = false;
  document.getElementById("updateDapan4").checked = false;
}
function unselectu4() {
  document.getElementById("updateDapan2").checked = false;
  document.getElementById("updateDapan3").checked = false;
  document.getElementById("updateDapan1").checked = false;
}

function getQuestion() {
  table1 = document.getElementById("listQuestion");
  table1.innerHTML = "";
  fetch("../controller/read.php")
    .then((res) => res.json())
    .then((data) => {
      for (var i = 0; i <= Object.keys(data.question).length; i++) {
        const cauhoi = data.question[i];
        console.log(i);
        console.log(cauhoi);
        table1.innerHTML += `
                <tr>
                <th scope="row">${cauhoi.id_cauhoi}</th>
                <td>${cauhoi.title}</td>
                <td>${cauhoi.dapan1}</td>
                <td>${cauhoi.dapan2}</td>
                <td>${cauhoi.dapan3}</td>
                <td>${cauhoi.dapan4}</td>
                <td>${cauhoi.dapan}</td>
                <td><a href="#" class="link-underline-opacity-0 link-dark" data-bs-toggle="modal" data-bs-target="#updateQuestionModal">Sửa</a> / <a href="#" class="link-underline-opacity-0 link-dark">Xóa</a></td>
                </tr>
                `;
      }
    });
}

function createQuestion() {
  var title = document.getElementById("cCauhoi").value;
  var dapan1 = document.getElementById("cDapan1").value;
  var dapan2 = document.getElementById("cDapan2").value;
  var dapan3 = document.getElementById("cDapan3").value;
  var dapan4 = document.getElementById("cDapan4").value;
  var dapan = "";
  if (document.getElementById("createDapan1").checked == true) {
    dapan = "dapan1";
  } else if (document.getElementById("createDapan2").checked == true) {
    dapan = "dapan2";
  } else if (document.getElementById("createDapan3").checked == true) {
    dapan = "dapan3";
  } else if (document.getElementById("createDapan4").checked == true) {
    dapan = "dapan4";
  }
  var obj = {
    title: title,
    dapan1: dapan1,
    dapan2: dapan2,
    dapan3: dapan3,
    dapan4: dapan4,
    dapan: dapan,
  };
  postData(
    "http://localhost/projects/mvc-pttk/web_quizz/controller/create_question.php",
    obj
  );
}


function postData(url = "", data = {}) {
    // Default options are marked with *
    const response = fetch(url, {
        method: "POST", // *GET, POST, PUT, DELETE, etc.
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(data), // body data type must match "Content-Type" header
    });
    alert("Thêm thành công!");
    getQuestion();
    return response.json(); // parses JSON response into native JavaScript objects
}

function reset() {
  document.getElementById("createDapan1").checked = false;
  document.getElementById("createDapan2").checked = false;
  document.getElementById("createDapan3").checked = false;
  document.getElementById("createDapan4").checked = false;
  document.getElementById("cCauhoi").value = "";
  document.getElementById("cDapan1").value = "";
  document.getElementById("cDapan2").value = "";
  document.getElementById("cDapan3").value = "";
  document.getElementById("cDapan4").value = "";
}
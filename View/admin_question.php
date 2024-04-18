<?php include ('./admin.php') ?>

<body onload="getQuestion()">
    <div class="container-lg border border-white rounded bg-light mt-3" style="max-height: 900px">
        <div class=" d-flex mt-3 ps-3 pe-3 justify-content-between">
            <span class="h2">Danh sách câu hỏi</span>
            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal"
                data-bs-target="#createQuestionModal" onclick="reset()">
                + Thêm câu hỏi</button>
        </div>
        <div class="border border-dark rounded m-3 p-3 overflow-auto" style="max-height:700px">
            <table class="table table-light table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nội dung câu hỏi</th>
                        <th scope="col">Đáp án 1</th>
                        <th scope="col">Đáp án 2</th>
                        <th scope="col">Đáp án 3</th>
                        <th scope="col">Đáp án 4</th>
                        <th scope="col">Đáp án</th>
                        <th scope="col">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody id="listQuestion">
                </tbody>
            </table>
        </div>
    </div>


    <!-- Modal thêm mới câu hỏi-->
    <div class="modal modal-xl fade" id="createQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm câu hỏi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="container row">
                            <p class="h4">Câu hỏi</p>
                            <textarea class="form-control" id="cCauhoi" aria-label="With textarea"></textarea>
                            <p>Tích vào đáp án đúng!</p>
                            <p class="h6 mt-3">Đáp án 1</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="createDapan1" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselect1()">
                                </div>
                                <input type="text" class="form-control" id="cDapan1"
                                    aria-label="Text input with radio button">
                            </div>
                            <p class="h6 mt-3">Đáp án 2</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="createDapan2" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselect2()">
                                </div>
                                <input type="text" class="form-control" id="cDapan2"
                                    aria-label="Text input with radio button">
                            </div>
                            <p class="h6 mt-3">Đáp án 3</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="createDapan3" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselect3()">
                                </div>
                                <input type="text" class="form-control" id="cDapan3"
                                    aria-label="Text input with radio button">
                            </div>
                            <p class="h6 mt-3">Đáp án 4</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="createDapan4" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselect4()">
                                </div>
                                <input type="text" class="form-control" id="cDapan4"
                                    aria-label="Text input with radio button">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary" id="btnadd" onclick="createQuestion()"
                        data-bs-dismiss="modal">Thêm mới câu
                        hỏi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal sửa câu hỏi-->
    <div class="modal modal-xl fade" id="updateQuestionModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa câu hỏi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="container row">
                            <p class="h4">Câu hỏi</p>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                            <p>Tích vào đáp án đúng!</p>
                            <p class="h6 mt-3">Đáp án 1</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="updateDapan1" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselectu1()">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button">
                            </div>
                            <p class="h6 mt-3">Đáp án 2</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="updateDapan2" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselectu2()">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button">
                            </div>
                            <p class="h6 mt-3">Đáp án 3</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="updateDapan3" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselectu3()">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button">
                            </div>
                            <p class="h6 mt-3">Đáp án 4</p>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0" id="updateDapan4" type="radio" value=""
                                        aria-label="Radio button for following text input" onchange="unselectu4()">
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with radio button">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Sửa câu hỏi</button>
                </div>
            </div>
        </div>
    </div>



    <script src="./admin_js/admin_question.js"></script>
</body>
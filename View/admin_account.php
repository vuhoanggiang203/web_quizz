<?php include ('./admin.php') ?>

<body>
  <main>
    <div class="container-lg border border-white rounded bg-light mt-3">
      <div class="group_creat container-lg px-3 py-3">
        <div class="group input-group mt-3">
          <label for="" class="input-group-text">ID</label>
          <input type="text" value="" class="form-control" id="id_user" />
        </div>
        <div class="group input-group mt-3">
          <label for="" class="input-group-text">Họ tên</label>
          <input type="text" value="" class="form-control" id="hoten" />
        </div>
        <div class="group input-group mt-3">
          <label for="" class="input-group-text">Username</label>
          <input type="text" value="" class="form-control" id="username" />
        </div>
        <div class="group input-group mt-3">
          <label for="" class="input-group-text">Password</label>
          <input type="text" value="" class="form-control" id="pass" />
        </div>
        <div class="group input-group mt-3">
          <label for="" class="input-group-text">Số điện thoại</label>
          <input type="text" value="" class="form-control" id="sdt" />
        </div>
        <div class="group input-group mt-3 mb-3">
          <label for="" class="input-group-text">Role</label>
          <input type="text" value="" class="form-control" id="role" />
        </div>
        <button class="btn btn-dark btn-lg btn_creat" id="btn_creat_acc">Create</button>
        <button class="btn btn-dark btn-lg update" id="btn_update_acc">Update</button>
      </div>
      <div class="container-lg px-3 py-3">
        <p class="h3">Danh sách người dùng</p>
        <table class="table table-light table-hover" id="table_account">
          <tr>
            <th>ID</th>
            <th>Họ tên</th>
            <th>Username</th>
            <th>Passwrod</th>
            <th>Số điện thoại</th>
            <th>Role</th>
            <th>Thao tác</th>
          </tr>
        </table>
      </div>
    </div>
  </main>
</body>
<script src="mng_account.js"></script>
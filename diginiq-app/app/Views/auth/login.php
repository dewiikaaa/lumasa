<div class="row justify-content-center">
    <div class="col-12 col-md-4">
        <form id="formLogin" class="card shadow-sm" method="post">
            <div class="card-body">
                <h5 class="card-title">
                    <i class="fas fa-user fa-fw"></i>
                    Login</h5>
                <div class="form-group">
                    <label for="fieldUsername">ユーザー名</label>
                    <input type="email" name="email" class="form-control" id="fieldUsername" value="<?= old('email') ?>" required>
				</div>
                <div class="form-group">
                    <label for="fieldPassword">パスワード</label>
                    <input type="password" name="password" class="form-control" id="fieldPassword" required  value="<?= old('password') ?>">
				</div>
                        <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="checkRemember">
                    <label class="form-check-label" for="checkRemember">Remember me</label>
                  </div> -->
            </div>
            <div class="card-footer text-right">
				<button class="btn btn-dark" type="submit">ログイン</button>
            </div>
        </form>
    </div>
</div>
<div class="row justify-content-center mt-5">
	<div class="col-12 col-md-4 my-4 text-center">
		<p>Use this login for Demo</p>
		<p>Username: admin@diginiq.net<br>
		Password: admin@DIGINIQ#789</p>
	</div>
</div>
<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
	<div class="container h-100">
		<div class="blog-banner">
			<div class="text-center">
				<h1>Login / Register</h1>
				<nav aria-label="breadcrumb" class="banner-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Login/Register</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<div class="hover">
						<h4>Впервые в магазине?</h4>
						<p>Для оформления покупок Вам необходимо пройти регистрацию и согласиться с использованием персональных данных</p>
						<a class="button button-account" href="/register">Регистрация</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Используйте Ваш логин и пароль для продолжения</h3>
					<form class="row login_form" onsubmit="sendForm(this); return false;">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" name="email" placeholder="Ваш логин" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш логин'" required>
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" name="pass" placeholder="Пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Пароль'" required>
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Согласие на обработку персональных данных</label>
							</div>
						</div>
						<p id="info" style="color: red;"></p>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="button button-login w-100">Вход</button>
							<a href="/register">Зарегистрироваться заново?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->

<!-- Модальное окно -->
<div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="staticBackdropLabel">Вы успешно авторизовались!</h4>
			</div>
			<div class="modal-body">
				Перенаправление через 3 секунды.
			</div>
			<div class="modal-footer">У нас есть товары которые Вас заинтересуют!
			</div>
		</div>
	</div>
</div>

<script>
	async function sendForm(form) {
		let formData = new FormData(form);

		let response = await fetch("authUser", {
			method: "POST",
			body: formData,
		});
		let message = await response.json();
		if (message.result == "exist") {
			info.innerText = "Неверно введен логин или пароль ";
		} else if (message.result == "success") {
			$("#myModal").modal("show");
			setTimeout(() => {
				location.href = "users/profile";
			}, 3000);
		}
	}
</script>

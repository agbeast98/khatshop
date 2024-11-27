$.validator.setDefaults({
  submitHandler: function () {
    alert("submitted!");
  },
});

$(document).ready(function () {
  $("#jQueryValidationForm").validate({
    rules: {
      yourname: "required",
      phone: "required",
      username: {
        required: true,
        minlength: 2,
      },
      password: {
        required: true,
        minlength: 5,
      },
      confirm_password: {
        required: true,
        minlength: 5,
        equalTo: "#input38",
      },
      email: {
        required: true,
        email: true,
      },
      country: "required",
      address: "required",
      agree: "required",
    },
    messages: {
      yourname: "لطفاً نام خود را وارد کنید",
      phone: "لطفاً شماره تلفن خود را وارد کنید",
      username: {
        required: "لطفاً یک نام کاربری وارد کنید",
        minlength: "نام کاربری شما باید حداقل 2 کاراکتر داشته باشد",
      },
      password: {
        required: "لطفاً یک رمز عبور وارد کنید",
        minlength: "رمز عبور شما باید حداقل 5 کاراکتر داشته باشد",
      },
      confirm_password: {
        required: "لطفاً یک رمز عبور وارد کنید",
        minlength: "رمز عبور شما باید حداقل 5 کاراکتر داشته باشد",
        equalTo: "لطفاً همان رمز عبور قبلی را وارد کنید",
      },
      email: "لطفاً یک آدرس ایمیل معتبر وارد کنید",
      country: "لطفاً کشور را انتخاب کنید",
      address: "لطفاً پیام خود را وارد کنید",
      agree: "لطفاً سیاست ما را بپذیرید",
    },
  });
});
